-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2017 a las 00:05:02
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_busqueda`
--

CREATE TABLE `tb_busqueda` (
  `id_buscar` int(11) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `definicion` text NOT NULL,
  `url` varchar(34) NOT NULL,
  `claves` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_busqueda`
--

INSERT INTO `tb_busqueda` (`id_buscar`, `nombre`, `definicion`, `url`, `claves`) VALUES
(1, 'modelo edentidad relación', 'El modelo entidad-relación ER es un modelo de datos que permite representar cualquier abstracción, percepción y conocimiento en un sistema de información formado por un conjunto de objetos denominados entidades y relaciones, incorporando una representación visual conocida como diagrama entidad-relación.', 'imagenes/modelo_relacion.PNG', 'base de datos, manual, ayuda, uml'),
(2, 'casos de uso', 'En el Lenguaje de Modelado Unificado, un diagrama de casos de uso es una forma de diagrama de comportamiento UML mejorado. El Lenguaje de Modelado Unificado (UML), define una notación gráfica para representar casos de uso llamada modelo de casos de uso. UML no define estándares para que el formato escrito describa los casos de uso, y así mucha gente no entiende que esta notación gráfica define la naturaleza de un caso de uso; sin embargo una notación gráfica puede solo dar una vista general simple de un caso de uso o un conjunto de casos de uso. Los diagramas de casos de uso son a menudo confundidos con los casos de uso. ', 'imagenes/casos.PNG', 'manual, ayuda, uml'),
(3, 'clases de proyecto', 'Un proyecto es una planificación que consiste en un conjunto de actividades que se encuentran interrelacionadas y coordinadas; la razón de un proyecto es alcanzar objetivos específicos dentro de los límites que imponen un presupuesto y un lapso de tiempo previamente definidos El término proyecto proviene del latín projectus y puede definirse como a un serie de actividades coordinadas que buscan cumplir con un cierto objetivo específico. ', 'imagenes/clases_proyecto.PNG', 'manual, ayuda, uml'),
(4, 'diagrama de componentes', 'Un diagrama de componentes representa cómo un sistema de software es dividido en componentes y muestra las dependencias entre estos componentes. Los componentes físicos incluyen archivos, cabeceras, bibliotecas compartidas, módulos, ejecutables, o paquetes. Los diagramas de Componentes prevalecen en el campo de la arquitectura de software pero pueden ser usados para modelar y documentar cualquier arquitectura de sistema.', 'imagenes/diagrama_componentes.PNG', 'manual, ayuda, uml'),
(5, 'diagrama destribución', 'Diagrama de Distribución Es una representación gráfica de los pasos que se siguen en toda una secuencia de actividades, dentro de un proceso o un procedimiento, identificándolos mediante símbolos de acuerdo con su naturaleza; incluye, además, toda la información que se considera necesaria para el análisis, tal como distancias recorridas, cantidad considerada y tiempo requerido.', 'imagenes/diagrama_distribución.PNG', 'manual, ayuda, uml');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_enfermedades`
--

CREATE TABLE `tb_enfermedades` (
  `id_enfermedad` int(10) NOT NULL,
  `enfermedad` varchar(100) NOT NULL,
  `recomendaciones` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_enfermedades`
--

INSERT INTO `tb_enfermedades` (`id_enfermedad`, `enfermedad`, `recomendaciones`) VALUES
(1, 'Bronquitis', ''),
(2, 'Asma', ''),
(3, 'cancer', ''),
(4, 'Depresion', ''),
(5, 'Esquizofrenia', ''),
(6, 'Gonorrea', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_informe`
--

CREATE TABLE `tb_informe` (
  `id_informe` int(10) NOT NULL,
  `id_enfermedad` int(10) NOT NULL,
  `id_sintomas` int(11) NOT NULL,
  `id_buscar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_informe`
--

INSERT INTO `tb_informe` (`id_informe`, `id_enfermedad`, `id_sintomas`, `id_buscar`) VALUES
(2, 1, 3, 0),
(3, 2, 10, 0),
(4, 3, 5, 0),
(5, 4, 6, 0),
(6, 5, 7, 0),
(7, 1, 1, 0),
(8, 2, 4, 0),
(9, 4, 8, 0),
(10, 4, 2, 0),
(11, 2, 11, 0),
(12, 1, 8, 0),
(13, 1, 9, 0),
(14, 3, 10, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_sintomas`
--

CREATE TABLE `tb_sintomas` (
  `id_sintomas` int(10) NOT NULL,
  `sintoma` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_sintomas`
--

INSERT INTO `tb_sintomas` (`id_sintomas`, `sintoma`) VALUES
(1, 'dolor_articular'),
(2, 'bomito'),
(3, 'fiebre'),
(4, 'ansiedad'),
(5, 'diarrea'),
(6, 'inflamacion'),
(7, 'dolor de cabeza'),
(8, 'debilidad'),
(9, 'Escalofrios'),
(10, 'Deshidratacion'),
(11, 'desaliento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `documento` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_informe` int(10) NOT NULL,
  `id_buscar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_busqueda`
--
ALTER TABLE `tb_busqueda`
  ADD PRIMARY KEY (`id_buscar`);

--
-- Indices de la tabla `tb_enfermedades`
--
ALTER TABLE `tb_enfermedades`
  ADD PRIMARY KEY (`id_enfermedad`);

--
-- Indices de la tabla `tb_informe`
--
ALTER TABLE `tb_informe`
  ADD PRIMARY KEY (`id_informe`),
  ADD KEY `index_enfermdad` (`id_enfermedad`),
  ADD KEY `index_sintoma` (`id_sintomas`),
  ADD KEY `id_` (`id_buscar`);

--
-- Indices de la tabla `tb_sintomas`
--
ALTER TABLE `tb_sintomas`
  ADD PRIMARY KEY (`id_sintomas`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`documento`),
  ADD KEY `indice_id_informe` (`id_informe`),
  ADD KEY `indice_id_buscar` (`id_buscar`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_enfermedades`
--
ALTER TABLE `tb_enfermedades`
  MODIFY `id_enfermedad` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `tb_informe`
--
ALTER TABLE `tb_informe`
  MODIFY `id_informe` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `tb_sintomas`
--
ALTER TABLE `tb_sintomas`
  MODIFY `id_sintomas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_informe`
--
ALTER TABLE `tb_informe`
  ADD CONSTRAINT `tb_informe_ibfk_1` FOREIGN KEY (`id_enfermedad`) REFERENCES `tb_enfermedades` (`id_enfermedad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_informe_ibfk_2` FOREIGN KEY (`id_sintomas`) REFERENCES `tb_sintomas` (`id_sintomas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD CONSTRAINT `tb_usuarios_ibfk_1` FOREIGN KEY (`id_buscar`) REFERENCES `tb_busqueda` (`id_buscar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_usuarios_ibfk_2` FOREIGN KEY (`id_informe`) REFERENCES `tb_informe` (`id_informe`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
