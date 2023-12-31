-- MySQL Script generated by MySQL Workbench
-- Tue Aug  8 20:17:35 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`professor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`professor` (
  `matricula` VARCHAR(45) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `cpf` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `secretaria_idsecretaria` INT NOT NULL,
  PRIMARY KEY (`matricula`),
  CONSTRAINT `fk_professor_secretaria1`
    FOREIGN KEY (`secretaria_idsecretaria`)
    REFERENCES `mydb`.`secretaria_virtual` (`idsecretaria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`materias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`materias` (
  `idmaterias` INT NOT NULL,
  `portugues` VARCHAR(45) NOT NULL,
  `matematica` VARCHAR(45) NOT NULL,
  `historia` VARCHAR(45) NOT NULL,
  `geografia` VARCHAR(45) NOT NULL,
  `professor_matricula` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idmaterias`),
  CONSTRAINT `fk_materias_professor1`
    FOREIGN KEY (`professor_matricula`)
    REFERENCES `mydb`.`professor` (`matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`modulos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`modulos` (
  `idmodulos` INT NOT NULL,
  `aluno_RA` INT NOT NULL,
  `professor_matricula` VARCHAR(45) NOT NULL,
  `materias_idmaterias` INT NOT NULL,
  PRIMARY KEY (`idmodulos`),
  CONSTRAINT `fk_modulos_aluno`
    FOREIGN KEY (`aluno_RA`)
    REFERENCES `mydb`.`aluno` (`RA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_modulos_professor1`
    FOREIGN KEY (`professor_matricula`)
    REFERENCES `mydb`.`professor` (`matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_modulos_materias1`
    FOREIGN KEY (`materias_idmaterias`)
    REFERENCES `mydb`.`materias` (`idmaterias`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`aluno_assinante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`aluno_assinante` (
  `status` INT NOT NULL,
  `nivel` INT NOT NULL,
  `aluno_RA` INT NOT NULL,
  `data_assinatura` DATE NOT NULL,
  PRIMARY KEY (`aluno_RA`),
  CONSTRAINT `fk_aluno_assinante_aluno1`
    FOREIGN KEY (`aluno_RA`)
    REFERENCES `mydb`.`aluno` (`RA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`secretaria_virtual`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`secretaria_virtual` (
  `idsecretaria` INT NOT NULL,
  `autorizacao` VARCHAR(45) NOT NULL,
  `modulos_idmodulos` INT NOT NULL,
  `contatos_aluno_RA` INT NOT NULL,
  `aluno_assinante_aluno_RA` INT NOT NULL,
  PRIMARY KEY (`idsecretaria`),
  CONSTRAINT `fk_secretaria_modulos1`
    FOREIGN KEY (`modulos_idmodulos`)
    REFERENCES `mydb`.`modulos` (`idmodulos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_secretaria_contatos1`
    FOREIGN KEY (`contatos_aluno_RA`)
    REFERENCES `mydb`.`contatos` (`aluno_RA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_secretaria_virtual_aluno_assinante1`
    FOREIGN KEY (`aluno_assinante_aluno_RA`)
    REFERENCES `mydb`.`aluno_assinante` (`aluno_RA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`aluno`
-- -----------------------------------------------------
CREATE TABLE `aluno` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nome_aluno` VARCHAR(100) NOT NULL,
  `nome_responsavel` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `rg` VARCHAR(20) NOT NULL,
  `cpf` VARCHAR (11) NOT NULL,
  `sexo` CHAR(1) NOT NULL,
  `data_nascimento` DATE NOT NULL,
  `telefone` VARCHAR(20) NOT NULL,
  `localizacao` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(12) NOT NULL,
  `data_cadastro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `mydb`.`responsavel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`responsavel` (
  `id_responsavel` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(200) NOT NULL,
  `cpf` INT(11) NOT NULL,
  `rg` VARCHAR(12) NOT NULL,
  `email` VARCHAR(90) NOT NULL,
  `secretaria_idsecretaria` INT NOT NULL,
  PRIMARY KEY (`id_responsavel`),
  CONSTRAINT `fk_responsavel_secretaria1`
    FOREIGN KEY (`secretaria_idsecretaria`)
    REFERENCES `mydb`.`secretaria_virtual` (`idsecretaria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`contatos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`contatos` (
  `telefone` VARCHAR(11) NOT NULL,
  `email` VARCHAR(90) NOT NULL,
  `aluno_RA` INT NOT NULL AUTO_INCREMENT,
  `responsavel_id_responsavel` INT NOT NULL,
  PRIMARY KEY (`aluno_RA`),
  CONSTRAINT `fk_contatos_aluno1`
    FOREIGN KEY (`aluno_RA`)
    REFERENCES `mydb`.`aluno` (`RA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contatos_responsavel1`
    FOREIGN KEY (`responsavel_id_responsavel`)
    REFERENCES `mydb`.`responsavel` (`id_responsavel`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`enderecos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`enderecos` (
  `id_endereco` INT NOT NULL,
  `bairro` VARCHAR(45) NOT NULL,
  `cep` VARCHAR(45) NOT NULL,
  `rua` VARCHAR(45) NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `aluno_RA` INT NOT NULL,
  PRIMARY KEY (`idendereco`),
  CONSTRAINT `fk_enderecos_aluno1`
    FOREIGN KEY (`aluno_RA`)
    REFERENCES `mydb`.`aluno` (`RA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`livros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`livros` (
  `idlivros` INT NOT NULL,
  `titulo` VARCHAR(45) NOT NULL,
  `autor` VARCHAR(45) NOT NULL,
  `aluno_assinante_aluno_RA` INT NOT NULL,
  PRIMARY KEY (`idlivros`),
  CONSTRAINT `fk_livros_aluno_assinante1`
    FOREIGN KEY (`aluno_assinante_aluno_RA`)
    REFERENCES `mydb`.`aluno_assinante` (`aluno_RA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`jogos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`jogos` (
  `idjogos` INT NOT NULL,
  `titulo` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `aluno_assinante_aluno_RA` INT NOT NULL,
  PRIMARY KEY (`idjogos`),
  CONSTRAINT `fk_jogos_aluno_assinante1`
    FOREIGN KEY (`aluno_assinante_aluno_RA`)
    REFERENCES `mydb`.`aluno_assinante` (`aluno_RA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
