-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 18 mars 2023 à 14:04
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cabinet_medical`
--

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

CREATE TABLE `consultation` (
  `Id_Consultation` int(11) NOT NULL,
  `Date_Consultation` date DEFAULT NULL,
  `Compte_Rendu_Consultation` varchar(5000) DEFAULT NULL,
  `Id_Patient` int(11) DEFAULT NULL,
  `Id_Medecin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `consultation`
--

INSERT INTO `consultation` (`Id_Consultation`, `Date_Consultation`, `Compte_Rendu_Consultation`, `Id_Patient`, `Id_Medecin`) VALUES
(1, '2023-02-24', 'aaaaa aa aaaaaaa aa aa a aaaaaaaaa a aaa aaaaaaaaa aa aaaa aaaaaa', 80, 1),
(2, '2023-02-28', 'ddd d ddd ddd ddddddddd d d ddddddddd dd dddddd ddd', 24, 1);

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE `medecin` (
  `Id_Medecin` int(11) NOT NULL,
  `Nom_Medecin` varchar(50) DEFAULT NULL,
  `Prenom_Medecin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`Id_Medecin`, `Nom_Medecin`, `Prenom_Medecin`) VALUES
(1, 'Zammouri', 'Amin'),
(2, 'Gaume', 'Antoine'),
(3, 'Claudine', 'Jordon'),
(4, 'Tanner', 'Tina'),
(5, 'Rylan', 'Jamal'),
(6, 'Ulices', 'Armani'),
(7, 'Catalina', 'Ervin'),
(8, 'Alexandrea', 'Elda'),
(9, 'Herman', 'Doyle'),
(10, 'Josefa', 'Kadin'),
(11, 'Herman', 'Dean'),
(12, 'Chaz', 'Eulalia'),
(13, 'Turner', 'Wendy'),
(14, 'Kayley', 'Harold'),
(15, 'Conrad', 'Adolph'),
(20, 'Zackary', 'Sonia'),
(30, 'Claudine', 'Jordon'),
(40, 'Tanner', 'Tina'),
(50, 'Rylan', 'Jamal'),
(60, 'Ulices', 'Armani'),
(70, 'Catalina', 'Ervin'),
(80, 'Alexandrea', 'Elda'),
(90, 'Herman', 'Doyle'),
(100, 'Josefa', 'Kadin'),
(102, 'Chaz', 'Eulalia'),
(103, 'Turner', 'Wendy'),
(104, 'Kayley', 'Harold'),
(105, 'Conrad', 'Adolph'),
(1010, 'Herman', 'Dean');

-- --------------------------------------------------------

--
-- Structure de la table `ordonnance`
--

CREATE TABLE `ordonnance` (
  `Id_Ordonnance` int(11) NOT NULL,
  `Date_Ordonnance` date DEFAULT NULL,
  `Detail_Medicament` varchar(5000) DEFAULT NULL,
  `Id_Consultation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `ordonnance`
--

INSERT INTO `ordonnance` (`Id_Ordonnance`, `Date_Ordonnance`, `Detail_Medicament`, `Id_Consultation`) VALUES
(1, '2023-02-01', 'edrtfyguijopo^pmù\r\nseydtfuyio,p;m:ù\r\n', 1),
(2, '2023-02-28', ')^pmiu,nbfdswfxgcvbn,m;ùm:\r\nù:m: ,;', 2);

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `Id_Patient` int(11) NOT NULL,
  `Nom_Patient` varchar(50) DEFAULT NULL,
  `Prenom_Patient` varchar(50) DEFAULT NULL,
  `Sexe_Patient` varchar(50) DEFAULT NULL,
  `Adresse_Patient` varchar(50) DEFAULT NULL,
  `Ville_Patient` varchar(50) DEFAULT NULL,
  `Departement_Patient` varchar(50) DEFAULT NULL,
  `Date_Naissance_Patient` varchar(10) DEFAULT NULL,
  `Situation_Familiale_Patient` varchar(50) DEFAULT NULL,
  `Affiliation_Mutuelle` varchar(50) DEFAULT NULL,
  `Date_Creation_Dossier` varchar(10) DEFAULT NULL,
  `id_medecin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`Id_Patient`, `Nom_Patient`, `Prenom_Patient`, `Sexe_Patient`, `Adresse_Patient`, `Ville_Patient`, `Departement_Patient`, `Date_Naissance_Patient`, `Situation_Familiale_Patient`, `Affiliation_Mutuelle`, `Date_Creation_Dossier`, `id_medecin`) VALUES
(2, 'Shea Konopelski', 'Caesar', 'Miss', '23306 Hector Mountain Suite 895', 'Hartmannmouth', 'numquam', '2003-03-11', 'deleniti', '89095842', '1989-02-04', 1),
(3, 'Brennan Armstrong', 'Jefferey', 'Mr.', '8436 Heathcote Underpass Suite 407', 'New Leanna', 'voluptatem', '2016-07-19', 'corrupti', '125822353', '1998-08-07', 1),
(4, 'Ruth Mosciski', 'Linwood', 'Mrs.', '587 Alvina Center', 'Ziemeshire', 'autem', '2007-08-26', 'tempora', '54010', '1992-01-27', 1),
(5, 'Dr. Flavie Heller I', 'Frederik', 'Prof.', '378 Freida Landing', 'North Jordyn', 'qui', '1997-01-26', 'voluptates', '100947167', '1996-11-17', 1),
(6, 'Harvey Breitenberg I', 'Declan', 'Dr.', '66961 Chelsea Expressway', 'Port Jalon', 'consectetur', '1973-07-29', 'quis', '1705', '1998-08-13', 1),
(7, 'Max Crona', 'Garnet', 'Prof.', '7256 Naomi Plaza', 'Konopelskiport', 'quas', '1978-05-12', 'modi', '5382', '1982-12-30', 1),
(8, 'Muhammad Cummings', 'Lyric', 'Miss', '4077 Hammes Crescent Apt. 729', 'Terryborough', 'et', '2023-02-15', 'consequatur', '33', '1987-05-09', 2),
(9, 'Deontae O\'Hara DDS', 'Enos', 'Dr.', '58587 Sauer Glen Apt. 197', 'Port Edwinatown', 'assumenda', '1986-06-19', 'incidunt', '798', '1989-06-01', 2),
(10, 'Mr. Jarod Abbott V', 'Junius', 'Prof.', '959 Carroll Gardens Apt. 601', 'South Paul', 'debitis', '2006-10-24', 'dicta', '', '1974-12-08', 2),
(11, 'Walker Wyman', 'Tobin', 'Prof.', '317 Donnelly Port Suite 118', 'Cartwrightfurt', 'dolorem', '1992-04-28', 'sint', '705170248', '1991-09-12', 2),
(12, 'Mike Heidenreich', 'Guillermo', '', '3903 Hodkiewicz Burgs', 'West Vivienne', 'explicabo', '2022-09-04', 'ut', '65', '2013-07-05', NULL),
(13, 'Carmela Haag', 'Patrick', 'Prof.', '20721 Grimes Dam', 'Dennistown', 'impedit', '1991-11-12', 'eius', '84643232', '2017-08-24', NULL),
(14, 'Dr. Alena Dietrich Jr.', 'Arthur', 'Dr.', '3493 Smitham Mountains', 'Omaport', 'veniam', '1975-05-17', 'natus', '88', '2018-11-13', NULL),
(15, 'Prof. Esta Bahringer III', 'Marco', 'Mr.', '94585 Windler Summit', 'East Dakota', 'vel', '2007-02-18', 'molestiae', '', '2020-01-14', NULL),
(16, 'Retta Emmerich', 'Nico', 'Mrs.', '4065 Gottlieb Isle Suite 259', 'East Aureliastad', 'perferendis', '1986-06-06', 'illo', '8', '2012-09-29', NULL),
(17, 'Cordie Kuvalis', 'Adam', 'Ms.', '68181 Tyrel Isle', 'Port Fanny', 'occaecati', '2009-10-05', 'aut', '3161380', '1991-03-20', NULL),
(18, 'Dr. Joe Howe', 'Lindsey', 'Dr.', '85484 Josie Fork Apt. 437', 'South Kameron', 'fugiat', '2002-03-13', 'harum', '', '2013-03-09', NULL),
(19, 'Jordi Wyman', 'Marvin', 'Mrs.', '367 Willms Course Apt. 946', 'Hyattmouth', 'et', '1986-03-30', 'reiciendis', '41', '2001-03-20', NULL),
(20, 'Terrill Green DDS', 'Brenden', 'Prof.', '0315 Ratke Ranch Suite 408', 'Murazikside', 'nihil', '1998-08-05', 'distinctio', '4913323', '2010-07-05', NULL),
(21, 'Birdie Hirthe', 'Rogers', 'Mr.', '118 Ray Place Suite 979', 'East Margarettfort', 'atque', '2009-05-22', 'qui', '6195141', '1994-01-31', NULL),
(22, 'Myrtie Donnelly', 'Lorenz', 'Prof.', '045 White Estate Apt. 998', 'Lake Myraside', 'et', '2013-09-25', 'nemo', '35982588', '1999-05-28', NULL),
(23, 'Collin Schimmel', 'Afton', 'Dr.', '2047 Beier Circle Suite 205', 'Hamillfurt', 'quam', '1991-05-21', 'eum', '3520564', '2021-06-15', NULL),
(24, 'Laron Ryan', 'Triston', 'Dr.', '06657 Bethel Cliffs', 'Bergstrombury', 'est', '1987-03-31', 'nisi', '6375457', '1975-08-20', NULL),
(25, 'Delilah Parker', 'Rory', 'Mr.', '4111 Ross Wells Apt. 229', 'East Carolinabury', 'officiis', '2018-11-24', 'et', '307297', '2009-12-09', NULL),
(26, 'Lucious Lubowitz', 'Elton', 'Miss', '9926 Bruen Springs', 'Port Kaylatown', 'qui', '2014-05-10', 'ut', '609079', '2004-06-20', NULL),
(27, 'Sarai Moen', 'Deshaun', 'Dr.', '79615 Conner Squares', 'New Larrytown', 'recusandae', '1979-12-04', 'non', '1', '2020-08-15', NULL),
(28, 'Leora Stark', 'Jessie', 'Mrs.', '35321 Diego Route', 'East Eastonstad', 'aut', '1995-05-21', 'natus', '5218869', '2017-07-20', NULL),
(29, 'Jacky Gerlach', 'Celestino', 'Prof.', '015 Hahn Burgs Apt. 939', 'Annaliseland', 'cumque', '1978-12-27', 'exercitationem', '99', '2013-01-14', NULL),
(30, 'Sheridan Jacobi', 'Carol', 'Mrs.', '7598 Rosenbaum Cape Apt. 386', 'Mackenzieview', 'velit', '1974-12-13', 'ea', '8483076', '1970-03-14', NULL),
(31, 'Gerry Gaylord', 'Winfield', 'Dr.', '7951 Hoppe Drives', 'Zboncakshire', 'atque', '1991-04-13', 'officia', '163', '1986-09-17', NULL),
(32, 'Dr. Walter Champlin V', 'Felipe', 'Prof.', '9930 Tanya Mills Suite 223', 'Gaylordbury', 'vitae', '1970-04-05', 'dolorem', '453466', '2008-06-01', NULL),
(33, 'Ms. Karianne Pfannerstill', 'Mohammed', 'Prof.', '362 Adelle Locks', 'Fabiolachester', 'totam', '2003-12-27', 'in', '201074446', '2005-08-30', NULL),
(34, 'Verlie Murray', 'Quincy', 'Dr.', '8041 Marcos Loop', 'East Joanny', 'dolor', '1988-04-27', 'excepturi', '291', '2007-07-11', NULL),
(35, 'Dr. Olin Prohaska MD', 'Omer', 'Prof.', '93662 Hammes Extensions Suite 573', 'Wilsonmouth', 'non', '1984-12-14', 'molestiae', '', '2005-10-19', NULL),
(36, 'Dandre Nicolas', 'Hayden', 'Dr.', '9442 Bud Mountains', 'Gislasonmouth', 'eius', '2008-09-22', 'ut', '8523', '2021-02-11', NULL),
(37, 'Alize Lind', 'Pete', 'Miss', '09519 Stracke Common Suite 286', 'Tobinburgh', 'nulla', '2009-07-16', 'voluptatem', '1343462', '1979-11-30', NULL),
(60, 'Harvey Breitenberg I', 'Declan', 'Dr.', '6060906010 Chelsea Expressway', 'Port Jalon', 'consectetur', '1090703-07', 'quis', '107005', '10909080-0', NULL),
(70, 'Max Crona', 'Garnet', 'Prof.', '702560 Naomi Plaza', 'Konopelskiport', 'quas', '10907080-0', 'modi', '53802', '1090802-10', NULL),
(80, 'Muhammad Cummings', 'Lyric', 'Miss', '407070 Hammes Crescent Apt. 70290', 'Terryborough', 'et', '2023-02-10', 'consequatur', '33', '10908070-0', NULL),
(90, 'Deontae O\'Hara DDS', 'Enos', 'Dr.', '58058070 Sauer Glen Apt. 109070', 'Port Edwinatown', 'assumenda', '10908060-0', 'incidunt', '709080', '10908090-0', NULL),
(100, 'Mr. Jarod Abbott V', 'Junius', 'Prof.', '90590 Carroll Gardens Apt. 60010', 'South Paul', 'debitis', '20060-100-', 'dicta', '', '1090704-10', NULL),
(102, 'Mike Heidenreich', 'Guillermo', 'Prof.', '39003 Hodkiewicz Burgs', 'West Vivienne', 'explicabo', '2022-090-0', 'ut', '605', '20103-070-', NULL),
(103, 'Carmela Haag', 'Patrick', 'Prof.', '2070210 Grimes Dam', 'Dennistown', 'impedit', '10909010-1', 'eius', '8046043232', '201070-080', NULL),
(104, 'Dr. Alena Dietrich Jr.', 'Arthur', 'Dr.', '34903 Smitham Mountains', 'Omaport', 'veniam', '1090705-05', 'natus', '8080', '201080-101', NULL),
(105, 'Prof. Esta Bahringer III', 'Marco', 'Mr.', '9045805 Windler Summit', 'East Dakota', 'vel', '20070-02-1', 'molestiae', '', '2020-010-1', NULL),
(210, 'Birdie Hirthe', 'Rogers', 'Mr.', '101080 Ray Place Suite 907090', 'East Margarettfort', 'atque', '20090-05-2', 'qui', '601090510410', '1090904-01', NULL),
(260, 'Lucious Lubowitz', 'Elton', 'Miss', '9090260 Bruen Springs', 'Port Kaylatown', 'qui', '20104-05-1', 'ut', '6009007090', '2004-060-2', NULL),
(270, 'Sarai Moen', 'Deshaun', 'Dr.', '709060105 Conner Squares', 'New Larrytown', 'recusandae', '10907090-1', 'non', '10', '2020-080-1', NULL),
(280, 'Leora Stark', 'Jessie', 'Mrs.', '353210 Diego Route', 'East Eastonstad', 'aut', '1090905-05', 'natus', '521080806090', '201070-070', NULL),
(290, 'Jacky Gerlach', 'Celestino', 'Prof.', '0105 Hahn Burgs Apt. 90390', 'Annaliseland', 'cumque', '10907080-1', 'exercitationem', '9090', '20103-010-', NULL),
(310, 'Gerry Gaylord', 'Winfield', 'Dr.', '7090510 Hoppe Drives', 'Zboncakshire', 'atque', '10909010-0', 'officia', '10603', '10908060-0', NULL),
(360, 'Dandre Nicolas', 'Hayden', 'Dr.', '90442 Bud Mountains', 'Gislasonmouth', 'eius', '20080-090-', 'ut', '80523', '20210-02-1', NULL),
(370, 'Alize Lind', 'Pete', 'Miss', '09051090 Stracke Common Suite 28060', 'Tobinburgh', 'nulla', '20090-070-', 'voluptatem', '103434602', '10907090-1', NULL),
(1010, 'Walker Wyman', 'Tobin', 'Prof.', '31070 Donnelly Port Suite 101080', 'Cartwrightfurt', 'dolorem', '1090902-04', 'sint', '7005107002480', '10909010-0', NULL),
(1060, 'Retta Emmerich', 'Nico', 'Mrs.', '40605 Gottlieb Isle Suite 2590', 'East Aureliastad', 'perferendis', '10908060-0', 'illo', '80', '20102-090-', NULL),
(1070, 'Cordie Kuvalis', 'Adam', 'Ms.', '6080108010 Tyrel Isle', 'Port Fanny', 'occaecati', '20090-100-', 'aut', '31060103800', '10909010-0', NULL),
(1080, 'Dr. Joe Howe', 'Lindsey', 'Dr.', '8054804 Josie Fork Apt. 4370', 'South Kameron', 'fugiat', '2002-03-10', 'harum', '', '20103-03-0', NULL),
(1090, 'Jordi Wyman', 'Marvin', 'Mrs.', '36070 Willms Course Apt. 90460', 'Hyattmouth', 'et', '10908060-0', 'reiciendis', '410', '20010-03-2', NULL),
(1091, 'Barreau', 'Lucas', 'Homme', NULL, 'Athis-Mons', '91200', '2001-04-07', 'Celibataire', '+984', '', NULL),
(1092, 'Barreau', 'Lucas', 'Homme', NULL, 'Athis-Mons', '91', '2001-04-07', 'Celibataire', 'azdadsscezcq', '2023-02-21', NULL),
(1093, 'Barreau', 'Lucas', 'Homme', NULL, 'Athis-Mons', '91', '2001-04-07', 'Celibataire', '948613', '2023-03-18', NULL),
(1094, 'Barreau', 'Lucas', 'Homme', NULL, 'Athis-Mons', '91', '2001-04-07', 'Celibataire', '948613', '2023-03-18', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

CREATE TABLE `rendez_vous` (
  `Id_Rendez_Vous` int(11) NOT NULL,
  `Date_Rendez_Vous` date DEFAULT NULL,
  `Id_Patient` int(11) NOT NULL,
  `Id_Medecin` int(11) NOT NULL,
  `Id_Salle` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `rendez_vous`
--

INSERT INTO `rendez_vous` (`Id_Rendez_Vous`, `Date_Rendez_Vous`, `Id_Patient`, `Id_Medecin`, `Id_Salle`) VALUES
(1, '2023-02-15', 3, 15, 1),
(2, '2023-03-23', 102, 1, 2),
(3, '2023-04-07', 80, 1, 3),
(4, '2023-02-23', 270, 1, 4),
(6, '2023-03-18', 2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id`, `nom`) VALUES
(1, 'P202'),
(2, 'P203'),
(3, 'P204'),
(4, 'P205');

