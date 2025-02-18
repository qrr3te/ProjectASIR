use std::{error::Error, process::{Command, Stdio}, thread, time::Duration};
use argon2::{password_hash::{PasswordHasher, rand_core::OsRng, SaltString}, Argon2};
use mysql::*;
use mysql::prelude::*;

struct  MysqlConfig {
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

struct Admin {
    username: String,
    email: String,
    password_hash: String,
    phone_number: Option<String>,
    name: Option<String>,
    surname: Option<String>
}

impl Admin {
    fn default() -> Self {
        let passwword = b"ArchTheBest";
        let argon2 = Argon2::default();
        let salt = SaltString::generate(&mut OsRng);
        let password_hash = argon2.hash_password(passwword, &salt).unwrap().to_string();

        Self { 
            username: "Administrator".to_owned(),
            email: "administrator@alamedamotors.com".to_owned(),
            password_hash: password_hash, 
            name: None,
            phone_number: None,
            surname: None
        } 
    } 
}

fn init_db(conn: &mut Conn) -> Result<(), Box<dyn Error>> {
    conn.query_drop(
        r"CREATE TABLE IF NOT EXISTS cliente (
            id int PRIMARY KEY AUTO_INCREMENT,
            username varchar(50) NOT NULL UNIQUE,
            nombre varchar(255),
            apellido varchar(255),
            email varchar(255) NOT NULL UNIQUE,
            telefono varchar(20) UNIQUE,
            password VARCHAR(255) NOT NULL
        )"
    )?;
    
    conn.query_drop(
        r"CREATE TABLE IF NOT EXISTS admin (
            id int PRIMARY KEY AUTO_INCREMENT,
            username varchar(50) NOT NULL UNIQUE,
            nombre varchar(255),
            apellido varchar(255),
            email varchar(255) NOT NULL UNIQUE,
            telefono varchar(20) UNIQUE,
            password VARCHAR(255) NOT NULL
        )"
    )?;
    
    conn.query_drop(
        r"CREATE TABLE IF NOT EXISTS coche (
            id int PRIMARY KEY AUTO_INCREMENT,
            matricula VARCHAR(50) UNIQUE,
            marca varchar(255),
            modelo varchar(255),
            precio decimal(10, 2),
            imagen longblob
        )"
    )?;
    
    conn.query_drop(
        r"CREATE TABLE IF NOT EXISTS compra (
            id int PRIMARY KEY AUTO_INCREMENT,
            fecha_de_compra date,
            precio decimal(10, 2),
            cliente_id int,
            coche_id int,
            FOREIGN KEY (cliente_id) REFERENCES cliente(id),
            FOREIGN KEY (coche_id) REFERENCES coche(id)
        )"
    )?;
    
    conn.query_drop(
        r"CREATE TABLE IF NOT EXISTS cita (
            id int(12) PRIMARY KEY AUTO_INCREMENT,
            marca varchar(255),
            modelo varchar(255),
            fecha date,
            hora TIME NOT NULL,
            servicio_solicitado varchar(255),
            comentarios varchar(255),
            cliente_id int,
            FOREIGN KEY (cliente_id) REFERENCES cliente(id)
        )"
    )?;
    
    conn.query_drop(
        r"CREATE TABLE IF NOT EXISTS carburante (
            id int PRIMARY KEY AUTO_INCREMENT,
            nombre varchar(255),
            precio decimal(10, 2),
            imagen longblob
        )"
    )?;
    
    conn.query_drop(
        r"CREATE TABLE IF NOT EXISTS servicios (
            id int PRIMARY KEY AUTO_INCREMENT,
            nombre varchar(255),
            descripcion varchar(255),
            url varchar(255),
            imagen longblob
        )"
    )?;
    println!("{}", "base de datos inicializada correctamente");
    Ok(())
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
            println!("{}", "<Conexión establecida>");
            conn
        },
        Err(_) => {
            thread::sleep(Duration::from_secs(1));
            println!("{}", "Conexión no establecida..... Reintentando");
            
            try_connect()
        },
    }
}

fn docker_restart() {
    Command::new("docker-compose")
        .stdout(Stdio::inherit())
        .stderr(Stdio::inherit())
        .arg("down")
        .output()
        .expect("docker-compose error: no ha podido ejecutarse asegurate de tenerlo instalado");

    #[cfg(target_os = "linux")]
    Command::new("docker-compose")
        .stdout(Stdio::inherit())
        .stderr(Stdio::inherit())
        .arg("up")
        .arg("-d")
        .output()
        .expect("docker-compose error: asegurate de estar en la misma ruta que docker-compose.yml");
    
    #[cfg(target_os = "windows")]
    Command::new("docker-compose")
        .stdout(Stdio::inherit())
        .stderr(Stdio::inherit())
        .arg("-f")
        .arg("docker-compose-win.yml")
        .arg("up")
        .arg("-d")
        .output()
        .expect("docker-compose error: asegurate de estar en la misma ruta que docker-compose-win.yml");
}

fn main() -> Result<(), Box<dyn Error>> {
    docker_restart();

    let mut conn = try_connect();
    init_db(&mut conn)?;

    let admin = Admin::default();
    match conn.exec_drop("INSERT INTO admin (username, email, password) VALUES (?, ?, ?)", (admin.username, admin.email, admin.password_hash,)) {
        Ok(()) => {},
        Err(_) => {
            println!("El administrador por defecto ya existe en la base de datos");
        }
    }
    println!("Configuración completada exitosamente");

    Ok(())
}
