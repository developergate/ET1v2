drop database if exists et1_hackaton;
create database et1_hackaton default character set utf8 default collate utf8_spanish_ci;
grant usage on *.* to 'admin_hackaton'@'localhost';
drop user 'admin_hackaton'@'localhost';
create user 'admin_hackaton'@'localhost' identified by 'iu';
grant all on et1_hackaton.* to 'admin_hackaton'@'localhost';

use et1_hackaton;

-- -----------------------------------------------------
-- Table `et1_hackaton`.`Sede`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Sede (
  `idSede` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idSede`))
ENGINE = InnoDB;

INSERT INTO Sede (`idSede`) VALUES ('Ourense'), ('Lugo');

-- -----------------------------------------------------
-- Table `et1_hackaton`.`Equipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Equipo (
  `idEquipo` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idEquipo`))
ENGINE = InnoDB;

INSERT INTO Equipo (`idEquipo`) VALUES ('equipoActimel'), ('equipoA');

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
  `Equipo_idEquipo` VARCHAR(50) DEFAULT NULL,
  `Rol` ENUM('admin', 'juradoNacional', 'juradoSede', 'participante') DEFAULT 'participante',
   PRIMARY KEY (`idUsuario`),
  CONSTRAINT `fk_Usuario_Sede`
    FOREIGN KEY (`Sede_idSede`)
    REFERENCES Sede(`idSede`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Usuario_Equipo`
    FOREIGN KEY (`Equipo_idEquipo`)
    REFERENCES Equipo(`idEquipo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

INSERT INTO `Usuario` (`idUsuario`, `Sede_idSede`, `Nombre`, `Password`, `Email`, `Idioma`, `Equipo_idEquipo`, `Rol`) VALUES
-- pass admin
('admin', 'Ourense', 'Super Administrador', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.es', 'esp', null, 'admin'),
-- pass jurado
('juradoSede', 'Ourense', 'Pablemos', '56e07fdb35aa5008d09813b6b89f2ad5', 'jurado@jurado.es', 'esp', null, 'juradoSede'),
-- pass jurado
('jurado', 'Ourense', 'Pablemos', '56e07fdb35aa5008d09813b6b89f2ad5', 'juradoSede@jurado.es', 'esp', null, 'juradoNacional'),
-- pass participante
('participante', 'Ourense', 'Hackercillo', '99ac05264e7c7a69a800755bb72972d8', 'participante@gmail.com', 'esp', 'equipoActimel', 'participante'),
-- pass participante
('manolo', 'Ourense', 'Hackercillo', '99ac05264e7c7a69a800755bb72972d8', 'manolo@gmail.com', 'esp', 'equipoActimel', 'participante'),
-- pass participante2
('participante2', 'Ourense', 'mark zuckerberg', '1ae54b5fd1b7f33381081d9bcd0f3425', 'participante2@gmail.com', 'esp', 'equipoA', 'participante');

-- -----------------------------------------------------
-- Table `et1_hackaton`.`Reto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Reto (
  `idReto` VARCHAR(50) NOT NULL,
	`DescReto` VARCHAR(500),
  `Aceptado` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idReto`))
ENGINE = InnoDB;
 

INSERT INTO Reto (`idReto`, `DescReto`, `Aceptado`) VALUES
('Nopollution', 'Evitar la contaminacion', '1'),
('FreeEnergy', 'Energias renovables', '1'),
('NuevoCoche', 'El coche del futuro', '0');

-- -----------------------------------------------------
-- Table `et1_hackaton`.`Solucion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Solucion (
  `EsPropuesta` TINYINT(1) NOT NULL DEFAULT 0,
  `Equipo_idEquipo` VARCHAR(50) NOT NULL,
  `Reto_idReto` VARCHAR(50) NOT NULL,
  `Titulo` VARCHAR(50) NOT NULL,
  `Descripcion` VARCHAR(45),
  `Video` VARCHAR(100),
  `Documento` VARCHAR(100),
  `Repositorio` VARCHAR(100),
   PRIMARY KEY (`EsPropuesta`, `Equipo_idEquipo`, `Reto_idReto`),
  CONSTRAINT `fk_Solucion_Equipo`
    FOREIGN KEY (`Equipo_idEquipo`)
    REFERENCES Equipo(`idEquipo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Solucion_Reto`
    FOREIGN KEY (`Reto_idReto`)
    REFERENCES Reto(`idReto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

INSERT INTO Solucion (`EsPropuesta`, `Equipo_idEquipo`, `Reto_idReto`, `Titulo`, `Descripcion`, `Video`, `Documento`, `Repositorio`) VALUES
('0', 'equipoActimel', 'Nopollution', 'solu1', 'Evitar contaminacion', 'a.avi', 'a.pdf', 'a.zip'),
('1', 'equipoActimel', 'Nopollution','propuesta1', 'Evitar contaminacion', 'a.avi', 'a.pdf', 'a.zip'),
('0', 'equipoA', 'Nopollution', 'solu2', 'Evitar contaminacion', 'b.avi', 'b.pdf', 'b.zip');

-- -----------------------------------------------------
-- Table `et1_hackaton`.`Premio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Premio (
  `idPremio` VARCHAR(50) NOT NULL,
  `Descripcion` VARCHAR(300),
  `FechaEquipos` DATE NOT NULL,
  `FechaJuradoS` DATE NOT NULL,
  `FechaJuradoN` VARCHAR(45),
  `TipoPremio` ENUM('s', 'n') DEFAULT 'n',
  `Solucion_EsPropuesta` TINYINT(1),
  `Solucion_Equipo_idEquipo` VARCHAR(50),
  `Solucion_Reto_idReto` VARCHAR(50),
  PRIMARY KEY (`idPremio`),
  CONSTRAINT `fk_Premio_Solucion`
    FOREIGN KEY (`Solucion_EsPropuesta` , `Solucion_Equipo_idEquipo` , `Solucion_Reto_idReto`)
    REFERENCES Solucion(`EsPropuesta` , `Equipo_idEquipo` , `Reto_idReto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

INSERT INTO Premio (`idPremio`, `Descripcion`, `FechaEquipos`, `FechaJuradoS`, `FechaJuradoN`, `TipoPremio`, `Solucion_EsPropuesta`, `Solucion_Equipo_idEquipo`, `Solucion_Reto_idReto`) VALUES
('Coche', 'Renault Clio 1.6',  '2015-12-17', '2016-02-28', null, 's', '0', 'equipoActimel', 'Nopollution'),
('Moto', 'Renault Clio 1.6',  '2016-01-12', '2016-01-14', '2016-01-16', 'n', null, null, null),
('Motito', 'Renault Clio 1.6',  '2016-01-10', '2016-01-30', '2016-02-28', 'n', null, null, null),
('Moton', 'Renault Clio 1.6',  '2016-01-10', '2016-01-11', '2016-01-30', 'n', null, null, null);

-- -----------------------------------------------------
-- Table `et1_hackaton`.`Jurado_puntua_Solucion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Jurado_puntua_Solucion (
  `Usuario_idUsuario` VARCHAR(50) NOT NULL,
  `Solucion_EsPropuesta` TINYINT(1) NOT NULL,
  `Solucion_Equipo_idEquipo` VARCHAR(50) NOT NULL,
  `Solucion_Reto_idReto` VARCHAR(50) NOT NULL,
  `Premio_idPremio` VARCHAR(50) NOT NULL,
  `Puntuacion` INT NOT NULL DEFAULT 0,
  `TipoPuntuacion` ENUM('s', 'n') DEFAULT 'n',
  PRIMARY KEY (`Usuario_idUsuario`, `Solucion_EsPropuesta`, `Solucion_Equipo_idEquipo`, `Solucion_Reto_idReto`, `Premio_idPremio`),
  CONSTRAINT `fk_Jurado_Solucion`
    FOREIGN KEY (`Solucion_EsPropuesta`, `Solucion_Equipo_idEquipo`, `Solucion_Reto_idReto`)
    REFERENCES Solucion(`EsPropuesta`, `Equipo_idEquipo`, `Reto_idReto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Jurado_Premio`
    FOREIGN KEY (`Premio_idPremio`)
    REFERENCES Premio(`idPremio`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Jurado_Usuario`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES Usuario(`idUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

INSERT INTO `Jurado_puntua_Solucion` (`Usuario_idUsuario`, `Solucion_EsPropuesta`, `Solucion_Equipo_idEquipo`, `Solucion_Reto_idReto`, `Premio_idPremio`, `Puntuacion`, `TipoPuntuacion`) VALUES
('jurado', '0', 'equipoActimel', 'Nopollution', 'Coche', 7, 's'),
('jurado', '0', 'equipoA', 'Nopollution', 'Coche', 5, 's');



