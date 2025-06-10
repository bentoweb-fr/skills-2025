-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le : ven. 23 mai 2025 à 07:42
-- Version du serveur : 8.0.39
-- Version de PHP : 8.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `skills2025`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20250430122213', '2025-05-06 14:29:21', 1523),
('DoctrineMigrations\\Version20250506143401', '2025-05-06 14:34:26', 150);

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

CREATE TABLE `project` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int NOT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci,
  `long_description` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `project`
--

INSERT INTO `project` (`id`, `title`, `year`, `short_description`, `long_description`) VALUES
(3, 'Silvernet', 2007, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum cumque reiciendis voluptatibus vero facilis quasi debitis, perspiciatis beatae quidem suscipit alias omnis asperiores nesciunt quod, id optio amet nam vel.', NULL),
(4, 'Altimax', 2011, 'Je découvre le concept de CMS avec Joomla et je suis initié au MVC.\r\nJe continue principalement mon travail sur le front-end et je commence à découvrir le principe de CSS responsive', NULL),
(5, 'Reputation Squad', 2013, 'Je rejoins l\'antenne rennaise de cette entreprise parisienne et j\'y apprends WordPress et le développement de thèmes sur-mesure.', 'La philosophie est de viser les meilleures performances possibles en s\'évitant la lourdeur des thèmes trop polyvalents, et de permettre une gestion simple du contenu.\r\nJe développe ma connaissance des outils de build CSS et JS (minification, concaténation) et le SASS.\r\nJe fais fortement évoluer ma pratique et ma connaissance de l\'interface responsive.\r\nJe découvre également l\'approche UX.'),
(6, 'Addviso', 2018, 'Je rejoins l\'agence rennaise pour du WordPress et du Drupal. Je nourris mes connaissance en bonnes pratiques front et back, et j\'applique les concepts MVC.', NULL),
(7, 'Cyru.fr', 2020, 'Dans une période de ralentissement de mon activité, j\'y ai vu l\'opportunité d\'explorer un autre de mes centes d\'intérêt et de me plonger entièrement dans la photographie pendant quelques mois.', 'Je partais quasiment de rien. J\'avais à peine entendu parler du principe de triangle d\'exposition. Je me suis donc mis en quête d\'un maximum de ressources et de connaissances simplement et librement accessibles, en commençant par une dizaine de chaînes Youtube de vulgarisation par des photographes très sympathiques.'),
(8, 'bentoweb.fr v1', 2022, 'Je construit ma présence en ligne à travers un site à la navigation atypique mais simple. C\'est l\'occasion de voir si je peux proposer une expérience différente tout en respectant les bonnes pratiques de performance, de compatibilité et d\'UX.', NULL),
(9, 'L’Orchestre National de Bretagne : onb.fr', 2022, 'Dans le cadre de modernisation de son image, l’Orchestre National de Bretagne a besoin d’un site internet moderne, pour toucher également les jeunes générations. L’interface est construite sur mesure d’après un design créatif et reflétant les axes de communication de l’ONB. Il faut également intégrer de nombreux médias : photos, vidéos, podcasts et autres contenus propres à l’univers de la musique. De plus, un accès privé doit être mis à disposition des musiciens.', 'Le besoin en gestion autonome du contenu est parfaitement en adéquation avec un WordPress, sur lequel un thème sur-mesure est implanté de manière à fournir notamment de bonnes performances SEO.\r\n\r\nObjectif 1 : Le SEO\r\nLe terme “ONB” est utilisé par bien d’autres organismes. Il faut donc gagner suffisamment de points pour ressortir dans les premiers résultats sur cette expression de recherche.\r\nPour y parvenir, plusieurs méthodes sont en oeuvre :\r\n- Les microdata schema.org\r\n- Un responsive efficace\r\n- Un site performant\r\n- Une mise à jour régulière avec du contenu pertinent\r\n- Une construction HTML respectueuse des bonnes pratiques\r\n\r\nObjectif 2 : Les médias\r\nIntégrer une certaine variété de médias de façon harmonieuse peut présenter quelque défi.\r\n\r\nObjectif 3 : L’accès privé\r\nIl faut permettre de sécuriser l’accès à certains contenus du site tout en conservant de la simplicité et de la légèreté. Mettre un mot de passe devant une page web ne suffit pas. Il faut également sécuriser les liens vers les documents, par exemple des PDF, qui pourraient se retrouver transmis par le web ou référencés par des moteurs de recherche.\r\n\r\nObjectif 4 : La mise en page particulière\r\nLe design graphique présente des caractéristiques inédites de défilements synchonisés, d’éléments fixes chevauchant d’autres mobiles, des niveaux de transparence, qui peuvent compliquer le travail d’un développeur front lorsqu’il s’attaque aux parties cliquables, les niveaux de z-index et les conséquences en responsive.\r\n\r\nPeut mieux faire :\r\n- Les médias\r\n- Bien que l’intégration soit plutôt satisfaisante, des éléments d’UI pourraient améliorer l’expérience utilisateur.'),
(10, 'E-commerce Sterenn', 2022, 'Je suis recruté directement par le client final qui souhaite s’approprier le site e-commerce développé par une agence, afin de le maintenir et le faire évoluer en interne. Cette stratégie est clairement définie dès le départ, et l’agence doit former les développeurs pour cet objectif.', 'Sterenn est un groupe qui mise sur ses filiales B2B spécialisées pour faire bénéficier à ses clients d’expertises dans le domaine du matériel et de la pièce mécanique agricole, et tout ce qui gravite un peu autour de l’équipement de jardinage, paysagisme...\r\nChaque filiale doit posséder son propre site e-commerce, chacun basé sur une plateforme commune.\r\n\r\nObjectif 1 : La tech stack\r\nCette nouvelle mission est l’un de mes plus grands défi, déjà par le fait que je connais peu ou pas du tout la majorité des outils utilisés :\r\nSymfony et tout son écosystème\r\nVue\r\nBootstrap\r\nPostgreSQL\r\nLinux (Ubuntu)\r\nVSCode\r\nDocker\r\nAnsible\r\nCI/CD Gitlab\r\nTests automatisés\r\n\r\nJ’apporte bien sûr mon expérience et ma connaissance général du web, mais ma montée en compétence sur la plupart des outils prend du temps. Je complète donc les formations déjà prévues par d’autres formations qui me semblent utiles, comme la reprise des bases sur la POO en PHP et l’autoloading de classes, et globalement à propos de tous les outils de la liste.\r\nJ’en profite aussi pour m’initier aux principes DevOps et je travaille sur des petits projets en parallèle pour mieux m’approprier toutes ces notions.\r\n\r\nObjectif 2 : L’historique de l’entreprise\r\nToute l’orientation technique e-commerce s’articule autour des processus et principes déjà utilisés par l’entreprise et ses filiales. Le nombre des filiales spécialisées et la grande variété de références en fait un monde à s’approprier bien plus riche et complexe que tous mes projets précédents.\r\n\r\nObjectif 3 : Le mental\r\nSe retrouver en partie responsable de la maintenance et de l’évolution d’un e-commerce générant un tel volume de ventes met une certaine pression lorsqu’on se considère encore “novice” sur certaines des technologies utilisées. Il est alors important de connaître ses limites et d’avoir une certaine conscience de sa propre progression.'),
(11, 'Tasks', 2024, 'Tasks est un side project destiné autant à expérimenter et monter en compétences qu\'à proposer une solution d\'organisation maison pour la gestion de projet et de tâches au plus proche de nos besoins en interne, sans dépenser des milliers d\'euros par an en abonnement Monday, Wrike ou autre.', 'Un des objectif est de construire une application qui peut fonctionner sans devoir recharger la page pour voir les modifications par les autres utilisateurs, tout ça en temps réel. Techniquement, ça se traduit par un back Node et un front Vue, avec une communication principalement par websockets.\r\nL\'interface doit rester aussi simple que possible et limitée aux fonctionnalités utilisées.\r\nUne des particularités notables est certainement la distinction entre les tickets de demandes et les tickets de production.'),
(12, 'bentoweb.fr v2', 2025, 'Pour faire d\'une pierre deux coups, je profite du besoin de rafraîchir ma présence en ligne pour mettre en oeuvre une stack technique qui m\'intéresse et pour laquelle je peux m\'appuyer sur mes avancées de ces dernières années.', 'Je mets donc en place un site headless avec Vue+Vite, relié à un Symfony via API.\r\nC\'est aussi l\'occasion de mettre en place mon premier \"vrai\" serveur maison pour héberger mes sites et applications, et me défaire de mes abonnements OVH et Gandi. Je consolide donc mon profil \"full stack\" en ayant une certaine compréhension et une certaine maîtrise (toute relative, j\'en ai bien conscience) de la stack web globale.\r\nKubernetes est sur ma TODO, mais c\'est certainement prématuré et pas forcément pertinent pour le moment.');

-- --------------------------------------------------------

--
-- Structure de la table `project_technology`
--

CREATE TABLE `project_technology` (
  `project_id` int NOT NULL,
  `technology_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `project_technology`
--

INSERT INTO `project_technology` (`project_id`, `technology_id`) VALUES
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(4, 4),
(4, 5),
(4, 7),
(11, 4);

-- --------------------------------------------------------

--
-- Structure de la table `technology`
--

CREATE TABLE `technology` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `technology`
--

INSERT INTO `technology` (`id`, `name`) VALUES
(4, 'JavaScript'),
(5, 'CSS'),
(6, 'HTML'),
(7, 'Front-end'),
(9, 'Symfony'),
(10, 'Vue'),
(11, 'WordPress'),
(12, 'CI/CD'),
(13, 'Node.js'),
(14, 'SASS');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(2, 'benoit@bentoweb.fr', '[\"ROLE_ADMIN\"]', '$2y$13$cKH8gmM.ohrSeM9/Y6sz2O6wHmwOVnvIwLj/erCSnsbdGkBeC6N0.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `project_technology`
--
ALTER TABLE `project_technology`
  ADD PRIMARY KEY (`project_id`,`technology_id`),
  ADD KEY `IDX_ECC5297F166D1F9C` (`project_id`),
  ADD KEY `IDX_ECC5297F4235D463` (`technology_id`);

--
-- Index pour la table `technology`
--
ALTER TABLE `technology`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `project`
--
ALTER TABLE `project`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `technology`
--
ALTER TABLE `technology`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `project_technology`
--
ALTER TABLE `project_technology`
  ADD CONSTRAINT `FK_ECC5297F166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_ECC5297F4235D463` FOREIGN KEY (`technology_id`) REFERENCES `technology` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
