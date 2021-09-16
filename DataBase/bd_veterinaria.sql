-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-09-2021 a las 02:39:00
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_productos`
--

CREATE TABLE `categoria_productos` (
  `Id_Categoria_Producto` int(6) NOT NULL,
  `Nombre_Categoria` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cirugia`
--

CREATE TABLE `cirugia` (
  `Id_Cirugia` int(6) NOT NULL,
  `Motivo_Cirugia` varchar(200) DEFAULT NULL,
  `Descripcion_Cirugia` varchar(250) NOT NULL,
  `Id_Mascota` int(6) NOT NULL,
  `Id_Personal` int(6) DEFAULT NULL,
  `Id_Servicio` int(6) NOT NULL,
  `Id_Producto` int(6) NOT NULL,
  `Id_Cita` int(6) DEFAULT NULL,
  `Fecha_Cirugia` date NOT NULL,
  `Hora_Cirugia` date NOT NULL,
  `Baja_Cirugia` binary(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `Id_Cita` int(10) NOT NULL,
  `Id_Cliente` int(6) NOT NULL,
  `Id_Mascota` int(6) NOT NULL,
  `Id_Veterinario` int(6) NOT NULL,
  `Fecha_Cita` date NOT NULL DEFAULT current_timestamp(),
  `Hora_Cita` time NOT NULL,
  `Motivo_Cita` varchar(200) NOT NULL,
  `Id_EstadoCita` int(6) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`Id_Cita`, `Id_Cliente`, `Id_Mascota`, `Id_Veterinario`, `Fecha_Cita`, `Hora_Cita`, `Motivo_Cita`, `Id_EstadoCita`) VALUES
(56, 1, 78, 1, '2021-09-10', '09:00:00', 'Dolor', 4),
(58, 48, 80, 1, '2021-09-10', '10:00:00', 'Caida', 4),
(59, 1, 81, 1, '2021-09-30', '13:00:00', 'Problemas Respiratorios', 4),
(60, 48, 80, 1, '2021-10-01', '09:00:00', 'Revision General', 4),
(61, 1, 78, 1, '2021-11-12', '09:00:00', 'Consulta General', 4),
(62, 1, 78, 1, '2021-09-07', '15:00:00', 'Mordida de perro.', 4),
(63, 1, 78, 1, '2021-09-10', '11:00:00', 'Consulta General.', 1),
(64, 48, 80, 1, '2021-09-10', '13:00:00', 'Dolor ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Id_Cliente` int(6) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Genero` varchar(50) NOT NULL,
  `Correo_Electronico` varchar(50) NOT NULL,
  `Id_Usuario` int(6) NOT NULL,
  `Estado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Id_Cliente`, `Nombre`, `Genero`, `Correo_Electronico`, `Id_Usuario`, `Estado`) VALUES
(1, 'Jose Miguel Acosta Carias', 'MASCULINO', 'jose.m.acosta1996@gmail.com', 1, 0),
(2, 'Luisa Maria Martinez Rodriguez', 'FEMENINO', 'luisamaria@gmail.com', 2, 0),
(3, 'Glorin Rubio', 'FEMENINO', 'stheprubio2000@gmail.com', 3, 0),
(4, 'Josue Zelaya', 'MASCULINO', 'josuezelaya0010@gmail.com', 4, 0),
(14, 'Katherine Gabriela Meza', 'FEMENINO', 'Kath@safari.com', 5, 0),
(48, 'Miguel Roberto Mendoza', 'MASCULINO', 'miguel@gmail.com', 83, 0),
(49, 'Patricia Cubas', 'FEMENINO', 'patricia@gmail.com', 84, 0),
(53, 'Andrea ReaÃ±os', 'FEMENINO', 'andrea@gmail.com', 100, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comportamiento`
--

CREATE TABLE `comportamiento` (
  `Id_Comportamiento` int(6) NOT NULL,
  `Descripcion_Comportamiento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comportamiento`
--

INSERT INTO `comportamiento` (`Id_Comportamiento`, `Descripcion_Comportamiento`) VALUES
(1, 'Normal'),
(2, 'Agresivo'),
(3, 'Inquieto'),
(4, 'Muestra Malestar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `Id_Compra` int(6) NOT NULL,
  `Fecha_Compra` date NOT NULL,
  `Id_Proveedor` int(6) NOT NULL,
  `Total_Compra` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicion_corporal`
--

CREATE TABLE `condicion_corporal` (
  `Id_Condicion` int(6) NOT NULL,
  `Descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `condicion_corporal`
--

INSERT INTO `condicion_corporal` (`Id_Condicion`, `Descripcion`) VALUES
(1, 'Muy Delgado'),
(2, 'Delgado'),
(3, 'Peso Ideal'),
(4, 'Sobrepeso'),
(5, 'Obesidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `Id_Consulta` int(6) NOT NULL,
  `Id_Historial` int(6) NOT NULL,
  `Id_Cliente` int(6) NOT NULL,
  `Id_Cita` int(6) NOT NULL,
  `Id_Mascota` int(6) NOT NULL,
  `Id_Personal` int(6) NOT NULL,
  `Id_Receta` int(6) NOT NULL,
  `Diagnostico_Consulta` varchar(200) NOT NULL,
  `Fecha_Consulta` date NOT NULL,
  `Baja_Consulta` binary(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumo_alimento`
--

CREATE TABLE `consumo_alimento` (
  `Id_ConsumoAlimento` int(6) NOT NULL,
  `Descripcion_ConsumoAlimento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consumo_alimento`
--

INSERT INTO `consumo_alimento` (`Id_ConsumoAlimento`, `Descripcion_ConsumoAlimento`) VALUES
(1, 'Normal'),
(2, 'Disminuido'),
(3, 'No Come');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos_proveedores`
--

CREATE TABLE `contactos_proveedores` (
  `Id_Contacto` int(6) NOT NULL,
  `Id_Proveedor` int(6) NOT NULL,
  `Nombre_Contacto` varchar(25) NOT NULL,
  `Apellidos_Contacto` int(25) NOT NULL,
  `Telefono_Celular` int(8) NOT NULL,
  `Correo_Electronico` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle de compra`
--

CREATE TABLE `detalle de compra` (
  `Id_Detalle_Compra` int(6) NOT NULL,
  `Id_Compra` int(6) NOT NULL,
  `Id_Producto` int(6) NOT NULL,
  `Cantidad_Producto` int(6) NOT NULL,
  `Id_Fabricante` int(11) NOT NULL,
  `Lote` int(11) NOT NULL,
  `Precio_Compra` float NOT NULL,
  `IVA_Compra` float NOT NULL,
  `Fecha_Vencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `Id_Detalle_Venta` int(6) NOT NULL,
  `Id_Venta` int(6) NOT NULL,
  `Id_Producto` int(6) NOT NULL,
  `Id_Servicio` int(6) NOT NULL,
  `Cantidad` int(6) NOT NULL,
  `SubTotal_Venta` int(11) NOT NULL,
  `IVA_Venta` int(11) NOT NULL,
  `Total_Venta` int(11) NOT NULL,
  `Exento_IVA` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedades`
--

CREATE TABLE `enfermedades` (
  `Id_Enfermedad` int(6) NOT NULL,
  `Descripcion_Enfermedad` varchar(50) NOT NULL,
  `Tratamiento_Enfermedad` int(6) DEFAULT NULL,
  `Medicamento_Enfermedad` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `enfermedades`
--

INSERT INTO `enfermedades` (`Id_Enfermedad`, `Descripcion_Enfermedad`, `Tratamiento_Enfermedad`, `Medicamento_Enfermedad`) VALUES
(1, 'Hongos', 7, 62),
(2, 'Virosis', 7, 62),
(3, 'Parvovirosis', 7, 62),
(4, 'Moquillo', 7, 62),
(5, 'Hepatitis', 7, 62),
(6, 'Laringotraqueitis', 7, 62),
(7, 'Gastroenteritis', 7, 62),
(8, 'Rabia', 7, 62),
(9, 'Leptospirosis', 7, 62),
(10, 'Tos de las Perreras', 7, 62),
(11, 'Parasitos', 7, 62),
(12, 'Leishmania', 7, 62),
(13, 'Filarias', 7, 62),
(14, 'Prueba Enfermedad', 7, 62),
(15, 'Prueba Enfermedad 2', 0, 0),
(16, 'Prueba Enfermedad 3', 7, 49);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadocitas`
--

CREATE TABLE `estadocitas` (
  `Id_EstadoCita` int(6) NOT NULL,
  `Estado_Cita` varchar(20) NOT NULL,
  `Descripcion_Cita` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadocitas`
--

INSERT INTO `estadocitas` (`Id_EstadoCita`, `Estado_Cita`, `Descripcion_Cita`) VALUES
(1, 'Pendiente', 'Cita pendiente de consulta.'),
(2, 'Realizada', 'Cita con consulta realizada correctamente.'),
(3, 'Cancelada', 'Cita cancelada.'),
(4, 'Preclinica', 'Cita con preclínica hecha, pendiente de consulta.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_animal`
--

CREATE TABLE `estado_animal` (
  `Id_EstadoAnimal` int(6) NOT NULL,
  `Descripcion_EstadoAnimal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_animal`
--

INSERT INTO `estado_animal` (`Id_EstadoAnimal`, `Descripcion_EstadoAnimal`) VALUES
(1, 'De Pie'),
(2, 'Postrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_caminar`
--

CREATE TABLE `estado_caminar` (
  `Id_EstadoCaminar` int(6) NOT NULL,
  `Descripcion_EstadoCaminar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_caminar`
--

INSERT INTO `estado_caminar` (`Id_EstadoCaminar`, `Descripcion_EstadoCaminar`) VALUES
(1, 'Renuente'),
(2, 'Vacilante'),
(3, 'Claudicante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_reproductivo`
--

CREATE TABLE `estado_reproductivo` (
  `Id_EstadoReproductivo` int(6) NOT NULL,
  `Descripcion_EstadoReproductivo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_reproductivo`
--

INSERT INTO `estado_reproductivo` (`Id_EstadoReproductivo`, `Descripcion_EstadoReproductivo`) VALUES
(1, 'Normal'),
(2, 'Gestante'),
(3, 'Recien Parida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fabricantes`
--

CREATE TABLE `fabricantes` (
  `Id_Fabricante` int(6) NOT NULL,
  `Nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `Id_Historial` int(6) NOT NULL,
  `Id_Cita` int(6) NOT NULL,
  `Id_Cliente` int(6) NOT NULL,
  `Id_Mascota` int(6) NOT NULL,
  `Id_Especie` int(6) NOT NULL,
  `Id_Raza` int(6) NOT NULL,
  `Id_ConcicionCorporal` int(6) NOT NULL,
  `Id_EstadoReproductivo` int(6) NOT NULL,
  `Id_TipoAlimento` int(6) NOT NULL,
  `Id_ConsumoAlimento` int(6) NOT NULL,
  `Id_Comportamiento` int(6) NOT NULL,
  `Id_EstadoAnimal` int(6) NOT NULL,
  `Id_EstadoCaminar` int(6) DEFAULT NULL,
  `Id_Pelaje` int(6) NOT NULL,
  `Nombre_Cliente` varchar(50) NOT NULL,
  `Nombre_Mascota` varchar(30) NOT NULL,
  `Sexo_Mascota` varchar(15) NOT NULL,
  `Edad_Mascota` int(2) NOT NULL,
  `Temperatura` int(2) NOT NULL,
  `Pulso` int(2) NOT NULL,
  `Timpanizado` varchar(2) NOT NULL,
  `Atonia` varchar(2) NOT NULL,
  `Mucosa_Ocular` int(6) NOT NULL,
  `Mucosa_Bucal` int(6) NOT NULL,
  `Mucosa_Nasal` int(6) NOT NULL,
  `Observacion_EstadoReproductivo` varchar(100) DEFAULT NULL,
  `Observacion_Alimentos` varchar(100) DEFAULT NULL,
  `Comentarios` varchar(100) DEFAULT NULL,
  `Fecha_Cita` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`Id_Historial`, `Id_Cita`, `Id_Cliente`, `Id_Mascota`, `Id_Especie`, `Id_Raza`, `Id_ConcicionCorporal`, `Id_EstadoReproductivo`, `Id_TipoAlimento`, `Id_ConsumoAlimento`, `Id_Comportamiento`, `Id_EstadoAnimal`, `Id_EstadoCaminar`, `Id_Pelaje`, `Nombre_Cliente`, `Nombre_Mascota`, `Sexo_Mascota`, `Edad_Mascota`, `Temperatura`, `Pulso`, `Timpanizado`, `Atonia`, `Mucosa_Ocular`, `Mucosa_Bucal`, `Mucosa_Nasal`, `Observacion_EstadoReproductivo`, `Observacion_Alimentos`, `Comentarios`, `Fecha_Cita`) VALUES
(3, 58, 48, 80, 2, 19, 3, 1, 1, 1, 1, 1, 1, 1, 'Miguel Roberto Mendoza', 'Peludo', 'Macho', 2, 19, 20, 'SI', 'SI', 1, 1, 1, '', '', 'Sin comentarios.', '2021-09-10'),
(4, 60, 48, 80, 2, 19, 2, 3, 2, 1, 1, 1, 2, 1, 'Miguel Roberto Mendoza', 'Peludo', 'Macho', 2, 20, 23, 'SI', 'SI', 1, 3, 1, 'Se encuentra delagada por proceso de gestion.', '', 'Sin comentarios.', '2021-10-01'),
(5, 56, 1, 78, 1, 4, 4, 1, 4, 1, 1, 1, 1, 1, 'Jose Miguel Acosta Carias', 'Cochito', 'Macho', 2, 35, 20, 'SI', 'SI', 1, 1, 1, 'La mascota tiene sobrepeso, favor realizar debido proceso para poder suplantar la alimentacion.', 'Come demasiado', 'Sin comentario.', '2021-09-10'),
(6, 59, 1, 81, 1, 13, 3, 1, 1, 2, 1, 1, 1, 1, 'Jose Miguel Acosta Carias', 'Tommy', 'Macho', 4, 35, 20, 'SI', 'SI', 4, 4, 4, 'Todo normal.', 'Cliente menciona que mascota ha dejado de comer.', 'Se observa que las mucosas se encuentra de color rojo.', '2021-09-30'),
(7, 62, 1, 78, 1, 4, 2, 1, 1, 1, 1, 1, 1, 1, 'Jose Miguel Acosta Carias', 'Cochito', 'Macho', 2, 12, 22, 'SI', 'SI', 1, 1, 1, '', '', 'Sin nada de comentarios.', '2021-09-07'),
(8, 61, 1, 78, 1, 4, 1, 1, 1, 1, 1, 1, 1, 1, 'Jose Miguel Acosta Carias', 'Cochito', 'Macho', 2, 37, 10, 'SI', 'SI', 1, 1, 1, 'Sin observacion', 'Sin observacion', 'Sin comentarios.', '2021-11-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospitalzacion`
--

CREATE TABLE `hospitalzacion` (
  `Id_Hospitalizacion` int(6) NOT NULL,
  `Fecha_Ingreso` date NOT NULL,
  `Hora_Hora` time NOT NULL,
  `Motivo` varchar(200) DEFAULT NULL,
  `Id_Jaula` int(6) DEFAULT NULL,
  `Id_Mascota` int(6) NOT NULL,
  `Id_Personal` int(6) DEFAULT NULL,
  `Id_Producto` int(6) DEFAULT NULL,
  `Id_Servicio` int(6) NOT NULL,
  `Fecha_Salida` date NOT NULL,
  `Hora_Salida` date NOT NULL,
  `Estado` binary(1) NOT NULL,
  `Baja_Hospitalizacion` binary(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jaulas`
--

CREATE TABLE `jaulas` (
  `Id_Jaula` int(6) NOT NULL,
  `Descripcion Jaula` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `Id_Mascota` int(6) NOT NULL,
  `Id_Cliente` int(6) NOT NULL,
  `Nombre_Mascota` varchar(15) NOT NULL,
  `Fecha_Mascota` date NOT NULL,
  `Edad_Mascota` int(2) GENERATED ALWAYS AS (year(current_timestamp()) - year(`Fecha_Mascota`)) VIRTUAL,
  `Sexo` varchar(10) NOT NULL,
  `Id_Especie` int(6) NOT NULL,
  `Id_Raza` int(6) NOT NULL,
  `Fecha_Registro` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`Id_Mascota`, `Id_Cliente`, `Nombre_Mascota`, `Fecha_Mascota`, `Sexo`, `Id_Especie`, `Id_Raza`, `Fecha_Registro`) VALUES
(78, 1, 'Cochito', '2019-02-07', 'Macho', 1, 4, '2021-09-02'),
(80, 48, 'Peludo', '2019-03-02', 'Macho', 2, 19, '2021-09-02'),
(81, 1, 'Tommy', '2017-07-06', 'Macho', 1, 13, '2021-09-07'),
(82, 53, 'Preciosa', '2018-07-16', 'hembra', 1, 9, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `Id_Medicamento` int(6) NOT NULL,
  `Descripcion_Medicamento` varchar(30) NOT NULL,
  `Id_TipoMedicamento` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`Id_Medicamento`, `Descripcion_Medicamento`, `Id_TipoMedicamento`) VALUES
(1, 'tetraciclina', 1),
(2, 'tobramicina', 1),
(3, 'enrofloxacino', 1),
(4, 'aciclovir', 2),
(5, 'ganciclovir', 2),
(6, 'dexametasona', 3),
(7, 'prednisolona', 3),
(8, 'AINE', 4),
(9, 'diclofenaco', 4),
(10, 'betaxolol', 5),
(11, 'dorzolamida', 5),
(12, 'vitamina A', 6),
(13, 'ranitidina', 7),
(14, 'famotidina', 7),
(15, 'omeprazol', 7),
(16, 'antineoplasicos', 8),
(17, 'ciclofosfamida', 8),
(18, 'lomustina', 8),
(19, 'metotrexato', 8),
(20, 'clorambucilo', 8),
(21, 'asparaginasa', 9),
(22, 'citarabina', 9),
(23, 'ciclofosfamida', 10),
(24, 'doxorubicina', 10),
(25, 'citarabina', 11),
(26, 'actinomicina B', 12),
(27, 'cisplatino', 12),
(28, 'carboplatino', 12),
(29, 'estreptozocina', 12),
(30, 'manitol', 14),
(31, 'expansores plasmaticos', 15),
(32, 'misoprostol', 16),
(33, 'fludrocortisona', 17),
(34, 'estreptozocina', 18),
(35, 'midazolam', 19),
(36, 'dopamina', 20),
(37, 'dobutamina', 20),
(38, 'procainamida', 20),
(39, 'amiodarona', 20),
(40, 'fenilefrina', 20),
(41, 'efedrina', 20),
(42, 'isoprenalina', 20),
(43, 'vasopresina', 20),
(44, 'bupivacaina', 21),
(45, 'mepivacaina', 21),
(46, 'morfina', 22),
(47, 'petidina', 22),
(48, 'dihidrocodeina', 22),
(49, 'atropina', 23),
(50, 'escopolamina', 23),
(51, 'glicopirrolato', 23),
(52, 'naloxona', 24),
(53, 'valproato', 25),
(54, 'antihistaminicos', 26),
(55, 'buparvacuona', 27),
(56, 'Laxante', 25),
(57, 'etomidato', 26),
(58, 'paracetamol', 27),
(59, 'gabapentina', 28),
(60, 'benzodiacepinas', 29),
(62, 'Sin especificar', 59);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelaje`
--

CREATE TABLE `pelaje` (
  `Id_Pelaje` int(6) NOT NULL,
  `Descripcion_Pelaje` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pelaje`
--

INSERT INTO `pelaje` (`Id_Pelaje`, `Descripcion_Pelaje`) VALUES
(1, 'Normal'),
(2, 'Hirsuto'),
(3, 'Abultamiento/Hinchazones'),
(4, 'Heridas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `Id_Personal` int(6) NOT NULL,
  `Identificacion_Personal` varchar(15) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Puesto_Trabajo` varchar(50) NOT NULL,
  `Area` int(6) NOT NULL,
  `Baja_Personal` binary(1) NOT NULL DEFAULT '0',
  `Id_Usuario` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`Id_Personal`, `Identificacion_Personal`, `Nombre`, `Puesto_Trabajo`, `Area`, `Baja_Personal`, `Id_Usuario`) VALUES
(1, '0801-1987-02355', 'Rodrigo Garcia Velasquez', 'Veterinario', 2, 0x30, 96),
(4, '0505-1995-02546', 'Julia Madrigal', 'Auxiliar', 2, 0x30, 90),
(5, '', 'Jose Acosta', 'Administrador', 3, 0x30, 94),
(7, '', 'Maria Mendoza', 'Secretaria', 1, 0x00, 98);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentaciones_producto`
--

CREATE TABLE `presentaciones_producto` (
  `Id_Presentacion` int(6) NOT NULL,
  `Descripcion_Presentacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Id_Producto` int(6) NOT NULL,
  `Codigo_Producto` varchar(20) NOT NULL,
  `Nombre_Producto` varchar(25) NOT NULL,
  `Id_Presentacion` int(6) NOT NULL,
  `ID_Categoria` int(6) NOT NULL,
  `Cantidad_Producto` int(6) NOT NULL,
  `Fecha_Vencimiento` date NOT NULL,
  `Precio_Venta` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `Id_Proveedor` int(6) NOT NULL,
  `RTN_Proveedor` varchar(16) NOT NULL,
  `Nombre_Legal` varchar(200) NOT NULL,
  `Direccion_Proveedor` varchar(200) NOT NULL,
  `Telefono_Proveedor` int(8) NOT NULL,
  `Estado_Proveedor` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razas`
--

CREATE TABLE `razas` (
  `Id_Raza` int(6) NOT NULL,
  `Id_Especie` int(6) NOT NULL,
  `Nombre_Raza` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `razas`
--

INSERT INTO `razas` (`Id_Raza`, `Id_Especie`, `Nombre_Raza`) VALUES
(1, 1, 'Labrador'),
(2, 1, 'Fr. Bulldogs'),
(3, 1, 'Bulldogs'),
(4, 1, 'Poodles '),
(5, 1, 'Beagles'),
(6, 1, 'Rottweilers'),
(7, 1, 'Boxers'),
(8, 1, 'Gran Danes'),
(9, 1, 'Husk Siberiano'),
(10, 1, 'Doberman'),
(11, 1, 'Schnauzers'),
(12, 1, 'Terriers'),
(13, 1, 'Pugs'),
(14, 1, 'Chihuahuas'),
(15, 1, 'Pastor Aleman'),
(16, 1, 'Dalmatas'),
(17, 1, 'Otros'),
(18, 2, 'Persa'),
(19, 2, 'Azul ruso'),
(20, 2, 'Siamés'),
(21, 2, 'Angora turco'),
(22, 2, 'Siberiano'),
(23, 2, 'Maine Coon'),
(24, 2, 'Bengalí'),
(25, 2, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE `recetas` (
  `Id_Receta` int(6) NOT NULL,
  `Id_Personal` int(6) NOT NULL,
  `Cantidad` int(3) NOT NULL,
  `Tratamiento_Medicamento` varchar(100) NOT NULL,
  `Dosificacion` varchar(25) NOT NULL,
  `Dias` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_usuario`
--

CREATE TABLE `roles_usuario` (
  `Id_Rol` int(6) NOT NULL,
  `Rol` varchar(15) NOT NULL,
  `Descripcion_Rol` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `Id_Servicio` int(6) NOT NULL,
  `Id_Tipo_Servicio` int(6) NOT NULL,
  `Id_Personal` int(6) NOT NULL,
  `Nombre_Servicio` varchar(50) NOT NULL,
  `Precio_Servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos_clientes`
--

CREATE TABLE `telefonos_clientes` (
  `Id_Telefono_Cliente` int(6) NOT NULL,
  `Telefono_Cliente` int(8) NOT NULL,
  `Id_Cliente` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `telefonos_clientes`
--

INSERT INTO `telefonos_clientes` (`Id_Telefono_Cliente`, `Telefono_Cliente`, `Id_Cliente`) VALUES
(1, 98345764, 1),
(2, 93058673, 2),
(3, 88475754, 2),
(4, 93546346, 3),
(5, 99935376, 4),
(6, 86435765, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_alimento`
--

CREATE TABLE `tipo_alimento` (
  `Id_TipoAlimento` int(6) NOT NULL,
  `Descripcion_TipoAlimento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_alimento`
--

INSERT INTO `tipo_alimento` (`Id_TipoAlimento`, `Descripcion_TipoAlimento`) VALUES
(1, 'Pastoreo'),
(2, 'Concentrado'),
(3, 'Maiz/Sorgo'),
(4, 'Pastore/Concentrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_especies`
--

CREATE TABLE `tipo_especies` (
  `Id_Especie` int(6) NOT NULL,
  `Tipo_Especie` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_especies`
--

INSERT INTO `tipo_especies` (`Id_Especie`, `Tipo_Especie`) VALUES
(1, 'PERRO'),
(2, 'GATO'),
(3, 'HAMSTER'),
(4, 'CONEJO'),
(5, 'CABALLO'),
(6, 'IGUANA'),
(7, 'CAMALEON'),
(8, 'TORTUGA'),
(9, 'SERPIENTE'),
(10, 'LAGARTO'),
(15, 'RANAS O SAPOS'),
(16, 'SALAMANDRAS O TRITONES'),
(17, 'CECILIAS O APODOS'),
(18, 'ARAÑA'),
(19, 'ESCORPION'),
(20, 'HORMIGA'),
(21, 'ABEJA'),
(22, 'AVISPA'),
(23, 'CUCARACHA'),
(24, 'MARIPOSA'),
(25, 'CANGREJO O CAMARON'),
(26, 'ESTRELLA O ERIZOS'),
(27, 'CARACOL, ALMEJA O PULPOS'),
(28, 'LOMBRIZ O GUSANO MARINO'),
(29, 'ROTIFERO'),
(30, 'GUSANO PLANO'),
(31, 'MEDUSA O CORAL'),
(32, 'ESPONJA'),
(33, 'PEZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_medicamento`
--

CREATE TABLE `tipo_medicamento` (
  `Id_TipoMedicamento` int(6) NOT NULL,
  `Descripcion_TipoMedicamento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_medicamento`
--

INSERT INTO `tipo_medicamento` (`Id_TipoMedicamento`, `Descripcion_TipoMedicamento`) VALUES
(1, 'Antimicrobianos'),
(2, 'Antivirales'),
(3, 'Corticoides'),
(4, 'Antiinflamatorios no esteroide'),
(5, 'Antiglaucomatosos'),
(6, 'Cicatrizantes'),
(7, 'Medicamentos para procesos del aparato digestivo'),
(8, 'Antineoplásicos Orales'),
(9, 'Antineoplásicos Subcutáneos'),
(10, 'Antineoplásicos Intravenoso'),
(11, 'Diuréticos'),
(12, 'Sustitutivos del plasma'),
(13, 'Medicamentos para procesos del aparato reproductor'),
(14, 'Medicamentos para enfermedades endocrinas'),
(15, 'Acromegalia e insulinoma'),
(16, 'Medicamentos psicótropos'),
(17, 'Cardiotónicos'),
(18, 'Anestésicos locales'),
(19, 'Estupefacientes'),
(20, 'Antimuscarínicos'),
(21, 'Antagonistas de la morfina'),
(22, 'Antiepilépticos'),
(23, 'Medicamentos para tratamientos de alergias cutáneas'),
(24, 'Antiprotozoarios'),
(25, 'Laxantes de administración oral y por vía rectal'),
(26, 'Anestésicos generales'),
(27, 'Analgésicos no opioides'),
(28, 'Analgésicos en procesos neuropáticos'),
(29, 'Psicótropos para el manejo del \"miedo\"'),
(59, 'Sin especificar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_mucosa`
--

CREATE TABLE `tipo_mucosa` (
  `Id_TipoMucosa` int(6) NOT NULL,
  `Descripcion_TipoMucosa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_mucosa`
--

INSERT INTO `tipo_mucosa` (`Id_TipoMucosa`, `Descripcion_TipoMucosa`) VALUES
(1, 'NORMAL (ROSASEA)'),
(2, 'ICTERICAS (AMARILLAS)'),
(3, 'HIPEREMIA (ROJAS)'),
(4, 'CIANOTICA (ROJAS)'),
(5, 'PALIDAS (BLANCAS)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicios`
--

CREATE TABLE `tipo_servicios` (
  `Id_Tipo_Servicio` int(6) NOT NULL,
  `Tipo_Servicio` varchar(50) NOT NULL,
  `Precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_servicios`
--

INSERT INTO `tipo_servicios` (`Id_Tipo_Servicio`, `Tipo_Servicio`, `Precio`) VALUES
(1, 'Medicina General', 600),
(2, 'Internacion', 800),
(3, 'Cirugia', 1500),
(4, 'Analisis', 300),
(5, 'Odontologia', 750),
(6, 'Rayos X', 450),
(7, 'Ecografia', 450);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipoUsuario` int(6) NOT NULL,
  `Tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipoUsuario`, `Tipo`) VALUES
(1, 'Cliente'),
(2, 'Administrador'),
(3, 'Veterinario'),
(4, 'Auxiliar'),
(6, 'Secretaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos`
--

CREATE TABLE `tratamientos` (
  `Id_Tratamiento` int(6) NOT NULL,
  `Descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tratamientos`
--

INSERT INTO `tratamientos` (`Id_Tratamiento`, `Descripcion`) VALUES
(1, 'Tratamiento alopatico o convencional'),
(2, 'Tratamiento homeopatico'),
(3, 'Flores de Bach'),
(4, 'Reiki'),
(5, 'Alimentacion saludable'),
(6, 'Crema antimicotica'),
(7, 'Sin especificar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id_Usuario` int(6) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `Clave` varchar(25) NOT NULL,
  `Fecha_Registro` date DEFAULT current_timestamp(),
  `Id_TipoUsuario` int(6) NOT NULL,
  `Ultima_Cita` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_Usuario`, `Username`, `Clave`, `Fecha_Registro`, `Id_TipoUsuario`, `Ultima_Cita`) VALUES
(1, 'josea123', 'hola123', '2021-08-18', 1, NULL),
(2, 'luisa2021', 'hola', '2021-08-18', 1, NULL),
(3, 'itstephg', 'password', '2021-08-18', 1, NULL),
(4, 'josuezguevara', '1234', '2021-08-18', 1, NULL),
(5, 'admn', 'pass123', '2021-08-18', 2, NULL),
(83, 'mroberto11', 'roberto123', '2021-08-27', 1, NULL),
(84, 'pcubas123', 'cubas123', '2021-08-27', 1, NULL),
(90, 'auxiliar1', 'pass123', '2021-08-30', 4, NULL),
(94, 'Administrador', 'pass123', '0000-00-00', 2, NULL),
(96, 'veterinario1', 'pass123', '0000-00-00', 3, NULL),
(98, 'secretaria1', 'pass123', '0000-00-00', 6, NULL),
(100, 'andrea1', 'pass123', '2021-09-14', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `Id_Venta` int(11) NOT NULL,
  `Fecha_Venta` date NOT NULL,
  `Id_Mascota` int(6) NOT NULL,
  `Id_Cliente` int(6) NOT NULL,
  `Total_Venta` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_productos`
--
ALTER TABLE `categoria_productos`
  ADD PRIMARY KEY (`Id_Categoria_Producto`);

--
-- Indices de la tabla `cirugia`
--
ALTER TABLE `cirugia`
  ADD PRIMARY KEY (`Id_Cirugia`),
  ADD KEY `Id_Mascota` (`Id_Mascota`,`Id_Personal`,`Id_Servicio`,`Id_Producto`,`Id_Cita`),
  ADD KEY `Id_Personal` (`Id_Personal`),
  ADD KEY `Id_Producto` (`Id_Producto`),
  ADD KEY `Id_Cita` (`Id_Cita`),
  ADD KEY `Id_Servicio` (`Id_Servicio`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`Id_Cita`),
  ADD KEY `Id_Cliente` (`Id_Cliente`),
  ADD KEY `Id_Mascota` (`Id_Mascota`),
  ADD KEY `Id_Veterinario` (`Id_Veterinario`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Id_Cliente`),
  ADD KEY `Id_Usuario` (`Id_Usuario`);

--
-- Indices de la tabla `comportamiento`
--
ALTER TABLE `comportamiento`
  ADD PRIMARY KEY (`Id_Comportamiento`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`Id_Compra`),
  ADD KEY `Id_Proveedor` (`Id_Proveedor`);

--
-- Indices de la tabla `condicion_corporal`
--
ALTER TABLE `condicion_corporal`
  ADD PRIMARY KEY (`Id_Condicion`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`Id_Consulta`),
  ADD KEY `id_paciente` (`Id_Mascota`),
  ADD KEY `id_cita` (`Id_Cita`),
  ADD KEY `id_receta` (`Id_Receta`),
  ADD KEY `Id_Personal` (`Id_Personal`),
  ADD KEY `Id_Cliente` (`Id_Cliente`),
  ADD KEY `Id_Historial` (`Id_Historial`);

--
-- Indices de la tabla `consumo_alimento`
--
ALTER TABLE `consumo_alimento`
  ADD PRIMARY KEY (`Id_ConsumoAlimento`);

--
-- Indices de la tabla `contactos_proveedores`
--
ALTER TABLE `contactos_proveedores`
  ADD PRIMARY KEY (`Id_Contacto`),
  ADD KEY `Id_Proveedor` (`Id_Proveedor`);

--
-- Indices de la tabla `detalle de compra`
--
ALTER TABLE `detalle de compra`
  ADD PRIMARY KEY (`Id_Detalle_Compra`),
  ADD KEY `Id_Compra` (`Id_Compra`),
  ADD KEY `Id_Producto` (`Id_Producto`),
  ADD KEY `Id_Fabricante` (`Id_Fabricante`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`Id_Detalle_Venta`),
  ADD KEY `Id_Venta` (`Id_Venta`),
  ADD KEY `Id_Producto` (`Id_Producto`),
  ADD KEY `Id_Servicio` (`Id_Servicio`);

--
-- Indices de la tabla `enfermedades`
--
ALTER TABLE `enfermedades`
  ADD PRIMARY KEY (`Id_Enfermedad`);

--
-- Indices de la tabla `estadocitas`
--
ALTER TABLE `estadocitas`
  ADD PRIMARY KEY (`Id_EstadoCita`);

--
-- Indices de la tabla `estado_animal`
--
ALTER TABLE `estado_animal`
  ADD PRIMARY KEY (`Id_EstadoAnimal`);

--
-- Indices de la tabla `estado_caminar`
--
ALTER TABLE `estado_caminar`
  ADD PRIMARY KEY (`Id_EstadoCaminar`);

--
-- Indices de la tabla `estado_reproductivo`
--
ALTER TABLE `estado_reproductivo`
  ADD PRIMARY KEY (`Id_EstadoReproductivo`);

--
-- Indices de la tabla `fabricantes`
--
ALTER TABLE `fabricantes`
  ADD PRIMARY KEY (`Id_Fabricante`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`Id_Historial`),
  ADD KEY `id_paciente` (`Id_Mascota`),
  ADD KEY `Id_Especie` (`Id_Especie`),
  ADD KEY `Id_Cliente` (`Id_Cliente`),
  ADD KEY `Id_Raza` (`Id_Raza`),
  ADD KEY `Id_ConcicionCorporal` (`Id_ConcicionCorporal`),
  ADD KEY `Id_EstadoReproductivo` (`Id_EstadoReproductivo`),
  ADD KEY `Id_TipoAlimento` (`Id_TipoAlimento`),
  ADD KEY `Id_ConsumoAlimento` (`Id_ConsumoAlimento`),
  ADD KEY `Id_Comportamiento` (`Id_Comportamiento`,`Id_EstadoAnimal`,`Id_EstadoCaminar`,`Id_Pelaje`),
  ADD KEY `Id_EstadoAnimal` (`Id_EstadoAnimal`),
  ADD KEY `Id_EstadoCaminar` (`Id_EstadoCaminar`),
  ADD KEY `Id_Pelaje` (`Id_Pelaje`),
  ADD KEY `Id_Cita` (`Id_Cita`);

--
-- Indices de la tabla `hospitalzacion`
--
ALTER TABLE `hospitalzacion`
  ADD PRIMARY KEY (`Id_Hospitalizacion`),
  ADD KEY `id_paciente` (`Id_Mascota`),
  ADD KEY `id_personal` (`Id_Personal`),
  ADD KEY `id_jaula` (`Id_Jaula`),
  ADD KEY `id_medicamento` (`Id_Producto`),
  ADD KEY `Id_Jaula_2` (`Id_Jaula`,`Id_Mascota`,`Id_Personal`,`Id_Producto`,`Id_Servicio`),
  ADD KEY `Id_Jaula_3` (`Id_Jaula`,`Id_Mascota`,`Id_Personal`,`Id_Producto`,`Id_Servicio`),
  ADD KEY `Id_Servicio` (`Id_Servicio`);

--
-- Indices de la tabla `jaulas`
--
ALTER TABLE `jaulas`
  ADD PRIMARY KEY (`Id_Jaula`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`Id_Mascota`),
  ADD KEY `Id_Especie` (`Id_Especie`),
  ADD KEY `Id_Cliente` (`Id_Cliente`),
  ADD KEY `Id_Raza` (`Id_Raza`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`Id_Medicamento`),
  ADD KEY `Id_TipoMedicamento` (`Id_TipoMedicamento`);

--
-- Indices de la tabla `pelaje`
--
ALTER TABLE `pelaje`
  ADD PRIMARY KEY (`Id_Pelaje`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`Id_Personal`),
  ADD UNIQUE KEY `Id_Usuario_2` (`Id_Usuario`),
  ADD KEY `Id_Usuario` (`Id_Usuario`);

--
-- Indices de la tabla `presentaciones_producto`
--
ALTER TABLE `presentaciones_producto`
  ADD PRIMARY KEY (`Id_Presentacion`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Id_Producto`),
  ADD KEY `ID_Categoria` (`ID_Categoria`),
  ADD KEY `Id_Presentacion` (`Id_Presentacion`),
  ADD KEY `Id_Presentacion_2` (`Id_Presentacion`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`Id_Proveedor`),
  ADD UNIQUE KEY `RTN_Proveedor` (`RTN_Proveedor`);

--
-- Indices de la tabla `razas`
--
ALTER TABLE `razas`
  ADD PRIMARY KEY (`Id_Raza`),
  ADD KEY `Id_Especie` (`Id_Especie`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`Id_Receta`),
  ADD KEY `Id_Personal` (`Id_Personal`);

--
-- Indices de la tabla `roles_usuario`
--
ALTER TABLE `roles_usuario`
  ADD PRIMARY KEY (`Id_Rol`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`Id_Servicio`),
  ADD KEY `Id_Tipo_Servicio` (`Id_Tipo_Servicio`),
  ADD KEY `Id_Personal` (`Id_Personal`);

--
-- Indices de la tabla `telefonos_clientes`
--
ALTER TABLE `telefonos_clientes`
  ADD PRIMARY KEY (`Id_Telefono_Cliente`);

--
-- Indices de la tabla `tipo_alimento`
--
ALTER TABLE `tipo_alimento`
  ADD PRIMARY KEY (`Id_TipoAlimento`);

--
-- Indices de la tabla `tipo_especies`
--
ALTER TABLE `tipo_especies`
  ADD PRIMARY KEY (`Id_Especie`);

--
-- Indices de la tabla `tipo_medicamento`
--
ALTER TABLE `tipo_medicamento`
  ADD PRIMARY KEY (`Id_TipoMedicamento`);

--
-- Indices de la tabla `tipo_mucosa`
--
ALTER TABLE `tipo_mucosa`
  ADD PRIMARY KEY (`Id_TipoMucosa`);

--
-- Indices de la tabla `tipo_servicios`
--
ALTER TABLE `tipo_servicios`
  ADD PRIMARY KEY (`Id_Tipo_Servicio`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipoUsuario`);

--
-- Indices de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD PRIMARY KEY (`Id_Tratamiento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id_Usuario`),
  ADD KEY `id_tipoUsuario` (`Id_TipoUsuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`Id_Venta`),
  ADD KEY `Id_Cliente` (`Id_Cliente`),
  ADD KEY `Id_Mascota` (`Id_Mascota`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria_productos`
--
ALTER TABLE `categoria_productos`
  MODIFY `Id_Categoria_Producto` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cirugia`
--
ALTER TABLE `cirugia`
  MODIFY `Id_Cirugia` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `Id_Cita` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Id_Cliente` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `comportamiento`
--
ALTER TABLE `comportamiento`
  MODIFY `Id_Comportamiento` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `Id_Compra` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `condicion_corporal`
--
ALTER TABLE `condicion_corporal`
  MODIFY `Id_Condicion` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `Id_Consulta` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consumo_alimento`
--
ALTER TABLE `consumo_alimento`
  MODIFY `Id_ConsumoAlimento` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `contactos_proveedores`
--
ALTER TABLE `contactos_proveedores`
  MODIFY `Id_Contacto` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle de compra`
--
ALTER TABLE `detalle de compra`
  MODIFY `Id_Detalle_Compra` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `Id_Detalle_Venta` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `enfermedades`
--
ALTER TABLE `enfermedades`
  MODIFY `Id_Enfermedad` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `estadocitas`
--
ALTER TABLE `estadocitas`
  MODIFY `Id_EstadoCita` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estado_animal`
--
ALTER TABLE `estado_animal`
  MODIFY `Id_EstadoAnimal` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estado_caminar`
--
ALTER TABLE `estado_caminar`
  MODIFY `Id_EstadoCaminar` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estado_reproductivo`
--
ALTER TABLE `estado_reproductivo`
  MODIFY `Id_EstadoReproductivo` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `fabricantes`
--
ALTER TABLE `fabricantes`
  MODIFY `Id_Fabricante` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `Id_Historial` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `hospitalzacion`
--
ALTER TABLE `hospitalzacion`
  MODIFY `Id_Hospitalizacion` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jaulas`
--
ALTER TABLE `jaulas`
  MODIFY `Id_Jaula` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `Id_Mascota` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `Id_Medicamento` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `pelaje`
--
ALTER TABLE `pelaje`
  MODIFY `Id_Pelaje` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `Id_Personal` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `presentaciones_producto`
--
ALTER TABLE `presentaciones_producto`
  MODIFY `Id_Presentacion` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `Id_Producto` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `Id_Proveedor` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `razas`
--
ALTER TABLE `razas`
  MODIFY `Id_Raza` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `Id_Receta` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles_usuario`
--
ALTER TABLE `roles_usuario`
  MODIFY `Id_Rol` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `Id_Servicio` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `telefonos_clientes`
--
ALTER TABLE `telefonos_clientes`
  MODIFY `Id_Telefono_Cliente` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_alimento`
--
ALTER TABLE `tipo_alimento`
  MODIFY `Id_TipoAlimento` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_especies`
--
ALTER TABLE `tipo_especies`
  MODIFY `Id_Especie` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `tipo_medicamento`
--
ALTER TABLE `tipo_medicamento`
  MODIFY `Id_TipoMedicamento` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `tipo_mucosa`
--
ALTER TABLE `tipo_mucosa`
  MODIFY `Id_TipoMucosa` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_servicios`
--
ALTER TABLE `tipo_servicios`
  MODIFY `Id_Tipo_Servicio` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipoUsuario` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  MODIFY `Id_Tratamiento` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id_Usuario` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cirugia`
--
ALTER TABLE `cirugia`
  ADD CONSTRAINT `cirugia_ibfk_3` FOREIGN KEY (`Id_Personal`) REFERENCES `personal` (`Id_Personal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cirugia_ibfk_4` FOREIGN KEY (`Id_Producto`) REFERENCES `productos` (`Id_Producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cirugia_ibfk_5` FOREIGN KEY (`Id_Cita`) REFERENCES `citas` (`Id_Cita`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cirugia_ibfk_7` FOREIGN KEY (`Id_Mascota`) REFERENCES `mascotas` (`Id_Mascota`),
  ADD CONSTRAINT `cirugia_ibfk_8` FOREIGN KEY (`Id_Servicio`) REFERENCES `servicios` (`id_servicio`);

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`Id_Cliente`) REFERENCES `clientes` (`ID_Cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_ibfk_4` FOREIGN KEY (`Id_EstadoCita`) REFERENCES `estadocitas` (`Id_EstadoCita`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_ibfk_5` FOREIGN KEY (`Id_Veterinario`) REFERENCES `personal` (`Id_Personal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_ibfk_6` FOREIGN KEY (`Id_Mascota`) REFERENCES `mascotas` (`Id_Mascota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuarios` (`Id_Usuario`);

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`Id_Proveedor`) REFERENCES `proveedores` (`Id_Proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`Id_Personal`) REFERENCES `personal` (`Id_Personal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consulta_ibfk_3` FOREIGN KEY (`Id_Cita`) REFERENCES `citas` (`Id_Cita`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consulta_ibfk_4` FOREIGN KEY (`Id_Receta`) REFERENCES `recetas` (`Id_Receta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consulta_ibfk_5` FOREIGN KEY (`Id_Mascota`) REFERENCES `mascotas` (`Id_Mascota`),
  ADD CONSTRAINT `consulta_ibfk_6` FOREIGN KEY (`Id_Cliente`) REFERENCES `clientes` (`Id_Cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consulta_ibfk_7` FOREIGN KEY (`Id_Historial`) REFERENCES `historial` (`Id_Historial`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contactos_proveedores`
--
ALTER TABLE `contactos_proveedores`
  ADD CONSTRAINT `contactos_proveedores_ibfk_1` FOREIGN KEY (`Id_Proveedor`) REFERENCES `proveedores` (`Id_Proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle de compra`
--
ALTER TABLE `detalle de compra`
  ADD CONSTRAINT `detalle de compra_ibfk_1` FOREIGN KEY (`Id_Fabricante`) REFERENCES `fabricantes` (`Id_Fabricante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle de compra_ibfk_2` FOREIGN KEY (`Id_Producto`) REFERENCES `productos` (`Id_Producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle de compra_ibfk_3` FOREIGN KEY (`Id_Compra`) REFERENCES `compras` (`Id_Compra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`Id_Servicio`) REFERENCES `servicios` (`id_servicio`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`Id_Producto`) REFERENCES `productos` (`Id_Producto`),
  ADD CONSTRAINT `detalle_venta_ibfk_3` FOREIGN KEY (`Id_Venta`) REFERENCES `ventas` (`Id_Venta`);

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_10` FOREIGN KEY (`Id_EstadoAnimal`) REFERENCES `estado_animal` (`Id_EstadoAnimal`),
  ADD CONSTRAINT `historial_ibfk_11` FOREIGN KEY (`Id_EstadoCaminar`) REFERENCES `estado_caminar` (`Id_EstadoCaminar`),
  ADD CONSTRAINT `historial_ibfk_12` FOREIGN KEY (`Id_EstadoReproductivo`) REFERENCES `estado_reproductivo` (`Id_EstadoReproductivo`),
  ADD CONSTRAINT `historial_ibfk_13` FOREIGN KEY (`Id_Mascota`) REFERENCES `mascotas` (`Id_Mascota`),
  ADD CONSTRAINT `historial_ibfk_14` FOREIGN KEY (`Id_Pelaje`) REFERENCES `pelaje` (`Id_Pelaje`),
  ADD CONSTRAINT `historial_ibfk_15` FOREIGN KEY (`Id_Raza`) REFERENCES `razas` (`Id_Raza`),
  ADD CONSTRAINT `historial_ibfk_16` FOREIGN KEY (`Id_TipoAlimento`) REFERENCES `tipo_alimento` (`Id_TipoAlimento`),
  ADD CONSTRAINT `historial_ibfk_17` FOREIGN KEY (`Id_Cita`) REFERENCES `citas` (`Id_Cita`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historial_ibfk_4` FOREIGN KEY (`Id_Mascota`) REFERENCES `mascotas` (`Id_Mascota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historial_ibfk_5` FOREIGN KEY (`Id_Cliente`) REFERENCES `clientes` (`Id_Cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historial_ibfk_6` FOREIGN KEY (`Id_Comportamiento`) REFERENCES `comportamiento` (`Id_Comportamiento`),
  ADD CONSTRAINT `historial_ibfk_7` FOREIGN KEY (`Id_ConcicionCorporal`) REFERENCES `condicion_corporal` (`Id_Condicion`),
  ADD CONSTRAINT `historial_ibfk_8` FOREIGN KEY (`Id_ConsumoAlimento`) REFERENCES `consumo_alimento` (`Id_ConsumoAlimento`),
  ADD CONSTRAINT `historial_ibfk_9` FOREIGN KEY (`Id_Especie`) REFERENCES `tipo_especies` (`Id_Especie`);

--
-- Filtros para la tabla `hospitalzacion`
--
ALTER TABLE `hospitalzacion`
  ADD CONSTRAINT `hospitalzacion_ibfk_1` FOREIGN KEY (`Id_Personal`) REFERENCES `personal` (`Id_Personal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hospitalzacion_ibfk_3` FOREIGN KEY (`Id_Jaula`) REFERENCES `jaulas` (`Id_Jaula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hospitalzacion_ibfk_5` FOREIGN KEY (`Id_Producto`) REFERENCES `productos` (`Id_Producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hospitalzacion_ibfk_6` FOREIGN KEY (`Id_Mascota`) REFERENCES `mascotas` (`Id_Mascota`),
  ADD CONSTRAINT `hospitalzacion_ibfk_7` FOREIGN KEY (`Id_Servicio`) REFERENCES `servicios` (`id_servicio`);

--
-- Filtros para la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `mascotas_ibfk_3` FOREIGN KEY (`Id_Especie`) REFERENCES `tipo_especies` (`Id_Especie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mascotas_ibfk_4` FOREIGN KEY (`Id_Cliente`) REFERENCES `clientes` (`Id_Cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mascotas_ibfk_5` FOREIGN KEY (`Id_Raza`) REFERENCES `razas` (`Id_Raza`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD CONSTRAINT `medicamentos_ibfk_1` FOREIGN KEY (`Id_TipoMedicamento`) REFERENCES `tipo_medicamento` (`Id_TipoMedicamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuarios` (`Id_Usuario`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`Id_Producto`) REFERENCES `detalle_venta` (`Id_Producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`ID_Categoria`) REFERENCES `categoria_productos` (`Id_Categoria_Producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`Id_Presentacion`) REFERENCES `presentaciones_producto` (`Id_Presentacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `razas`
--
ALTER TABLE `razas`
  ADD CONSTRAINT `razas_ibfk_1` FOREIGN KEY (`Id_Especie`) REFERENCES `tipo_especies` (`Id_Especie`);

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`Id_Tipo_Servicio`) REFERENCES `tipo_servicios` (`Id_Tipo_Servicio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `servicios_ibfk_2` FOREIGN KEY (`Id_Personal`) REFERENCES `personal` (`Id_Personal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_tipoUsuario`) REFERENCES `tipo_usuario` (`id_tipoUsuario`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`Id_Cliente`) REFERENCES `clientes` (`ID_Cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`Id_Mascota`) REFERENCES `mascotas` (`Id_Mascota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
