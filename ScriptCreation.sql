
CREATE TABLE `BlogPorteFolio`.`Articles` ( `idArticle` INT NOT NULL AUTO_INCREMENT , `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `titre` TEXT NOT NULL , `sousTitre` TEXT NULL DEFAULT NULL , `description` TEXT NULL DEFAULT NULL , `article` TINYINT NOT NULL , `themeId` INT NOT NULL , PRIMARY KEY (`idArticle`)) ENGINE = InnoDB;

CREATE TABLE `BlogPorteFolio`.`Projets` ( `idProjet` INT NOT NULL AUTO_INCREMENT , `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `titre` TEXT NOT NULL , `lienTest` TEXT NULL DEFAULT NULL, `description` TEXT NOT NULL , `techno` TEXT NULL DEFAULT NULL , PRIMARY KEY (`idProjet`)) ENGINE = InnoDB;

CREATE TABLE `BlogPorteFolio`.`Theme` ( `idTheme` INT NOT NULL AUTO_INCREMENT , `theme` VARCHAR(70) NOT NULL , `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`idTheme`)) ENGINE = InnoDB;

CREATE TABLE `BlogPorteFolio`.`Images` ( `idImage` INT NOT NULL AUTO_INCREMENT , `image` TEXT NOT NULL , `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `articleId` INT NULL DEFAULT NULL , `projetId` INT NULL DEFAULT NULL , PRIMARY KEY (`idImage`)) ENGINE = InnoDB;

CREATE TABLE `BlogPorteFolio`.`Users` ( `idUser` INT NOT NULL AUTO_INCREMENT , `pseudo` VARCHAR(30) NOT NULL , `email` VARCHAR(100) NOT NULL , `secret` TEXT NOT NULL , `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `blocked` INT NOT NULL DEFAULT '0' , `password` TEXT NOT NULL , `roleId` INT NOT NULL DEFAULT '1' , PRIMARY KEY (`idUser`)) ENGINE = InnoDB;

CREATE TABLE `BlogPorteFolio`.`Role` ( `idRole` INT NOT NULL AUTO_INCREMENT , `role` VARCHAR(100) NOT NULL , `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`idRole`)) ENGINE = InnoDB;


INSERT INTO `Role` (`role`) VALUES ('user'), ('admin');
INSERT INTO `Users` (`idUser`, `pseudo`, `email`, `secret`, `date`, `blocked`, `password`, `roleId`) VALUES (NULL, 'ORA', 'ora@mail.fr', 'aa', CURRENT_TIMESTAMP, '0', 'aa', '1');