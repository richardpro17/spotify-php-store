-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2023 a las 16:33:56
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `spotify_finalp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `comentario_usuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cuerpo_comentario` varchar(500) NOT NULL,
  `estrellas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `comentario_usuario`, `fecha`, `cuerpo_comentario`, `estrellas`) VALUES
(13, 3, '2023-06-01', 'Hola me gusta todo lo publicado', 4),
(14, 3, '2023-06-16', 'QUe tal', 5),
(16, 1, '2023-06-17', 'HOLO', 2),
(27, 1, '2023-06-03', '¡Me encanta esta página de Spotify! Tiene una gran selección de música.', 3),
(28, 1, '2023-06-16', 'La interfaz es muy intuitiva y fácil de usar.', 4),
(29, 1, '2023-06-06', 'Los planes de suscripción tienen excelentes precios.', 3),
(30, 1, '2023-06-11', 'La calidad de sonido es impresionante.', 4),
(31, 3, '2023-06-03', '¡Recomiendo esta página a todos mis amigos!', 5),
(32, 4, '2023-06-03', 'La aplicación móvil es muy práctica para escuchar música en cualquier lugar.', 4),
(33, 5, '2023-06-06', 'El catálogo de planes es increíblemente amplio.', 4),
(34, 6, '2023-06-05', 'Las recomendaciones de música son acertadas y descubro nuevas canciones geniales.', 2),
(35, 7, '2023-06-17', 'La opción de crear listas de reproducción personalizadas es fantástica.', 2),
(36, 9, '2023-06-10', '¡No puedo dejar de escuchar mi música favorita en Spotify!', 1),
(37, 24, '2023-06-08', '¡Me encanta esta página de Spotify! Tiene una gran selección de música.', 4),
(38, 23, '2023-06-17', 'La interfaz es muy intuitiva y fácil de usar.', 3),
(39, 22, '2023-06-13', 'Los planes de suscripción tienen excelentes precios.', 1),
(40, 21, '2023-06-22', 'La calidad de sonido es impresionante.', 5),
(41, 20, '2023-06-07', '¡Recomiendo esta página a todos mis amigos!', 2),
(42, 19, '2023-06-07', 'La aplicación móvil es muy práctica para escuchar música en cualquier lugar.', 4),
(43, 8, '2023-06-08', 'El catálogo de canciones es increíblemente amplio.', 5),
(44, 18, '2023-06-19', 'Las recomendaciones de música son acertadas y descubro nuevas canciones geniales.', 2),
(45, 17, '2023-06-19', 'La opción de crear listas de reproducción personalizadas es fantástica.', 1),
(46, 16, '2023-06-19', '¡No puedo dejar de escuchar mi música favorita en Spotify!', 4),
(47, 15, '2023-06-24', 'Excelente servicio de streaming musical.', 3),
(48, 14, '2023-06-11', 'Me gusta la variedad de géneros musicales disponibles.', 5),
(49, 13, '2023-06-26', 'La calidad de audio es excepcional.', 2),
(50, 12, '2023-06-23', 'La función de recomendaciones personalizadas es muy acertada.', 4),
(51, 11, '2023-06-24', 'Me encanta descubrir nueva música en Spotify.', 2),
(52, 10, '2023-06-20', 'La interfaz es moderna y fácil de navegar.', 5),
(53, 9, '2023-06-15', 'Las playlists curadas son geniales para diferentes estados de ánimo.', 3),
(54, 22, '2023-06-24', 'Spotify se ha convertido en mi compañero musical diario.', 4),
(55, 21, '2023-06-26', 'Me gusta compartir música con mis amigos a través de Spotify.', 3),
(56, 16, '2023-06-17', 'Los podcasts disponibles son interesantes y entretenidos.', 4),
(57, 1, '2023-06-14', 'El servicio premium vale la pena por la ausencia de anuncios.', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_planes`
--

CREATE TABLE `control_planes` (
  `id_cplan` int(11) NOT NULL,
  `plan_usuario` varchar(20) NOT NULL,
  `plan_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `control_planes`
--

INSERT INTO `control_planes` (`id_cplan`, `plan_usuario`, `plan_codigo`) VALUES
(17, 'ric17', 11114446),
(18, 'ric17', 11114445),
(19, 'emiliano231', 11113333),
(21, 'ric17', 11113335);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `id_plan` int(11) NOT NULL,
  `nombre_plan` varchar(100) NOT NULL,
  `precio` float NOT NULL,
  `codigo` int(11) NOT NULL,
  `duracion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id_plan`, `nombre_plan`, `precio`, `codigo`, `duracion`) VALUES
