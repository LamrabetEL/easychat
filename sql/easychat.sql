-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 17 août 2018 à 18:30
-- Version du serveur :  10.1.28-MariaDB
-- Version de PHP :  5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `easychat`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `message` text NOT NULL,
  `creationDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `userId`, `message`, `creationDate`) VALUES
(1, 2, 'Salut les amis ', '2018-07-15 01:25:50'),
(2, 2, 'y a qq 1 ? ', '2018-07-15 02:26:35'),
(3, 1, 'oh', '2018-07-15 03:26:45'),
(4, 3, 'kkk', '2018-07-28 15:12:50'),
(7, 0, '', '0000-00-00 00:00:00'),
(8, 0, '', '0000-00-00 00:00:00'),
(9, 0, '', '0000-00-00 00:00:00'),
(10, 4, 'dede', '0000-00-00 00:00:00'),
(11, 4, 'voila c\'est un system de char tres tres simple a utiliser', '0000-00-00 00:00:00'),
(12, 4, 'je vais aimer l\'utiliser', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `isConnected` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `isConnected`) VALUES
(1, 'Mehdi', '$2y$10$zYoEJyQHgmfwCl.Iw24Et.zxyLpa/8goUFWMx/trgEAlWqFrv1UmW', 0),
(2, 'admin', '13d78dac7eea692d57ba98d1858cb5a9', 0),
(3, 'Test', '$2y$10$/kCsx1DGZ7TwdwmhjUUubOVX73D8VYSkk5dunG7eCpcLte0RasWlq', 0),
(4, 'elamrabet', '$2y$10$n2A0YvA/ETEDQoTv9TGWC.QN.nU7YECjbpHjXHd1.ANuD3nzWcNgW', 0),
(5, 'elamrabet1', '$2y$10$hFGjeqmOG.fOPHhCk6EW7OUgFxpvES0KgbPGjI5lqrQ.2WoUgKG1O', 0),
(6, 'mpro', '$2y$10$m3tem0ABj30wM2KCOx4.2OrypQvWnPiPS950k4d.TuDI7aIEobinG', 0),
(7, 'test1', '$2y$10$ktQzPgVJ.qeBVktqDsY6xOppXTQG0sVdR9FHTDAj68TTr2uyq2sra', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
