CREATE DATABASE ParqueAcuatico;
USE ParqueAcuatico;

-- Tabla de Usuarios (Clientes y Administradores)
CREATE TABLE Usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    tipo ENUM('cliente', 'admin') NOT NULL DEFAULT 'cliente',
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

insert into Usuarios (nombre,email,password,tipo) values ('Juancho','juancho@email.com','123','admin');
select * from Usuarios ;

-- Tabla de Entradas
CREATE TABLE Entradas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo ENUM('Adulto', 'Niño') NOT NULL,
    precio DECIMAL(10,2) NOT NULL DEFAULT 0
);
INSERT INTO Entradas (tipo, precio) VALUES 
('Adulto', 180.00), 
('Niño', 120.00);
select * from Entradas;

-- Tabla de Productos (Mesas, sombrillas, sillas, etc.)
CREATE TABLE Productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10,2) NOT NULL DEFAULT 0,
    tipo ENUM('silla', 'mesa', 'sombrilla', 'cabaña', 'camping') NOT NULL
);
INSERT INTO Productos (nombre, descripcion, precio, tipo) VALUES
('Silla', 'Silla plegable para descansar.', 30.00, 'silla'),
('Mesa', 'Mesa portátil para picnic.', 50.00, 'mesa'),
('Sombrilla', 'Sombrilla para proteger del sol.', 50.00, 'sombrilla'),
('Cabaña para 4 personas', 'Cabaña equipada para 4 personas.', 2500.00, 'cabaña'),
('Cabaña para 6 personas', 'Cabaña equipada para 6 personas.', 3000.00, 'cabaña'),
('Espacio para casa de campaña', 'Espacio disponible para acampar.', 350.00, 'camping'),
('Renta de casa de campaña para 4 personas', 'Casa de campaña para 4 personas.', 150.00, 'camping'),
('Renta de casa de campaña para 8 personas', 'Casa de campaña para 8 personas.', 180.00, 'camping'),
('Renta de casa de campaña para 12 personas', 'Casa de campaña para 12 personas.', 220.00, 'camping');

select * from Productos;

-- Tabla de Reservaciones (Para cabañas y casas de campaña)
CREATE TABLE Reservaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    producto_id INT NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(id),
    FOREIGN KEY (producto_id) REFERENCES Productos(id)
);

-- Tabla de Ventas (Registro de compras con código único)
CREATE TABLE Ventas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    codigo_unico VARCHAR(50) UNIQUE NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(id)
);

-- Tabla Detalle de Venta (Qué productos y entradas se compraron)
CREATE TABLE Detalle_Venta (
    id INT AUTO_INCREMENT PRIMARY KEY,
    venta_id INT NOT NULL,
    producto_id INT NULL,
    entrada_id INT NULL,
    cantidad INT NOT NULL,
    subtotal DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (venta_id) REFERENCES Ventas(id),
    FOREIGN KEY (producto_id) REFERENCES Productos(id),
    FOREIGN KEY (entrada_id) REFERENCES Entradas(id)
);

select * from ventas;
select * from Reservaciones ;
select * from Detalle_Venta;