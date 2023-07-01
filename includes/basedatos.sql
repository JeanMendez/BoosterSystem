/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.28-MariaDB : Database - boostersystem2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`boostersystem2` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;

USE `boostersystem2`;

/*Table structure for table `asignaturas` */

DROP TABLE IF EXISTS `asignaturas`;

CREATE TABLE `asignaturas` (
  `idAsignatura` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAsignatura` varchar(100) NOT NULL,
  PRIMARY KEY (`idAsignatura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `asignaturas` */

LOCK TABLES `asignaturas` WRITE;

UNLOCK TABLES;

/*Table structure for table `asignaturas_por_curso` */

DROP TABLE IF EXISTS `asignaturas_por_curso`;

CREATE TABLE `asignaturas_por_curso` (
  `idAsigaturasCursos` int(11) NOT NULL AUTO_INCREMENT,
  `cursos_idCurso` int(11) NOT NULL,
  `asignaturas_idAsignatura` int(11) NOT NULL,
  PRIMARY KEY (`idAsigaturasCursos`),
  KEY `cursos_idCurso` (`cursos_idCurso`),
  KEY `asignaturas_idAsignatura` (`asignaturas_idAsignatura`),
  CONSTRAINT `asignaturas_por_curso_ibfk_1` FOREIGN KEY (`cursos_idCurso`) REFERENCES `cursos` (`idCurso`) ON DELETE CASCADE,
  CONSTRAINT `asignaturas_por_curso_ibfk_2` FOREIGN KEY (`asignaturas_idAsignatura`) REFERENCES `asignaturas` (`idAsignatura`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `asignaturas_por_curso` */

LOCK TABLES `asignaturas_por_curso` WRITE;

UNLOCK TABLES;

/*Table structure for table `boletines` */

DROP TABLE IF EXISTS `boletines`;

CREATE TABLE `boletines` (
  `idBoletin` int(11) NOT NULL AUTO_INCREMENT,
  `periodo` enum('periodo1','periodo2','periodo3','periodo4') NOT NULL,
  `calificaciones_idcalificaciones` int(11) NOT NULL,
  PRIMARY KEY (`idBoletin`),
  KEY `calificaciones_idcalificaciones` (`calificaciones_idcalificaciones`),
  CONSTRAINT `boletines_ibfk_1` FOREIGN KEY (`calificaciones_idcalificaciones`) REFERENCES `calificaciones` (`idcalificaciones`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `boletines` */

LOCK TABLES `boletines` WRITE;

UNLOCK TABLES;

/*Table structure for table `calificaciones` */

DROP TABLE IF EXISTS `calificaciones`;

CREATE TABLE `calificaciones` (
  `idcalificaciones` int(11) NOT NULL AUTO_INCREMENT,
  `nota1` decimal(10,0) NOT NULL,
  `nota2` decimal(10,0) NOT NULL,
  `nota3` decimal(10,0) NOT NULL,
  `nota4` decimal(10,0) NOT NULL,
  `definitiva` decimal(10,0) NOT NULL,
  `estudiante_idEstudiante` int(11) NOT NULL,
  `asignaturas_idAsignatura` int(11) NOT NULL,
  PRIMARY KEY (`idcalificaciones`),
  KEY `estudiante_idEstudiante` (`estudiante_idEstudiante`),
  KEY `asignaturas_idAsignatura` (`asignaturas_idAsignatura`),
  CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`estudiante_idEstudiante`) REFERENCES `estudiante` (`idEstudiante`) ON DELETE CASCADE,
  CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`asignaturas_idAsignatura`) REFERENCES `asignaturas` (`idAsignatura`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `calificaciones` */

LOCK TABLES `calificaciones` WRITE;

UNLOCK TABLES;

/*Table structure for table `citaprueba` */

DROP TABLE IF EXISTS `citaprueba`;

CREATE TABLE `citaprueba` (
  `idcitaprueba` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `documentoAspirante` varchar(20) NOT NULL,
  `secretaria_idsecretaria` int(11) NOT NULL,
  PRIMARY KEY (`idcitaprueba`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `citaprueba` */

LOCK TABLES `citaprueba` WRITE;

UNLOCK TABLES;

/*Table structure for table `colegio` */

DROP TABLE IF EXISTS `colegio`;

CREATE TABLE `colegio` (
  `idColegio` int(11) NOT NULL AUTO_INCREMENT,
  `nitColegio` varchar(20) NOT NULL,
  `telefonoColegio` varchar(120) NOT NULL,
  `correoColegio` varchar(120) NOT NULL,
  `ubicacion` varchar(120) NOT NULL,
  `Cronograma_idCronograma` int(11) NOT NULL,
  PRIMARY KEY (`idColegio`),
  KEY `colegio_ibfk_1` (`Cronograma_idCronograma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `colegio` */

LOCK TABLES `colegio` WRITE;

UNLOCK TABLES;

/*Table structure for table `cronograma` */

DROP TABLE IF EXISTS `cronograma`;

CREATE TABLE `cronograma` (
  `idCronograma` int(11) NOT NULL AUTO_INCREMENT,
  `archivoCronograma` blob NOT NULL,
  PRIMARY KEY (`idCronograma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `cronograma` */

LOCK TABLES `cronograma` WRITE;

UNLOCK TABLES;

/*Table structure for table `cursos` */

DROP TABLE IF EXISTS `cursos`;

CREATE TABLE `cursos` (
  `idCurso` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCurso` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `colegio_idColegio` int(11) NOT NULL,
  PRIMARY KEY (`idCurso`),
  KEY `colegio_idColegio` (`colegio_idColegio`),
  CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`colegio_idColegio`) REFERENCES `colegio` (`idColegio`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `cursos` */

LOCK TABLES `cursos` WRITE;

UNLOCK TABLES;

/*Table structure for table `docente` */

DROP TABLE IF EXISTS `docente`;

CREATE TABLE `docente` (
  `idDocente` int(11) NOT NULL AUTO_INCREMENT,
  `tipoDocumentoDocente` enum('CC','CE') NOT NULL DEFAULT 'CC',
  `documentoDocente` varchar(20) NOT NULL,
  `nombresDocente` varchar(100) NOT NULL,
  `apellidosDocente` varchar(100) NOT NULL,
  `telefonoDocente` varchar(20) NOT NULL,
  `correoEstudiante` varchar(120) NOT NULL,
  `passwordDocente` varchar(120) NOT NULL,
  `estadoDocente` enum('activo','inactivo') NOT NULL,
  PRIMARY KEY (`idDocente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `docente` */

LOCK TABLES `docente` WRITE;

UNLOCK TABLES;

/*Table structure for table `docente_por_cursos` */

DROP TABLE IF EXISTS `docente_por_cursos`;

CREATE TABLE `docente_por_cursos` (
  `idDoceenteCursos` int(11) NOT NULL AUTO_INCREMENT,
  `docente_idDocente` int(11) NOT NULL,
  `cursos_idCurso` int(11) NOT NULL,
  `asignaturas_idAsignatura` int(11) NOT NULL,
  PRIMARY KEY (`idDoceenteCursos`),
  KEY `docente_idDocente` (`docente_idDocente`),
  KEY `cursos_idCurso` (`cursos_idCurso`),
  KEY `asignaturas_idAsignatura` (`asignaturas_idAsignatura`),
  CONSTRAINT `docente_por_cursos_ibfk_1` FOREIGN KEY (`docente_idDocente`) REFERENCES `docente` (`idDocente`) ON DELETE CASCADE,
  CONSTRAINT `docente_por_cursos_ibfk_2` FOREIGN KEY (`cursos_idCurso`) REFERENCES `cursos` (`idCurso`) ON DELETE CASCADE,
  CONSTRAINT `docente_por_cursos_ibfk_3` FOREIGN KEY (`asignaturas_idAsignatura`) REFERENCES `asignaturas` (`idAsignatura`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `docente_por_cursos` */

LOCK TABLES `docente_por_cursos` WRITE;

UNLOCK TABLES;

/*Table structure for table `docente_por_observadoracademico` */

DROP TABLE IF EXISTS `docente_por_observadoracademico`;

CREATE TABLE `docente_por_observadoracademico` (
  `idDocenteObservadorAcademicocol` int(11) NOT NULL AUTO_INCREMENT,
  `docente_idDocente` int(11) NOT NULL,
  `observadorAcademico_idobservadorAcademico` int(11) NOT NULL,
  PRIMARY KEY (`idDocenteObservadorAcademicocol`),
  KEY `docente_idDocente` (`docente_idDocente`),
  KEY `observadorAcademico_idobservadorAcademico` (`observadorAcademico_idobservadorAcademico`),
  CONSTRAINT `docente_por_observadoracademico_ibfk_1` FOREIGN KEY (`docente_idDocente`) REFERENCES `docente` (`idDocente`) ON DELETE CASCADE,
  CONSTRAINT `docente_por_observadoracademico_ibfk_2` FOREIGN KEY (`observadorAcademico_idobservadorAcademico`) REFERENCES `observadoracademico` (`idobservadorAcademico`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `docente_por_observadoracademico` */

LOCK TABLES `docente_por_observadoracademico` WRITE;

UNLOCK TABLES;

/*Table structure for table `estudiante` */

DROP TABLE IF EXISTS `estudiante`;

CREATE TABLE `estudiante` (
  `idEstudiante` int(11) NOT NULL AUTO_INCREMENT,
  `tipoDocumentoEstudiante` enum('CC','CE') NOT NULL DEFAULT 'CC',
  `documentoEstudiante` varchar(20) NOT NULL,
  `nombresEstudiante` varchar(100) NOT NULL,
  `apellidosEstudiante` varchar(100) NOT NULL,
  `telefonoEstudiante` varchar(20) NOT NULL,
  `correoEstudiante` varchar(120) NOT NULL,
  `passwordEstudiante` varchar(120) NOT NULL,
  `estadoEstudiante` varchar(45) NOT NULL,
  `observadorAcademico_idobservadorAcademico` int(11) NOT NULL,
  PRIMARY KEY (`idEstudiante`),
  KEY `observadorAcademico_idobservadorAcademico` (`observadorAcademico_idobservadorAcademico`),
  CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`observadorAcademico_idobservadorAcademico`) REFERENCES `observadoracademico` (`idobservadorAcademico`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `estudiante` */

LOCK TABLES `estudiante` WRITE;

UNLOCK TABLES;

/*Table structure for table `materiadidactico` */

DROP TABLE IF EXISTS `materiadidactico`;

CREATE TABLE `materiadidactico` (
  `idMateriaDidactico` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `fechaPublicacion` date NOT NULL,
  `archivoMaterial` blob NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `tipo` enum('libro','cartilla','guia') NOT NULL,
  `autor` varchar(45) NOT NULL,
  `asignaturas_idAsignatura` int(11) NOT NULL,
  PRIMARY KEY (`idMateriaDidactico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `materiadidactico` */

LOCK TABLES `materiadidactico` WRITE;

UNLOCK TABLES;

/*Table structure for table `matricula` */

DROP TABLE IF EXISTS `matricula`;

CREATE TABLE `matricula` (
  `idMatricula` int(11) NOT NULL AUTO_INCREMENT,
  `fechaMatricula` date NOT NULL,
  `descripcionMatricula` varchar(500) NOT NULL,
  `archivoPension` blob NOT NULL,
  `estudiante_idEstudiante` int(11) NOT NULL,
  `cursos_idCurso` int(11) NOT NULL,
  PRIMARY KEY (`idMatricula`),
  KEY `cursos_idCurso` (`cursos_idCurso`),
  KEY `estudiante_idEstudiante` (`estudiante_idEstudiante`),
  CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`cursos_idCurso`) REFERENCES `cursos` (`idCurso`) ON DELETE CASCADE,
  CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`estudiante_idEstudiante`) REFERENCES `estudiante` (`idEstudiante`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `matricula` */

LOCK TABLES `matricula` WRITE;

UNLOCK TABLES;

/*Table structure for table `observadoracademico` */

DROP TABLE IF EXISTS `observadoracademico`;

CREATE TABLE `observadoracademico` (
  `idobservadorAcademico` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(500) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idobservadorAcademico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `observadoracademico` */

LOCK TABLES `observadoracademico` WRITE;

UNLOCK TABLES;

/*Table structure for table `resultadoprueba` */

DROP TABLE IF EXISTS `resultadoprueba`;

CREATE TABLE `resultadoprueba` (
  `iResultadoPrueba` int(11) NOT NULL,
  `puntaje` int(11) NOT NULL,
  `estado` enum('aprobado','noaprobado') NOT NULL,
  `documentoAspirante` varchar(20) DEFAULT NULL,
  `secretaria_idsecretaria` int(11) NOT NULL,
  PRIMARY KEY (`iResultadoPrueba`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `resultadoprueba` */

LOCK TABLES `resultadoprueba` WRITE;

UNLOCK TABLES;

/*Table structure for table `rol` */

DROP TABLE IF EXISTS `rol`;

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `nombreRol` varchar(45) NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `rol` */

LOCK TABLES `rol` WRITE;

UNLOCK TABLES;

/*Table structure for table `secretaria` */

DROP TABLE IF EXISTS `secretaria`;

CREATE TABLE `secretaria` (
  `idsecretaria` int(11) NOT NULL AUTO_INCREMENT,
  `tipoDocumentoSecretaria` enum('CC','CE') NOT NULL,
  `documentoSecretaria` varchar(20) NOT NULL,
  `nombresSecretaria` varchar(100) NOT NULL,
  `apellidosSecretaria` varchar(100) NOT NULL,
  `telefonoScretaria` varchar(20) NOT NULL,
  `correoSecretaria` varchar(120) NOT NULL,
  `passwordSecretaria` varchar(120) NOT NULL,
  `estadoSecretaria` enum('activo','inactivo') NOT NULL,
  PRIMARY KEY (`idsecretaria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `secretaria` */

LOCK TABLES `secretaria` WRITE;

UNLOCK TABLES;

/*Table structure for table `uniformeestudiantil` */

DROP TABLE IF EXISTS `uniformeestudiantil`;

CREATE TABLE `uniformeestudiantil` (
  `idcarnetEstudiantil` int(11) NOT NULL AUTO_INCREMENT,
  `archivoMaterial` blob NOT NULL,
  `colegio_idColegio` int(11) NOT NULL,
  PRIMARY KEY (`idcarnetEstudiantil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `uniformeestudiantil` */

LOCK TABLES `uniformeestudiantil` WRITE;

UNLOCK TABLES;

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipoDocumentoUsuario` enum('CC','CE') NOT NULL DEFAULT 'CC',
  `documentoUsuario` varchar(20) NOT NULL,
  `nombresUsuario` varchar(100) NOT NULL,
  `apellidosUsuario` varchar(100) NOT NULL,
  `telefonoUsuario` varchar(20) NOT NULL,
  `correoUsuario` varchar(120) NOT NULL,
  `passwordUsuario` varchar(120) NOT NULL,
  `estadoUsuario` enum('activo','inactivo') NOT NULL,
  `rol_idRol` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `rol_idRol` (`rol_idRol`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_idRol`) REFERENCES `rol` (`idRol`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `usuarios` */

LOCK TABLES `usuarios` WRITE;

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
