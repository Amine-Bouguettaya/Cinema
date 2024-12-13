-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour cinema_amine
CREATE DATABASE IF NOT EXISTS `cinema_amine` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cinema_amine`;

-- Listage de la structure de table cinema_amine. acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int NOT NULL,
  PRIMARY KEY (`id_acteur`),
  KEY `id_personne` (`id_personne`),
  CONSTRAINT `FK_id_personne_acteur` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema_amine.acteur : ~6 rows (environ)
INSERT INTO `acteur` (`id_acteur`, `id_personne`) VALUES
	(1, 1),
	(2, 4),
	(3, 6),
	(4, 8),
	(5, 10),
	(6, 12);

-- Listage de la structure de table cinema_amine. casting
CREATE TABLE IF NOT EXISTS `casting` (
  `id_film` int DEFAULT NULL,
  `id_acteur` int DEFAULT NULL,
  `id_role` int DEFAULT NULL,
  KEY `id_film` (`id_film`),
  KEY `id_acteur` (`id_acteur`),
  KEY `id_role` (`id_role`),
  CONSTRAINT `FK_id_acteur` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`),
  CONSTRAINT `FK_id_film_casting` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `FK_id_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema_amine.casting : ~90 rows (environ)
INSERT INTO `casting` (`id_film`, `id_acteur`, `id_role`) VALUES
	(1, 1, 1),
	(1, 2, 2),
	(1, 3, 3),
	(1, 4, 4),
	(1, 5, 5),
	(1, 6, 6),
	(2, 1, 1),
	(2, 2, 2),
	(2, 3, 3),
	(2, 4, 4),
	(2, 5, 5),
	(2, 6, 6),
	(3, 1, 1),
	(3, 2, 2),
	(3, 3, 3),
	(3, 4, 4),
	(3, 5, 5),
	(3, 6, 6),
	(4, 1, 1),
	(4, 2, 2),
	(4, 3, 3),
	(4, 4, 4),
	(4, 5, 5),
	(4, 6, 6),
	(5, 1, 1),
	(5, 2, 2),
	(5, 3, 3),
	(5, 4, 4),
	(5, 5, 5),
	(5, 6, 6),
	(6, 1, 1),
	(6, 2, 2),
	(6, 3, 3),
	(6, 4, 4),
	(6, 5, 5),
	(6, 6, 6),
	(7, 1, 1),
	(7, 2, 2),
	(7, 3, 3),
	(7, 4, 4),
	(7, 5, 5),
	(7, 6, 6),
	(8, 1, 1),
	(8, 2, 2),
	(8, 3, 3),
	(8, 4, 4),
	(8, 5, 5),
	(8, 6, 6),
	(9, 1, 1),
	(9, 2, 2),
	(9, 3, 3),
	(9, 4, 4),
	(9, 5, 5),
	(9, 6, 6),
	(10, 1, 1),
	(10, 2, 2),
	(10, 3, 3),
	(10, 4, 4),
	(10, 5, 5),
	(10, 6, 6),
	(11, 1, 1),
	(11, 2, 2),
	(11, 3, 3),
	(11, 4, 4),
	(11, 5, 5),
	(11, 6, 6),
	(12, 1, 1),
	(12, 2, 2),
	(12, 3, 3),
	(12, 4, 4),
	(12, 5, 5),
	(12, 6, 6),
	(13, 1, 1),
	(13, 2, 2),
	(13, 3, 3),
	(13, 4, 4),
	(13, 5, 5),
	(13, 6, 6),
	(14, 1, 1),
	(14, 2, 2),
	(14, 3, 3),
	(14, 4, 4),
	(14, 5, 5),
	(14, 6, 6),
	(15, 1, 1),
	(15, 2, 2),
	(15, 3, 3),
	(15, 4, 4),
	(15, 5, 5),
	(15, 6, 6);

-- Listage de la structure de table cinema_amine. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `annee_sortie` int NOT NULL,
  `duree` int NOT NULL,
  `resume` text NOT NULL,
  `note` decimal(10,1) NOT NULL,
  `id_realisateur` int NOT NULL,
  PRIMARY KEY (`id_film`),
  KEY `id_realisateur` (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema_amine.film : ~15 rows (environ)
INSERT INTO `film` (`id_film`, `titre`, `annee_sortie`, `duree`, `resume`, `note`, `id_realisateur`) VALUES
	(1, 'L\'Evasion Ultime', 2020, 120, 'Un homme tente d\'échapper à un complot.', 8.5, 1),
	(2, 'Au Coeur du Drame', 2019, 130, 'Une famille fait face à une tragédie.', 7.8, 2),
	(3, 'Rire à tout Prix', 2021, 110, 'Un comédien découvre le vrai sens de l\'humour.', 6.9, 3),
	(4, 'Galaxies Lointaines', 2022, 140, 'Une équipe explore une nouvelle planète.', 9.0, 4),
	(5, 'L\'Aventure Inattendue', 2023, 115, 'Un groupe d\'amis se perd dans la jungle.', 7.5, 5),
	(6, 'Nuit de Terreur', 2021, 100, 'Une maison hantée teste la bravoure de ses habitants.', 7.2, 1),
	(7, 'Le Défi Final', 2018, 125, 'Un boxeur affronte son ultime adversaire.', 8.0, 2),
	(8, 'Les Rires Sont Éternels', 2020, 105, 'Un festival d\'humour réunit des amis perdus.', 7.4, 3),
	(9, 'Planète Interdite', 2022, 136, 'Des astronautes découvrent une civilisation inconnue.', 8.8, 4),
	(10, 'Les Sentiers Cachés', 2019, 120, 'Un randonneur découvre un secret ancien.', 7.9, 5),
	(11, 'Horreur à Minuit', 2021, 95, 'Un groupe d\'amis est poursuivi par une entité.', 6.5, 1),
	(12, 'L\'Ascension', 2010, 137, 'Un alpiniste atteint de nouveaux sommets.', 8.3, 2),
	(13, 'Comédie Fatale', 2022, 110, 'Un détective résout des mystères hilarants.', 7.1, 3),
	(14, 'Colonisation Galactique', 2023, 145, 'Une nouvelle ère spatiale commence.', 9.2, 4),
	(15, 'Au Bord du Gouffre', 2020, 125, 'Un homme lutte contre ses démons intérieurs.', 8.1, 5);

-- Listage de la structure de table cinema_amine. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL,
  `nom_genre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema_amine.genre : ~0 rows (environ)
