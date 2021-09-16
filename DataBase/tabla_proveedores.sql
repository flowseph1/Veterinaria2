-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2021 at 04:25 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `veterinaria`
--

-- --------------------------------------------------------

--
-- Table structure for table `proveedores`
--

CREATE TABLE `proveedores` (
  `Id_Proveedor` int(6) NOT NULL,
  `RTN_Proveedor` varchar(16) NOT NULL,
  `Nombre_Legal` varchar(200) NOT NULL,
  `Direccion_Proveedor` varchar(200) NOT NULL,
  `Telefono_Proveedor` int(8) NOT NULL,
  `Estado_Proveedor` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proveedores`
--

INSERT INTO `proveedores` (`Id_Proveedor`, `RTN_Proveedor`, `Nombre_Legal`, `Direccion_Proveedor`, `Telefono_Proveedor`, `Estado_Proveedor`) VALUES
(1, '08012006091278', 'Drogeria Contreras', 'Col Kennedy, 5ta entrada', 22553423, 1),
(2, '08022020754638', 'Comercial Mascota', '10Km Salida al Sur despues de Loarque', 34546789, 1),
(3, '08012015574839', 'Eyl Comercial', 'Colonia Palmira, frente a Hospital el Carmen', 33234565, 1),
(4, '08029005547329', 'FarSiman', 'Blvd Morazan', 58473829, 0),
(5, '08016564684651', 'Suplidora Royal', 'Barrio El Centro', 22365698, 1),
(6, '08012646184654', 'CODIS', 'Col. El Rincon', 25668456, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`Id_Proveedor`),
  ADD UNIQUE KEY `RTN_Proveedor` (`RTN_Proveedor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `Id_Proveedor` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
