-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 07 déc. 2019 à 17:16
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `apartient`
--

CREATE TABLE `apartient` (
  `id_article` int(10) NOT NULL,
  `commande_id` int(10) NOT NULL,
  `qte` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `apartient`
--

INSERT INTO `apartient` (`id_article`, `commande_id`, `qte`) VALUES
(3, 1, 30),
(7, 1, 20);

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(10) NOT NULL,
  `artdesc` varchar(500) DEFAULT NULL,
  `marque` varchar(20) DEFAULT NULL,
  `id_fournisseur` int(11) NOT NULL,
  `prix` varchar(10) NOT NULL,
  `remise` int(3) DEFAULT 0,
  `prixremise` int(5) DEFAULT NULL,
  `artimd` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `artdesc`, `marque`, `id_fournisseur`, `prix`, `remise`, `prixremise`, `artimd`) VALUES
(1, 'iphone 11 pro', 'Telephone', 4, '1000', 100, 900, 'iphone 11 '),
(2, 'iphone 11', 'Telephone', 3, '800', 200, 600, 'iphone 11'),
(3, 'Mackbook pro', 'Ordinateur', 1, '1200', 100, 1100, 'md1'),
(4, 'Samsung S10', 'telephone', 1, '700', 50, 650, 'mds'),
(5, 'Ordiateur Hp', 'Ordinateur', 1, '800', 100, 700, 'md5'),
(6, 'Huawei', 'telephone', 1, '900', 0, 900, 'md7'),
(7, 'Iphone 8 plus', 'Telephone', 2, '700', 0, NULL, 'iphone'),
(8, 'IPhone 7 plus', 'telephone', 2, '600', 0, NULL, 'Iphone'),
(9, 'Ihone 6s', 'Telephone', 4, '550', 0, NULL, 'IPHONE'),
(10, 'Ihone 6c', 'telephone', 2, '600', 50, 550, 'iphone'),
(11, 'Macbook Air', 'Ordinateur', 2, '1300', 100, 1200, 'Macbook AIR'),
(12, 'iphone 11', 'Telephone', 3, '800', 200, 600, 'iphone 11');

-- --------------------------------------------------------

--
-- Structure de la table `boutique`
--

