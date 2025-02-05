use alamedamotors;

CREATE TABLE IF NOT EXISTS cliente (
   id int PRIMARY KEY AUTO_INCREMENT,
   username varchar(50) NOT NULL UNIQUE,
   nombre varchar(255),
   apellido varchar(255),
   email varchar(255) NOT NULL UNIQUE,
   telefono varchar(20) UNIQUE,
   password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS admin (
   id int PRIMARY KEY AUTO_INCREMENT,
   username varchar(50) NOT NULL UNIQUE,
   nombre varchar(255),
   apellido varchar(255),
   email varchar(255) NOT NULL UNIQUE,
   telefono varchar(20) UNIQUE,
   password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS coche (
   id int PRIMARY KEY AUTO_INCREMENT,
   matricula VARCHAR(50) UNIQUE,
   marca varchar(255),
   modelo varchar(255),
   precio decimal(10, 2),
   imagen longblob
);

CREATE TABLE IF NOT EXISTS compra (
   id int PRIMARY KEY AUTO_INCREMENT,
   fecha_de_compra date,
   precio decimal(10, 2),
   cliente_id int,
   coche_id int,
   FOREIGN KEY (cliente_id) references cliente(id),
   FOREIGN KEY (coche_id) references coche(id)
);

CREATE TABLE IF NOT EXISTS cita (
   id int(12) PRIMARY KEY AUTO_INCREMENT,
   marca varchar(255),
   modelo varchar(255),
   fecha date,
   servicio_solicitado varchar(255),
   cliente_id int,
   FOREIGN KEY (cliente_id) references cliente(id)
);

CREATE TABLE IF NOT EXISTS carburante (
   id int PRIMARY KEY AUTO_INCREMENT,
   nombre varchar(255),
   precio decimal(10, 2)
);

