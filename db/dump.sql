-- --------------------------------------------------------
-- Host:                         localhost
-- Versione server:              5.7.24 - MySQL Community Server (GPL)
-- S.O. server:                  Win64
-- HeidiSQL Versione:            12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dump della struttura del database car_sharing
CREATE DATABASE IF NOT EXISTS `car_sharing` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `car_sharing`;

-- Dump della struttura di tabella car_sharing.autisti
CREATE TABLE IF NOT EXISTS `autisti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nominativo` varchar(100) NOT NULL,
  `numero_patente` varchar(20) NOT NULL,
  `scadenza_patente` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dump dei dati della tabella car_sharing.autisti: ~3 rows (circa)
INSERT INTO `autisti` (`id`, `nominativo`, `numero_patente`, `scadenza_patente`, `email`, `telefono`) VALUES
	(1, 'Matteoundefined', 'CA456RT', '2023-03-31', 'teorove04@gmail.com', '+393921087749'),
	(2, 'Federicoundefined', 'dsa4d5da6ad', '2023-03-29', 'fede@gmail.com', '39840409891'),
	(3, 'Lucaundefined', 'HR479FG', '2025-06-19', 'lukepantan@gmail.com', '3438282141');

-- Dump della struttura di tabella car_sharing.passeggeri
CREATE TABLE IF NOT EXISTS `passeggeri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nominativo` varchar(100) NOT NULL,
  `tipo_documento` varchar(30) NOT NULL,
  `n_documento` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dump dei dati della tabella car_sharing.passeggeri: ~3 rows (circa)
INSERT INTO `passeggeri` (`id`, `nominativo`, `tipo_documento`, `n_documento`, `email`, `telefono`) VALUES
	(1, 'Simone Fornoni', 'Patente', 'Ca4656gk', 'simo@gmail.com', '398404845'),
	(2, 'Duli gama', 'Patente', 'hdsddsajdas', 'gama@gmail.com', '144048562'),
	(3, 'Mirko Gurzau', 'Carta d\'identità', 'dgsahdgj2357', 'migroneblo@hotlook.it', '12345678');

-- Dump della struttura di tabella car_sharing.prenotazione
CREATE TABLE IF NOT EXISTS `prenotazione` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_prenotazione` int(11) NOT NULL,
  `esito` int(11) NOT NULL,
  `id_viaggio` int(11) NOT NULL,
  `id_passeggero` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_viaggio` (`id_viaggio`),
  KEY `id_passeggero` (`id_passeggero`),
  CONSTRAINT `prenotazione_ibfk_1` FOREIGN KEY (`id_viaggio`) REFERENCES `viaggi` (`id`),
  CONSTRAINT `prenotazione_ibfk_2` FOREIGN KEY (`id_passeggero`) REFERENCES `passeggeri` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dump dei dati della tabella car_sharing.prenotazione: ~0 rows (circa)

-- Dump della struttura di tabella car_sharing.viaggi
CREATE TABLE IF NOT EXISTS `viaggi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `partenza` varchar(100) NOT NULL,
  `destinazione` varchar(100) NOT NULL,
  `dt_viaggio` datetime NOT NULL,
  `durata` int(11) NOT NULL,
  `n_posti` int(11) NOT NULL,
  `importo` double NOT NULL,
  `id_autista` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_autista` (`id_autista`),
  CONSTRAINT `viaggi_ibfk_1` FOREIGN KEY (`id_autista`) REFERENCES `autisti` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dump dei dati della tabella car_sharing.viaggi: ~2 rows (circa)
INSERT INTO `viaggi` (`id`, `partenza`, `destinazione`, `dt_viaggio`, `durata`, `n_posti`, `importo`, `id_autista`) VALUES
	(1, 'Legnano', 'Milano', '2023-03-29 00:00:00', 30, 4, 20.5, 2),
	(2, 'Milano', 'Legnano', '2023-03-30 11:28:00', 30, 3, 20.8, 2),
	(3, 'Pizzo calabro', 'Lainate', '2023-03-29 04:30:00', 720, 4, 350.99, 3);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