CREATE TABLE `boutique` (
  `id_boutique` int(10) NOT NULL,
  `boutiquelib` char(20) NOT NULL,
  `boutiqueadr` char(20) NOT NULL,
  `boutiquetel` char(10) NOT NULL,
  `boutiquefax` char(10) DEFAULT NULL,
  `boutiquemail` char(15) DEFAULT NULL,
  `fournisseurdesc` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `boutique`
--

INSERT INTO `boutique` (`id_boutique`, `boutiquelib`, `boutiqueadr`, `boutiquetel`, `boutiquefax`, `boutiquemail`, `fournisseurdesc`) VALUES
(1, 'Boutique A', '1 rue paris', '11223344', '01234567', 'Ba@btique.fr', 'founiss 1'),
(2, 'Boutique B', '2 rue paris', '12233445', '12345667', 'Bb@btiq.fr', 'founiss2'),
(3, 'Boutique C', '3 rue Saint germain', '98765432', '99887766', 'Bc@btiq.fr', 'founiss 1'),
(4, 'Boutique D', '50 rue Creteil', '66756578', '76566757', 'Bd@btq.fr', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `capacite`
--

CREATE TABLE `capacite` (
  `id_capacite` int(10) NOT NULL,
  `taille` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `capacite`
--

INSERT INTO `capacite` (`id_capacite`, `taille`) VALUES
(1, '16 Gb'),
(2, '32 Gb'),
(3, '64 Gb'),
(4, '128 Gb'),
(5, '500 Gb'),
(6, '1 To');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `commande_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `facid` int(10) DEFAULT NULL,
  `id_livraison` int(10) NOT NULL,
  `cmddate` date NOT NULL,
  `totalcmd` varchar(20) NOT NULL,
  `cmddescription` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`commande_id`, `user_id`, `facid`, `id_livraison`, `cmddate`, `totalcmd`, `cmddescription`) VALUES
(1, 1, NULL, 1, '2018-12-02', '20', 'cmd de macbook Air'),
(2, 2, NULL, 2, '2017-11-17', '10', 'CMD Iphone 11 rose de 64 GB');

-- --------------------------------------------------------

--
-- Structure de la table `couleur`
--

CREATE TABLE `couleur` (
  `id_couleur` int(10) NOT NULL,
  `couleur` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `couleur`
--

INSERT INTO `couleur` (`id_couleur`, `couleur`) VALUES
(1, 'Rouge'),
(2, 'Noir'),
(3, 'Rose'),
(4, 'Grise');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `facid` int(10) NOT NULL,
  `datefact` varchar(10) NOT NULL,
  `prixdebase` int(10) NOT NULL,
  `tva` int(11) NOT NULL DEFAULT 20,
  `remise` int(11) DEFAULT 0,
  `totalht` int(11) DEFAULT NULL,
  `totalttc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id_fournisseur` int(10) NOT NULL,
  `fournisseurname` char(10) NOT NULL,
  `fournisseuremail` char(10) NOT NULL,
  `fournisseurtel` char(10) NOT NULL,
  `fournisseuradr` char(10) NOT NULL,
  `fournisseurdesc` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id_fournisseur`, `fournisseurname`, `fournisseuremail`, `fournisseurtel`, `fournisseuradr`, `fournisseurdesc`) VALUES
(1, 'ALI', 'ali@ali.fr', '00001111', '12 rue 111', 'founiss 1'),
(2, 'john', 'jhn@jhn.fr', '10101010', '1 rue 21', 'founiss2'),
(3, 'nicolas', 'nico@nc.fr', '20102012', '20 rue A', 'founi3'),
(4, 'ahmed', 'ahm@ah.fr', '23332832', '23 rue C', 'fourni4');

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `id_livraison` int(10) NOT NULL,
  `id_type` int(10) NOT NULL,
  `date_prevu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livraison`
--

INSERT INTO `livraison` (`id_livraison`, `id_type`, `date_prevu`) VALUES
(1, 1, '3 jours'),
(2, 2, '5 jours');

-- --------------------------------------------------------

--
-- Structure de la table `livrer`
--

CREATE TABLE `livrer` (
  `id_livraison` int(10) NOT NULL,
  `id_boutique` int(10) NOT NULL,
  `etats` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livrer`
--

INSERT INTO `livrer` (`id_livraison`, `id_boutique`, `etats`, `date`) VALUES
(2, 1, 'etat1', '2019-12-06'),
(1, 2, 'etat2', '2019-12-19');

-- --------------------------------------------------------

--
-- Structure de la table `stock_article`
--

CREATE TABLE `stock_article` (
  `id_capacite` int(10) NOT NULL,
  `id_couleur` int(10) NOT NULL,
  `id_article` int(10) NOT NULL,
  `qte` int(11) DEFAULT NULL,
  `description` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stock_article`
--

INSERT INTO `stock_article` (`id_capacite`, `id_couleur`, `id_article`, `qte`, `description`) VALUES
(1, 3, 1, 50, 'iphone 11 rose'),
(6, 4, 3, 100, 'Macbook pro gris de 1 To'),
(5, 2, 3, 50, 'Macbook ro Noir de 500 Gb'),
(6, 2, 5, 200, 'HP noir de 1 to de capacite'),
(4, 2, 6, 500, 'Huawei noir de 128 Gb'),
(3, 4, 4, 30, 'Samsung S10 gris de 64gb'),
(5, 3, 5, 150, 'Hp rose de 500 gb'),
(3, 3, 4, 70, 'Samsung S10 rose de 64Gb'),
(1, 4, 10, 30, 'Iphone 6c grise de 16Gb'),
(2, 2, 10, 10, 'Iphone 6c noir de 32Gb'),
(3, 1, 8, 50, 'Iphone 7 plus  64Gb'),
(2, 2, 8, 100, 'Iphone 7 plus Noir de 32 Gb'),
(3, 1, 7, 200, 'iphone 8 plus Rouge 64 Gb'),
(2, 4, 7, 200, 'Iphone 8 plus Gris de 32 Gb'),
(3, 3, 7, 150, 'iphone 8 plus Rose 64 Gb'),
(6, 1, 5, 700, 'Hp rouge de 1 To'),
(6, 4, 11, 300, 'Macbook Air gris de 1 To'),
(6, 3, 11, 500, 'Macbook Air Rose de 1 To ');

-- --------------------------------------------------------

--
-- Structure de la table `type_livraison`
--

CREATE TABLE `type_livraison` (
  `id_type` int(10) NOT NULL,
  `nbjours` int(10) NOT NULL,
  `nomservice` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_livraison`
--

INSERT INTO `type_livraison` (`id_type`, `nbjours`, `nomservice`) VALUES
(1, 3, 'livraison boutique'),
(2, 8, 'livraison domicile'),
(3, 30, 'livraison etranger'),
(4, 8, 'livraion region');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `user_nom` varchar(46) COLLATE utf8_unicode_ci NOT NULL,
  `user_prenom` varchar(46) COLLATE utf8_unicode_ci NOT NULL,
  `user_sexe` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_cin` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_adresse` varchar(121) COLLATE utf8_unicode_ci NOT NULL,
  `user_code_postale` varchar(8) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password_hash`, `user_email`, `user_nom`, `user_prenom`, `user_sexe`, `user_tel`, `user_cin`, `user_adresse`, `user_code_postale`) VALUES
(1, 'aaa', '$2y$10$Am.0ndnXhf7tn13lEgtuIehl8aYkQCelKZR0o9N2OidLQTKOxT1uC', 'a@a.a', '', '', '', '', '', '', ''),
(2, 'ahmed', '$2y$10$ewZ6RE7cneG14qy5xYQiguKgNaS9cfKwz6OuB/kZ3LdQ0LSmC8HAq', 'a@aa.a', '', '', '', '', '', '', ''),
(7, 'ahmedscon', '$2y$10$Un8tjLJGoDYlAcG6uBL13uUMCetVTtwvDY4F5Xg0LUWaIUFD/TbIa', 'ahmed.esssaadi@gmail.com', 'Ahmed', 'Saadi', 'Homme', '1234567890', '12345678', '1 Square Gérard Philipe', '78190'),
(11, 'ahmeddd', '$2y$10$RQxUIM3solZ5b6jQA.BHreTgwWUCdh/4VuSlMb6FDvvTYIUrw2eIq', 'a@h.h', 'ahmed', 'saa', 'Homme', '1234567890', '12345678', '16 rue ben mitticha', '1006');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vue_article`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `vue_article` (
`artdesc` varchar(500)
,`marque` varchar(20)
,`couleur` char(10)
,`capacite` char(10)
,`quantite` int(11)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vue_article_telephone`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `vue_article_telephone` (
`artdesc` varchar(500)
,`marque` varchar(20)
,`couleur` char(10)
,`capacite` char(10)
,`quantite` int(11)
);

-- --------------------------------------------------------

--
-- Structure de la vue `vue_article`
--
DROP TABLE IF EXISTS `vue_article`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vue_article`  AS  select `a`.`artdesc` AS `artdesc`,`a`.`marque` AS `marque`,`c`.`couleur` AS `couleur`,`k`.`taille` AS `capacite`,`s`.`qte` AS `quantite` from (((`stock_article` `s` join `article` `a`) join `couleur` `c`) join `capacite` `k`) where `s`.`id_article` = `a`.`id_article` and `s`.`id_couleur` = `c`.`id_couleur` and `s`.`id_capacite` = `k`.`id_capacite` order by `s`.`qte` desc ;

-- --------------------------------------------------------

--
-- Structure de la vue `vue_article_telephone`
--
DROP TABLE IF EXISTS `vue_article_telephone`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vue_article_telephone`  AS  select `a`.`artdesc` AS `artdesc`,`a`.`marque` AS `marque`,`c`.`couleur` AS `couleur`,`k`.`taille` AS `capacite`,`s`.`qte` AS `quantite` from (((`stock_article` `s` join `article` `a`) join `couleur` `c`) join `capacite` `k`) where `s`.`id_article` = `a`.`id_article` and `s`.`id_couleur` = `c`.`id_couleur` and `s`.`id_capacite` = `k`.`id_capacite` and `a`.`marque` = 'telephone' order by `s`.`qte` desc ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `apartient`
--
ALTER TABLE `apartient`
  ADD KEY `commande_id` (`commande_id`),
  ADD KEY `id_article` (`id_article`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `id_fournisseur` (`id_fournisseur`);

--
-- Index pour la table `boutique`
--
ALTER TABLE `boutique`
  ADD PRIMARY KEY (`id_boutique`);

--
-- Index pour la table `capacite`
--
ALTER TABLE `capacite`
  ADD PRIMARY KEY (`id_capacite`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`commande_id`),
  ADD KEY `facid` (`facid`),
  ADD KEY `id_livraison` (`id_livraison`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `couleur`
--
ALTER TABLE `couleur`
  ADD PRIMARY KEY (`id_couleur`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`facid`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_fournisseur`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`id_livraison`),
  ADD KEY `id_type` (`id_type`);

--
-- Index pour la table `livrer`
--
ALTER TABLE `livrer`
  ADD KEY `id_livraison` (`id_livraison`),
  ADD KEY `id_boutique` (`id_boutique`);

--
-- Index pour la table `stock_article`
--
ALTER TABLE `stock_article`
  ADD KEY `id_capacite` (`id_capacite`),
  ADD KEY `id_couleur` (`id_couleur`),
  ADD KEY `id_article` (`id_article`);

--
-- Index pour la table `type_livraison`
--
ALTER TABLE `type_livraison`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `boutique`
--
ALTER TABLE `boutique`
  MODIFY `id_boutique` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `capacite`
--
ALTER TABLE `capacite`
  MODIFY `id_capacite` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `commande_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `couleur`
--
ALTER TABLE `couleur`
  MODIFY `id_couleur` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `facid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_fournisseur` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `id_livraison` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `type_livraison`
--
ALTER TABLE `type_livraison`
  MODIFY `id_type` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index', AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `apartient`
--
ALTER TABLE `apartient`
  ADD CONSTRAINT `apartient_ibfk_1` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`commande_id`),
  ADD CONSTRAINT `apartient_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`);

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseur` (`id_fournisseur`);

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `livraison_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type_livraison` (`id_type`);

--
-- Contraintes pour la table `livrer`
--
ALTER TABLE `livrer`
  ADD CONSTRAINT `livrer_ibfk_1` FOREIGN KEY (`id_livraison`) REFERENCES `livraison` (`id_livraison`),
  ADD CONSTRAINT `livrer_ibfk_2` FOREIGN KEY (`id_boutique`) REFERENCES `boutique` (`id_boutique`);

--
-- Contraintes pour la table `stock_article`
--
ALTER TABLE `stock_article`
  ADD CONSTRAINT `stock_article_ibfk_1` FOREIGN KEY (`id_capacite`) REFERENCES `capacite` (`id_capacite`),
  ADD CONSTRAINT `stock_article_ibfk_2` FOREIGN KEY (`id_couleur`) REFERENCES `couleur` (`id_couleur`),
  ADD CONSTRAINT `stock_article_ibfk_3` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