INSERT INTO `genre` (`id_genre`, `nom_genre`) VALUES
	(1, 'Action'),
	(2, 'Drame'),
	(3, 'Comédie'),
	(4, 'Science-Fiction'),
	(5, 'Aventure'),
	(6, 'Horreur');

-- Listage de la structure de table cinema_amine. genre_film
CREATE TABLE IF NOT EXISTS `genre_film` (
  `id_film` int DEFAULT NULL,
  `id_genre` int DEFAULT NULL,
  KEY `id_film` (`id_film`),
  KEY `id_genre` (`id_genre`),
  CONSTRAINT `FK_id_film_genre` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `FK_id_genre` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema_amine.genre_film : ~15 rows (environ)
INSERT INTO `genre_film` (`id_film`, `id_genre`) VALUES
	(1, 1),
	(2, 2),
	(3, 3),
	(4, 4),
	(5, 5),
	(6, 6),
	(7, 1),
	(8, 3),
	(9, 4),
	(10, 5),
	(11, 6),
	(12, 1),
	(13, 3),
	(14, 4),
	(15, 2);

-- Listage de la structure de table cinema_amine. personne
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sexe` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema_amine.personne : ~12 rows (environ)
INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `sexe`, `date`) VALUES
	(1, 'Smith', 'John', 'Homme', '1958-03-22'),
	(2, 'Doe', 'Jane', 'Femme', '1985-07-15'),
	(3, 'Brown', 'Michael', 'Homme', '1990-11-05'),
	(4, 'Johnson', 'Emily', 'Femme', '1992-09-17'),
	(5, 'Williams', 'Chris', 'Homme', '1980-01-10'),
	(6, 'Jones', 'Sarah', 'Femme', '1988-06-30'),
	(7, 'Taylor', 'David', 'Homme', '1975-12-08'),
	(8, 'Miller', 'Emma', 'Femme', '1995-04-19'),
	(9, 'Davis', 'James', 'Homme', '1982-02-28'),
	(10, 'Garcia', 'Olivia', 'Femme', '1991-08-12'),
	(11, 'Martinez', 'Daniel', 'Homme', '1987-05-24'),
	(12, 'Hernandez', 'Sophia', 'Femme', '1993-10-02');

-- Listage de la structure de table cinema_amine. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int NOT NULL,
  PRIMARY KEY (`id_realisateur`),
  KEY `id_personne` (`id_personne`),
  CONSTRAINT `FK_id_personne_realisateur` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema_amine.realisateur : ~5 rows (environ)
INSERT INTO `realisateur` (`id_realisateur`, `id_personne`) VALUES
	(1, 1),
	(2, 3),
	(3, 5),
	(4, 7),
	(5, 9);

-- Listage de la structure de table cinema_amine. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema_amine.role : ~6 rows (environ)
INSERT INTO `role` (`id_role`, `nom_role`) VALUES
	(1, 'Protagoniste'),
	(2, 'Antagoniste'),
	(3, 'Accompagnateur'),
	(4, 'Parent'),
	(5, 'Ami'),
	(6, 'Mentor');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
