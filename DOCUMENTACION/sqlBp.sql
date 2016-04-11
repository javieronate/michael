-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema buenasPracticas
-- -----------------------------------------------------
-- estas tablas se incluirán en el esquema de wordPress usado por el portal

-- -----------------------------------------------------
-- Schema buenasPracticas
--
-- estas tablas se incluirán en el esquema de wordPress usado por el portal
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `buenasPracticas` DEFAULT CHARACTER SET utf8mb4 ;
SHOW WARNINGS;
USE `buenasPracticas` ;

-- -----------------------------------------------------
-- Table `buenasPracticas`.`bp_personal`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buenasPracticas`.`bp_personal` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `buenasPracticas`.`bp_personal` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NULL,
  `clave` VARCHAR(255) NULL,
  `email` VARCHAR(45) NULL,
  `fechaCreado` DATETIME NULL,
  `fechaClaveUpdate` DATETIME NULL,
  `nota` VARCHAR(45) NULL,
  `esSuperAdmin` TINYINT(1) NULL,
  `correoNotificacionCadaXHoras` INT(2) UNSIGNED NULL DEFAULT 4,
  `correoUltimoEnviado` TIMESTAMP NULL,
  `ultimoLogin` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `buenasPracticas`.`bp_empresas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buenasPracticas`.`bp_empresas` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `buenasPracticas`.`bp_empresas` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombreEmpresa` VARCHAR(4255) NULL,
  `calle` VARCHAR(255) NULL,
  `noExt` VARCHAR(100) NULL,
  `noInt` VARCHAR(100) NULL,
  `colonia` VARCHAR(100) NULL,
  `cp` VARCHAR(5) NULL,
  `ciudad` VARCHAR(150) NULL,
  `municipio` VARCHAR(3) NULL,
  `estado` VARCHAR(2) NULL,
  `latitud` DECIMAL(15,10) NULL,
  `longitud` DECIMAL(15,10) NULL,
  `contacto` VARCHAR(255) NULL,
  `telefono` VARCHAR(15) NULL,
  `correos` VARCHAR(150) NULL COMMENT 'direcciones de correo separadas por coma.',
  `sitioWeb` VARCHAR(150) NULL,
  `fechaCreacion` DATE NULL,
  `fechaActualizacion` VARCHAR(45) NULL,
  `propietarioId` INT(11) UNSIGNED NULL,
  `personalId` INT(11) UNSIGNED NULL,
  `publica` TINYINT(1) NULL,
  `bp_companiascol` VARCHAR(45) NULL,
  `contactoNombre` VARCHAR(45) NULL,
  `contactoTelefono` VARCHAR(45) NULL,
  `correoNotificacionCadaXHoras` INT(2) UNSIGNED NULL DEFAULT 4,
  `ultimoCorreoEnviado` TIMESTAMP NULL,
  `ultimoLogin` TIMESTAMP NULL DEFAULT NULL,
  `usuario` VARCHAR(50) NULL,
  `clave` VARCHAR(150) NULL,
  PRIMARY KEY (`id`),
  INDEX `personal_companiasId_idx` (`personalId` ASC),
  CONSTRAINT `personal_empresaId`
    FOREIGN KEY (`personalId`)
    REFERENCES `buenasPracticas`.`bp_personal` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `buenasPracticas`.`bp_categorias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buenasPracticas`.`bp_categorias` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `buenasPracticas`.`bp_categorias` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NULL,
  `orden` INT(2) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `buenasPracticas`.`bp_buenasPracticas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buenasPracticas`.`bp_buenasPracticas` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `buenasPracticas`.`bp_buenasPracticas` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `categoriaId` INT(11) UNSIGNED NULL,
  `titulo` VARCHAR(255) NULL,
  `tituloCorto` VARCHAR(150) NULL,
  `descripcion` TEXT NULL,
  `experiencia` TEXT NULL,
  `sustentabilidad` TEXT NULL,
  `competitividad` TEXT NULL,
  `variaciones` TEXT NULL,
  `recursos` TEXT NULL,
  `aprenderMas` TEXT NULL,
  `criterios` TEXT NULL,
  `propietarioId` INT(11) UNSIGNED NULL,
  `fechaCreacion` DATE NULL,
  `fechaActualizacion` TIMESTAMP NULL,
  `publico` TINYINT(1) NULL,
  `imagen1` VARCHAR(255) NULL,
  `imagen2` VARCHAR(255) NULL,
  `imagen3` VARCHAR(255) NULL,
  `valorDeCertificacion` INT(11) NULL,
  `orden` INT(2) NULL,
  `puntosMaximos` DECIMAL(4,2) UNSIGNED NULL,
  `periodoDeVigencia` INT(11) NULL COMMENT 'periodo de vigencia en días. Después debe efectuarse el proceso de renovación ',
  PRIMARY KEY (`id`),
  INDEX `categoriaId_buenasPracticas` (`categoriaId` ASC),
  CONSTRAINT `categoriaId_buenasPracticas`
    FOREIGN KEY (`categoriaId`)
    REFERENCES `buenasPracticas`.`bp_categorias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `buenasPracticas`.`bp_empresa_buenaPractica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buenasPracticas`.`bp_empresa_buenaPractica` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `buenasPracticas`.`bp_empresa_buenaPractica` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `empresaId` INT(11) UNSIGNED NULL,
  `buenasPracticasId` INT(11) UNSIGNED NULL,
  `estatus` ENUM('En proceso', 'Aprobada', 'No aprobada', 'Vencida') NULL,
  `fechaIncio` DATE NULL COMMENT 'es la fecha en la que la empresa registra la practica y tiene 3 meses para aprobarla.',
  `fechaAprobacion` DATE NULL COMMENT 'fecha en que se aprobó la practica. redundante del log que esta en la tabla bp_compania_buenaPractica_eventos',
  PRIMARY KEY (`id`),
  INDEX `empresaId_empresa_buenaPractica` (`empresaId` ASC),
  INDEX `buenasPracticasId_empresa_buenaPractica` (`buenasPracticasId` ASC),
  CONSTRAINT `empresaId_empresa_buenaPractica`
    FOREIGN KEY (`empresaId`)
    REFERENCES `buenasPracticas`.`bp_empresas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `buenasPracticasId_empresa_buenaPractica`
    FOREIGN KEY (`buenasPracticasId`)
    REFERENCES `buenasPracticas`.`bp_buenasPracticas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `buenasPracticas`.`bp_criterios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buenasPracticas`.`bp_criterios` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `buenasPracticas`.`bp_criterios` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `buenaPracticaId` INT(11) UNSIGNED NOT NULL,
  `nombre` VARCHAR(255) NULL,
  `descripcion` TEXT NULL,
  `puntos` DECIMAL(4,2) UNSIGNED NULL,
  `orden` INT(2) NULL,
  PRIMARY KEY (`id`),
  INDEX `buenaPracticaId_criterios` (`buenaPracticaId` ASC),
  CONSTRAINT `buenaPracticaId_criterios`
    FOREIGN KEY (`buenaPracticaId`)
    REFERENCES `buenasPracticas`.`bp_buenasPracticas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `buenasPracticas`.`bp_requisitos_criterio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buenasPracticas`.`bp_requisitos_criterio` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `buenasPracticas`.`bp_requisitos_criterio` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `buenaPracticaId` INT(11) UNSIGNED NULL,
  `criterioId` INT(11) UNSIGNED NULL,
  `Descripcion` TEXT NULL,
  `puntos` DECIMAL(4,2) UNSIGNED NULL,
  `diasDePlazo` INT(4) UNSIGNED NULL,
  `orden` INT(2) NULL,
  PRIMARY KEY (`id`),
  INDEX `actividadId_requisitos_criterio` (`criterioId` ASC),
  INDEX `buenaPracticaId_requisitos_actividad_idx` (`buenaPracticaId` ASC),
  CONSTRAINT `actividadId_requisitos_criterio`
    FOREIGN KEY (`criterioId`)
    REFERENCES `buenasPracticas`.`bp_criterios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `buenaPracticaId_requisitos_criterio`
    FOREIGN KEY (`buenaPracticaId`)
    REFERENCES `buenasPracticas`.`bp_buenasPracticas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `buenasPracticas`.`bp_compania_buenaPractica_eventos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buenasPracticas`.`bp_compania_buenaPractica_eventos` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `buenasPracticas`.`bp_compania_buenaPractica_eventos` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipoDeEvento` ENUM('Agregar evidencia', 'Evaluacion') NULL,
  `empresa_buenaPracticaId` INT(11) UNSIGNED NOT NULL,
  `criterioId` INT(11) UNSIGNED NULL,
  `requisitoId` INT(11) UNSIGNED NULL,
  `usuarioId` INT(11) UNSIGNED NULL,
  `fecha` TIMESTAMP NULL,
  `nombreEvidencia` VARCHAR(255) NULL,
  `tipoEvidencia` ENUM('Foto', 'Documento') NULL,
  `estatusBuenaPractica` ENUM('En proceso', 'Aprobada', 'No aprobada') NULL,
  `estatusCriterio` ENUM('No iniciada', 'En proceso', 'Aprobada', 'No aprobada') NULL,
  `estatusRequisito` ENUM('No iniciada', 'En proceso', 'Aprobada', 'No aprobada') NULL,
  `mensaje` VARCHAR(45) NULL COMMENT 'habilitado solo para los mentores como mensajes a las empresas',
  PRIMARY KEY (`id`),
  INDEX `empresa_buenaPracticaId_empresa_buenaPractica_eventos` (`empresa_buenaPracticaId` ASC),
  INDEX `actividadId_empresa_buenaPractica_eventos` (`criterioId` ASC),
  INDEX `requisitoId_empresa_buenaPractica_eventos` (`requisitoId` ASC),
  CONSTRAINT `empresa_buenaPracticaId_empresa_buenaPractica_eventos`
    FOREIGN KEY (`empresa_buenaPracticaId`)
    REFERENCES `buenasPracticas`.`bp_empresa_buenaPractica` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `actividadId_empresa_buenaPractica_eventos`
    FOREIGN KEY (`criterioId`)
    REFERENCES `buenasPracticas`.`bp_criterios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `requisitoId_empresa_buenaPractica_eventos`
    FOREIGN KEY (`requisitoId`)
    REFERENCES `buenasPracticas`.`bp_requisitos_criterio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `buenasPracticas`.`bp_logActividades`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buenasPracticas`.`bp_logActividades` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `buenasPracticas`.`bp_logActividades` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idEmpresa` INT(11) UNSIGNED NULL,
  `idPersonal` INT(11) UNSIGNED NULL,
  `fecha` TIMESTAMP NULL,
  `mensaje` VARCHAR(255) NULL,
  `prioridad` TINYINT(1) NULL COMMENT 'Poner items \nprioridades\n\n1 - Error\n2 - Warning\n3 - Info\n4 - \n5 - Debug',
  PRIMARY KEY (`id`),
  INDEX `logActividades_empresaId_idx` (`idEmpresa` ASC),
  INDEX `logActividades_personalId_idx` (`idPersonal` ASC),
  CONSTRAINT `logActividades_empresaId`
    FOREIGN KEY (`idEmpresa`)
    REFERENCES `buenasPracticas`.`bp_empresas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `logActividades_personalId`
    FOREIGN KEY (`idPersonal`)
    REFERENCES `buenasPracticas`.`bp_personal` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `buenasPracticas`.`bp_categorias`
