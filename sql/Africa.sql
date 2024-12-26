create database AfricaV2
     ;


 create table Role(
     id_role int not null auto_increment,
     type_name varchar(50) not null,
     primary key (id_role));
CREATE TABLE User (
         id INT NOT NULL AUTO_INCREMENT,
         FirstName VARCHAR(50) NOT NULL,
         LastName VARCHAR(50) NOT NULL,
         Password VARCHAR(50) NOT NULL,
         Email VARCHAR(250) NOT NULL,
         id_role INT,
         PRIMARY KEY (id)
     );

 CREATE TABLE `Pays` (
       `id_pays` INT NOT NULL AUTO_INCREMENT,
       `name` VARCHAR(50) NULL,
       `population` INT DEFAULT NULL,
       `langues` VARCHAR(50) DEFAULT NULL,
       `description` TEXT DEFAULT NULL,
       `id_continent` INT DEFAULT NULL,
       PRIMARY KEY (`id_pays`)
     );
CREATE TABLE `continent` (
       `id_continent` INT NOT NULL AUTO_INCREMENT,
       `name` VARCHAR(50) DEFAULT NULL,
       `Nombre_pays` VARCHAR(50) DEFAULT NULL,
       PRIMARY KEY (`id_continent`)
     );

 CREATE TABLE `Ville` (
       `id_ville` INT NOT NULL AUTO_INCREMENT,
       `name` VARCHAR(50) DEFAULT NULL,
       `description` TEXT DEFAULT NULL,
       `id_pays` INT DEFAULT NULL,
       `type_Ville` ENUM('capitale', 'autre') DEFAULT 'autre',
       PRIMARY KEY (`id_ville`),
       FOREIGN KEY (`id_pays`) REFERENCES `Pays`(`id_pays`) ON DELETE CASCADE ON UPDATE CASCADE
     );

 ALTER TABLE `Pays`
     ADD CONSTRAINT `FK_Pays_Continent` 
     FOREIGN KEY (`id_continent`) REFERENCES `continent`(`id_continent`)
     ON DELETE SET NULL
     ON UPDATE CASCADE;

ALTER TABLE `Ville`
     ADD CONSTRAINT FK_Ville_Pays
     FOREIGN KEY (`id_pays`) REFERENCES `Pays`(`id_pays`)
     ON DELETE CASCADE
     ON UPDATE CASCADE;

ALTER TABLE Pays ADD Image VARCHAR(255);
ALTER TABLE Ville ADD Image VARCHAR(255);
ALTER TABLE User ADD FOREIGN KEY (id_role) REFERENCES Role(id_role);


 ALTER TABLE User RENAME id TO id_user;
ALTER TABLE continent ADD Image VARCHAR(255);