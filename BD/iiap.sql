-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2023 at 01:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iiap`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`) VALUES
(1, 'Computadoras y portátiles\n'),
(2, 'Impresoras y escáneres\n'),
(3, 'Mobiliario de oficina'),
(4, 'Equipo de comunicación');

-- --------------------------------------------------------

--
-- Table structure for table `datos_empresa`
--

CREATE TABLE `datos_empresa` (
  `id_empresa` int(11) NOT NULL,
  `nombre_empresa` varchar(100) NOT NULL,
  `direccion_empresa` varchar(100) DEFAULT NULL,
  `telefono_empresa` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datos_empresa`
--

INSERT INTO `datos_empresa` (`id_empresa`, `nombre_empresa`, `direccion_empresa`, `telefono_empresa`) VALUES
(1, 'IIAP', 'Nueva Dirección', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `devoluciones`
--

CREATE TABLE `devoluciones` (
  `id_devolucion` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `equipo_id` int(11) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `observacion` text DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `fecha_devolucion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `devoluciones`
--

INSERT INTO `devoluciones` (`id_devolucion`, `usuario_id`, `equipo_id`, `estado`, `observacion`, `Cantidad`, `fecha_devolucion`) VALUES
(2, 7, 8, 'Pendiente por devolver', 'Sin novedad', 2, '2023-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `equipos`
--

CREATE TABLE `equipos` (
  `id_equipo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `serial` varchar(100) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `fecha_mantenimiento` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `nombre`, `marca`, `serial`, `estado`, `fecha_mantenimiento`, `cantidad`, `foto`, `id_categoria`) VALUES
(1, 'Impresora', 'HP', '3344DDF555', 'Activo', '2023-07-30', 5, '../../avatar/impresora.jpg', 2),
(2, 'Impresora', 'HP', 'DD233DDD', 'Activo', '2023-07-25', 2, '../../avatar/impresora.jpg\r\n', 2),
(3, 'Portatil', 'HP', '34DD4432', 'Activo', '2023-07-28', 3, '../../avatar/portatil.jpeg\r\n', 1),
(4, 'Telefono', 'Marca1', 'Serial4', 'Activo', '2023-07-29', 1, '../../avatar/impresora.jpg', 1),
(5, 'Portail mobilario', 'HP', '34DDDXC', 'Mantenimiento', '2023-07-24', 6, '../../avatar/portatil.jpeg', 3),
(7, 'Impesora Comunicacion', 'HP', '455ffrtt33', 'Activo', '2023-07-27', 2, '../../avatar/impresora.jpg', 4),
(8, 'Portatil', 'HP', '445ddfg545', 'Mantenimiento', '2023-07-23', 3, '../../avatar/portatil.jpeg', 1),
(9, 'Portatil', 'HP', 'S1234565aa444', 'Inactivo', '2023-07-22', 1, '../../avatar/portatil.jpeg', 2),
(10, 'Impresora', 'HP', '4555FFF555', 'Activo', '2023-07-21', 4, '../../avatar/impresora.jpg', 1),
(61, 'Impresora', 'HP', '3344DDF555', 'Activo', '2023-07-30', 5, '../../avatar/impresora.jpg', 2),
(62, 'Impresora', 'HP', 'DD233DDD', 'Activo', '2023-07-25', 2, '../../avatar/impresora.jpg', 2),
(63, 'Portatil', 'HP', '34DD4432', 'Activo', '2023-07-28', 3, '../../avatar/portatil.jpeg', 1),
(64, 'Telefono', 'Marca1', 'Serial4', 'Mantenimiento', '2023-07-29', 1, '../../avatar/impresora.jpg', 1),
(65, 'Portail mobilario', 'HP', '34DDDXC', 'Activo', '2023-07-24', 6, '../../avatar/portatil.jpeg', 3),
(66, 'Impesora Comunicacion', 'HP', '455ffrtt33', 'Activo', '2023-07-27', 2, '../../avatar/impresora.jpg', 4),
(67, 'Portatil', 'HP', '445ddfg545', 'Activo', '2023-07-23', 3, '../../avatar/portatil.jpeg', 1),
(68, 'Portatil', 'HP', 'S1234565aa444', 'Activo', '2023-07-22', 1, '../../avatar/portatil.jpeg', 2),
(69, 'Impresora', 'HP', '4555FFF555', 'Mantenimiento', '2023-07-21', 4, '../../avatar/impresora.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `permiso_rol`
--

CREATE TABLE `permiso_rol` (
  `id_permiso` int(10) UNSIGNED NOT NULL,
  `id_roles` int(11) UNSIGNED NOT NULL,
  `url` varchar(100) NOT NULL,
  `create` tinyint(1) NOT NULL DEFAULT 0,
  `read` tinyint(1) NOT NULL DEFAULT 0,
  `update` tinyint(1) NOT NULL DEFAULT 0,
  `delete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permiso_rol`
--

INSERT INTO `permiso_rol` (`id_permiso`, `id_roles`, `url`, `create`, `read`, `update`, `delete`) VALUES
(1, 4, 'bookings', 1, 1, 1, 1),
(5, 5, 'technical_support', 1, 1, 1, 1),
(6, 2, 'administration', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prestamos`
--

CREATE TABLE `prestamos` (
  `id_prestamo` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `equipo_id` int(11) DEFAULT NULL,
  `fecha_prestamo` date DEFAULT NULL,
  `fecha_devolucion` date DEFAULT NULL,
  `estado` varchar(45) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `observacion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prestamos`
--

INSERT INTO `prestamos` (`id_prestamo`, `usuario_id`, `equipo_id`, `fecha_prestamo`, `fecha_devolucion`, `estado`, `cantidad`, `observacion`) VALUES
(2, 7, 9, '2023-08-14', '2023-08-18', 'Activo', 1, 'Sin novedades');

-- --------------------------------------------------------

--
-- Table structure for table `reservaciones`
--

CREATE TABLE `reservaciones` (
  `id_reservacion` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `equipo_id` int(11) DEFAULT NULL,
  `fecha_solicitud` date DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `observacion` varchar(100) DEFAULT NULL,
  `Cantidad` int(11) NOT NULL,
  `fecha_devolucion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservaciones`
--

INSERT INTO `reservaciones` (`id_reservacion`, `usuario_id`, `equipo_id`, `fecha_solicitud`, `estado`, `observacion`, `Cantidad`, `fecha_devolucion`) VALUES
(13, 7, 8, '2023-08-09', 'Activo', 'Sin novedad', 2, '2023-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_roles` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_roles`, `nombre`) VALUES
(2, 'Admin'),
(3, 'Jefe_Almacen'),
(4, 'Contratista'),
(5, 'Soporte_tecnico'),
(6, 'Personal_administrativo');

-- --------------------------------------------------------

--
-- Table structure for table `sesiones`
--

CREATE TABLE `sesiones` (
  `id_sesion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_expiracion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sesiones`
--

INSERT INTO `sesiones` (`id_sesion`, `id_usuario`, `token`, `fecha_creacion`, `fecha_expiracion`) VALUES
(122, 9, 'r4iJRWBjIA1yu4LXPuZbHrqZb5MZRgXt', '2023-08-13 07:28:23', '2023-08-13 07:48:23'),
(128, 9, 'EmyYa63pNgKwWRnniqsI0APcaiQlJTJG', '2023-08-14 09:09:27', '2023-08-14 09:29:27'),
(133, 9, 'Q28L6cXUVnQHIa8hxnWIgRd1mxIGxFHG', '2023-08-14 17:05:52', '2023-08-14 17:25:52'),
(136, 7, 'aXm8qkN5kvZwb61iXMcKuhbjZd84a6EA', '2023-08-14 20:48:10', '2023-08-14 21:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `numero_documento` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `tipo_vinculacion` varchar(40) DEFAULT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `numero_documento`, `nombre`, `sexo`, `telefono`, `tipo_vinculacion`, `correo`, `contrasena`, `avatar`) VALUES
(7, 4562334, 'Heiner', 'Hombre', '344333', 'Pasante', 'heiner@gmail.com', 'UVlZbmFsQ0tWS25ORUwrdWtZYXhldz09', '../../avatar/Petro.jpg'),
(8, 7894567, 'Laura', 'Mujer', '555444', 'Empleado', 'laura@gmail.com', 'TklyNkg5WWw4a1NJTDhiNnlueEF6UT09', '../../avatar/Petro.jpg'),
(9, 1234567, 'Carlos', 'Hombre', '777888', 'Contratista', 'carlos@gmail.com', 'UVlZbmFsQ0tWS25ORUwrdWtZYXhldz09', '../../avatar/Petro.jpg'),
(10, 9876543, 'Ana', 'Mujer', '999888', 'Pasante', 'ana@gmail.com', 'Um5ZTXBlUVVxZ1RiU0l1QkxNSU1KZz09', '../../avatar/Petro.jpg'),
(11, 5432198, 'Pedro', 'Hombre', '222333', 'Empleado', 'pedro@gmail.com', 'YlRWeFlXUXhaM1ZYT0hkaU5ESmxjMkYwTVZvPQ==', '../../avatar/Petro.jpg'),
(12, 1357924, 'María', 'Mujer', '444555', 'Contratista', 'maria@gmail.com', 'WVZKd2FXNWtiMlJ0WVdSbGRtRmZNbXhzWTJkbGR6MDk=', '../../avatar/Petro.jpg'),
(44, 1111111111, 'Pedro', 'Masculino', '3234960276', 'Jefe_Almacen', 'heylerty77@gmail.com', 'WjdHaitGYWUrYVUxcGNxY2V3RFdtdz09', './avatar/casa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_rol`
--

CREATE TABLE `usuarios_rol` (
  `id_usuarios_rol` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_roles` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios_rol`
--

INSERT INTO `usuarios_rol` (`id_usuarios_rol`, `id_usuario`, `id_roles`) VALUES
(1, 7, 4),
(2, 8, 5),
(3, 9, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `datos_empresa`
--
ALTER TABLE `datos_empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indexes for table `devoluciones`
--
ALTER TABLE `devoluciones`
  ADD PRIMARY KEY (`id_devolucion`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `equipo_id` (`equipo_id`);

--
-- Indexes for table `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `equipos_ibfk_2` (`id_categoria`);

--
-- Indexes for table `permiso_rol`
--
ALTER TABLE `permiso_rol`
  ADD PRIMARY KEY (`id_permiso`),
  ADD KEY `id_roles` (`id_roles`);

--
-- Indexes for table `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id_prestamo`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `equipo_id` (`equipo_id`);

--
-- Indexes for table `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD PRIMARY KEY (`id_reservacion`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `equipo_id` (`equipo_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Indexes for table `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`id_sesion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `numero_documento` (`numero_documento`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `correo_2` (`correo`);

--
-- Indexes for table `usuarios_rol`
--
ALTER TABLE `usuarios_rol`
  ADD PRIMARY KEY (`id_usuarios_rol`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_roles` (`id_roles`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `datos_empresa`
--
ALTER TABLE `datos_empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `devoluciones`
--
ALTER TABLE `devoluciones`
  MODIFY `id_devolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `permiso_rol`
--
ALTER TABLE `permiso_rol`
  MODIFY `id_permiso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id_prestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservaciones`
--
ALTER TABLE `reservaciones`
  MODIFY `id_reservacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `id_sesion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `usuarios_rol`
--
ALTER TABLE `usuarios_rol`
  MODIFY `id_usuarios_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `devoluciones`
--
ALTER TABLE `devoluciones`
  ADD CONSTRAINT `devoluciones_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `devoluciones_ibfk_3` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`id_equipo`);

--
-- Constraints for table `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Constraints for table `permiso_rol`
--
ALTER TABLE `permiso_rol`
  ADD CONSTRAINT `permiso_rol_ibfk_1` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id_roles`);

--
-- Constraints for table `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `prestamos_ibfk_2` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`id_equipo`);

--
-- Constraints for table `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD CONSTRAINT `reservaciones_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `reservaciones_ibfk_2` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`id_equipo`);

--
-- Constraints for table `sesiones`
--
ALTER TABLE `sesiones`
  ADD CONSTRAINT `sesiones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Constraints for table `usuarios_rol`
--
ALTER TABLE `usuarios_rol`
  ADD CONSTRAINT `usuarios_rol_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `usuarios_rol_ibfk_2` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id_roles`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
