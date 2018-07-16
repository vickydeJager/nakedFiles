CREATE DATABASE IF NOT EXISTS `nakedfiles` CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `nakedfiles`;

CREATE TABLE IF NOT EXISTS files ( 
    `id` INT(6) AUTO_INCREMENT PRIMARY KEY,  
    `imageId` INT(6) NULL,
    `name` VARCHAR(250) NOT NULL,  
    `mime` VARCHAR(50) NOT NULL DEFAULT 'text/plain',  /*type*/
    `size` BIGINT NOT NULL DEFAULT '0',  
    `data` LONGBLOB NOT NULL,  
    `path` VARCHAR(250) NOT NULL,
    `created` DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS images ( 
    `id` INT(6) AUTO_INCREMENT PRIMARY KEY,  
    `name` VARCHAR(250) NOT NULL,  
    `mime` VARCHAR(50) NOT NULL DEFAULT 'text/plain',  
    `size` BIGINT NOT NULL DEFAULT '0',  
    `data` LONGBLOB NOT NULL,  
    `path` VARCHAR(250) NOT NULL
);

CREATE TABLE IF NOT EXISTS fileTypes ( 
    `id` INT(6) AUTO_INCREMENT PRIMARY KEY,  
    `name` VARCHAR(250) NOT NULL,  
    `extension` VARCHAR(10) NOT NULL DEFAULT '.txt'
    /*`icon`  
    `path`*/
);

INSERT INTO fileTypes (`name`, `extension`)
VALUES ('Plain Text File','.txt'),
VALUES ('Microsoft Word Document','.doc'),
VALUES ('Microsoft Word Open XML Document','.docx'),
VALUES ('Portable Document Format','.pdf');


CREATE TABLE IF NOT EXISTS imageTypes ( 
    `id` INT(6) AUTO_INCREMENT PRIMARY KEY,  
    `name` VARCHAR(250) NOT NULL,  
    `extension` VARCHAR(10) NOT NULL DEFAULT '.png'  
);

/*INSERT INTO imageTypes (`name`, `extension`)
VALUES ('','')*/