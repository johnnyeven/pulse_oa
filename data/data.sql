SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `oa_db` ;
CREATE SCHEMA IF NOT EXISTS `oa_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `oa_db` ;

-- -----------------------------------------------------
-- Table `oa_db`.`platform_account`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oa_db`.`platform_account` ;

CREATE  TABLE IF NOT EXISTS `oa_db`.`platform_account` (
  `account_id` INT NOT NULL AUTO_INCREMENT ,
  `account_number` INT NOT NULL ,
  `account_name` CHAR(8) NOT NULL ,
  `account_pass` CHAR(64) NOT NULL ,
  `account_department` CHAR(16) NOT NULL ,
  `account_lastlogin` INT NOT NULL ,
  PRIMARY KEY (`account_id`) ,
  INDEX `account_name` (`account_name` ASC, `account_pass` ASC) ,
  INDEX `account_id` (`account_id` ASC, `account_pass` ASC) ,
  UNIQUE INDEX `account_name2` (`account_name` ASC, `account_department` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `oa_db`.`platform_pay`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oa_db`.`platform_pay` ;

CREATE  TABLE IF NOT EXISTS `oa_db`.`platform_pay` (
  `date` DATE NOT NULL ,
  `account_id` INT NOT NULL ,
  `account_name` CHAR(8) NOT NULL ,
  `account_department` CHAR(16) NOT NULL ,
  `pay_base` INT NOT NULL ,
  `pay_gangwei` INT NOT NULL ,
  `pay_jingtie` INT NOT NULL ,
  `pay_gongling` INT NOT NULL ,
  `pay_baomi` INT NOT NULL ,
  `pay_canbu` INT NOT NULL ,
  `pay_jiaban` INT NOT NULL ,
  `pay_basetotal` INT NOT NULL ,
  `pay_yanglao` INT NOT NULL ,
  `pay_yiliao` INT NOT NULL ,
  `pay_shiye` INT NOT NULL ,
  `pay_gongjijin` INT NOT NULL ,
  `pay_shuitotal` INT NOT NULL ,
  `pay_fakuan` INT NOT NULL ,
  `pay_shuiqian` INT NOT NULL ,
  `pay_geshui` INT NOT NULL ,
  `pay_total` INT NOT NULL ,
  PRIMARY KEY (`date`, `account_id`) ,
  INDEX `account_name` (`account_name` ASC, `account_department` ASC) )
ENGINE = InnoDB;

USE `oa_db` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