-- -----------------------------------------------------
START TRANSACTION;
USE `buenasPracticas`;
INSERT INTO `buenasPracticas`.`bp_categorias` (`id`, `nombre`, `orden`) VALUES (1, 'Buenas prácticas generales ', 1);
INSERT INTO `buenasPracticas`.`bp_categorias` (`id`, `nombre`, `orden`) VALUES (2, 'Del manejo de los visitantes', 2);
INSERT INTO `buenasPracticas`.`bp_categorias` (`id`, `nombre`, `orden`) VALUES (3, 'De la responsabilidad social', 3);
INSERT INTO `buenasPracticas`.`bp_categorias` (`id`, `nombre`, `orden`) VALUES (4, 'Del uso eficiente y manejo del agua', 4);
INSERT INTO `buenasPracticas`.`bp_categorias` (`id`, `nombre`, `orden`) VALUES (5, 'Del manejo de los residuos sólidos', 5);
INSERT INTO `buenasPracticas`.`bp_categorias` (`id`, `nombre`, `orden`) VALUES (6, 'Del diseño y uso de la infraestructura', 6);
INSERT INTO `buenasPracticas`.`bp_categorias` (`id`, `nombre`, `orden`) VALUES (7, 'De las actividades recreativas y turísticas acuáticas', 7);

COMMIT;

