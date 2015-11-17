/*
Created: 17/11/2015
Modified: 17/11/2015
Model: MySQL 5.0
Database: MySQL 5.0
*/


-- Create tables section -------------------------------------------------

-- Table clientes

CREATE TABLE `clientes`
(
  `id` Int(11) NOT NULL AUTO_INCREMENT,
  `nombre` Char(20),
  `direccion` Char(20),
  `telefono` Char(20),
  `id_receta` Int(11),
  PRIMARY KEY (`id`)
)
;

CREATE INDEX `IX_Relationship6` ON `clientes` (`id_receta`)
;

-- Table recetas

CREATE TABLE `recetas`
(
  `id` Int(11) NOT NULL AUTO_INCREMENT,
  `nombres` Char(20),
  `indicaciones` Char(20),
  `id_cocinero` Int(11),
  PRIMARY KEY (`id`)
)
;

CREATE INDEX `IX_Relationship5` ON `recetas` (`id_cocinero`)
;

-- Table cocineros

CREATE TABLE `cocineros`
(
  `id` Int(11) NOT NULL AUTO_INCREMENT,
  `nombre` Char(20),
  `Empresa` Char(20),
  `pais` Char(20),
  PRIMARY KEY (`id`)
)
;

-- Create relationships section ------------------------------------------------- 

ALTER TABLE `recetas` ADD CONSTRAINT `Relationship5` FOREIGN KEY (`id_cocinero`) REFERENCES `cocineros` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `clientes` ADD CONSTRAINT `Relationship6` FOREIGN KEY (`id_receta`) REFERENCES `recetas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

