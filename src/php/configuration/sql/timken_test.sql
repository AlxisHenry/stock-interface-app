DROP DATABASE
    IF EXISTS timken_test;
CREATE DATABASE timken_test
    DEFAULT CHARACTER SET utf8mb4
    COLLATE utf8mb4_general_ci;
USE timken_test;

CREATE TABLE IF NOT EXISTS `panel_manage_access`
(
    `ID` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(15),
    `password` VARCHAR(50),
    `type` VARCHAR(25),
    `derniereConnection` TIMESTAMP,
    `status`  VARCHAR(25)
);

INSERT INTO `panel_manage_access` (username, password, type, derniereConnection, status)
VALUES ('tfadmin', 'timken', 'administrator',(SELECT NOW()), 1);

INSERT INTO `panel_manage_access` (username, password, type, derniereConnection, status)
VALUES ('employee', 'employee', 'visitor' ,(SELECT NOW()), 1);

CREATE TABLE IF NOT EXISTS `panel_logs_access`
(
    `idConnection` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `userID` INT,
    `date` TIMESTAMP,
    `asset` VARCHAR(15)
);