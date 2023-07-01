/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.28-MariaDB : Database - boostersystem
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`boostersystem` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;

USE `boostersystem`;

/*Table structure for table `acudiente` */

DROP TABLE IF EXISTS `acudiente`;

CREATE TABLE `acudiente` (
  `idAcudiente` int(11) NOT NULL AUTO_INCREMENT,
  `tipoDocumentoAcudiente` enum('CC','CE') NOT NULL DEFAULT 'CC',
  `documentoAcudiente` varchar(20) NOT NULL,
  `nombresAcudiente` varchar(100) NOT NULL,
  `apellidosAcudiente` varchar(100) NOT NULL,
  `telefonoAcudiente` varchar(20) NOT NULL,
  `correoAcudiente` varchar(120) NOT NULL,
  `passwordAcudiente` varchar(120) NOT NULL,
  `estadoAcudiente` varchar(45) NOT NULL,
  `usuarios_idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idAcudiente`),
  KEY `usuarios_idUsuario` (`usuarios_idUsuario`),
  CONSTRAINT `acudiente_ibfk_1` FOREIGN KEY (`usuarios_idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `acudiente` */

LOCK TABLES `acudiente` WRITE;

insert  into `acudiente`(`idAcudiente`,`tipoDocumentoAcudiente`,`documentoAcudiente`,`nombresAcudiente`,`apellidosAcudiente`,`telefonoAcudiente`,`correoAcudiente`,`passwordAcudiente`,`estadoAcudiente`,`usuarios_idUsuario`) values (7,'CE','12223323','tttttttt4','hhh','23232323','jota@gmail.com','4321','activo',7),(15,'CC','4556','Jose2','Martinez','5546','jose@gmail.com','12345','activo',15);

UNLOCK TABLES;

/*Table structure for table `asignaturas` */

DROP TABLE IF EXISTS `asignaturas`;

CREATE TABLE `asignaturas` (
  `idAsignatura` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAsignatura` varchar(100) NOT NULL,
  PRIMARY KEY (`idAsignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `asignaturas` */

LOCK TABLES `asignaturas` WRITE;

insert  into `asignaturas`(`idAsignatura`,`nombreAsignatura`) values (1,'Matematicas'),(2,'Sociales'),(3,'Castellano'),(4,'Ingles'),(5,'Ciencias naturales'),(6,'Informatica'),(7,'Musica');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `asignaturas_por_curso` */

LOCK TABLES `asignaturas_por_curso` WRITE;

insert  into `asignaturas_por_curso`(`idAsigaturasCursos`,`cursos_idCurso`,`asignaturas_idAsignatura`) values (1,1,7),(2,2,7),(3,4,7),(4,7,7),(5,8,7);

UNLOCK TABLES;

/*Table structure for table `boletines` */

DROP TABLE IF EXISTS `boletines`;

CREATE TABLE `boletines` (
  `idBoletin` int(11) NOT NULL AUTO_INCREMENT,
  `periodo_idPeriodo` int(11) NOT NULL,
  `calificaciones_idCalificaciones` int(11) NOT NULL,
  PRIMARY KEY (`idBoletin`),
  KEY `calificaciones_idCalificaciones` (`calificaciones_idCalificaciones`),
  KEY `periodo_idPeriodo` (`periodo_idPeriodo`),
  CONSTRAINT `boletines_ibfk_1` FOREIGN KEY (`calificaciones_idCalificaciones`) REFERENCES `calificaciones` (`idCalificaciones`) ON DELETE CASCADE,
  CONSTRAINT `boletines_ibfk_2` FOREIGN KEY (`periodo_idPeriodo`) REFERENCES `periodo` (`idPeriodo`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `boletines` */

LOCK TABLES `boletines` WRITE;

UNLOCK TABLES;

/*Table structure for table `calificaciones` */

DROP TABLE IF EXISTS `calificaciones`;

CREATE TABLE `calificaciones` (
  `idCalificaciones` int(11) NOT NULL AUTO_INCREMENT,
  `puntaje` decimal(10,0) NOT NULL,
  `estudiante_idEstudiante` int(11) NOT NULL,
  `asignaturas_idAsignatura` int(11) NOT NULL,
  PRIMARY KEY (`idCalificaciones`),
  KEY `estudiante_idEstudiante` (`estudiante_idEstudiante`),
  KEY `asignaturas_idAsignatura` (`asignaturas_idAsignatura`),
  CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`estudiante_idEstudiante`) REFERENCES `estudiante` (`idEstudiante`) ON DELETE CASCADE,
  CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`asignaturas_idAsignatura`) REFERENCES `asignaturas` (`idAsignatura`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `calificaciones` */

LOCK TABLES `calificaciones` WRITE;

insert  into `calificaciones`(`idCalificaciones`,`puntaje`,`estudiante_idEstudiante`,`asignaturas_idAsignatura`) values (6,4,36,1),(7,2,30,3),(8,4,13,1),(9,3,33,3),(11,3,30,7);

UNLOCK TABLES;

/*Table structure for table `carnet` */

DROP TABLE IF EXISTS `carnet`;

CREATE TABLE `carnet` (
  `idCarnet` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `portada` varchar(255) NOT NULL,
  `archivo` varchar(255) NOT NULL,
  `estudiante_idEstudiante` int(11) NOT NULL,
  PRIMARY KEY (`idCarnet`),
  KEY `estudiante_idEstudiante` (`archivo`),
  KEY `estudiante_idEstudiante_2` (`estudiante_idEstudiante`),
  CONSTRAINT `carnet_ibfk_2` FOREIGN KEY (`estudiante_idEstudiante`) REFERENCES `estudiante` (`idEstudiante`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `carnet` */

LOCK TABLES `carnet` WRITE;

insert  into `carnet`(`idCarnet`,`titulo`,`portada`,`archivo`,`estudiante_idEstudiante`) values (9,'INSTITUTO34','20230701114953_4. FOTO_BLANCO.jpg','20230701114953_Guia 17 Reading Innovation in Business.docx.pdf',36);

UNLOCK TABLES;

/*Table structure for table `citaprueba` */

DROP TABLE IF EXISTS `citaprueba`;

CREATE TABLE `citaprueba` (
  `idcitaprueba` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `documentoAspirante` varchar(20) NOT NULL,
  `interesados_idInteresados` int(11) NOT NULL,
  PRIMARY KEY (`idcitaprueba`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  PRIMARY KEY (`idColegio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `colegio` */

LOCK TABLES `colegio` WRITE;

UNLOCK TABLES;

/*Table structure for table `cronograma` */

DROP TABLE IF EXISTS `cronograma`;

CREATE TABLE `cronograma` (
  `idCronograma` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `portada` varchar(255) NOT NULL,
  `archivo` varchar(255) NOT NULL,
  PRIMARY KEY (`idCronograma`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `cronograma` */

LOCK TABLES `cronograma` WRITE;

insert  into `cronograma`(`idCronograma`,`titulo`,`portada`,`archivo`) values (15,'Cronograma2023IGVC','20230701113659_4. FOTO_BLANCO.jpg','20230701113659_Guia 17 Reading Innovation in Business.docx.pdf'),(16,'INSTITUTO','2.PNG','20230701121438_Guia 17 Reading Innovation in Business.docx.pdf'),(18,'Cronograma2023IGVC','20230701115219_2.PNG','20230701115219_Guia 17 Reading Innovation in Business.docx.pdf');

UNLOCK TABLES;

/*Table structure for table `cupos` */

DROP TABLE IF EXISTS `cupos`;

CREATE TABLE `cupos` (
  `idCupos` int(11) NOT NULL AUTO_INCREMENT,
  `jornadaAcademica` varchar(45) NOT NULL,
  `grado` varchar(45) NOT NULL,
  `cantidad` varchar(45) NOT NULL,
  PRIMARY KEY (`idCupos`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `cupos` */

LOCK TABLES `cupos` WRITE;

insert  into `cupos`(`idCupos`,`jornadaAcademica`,`grado`,`cantidad`) values (9,'tarde','septimo','18');

UNLOCK TABLES;

/*Table structure for table `cursos` */

DROP TABLE IF EXISTS `cursos`;

CREATE TABLE `cursos` (
  `idCurso` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCurso` varchar(45) NOT NULL,
  `estado` enum('activo','inactivo') NOT NULL,
  PRIMARY KEY (`idCurso`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `cursos` */

LOCK TABLES `cursos` WRITE;

insert  into `cursos`(`idCurso`,`nombreCurso`,`estado`) values (1,'primero','activo'),(2,'segundo','activo'),(3,'tercero','activo'),(4,'cuarto','activo'),(5,'quinto','activo'),(6,'sexto','activo'),(7,'septimo','activo'),(8,'octavo','activo'),(9,'noveno','activo'),(10,'decimo','activo'),(11,'once','activo');

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
  `correoDocente` varchar(120) NOT NULL,
  `passwordDocente` varchar(120) NOT NULL,
  `estadoDocente` varchar(45) NOT NULL,
  `usuarios_idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idDocente`),
  KEY `usuarios_idUsuario` (`usuarios_idUsuario`),
  CONSTRAINT `docente_ibfk_1` FOREIGN KEY (`usuarios_idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `docente` */

LOCK TABLES `docente` WRITE;

insert  into `docente`(`idDocente`,`tipoDocumentoDocente`,`documentoDocente`,`nombresDocente`,`apellidosDocente`,`telefonoDocente`,`correoDocente`,`passwordDocente`,`estadoDocente`,`usuarios_idUsuario`) values (15,'CC','4556','fdvfd','f','5546','ghhhg','12345','activo',15),(42,'CC','283883','Pedrina','Albertaa','2442566372','pedrina@gmail.com','12345','activo',42),(43,'CC','111111111111','reraaaa','wasa','2321','Carlo22s@gmail.com','12345','activo',43),(44,'CC','433344328888','gagega','wewewe','1223','Carrrlo22s@gmail.com','12345','activo',44),(45,'CC','1100000','dada33','dede','111','C33arddrrlo22s@gmail.com','12345','activo',45),(46,'CC','0000000','fefe','frfr','11','C33arddrddrlo22s@gmail.com','123','activo',46),(47,'CC','0000000','fefe','frfr','11','C33arddrddrlo22s@gmail.com','123','activo',47),(48,'CC','11110000000','ewew','wqwq','222','C33arddrrleo22s@gmail.com','123','activo',48),(49,'CC','11111112222222','gfgfgf','saa','22','Carddrrlof22s@gmail.com','123','activo',49),(50,'CC','33777777776','ds','was','21','Carddrrlo22s@gmail.com','321','activo',50),(51,'CC','544','fsss','www','123','Carlo22s@gmail.com','2312','activo',51),(52,'CC','5448877','fsss','www','123','Carlo22s@gmail.com','123','activo',52),(53,'CC','433343','dsd','fsd','12','Carlo22s@gmail.com','123','activo',53),(59,'CC','344443','JUAN','PEREZ','5554444','PEREZ@GMAIL.COM','12345','activo',59),(60,'CC','33333322','jean','mendez','233222','PEREZ@GMAIL.COM','33333','activo',60),(61,'CC','656564','fuan','Martinez','55444','jeantt@gmail.com','12345','activo',61),(62,'CC','655563','fffff','Perez','3127383223','jeantt@gmail.com','333','activo',62),(63,'CC','44432','hahhah2','Perez','3127383223','jeantt@gmail.com','2222','activo',63),(64,'CC','00000','hahhah2','hhhhh','444444','jean@gmail.com','2222','activo',64),(66,'CC','541255','jose','revagggg','333333','jean@gmail.com','5544','activo',66);

UNLOCK TABLES;

/*Table structure for table `docente_por_cursos` */

DROP TABLE IF EXISTS `docente_por_cursos`;

CREATE TABLE `docente_por_cursos` (
  `idDoceenteCursos` int(11) NOT NULL AUTO_INCREMENT,
  `docente_idDocente` int(11) NOT NULL,
  `cursos_idCurso` int(11) NOT NULL,
  `asignaturas_idAsignatura` int(11) NOT NULL,
  PRIMARY KEY (`idDoceenteCursos`),
  KEY `cursos_idCurso` (`cursos_idCurso`),
  KEY `asignaturas_idAsignatura` (`asignaturas_idAsignatura`),
  KEY `docente_idDocente` (`docente_idDocente`),
  CONSTRAINT `docente_por_cursos_ibfk_1` FOREIGN KEY (`cursos_idCurso`) REFERENCES `cursos` (`idCurso`) ON DELETE CASCADE,
  CONSTRAINT `docente_por_cursos_ibfk_2` FOREIGN KEY (`asignaturas_idAsignatura`) REFERENCES `asignaturas` (`idAsignatura`) ON DELETE CASCADE,
  CONSTRAINT `docente_por_cursos_ibfk_3` FOREIGN KEY (`docente_idDocente`) REFERENCES `docente` (`idDocente`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `docente_por_cursos` */

LOCK TABLES `docente_por_cursos` WRITE;

insert  into `docente_por_cursos`(`idDoceenteCursos`,`docente_idDocente`,`cursos_idCurso`,`asignaturas_idAsignatura`) values (2,52,6,1),(3,52,8,1),(4,53,1,2),(5,59,1,3),(6,59,3,3),(7,59,4,3),(8,61,2,4),(9,61,3,4),(12,46,2,1),(13,46,4,1);

UNLOCK TABLES;

/*Table structure for table `docente_por_observadoracademico` */

DROP TABLE IF EXISTS `docente_por_observadoracademico`;

CREATE TABLE `docente_por_observadoracademico` (
  `idDocenteObservadorAcademico` int(11) NOT NULL AUTO_INCREMENT,
  `docente_idDocente` int(11) NOT NULL,
  `observadorAcademico_idobservadorAcademico` int(11) NOT NULL,
  PRIMARY KEY (`idDocenteObservadorAcademico`),
  KEY `observadorAcademico_idobservadorAcademico` (`observadorAcademico_idobservadorAcademico`),
  KEY `docente_idDocente` (`docente_idDocente`),
  CONSTRAINT `docente_por_observadoracademico_ibfk_1` FOREIGN KEY (`observadorAcademico_idobservadorAcademico`) REFERENCES `observadoracademico` (`idobservadorAcademico`) ON DELETE CASCADE,
  CONSTRAINT `docente_por_observadoracademico_ibfk_2` FOREIGN KEY (`docente_idDocente`) REFERENCES `docente` (`idDocente`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `docente_por_observadoracademico` */

LOCK TABLES `docente_por_observadoracademico` WRITE;

insert  into `docente_por_observadoracademico`(`idDocenteObservadorAcademico`,`docente_idDocente`,`observadorAcademico_idobservadorAcademico`) values (1,15,2),(2,15,3),(6,15,7);

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
  `observadorAcademico_idobservadorAcademico` int(11) DEFAULT NULL,
  `usuarios_idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idEstudiante`),
  KEY `usuarios_idUsuario` (`usuarios_idUsuario`),
  CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`usuarios_idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `estudiante` */

LOCK TABLES `estudiante` WRITE;

insert  into `estudiante`(`idEstudiante`,`tipoDocumentoEstudiante`,`documentoEstudiante`,`nombresEstudiante`,`apellidosEstudiante`,`telefonoEstudiante`,`correoEstudiante`,`passwordEstudiante`,`estadoEstudiante`,`observadorAcademico_idobservadorAcademico`,`usuarios_idUsuario`) values (13,'CC','4545','hgfhfgf','hg','4454','43jhjh','12345','activo',NULL,13),(30,'CC','100388843','jean','mendez','3127383223','jean@gmail.com','12345','activo',NULL,30),(32,'CC','323223','3234','443','34334','344343','34334','activo',NULL,32),(33,'CC','11111','jose','reva','233222','jaajaj@gmail.com','12345','activo',NULL,33),(34,'CC','455622','jose','reva','233222','jaajaj@gmail.com','1234','activo',NULL,34),(35,'CC','43334432','JOSEE','Rodriguez','312334443','jose@gmail.com','12345','activo',NULL,35),(36,'CC','343334433332','JOSEE','Rodriguez','312344432','jose@gmail.com','12345','activo',NULL,36),(38,'CC','2324435454','JOSEE','Rodriguez','322323322332','jose@gmail.com','11111','activo',NULL,38),(39,'CC','11121223322','JOSEE','Rodriguez','112222','jose@gmail.com','11111','activo',NULL,39),(40,'CC','3222222222423','JOSEEeeree','Rodriguez','232222','jose@gmail.com','11111','activo',NULL,40),(41,'CE','00096647','Carlos','Alberto','3124432222','Carlos@gmail.com','12345','activo',NULL,41),(54,'CC','111233','had','sss','221','Carrrlo22s@gmail.com','1234','activo',NULL,54),(55,'CC','8765','favra','dss','321','Carlos@gmail.com','21','activo',NULL,55),(56,'CC','56565','fd','ffd','443','Carddrrlo22s@gmail.com','3232','activo',NULL,56),(57,'CC','43343','dsf','fddd','3223','Carddrrlo22s@gmail.com','122','activo',NULL,57),(58,'CC','11222333','hahhah2','mendez','3127383276','jeantt@gmail.com','12345','activo',NULL,58),(65,'CC','000007','hahhah2','hhhhh','444444','jean@gmail.com','444','activo',NULL,65);

UNLOCK TABLES;

/*Table structure for table `files` */

DROP TABLE IF EXISTS `files`;

CREATE TABLE `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `url` varchar(500) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `files` */

LOCK TABLES `files` WRITE;

insert  into `files`(`id`,`title`,`description`,`url`,`type`) values (3,'','','',''),(4,'gagsg','cbfbbg','files/conversationpdf.pdf','');

UNLOCK TABLES;

/*Table structure for table `interesados` */

DROP TABLE IF EXISTS `interesados`;

CREATE TABLE `interesados` (
  `idInteresados` int(11) NOT NULL AUTO_INCREMENT,
  `tipoDocumentoInteresados` enum('CC','TI') NOT NULL,
  `documentoInteresados` varchar(20) NOT NULL,
  `nombreInteresados` varchar(100) NOT NULL,
  `apellidoInteresados` varchar(100) NOT NULL,
  `telefonoInteresados` varchar(20) NOT NULL,
  `correoInteresados` varchar(122) NOT NULL,
  PRIMARY KEY (`idInteresados`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `interesados` */

LOCK TABLES `interesados` WRITE;

insert  into `interesados`(`idInteresados`,`tipoDocumentoInteresados`,`documentoInteresados`,`nombreInteresados`,`apellidoInteresados`,`telefonoInteresados`,`correoInteresados`) values (3,'CC','4554544','raul','Mendez','544444','jeanmendez@gmail.com'),(4,'CC','1003744444','carlos','perez','333333','raulcastroso@gmail.com');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `materiadidactico` */

LOCK TABLES `materiadidactico` WRITE;

insert  into `materiadidactico`(`idMateriaDidactico`,`nombre`,`categoria`,`fechaPublicacion`,`archivoMaterial`,`descripcion`,`tipo`,`autor`,`asignaturas_idAsignatura`) values (1,'juasss','suspenso','2023-07-01','Guia 17 Reading Innovation in Business.docx.pdf','LAAAAAAAA','libro','JUAN DE DIOS',0),(2,'ggggg','terror','2023-07-01','Guia 17 Reading Innovation in Business.docx.pdf','ggggg','cartilla','gggg',0);

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
  KEY `estudiante_idEstudiante` (`estudiante_idEstudiante`),
  KEY `cursos_idCurso` (`cursos_idCurso`),
  CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`estudiante_idEstudiante`) REFERENCES `estudiante` (`idEstudiante`) ON DELETE CASCADE,
  CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`cursos_idCurso`) REFERENCES `cursos` (`idCurso`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `matricula` */

LOCK TABLES `matricula` WRITE;

insert  into `matricula`(`idMatricula`,`fechaMatricula`,`descripcionMatricula`,`archivoPension`,`estudiante_idEstudiante`,`cursos_idCurso`) values (2,'2023-06-19','juanito el alimaña','',33,5),(3,'2023-06-19','qqqqqq','',13,2),(4,'2023-06-19','wwwwww','',40,8),(5,'2023-06-20','HOLA SOY NUEVO ME LLAMO CARLOS','',41,9),(6,'2023-06-19','rrrrrrrrrr','',56,8),(7,'2023-06-27','dfffff','',57,9),(9,'2023-07-08','fffff','',65,8);

UNLOCK TABLES;

/*Table structure for table `observadoracademico` */

DROP TABLE IF EXISTS `observadoracademico`;

CREATE TABLE `observadoracademico` (
  `idobservadorAcademico` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(500) NOT NULL,
  `fecha` date NOT NULL,
  `estudiante_idEstudiante` int(11) NOT NULL,
  PRIMARY KEY (`idobservadorAcademico`),
  KEY `estudiante_idEstudiante` (`estudiante_idEstudiante`),
  CONSTRAINT `observadoracademico_ibfk_1` FOREIGN KEY (`estudiante_idEstudiante`) REFERENCES `estudiante` (`idEstudiante`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `observadoracademico` */

LOCK TABLES `observadoracademico` WRITE;

insert  into `observadoracademico`(`idobservadorAcademico`,`descripcion`,`fecha`,`estudiante_idEstudiante`) values (2,'carloss le pego al instructor','2023-06-19',41),(3,'hola','2023-06-19',41),(7,'cagada','2023-07-01',57);

UNLOCK TABLES;

/*Table structure for table `periodo` */

DROP TABLE IF EXISTS `periodo`;

CREATE TABLE `periodo` (
  `idPeriodo` int(11) NOT NULL AUTO_INCREMENT,
  `nombrePeriodo` varchar(50) NOT NULL,
  PRIMARY KEY (`idPeriodo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `periodo` */

LOCK TABLES `periodo` WRITE;

insert  into `periodo`(`idPeriodo`,`nombrePeriodo`) values (1,'Primer periodo'),(2,'Segundo periodo'),(3,'Tercer periodo'),(4,'Cuarto periodo');

UNLOCK TABLES;

/*Table structure for table `resultadoprueba` */

DROP TABLE IF EXISTS `resultadoprueba`;

CREATE TABLE `resultadoprueba` (
  `iResultadoPrueba` int(11) NOT NULL AUTO_INCREMENT,
  `documentoAspirante` varchar(20) DEFAULT NULL,
  `puntaje` decimal(10,0) NOT NULL,
  `estado` enum('aprobado','reprobado') NOT NULL,
  `interesados_idInteresados` int(11) NOT NULL,
  PRIMARY KEY (`iResultadoPrueba`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `resultadoprueba` */

LOCK TABLES `resultadoprueba` WRITE;

UNLOCK TABLES;

/*Table structure for table `rol` */

DROP TABLE IF EXISTS `rol`;

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `nombreRol` varchar(45) NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `rol` */

LOCK TABLES `rol` WRITE;

insert  into `rol`(`idRol`,`nombreRol`) values (1,'Estudiante'),(2,'Acudiente'),(3,'Docente'),(4,'Secretaria'),(5,'Coordinador'),(6,'Bibliotecario');

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
  `usuarios_idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idsecretaria`),
  KEY `usuarios_idUsuario` (`usuarios_idUsuario`)
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
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_idRol`) REFERENCES `rol` (`idRol`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `usuarios` */

LOCK TABLES `usuarios` WRITE;

insert  into `usuarios`(`idUsuario`,`tipoDocumentoUsuario`,`documentoUsuario`,`nombresUsuario`,`apellidosUsuario`,`telefonoUsuario`,`correoUsuario`,`passwordUsuario`,`estadoUsuario`,`rol_idRol`) values (7,'CE','12223323','tttttttt4','hhh','23232323','jota@gmail.com','4321','activo',2),(8,'CE','4333443','Coordinador','Perez','4545444','jota2@gmail.com','12345','activo',5),(13,'CC','4545','hgfhfgf','hg','4454','43jhjh','12345','activo',1),(15,'CC','4556','Jose2','Martinez','5546','jose@gmail.com','12345','activo',2),(30,'CC','100388843','jean','mendez','3127383223','jean@gmail.com','12345','activo',1),(32,'CC','323223','3234','443','34334','344343','34334','activo',1),(33,'CC','11111','jose','reva','233222','jaajaj@gmail.com','12345','activo',1),(34,'CC','455622','jose','reva','233222','jaajaj@gmail.com','1234','activo',1),(35,'CC','43334432','JOSEE','Rodriguez','312334443','jose@gmail.com','12345','activo',1),(36,'CC','343334433332','JOSEE','Rodriguez','312344432','jose@gmail.com','12345','activo',1),(38,'CC','2324435454','JOSEE','Rodriguez','322323322332','jose@gmail.com','11111','activo',1),(39,'CC','11121223322','JOSEE','Rodriguez','112222','jose@gmail.com','11111','activo',1),(40,'CC','3222222222423','JOSEEeeree','Rodriguez','232222','jose@gmail.com','11111','activo',1),(41,'CE','00096647','Carlos','Alberto','3124432222','Carlos@gmail.com','12345','activo',1),(42,'CC','283883','Pedrina','Albertaa','2442566372','pedrina@gmail.com','12345','activo',3),(43,'CC','111111111111','reraaaa','wasa','2321','Carlo22s@gmail.com','12345','activo',3),(44,'CC','433344328888','gagega','wewewe','1223','Carrrlo22s@gmail.com','12345','activo',3),(45,'CC','1100000','dada33','dede','111','C33arddrrlo22s@gmail.com','12345','activo',3),(46,'CC','0000000','fefe','frfr','11','C33arddrddrlo22s@gmail.com','123','activo',3),(47,'CC','0000000','fefe','frfr','11','C33arddrddrlo22s@gmail.com','123','activo',3),(48,'CC','11110000000','ewew','wqwq','222','C33arddrrleo22s@gmail.com','123','activo',3),(49,'CC','11111112222222','gfgfgf','saa','22','Carddrrlof22s@gmail.com','123','activo',3),(50,'CC','33777777776','ds','was','21','Carddrrlo22s@gmail.com','321','activo',3),(51,'CC','544','fsss','www','123','Carlo22s@gmail.com','2312','activo',3),(52,'CC','5448877','fsss','www','123','Carlo22s@gmail.com','123','activo',3),(53,'CC','433343','dsd','fsd','12','Carlo22s@gmail.com','123','activo',3),(54,'CC','111233','had','sss','221','Carrrlo22s@gmail.com','1234','activo',1),(55,'CC','8765','favra','dss','321','Carlos@gmail.com','21','activo',1),(56,'CC','56565','fd','ffd','443','Carddrrlo22s@gmail.com','3232','activo',1),(57,'CC','43343','dsf','fddd','3223','Carddrrlo22s@gmail.com','122','activo',1),(58,'CC','11222333','hahhah2','mendez','3127383276','jeantt@gmail.com','12345','activo',1),(59,'CC','344443','JUAN','PEREZ','5554444','PEREZ@GMAIL.COM','12345','activo',3),(60,'CC','33333322','jean','mendez','233222','PEREZ@GMAIL.COM','33333','activo',3),(61,'CC','656564','fuan','Martinez','55444','jeantt@gmail.com','12345','activo',3),(62,'CC','655563','fffff','Perez','3127383223','jeantt@gmail.com','333','activo',3),(63,'CC','44432','hahhah2','Perez','3127383223','jeantt@gmail.com','2222','activo',3),(64,'CC','00000','hahhah2','hhhhh','444444','jean@gmail.com','2222','activo',3),(65,'CC','000007','hahhah2','hhhhh','444444','jean@gmail.com','444','activo',1),(66,'CC','541255','jose','revagggg','333333','jean@gmail.com','5544','activo',3);

UNLOCK TABLES;

/* Trigger structure for table `usuarios` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `insert_acudiente` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `insert_acudiente` AFTER INSERT ON `usuarios` FOR EACH ROW BEGIN
    IF NEW.rol_idRol = 2 THEN
        INSERT INTO acudiente (
            idAcudiente,
            tipoDocumentoAcudiente,
            documentoAcudiente,
            nombresAcudiente,
            apellidosAcudiente,
            telefonoAcudiente,
            correoAcudiente,
            passwordAcudiente,
            estadoAcudiente,
            usuarios_idUsuario
        ) VALUES (
            NEW.idUsuario,
            NEW.tipoDocumentoUsuario,
            NEW.documentoUsuario,
            NEW.nombresUsuario,
            NEW.apellidosUsuario,
            NEW.telefonoUsuario,
            NEW.correoUsuario,
            NEW.passwordUsuario,
            NEW.estadoUsuario,
            NEW.idUsuario
        );
    END IF;
END */$$


DELIMITER ;

/* Trigger structure for table `usuarios` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `insert_estudiante` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `insert_estudiante` AFTER INSERT ON `usuarios` FOR EACH ROW BEGIN
    IF NEW.rol_idRol = 1 THEN
        INSERT INTO estudiante (
            idEstudiante,
            tipoDocumentoEstudiante,
            documentoEstudiante,
            nombresEstudiante,
            apellidosEstudiante,
            telefonoEstudiante,
            correoEstudiante,
            passwordEstudiante,
            estadoEstudiante,
            usuarios_idUsuario
        ) VALUES (
            NEW.idUsuario,
            NEW.tipoDocumentoUsuario,
            NEW.documentoUsuario,
            NEW.nombresUsuario,
            NEW.apellidosUsuario,
            NEW.telefonoUsuario,
            NEW.correoUsuario,
            NEW.passwordUsuario,
            NEW.estadoUsuario,
            NEW.idUsuario
        );
    END IF;
END */$$


DELIMITER ;

/* Trigger structure for table `usuarios` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `insert_docente` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `insert_docente` AFTER INSERT ON `usuarios` FOR EACH ROW BEGIN
    IF NEW.rol_idRol = 3 THEN
        INSERT INTO docente (
            idDocente,
            tipoDocumentoDocente,
            documentoDocente,
            nombresDocente,
            apellidosDocente,
            telefonoDocente,
            correoDocente,
            passwordDocente,
            estadoDocente,
            usuarios_idUsuario
        ) VALUES (
            NEW.idUsuario,
            NEW.tipoDocumentoUsuario,
            NEW.documentoUsuario,
            NEW.nombresUsuario,
            NEW.apellidosUsuario,
            NEW.telefonoUsuario,
            NEW.correoUsuario,
            NEW.passwordUsuario,
            NEW.estadoUsuario,
            NEW.idUsuario
        );
    END IF;
END */$$


DELIMITER ;

/* Trigger structure for table `usuarios` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_acudiente` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `update_acudiente` AFTER UPDATE ON `usuarios` FOR EACH ROW BEGIN
    IF OLD.rol_idRol = 2 THEN
        DELETE FROM acudiente WHERE usuarios_idUsuario = OLD.idUsuario;
    END IF;
    
    IF NEW.rol_idRol = 2 THEN
        INSERT INTO acudiente (
            idAcudiente,
            tipoDocumentoAcudiente,
            documentoAcudiente,
            nombresAcudiente,
            apellidosAcudiente,
            telefonoAcudiente,
            correoAcudiente,
            passwordAcudiente,
            estadoAcudiente,
            usuarios_idUsuario
        ) VALUES (
            NEW.idUsuario,
            NEW.tipoDocumentoUsuario,
            NEW.documentoUsuario,
            NEW.nombresUsuario,
            NEW.apellidosUsuario,
            NEW.telefonoUsuario,
            NEW.correoUsuario,
            NEW.passwordUsuario,
            NEW.estadoUsuario,
            NEW.idUsuario
        );
    END IF;
END */$$


DELIMITER ;

/* Trigger structure for table `usuarios` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_estudiante` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `update_estudiante` AFTER UPDATE ON `usuarios` FOR EACH ROW BEGIN
    IF OLD.rol_idRol = 1 THEN
        DELETE FROM estudiante WHERE usuarios_idUsuario = OLD.idUsuario;
    END IF;
    
    IF NEW.rol_idRol = 1 THEN
        INSERT INTO estudiante (
            idEstudiante,
            tipoDocumentoEstudiante,
            documentoEstudiante,
            nombresEstudiante,
            apellidosEstudiante,
            telefonoEstudiante,
            correoEstudiante,
            passwordEstudiante,
            estadoEstudiante,
            usuarios_idUsuario
        ) VALUES (
            NEW.idUsuario,
            NEW.tipoDocumentoUsuario,
            NEW.documentoUsuario,
            NEW.nombresUsuario,
            NEW.apellidosUsuario,
            NEW.telefonoUsuario,
            NEW.correoUsuario,
            NEW.passwordUsuario,
            NEW.estadoUsuario,
            NEW.idUsuario
        );
    END IF;
END */$$


DELIMITER ;

/* Trigger structure for table `usuarios` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_docente` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `update_docente` AFTER UPDATE ON `usuarios` FOR EACH ROW BEGIN
    IF OLD.rol_idRol = 3 THEN
        DELETE FROM docente WHERE usuarios_idUsuario = OLD.idUsuario;
    END IF;
    
    IF NEW.rol_idRol = 3 THEN
        INSERT INTO docente (
            idDocente,
            tipoDocumentoDocente,
            documentoDocente,
            nombresDocente,
            apellidosDocente,
            telefonoDocente,
            correoDocente,
            passwordDocente,
            estadoDocente,
            usuarios_idUsuario
        ) VALUES (
            NEW.idUsuario,
            NEW.tipoDocumentoUsuario,
            NEW.documentoUsuario,
            NEW.nombresUsuario,
            NEW.apellidosUsuario,
            NEW.telefonoUsuario,
            NEW.correoUsuario,
            NEW.passwordUsuario,
            NEW.estadoUsuario,
            NEW.idUsuario
        );
    END IF;
END */$$


DELIMITER ;

/* Procedure structure for procedure `jornada_y_grado` */

/*!50003 DROP PROCEDURE IF EXISTS  `jornada_y_grado` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `jornada_y_grado`(IN `jornada` VARCHAR(10), IN `grado_1` VARCHAR(10))
SELECT * FROM cupos WHERE jornadaAcademica = jornada AND grado = grado_1 */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
