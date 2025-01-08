use alamedamotors;

CREATE TABLE cliente (
    id int PRIMARY KEY AUTO_INCREMENT AUTO_INCREMENT,
    nombre varchar(255),
    apellidos varchar(255),
    email varchar(255),
    telefono varchar(20)
);

CREATE TABLE admin (
    id int PRIMARY KEY AUTO_INCREMENT AUTO_INCREMENT,
    nombre varchar(255),
    apellidos varchar(255),
    email varchar(255),
    telefono varchar(20)
);

CREATE TABLE coche (
    matricula VARCHAR(50) PRIMARY KEY,
    marca varchar(255),
    modelo varchar(255),
    precio decimal(10, 2),
    imagen blob
);

CREATE TABLE comprar (
    fecha_de_compra date,
    precio decimal(10, 2),
    cliente_id int,
    coche_id VARCHAR(50),
    PRIMARY KEY AUTO_INCREMENT (cliente_id, coche_id),
    FOREIGN KEY (cliente_id) references cliente(id),
    FOREIGN KEY (coche_id) references coche(matricula)
);

CREATE TABLE historial (
    id int PRIMARY KEY AUTO_INCREMENT,
    datos text
);

CREATE TABLE cita (
    id int(12) PRIMARY KEY AUTO_INCREMENT,
    marca varchar(255),
    modelo varchar(255),
    fecha date,
    servicio_solicitado varchar(255),
    cliente_id int,
    historial_id int,
    FOREIGN KEY (cliente_id) references cliente(id),
    FOREIGN KEY (historial_id) references historial(id)
);

CREATE TABLE carburantes (
    nombre varchar(255),
    precio decimal(10, 2)
);

