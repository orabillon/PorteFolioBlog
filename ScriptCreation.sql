
CREATE TABLE `BlogPorteFolio`.`Articles` ( `idArticle` INT NOT NULL AUTO_INCREMENT , `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `titre` TEXT NOT NULL , `sousTitre` TEXT NULL DEFAULT NULL , `description` TEXT NULL DEFAULT NULL , `article` TEXT NOT NULL , `themeId` INT NOT NULL , PRIMARY KEY (`idArticle`)) ENGINE = InnoDB;

CREATE TABLE `BlogPorteFolio`.`Projets` ( `idProjet` INT NOT NULL AUTO_INCREMENT , `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `titre` TEXT NOT NULL , `lienTest` TEXT NULL DEFAULT NULL, `description` TEXT NOT NULL , `techno` TEXT NULL DEFAULT NULL , PRIMARY KEY (`idProjet`)) ENGINE = InnoDB;

CREATE TABLE `BlogPorteFolio`.`Theme` ( `idTheme` INT NOT NULL AUTO_INCREMENT , `theme` VARCHAR(70) NOT NULL , `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `url` VARCHAR(70) NOT NULL, PRIMARY KEY (`idTheme`)) ENGINE = InnoDB;

CREATE TABLE `BlogPorteFolio`.`Images` ( `idImage` INT NOT NULL AUTO_INCREMENT , `image` TEXT NOT NULL , `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `articleId` INT NULL DEFAULT NULL , `projetId` INT NULL DEFAULT NULL , PRIMARY KEY (`idImage`)) ENGINE = InnoDB;

CREATE TABLE `BlogPorteFolio`.`Users` ( `idUser` INT NOT NULL AUTO_INCREMENT , `pseudo` VARCHAR(30) NOT NULL , `email` VARCHAR(100) NOT NULL , `secret` TEXT NOT NULL , `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `blocked` INT NOT NULL DEFAULT '0' , `password` TEXT NOT NULL , `roleId` INT NOT NULL DEFAULT '1' , PRIMARY KEY (`idUser`)) ENGINE = InnoDB;

CREATE TABLE `BlogPorteFolio`.`Role` ( `idRole` INT NOT NULL AUTO_INCREMENT , `role` VARCHAR(100) NOT NULL , `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`idRole`)) ENGINE = InnoDB;


INSERT INTO `Role` (`role`) VALUES ('user'), ('admin');
INSERT INTO `Users` (`idUser`, `pseudo`, `email`, `secret`, `date`, `blocked`, `password`, `roleId`) VALUES (NULL, 'ORA', 'ora@mail.fr', 'aa', CURRENT_TIMESTAMP, '0', 'aa', '1');

INSERT INTO `Theme` (`idTheme`, `theme`, `date` , `url`) VALUES (NULL, 'Santé et bien-être', CURRENT_TIMESTAMP, 'SanteEtBienEtre'),(NULL, 'Vie de parent', CURRENT_TIMESTAMP, 'VieDeParent'),(NULL, 'Jouets et activités', CURRENT_TIMESTAMP, 'JouetsEtActivites'),(NULL, 'Mode et accessoires', CURRENT_TIMESTAMP, 'ModeEtAccessoires'),(NULL, 'Idées de cadeaux', CURRENT_TIMESTAMP, 'IdeesDeCadeaux'),(NULL, 'Histoires de maman', CURRENT_TIMESTAMP, 'HistoiresDeMaman')
