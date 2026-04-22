-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2026 at 03:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

CREATE DATABASE IF NOT EXISTS `sistema_incidencias` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sistema_incidencias`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema_incidencias`
--

-- --------------------------------------------------------

--
-- Table structure for table `incidencia`
--

CREATE TABLE `incidencia` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `prioridad` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `incidencia`
--

INSERT INTO `incidencia` (`id`, `id_usuario`, `titulo`, `descripcion`, `prioridad`) VALUES
(1, 7, 'Error en exportación a PDF', 'Al exportar un reporte a PDF, el archivo se descarga vacío o con datos incompletos.', 'Media'),
(2, 12, 'Calculos realizados incorrectos', 'La suma de los detalles de la factura debería ser $100, pero el sistema\r\nmuestra $110.', 'Alta'),
(3, 7, 'Error en exportación a PDF', 'Al exportar un reporte a PDF, el archivo se descarga vacío o con datos incompletos.', 'Media'),
(4, 12, 'Calculos realizados incorrectos', 'La suma de los detalles de la factura debería ser $100, pero el sistema\r\nmuestra $110.', 'Alta');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(35) NOT NULL,
  `clave` varchar(35) NOT NULL,
  `nombre` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`, `nombre`) VALUES
(1, 'admin_web', 'p@ssword_2026', 'Pedro Páramo'),
(2, 'admin_web', 'p@ssword_2026', 'Pedro Páramo'),
(3, 'g_web_Anibal', 'inci2026@', 'Anibal Cruz'),
(4, 'jFloresPam', '2026@flores', 'Juanes Flores'),
(5, 'svalen78', 'web2026@', 'Valentina Sandobalin'),
(6, 'carlos.sanchez23', '@apps_web2026', 'Carlos Sánchez'),
(7, 'ana_torres87', 'fis@2026', 'Ana Torres'),
(8, 'admin_web', 'p@ssword_2026', 'Pedro Páramo'),
(9, 'g_web_Anibal', 'inci2026@', 'Anibal Cruz'),
(10, 'jFloresPam', '2026@flores', 'Juanes Flores'),
(11, 'svalen78', 'web2026@', 'Valentina Sandobalin'),
(12, 'carlos.sanchez23', '@apps_web2026', 'Carlos Sánchez'),
(13, 'ana_torres87', 'fis@2026', 'Ana Torres');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `incidencia`
--
ALTER TABLE `incidencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `incidencia`
--
ALTER TABLE `incidencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `incidencia`
--
ALTER TABLE `incidencia`
  ADD CONSTRAINT `incidencia_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