(91, 'plan familiar', 190.99, 11114449, 60),
(92, 'plan familiar', 190.99, 11114450, 60),
(93, 'plan familiar', 190.99, 11114451, 60),
(94, 'plan familiar', 190.99, 11114452, 60),
(95, 'plan familiar', 190.99, 11114453, 60),
(99, 'plan premium', 149.99, 11113336, 30),
(100, 'plan premium', 149.99, 11113337, 30),
(102, 'plan premium', 149.99, 11113339, 30),
(103, 'plan premium', 149.99, 11113340, 30),
(104, 'plan premium', 149.99, 11113341, 30),
(105, 'plan premium', 149.99, 11113342, 30),
(106, 'plan basico', 115, 11112223, 15),
(108, 'plan basico', 115, 11112225, 15),
(109, 'plan basico', 115, 11112226, 15),
(110, 'plan basico', 115, 11112227, 15),
(111, 'plan basico', 115, 11112228, 15),
(112, 'plan basico', 115, 11112229, 15),
(113, 'plan basico', 115, 11112230, 15),
(116, 'plan basico', 115, 43343433, 15),
(117, 'plan familiar', 190.99, 21212130, 60),
(118, 'plan basico', 115, 1, 15),
(119, 'plan basico', 115, 10000001, 15),
(120, 'plan familiar', 190.99, 10000002, 60),
(121, 'plan premium', 149.99, 10000033, 30),
(122, 'plan basico', 115, 10200033, 15),
(123, 'plan familiar', 190.99, 20200033, 60),
(124, 'plan premium', 149.99, 90200033, 30),
(125, 'plan basico', 115, 90200733, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sugerencias_tabla`
--

CREATE TABLE `sugerencias_tabla` (
  `id_queja` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `mensaje` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sugerencias_tabla`
--

INSERT INTO `sugerencias_tabla` (`id_queja`, `email`, `nombre`, `mensaje`) VALUES
(22, 'rr@cbtis224.com', 'Rich Hinojosa', 'Esta muy padre la historia que cuentas sobre spotify amigo'),
(27, 'emiliano225@ag.com', 'Omar', 'Ya llevamos tiempo con la pagina subela a wordpress'),
(28, 'juan@hotmal.com', 'Hernandez', 'Hola podrias poner la historia de como casi el cel de spotify pierde 25, millones de dolares'),
(29, 'ge@34343.com', 'Gerardo', 'Subiras canciones de artistas independientes?'),
(30, 'emiliano@cbtis225.edu.mx', 'emiliano', 'Voy a mejorar la pagina comentario de ejemplo'),
(31, 'rg.cbtis.255@ag.co', 'Ric', 'Quedo fantastico el resultado final de este proyecto bro'),
(32, 'lis@simpson.com', 'Lisa', 'Me gusta la pagina creo que hay putnos en los que te puedo ayudar a mejorar'),
(33, 'jl@lopez.com', 'Juan', 'Hola yo disfruto de la musica buena desde hace tiempo sigue asi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(12) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `apellido` varchar(70) NOT NULL,
  `correo` varchar(300) NOT NULL,
  `contrasena` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `nombre`, `apellido`, `correo`, `contrasena`) VALUES
(1, 'emiliano231', 'Emiliano', 'Martinez', 'emiliano@cbtis225.edu.mx', 'admin'),
(3, 'ric17', 'Richard', 'Montelongo', 'rg.cbtis.255@ag.co', '1234'),
(4, 'lis858', 'Lisa', 'Simpson', 'lis@simpson.com', 'lis'),
(5, 'juan1213', 'Juan', 'Lopez', 'jl@lopez.com', 'juangod'),
(6, 'mariareg', 'Maria', 'Regional', 'mari@regional.com', 'marig'),
(7, 'pepo9891', 'Pedro', 'Gonzalez', 'thepepo@gmail.com', 'pepo'),
(8, 'luisillo12', 'Luis', 'Gomez', 'gomezLuis@hotmail.com', 'luis5'),
(9, 'christian23', 'Christian', 'Hernandez', 'hernandez@ag.com', 'chris22'),
(10, 'jonhdoi', 'John', 'Doe', 'johndoe@example.com', 'jonh'),
(11, 'janessx', 'Jane', 'Smith', 'janesmith@example.com', 'janes'),
(12, 'michmilel', 'Michael', 'Johnson', 'michaeljohnson@example.com', 'mich'),
(13, 'emilyrobe', 'Emily', 'Davis', 'emilydavis@example.com', 'emil'),
(14, 'danijaime', 'Daniel', 'Wilson', 'danielwilson@example.com', 'jam22'),
(15, 'olicafe', 'Olivia', 'Brown', 'oliviabrown@example.com', 'ol554'),
(16, 'mathewp111', 'Matthew', 'Taylor', 'matthewtaylor@example.com', 'math3828'),
(17, 'sofas9292', 'Sophia', 'Thomas', 'sophiathomas@example.com', 'fos1032'),
(18, 'davidander', 'David', 'Anderson', 'davidanderson@example.com', 'davidbro'),
(19, 'isatkmas', 'Isabella', 'Martinez', 'isabellamartinez@example.com', 'isa8828'),
(20, 'kim38738', 'Liam', 'Johnson', 'liamjohnson@example.com', 'gtgt'),
(21, 'emmawats', 'Emma', 'Williams', 'emmawilliams@example.com', 'aaaa'),
(22, 'noahnoah', 'Noah', 'Jones', 'noahjones@example.com', 'noa'),
(23, 'avamax', 'Ava', 'Brown', 'avabrown@example.com', '1231431'),
(24, 'Jamespat', 'James', 'Wilson', 'jameswilson@example.com', 'aspit');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `cuerpo_comentario` (`cuerpo_comentario`),
  ADD KEY `cuerpo_comentario_2` (`cuerpo_comentario`),
  ADD KEY `fk_comentario_usuario` (`comentario_usuario`);

--
-- Indices de la tabla `control_planes`
--
ALTER TABLE `control_planes`
  ADD PRIMARY KEY (`id_cplan`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id_plan`);

--
-- Indices de la tabla `sugerencias_tabla`
--
ALTER TABLE `sugerencias_tabla`
  ADD PRIMARY KEY (`id_queja`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `control_planes`
--
ALTER TABLE `control_planes`
  MODIFY `id_cplan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT de la tabla `sugerencias_tabla`
--
ALTER TABLE `sugerencias_tabla`
  MODIFY `id_queja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_comentario_usuario` FOREIGN KEY (`comentario_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
