SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';
-- myDB is your database name
USE `myDB` ;

-- -----------------------------------------------------
-- Table `myDB`.`Location`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `myDB`.`Location` (
  `locationID` INT NOT NULL AUTO_INCREMENT,
  `address` VARCHAR(255) NOT NULL,
  `city` VARCHAR(45) NOT NULL,
  `stateCode` CHAR(2) NOT NULL,
  `zip` INT NOT NULL,
  PRIMARY KEY (`locationID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `myDB`.`Hotels`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `myDB`.`Hotels` (
  `hotelID` INT NOT NULL AUTO_INCREMENT,
  `FK_locationID` INT NOT NULL,
  `hotelName` VARCHAR(20) NOT NULL,
  `hotel_URL` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`hotelID`, `FK_locationID`),
  INDEX `locationID_idx` (`FK_locationID` ASC),
  CONSTRAINT `locationID`
    FOREIGN KEY (`FK_locationID`)
    REFERENCES `myDB`.`Location` (`locationID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `myDB`.`Guests`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `myDB`.`Guests` (
  `guestID` INT NOT NULL AUTO_INCREMENT,
  `fName` CHAR(20) NOT NULL,
  `lName` CHAR(20) NOT NULL,
  `address1` CHAR(45) NOT NULL,
  `address2` CHAR(45) NULL DEFAULT NULL,
  `city` CHAR(20) NOT NULL,
  `stateCode` CHAR(2) NOT NULL,
  `postCode` CHAR(20) NOT NULL,
  `phone` CHAR(10) NULL DEFAULT NULL,
  PRIMARY KEY (`guestID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `myDB`.`Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `myDB`.`Users` (
  `userID` INT NOT NULL AUTO_INCREMENT,
  `uName` CHAR(60) NOT NULL UNIQUE,
  `pass` CHAR(60) NOT NULL,
  `address1` CHAR(100) NOT NULL,
  `address2` CHAR(100) NULL,
  `city` CHAR(20) NOT NULL,
  `stateCode` CHAR(2) NOT NULL,
  `phone` CHAR(10) NULL,
  `fName` CHAR(20) NOT NULL,
  `lName` CHAR(20) NOT NULL,
  PRIMARY KEY (`userID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `myDB`.`Reservations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `myDB`.`Reservations` (
  `reservationID` INT NOT NULL AUTO_INCREMENT,
  `FK_guestID` INT NULL,
  `FK_userID` INT NULL,
  `checkinDate` DATE NULL DEFAULT NULL,
  `checkoutDate` DATE NULL DEFAULT NULL,
  `totalPrice` DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (`reservationID`),
  INDEX `guestID_idx` (`FK_guestID` ASC),
  INDEX `userID_idx` (`FK_userID` ASC),
  CONSTRAINT `guestID`
    FOREIGN KEY (`FK_guestID`)
    REFERENCES `myDB`.`Guests` (`guestID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `userID`
    FOREIGN KEY (`FK_userID`)
    REFERENCES `myDB`.`Users` (`userID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `myDB`.`RoomTypes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `myDB`.`RoomTypes` (
  `roomTypeID` INT NOT NULL AUTO_INCREMENT,
  `roomPrice` DECIMAL(10,2) NOT NULL,
  `roomDesc` VARCHAR(255) NULL DEFAULT NULL,
  `isSmoking` TINYINT(1) NOT NULL DEFAULT FALSE,
  `maxGuests` INT NULL,
  PRIMARY KEY (`roomTypeID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `myDB`.`Rooms`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `myDB`.`Rooms` (
  `roomID` INT NOT NULL AUTO_INCREMENT,
  `FK_roomTypeID` INT NOT NULL,
  `FK_hotelID` INT NOT NULL,
  `isBooked` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`roomID`),
  INDEX `hotelID_idx` (`FK_hotelID` ASC),
  INDEX `roomTypeID_idx` (`FK_roomTypeID` ASC),
  CONSTRAINT `roomTypeID`
    FOREIGN KEY (`FK_roomTypeID`)
    REFERENCES `myDB`.`RoomTypes` (`roomTypeID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `hotelID`
    FOREIGN KEY (`FK_hotelID`)
    REFERENCES `myDB`.`Hotels` (`hotelID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `myDB`.`Room_Reservation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `myDB`.`Room_Reservation` (
  `FK_roomID` INT NOT NULL,
  `FK_reservationID` INT NOT NULL,
  INDEX `reservationID_idx` (`FK_reservationID` ASC),
  INDEX `roomId_idx` (`FK_roomID` ASC),
  PRIMARY KEY (`FK_reservationID`, `FK_roomID`),
  CONSTRAINT `roomId`
    FOREIGN KEY (`FK_roomID`)
    REFERENCES `myDB`.`Rooms` (`roomID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `reservationID`
    FOREIGN KEY (`FK_reservationID`)
    REFERENCES `myDB`.`Reservations` (`reservationID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
