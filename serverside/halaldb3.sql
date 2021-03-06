-- MySQL Script generated by MySQL Workbench
-- 12/08/14 06:17:13
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema halaldb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema halaldb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `halaldb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `halaldb` ;

-- -----------------------------------------------------
-- Table `halaldb`.`Documentation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `halaldb`.`Documentation` (
  `doc_id` INT NOT NULL AUTO_INCREMENT,
  `ssm` VARCHAR(4) NULL,
  `lesen` VARCHAR(4) NULL,
  `beroperasi` VARCHAR(4) NULL,
  `produk_halal` VARCHAR(4) NULL,
  `standard_halal` VARCHAR(4) NULL,
  `sumber_halal` VARCHAR(4) NULL,
  `pembekal_halal` VARCHAR(4) NULL,
  `ulasan_dok` VARCHAR(100) NULL,
  `t_dokumentasi_mark` INT NULL,
  `t_dokumentasi_fullmark` INT NULL,
  PRIMARY KEY (`doc_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `halaldb`.`RawMaterial`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `halaldb`.`RawMaterial` (
  `raw_material_id` INT NOT NULL AUTO_INCREMENT,
  `bahan_halal` VARCHAR(4) NULL,
  `asas_haiwan` VARCHAR(4) NULL,
  `import_halal` VARCHAR(4) NULL,
  `spec_produk` VARCHAR(4) NULL,
  `senarai_bahan` VARCHAR(200) NULL,
  `ulasan_bahan` VARCHAR(100) NULL,
  `t_bahan_mark` INT NULL,
  `t_bahan_fullmark` INT NULL,
  PRIMARY KEY (`raw_material_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `halaldb`.`Equipment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `halaldb`.`Equipment` (
  `equipment_id` INT NOT NULL AUTO_INCREMENT,
  `suci` VARCHAR(4) NULL,
  `bebas_najis` VARCHAR(4) NULL,
  `tak_mudarat` VARCHAR(4) NULL,
  `tak_bulu` VARCHAR(4) NULL,
  `telah_samak` VARCHAR(4) NULL,
  `susun_kemas` VARCHAR(4) NULL,
  `alat_sembah` VARCHAR(4) NULL,
  `ulasan_alat` VARCHAR(100) NULL,
  `t_alat_mark` INT NULL,
  `t_alat_fullmark` INT NULL,
  PRIMARY KEY (`equipment_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `halaldb`.`Process`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `halaldb`.`Process` (
  `process_id` INT NOT NULL AUTO_INCREMENT,
  `tak_campur` VARCHAR(4) NULL,
  `syarie` VARCHAR(4) NULL,
  `gmp_ghp` VARCHAR(4) NULL,
  `bersih` VARCHAR(4) NULL,
  `ulasan_proses` VARCHAR(100) NULL,
  `t_proses_mark` INT NULL,
  `t_proses_fullmark` INT NULL,
  PRIMARY KEY (`process_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `halaldb`.`Transport`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `halaldb`.`Transport` (
  `transport_id` INT NOT NULL AUTO_INCREMENT,
  `bawa_halal` VARCHAR(4) NULL,
  `ulasan_angkut` VARCHAR(100) NULL,
  `t_angkut_mark` INT NULL,
  `t_angkut_fullmark` INT NULL,
  PRIMARY KEY (`transport_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `halaldb`.`Workforce`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `halaldb`.`Workforce` (
  `work_id` INT NOT NULL AUTO_INCREMENT,
  `pakaian` VARCHAR(4) NULL,
  `terlatih` VARCHAR(4) NULL,
  `penyelia_muslim` VARCHAR(4) NULL,
  `maklumat_pekerja` VARCHAR(200) NULL,
  `ulasan_pekerja` VARCHAR(100) NULL,
  `t_pekerja_mark` INT NULL,
  `t_pekerja_fullmark` INT NULL,
  PRIMARY KEY (`work_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `halaldb`.`Packaging`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `halaldb`.`Packaging` (
  `packaging_id` INT NOT NULL AUTO_INCREMENT,
  `cetak_jelas` VARCHAR(4) NULL,
  `ikut_akta` VARCHAR(4) NULL,
  `patuh_syarak` VARCHAR(4) NULL,
  `tak_najis` VARCHAR(4) NULL,
  `ulasan_bungkus` VARCHAR(100) NULL,
  `t_bungkus_mark` INT NULL,
  `t_bungkus_fullmark` INT NULL,
  PRIMARY KEY (`packaging_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `halaldb`.`Cleanliness`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `halaldb`.`Cleanliness` (
  `cleanliness_id` INT NOT NULL AUTO_INCREMENT,
  `ikut_jadual` VARCHAR(4) NULL,
  `bebas_pencemaran` VARCHAR(4) NULL,
  `sekitar_bersih` VARCHAR(4) NULL,
  `rekod_sistem` VARCHAR(4) NULL,
  `ulasan_sanitasi` VARCHAR(45) NULL,
  `t_sanitasi_mark` INT NULL,
  `t_sanitasi_fullmark` INT NULL,
  PRIMARY KEY (`cleanliness_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `halaldb`.`Checklist`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `halaldb`.`Checklist` (
  `checklist_id` INT NOT NULL AUTO_INCREMENT,
  `doc_id` INT NOT NULL,
  `raw_material_id` INT NOT NULL,
  `equipment_id` INT NOT NULL,
  `process_id` INT NOT NULL,
  `transport_id` INT NOT NULL,
  `work_id` INT NOT NULL,
  `packaging_id` INT NOT NULL,
  `cleanliness_id` INT NOT NULL,
  PRIMARY KEY (`checklist_id`),
  INDEX `fk_Checklist_Documentation1_idx` (`doc_id` ASC),
  INDEX `fk_Checklist_RawMaterial1_idx` (`raw_material_id` ASC),
  INDEX `fk_Checklist_Equipment2_idx` (`equipment_id` ASC),
  INDEX `fk_Checklist_Process1_idx` (`process_id` ASC),
  INDEX `fk_Checklist_Transport1_idx` (`transport_id` ASC),
  INDEX `fk_Checklist_Work2_idx` (`work_id` ASC),
  INDEX `fk_Checklist_Packaging1_idx` (`packaging_id` ASC),
  INDEX `fk_Checklist_Cleanliness1_idx` (`cleanliness_id` ASC),
  CONSTRAINT `fk_Checklist_Documentation1`
    FOREIGN KEY (`doc_id`)
    REFERENCES `halaldb`.`Documentation` (`doc_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Checklist_RawMaterial1`
    FOREIGN KEY (`raw_material_id`)
    REFERENCES `halaldb`.`RawMaterial` (`raw_material_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Checklist_Equipment2`
    FOREIGN KEY (`equipment_id`)
    REFERENCES `halaldb`.`Equipment` (`equipment_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Checklist_Process1`
    FOREIGN KEY (`process_id`)
    REFERENCES `halaldb`.`Process` (`process_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Checklist_Transport1`
    FOREIGN KEY (`transport_id`)
    REFERENCES `halaldb`.`Transport` (`transport_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Checklist_Work2`
    FOREIGN KEY (`work_id`)
    REFERENCES `halaldb`.`Workforce` (`work_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Checklist_Packaging1`
    FOREIGN KEY (`packaging_id`)
    REFERENCES `halaldb`.`Packaging` (`packaging_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Checklist_Cleanliness1`
    FOREIGN KEY (`cleanliness_id`)
    REFERENCES `halaldb`.`Cleanliness` (`cleanliness_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `halaldb`.`State`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `halaldb`.`State` (
  `state_id` VARCHAR(3) NOT NULL,
  `state_name` VARCHAR(45) NULL,
  PRIMARY KEY (`state_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `halaldb`.`Company`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `halaldb`.`Company` (
  `company_id` INT NOT NULL AUTO_INCREMENT,
  `company_name` VARCHAR(45) NULL,
  `address` VARCHAR(100) NULL,
  `postcode` VARCHAR(5) NULL,
  `state_id` VARCHAR(3) NOT NULL,
  INDEX `fk_Company_State1_idx` (`state_id` ASC),
  PRIMARY KEY (`company_id`),
  CONSTRAINT `fk_Company_State1`
    FOREIGN KEY (`state_id`)
    REFERENCES `halaldb`.`State` (`state_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `halaldb`.`Auditor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `halaldb`.`Auditor` (
  `auditor_id` INT NOT NULL AUTO_INCREMENT,
  `auditor_name` VARCHAR(10) NULL,
  `checklist_id` INT NOT NULL,
  PRIMARY KEY (`auditor_id`),
  INDEX `fk_Auditor_Checklist1_idx` (`checklist_id` ASC),
  CONSTRAINT `fk_Auditor_Checklist1`
    FOREIGN KEY (`checklist_id`)
    REFERENCES `halaldb`.`Checklist` (`checklist_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `halaldb`.`Audit`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `halaldb`.`Audit` (
  `audit_id` INT NOT NULL AUTO_INCREMENT,
  `company_id` INT NOT NULL,
  `auditor_id` INT NOT NULL,
  `date` DATE NULL,
  `mark` DOUBLE NOT NULL,
  `grade` VARCHAR(5) NULL,
  `auditor_comment` VARCHAR(45) NULL,
  PRIMARY KEY (`audit_id`),
  INDEX `fk_Audit_Company1_idx` (`company_id` ASC),
  INDEX `fk_Audit_Auditor1_idx` (`auditor_id` ASC),
  CONSTRAINT `fk_Audit_Company1`
    FOREIGN KEY (`company_id`)
    REFERENCES `halaldb`.`Company` (`company_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Audit_Auditor1`
    FOREIGN KEY (`auditor_id`)
    REFERENCES `halaldb`.`Auditor` (`auditor_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
