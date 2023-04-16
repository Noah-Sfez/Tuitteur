-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 16 avr. 2023 à 14:48
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `testtwitter`
--

-- --------------------------------------------------------

--
-- Structure de la table `tweet`
--

CREATE TABLE `tweet` (
  `id_tweet` int NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `date_heure_message` datetime NOT NULL,
  `type` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `image_chemin` varchar(260) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_users` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tweet`
--

INSERT INTO `tweet` (`id_tweet`, `message`, `date_heure_message`, `type`, `image_chemin`, `id_users`) VALUES
(67, 'Et vous ? pour ou contre le 49.3 ?', '2023-04-02 13:07:40', 'Politique', NULL, 28),
(68, 'J\'ai hâte que roland garros reprenne !', '2023-04-02 13:26:36', 'Sport', NULL, 30),
(69, 'Vous avez vu le nouveau Avatar 2 ? Moi toujours pas !', '2023-04-02 14:27:22', 'Cinéma', NULL, 27),
(70, 'J\'ai trop envie d\'aller au concert de Stromae en Juin !!! Mais les places sont toutes prises ...', '2023-04-02 14:28:02', 'Musique', NULL, 31),
(71, 'J\'ai une nouvelle recette de gateau que j\'ai trop envie de tester !!!', '2023-04-02 14:28:48', 'Cuisine', NULL, 31),
(72, 'Il y a une nouvelle exposition d\'art sur le theme de Marvel, j\'aimerai trop la voir !', '2023-04-02 14:29:33', 'Art', NULL, 31),
(76, 'coucou, j\'adore les manifs', '2023-04-07 20:48:14', 'Politique', NULL, 28),
(89, 'J\'adore regarder Les Reines du Shopping à la télé', '2023-04-09 19:53:42', 'Divertissement', NULL, 30),
(90, 'hate de retourner à disney', '2023-04-09 20:46:01', 'Divertissement', NULL, 36),
(241, 'Mon disney préféré c\'est de loin le roi Lion ! Et vous, lequel vous préférez ?', '2023-04-15 13:16:54', 'Cinéma', './stockfile/image_8ce8d7f0.jpeg', 35),
(242, 'Voici une montre que j\'avais réalisé en 3D pour le Hackathon dans mon école ', '2023-04-15 13:17:31', 'Art', './stockfile/montre cuir good version.gif', 35),
(244, 'C\'est quoi votre genre de musique préféré ? Moi c\'est clairement la Pop', '2023-04-15 13:19:36', 'Musique', './stockfile/', 35),
(246, 'Plutôt pain au chocolat ou chocolatine ? ', '2023-04-16 16:47:52', 'Cuisine', './stockfile/', 35);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_users` int NOT NULL,
  `pseudo` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `mail` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `mdp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_photo` varchar(150) COLLATE utf8mb4_general_ci DEFAULT 'https://picsum.photos/100/100',
  `date_de_naissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `pseudo`, `prenom`, `nom`, `mail`, `mdp`, `user_photo`, `date_de_naissance`) VALUES
(24, 'Nono', 'Noah', 'Sfez', 'noah.sfez@icloud.com', '$2y$10$/YFu3cMHE4qelUNO.Z/EH.9SI2RBqlUJWj.Tt94BugZf.eaesvKUG', 'https://picsum.photos/100/100', '2004-04-26'),
(25, 'Carlita', 'Carla', 'De Siqueira', 'carladesiqueira06@gmail.com', '$2y$10$ytcVh5.aVQbImqHKmSMku.ByrXmoeF7s14hmd.Q9w.p.5bfzjl4pm', 'https://picsum.photos/100/100', '2004-05-06'),
(26, 'Phiale', 'Philippe', 'Alves', 'philippe.alves@edu.devinci.fr', '$2y$10$2S8xSzwR47.tYGtD.f920OaLYrXmyZnXbMA35WWVxi45CChNY4kTe', 'https://picsum.photos/100/100', '2004-12-13'),
(27, 'Garzra', 'Flavio', 'Leon', 'flavio.leon@edu.devinci.fr', '$2y$10$ix.yk5GxK/AmSJ79EBc7FOfNTwJWf/5c/P4WWI/5auG6ofa/id52.', 'https://picsum.photos/100/100', '2004-03-20'),
(28, 'Quentyn', 'Quentin', 'Dalat', 'quentin.dalat@gmail.com', '$2y$10$0DglFVi8svBB9n/9Hw8mtO5v.oO5umNb0/BgsOSA/bpkoT1U4W8Hu', 'https://picsum.photos/100/100', '2004-11-13'),
(29, 'Clemar', 'Clement', 'Batonnier', 'clement.batonnier@gmail.com', '$2y$10$02gvlgOEND.Vf2l3n6QvF.6yZ/AEBhkcO4yYSgzkXFwaGxLpZKFTK', 'https://picsum.photos/100/100', '2004-05-24'),
(30, 'Sissou', 'Annabel', 'Sfez', 'annabel.sfez@yahoo.fr', '$2y$10$sf/.M1TrFagFqTlti0dyROBnYMhRpqbrFd.Vy5HmZ4slqZhKohKW2', 'https://picsum.photos/100/100', '1970-09-06'),
(31, 'Benjos', 'Benjamin ', 'Bouilland', 'benjamin.bouilland@edu.devinci.fr', '$2y$10$q3ktEZbopSLiUHB3aDM6y.qpwzbGjsQhW52QtQVDoCUYkKcJDtmlG', 'https://picsum.photos/100/100', '2004-03-21'),
(32, 'JJ', 'Jean-Jacques', 'Zibi', 'jean-jacques.zibi@gmail.com', '$2y$10$OPKRPm5egbImRYnAkZ9kROXQHSl.rOegolIa6UhdnH2JINnfvXqfW', 'https://picsum.photos/100/100', '1955-09-07'),
(33, 'Annasfz78', 'Anna', 'Sfez', 'anna_gozlan@hotmail.com', '$2y$10$p4a4Mvz8kVdvnpDo9P0dhOCDFUUKPdKCXmgy5c6IeD.EJ.rp.7mE2', 'https://picsum.photos/100/100', '1978-07-13'),
(35, 'nono', 'Noah', 'Sfez', 'sfz.noah@gmail.com', '$2y$10$lvm1i911WJjA8t7flx4emuptBv5RcsIOl0GDi35aRT/quBpUXSX0i', 'https://picsum.photos/100/100', '2004-04-26'),
(36, 'salomesfz', 'Salomé', 'Sfez', 'salomesfz01@gmail.com', '$2y$10$FLjuDoSR9Yf9B3U13qLrquREZBRAB1Y7ePoDtG8V4tPd2ROYko2bK', 'https://picsum.photos/100/100', '2002-01-28');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tweet`
--
ALTER TABLE `tweet`
  ADD PRIMARY KEY (`id_tweet`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tweet`
--
ALTER TABLE `tweet`
  MODIFY `id_tweet` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
