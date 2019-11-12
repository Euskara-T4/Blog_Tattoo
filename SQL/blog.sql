-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2019 a las 11:41:43
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `argazkia`
--

CREATE TABLE `argazkia` (
  `id_img` int(2) NOT NULL,
  `id_gaia` int(2) NOT NULL,
  `izena` varchar(50) NOT NULL,
  `url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `argazkia`
--

INSERT INTO `argazkia` (`id_img`, `id_gaia`, `izena`, `url`) VALUES
(1, 1, 'hotsoa', '../images/tattoos/animaliak/01.jpg'),
(3, 1, 'buho', '../images/tattoos/animaliak/02.jpg'),
(4, 2, 'cuervo', '../images/tattoos/zuribeltz/02.jpg'),
(5, 2, 'lobo y chica', '../images/tattoos/zuribeltz/03.jpg'),
(6, 3, 'yin yang', '../images/tattoos/koloreak/01.jpg'),
(7, 3, 'larrosa', '../images/tattoos/koloreak/02.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `erabiltzailea`
--

CREATE TABLE `erabiltzailea` (
  `erabiltzaile_iz` varchar(20) NOT NULL,
  `izena` varchar(20) NOT NULL,
  `abizena` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pasahitza` varchar(100) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `erabiltzailea`
--

INSERT INTO `erabiltzailea` (`erabiltzaile_iz`, `izena`, `abizena`, `email`, `pasahitza`, `admin`) VALUES
('admin', 'admin', 'admin', 'admin@admin.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 2),
('anderP', 'ander', 'perez', 'alex@hotmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 0),
('nahia19', 'nahia', 'magu', 'nahia19@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1),
('prueba', 'pruebas', 'prueba', 'pruebas@hotmail.com', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 0),
('ruedaslocas', 'alex', 'mendiluce', 'mendiluce3@hotmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gaia`
--

CREATE TABLE `gaia` (
  `id_gaia` int(2) NOT NULL,
  `erabiltzaile_iz` varchar(20) DEFAULT NULL,
  `titulua` varchar(100) NOT NULL,
  `laburpena` varchar(1000) NOT NULL,
  `deskribapena` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gaia`
--

INSERT INTO `gaia` (`id_gaia`, `erabiltzaile_iz`, `titulua`, `laburpena`, `deskribapena`) VALUES
(1, 'admin', 'animaliak', 'Animaliei buruzko argazkiak jarriko ditugu atal honetan; adibidez, hotsoak, zaldiak, lehoiak ... ', 'leku honetan ikusiko dugu nola animalietako tatuak bizitza artzen duten.'),
(2, 'nahia19', 'zuri beltzean', 'Tatuaje hauek zuri beltzean izango dira denak', 'ikusiko dugu nola zuri beltzekin lortu al dugun realismo gustiak, texturak eta nola ez dela behar koloreak tatu bat destakatzeko'),
(3, 'ruedaslocas', 'koloreak', 'tatu bizitza koloreekin', 'hemen ikusiko dugu nola lortu kolore biziak tatuetan eta nola konbinatu beltzeekin ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iruzkina`
--

CREATE TABLE `iruzkina` (
  `id_iruzkina` int(2) NOT NULL,
  `erabiltzaile_iz` varchar(20) DEFAULT NULL,
  `id_gaia` int(2) DEFAULT NULL,
  `iruzkina` varchar(500) NOT NULL,
  `sortze_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `iruzkina`
--

INSERT INTO `iruzkina` (`id_iruzkina`, `erabiltzaile_iz`, `id_gaia`, `iruzkina`, `sortze_data`) VALUES
(6, 'anderP', 1, 'hola este es mi nuevo comentario', '2019-11-12'),
(7, 'anderP', 2, 'quiero hacer un comentario ', '2019-11-12'),
(8, 'anderP', 3, 'buaaaaa que tatu mas guaaapoo!!!!! yo quiero', '2019-11-12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `argazkia`
--
ALTER TABLE `argazkia`
  ADD PRIMARY KEY (`id_img`),
  ADD KEY `id_gaia` (`id_gaia`);

--
-- Indices de la tabla `erabiltzailea`
--
ALTER TABLE `erabiltzailea`
  ADD PRIMARY KEY (`erabiltzaile_iz`);

--
-- Indices de la tabla `gaia`
--
ALTER TABLE `gaia`
  ADD PRIMARY KEY (`id_gaia`),
  ADD KEY `id_usuario` (`erabiltzaile_iz`);

--
-- Indices de la tabla `iruzkina`
--
ALTER TABLE `iruzkina`
  ADD PRIMARY KEY (`id_iruzkina`),
  ADD KEY `id_erabiltzaile` (`erabiltzaile_iz`),
  ADD KEY `id_gaia` (`id_gaia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `argazkia`
--
ALTER TABLE `argazkia`
  MODIFY `id_img` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `gaia`
--
ALTER TABLE `gaia`
  MODIFY `id_gaia` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `iruzkina`
--
ALTER TABLE `iruzkina`
  MODIFY `id_iruzkina` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gaia`
--
ALTER TABLE `gaia`
  ADD CONSTRAINT `gaia_ibfk_1` FOREIGN KEY (`erabiltzaile_iz`) REFERENCES `erabiltzailea` (`erabiltzaile_iz`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `iruzkina`
--
ALTER TABLE `iruzkina`
  ADD CONSTRAINT `iruzkina_ibfk_1` FOREIGN KEY (`erabiltzaile_iz`) REFERENCES `erabiltzailea` (`erabiltzaile_iz`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `iruzkina_ibfk_2` FOREIGN KEY (`id_gaia`) REFERENCES `gaia` (`id_gaia`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
