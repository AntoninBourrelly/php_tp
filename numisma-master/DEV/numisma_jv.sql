-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 14 mai 2019 à 12:30
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.4

--
-- numisma_jv avec des données
--
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `numisma_jv`
--

-- --------------------------------------------------------

--
-- Structure de la table `jv_constructeurs`
--

CREATE TABLE `jv_constructeurs` (
  `id_constructeur` int(11) NOT NULL,
  `constructeur_nom` varchar(45) DEFAULT NULL,
  `constructeur_logo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jv_constructeurs`
--

INSERT INTO `jv_constructeurs` (`id_constructeur`, `constructeur_nom`, `constructeur_logo`) VALUES
(1, 'Sony', NULL),
(2, 'Nintendo', NULL),
(3, 'Microsoft', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `jv_developpeurs`
--

CREATE TABLE `jv_developpeurs` (
  `id_developpeur` int(11) NOT NULL,
  `developpeur_nom` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jv_developpeurs`
--

INSERT INTO `jv_developpeurs` (`id_developpeur`, `developpeur_nom`) VALUES
(3, 'Insomniac Games'),
(1, 'Naughty Dog'),
(2, 'Tecmo');

-- --------------------------------------------------------

--
-- Structure de la table `jv_editeurs`
--

CREATE TABLE `jv_editeurs` (
  `id_editeur` int(11) NOT NULL,
  `editeur_nom` varchar(45) DEFAULT NULL,
  `editeur_description` text,
  `editeur_logo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jv_editeurs`
--

INSERT INTO `jv_editeurs` (`id_editeur`, `editeur_nom`, `editeur_description`, `editeur_logo`) VALUES
(1, 'Wanadoo', NULL, NULL),
(2, 'Tecmo', NULL, NULL),
(3, 'Ubisoft', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `jv_genres`
--

CREATE TABLE `jv_genres` (
  `id_genre` int(11) NOT NULL,
  `genre_nom_fr` varchar(45) DEFAULT NULL,
  `genre_nom_en` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jv_genres`
--

INSERT INTO `jv_genres` (`id_genre`, `genre_nom_fr`, `genre_nom_en`) VALUES
(3, 'Survival Horror', '0'),
(4, 'RPG', '0'),
(5, 'Rythme', '0'),
(6, 'Combat', '0'),
(7, 'FPS', '0'),
(8, 'TPS', 'TPS'),
(9, 'Course', 'Racing'),
(10, 'Visual novel', 'Visual novel');

-- --------------------------------------------------------

--
-- Structure de la table `jv_master`
--

CREATE TABLE `jv_master` (
  `id_master` int(255) NOT NULL,
  `m_nom_jap` varchar(45) DEFAULT NULL,
  `m_nom_kor` varchar(45) DEFAULT NULL,
  `m_nom_us` varchar(45) DEFAULT NULL,
  `m_nom_eu` varchar(45) DEFAULT NULL,
  `m_nom_alt` varchar(45) DEFAULT NULL,
  `m_genre` int(11) DEFAULT NULL,
  `m_versions` varchar(9999) DEFAULT NULL,
  `m_dateini` date DEFAULT NULL,
  `m_developpeur` int(11) DEFAULT NULL,
  `m_serie` int(11) DEFAULT NULL,
  `m_notes` varchar(45) DEFAULT NULL,
  `m_boxart` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jv_master`
--

INSERT INTO `jv_master` (`id_master`, `m_nom_jap`, `m_nom_kor`, `m_nom_us`, `m_nom_eu`, `m_nom_alt`, `m_genre`, `m_versions`, `m_dateini`, `m_developpeur`, `m_serie`, `m_notes`, `m_boxart`) VALUES
(1, 'Zero', NULL, 'Fatal Frame', 'Project Zero', NULL, 3, NULL, '2001-12-13', 2, 2, NULL, NULL),
(2, 'Zero Akai Chou', NULL, 'Fatal Frame II', 'Project Zero II', NULL, 3, NULL, '2003-11-27', 2, 2, NULL, NULL),
(3, 'Zero - Shisei no Koe', NULL, 'Fatal Frame III', 'Project Zero 3: The Tormented', '', 3, NULL, '2005-07-28', 2, 2, '', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `jv_pays`
--

CREATE TABLE `jv_pays` (
  `id_pays` int(45) NOT NULL,
  `pays_nom_en` varchar(45) NOT NULL,
  `pays_nom_fr` varchar(45) NOT NULL,
  `pays_drapeaux` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `jv_pays`
--

INSERT INTO `jv_pays` (`id_pays`, `pays_nom_en`, `pays_nom_fr`, `pays_drapeaux`) VALUES
(2, 'France', 'France', ''),
(3, 'Japan', 'Japon', ''),
(4, 'Germany', 'Allemagne', '');

-- --------------------------------------------------------

--
-- Structure de la table `jv_region`
--

CREATE TABLE `jv_region` (
  `id_region` int(11) NOT NULL,
  `region_nom` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `jv_region`
--

INSERT INTO `jv_region` (`id_region`, `region_nom`) VALUES
(1, 'PAL'),
(2, 'NTSC-J'),
(3, 'NTSC-U');

-- --------------------------------------------------------

--
-- Structure de la table `jv_series`
--

CREATE TABLE `jv_series` (
  `id_serie` int(11) NOT NULL,
  `s_nom_eu` varchar(45) NOT NULL,
  `s_nom_jap` varchar(45) NOT NULL,
  `s_nom_us` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `jv_series`
--

INSERT INTO `jv_series` (`id_serie`, `s_nom_eu`, `s_nom_jap`, `s_nom_us`) VALUES
(2, 'Project Zero', 'Zero', 'Fatal Frame');

-- --------------------------------------------------------

--
-- Structure de la table `jv_support`
--

CREATE TABLE `jv_support` (
  `id_support` int(11) NOT NULL,
  `support_nom_complet` varchar(45) DEFAULT NULL,
  `support_constructeur` int(11) DEFAULT NULL,
  `support_logo` varchar(45) DEFAULT NULL,
  `support_diminutif` varchar(45) DEFAULT NULL,
  `support_annee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jv_support`
--

INSERT INTO `jv_support` (`id_support`, `support_nom_complet`, `support_constructeur`, `support_logo`, `support_diminutif`, `support_annee`) VALUES
(0, 'Playstation', 1, NULL, 'PS1', 1994),
(1, 'Playstation 2', 1, NULL, 'PS2', 2000),
(5, 'Playstation 3', 1, NULL, 'PS3', 2006),
(6, 'XBOX', 3, NULL, 'XBOX', 2001);

-- --------------------------------------------------------

--
-- Structure de la table `jv_version`
--

CREATE TABLE `jv_version` (
  `id_version` int(255) NOT NULL,
  `v_id_master` int(255) NOT NULL,
  `v_region` int(1) DEFAULT NULL,
  `v_pays` int(1) DEFAULT NULL,
  `v_nom` varchar(45) DEFAULT NULL,
  `v_annee` int(11) DEFAULT NULL,
  `v_date` date DEFAULT NULL,
  `v_editeur` int(11) DEFAULT NULL,
  `v_support` int(11) DEFAULT NULL,
  `v_serialcode` varchar(45) DEFAULT NULL,
  `v_codebarre` varchar(13) DEFAULT NULL,
  `v_img_front` varchar(45) DEFAULT NULL,
  `v_img_boxart` varchar(45) DEFAULT NULL,
  `v_img_game` varchar(45) DEFAULT NULL,
  `v_notes` varchar(45) DEFAULT NULL,
  `v_langues` varchar(45) DEFAULT NULL,
  `v_tags` varchar(45) DEFAULT NULL,
  `v_nb_disques` int(11) DEFAULT NULL,
  `v_nb_cartouches` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jv_version`
--

INSERT INTO `jv_version` (`id_version`, `v_id_master`, `v_region`, `v_pays`, `v_nom`, `v_annee`, `v_date`, `v_editeur`, `v_support`, `v_serialcode`, `v_codebarre`, `v_img_front`, `v_img_boxart`, `v_img_game`, `v_notes`, `v_langues`, `v_tags`, `v_nb_disques`, `v_nb_cartouches`) VALUES
(7, 1, 1, 2, 'Project Zero', 2002, '2002-08-30', 1, 1, 'SLES-50821#', '3563650069058', NULL, NULL, NULL, 'Disque violet', 'Français', 'RE', 1, NULL),
(8, 1, 1, 2, 'Project Zero', 2002, '2002-08-30', 1, 1, 'SLES-50821', '3563650069645', NULL, NULL, NULL, 'Edition originale disque bleu', 'Français', NULL, 1, NULL),
(9, 1, 2, 3, 'Zero', 2001, '2001-12-13', 2, 1, 'SLPS-25074', '0', NULL, NULL, NULL, NULL, 'Japonais', NULL, 1, NULL),
(10, 2, 1, 2, 'Project Zero II', 2004, '2004-04-30', 3, 1, 'SLES-52384', '0', NULL, NULL, NULL, NULL, 'Français', NULL, 1, NULL),
(11, 2, 1, 4, 'Project Zero II', 2004, '2004-04-30', 3, 1, 'SLES-52384', '0', NULL, NULL, NULL, NULL, 'Allemand', NULL, 1, NULL),
(12, 2, 2, 3, 'Zero - Akai Chou', 2003, '2003-11-27', 2, 1, 'SLPS-25303', '0', NULL, NULL, NULL, NULL, 'Japonais', NULL, 1, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `jv_constructeurs`
--
ALTER TABLE `jv_constructeurs`
  ADD PRIMARY KEY (`id_constructeur`);

--
-- Index pour la table `jv_developpeurs`
--
ALTER TABLE `jv_developpeurs`
  ADD PRIMARY KEY (`id_developpeur`),
  ADD UNIQUE KEY `CONTRE_DOUBLON` (`developpeur_nom`);

--
-- Index pour la table `jv_editeurs`
--
ALTER TABLE `jv_editeurs`
  ADD PRIMARY KEY (`id_editeur`);

--
-- Index pour la table `jv_genres`
--
ALTER TABLE `jv_genres`
  ADD PRIMARY KEY (`id_genre`);

--
-- Index pour la table `jv_master`
--
ALTER TABLE `jv_master`
  ADD PRIMARY KEY (`id_master`),
  ADD UNIQUE KEY `CONTRE_DOUBLON` (`m_nom_jap`) USING BTREE,
  ADD KEY `GENRE` (`m_genre`),
  ADD KEY `DEV` (`m_developpeur`),
  ADD KEY `SERIE` (`m_serie`);

--
-- Index pour la table `jv_pays`
--
ALTER TABLE `jv_pays`
  ADD PRIMARY KEY (`id_pays`);

--
-- Index pour la table `jv_region`
--
ALTER TABLE `jv_region`
  ADD PRIMARY KEY (`id_region`);

--
-- Index pour la table `jv_series`
--
ALTER TABLE `jv_series`
  ADD PRIMARY KEY (`id_serie`);

--
-- Index pour la table `jv_support`
--
ALTER TABLE `jv_support`
  ADD PRIMARY KEY (`id_support`),
  ADD KEY `LINK` (`support_constructeur`) USING BTREE;

--
-- Index pour la table `jv_version`
--
ALTER TABLE `jv_version`
  ADD PRIMARY KEY (`id_version`),
  ADD KEY `MASTER` (`v_id_master`),
  ADD KEY `SUPPORT` (`v_support`) USING BTREE,
  ADD KEY `EDITEUR` (`v_editeur`),
  ADD KEY `REGION` (`v_region`),
  ADD KEY `PAYS` (`v_pays`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `jv_constructeurs`
--
ALTER TABLE `jv_constructeurs`
  MODIFY `id_constructeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `jv_developpeurs`
--
ALTER TABLE `jv_developpeurs`
  MODIFY `id_developpeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `jv_editeurs`
--
ALTER TABLE `jv_editeurs`
  MODIFY `id_editeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `jv_genres`
--
ALTER TABLE `jv_genres`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `jv_master`
--
ALTER TABLE `jv_master`
  MODIFY `id_master` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `jv_pays`
--
ALTER TABLE `jv_pays`
  MODIFY `id_pays` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `jv_region`
--
ALTER TABLE `jv_region`
  MODIFY `id_region` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `jv_series`
--
ALTER TABLE `jv_series`
  MODIFY `id_serie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `jv_support`
--
ALTER TABLE `jv_support`
  MODIFY `id_support` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `jv_version`
--
ALTER TABLE `jv_version`
  MODIFY `id_version` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `jv_master`
--
ALTER TABLE `jv_master`
  ADD CONSTRAINT `jv_master_ibfk_1` FOREIGN KEY (`m_genre`) REFERENCES `jv_genres` (`id_genre`),
  ADD CONSTRAINT `jv_master_ibfk_2` FOREIGN KEY (`m_developpeur`) REFERENCES `jv_developpeurs` (`id_developpeur`),
  ADD CONSTRAINT `jv_master_ibfk_3` FOREIGN KEY (`m_serie`) REFERENCES `jv_series` (`id_serie`);

--
-- Contraintes pour la table `jv_support`
--
ALTER TABLE `jv_support`
  ADD CONSTRAINT `jv_support_ibfk_1` FOREIGN KEY (`support_constructeur`) REFERENCES `jv_constructeurs` (`id_constructeur`);

--
-- Contraintes pour la table `jv_version`
--
ALTER TABLE `jv_version`
  ADD CONSTRAINT `jv_version_ibfk_3` FOREIGN KEY (`v_support`) REFERENCES `jv_support` (`id_support`),
  ADD CONSTRAINT `jv_version_ibfk_4` FOREIGN KEY (`v_id_master`) REFERENCES `jv_master` (`id_master`),
  ADD CONSTRAINT `jv_version_ibfk_5` FOREIGN KEY (`v_editeur`) REFERENCES `jv_editeurs` (`id_editeur`),
  ADD CONSTRAINT `jv_version_ibfk_6` FOREIGN KEY (`v_region`) REFERENCES `jv_region` (`id_region`),
  ADD CONSTRAINT `jv_version_ibfk_7` FOREIGN KEY (`v_pays`) REFERENCES `jv_pays` (`id_pays`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
