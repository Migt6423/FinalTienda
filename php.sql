-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2020 a las 03:12:03
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(10) UNSIGNED NOT NULL,
  `Producto_Marca_idMarca` int(10) UNSIGNED NOT NULL,
  `Producto_idProducto` int(10) UNSIGNED NOT NULL,
  `Nombre` varchar(20) DEFAULT NULL,
  `Activo` int(11) DEFAULT NULL,
  `id_padre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `Producto_Marca_idMarca`, `Producto_idProducto`, `Nombre`, `Activo`, `id_padre`) VALUES
(0, 0, 0, 'Celulares', 1, NULL),
(1, 0, 0, 'Calzado', NULL, 0),
(2, 0, 0, 'Pantalones', NULL, 0),
(3, 0, 0, 'Remeras', NULL, 0),
(4, 1, 1, 'Botines', NULL, 1),
(5, 3, 8, 'Manga Corta', NULL, 3),
(6, 3, 9, 'Calza Deportiva', NULL, 2),
(7, 5, 7, 'Manga Larga', NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idComentarios` int(10) UNSIGNED NOT NULL,
  `Usuario_idUsuario` int(10) UNSIGNED NOT NULL,
  `Nota` int(10) UNSIGNED NOT NULL,
  `Comentario` varchar(80) DEFAULT NULL,
  `Destacado` int(11) DEFAULT NULL,
  `Activo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idComentarios`, `Usuario_idUsuario`, `Nota`, `Comentario`, `Destacado`, `Activo`) VALUES
