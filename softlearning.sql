-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2023 a las 10:48:08
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `softlearning`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `author` varchar(50) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `editorial` varchar(20) NOT NULL,
  `pages` int(11) NOT NULL,
  `language` varchar(20) NOT NULL,
  `format` varchar(20) NOT NULL,
  `weight` int(11) NOT NULL,
  `dimensions` varchar(20) NOT NULL,
  `publication_date` date NOT NULL,
  `available_date` date NOT NULL,
  `genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `books`
--

INSERT INTO `books` (`id`, `name`, `description`, `price`, `author`, `isbn`, `editorial`, `pages`, `language`, `format`, `weight`, `dimensions`, `publication_date`, `available_date`, `genre`) VALUES
(1, 'El viaje de chihiro', 'Peter pan va sobre un niño que nunca crecia y luego le pasan cosas.', 20, 'Joaquin Pereira', '978-84-376-0494-7', 'Anaya', 200, 'Español', 'Tapa dura', 500, '20x15x2', '2022-12-29', '0000-00-00', 'Fantasia'),
(2, 'asdasa', 'Algo de algo de algo de algo de algo de algo', 10, 'La oreja de van gogh', '978-84-376-0494-8', 'Anaya', 123, 'Castellano', 'Fisico', 2, 'Algo de algo de algo', '2000-06-02', '2023-07-02', 'Fantasía'),
(3, 'El libro del programador', 'Algo de algo de algo de algo de algo de algo', 14, 'Aitor Menta', '978-84-376-0494-9', 'Anaya', 1234, 'Castellano', 'Fisico', 20, 'Algo de algo de algo', '2000-06-02', '0000-00-00', 'Fantasía');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `ident` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`client_id`, `name`, `ident`, `phone`, `email`, `address`, `birthday`) VALUES
(1, 'Alvaro', '12345678A', '444777444', 'a.salas@gmail.com', 'La calle de al lado n5', '1998-07-17'),
(2, 'aaa', '33333333A', '888888888', 'a.lejandro2@gmail.com', 'Alguna calle de por ahi', '2000-07-07'),
(3, 'Ethan', '22222222A', '343344343', 'et.han@gmail.com', 'Alguna calle de por ahi 2', '1996-07-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `level` int(10) UNSIGNED DEFAULT 1,
  `points` int(10) UNSIGNED DEFAULT 0,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `level`, `points`, `password`) VALUES
(1, 'Haku', 3, 2200, 'Haku'),
(2, 'Choice', 3, 2000, 'Choice'),
(3, 'Near', 2, 1700, 'Near'),
(4, 'Rayleigh', 1, 1500, 'Rayleigh'),
(5, 'Minatozaki', 1, 1400, 'Minatozaki'),
(6, 'Cynox', 1, 0, 'Cynox');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `client_id` (`client_id`),
  ADD UNIQUE KEY `ident` (`ident`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
