drop database if exists et1_hackaton;
create database et1_hackaton default character set utf8 default collate utf8_spanish_ci;
grant usage on *.* to 'admin_hackaton'@'localhost';
drop user 'admin_hackaton'@'localhost';
create user 'admin_hackaton'@'localhost' identified by 'iu';
grant all on et1_hackaton.* to 'admin_hackaton'@'localhost';

use et1_hackaton;

-- -----------------------------------------------------
-- Table `et1_hackaton`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Usuario (
  `idUsuario` VARCHAR(50) NOT NULL,
  `Sede_idSede` VARCHAR(50) NOT NULL,
  `Nombre` VARCHAR(50) NOT NULL,
  `Password` VARCHAR(300) NOT NULL,
  `Email` VARCHAR(50) NOT NULL,
  `Idioma` ENUM('esp', 'eng') NOT NULL DEFAULT 'esp',
	`Equipo_idEquipo` VARCHAR(50),
  `Rol` ENUM('admin', 'jurado', 'participante') DEFAULT 'participante',
  PRIMARY KEY (`idUsuario`));

INSERT INTO `Usuario` (`idUsuario`, `Sede_idSede`, `Nombre`, `Password`, `Email`, `Idioma`, `Equipo_idEquipo`, `Rol`) VALUES
-- pass admin
('admin', 'Ourense', 'Super Administrador', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.es', 'esp', 'equipoA', 'admin'),
-- pass jurado
('jurado', 'Ourense', 'Pablemos', '56e07fdb35aa5008d09813b6b89f2ad5', 'jurado@jurado.es', 'esp', 'equipoZ', 'jurado'),
-- pass participante
('participante', 'Ourense', 'Hackercillo', '99ac05264e7c7a69a800755bb72972d8', 'participante@gmail.com', 'esp', 'equipoActimel', 'participante'),
-- pass participante2
('participante2', 'Ourense', 'mark zuckerberg', '1ae54b5fd1b7f33381081d9bcd0f3425', 'participante2@gmail.com', 'esp', 'equipoActimel', 'participante');

-- -----------------------------------------------------
-- Table `et1_hackaton`.`Jurado_puntua_Solucion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Jurado_puntua_Solucion (
  `Usuario_idUsuario` VARCHAR(50) NOT NULL,
  `Solucion_idSolucion` VARCHAR(50) NOT NULL,
  `Premio_idPremio` VARCHAR(50) NOT NULL,
  `Puntuacion` INT NOT NULL DEFAULT 0,
  `TipoPuntuacion` ENUM('s', 'n') DEFAULT 'n');


INSERT INTO `Jurado_puntua_Solucion` (`Usuario_idUsuario`, `Solucion_idSolucion`, `Premio_idPremio`, `Puntuacion`, `TipoPuntuacion`) VALUES

('jurado', 'solu1', 'Coche', 7, 's'),

('jurado', 'solu2', 'Coche', 5, 's');

-- -----------------------------------------------------
-- Table `et1_hackaton`.`Solucion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Solucion (
  `idSolucion` VARCHAR(50) NOT NULL,
  `Equipo_idEquipo` VARCHAR(50) NOT NULL,
  `Reto_idReto` VARCHAR(50) NOT NULL,
  `DescSolucion` VARCHAR(45),
  `Video` VARCHAR(100),
  `Documento` VARCHAR(100),
  `Repositorio` VARCHAR(100),
  `EsPropuesta` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idSolucion`));


INSERT INTO Solucion (`idSolucion`, `Equipo_idEquipo`, `Reto_idReto`, `DescSolucion`, `Video`, `Documento`, `Repositorio`, `EsPropuesta`) VALUES

('solu1', 'equipoActimel', 'Nopollution', 'Evitar contacminacion', 'a.avi', 'a.pdf', 'a.zip', '1'),

('solu2', 'equipoA', 'Nopollution', 'Evitar contacminacion', 'b.avi', 'b.pdf', 'b.zip', '1');

-- -----------------------------------------------------
-- Table `et1_hackaton`.`Premio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Premio (
  `idPremio` VARCHAR(50) NOT NULL,
  `DescPremio` VARCHAR(300),
  `FechaEquipos` DATE NOT NULL,
  `FechaJuradoS` DATE NOT NULL,
  `FechaJuradoN` VARCHAR(45) NOT NULL,
  `TipoPremio` ENUM('s', 'n') DEFAULT 'n',
  `Solucion_idSolucion` VARCHAR(50) NOT NULL,
  `Solucion_Equipo_idEquipo` VARCHAR(50),
  `Solucion_Reto_idReto` VARCHAR(50),
  PRIMARY KEY (`idPremio`));
  

INSERT INTO Premio (`idPremio`, `DescPremio`, `FechaEquipos`, `FechaJuradoS`, `FechaJuradoN`, `TipoPremio`, `Solucion_idSolucion`, `Solucion_Equipo_idEquipo`, `Solucion_Reto_idReto`) VALUES

('coche', 'Renault Clio 1.6',  '2015-12-17', '2015-12-18', '2015-12-19', 's', 'solu1', 'equipoActimel', 'Nopollution');

-- -----------------------------------------------------
-- Table `et1_hackaton`.`Reto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Reto (
  `idReto` VARCHAR(50) NOT NULL,
	`DescReto` VARCHAR(500),
  `Aceptado` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idReto`));
 

INSERT INTO Reto (`idReto`, `DescReto`, `Aceptado`) VALUES
('Nopollution', 'Evitar la contacminacion', '1'),
('FreeEnergy', 'Energias renovables', '1');

-- -----------------------------------------------------
-- Table `et1_hackaton`.`Equipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Equipo (
  `idEquipo` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idEquipo`));

INSERT INTO Equipo (`idEquipo`) VALUES
('equipoActimel');

-- -----------------------------------------------------
-- Table `et1_hackaton`.`Sede`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Sede (
  `idSede` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idSede`));

INSERT INTO Sede (`idSede`) VALUES
('Ourense');