(1, 6, 4, 'Muy bueno!', NULL, NULL),
(2, 2, 5, 'Excelente!', NULL, NULL),
(3, 3, 3, 'Les falta mucho todavia', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarioxproducto`
--

CREATE TABLE `comentarioxproducto` (
  `idComentarioxProducto` int(10) UNSIGNED NOT NULL,
  `Producto_idProducto` int(10) UNSIGNED NOT NULL,
  `Comentarios_Usuario_idUsuario` int(10) UNSIGNED NOT NULL,
  `Comentarios_idComentarios` int(10) UNSIGNED NOT NULL,
  `Producto_Marca_idMarca` int(10) UNSIGNED NOT NULL,
  `Ranking` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarioxproducto`
--

INSERT INTO `comentarioxproducto` (`idComentarioxProducto`, `Producto_idProducto`, `Comentarios_Usuario_idUsuario`, `Comentarios_idComentarios`, `Producto_Marca_idMarca`, `Ranking`) VALUES
(1, 1, 1, 1, 1, 5),
(2, 5, 2, 2, 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `idContacto` int(10) UNSIGNED NOT NULL,
  `ContactoxUsuario_Usuario_idUsuario` int(10) UNSIGNED NOT NULL,
  `ContactoxUsuario_idContactoxUsuario` int(10) UNSIGNED NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Area` varchar(30) DEFAULT NULL,
  `Comentario` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`idContacto`, `ContactoxUsuario_Usuario_idUsuario`, `ContactoxUsuario_idContactoxUsuario`, `Nombre`, `Email`, `Area`, `Comentario`) VALUES
(1, 1, 1, '', NULL, NULL, NULL),
(2, 2, 2, '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactoxusuario`
--

CREATE TABLE `contactoxusuario` (
  `idContactoxUsuario` int(10) UNSIGNED NOT NULL,
  `Usuario_idUsuario` int(10) UNSIGNED NOT NULL,
  `Area` varchar(15) DEFAULT NULL,
  `Consulta` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contactoxusuario`
--

INSERT INTO `contactoxusuario` (`idContactoxUsuario`, `Usuario_idUsuario`, `Area`, `Consulta`) VALUES
(1, 1, '1', 'Tienen el producto?'),
(2, 2, '2', 'Podre hacer un cambio en la semana?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `idMarca` int(10) UNSIGNED NOT NULL,
  `Nombre` varchar(15) DEFAULT NULL,
  `Activo` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idMarca`, `Nombre`, `Activo`) VALUES
(1, 'Adidas', 1),
(2, 'Nike', 1),
(3, 'Puma', 1),
(4, 'Penalty', 1),
(5, 'Oneplus', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `idPerfil` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`idPerfil`, `nombre`) VALUES
(1, 'Usuario'),
(2, 'Administrador'),
(3, 'SuperAdmin'),
(4, 'Buenardo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfilxusuario`
--

CREATE TABLE `perfilxusuario` (
  `idPerfilxUsuario` int(10) UNSIGNED NOT NULL,
  `Perfil_idPerfil` int(10) UNSIGNED NOT NULL,
  `Usuario_idUsuario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfilxusuario`
--

INSERT INTO `perfilxusuario` (`idPerfilxUsuario`, `Perfil_idPerfil`, `Usuario_idUsuario`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idPermisos` int(10) UNSIGNED NOT NULL,
  `Nombre` varchar(15) DEFAULT NULL,
  `Codigo` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idPermisos`, `Nombre`, `Codigo`) VALUES
(1, 'Subir', 1),
(2, 'Modificar', 2),
(3, 'Eliminar', 3),
(4, 'Comentar', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisosxperfil`
--

CREATE TABLE `permisosxperfil` (
  `idPermisosxPerfil` int(10) UNSIGNED NOT NULL,
  `Permisos_idPermisos` int(10) UNSIGNED NOT NULL,
  `Perfil_idPerfil` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisosxperfil`
--

INSERT INTO `permisosxperfil` (`idPermisosxPerfil`, `Permisos_idPermisos`, `Perfil_idPerfil`) VALUES
(1, 4, 1),
(2, 1, 2),
(3, 2, 2),
(4, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(10) UNSIGNED NOT NULL,
  `Marca_idMarca` int(10) UNSIGNED NOT NULL,
  `Nombre` varchar(15) NOT NULL,
  `Precio` int(11) NOT NULL,
  `Imagen` varchar(150) DEFAULT NULL,
  `Activo` int(10) UNSIGNED DEFAULT NULL,
  `Destacado` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `Marca_idMarca`, `Nombre`, `Precio`, `Imagen`, `Activo`, `Destacado`) VALUES
(1, 1, 'Botines Star', 0, 'Altos timbos bro2', 0, 0),
(2, 1, 'Remera Running', 400, 'Los detalles sutiles le dan un look llamativo a esta camiseta para hombre inspirada en el fútbol. Presenta un diseño con las 3 Tiras brillantes en jac', 1, NULL),
(3, 1, 'Pant Running', 1600, 'Ponete estos pantalones para hombre que te brindarán un estilo diario, clásico y cómodo. Confeccionados en suave felpa francesa, estos pantalones vien', 1, 1),
(4, 2, 'Botines Nike', 750, 'Tomá el control de la cancha con estos botines de rugby para terreno suave. Presentan un exterior liviano que le brinda a tus pies estabilidad y comod', 1, 1),
(5, 2, 'Pant Nike', 1600, 'Ponete estos pantalones para hombre que te brindarán un estilo diario, clásico y cómodo. Confeccionados en suave felpa francesa, estos pantalones vien', 1, 1),
(6, 2, 'Remera a', 1100, 'Los detalles sutiles le dan un look llamativo a esta camiseta para hombre inspirada en el fútbol. Presenta un diseño con las 3 Tiras brillantes en jac', 1, NULL),
(7, 3, 'Botines Puma', 800, 'Tomá el control de la cancha con estos botines de rugby para terreno suave. Presentan un exterior liviano que le brinda a tus pies estabilidad y comod', 1, 1),
(8, 3, 'Remera Puma', 1600, 'Los detalles sutiles le dan un look llamativo a esta camiseta para hombre inspirada en el fútbol. Presenta un diseño con las 3 Tiras brillantes en jac', 1, NULL),
(9, 3, 'Pant Puma', 10000, 'Ponete estos pantalones para hombre que te brindarán un estilo diario, clásico y cómodo. Confeccionados en suave felpa francesa, estos pantalones vien', 1, 1),
(10, 4, 'Penalty', 5000, 'test test test test test test test test test test test test ', 1, 1),
(11, 4, 'Botines fooerte', 88822, 'Altos timbos bro dsfg', 0, 1),
(12, 3, 'Botines fooerte', 12341, 'Altos timbos bro ', 1, 1),
(13, 3, 'botines test', 11111, 'test1', 1, 1),
(14, 1, 'sadfsg', 3456, 'sewfrgthjk', 1, 1),
(15, 2, 'dssfghjk,', 2345, 'Altos timbos bro dsfg', 1, 0),
(16, 2, 'sdafghj,kjgdfs', 56543, 'sadfghyjrkiyutje', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(10) UNSIGNED NOT NULL,
  `usuario_nombre` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `tipoUsuario` int(11) DEFAULT NULL,
  `Imagen` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuario_nombre`, `password`, `tipoUsuario`, `Imagen`, `nombre`, `apellido`, `email`) VALUES
(2, 'Tomas', 'luisp', 2, 1, '', '', ''),
(3, 'Jorge', 'test', 1, 2, '', '', ''),
(6, 'martin', '12345', 2, 3, '', '', ''),
(10, 'casti', '81dc9bdb52d04dc', 0, 0, '81dc9bdb52d04dc20036dbd8313ed055', 'c@c.com', '2'),
(11, 'casti', '81dc9bdb52d04dc', 0, 0, '81dc9bdb52d04dc20036dbd8313ed055', 'c@c.com', '2'),
(12, 'casti', '81dc9bdb52d04dc', 0, 0, '81dc9bdb52d04dc20036dbd8313ed055', 'k@f.com', '2'),
(13, 'sa', 'e10adc3949ba59a', 2, 0, 'c', 'cas', 'c@f.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`,`Producto_Marca_idMarca`,`Producto_idProducto`),
  ADD KEY `Categoria_FKIndex1` (`Producto_idProducto`,`Producto_Marca_idMarca`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idComentarios`,`Usuario_idUsuario`),
  ADD KEY `Comentarios_FKIndex1` (`Usuario_idUsuario`);

--
-- Indices de la tabla `comentarioxproducto`
--
ALTER TABLE `comentarioxproducto`
  ADD PRIMARY KEY (`idComentarioxProducto`,`Producto_idProducto`,`Comentarios_Usuario_idUsuario`,`Comentarios_idComentarios`,`Producto_Marca_idMarca`),
  ADD KEY `ComentarioxProducto_FKIndex1` (`Producto_idProducto`,`Producto_Marca_idMarca`),
  ADD KEY `ComentarioxProducto_FKIndex2` (`Comentarios_idComentarios`,`Comentarios_Usuario_idUsuario`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`idContacto`,`ContactoxUsuario_Usuario_idUsuario`,`ContactoxUsuario_idContactoxUsuario`),
  ADD KEY `Contacto_FKIndex1` (`ContactoxUsuario_idContactoxUsuario`,`ContactoxUsuario_Usuario_idUsuario`);

--
-- Indices de la tabla `contactoxusuario`
--
ALTER TABLE `contactoxusuario`
  ADD PRIMARY KEY (`idContactoxUsuario`,`Usuario_idUsuario`),
  ADD KEY `ContactoxUsuario_FKIndex1` (`Usuario_idUsuario`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idMarca`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idPerfil`);

--
-- Indices de la tabla `perfilxusuario`
--
ALTER TABLE `perfilxusuario`
  ADD PRIMARY KEY (`idPerfilxUsuario`,`Perfil_idPerfil`,`Usuario_idUsuario`),
  ADD KEY `PerfilxUsuario_FKIndex1` (`Perfil_idPerfil`),
  ADD KEY `PerfilxUsuario_FKIndex2` (`Usuario_idUsuario`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idPermisos`);

--
-- Indices de la tabla `permisosxperfil`
--
ALTER TABLE `permisosxperfil`
  ADD PRIMARY KEY (`idPermisosxPerfil`,`Permisos_idPermisos`,`Perfil_idPerfil`),
  ADD KEY `PermisosxPerfil_FKIndex1` (`Permisos_idPermisos`),
  ADD KEY `PermisosxPerfil_FKIndex2` (`Perfil_idPerfil`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`,`Marca_idMarca`),
  ADD KEY `Producto_FKIndex1` (`Marca_idMarca`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idComentarios` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `comentarioxproducto`
--
ALTER TABLE `comentarioxproducto`
  MODIFY `idComentarioxProducto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `idContacto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `contactoxusuario`
--
ALTER TABLE `contactoxusuario`
  MODIFY `idContactoxUsuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `idMarca` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idPerfil` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `perfilxusuario`
--
ALTER TABLE `perfilxusuario`
  MODIFY `idPerfilxUsuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
