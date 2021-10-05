-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2021 a las 18:32:43
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carritobaco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `ID` int(11) NOT NULL,
  `IDVenta` int(11) NOT NULL,
  `IDProducto` int(11) NOT NULL,
  `PrecioUnitario` decimal(20,2) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Descargado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`ID`, `IDVenta`, `IDProducto`, `PrecioUnitario`, `Cantidad`, `Descargado`) VALUES
(1, 1, 1, '1000.00', 1, 0),
(2, 4, 1, '300.00', 1, 0),
(3, 5, 1, '300.00', 1, 0),
(4, 6, 1, '300.00', 1, 0),
(5, 7, 1, '300.00', 1, 0),
(6, 8, 1, '300.00', 1, 0),
(7, 9, 1, '300.00', 1, 0),
(8, 10, 1, '300.00', 1, 0),
(9, 11, 1, '300.00', 1, 0),
(10, 12, 2, '420.00', 1, 0),
(11, 13, 2, '420.00', 1, 0),
(12, 14, 2, '420.00', 1, 0),
(13, 15, 2, '420.00', 1, 0),
(14, 16, 2, '420.00', 1, 0),
(15, 17, 2, '420.00', 1, 0),
(16, 18, 2, '420.00', 1, 0),
(17, 19, 2, '420.00', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` decimal(20,2) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `descripcion`, `imagen`) VALUES
(1, 'Learn PHP 7', '300.00', 'This new book on PHP 7 introduces writing solid, secure, object-oriented code in the new PHP 7: you will create a complete three-tier application using a natural process of building and testing modules within each tier. This practical approach teaches you about app development and introduces PHP features when they are actually needed rather than providing you with abstract theory and contrived examples.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/4842/9781484217290.jpg'),
(2, 'Professional ASP.NET MVC 5', '420.00', 'MVC 5 is the newest update to the popular Microsoft technology that enables you to build dynamic, data-driven websites. Like previous versions, this guide shows you step-by-step techniques on using MVC to best advantage, with plenty of practical tutorials to illustrate the concepts. It covers controllers, views, and models; forms and HTML helpers; data annotation and validation; membership, authorization, and security.', 'https://images-na.ssl-images-amazon.com/images/I/51u-ERS1W8L._SX396_BO1,204,203,200_.jpg'),
(3, 'Learning Vue.js 2', '849.99', '* Learn how to propagate DOM changes across the website without writing extensive jQuery callbacks code.\r\n* Learn how to achieve reactivity and easily compose views with Vue.js and understand what it does behind the scenes.\r\n* Explore the core features of Vue.js with small examples, learn how to build dynamic content into preexisting web applications, and build Vue.js applications from scratch.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/7864/9781786469946.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `ID` int(11) NOT NULL,
  `ClaveTransaccion` varchar(255) NOT NULL,
  `PaypalDatos` text NOT NULL,
  `Fecha` datetime NOT NULL,
  `Correo` varchar(5000) NOT NULL,
  `Total` decimal(60,2) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`ID`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, `Status`) VALUES
(1, '12345678910', '', '2021-10-04 19:43:54', 'levi.rosales@ceict.edu.gt', '700.00', 'pendiente'),
(2, 'gjj8srv4cljnmasok8dl388jp0', '', '2021-10-04 22:37:46', 'alejandro.rosales@gmail.com', '1269.99', 'pendiente'),
(3, 'gjj8srv4cljnmasok8dl388jp0', '', '2021-10-04 22:39:01', 'levi.rosales@ceict.edu.gt', '1569.99', 'pendiente'),
(4, 'gjj8srv4cljnmasok8dl388jp0', '', '2021-10-04 23:22:18', 'levirosales@hotmail.com', '300.00', 'pendiente'),
(5, 'gjj8srv4cljnmasok8dl388jp0', '', '2021-10-04 23:30:35', 'andrea.monzon@ceict.edu.gt', '300.00', 'pendiente'),
(6, 'gjj8srv4cljnmasok8dl388jp0', '', '2021-10-04 23:31:19', 'andrea.monzon@ceict.edu.gt', '300.00', 'pendiente'),
(7, 'gjj8srv4cljnmasok8dl388jp0', '', '2021-10-04 23:31:42', 'andrea.monzon@ceict.edu.gt', '300.00', 'pendiente'),
(8, 'gjj8srv4cljnmasok8dl388jp0', '', '2021-10-05 00:07:57', 'andrea.monzon@ceict.edu.gt', '300.00', 'pendiente'),
(9, 'gjj8srv4cljnmasok8dl388jp0', '', '2021-10-05 00:24:28', 'andrea.monzon@ceict.edu.gt', '300.00', 'pendiente'),
(10, 'gjj8srv4cljnmasok8dl388jp0', '', '2021-10-05 00:24:38', 'andrea.monzon@ceict.edu.gt', '300.00', 'pendiente'),
(11, 'gjj8srv4cljnmasok8dl388jp0', '', '2021-10-05 01:49:32', 'andrea.monzon@ceict.edu.gt', '300.00', 'pendiente'),
(12, 'gjj8srv4cljnmasok8dl388jp0', '', '2021-10-05 01:50:23', 'walterlevi98@gmail.com', '420.00', 'pendiente'),
(13, 'gjj8srv4cljnmasok8dl388jp0', '', '2021-10-05 01:52:43', 'walterlevi98@gmail.com', '420.00', 'pendiente'),
(14, 'gjj8srv4cljnmasok8dl388jp0', '', '2021-10-05 01:53:13', 'walterlevi98@gmail.com', '420.00', 'pendiente'),
(15, 'gjj8srv4cljnmasok8dl388jp0', '', '2021-10-05 01:53:29', 'walterlevi98@gmail.com', '420.00', 'pendiente'),
(16, 'gjj8srv4cljnmasok8dl388jp0', '', '2021-10-05 01:55:17', 'walterlevi98@gmail.com', '420.00', 'pendiente'),
(17, 'gjj8srv4cljnmasok8dl388jp0', '', '2021-10-05 01:56:01', 'walterlevi98@gmail.com', '420.00', 'pendiente'),
(18, 'gjj8srv4cljnmasok8dl388jp0', '', '2021-10-05 01:57:07', 'walterlevi98@gmail.com', '420.00', 'pendiente'),
(19, 'gjj8srv4cljnmasok8dl388jp0', '', '2021-10-05 01:57:25', 'walterlevi98@gmail.com', '420.00', 'pendiente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDVenta` (`IDVenta`),
  ADD KEY `IDProducto` (`IDProducto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`IDVenta`) REFERENCES `ventas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalleventa_ibfk_2` FOREIGN KEY (`IDProducto`) REFERENCES `productos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
