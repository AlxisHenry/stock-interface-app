DROP DATABASE
   IF EXISTS timken;
CREATE DATABASE timken
    DEFAULT CHARACTER SET utf8mb4
    COLLATE utf8mb4_general_ci;
USE timken;

CREATE TABLE IF NOT EXISTS `access`
(
    `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(15),
    `password` VARCHAR(50),
    `type` VARCHAR(25),
    `derniereConnection` DATETIME,
    `commentaire` VARCHAR(50),
    `dateCreation` DATETIME,
    `dateModification` DATETIME,
    `CreateUser` INT,
    `EditUser` INT
);

INSERT INTO `access` (username, password, type, derniereConnection, commentaire, dateCreation, dateModification)
VALUES ('tfadmin', 'timken', 'admin',(SELECT NOW()), 'Admin account', (SELECT NOW()), (SELECT NOW()));
INSERT INTO `access` (username, password, type, derniereConnection, commentaire, dateCreation, dateModification)
VALUES ('employee', 'employee', 'view' ,(SELECT NOW()), 'Employee account', (SELECT NOW()), (SELECT NOW()));
INSERT INTO `access` (username, password, type, derniereConnection, commentaire, dateCreation, dateModification)
VALUES ('timken', 'timken', 'admin' ,(SELECT NOW()), 'Developer account', (SELECT NOW()), (SELECT NOW()));

CREATE TABLE IF NOT EXISTS `logs`
(
    `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `user` INT(5),
    `date` DATETIME,
    `asset` VARCHAR(30),
    `browser` VARCHAR(50),
    `os` VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS `articles`
(
    `id` INT(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `famille` INT(5),
    `nom` VARCHAR(60),
    `quantityStock` INT(6),
    `quantityTotal` INT(6),
    `quantityGiven` INT(6),
    `quantityMin` INT(6),
    `commentaire` VARCHAR(250),
    `code` VARCHAR(50),
    `localisation` VARCHAR(60),
    `dateCreation` DATETIME,
    `dateModification` DATETIME,
    `createUser` INT(5),
    `editUser` INT(5)
);

INSERT INTO `articles` (`id`, `famille`, `nom`, `quantityStock`, `quantityTotal`, `quantityGiven`, `quantityMin`, `commentaire`, `code`, `localisation`, `dateCreation`, `dateModification`, `createUser`, `editUser`) VALUES
(1, 5, 'Toner HP 4250/924x', 4, 4, 0, 2, 'noir', '48299388', 'null', '2022-04-27 10:15:48', '2022-04-27 15:19:33', 1, 1),
(2, 5, 'Toner HP 4300/339a', 3, 3, 0, 2, 'noir', '48299030', 'null', '2022-04-27 10:18:30', '2022-04-27 14:12:50', 1, 1),
(3, 5, 'Toner HP 4200/338x', 2, 2, 0, 2, 'noir', '48299028', 'null', '2022-04-27 10:23:51', '2022-04-27 10:53:14', 1, 1),
(4, 5, 'Toner HP 4200/38a', 1, 1, 0, 2, 'noir', '10162HC', 'null', '2022-04-27 10:25:27', '2022-04-27 10:53:19', 1, 1),
(5, 5, 'Toner HP 4015/64x', 5, 5, 0, 0, 'noir', '10765R', 'null', '2022-04-27 10:26:10', '2022-04-27 15:17:57', 1, 1),
(6, 5, 'Toner HP 4600/20a', 1, 1, 0, 2, 'noir', '10520R', 'null', '2022-04-27 10:29:12', '2022-04-27 10:54:00', 1, 1),
(7, 5, 'Toner HP 4600/21a', 0, 0, 0, 2, 'cyan', '10521R', 'null', '2022-04-27 10:29:27', '2022-04-27 10:54:08', 1, 1),
(8, 5, 'Toner HP 4600/22a', 0, 0, 0, 2, 'jaune', '10522R', 'null', '2022-04-27 10:29:54', '2022-04-27 10:54:14', 1, 1),
(9, 5, 'Toner HP 4600/23a', 1, 1, 0, 2, 'modification', '10523R', 'null', '2022-04-27 10:30:17', '2022-04-27 15:20:11', 1, 1),
(10, 5, 'Toner HP 307a CP5225/40a', 1, 1, 0, 2, 'noir ', 'CE740A', 'null', '2022-04-27 10:33:58', '2022-04-27 10:33:58', 1, 1),
(11, 5, 'Toner HP 307a CP5225/41a', 3, 3, 0, 2, 'cyan', 'CE741A', 'null', '2022-04-27 10:34:30', '2022-04-27 10:34:30', 1, 1),
(12, 5, 'Toner HP 307a CP5225/42a', 2, 2, 0, 2, 'jaune', 'CE742A', 'null', '2022-04-27 10:34:43', '2022-04-27 10:34:43', 1, 1),
(13, 5, 'Toner HP 307a CP5225/43a', 4, 4, 0, 2, 'magenta', 'CE743A', 'null', '2022-04-27 10:35:00', '2022-04-27 10:35:00', 1, 1),
(14, 5, 'Toner HP 643a 4700/50a', 1, 1, 0, 2, 'noir', 'Q5950A', 'null', '2022-04-27 10:36:51', '2022-04-27 14:12:59', 1, 1),
(15, 5, 'Toner HP 643a 4700/52a', 2, 2, 0, 2, 'jaune', 'Q5952A', 'null', '2022-04-27 10:37:04', '2022-04-27 10:37:04', 1, 1),
(16, 5, 'Toner HP 643a 4700/53a', 1, 1, 0, 2, 'mangeta', 'Q5951A', 'null', '2022-04-27 10:37:12', '2022-04-27 10:37:12', 1, 1),
(17, 5, 'Toner HP 507a M551/400a', 1, 1, 0, 2, 'noir', 'CE400A', 'null', '2022-04-27 10:38:42', '2022-04-27 10:38:42', 1, 1),
(18, 5, 'Toner HP 507a M551/401a', 2, 2, 0, 2, 'cyan', 'CE401A', 'null', '2022-04-27 10:38:54', '2022-04-27 10:38:54', 1, 1),
(19, 5, 'Toner HP 507a M551/402a', 2, 2, 0, 2, 'jaune', 'CE402A', 'null', '2022-04-27 10:39:09', '2022-04-27 10:39:09', 1, 1),
(20, 5, 'Toner HP 507a M551/403a', 1, 1, 0, 2, 'mangeta', 'CE403A', 'null', '2022-04-27 10:40:19', '2022-04-27 10:40:19', 1, 1),
(21, 5, 'Toner HP M609/37y', 1, 1, 0, 2, 'noir', '48299947', 'null', '2022-04-27 10:52:58', '2022-04-27 10:52:58', 1, 1),
(22, 5, 'Toner HP 4100x', 7, 7, 0, 2, 'noir', 'C8061X', 'null', '2022-04-27 10:59:23', '2022-04-27 10:59:23', 1, 1),
(23, 5, 'Toner HP 5200', 1, 1, 0, 2, 'noir', 'Q75161', 'null', '2022-04-27 11:00:33', '2022-04-27 11:00:33', 1, 1),
(24, 8, 'Lenovo Professional Wireless Laser Mouse', 5, 5, 0, 5, 'MODEL N° MORFJUL', '4X30H56886', 'Etagère près du couloir', '2022-04-27 14:36:01', '2022-04-27 14:36:01', 1, 1),
(25, 8, 'Lenovo Essentials USB Mouse', 8, 8, 0, 5, '', '4Y50R20863', 'Etagère près du couloir', '2022-04-27 14:36:38', '2022-04-27 14:37:21', 1, 1),
(26, 8, 'Thinkpad USB Laser Mouse', 5, 5, 0, 5, '', '57Y4635', 'null', '2022-04-27 14:38:19', '2022-04-27 14:40:34', 1, 1),
(27, 8, 'Thinkpad Bluetooth Silent Mouse', 4, 4, 0, 5, '', '4Y50X88822', 'null', '2022-04-27 14:38:44', '2022-04-27 14:38:44', 1, 1),
(28, 8, 'Thinkpad Bluetooth Laser Mouse', 3, 3, 0, 5, '', 'OA36407', 'null', '2022-04-27 14:39:51', '2022-04-27 14:39:51', 1, 1),
(29, 8, 'Lenovo Essentials Compact Wireless Mouse', 1, 1, 0, 5, '', '4Y50R20864', 'null', '2022-04-27 14:41:07', '2022-04-27 14:41:07', 1, 1),
(30, 8, 'Thinkpad Essential Wireless Mouse', 25, 25, 0, 10, '', '4X30M56887', 'null', '2022-04-27 14:41:34', '2022-04-27 14:41:34', 1, 1),
(31, 4, 'Thinkpad USB 3.0 Ethernet Adapter', 6, 6, 0, 3, 'Adaptateur USB C vers RJ45', '4X90S91830', 'null', '2022-04-27 14:42:14', '2022-04-27 14:42:14', 1, 1);

CREATE TABLE IF NOT EXISTS `centres`
(
    `id` INT(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `code` VARCHAR(30),
    `commentaire` VARCHAR(50),
    `dateCreation` DATETIME,
    `dateModification` DATETIME,
    `createUser` INT(5),
    `editUser` INT(5)
);

CREATE TABLE IF NOT EXISTS `familles`
(
    `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(25),
    `commentaire` VARCHAR(150),
    `dateCreation` DATETIME,
    `dateModification` DATETIME,
    `createUser` INT(5),
    `editUser` INT(5)
);

INSERT INTO `familles` (`nom`, `commentaire` ,`dateCreation`, `dateModification`, `createUser` ,`editUser`)
VALUES ( 'Autres', 'Non rangé...' ,(SELECT NOW()), (SELECT NOW()), 1, 1);
INSERT INTO `familles` (`nom`, `commentaire` ,`dateCreation`, `dateModification`, `createUser` ,`editUser`)
VALUES ( 'Cables vidéo','Cables DP, HDMI, VGA' ,(SELECT NOW()), (SELECT NOW()), 1, 1);
INSERT INTO `familles` (`nom`, `commentaire` ,`dateCreation`, `dateModification`, `createUser` ,`editUser`)
VALUES ( 'Cables alimentation', 'Alim écran, PC , périphériques' ,(SELECT NOW()), (SELECT NOW()), 1, 1);
INSERT INTO `familles` (`nom`, `commentaire` ,`dateCreation`, `dateModification`, `createUser` ,`editUser`)
VALUES ( 'Cables divers', 'Autres cables...' ,(SELECT NOW()), (SELECT NOW()), 1, 1);
INSERT INTO `familles` (`nom`, `commentaire` ,`dateCreation`, `dateModification`, `createUser` ,`editUser`)
VALUES ( 'Imprimantes', 'Tonner, imprimantes, ...' ,(SELECT NOW()), (SELECT NOW()), 1, 1);
INSERT INTO `familles` (`nom`, `commentaire` ,`dateCreation`, `dateModification`, `createUser` ,`editUser`)
VALUES ( 'Réseau','Switch, Hub, RJ45, Antenne Wifi, ...' ,(SELECT NOW()), (SELECT NOW()), 1, 1);
INSERT INTO `familles` (`nom`, `commentaire` ,`dateCreation`, `dateModification`, `createUser` ,`editUser`)
VALUES ( 'Écrans', "Tous les types d'écrans",(SELECT NOW()), (SELECT NOW()), 1, 1);
INSERT INTO `familles` (`nom`, `commentaire` ,`dateCreation`, `dateModification`, `createUser` ,`editUser`)
VALUES ( 'Périphériques', 'Souris, lecteur code barre, docking, ...' ,(SELECT NOW()), (SELECT NOW()), 1, 1);
INSERT INTO `familles` (`nom`, `commentaire` ,`dateCreation`, `dateModification`, `createUser` ,`editUser`)
VALUES ( 'Téléphonie', 'Cables, protections écrans, ...', (SELECT NOW()), (SELECT NOW()), 1, 1);

CREATE TABLE IF NOT EXISTS `mouvements`
(
    `id` INT(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `dateMouvement` DATETIME,
    `creator` INT(5),
    `type` VARCHAR(1),
    `quantite` INT(4),
    `article` INT(5),
    `users` INT(5),
    `centreDeCout` INT(5),
    `commentaire` VARCHAR(50),
    `dateCreation` DATETIME,
    `dateModification` DATETIME,
    `createUser` INT(5),
    `editUser` INT(5)
);

CREATE TABLE IF NOT EXISTS `utilisateurs`
(
    `id` INT(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `etablissement` VARCHAR(40),
    `matricule` VARCHAR(40) NOT NULL,
    `nom` VARCHAR(30) NOT NULL,
    `prenom` VARCHAR(30) NOT NULL,
    `centreDeCout` VARCHAR(20),
    `centreAffection` VARCHAR(100),
    `dateCreation` DATETIME,
    `dateModification` DATETIME
);

CREATE TABLE IF NOT EXISTS `front`
(
    `id` INT(1) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(30),
    `comment` VARCHAR(60),
    `state` INT(1),
    `count` INT(4),
    `modification` DATETIME
);

INSERT INTO `front` (nom, comment, state, modification) VALUES ("admin-access","Manage admin access",1,(SELECT NOW()));
INSERT INTO `front` (nom, comment, state, modification) VALUES ("employee-access","Manage employee access",1,(SELECT NOW()));
INSERT INTO `front` (nom, comment, state, modification) VALUES ("admin-logs","Admin connexion logs",1,(SELECT NOW()));
INSERT INTO `front` (nom, comment, state, modification) VALUES ("employee-logs","Employee connexion logs",1,(SELECT NOW()));
INSERT INTO `front` (nom, comment, state, modification) VALUES ("alerts-mail","Alerts send with mails",1,(SELECT NOW()));
INSERT INTO `front` (nom, comment, state, modification) VALUES ("alerts-indicator","Alerts indicator in menu",1,(SELECT NOW()));
INSERT INTO `front` (nom, comment, state, modification) VALUES ("website-configs","Configurations section in menu",1,(SELECT NOW()));
INSERT INTO `front` (nom, comment, state, modification) VALUES ("website-info","Host & Last connexion",1,(SELECT NOW()));
INSERT INTO `front` (nom, comment, state, modification) VALUES ("website-theme","Theme Dark/White",1,(SELECT NOW()));

CREATE TABLE IF NOT EXISTS `alertes`
(
    `id` INT(1) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `mail` INT(1),
    `mailModification` DATETIME,
    `menu` INT(1),
    `menuModification` DATETIME,
    `seuil` INT(1),
    `seuilModification` DATETIME
);

INSERT INTO `alertes` (id, mail, mailModification, menu, menuModification, seuil, seuilModification) VALUES (1, 1, (SELECT NOW()), 1, (SELECT NOW()), 15, (SELECT  NOW()));