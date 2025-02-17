use std::{error::Error, thread, time::Duration};
use mysql::*;
use mysql::prelude::*;

struct MysqlConfig {
    host: Option<String>,
    username: Option<String>,
    password: Option<String>,
    database: Option<String>,
}

impl MysqlConfig {
    fn default() -> Self {
        Self { 
            #[cfg(target_os = "linux")]
            host: Some("172.20.0.11".to_owned()),
            #[cfg(target_os = "windows")]
            host: Some("127.0.0.1".to_owned()),
            username: Some("root".to_owned()),
            password: Some("ArchTheBest".to_owned()),
            database: Some("alamedamotors".to_owned())
        } 
    } 
}

struct DatabaseSize {
    name: String,
    size: f32,
}

impl DatabaseSize {
    fn new(name: String, size: f32) -> Self {
        Self { name, size }
    }
}

#[repr(C)]
struct DiskSize {
    total: i32,
    available: i32,
}

extern "C" {
    fn get_disksize() -> DiskSize;
}

fn try_connect() -> Conn {
    let mysqlconfig = MysqlConfig::default();
    let opts = OptsBuilder::new()
        .ip_or_hostname(mysqlconfig.host)
        .user(mysqlconfig.username)
        .pass(mysqlconfig.password)
        .db_name(mysqlconfig.database);
    
    match Conn::new(opts) {
        Ok(conn) => {
            conn
        },
        Err(_) => {
            thread::sleep(Duration::from_secs(1));
            try_connect()
        },
    }
}

fn main() -> Result<(), Box<dyn Error>> {
    let mut conn = try_connect();
    let mut results: Vec<DatabaseSize> = Vec::with_capacity(3);
    let rows: Vec<Row> = conn.exec("SELECT table_schema 'database', ROUND(SUM(data_length + index_length) / 1024 / 1024, 1) FROM information_schema.tables WHERE table_schema IN ('alamedamotors', 'mysql', 'information_schema') GROUP BY table_schema;", ())?;
    for row in rows {
        let result = DatabaseSize::new(from_value(row[0].clone()), from_value(row[1].clone()));
        results.push(result);
    }

    for result in results {
        println!("{} -> {}", result.name, result.size)
    }

    let disk_size: DiskSize;
    unsafe {
        disk_size = get_disksize();
    }

    println!("{}GB", disk_size.total);
    println!("{}GB", disk_size.available);

    Ok(())
}
