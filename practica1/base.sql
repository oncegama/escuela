/*
SQLyog Ultimate v8.61 
MySQL - 5.5.16 : Database - school
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`school` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `school`;

/*Table structure for table `alumno_grupo` */

DROP TABLE IF EXISTS `alumno_grupo`;

CREATE TABLE `alumno_grupo` (
  `id_alumno` int(11) DEFAULT NULL,
  `id_grupo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `alumno_grupo` */

insert  into `alumno_grupo`(`id_alumno`,`id_grupo`) values (9,2),(1,1);

/*Table structure for table `grupo` */

DROP TABLE IF EXISTS `grupo`;

CREATE TABLE `grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo` varchar(20) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  `avatar` varchar(50) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `grupo` */

insert  into `grupo`(`id`,`grupo`,`estatus`,`avatar`,`orden`) values (1,'A-1',1,'q',7),(2,'B-1',1,'w',8),(3,'A-2',1,'q',6),(4,'B-2',1,'i',8),(5,'C-1',1,'r',1);

/*Table structure for table `maestro_grupo` */

DROP TABLE IF EXISTS `maestro_grupo`;

CREATE TABLE `maestro_grupo` (
  `id_maestro` int(11) DEFAULT NULL,
  `id_grupo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `maestro_grupo` */

/*Table structure for table `maestro_materia` */

DROP TABLE IF EXISTS `maestro_materia`;

CREATE TABLE `maestro_materia` (
  `id_maestro` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `maestro_materia` */

insert  into `maestro_materia`(`id_maestro`,`id_materia`) values (1,5),(1,3),(2,2),(2,4),(7,4),(7,5),(3,6);

/*Table structure for table `materia` */

DROP TABLE IF EXISTS `materia`;

CREATE TABLE `materia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `avatar` varchar(80) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `materia` */

insert  into `materia`(`id`,`nombre`,`avatar`,`orden`,`estatus`) values (1,'Programación de Aplicaciones','program.jpg',5,1),(2,'Matemáticas para TI','mate.jpg',7,1),(3,'Optativa I','android.jpg',2,1),(4,'Inglés','ingles.jpg',6,1),(5,'Administración del Tiempo','admintime.jpg',9,1),(6,'Ingenieria Econímica','economia.jpg',53,1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `app` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `apm` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `calle` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `numext` int(11) DEFAULT NULL,
  `numint` int(11) DEFAULT NULL,
  `col` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `mun` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `estado` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `correo` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `usuario` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `pass` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`nombre`,`app`,`apm`,`tel`,`calle`,`numext`,`numint`,`col`,`mun`,`estado`,`cp`,`correo`,`usuario`,`pass`,`nivel`,`estatus`) values (1,'Martha','Mendoza','Flores',2719302,'Olivo',49,0,'Árboles','Otzolotepec','México',50281,'leogj@yahoo.com.mx','profleo','leogar73',3,1),(2,'Tania','Escutia','Maldonado',2941372,'Perales',9,1,'Manantial','Toluca','México',49282,'tanimald83@gmail.com','profmald','tan462',2,2),(3,'Juan','Hurtado','Nava',2847323,'15 de Septiembre',742,63,'Centro','Metepec','México',53921,'huta_472@hotmail.com','juanhurt','nava6382',2,1),(4,'Juan','Torres','Bueno',3897434,'Historia',2,73,'Materias','Metepec','México',47282,'juan@yahoo.com.mx','profjuan','ju8381',2,1),(5,'Sandra','Olivares','León',6546548,'Historia',45,4,'Materias','Metepec','México',89724,'olesan@hotmail.com','8642352','a-34622',3,1),(6,'William','Garcia','Nava',5647891,'Morelos',985,0,'Historia','Toluca','México',78541,'will-64@hotmail.com','6455212','a-78545',3,1),(7,'María','Urbina','Zapata',2847129,'Girasol',301,3,'Floral','Zinacantepec','México',75922,'maryzap@gmail.com','profmary','zap-472',2,1),(8,'Julio','Rios','Valdez',427382,'Benito Juarez',492,0,'Centro','Otzolotepec','México',75839,'jules-rivers@hotmail.com','578329','al4821',3,1),(9,'Rita','Valencia','Mendoza',3672942,'Pedregal',3,0,'Rocas','Toluca','México',34543,'val572@yahoo.com.mx','5829212','al-5342',3,1),(10,'David','López','Gama',2778712,'5 de Mayo',74,0,'Centro','Otzolotepec','México',32811,'davgama@hotmail.com','gama05','admin-64m4',1,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
