use std::fs::File;
use std::io::{BufRead, BufReader, Write};
use std::net::TcpListener;
use std::{error::Error, thread, time::Duration};
use mysql::*;
use mysql::prelude::*;
use serde::Serialize;

struct MysqlConfig {
    host: Option<String>,
    username: Option<String>,
    password: Option<String>,
    database: Option<String>,
}

impl MysqlConfig {
    fn default() -> Self {
        Self { 
            host: Some("172.20.0.11".to_owned()),
            username: Some("root".to_owned()),
            password: Some("ArchTheBest".to_owned()),
            database: Some("alamedamotors".to_owned())
        } 
    } 
}

#[derive(Serialize)]
struct DatabaseSize {
    name: String,
    size: f32,
}

impl DatabaseSize {
    fn new(name: String, size: f32) -> Self {
        Self { name, size }
    }
}

#[derive(Serialize)]
#[repr(C)]
struct DiskSize {
    total: i32,
    available: i32,
}

#[derive(Serialize)]
struct Memory {
    total: i32,
    available: i32,
}

#[derive(Serialize)]
struct ServerStats {
    database: Vec<DatabaseSize>,
    disk: DiskSize,
    memory: Memory,
}

extern "C" {
    fn get_disksize() -> DiskSize;
}

fn get_next_value(bufreader: &mut BufReader<File>) -> i32 {
    let mut buf = String::new();
    bufreader.read_line(&mut buf).unwrap();
    let mut buf_splitted: Vec<&str> = buf.split(" ").collect();
    buf_splitted.pop(); 
    return buf_splitted.into_iter().last().unwrap().parse().unwrap();
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

fn get_server_stats() -> Result<String, Box<dyn Error>> {
    let mut conn = try_connect();
    let mut results: Vec<DatabaseSize> = Vec::with_capacity(3);
    let rows: Vec<Row> = conn.exec("SELECT table_schema 'database', ROUND(SUM(data_length + index_length) / 1024 / 1024, 1) FROM information_schema.tables WHERE table_schema IN ('alamedamotors', 'mysql', 'information_schema') GROUP BY table_schema;", ())?;
    for row in rows {
        let result = DatabaseSize::new(from_value(row[0].clone()), from_value(row[1].clone()));
        results.push(result);
    }

    let disk_size: DiskSize;
    unsafe {
        disk_size = get_disksize();
    }
    
    let meminfo_file = File::open("/proc/meminfo")?;
    let mut bufreader = BufReader::new(meminfo_file);

    let mem_stats = Memory {
        total: get_next_value(&mut bufreader),
        available: get_next_value(&mut bufreader) 
    };

    let server_stats = ServerStats {
        database: results,
        disk: disk_size,
        memory: mem_stats,
    };
    
    Ok(serde_json::to_string(&server_stats)?)
}

fn main() -> Result<(), Box<dyn Error>> {
    let listener = TcpListener::bind("172.20.0.1:14500")?;

    for stream in listener.incoming() {
        let mut stream = stream?;
        let server_stats = get_server_stats()?;
        stream.write(&server_stats.into_bytes()).unwrap();
    }
    Ok(())
}
