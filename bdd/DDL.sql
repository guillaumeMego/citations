SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE auteurs (
  id int NOT NULL,
  auteur varchar(63) COLLATE utf8mb4_general_ci NOT NULL,
  bio text COLLATE utf8mb4_general_ci,
  date_modif datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE citations (
  id int NOT NULL,
  citation varchar(127) COLLATE utf8mb4_general_ci NOT NULL,
  explication text COLLATE utf8mb4_general_ci,
  date_modif datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  auteurs_id int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE utilisateurs (
  id int NOT NULL,
  prenom varchar(63) COLLATE utf8mb4_general_ci DEFAULT NULL,
  nom varchar(63) COLLATE utf8mb4_general_ci DEFAULT NULL,
  mail varchar(320) COLLATE utf8mb4_general_ci NOT NULL,
  mot_de_passe varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  date_modif datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  token varchar(127) COLLATE utf8mb4_general_ci DEFAULT NULL,
  is_admin tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE auteurs
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY auteur (auteur);

ALTER TABLE citations
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY citation (citation),
  ADD KEY auteurs_id (auteurs_id);

ALTER TABLE utilisateurs
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY mail (mail);


ALTER TABLE auteurs
  MODIFY id int NOT NULL AUTO_INCREMENT;

ALTER TABLE citations
  MODIFY id int NOT NULL AUTO_INCREMENT;

ALTER TABLE utilisateurs
  MODIFY id int NOT NULL AUTO_INCREMENT;


ALTER TABLE citations
  ADD CONSTRAINT citations_ibfk_1 FOREIGN KEY (auteurs_id) REFERENCES auteurs (id) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
