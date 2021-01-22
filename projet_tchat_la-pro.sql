-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 22 jan. 2021 à 11:49
-- Version du serveur :  10.1.47-MariaDB-0+deb9u1
-- Version de PHP : 7.0.33-0+deb9u10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet tchat_la-pro`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `problème` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `image_Post`
--

CREATE TABLE `image_Post` (
  `id_image` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `Lien` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_message`, `id_user`, `message`, `date`) VALUES
(58, 9, 'salut les copain\r\n', '2021-01-14 12:23:48'),
(59, 10, 'Bien ou bien', '2021-01-14 12:24:59'),
(60, 9, 'ça va, venez ont va sur FORTNITE\r\n', '2021-01-14 12:25:22'),
(61, 10, 'Go 1v1', '2021-01-14 12:25:34'),
(62, 11, 'bonsoir\r\n', '2021-01-14 12:26:38'),
(65, 11, 'je vous prend tous ', '2021-01-14 12:27:06'),
(66, 9, 'va faire la cuisine bordel de merde !', '2021-01-14 12:27:16'),
(68, 6, 'yo les mec\r\n', '2021-01-14 12:27:49'),
(104, 11, 'venez ', '2021-01-15 10:43:33'),
(105, 11, 'gang bang', '2021-01-15 10:44:12'),
(106, 14, 'venez quoi ?', '2021-01-15 10:49:44'),
(115, 9, 'yolo\r\n\r\n', '2021-01-19 17:42:54'),
(116, 14, 'cc\r\n', '2021-01-19 17:43:08'),
(117, 9, 'hey', '2021-01-19 17:43:22'),
(118, 14, 'xd sa marchhe\r\n', '2021-01-19 17:43:28'),
(119, 9, 'oui', '2021-01-19 17:43:34'),
(120, 11, 'yo', '2021-01-19 17:43:41'),
(121, 14, 'trop bien\r\n', '2021-01-19 17:43:45'),
(122, 14, 'yo\r\n', '2021-01-19 17:43:51'),
(123, 9, 'ça marche', '2021-01-19 17:43:53'),
(124, 11, 'yyyy', '2021-01-19 17:45:39'),
(125, 14, 'yo\r\n', '2021-01-20 12:38:39'),
(126, 14, 'comment va', '2021-01-20 12:38:54'),
(127, 14, 'kk\r\n', '2021-01-20 13:17:23'),
(128, 9, 'salope', '2021-01-20 13:17:48'),
(129, 9, 't\'a vu ça louis', '2021-01-20 13:18:00'),
(135, 11, 'tcheker moi sa la rafale', '2021-01-20 13:29:19'),
(136, 14, 'xd', '2021-01-20 13:44:05'),
(137, 9, 'XD \r\nT\'est folle meuf', '2021-01-20 13:45:00'),
(138, 11, 'je suce\r\n', '2021-01-20 13:45:12'),
(139, 9, 'voir ton pote ça t\'arrange pas le cerveaux\r\n', '2021-01-20 13:45:37'),
(140, 11, 'c\'est jérremy soccupe de vous sucero)\r\n', '2021-01-20 13:46:03'),
(141, 16, 'venez gang bang', '2021-01-20 13:46:24'),
(142, 11, 'il aime sa', '2021-01-20 13:46:29'),
(143, 16, 'ouais', '2021-01-20 13:46:35'),
(144, 16, 'trop', '2021-01-20 13:46:42'),
(145, 11, 'c\'est jérremy soccupe de vous sucero)\r\n', '2021-01-20 13:46:57'),
(146, 16, 'je m\'appelle léa et j\'aime les bites', '2021-01-20 13:47:09'),
(147, 11, 'voler d\'identier\r\n', '2021-01-20 13:47:27'),
(148, 11, 'idententiter', '2021-01-20 13:47:42'),
(149, 16, 'non ', '2021-01-20 13:47:47'),
(150, 11, 'j aime les chatte', '2021-01-20 13:47:55'),
(151, 16, 'bien humide', '2021-01-20 13:48:08'),
(152, 14, 'sensurer', '2021-01-20 13:48:08'),
(153, 11, 'ouai tes chiant mec\r\n', '2021-01-20 13:48:29'),
(157, 14, 'pd kiki\r\n', '2021-01-20 14:09:01'),
(158, 8, 'dans ton cul louis\r\n', '2021-01-20 14:09:33'),
(173, 17, 'yo\r\n', '2021-01-22 10:32:09'),
(174, 18, 'bande de merde', '2021-01-22 10:35:21');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prénom` varchar(50) NOT NULL,
  `Pseudo` varchar(50) NOT NULL,
  `Mdp` varchar(50) NOT NULL,
  `logo` text NOT NULL,
  `ADMIN` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `Nom`, `Prénom`, `Pseudo`, `Mdp`, `logo`, `ADMIN`) VALUES
(8, 'admin', 'admin', 'admin', '123456789', 'logo/logo.png', 'true'),
(9, 'Lolo', 'cauet', 'miamotron', '1234', 'logo/20200908_231531.jpg', 'false'),
(10, 'Boucher', 'Louis', 'Louisonfire', 'weshlesgars', 'logo/base.jpg', 'true'),
(11, 'bernard', 'léa', 'la main', 'lea', 'logo/1f30af1b3370aaf2ba3de413bbaf8783.jpg', 'false'),
(14, 'duval', 'kylian', 'kiki200278', '123', 'logo/base.jpg', 'false'),
(17, 'jo', 'jo', 'mangetasoupe', '1234', 'logo/base.jpg', 'false'),
(18, 'qsdqsd', 'qsdqsd', 'lucas', '123', 'logo/base.jpg', 'false');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Index pour la table `image_Post`
--
ALTER TABLE `image_Post`
  ADD PRIMARY KEY (`id_image`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `image_Post`
--
ALTER TABLE `image_Post`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
