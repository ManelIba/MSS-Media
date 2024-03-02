-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 02 mars 2024 à 11:21
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `social_media`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `Comment_Id` int(100) NOT NULL,
  `Post_ID` int(100) NOT NULL,
  `Content` text NOT NULL,
  `creat_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`Comment_Id`, `Post_ID`, `Content`, `creat_at`) VALUES
(46, 46, 'yes you are right \r\n', '2024-03-02 10:10:17'),
(47, 48, 'keep going...\r\n', '2024-03-02 10:10:54'),
(48, 48, 'amazing ', '2024-03-02 10:11:15');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `likes_id` int(100) NOT NULL,
  `Post_Id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`likes_id`, `Post_Id`) VALUES
(28, 46),
(29, 46),
(30, 46),
(31, 46),
(32, 47),
(33, 47),
(34, 48),
(35, 48),
(36, 46);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `Post_Id` int(100) NOT NULL,
  `User_ID` int(100) NOT NULL,
  `Content` text NOT NULL,
  `ContentIMG` varchar(255) NOT NULL,
  `creat_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`Post_Id`, `User_ID`, `Content`, `ContentIMG`, `creat_at`) VALUES
(46, 61, ' Character is the greatest quality of a person. It has been rightly said: “If wealth is lost, nothing is lost; if health is lost, something is lost; but if the character is lost, everything is lost.” Character depends upon training. Training starts from the cradle and ends in the grave. Character means virtuous habits and qualities', './assets/', '2024-03-02 10:01:45'),
(47, 61, ' The moon, the stars, snow-capped hills, rivers, lakes, and budding flowers are the object of nature. These objects comprise the beauties of nature. Nature is beautiful everywhere. She is marvelously beautiful on the top of the mountain. She is mysteriously beautiful on the bed of the sea. The sunrise presents the loveliest scene.', './assets/summer.jpg', '2024-03-02 10:04:02'),
(48, 61, ' Mountaineering has become quite fashionable. Ever since, the conquest of Mount Everest by Hillary and Tenzing, many young people have taken to this sport. Parties of adventurers go trekking across the Himalayan ranges to scale various peaks.', './assets/succes.jfif', '2024-03-02 10:09:23'),
(49, 61, ' ', './assets/nature.jfif', '2024-03-02 10:09:50');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `User_Id` int(255) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PassWord` varchar(255) NOT NULL,
  `Birthdate` date NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Admin` tinyint(1) NOT NULL,
  `Bio` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`User_Id`, `UserName`, `Email`, `PassWord`, `Birthdate`, `Location`, `Admin`, `Bio`, `created_at`, `img`) VALUES
(1, 'Administratore', 'Admin@gmail.com', '12345', '1960-04-22', 'algeria', 1, 'je suie l Administrateur', '2024-03-02 09:45:56', './assets/images.png'),
(61, 'alex', 'alex@gmail.com', '55555', '2006-03-02', 'uk', 0, 'hello i am Alex', '2024-03-02 09:53:46', './assets/ayeman.jpg'),
(62, 'david', 'david@gmail.com', '123456789', '2003-04-03', 'France', 0, 'hello i am david', '2024-03-02 11:07:25', './assets/téléchargement (1).jfif'),
(63, 'djohn', 'djohn@gmail.com', '123', '2001-04-02', 'uk', 0, 'hello i am Djohn', '2024-03-02 10:43:01', './assets/haker.jfif');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD UNIQUE KEY `Comment_Id` (`Comment_Id`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD UNIQUE KEY `likes_id` (`likes_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD UNIQUE KEY `Post_Id` (`Post_Id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `User_Id` (`User_Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `Comment_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `likes_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `Post_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
