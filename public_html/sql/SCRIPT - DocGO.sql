-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema docgo
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `docgo` ;

-- -----------------------------------------------------
-- Schema docgo
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `docgo` DEFAULT CHARACTER SET utf8 ;
USE `docgo` ;

-- -----------------------------------------------------
-- Table `docgo`.`Medico`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `docgo`.`Medico` ;

CREATE TABLE IF NOT EXISTS `docgo`.`Medico` (
  `mediId` INT NOT NULL AUTO_INCREMENT,
  `mediNome` VARCHAR(45) NOT NULL,
  `mediCrm` VARCHAR(45) NOT NULL,
  `mediEspecializacao` VARCHAR(45) NOT NULL,
  `mediTelefone` VARCHAR(45) NOT NULL,
  `mediEmail` VARCHAR(45) NOT NULL,
  `mediSenha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`mediId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `docgo`.`Paciente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `docgo`.`Paciente` ;

CREATE TABLE IF NOT EXISTS `docgo`.`Paciente` (
  `paciId` INT NOT NULL AUTO_INCREMENT,
  `paciNome` VARCHAR(45) NOT NULL,
  `paciNascimento` VARCHAR(45) NOT NULL,
  `paciEstado` VARCHAR(45) NOT NULL,
  `paciCidade` VARCHAR(45) NOT NULL,
  `paciEndereco` VARCHAR(45) NOT NULL,
  `paciTelefone` VARCHAR(45) NOT NULL,
  `paciComorbidades` VARCHAR(100) NOT NULL,
  `paciTabagismo` VARCHAR(45) NOT NULL,
  `paciEtilismo` VARCHAR(45) NOT NULL,
  `paciAlergias` VARCHAR(100) NOT NULL,
  `paciMedicacao` VARCHAR(100) NOT NULL,
  `paciHistoriaClinica` VARCHAR(255) NOT NULL,
  `paciPeso` VARCHAR(45) NOT NULL,
  `paciAltura` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`paciId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `docgo`.`Consulta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `docgo`.`Consulta` ;

CREATE TABLE IF NOT EXISTS `docgo`.`Consulta` (
  `consId` INT NOT NULL AUTO_INCREMENT,
  `consData` DATE NOT NULL,
  `consHorario` VARCHAR(45) NOT NULL,
  `consGravidade` VARCHAR(45) NOT NULL,
  `consEstado` TINYINT NOT NULL,
  `Paciente_paciId` INT NOT NULL,
  PRIMARY KEY (`consId`),
  CONSTRAINT `fk_Consulta_Paciente1`
    FOREIGN KEY (`Paciente_paciId`)
    REFERENCES `docgo`.`Paciente` (`paciId`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `docgo`.`Relatorio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `docgo`.`Relatorio` ;

CREATE TABLE IF NOT EXISTS `docgo`.`Relatorio` (
  `relaId` INT NOT NULL AUTO_INCREMENT,
  `relaDescricao` VARCHAR(45) NOT NULL,
  `relaMedicamentos` VARCHAR(45) NOT NULL,
  `relaExames` VARCHAR(45) NOT NULL,
  `Consulta_consId` INT NOT NULL,
  PRIMARY KEY (`relaId`),
  CONSTRAINT `fk_Relatorio_Consulta1`
    FOREIGN KEY (`Consulta_consId`)
    REFERENCES `docgo`.`Consulta` (`consId`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `docgo`.`Consulta_Medico`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `docgo`.`Consulta_Medico` ;

CREATE TABLE IF NOT EXISTS `docgo`.`Consulta_Medico` (
  `Consulta_consId` INT NOT NULL,
  `Medico_mediId` INT NOT NULL,
  PRIMARY KEY (`Consulta_consId`, `Medico_mediId`),
  CONSTRAINT `fk_Consulta_has_Medico_Consulta1`
    FOREIGN KEY (`Consulta_consId`)
    REFERENCES `docgo`.`Consulta` (`consId`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Consulta_has_Medico_Medico1`
    FOREIGN KEY (`Medico_mediId`)
    REFERENCES `docgo`.`Medico` (`mediId`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
