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
  `account_level` INT NOT NULL DEFAULT 0 ,
  `recommand_change_pass` TINYINT NOT NULL DEFAULT 1 ,
  PRIMARY KEY (`account_id`) ,
  INDEX `account_name` (`account_name` ASC, `account_pass` ASC) ,
  INDEX `account_number` (`account_pass` ASC, `account_number` ASC) ,
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


-- -----------------------------------------------------
-- Table `oa_db`.`platform_timeline`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oa_db`.`platform_timeline` ;

CREATE  TABLE IF NOT EXISTS `oa_db`.`platform_timeline` (
  `timeline_id` INT NOT NULL AUTO_INCREMENT ,
  `account_id` INT NOT NULL ,
  `timeline_title` CHAR(32) NOT NULL ,
  `timeline_comment` TEXT NOT NULL ,
  `timeline_starttime` INT NOT NULL ,
  `timeline_endtime` INT NOT NULL ,
  `timeline_status` TINYINT NOT NULL DEFAULT 0 COMMENT '0=未开始\n1=进行中\n2=已完成\n3=已过期' ,
  PRIMARY KEY (`timeline_id`) ,
  INDEX `account_id` (`account_id` ASC) ,
  INDEX `timeline_time` (`timeline_starttime` ASC, `timeline_endtime` ASC) ,
  INDEX `timeline_status` (`timeline_status` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `oa_db`.`platform_message`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oa_db`.`platform_message` ;

CREATE  TABLE IF NOT EXISTS `oa_db`.`platform_message` (
  `message_id` INT NOT NULL AUTO_INCREMENT ,
  `message_sender` CHAR(8) NOT NULL ,
  `message_reveiver` CHAR(8) NOT NULL ,
  `message_sender_id` INT NOT NULL ,
  `message_receiver_id` INT NOT NULL ,
  `message_content` TEXT NOT NULL ,
  `message_posttime` INT NOT NULL ,
  PRIMARY KEY (`message_id`) )
ENGINE = InnoDB;

USE `oa_db` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
