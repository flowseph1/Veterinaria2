-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-08-2021 a las 08:01:08
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
  `Fecha_Cita` date NOT NULL,
  `Hora_Cita` time NOT NULL,
  `Motivo_Cita` varchar(200) NOT NULL,
  `Id_EstadoCita` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Jose Miguel Acosta Carias ', 'MASCULINO', 'jose.m.acosta1996@gmail.com', 1, 0),
(2, 'Luisa Maria Martinez Rodriguez', 'FEMENINO', 'luisamaria@gmail.com', 2, 0),
(3, 'Glorin Rubio', 'FEMENINO', 'stheprubio2000@gmail.com', 3, 0),
(4, 'Josue Zelaya', 'MASCULINO', 'josuezelaya0010@gmail.com', 4, 0),
(14, 'Katherine Gabriela Meza', 'FEMENINO', 'Kath@safari.com', 5, 0),
(48, 'Miguel Roberto Mendoza', 'MASCULINO', 'miguel@gmail.com', 83, 0),
(49, 'Patricia Cubas', 'FEMENINO', 'patricia@gmail.com', 84, 0);

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
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `Id_Consulta` int(6) NOT NULL,
  `Diagnostico_Consulta` varchar(200) NOT NULL,
  `Fecha_Consulta` date NOT NULL,
  `Id_Cita` int(6) NOT NULL,
  `Id_Mascota` int(6) NOT NULL,
  `Id_Receta` int(6) NOT NULL,
  `Id_Personal` int(6) NOT NULL,
  `Baja_Consulta` binary(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Estructura de tabla para la tabla `estadoscita`
--

CREATE TABLE `estadoscita` (
  `Id_EstadoCita` int(6) NOT NULL,
  `Nombre_EstadoCita` varchar(15) NOT NULL,
  `Descripcion_EstadoCita` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `Id_Mascota` int(6) NOT NULL,
  `Baja_Historial` binary(1) NOT NULL DEFAULT '0',
  `Id_Servicio` int(6) NOT NULL,
  `Id_Receta` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(36, 1, 'Loly', '2021-01-15', 'Hembra', 1, 1, '2021-08-18'),
(37, 1, 'Tomy', '2020-05-10', 'Macho', 1, 1, '2021-08-18'),
(38, 1, 'Toty', '2020-03-30', 'Macho', 2, 17, '2021-08-18'),
(39, 2, 'Pongo', '2019-08-17', 'Machsao', 1, 1, '2021-08-18'),
(40, 2, 'Bethoven', '2020-07-10', 'Macho', 1, 1, '2021-08-18'),
(41, 3, 'Negra', '2021-03-15', 'Hembra', 2, 18, '2021-08-18'),
(42, 4, 'Pelusa', '2020-03-05', 'Hembra', 1, 5, '2021-08-18'),
(43, 4, 'Marinero', '2020-06-08', 'Macho', 1, 6, '2021-08-18'),
(56, 48, 'Perla', '2021-08-11', 'hembra', 2, 23, NULL),
(57, 49, 'Peludo', '2021-07-26', 'macho', 1, 9, NULL),
(58, 49, 'Jugueton', '2016-01-01', 'macho', 1, 3, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `Id_Personal` int(6) NOT NULL,
  `Identificacion_Personal` varchar(15) NOT NULL,
  `Nombre` varchar(15) NOT NULL,
  `Puesto_Trabajo` varchar(50) NOT NULL,
  `Area` int(6) NOT NULL,
  `Baja_Personal` binary(1) NOT NULL DEFAULT '0',
  `Id_Usuario` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 1, 'French Bulldogs'),
(2, 1, 'Bulldogs'),
(3, 1, 'Poodles '),
(4, 1, 'Beagles'),
(5, 1, 'Rottweilers'),
(6, 1, 'Boxers'),
(7, 1, 'Gran Danes'),
(8, 1, 'Huskies Siberiano'),
(9, 1, 'Doberman'),
(10, 1, 'Schnauzers'),
(11, 1, 'Terriers'),
(12, 1, 'Pugs'),
(13, 1, 'Chihuahuas'),
(14, 1, 'Pastor Aleman'),
(15, 1, 'Dalmatas'),
(16, 1, 'Otros'),
(17, 2, 'Persa'),
(18, 2, 'Azul ruso'),
(19, 2, 'Siamés'),
(20, 2, 'Angora turco'),
(21, 2, 'Siberiano'),
(22, 2, 'Maine Coon'),
(23, 2, 'Bengalí'),
(24, 2, 'Otros');

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
  `Nombre_Servicio` varchar(50) NOT NULL,
  `Precio_Servicio` int(11) NOT NULL,
  `Id_Tipo_Servicio` int(6) NOT NULL,
  `Id_Personal` int(6) NOT NULL,
  `id_servicio` int(6) NOT NULL
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
-- Estructura de tabla para la tabla `tipo_servicios`
--

CREATE TABLE `tipo_servicios` (
  `Id_Tipo_Servicio` int(6) NOT NULL,
  `Tipo_Servicio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'Adinistrador'),
(3, 'Veterinario'),
(4, 'Secretario'),
(5, 'Ayudante');

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
(6, 'secre', 'pass123', '2021-08-18', 3, NULL),
(7, 'vateri', 'pass123', '2021-08-18', 4, NULL),
(8, 'ayuda', 'pass123', '2021-08-18', 5, NULL),
(83, 'mroberto11', 'roberto123', '2021-08-27', 1, NULL),
(84, 'pcubas123', 'cubas123', '2021-08-27', 1, NULL);

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
  ADD UNIQUE KEY `Id_EstadoCita` (`Id_EstadoCita`),
  ADD KEY `Id_Cliente` (`Id_Cliente`),
  ADD KEY `Id_Mascota` (`Id_Mascota`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Id_Cliente`),
  ADD KEY `Id_Usuario` (`Id_Usuario`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`Id_Compra`),
  ADD KEY `Id_Proveedor` (`Id_Proveedor`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`Id_Consulta`),
  ADD KEY `id_paciente` (`Id_Mascota`),
  ADD KEY `id_cita` (`Id_Cita`),
  ADD KEY `id_receta` (`Id_Receta`),
  ADD KEY `Id_Personal` (`Id_Personal`);

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
-- Indices de la tabla `estadoscita`
--
ALTER TABLE `estadoscita`
  ADD PRIMARY KEY (`Id_EstadoCita`);

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
  ADD KEY `Id_Consulta` (`Id_Servicio`),
  ADD KEY `Id_Servicio` (`Id_Servicio`),
  ADD KEY `Id_Receta` (`Id_Receta`);

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
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`Id_Personal`),
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
  ADD PRIMARY KEY (`id_servicio`),
  ADD KEY `Id_Tipo_Servicio` (`Id_Tipo_Servicio`),
  ADD KEY `Id_Personal` (`Id_Personal`);

--
-- Indices de la tabla `telefonos_clientes`
--
ALTER TABLE `telefonos_clientes`
  ADD PRIMARY KEY (`Id_Telefono_Cliente`);

--
-- Indices de la tabla `tipo_especies`
--
ALTER TABLE `tipo_especies`
  ADD PRIMARY KEY (`Id_Especie`);

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
  MODIFY `Id_Cita` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Id_Cliente` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `Id_Compra` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `Id_Consulta` int(6) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de la tabla `estadoscita`
--
ALTER TABLE `estadoscita`
  MODIFY `Id_EstadoCita` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fabricantes`
--
ALTER TABLE `fabricantes`
  MODIFY `Id_Fabricante` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `Id_Historial` int(6) NOT NULL AUTO_INCREMENT;

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
  MODIFY `Id_Mascota` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `Id_Personal` int(6) NOT NULL AUTO_INCREMENT;

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
  MODIFY `Id_Raza` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `id_servicio` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `telefonos_clientes`
--
ALTER TABLE `telefonos_clientes`
  MODIFY `Id_Telefono_Cliente` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_especies`
--
ALTER TABLE `tipo_especies`
  MODIFY `Id_Especie` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `tipo_servicios`
--
ALTER TABLE `tipo_servicios`
  MODIFY `Id_Tipo_Servicio` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipoUsuario` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id_Usuario` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

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
  ADD CONSTRAINT `citas_ibfk_4` FOREIGN KEY (`Id_EstadoCita`) REFERENCES `estadoscita` (`Id_EstadoCita`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `consulta_ibfk_5` FOREIGN KEY (`Id_Mascota`) REFERENCES `mascotas` (`Id_Mascota`);

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
  ADD CONSTRAINT `historial_ibfk_3` FOREIGN KEY (`Id_Receta`) REFERENCES `recetas` (`Id_Receta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historial_ibfk_4` FOREIGN KEY (`Id_Mascota`) REFERENCES `mascotas` (`Id_Mascota`);

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
  ADD CONSTRAINT `mascotas_ibfk_4` FOREIGN KEY (`Id_Cliente`) REFERENCES `clientes` (`ID_Cliente`),
  ADD CONSTRAINT `mascotas_ibfk_5` FOREIGN KEY (`Id_Raza`) REFERENCES `razas` (`Id_Raza`) ON DELETE CASCADE ON UPDATE CASCADE;

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
