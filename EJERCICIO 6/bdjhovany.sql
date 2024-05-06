-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2024 a las 06:18:05
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdjhovany`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentabancaria`
--

CREATE TABLE `cuentabancaria` (
  `idcuenta` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `tipo_cuenta` enum('ahorro','corriente','inversion') NOT NULL,
  `saldo` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuentabancaria`
--

INSERT INTO `cuentabancaria` (`idcuenta`, `persona_id`, `tipo_cuenta`, `saldo`) VALUES
(8, 2, 'ahorro', 600.00),
(9, 3, 'corriente', 40.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido_paterno` varchar(255) NOT NULL,
  `apellido_materno` varchar(255) DEFAULT NULL,
  `ci` varchar(20) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `departamento` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `rol` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `nombre`, `apellido_paterno`, `apellido_materno`, `ci`, `telefono`, `fecha_nacimiento`, `direccion`, `departamento`, `contraseña`, `rol`) VALUES
(1, 'Jhovany', 'Condori', 'Ticona', '8421052', '69868322', '2000-09-17', 'Ciudadela', 'La Paz', '123456', 1),
(2, 'Alan', 'Brito', 'Delgado', '33366699', '78831733', '1999-02-01', 'cena', 'Potosí', '123', 2),
(3, 'Maria ', 'Carvajal', 'Alarcon', '33366699', '78831733', '2001-08-17', 'Entre Rios', 'La Paz', '789', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion`
--

CREATE TABLE `transaccion` (
  `idtransaccion` int(11) NOT NULL,
  `cuenta_origen_id` int(11) DEFAULT NULL,
  `cuenta_destino_id` int(11) DEFAULT NULL,
  `tipo_transaccion` enum('deposito','transferencia','retiro') NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `transaccion`
--

INSERT INTO `transaccion` (`idtransaccion`, `cuenta_origen_id`, `cuenta_destino_id`, `tipo_transaccion`, `monto`, `fecha`) VALUES
(4, 8, NULL, 'deposito', 100.00, '2024-05-05 04:55:45'),
(5, 8, NULL, 'deposito', 52.00, '2024-05-05 04:55:51'),
(6, 8, NULL, 'retiro', 2.00, '2024-05-05 04:56:45'),
(7, 8, NULL, 'retiro', 10.00, '2024-05-05 04:56:50'),
(8, 8, 9, 'transferencia', 40.00, '2024-05-05 04:59:30'),
(9, 8, 9, 'transferencia', 40.00, '2024-05-05 04:59:30'),
(10, 8, NULL, 'deposito', 500.00, '2024-05-05 14:08:30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuentabancaria`
--
ALTER TABLE `cuentabancaria`
  ADD PRIMARY KEY (`idcuenta`),
  ADD KEY `persona_id` (`persona_id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`);

--
-- Indices de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD PRIMARY KEY (`idtransaccion`),
  ADD KEY `cuenta_origen_id` (`cuenta_origen_id`),
  ADD KEY `cuenta_destino_id` (`cuenta_destino_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuentabancaria`
--
ALTER TABLE `cuentabancaria`
  MODIFY `idcuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  MODIFY `idtransaccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuentabancaria`
--
ALTER TABLE `cuentabancaria`
  ADD CONSTRAINT `cuentabancaria_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`idpersona`);

--
-- Filtros para la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD CONSTRAINT `transaccion_ibfk_1` FOREIGN KEY (`cuenta_origen_id`) REFERENCES `cuentabancaria` (`idcuenta`),
  ADD CONSTRAINT `transaccion_ibfk_2` FOREIGN KEY (`cuenta_destino_id`) REFERENCES `cuentabancaria` (`idcuenta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