-- --------------------------------------------------------

--
-- Structure de la table `secretaire`
--

CREATE TABLE `secretaire` (
  `Id_Secretaire` int(11) NOT NULL,
  `Nom_Secretaire` varchar(50) DEFAULT NULL,
  `Prenom_Secretaire` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `secretaire`
--

INSERT INTO `secretaire` (`Id_Secretaire`, `Nom_Secretaire`, `Prenom_Secretaire`) VALUES
(1, 'Secrétaire', 'Secrétaire X'),
(2, 'Tatyana', 'Blick'),
(3, 'Helga', 'Jaskolski'),
(4, 'Alicia', 'Cole'),
(5, 'Malika', 'Hamill'),
(10, 'Brenda', 'Zieme'),
(60, 'Helen', 'Stoltenberg'),
(70, 'Yazmin', 'Williamson'),
(80, 'Sandra', 'Schuster'),
(90, 'Sylvia', 'McLaughlin'),
(100, 'Destini', 'Ebert');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `Id_Utilisateur` int(11) NOT NULL,
  `Login` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Type_Utilisateur` varchar(50) DEFAULT NULL,
  `Last_Login` date DEFAULT NULL,
  `Id_Medecin` int(11) DEFAULT NULL,
  `Id_Secretaire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Id_Utilisateur`, `Login`, `Password`, `Type_Utilisateur`, `Last_Login`, `Id_Medecin`, `Id_Secretaire`) VALUES
(1, 'secretaire', '123', 'Secretaire', NULL, 2, 1),
(2, 'zammouri', '123', 'Medecin', NULL, 1, 4),
(3, 'Gaume', '123', 'Medecin', NULL, 2, 70);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`Id_Consultation`),
  ADD KEY `FK_Consultation_Id_Patient` (`Id_Patient`),
  ADD KEY `FK_Consultation_Id_Medecin` (`Id_Medecin`);

--
-- Index pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`Id_Medecin`);

--
-- Index pour la table `ordonnance`
--
ALTER TABLE `ordonnance`
  ADD PRIMARY KEY (`Id_Ordonnance`),
  ADD KEY `FK_Ordonnance_Id_Consultation` (`Id_Consultation`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`Id_Patient`),
  ADD KEY `id_medecin` (`id_medecin`),
  ADD KEY `id_medecin_2` (`id_medecin`);

--
-- Index pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD PRIMARY KEY (`Id_Rendez_Vous`),
  ADD KEY `FK_Rendez_Vous_Id_Patient` (`Id_Patient`),
  ADD KEY `FK_Rendez_Vous_Id_Medecin` (`Id_Medecin`),
  ADD KEY `salle` (`Id_Salle`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `secretaire`
--
ALTER TABLE `secretaire`
  ADD PRIMARY KEY (`Id_Secretaire`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`Id_Utilisateur`),
  ADD KEY `FK_Utilisateur_Id_Medecin` (`Id_Medecin`),
  ADD KEY `FK_Utilisateur_Id_Secretaire` (`Id_Secretaire`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `Id_Consultation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `Id_Medecin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- AUTO_INCREMENT pour la table `ordonnance`
--
ALTER TABLE `ordonnance`
  MODIFY `Id_Ordonnance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `Id_Patient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1095;

--
-- AUTO_INCREMENT pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  MODIFY `Id_Rendez_Vous` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `secretaire`
--
ALTER TABLE `secretaire`
  MODIFY `Id_Secretaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `Id_Utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD CONSTRAINT `FK_Consultation_Id_Medecin` FOREIGN KEY (`Id_Medecin`) REFERENCES `medecin` (`Id_Medecin`),
  ADD CONSTRAINT `FK_Consultation_Id_Patient` FOREIGN KEY (`Id_Patient`) REFERENCES `patient` (`Id_Patient`);

--
-- Contraintes pour la table `ordonnance`
--
ALTER TABLE `ordonnance`
  ADD CONSTRAINT `FK_Ordonnance_Id_Consultation` FOREIGN KEY (`Id_Consultation`) REFERENCES `consultation` (`Id_Consultation`);

--
-- Contraintes pour la table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`id_medecin`) REFERENCES `medecin` (`Id_Medecin`);

--
-- Contraintes pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD CONSTRAINT `FK_Rendez_Vous_Id_Medecin` FOREIGN KEY (`Id_Medecin`) REFERENCES `medecin` (`Id_Medecin`),
  ADD CONSTRAINT `FK_Rendez_Vous_Id_Patient` FOREIGN KEY (`Id_Patient`) REFERENCES `patient` (`Id_Patient`),
  ADD CONSTRAINT `rendez_vous_ibfk_1` FOREIGN KEY (`Id_Salle`) REFERENCES `salle` (`id`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_Utilisateur_Id_Medecin` FOREIGN KEY (`Id_Medecin`) REFERENCES `medecin` (`Id_Medecin`),
  ADD CONSTRAINT `FK_Utilisateur_Id_Secretaire` FOREIGN KEY (`Id_Secretaire`) REFERENCES `secretaire` (`Id_Secretaire`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
