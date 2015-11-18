-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2015 a las 19:50:38
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `restaurante1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
`id` int(11) NOT NULL,
  `nombre` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_receta` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `direccion`, `telefono`, `id_receta`) VALUES
(2, 'Andres Lopez', 'Cll 34 # 65-24', 'Cll 34 # 65-24', 4),
(3, 'carlos vega', 'Cra 54 # 84 -36', '3135698117', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cocineros`
--

CREATE TABLE IF NOT EXISTS `cocineros` (
`id` int(11) NOT NULL,
  `nombre` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `empresa` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pais` char(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `cocineros`
--

INSERT INTO `cocineros` (`id`, `nombre`, `empresa`, `pais`) VALUES
(4, 'Felipe Dumas', 'Gato Dumas', 'Colombia'),
(5, 'Abdhala Sira', 'Beirut', 'Líbano'),
(10, 'Steven Dickson', 'Hilton', 'USA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE IF NOT EXISTS `recetas` (
`id` int(11) NOT NULL,
  `nombre` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `indicaciones` text COLLATE utf8_unicode_ci,
  `id_cocinero` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`id`, `nombre`, `indicaciones`, `id_cocinero`) VALUES
(3, 'POLLO TERIYAKI A LAS FINAS HIERBAS.', 'Ingredientes :\r\n 	\r\n	3 cucharadas de caldo de pollo (bajo de sal)\r\n	2 cucharadas de vino blanco seco\r\n	1 cucharada de azúcar rubia\r\n	1 cucharada de ajo, molido o triturado\r\n	1 cucharada de kion o jengibre fresco, picado\r\n	1 cucharada de sillao o salsa de soya, aproximadamente\r\n	1 cucharadita de vinagre balsámico\r\n	Gotas de jugo de limón\r\n	2 filetes de pechuga de pollo, deshuesados y sin piel\r\n	2 cucharadas de aceite vegetal\r\n	1 taza de brócoli cortado en ramitos\r\n	½ taza de pimiento rojo, sin semillas ni venas, picado en dados\r\n	½ taza de champiñones, cortados en tajadas\r\n	½ ají amarillo fresco, sin semillas ni venas, picado\r\n	½ taza de cebolla, picada\r\n	½ taza de frejolito chino, limpio\r\n	Sal\r\n	Pimienta\r\n\r\n   Preparación:\r\n\r\n\r\nMezclar el caldo de pollo, vino blanco, el azúcar rubia, 1 cucharadita del ajo, 1 cucharadita del kion o jengibre, sillao, vinagre, jugo de limón en un recipiente. Reservar.\r\n\r\nSazonar los filetes de pollo y sellarlos por ambos lados, en una sartén con 1 cucharada del aceite o hasta que estén dorados (aproximadamente 3 – 4 minutos por lado).\r\nDesglasar la sartén con la mezcla del caldo y llevar a hervir a fuego lento hasta que tome la consistencia de una salsa. \r\nRetirar los filetes y la salsa de la sartén y reservar cubierto para que no se enfríe. Limpiar la sartén con papel absorbente.\r\n\r\n\r\n\r\nCalentar el resto del aceite en la sartén y agregar los ramitos de brócoli, el ají picado, el pimiento, los champiñones, la cebolla picada y el resto del ajo y el kion o jengibre. Cocinar, moviendo, hasta que las verduras estén al dente o crocantes. Retirar la sartén del fuego y agregar el frejolito chino.\r\nColocar los filetes de pechuga en 2 platos y servir con las verduras saltadas y con arroz blanco.\r\n', 4),
(4, 'CHULETAS DE CERDO CON SALSA AL WHISKY', 'Ingredientes :\r\n 	\r\n	4 chuletas de cerdo\r\n	Harina, para enharinar las chuletas\r\n	1 cucharadas de aceite de oliva\r\n	1 cucharada de ajo, finamente picado\r\n	1 taza de cebolla china (parte blanca y verde clara), finamente picada\r\n	2 cucharadas de mantequilla\r\n	¼ de taza de azúcar rubia\r\n	1 ½ taza de caldo de pollo\r\n	1/3 de taza de whisky\r\n	1 cucharada de vinagre\r\n	2 cucharadas de crema de leche\r\n	Sal\r\n	Pimienta\r\n\r\n   Preparación:\r\n\r\nSazonar las chuletas con pimienta y pasarlas ligeramente por harina. Calentar el aceite de oliva en una sartén y dorar las chuletas por un lado. Cuando estén bien doradas, voltearlas, tapar la sartén y llevarlas al horno precalentado a 425ºF (220ºC) durante 10 minutos, aproximadamente. Retirar las chuletas y mantenerlas tibias. \r\n\r\nColocar la mantequilla con el azúcar en una olla y hacer un caramelo. Agregar la cebollita, el vinagre y el whisky y llevar a hervir unos minutos. Agregar el caldo de pollo, llevar a hervir y regresar las chuletas a la olla. Cocinar hasta que estén bien tiernas. Sazonar al gusto con sal y pimienta. \r\n\r\nAntes de servir, agregar la crema de leche y mezclar.', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
 ADD PRIMARY KEY (`id`), ADD KEY `IX_Relationship6` (`id_receta`);

--
-- Indices de la tabla `cocineros`
--
ALTER TABLE `cocineros`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
 ADD PRIMARY KEY (`id`), ADD KEY `IX_Relationship5` (`id_cocinero`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `cocineros`
--
ALTER TABLE `cocineros`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
ADD CONSTRAINT `Relationship6` FOREIGN KEY (`id_receta`) REFERENCES `recetas` (`id`);

--
-- Filtros para la tabla `recetas`
--
ALTER TABLE `recetas`
ADD CONSTRAINT `Relationship5` FOREIGN KEY (`id_cocinero`) REFERENCES `cocineros` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
