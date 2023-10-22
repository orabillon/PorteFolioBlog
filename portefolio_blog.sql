-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 22 oct. 2023 à 13:14
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `portefolio_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date_creation` date NOT NULL DEFAULT current_timestamp(),
  `date_update` date NOT NULL DEFAULT current_timestamp(),
  `published` tinyint(1) NOT NULL DEFAULT 0,
  `id_category` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `content`, `date_creation`, `date_update`, `published`, `id_category`, `title`, `description`) VALUES
(1, 'L\'Égypte, cette terre envoûtante qui a captivé l\'imagination des voyageurs depuis des siècles, est bien plus qu\'une simple destination touristique. C\'est un voyage dans le temps, une immersion dans l\'histoire ancienne et une expérience culturelle unique. Dans cet article, nous allons vous emmener à la découverte des trésors millénaires de l\'Égypte, à travers les pyramides majestueuses, les temples mystérieux et les rives légendaires du Nil.<br><br>\r\n<b>Les Pyramides de Gizeh : Un chef-d\'œuvre architectural</b><br><br>\r\nNotre périple débute inévitablement par les pyramides de Gizeh, l\'une des sept merveilles du monde antique et un symbole emblématique de l\'Égypte. Ces monuments grandioses, construits il y a plus de 4 000 ans, continuent d\'émerveiller les visiteurs par leur taille imposante et leur ingéniosité architecturale. Vous pourrez explorer les pyramides de Khéops, Khéphren et Mykérinos, ainsi que le majestueux Sphinx, gardien silencieux de ces trésors antiques.<br><br>\r\n<b>La vallée des rois : Les tombeaux des pharaons</b><br><br>\r\nEn poursuivant notre voyage, nous nous rendons à Louxor, où se trouve la vallée des rois. Cet endroit mystique abrite les tombes de nombreux pharaons, dont Toutankhamon. Vous aurez l\'occasion de descendre dans les profondeurs de la terre pour explorer ces tombes richement décorées, où les hiéroglyphes et les fresques murales racontent l\'histoire de l\'Égypte ancienne.<br><br>\r\n<b>Les temples majestueux de Louxor et Karnak</b><br><br>\r\nÀ Louxor, vous découvrirez également les temples majestueux de Louxor et Karnak. Ces monuments imposants vous transporteront dans le temps, avec leurs colonnes monumentales, leurs obélisques et leurs statues impressionnantes. Le temple de Karnak, en particulier, est un chef-d\'œuvre de l\'architecture égyptienne antique, avec son impressionnante allée de sphinx et son immense salle hypostyle.<br><br>\r\n<b>Croisière sur le Nil : Une expérience inoubliable</b><br><br>\r\nPour une expérience vraiment inoubliable, ne manquez pas de prendre une croisière sur le Nil. Vous naviguerez sur les eaux légendaires du fleuve qui a nourri l\'Égypte pendant des millénaires, en passant par de charmants villages, des temples cachés et des paysages à couper le souffle. C\'est l\'occasion idéale pour vous détendre, tout en découvrant la vie quotidienne des Égyptiens le long du fleuve.<br><br>\r\n<b>Le trésor de l\'Égypte moderne : Le Caire</b><br><br>\r\nEnfin, terminez votre voyage en Égypte en explorant la capitale, Le Caire. Vous pourrez visiter le célèbre musée égyptien, qui abrite une incroyable collection d\'antiquités, y compris les trésors de Toutankhamon. N\'oubliez pas de vous aventurer dans la vieille ville, où les rues étroites et les marchés animés vous plongeront dans l\'ambiance authentique de l\'Égypte.<br><br>\r\n<b>Conclusion</b><br><br>\r\nUn voyage en Égypte est bien plus qu\'une simple escapade touristique. C\'est une aventure dans l\'histoire, la culture et la beauté de l\'Égypte ancienne. Que vous soyez fasciné par les pyramides majestueuses, les temples mystérieux ou les rives du Nil, l\'Égypte ne manquera pas de vous enchanter et de vous laisser des souvenirs inoubliables. Alors, préparez vos bagages et partez à la découverte de ce joyau de l\'histoire du monde.', '2023-10-06', '2023-10-06', 1, 2, 'L\'Egypte', 'À la découverte des trésors millénaires de l\'Égypte : Un voyage inoubliable'),
(2, 'Le Japon, ce pays fascinant où la tradition millénaire se marie harmonieusement avec la modernité, est une destination de rêve pour les voyageurs du monde entier. Dans cet article, nous vous invitons à découvrir la beauté du Japon, à travers ses temples anciens, ses jardins paisibles, sa cuisine exquise et ses innovations technologiques.<br><br>\r\n<b>Kyoto : Le cœur de la tradition japonaise</b><br><br>\r\nNotre voyage commence à Kyoto, la capitale culturelle du Japon. Cette ville pittoresque est célèbre pour ses temples et ses jardins traditionnels. Vous pourrez visiter le temple d\'or, le temple Kinkaku-ji, avec sa façade dorée scintillante qui se reflète dans un étang paisible. N\'oubliez pas de vous promener dans les ruelles de Gion, le quartier des geishas, où le charme de l\'ancien Japon est omniprésent.<br><br>\r\n<b>Tokyo : L\'effervescence de la mégalopole</b><br><br>\r\nDe Kyoto, nous nous dirigeons vers Tokyo, la capitale moderne du Japon. Cette mégapole dynamique est le reflet de la vie urbaine trépidante du pays. Vous pourrez explorer des quartiers tels que Shibuya, Harajuku et Akihabara, qui sont le cœur de la culture pop japonaise. Assurez-vous de visiter le marché aux poissons de Tsukiji pour déguster des sushis frais et délicieux.<br><br>\r\n<b>Hiroshima : Un rappel poignant de l\'histoire</b><br><br>\r\nUn voyage au Japon ne serait pas complet sans une visite à Hiroshima, où vous pourrez découvrir le Mémorial de la Paix d\'Hiroshima et son musée poignant. C\'est un endroit pour réfléchir sur les horreurs de la guerre et la résilience du peuple japonais.<br><br>\r\n<b>Les jardins japonais : Havres de paix</b><br><br>\r\nPartout au Japon, vous trouverez des jardins japonais sereins, conçus avec une précision artistique. Les jardins de pierres de Ryoan-ji à Kyoto, les jardins de thé à Tokyo, et les jardins zen à travers le pays vous offriront une pause apaisante dans votre voyage.<br><br>\r\n<b>La technologie de pointe : Une autre facette du Japon</b><br><br>\r\nLe Japon est également connu pour ses innovations technologiques. À Tokyo, visitez le quartier d\'Akihabara pour découvrir les dernières avancées en matière de gadgets électroniques. N\'oubliez pas de faire un voyage futuriste au musée Miraikan, où les robots et les technologies de pointe vous étonneront.<br><br>\r\n<b>Conclusion</b><br><br>\r\nUn voyage au Japon est une expérience inoubliable, une immersion dans une culture riche en histoire et en tradition, tout en étant à la pointe de la modernité. Que vous soyez fasciné par les temples anciens, la cuisine exquise, la technologie de pointe ou la beauté naturelle du pays, le Japon vous offrira une aventure inoubliable. Alors, préparez-vous à explorer ce pays envoûtant et à créer des souvenirs qui dureront toute une vie.', '2023-10-06', '2023-10-06', 1, 2, 'Le Japon', 'À la découverte de la beauté et de la tradition du Japon : Un voyage inoubliable'),
(3, 'Il n\'y a rien de plus ressourçant qu\'une après-midi passée à parcourir les bois. Loin de l\'agitation de la vie quotidienne, la forêt offre un refuge naturel où l\'on peut se reconnecter avec la nature, se détendre et découvrir des trésors cachés. Dans cet article, nous allons explorer les joies et les bienfaits d\'une après-midi à se perdre dans les bois.<br><br>\r\n<b>Le Bien-être au Contact de la Nature</b><br><br>\r\nLorsque l\'on pénètre dans la forêt, on se trouve immédiatement immergé dans un monde de verdure, de tranquillité et de vie sauvage. L\'air frais et pur de la forêt, imprégné de l\'odeur de la terre, des arbres et des fleurs, a un effet apaisant sur l\'esprit. Les bruits de la nature, tels que le chant des oiseaux et le murmure du vent dans les feuilles, agissent comme une mélodie naturelle qui calme les sens.<br><br>\r\n<b>La Découverte de la Faune et de la Flore</b><br><br>\r\nL\'une des plus grandes joies de se promener dans les bois est la possibilité d\'observer la faune et la flore locales. Vous pourriez croiser le chemin d\'animaux sauvages, comme des cerfs, des lapins, ou même des écureuils. Les amateurs d\'ornithologie peuvent repérer une multitude d\'oiseaux, chacun avec son propre chant mélodieux. Et n\'oublions pas la diversité des plantes, des champignons aux fleurs sauvages, qui embellissent le paysage forestier.<br><br>\r\n<b>La Relaxation et la Méditation</b><br><br>\r\nSe perdre dans les bois peut être une forme de méditation en mouvement. La marche lente à travers les sentiers forestiers permet de se recentrer et de se libérer du stress. L\'ambiance paisible de la forêt encourage la contemplation, la réflexion et le lâcher-prise. Beaucoup de gens trouvent que c\'est l\'endroit idéal pour méditer, se ressourcer mentalement et se reconnecter avec eux-mêmes.<br><br>\r\n<b>L\'Exploration et l\'Aventure</b><br><br>\r\nChaque promenade en forêt est une aventure en soi. Les chemins sinueux vous invitent à explorer, à voir ce qui se cache derrière la prochaine colline ou au détour du prochain sentier. C\'est une opportunité de sortir de sa zone de confort, d\'apprendre à lire les indices de la nature et de développer un sens aigu de l\'orientation.<br><br>\r\n<b>Le Respect de l\'Environnement</b><br><br>\r\nEn parcourant les bois, nous renforçons également notre connexion avec la nature et notre désir de la préserver. En prenant conscience de la beauté et de la fragilité de l\'écosystème forestier, nous devenons souvent des défenseurs plus déterminés de l\'environnement, prêts à contribuer à sa préservation.<br><br>\r\n<b>Conclusion</b><br><br>\r\nEn somme, une après-midi à parcourir les bois est une expérience revitalisante pour le corps et l\'esprit. C\'est une pause bienvenue dans nos vies bien remplies, un moment pour se reconnecter avec la nature, se détendre et se recentrer. Alors, enfilez vos chaussures de randonnée, prenez votre sac à dos, et partez à la découverte de la splendeur de la forêt. Vous ne tarderez pas à découvrir que les bois ont beaucoup à offrir à ceux qui prennent le temps de les explorer.', '2023-10-06', '2023-10-06', 1, 1, 'Les bois', 'L\'Art de Passer une Après-midi à Parcourir les Bois');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `date_creation` date NOT NULL DEFAULT current_timestamp(),
  `date_update` date NOT NULL DEFAULT current_timestamp(),
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `categorie`, `active`, `date_creation`, `date_update`, `url`) VALUES
(1, 'Divertissement', 1, '2023-10-06', '2023-10-06', 'divertissement'),
(2, 'Voyage', 1, '2023-10-06', '2023-10-06', 'voyage'),
(3, 'Informatique', 1, '2023-10-06', '2023-10-06', 'informatique');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `id_project` int(11) DEFAULT NULL,
  `id_article` int(11) DEFAULT NULL,
  `image` text NOT NULL,
  `BaseImageName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `id_project`, `id_article`, `image`, `BaseImageName`) VALUES
(1, NULL, 1, 'Egypte1.jpg', 'Egypte1.jpg'),
(2, NULL, 1, 'Egypte2.jpg', 'Egypte2.jpg'),
(3, NULL, 2, 'Japon1.jpg', 'Japon1.jpg'),
(4, NULL, 2, 'Japon2.jpg', 'Japon2.jpg'),
(5, NULL, 2, 'Japon3.jpg', 'Japon3.jpg'),
(6, NULL, 3, 'Forest1.jpg', 'Forest1.jpg'),
(7, NULL, 3, 'Forest2.jpg', 'Forest2.jpg'),
(8, NULL, 3, 'Forest3.jpg', 'Forest3.jpg'),
(9, 3, NULL, 'bitly.png', 'bitly.png'),
(10, 1, NULL, 'harryPotter.png', 'harryPotter.png'),
(11, 4, NULL, 'netflix.png', 'netflix.png'),
(12, 2, NULL, 'pendu.png', 'pendu.png');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `id_status` int(11) NOT NULL DEFAULT 1,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `message_status`
--

CREATE TABLE `message_status` (
  `id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `message_status`
--

INSERT INTO `message_status` (`id`, `status`) VALUES
(1, 'Nouveau'),
(2, 'Lu');

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_creation` date NOT NULL DEFAULT current_timestamp(),
  `date_update` date NOT NULL DEFAULT current_timestamp(),
  `display` tinyint(1) NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projects`
--

INSERT INTO `projects` (`id`, `name`, `date_creation`, `date_update`, `display`, `description`, `content`) VALUES
(1, 'Harry Poter', '2023-09-01', '2023-10-22', 1, 'Site vitrine Bootstrap 5. ', 'Site vitrine réaliser dans le cadre de la formation Believemy. Il a pour but la démonstration des acquis en développement web. Technologie utilisé : HTML / Bootstrap 5. '),
(2, 'Pendu', '2023-10-11', '2023-10-22', 1, 'Jeu du pendu', 'Jeu de pendu réaliser dans le cadre de la validation du premier projet passerelle de la formation Believemy. Il a pour but la validation des premiers acquis en développement web. Technologie utilisé : HTML / CSS / Javascript. '),
(3, 'bitly', '2023-08-23', '2023-10-22', 1, 'Raccourcir ses URL', 'Site pour raccourcir les URL réaliser dans le cadre de la formation Believemy. Il a pour but la démonstration des acquis en développement web. Technologie utilisé : HTML / PHP. '),
(4, 'Netflix', '2023-10-09', '2023-10-22', 1, 'Espace membre', 'Espace membre à la Netflix réaliser dans le cadre de la validation des acquis de la formation Believemy. Technologie utilisé : HTML / CSS / PHP. ');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_creation` date NOT NULL DEFAULT current_timestamp(),
  `date_update` date NOT NULL DEFAULT current_timestamp(),
  `password` text NOT NULL,
  `blocked` tinyint(1) NOT NULL DEFAULT 0,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `secret` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `date_creation`, `date_update`, `password`, `blocked`, `admin`, `secret`) VALUES
(1, 'Olivier', 'Rabillon', 'olivier.rabillon@gmail.com', '2023-10-06', '2023-10-06', 'aq471cdece319dcc596802561da9cc75f8f1daea52aa27', 0, 1, '6dd390e1deed70c556063001291572b09346adb61697205108'),
(7, 'tom', 'clancy', 'tc.mail@test.fr', '2023-10-18', '2023-10-18', 'aq473d573b540b97cd0a6167fbac7e4a095b2b6cad1a27', 0, 0, '057203f3d043d08f6716ca8bf425c58f17c0b2031697640655'),
(8, 'Thomas', 'Dupuy', 't.d@laposte.net', '2023-10-22', '2023-10-22', 'aq473d573b540b97cd0a6167fbac7e4a095b2b6cad1a27', 0, 0, 'f6e3913714cc195c31f063d0c5414058253570971697205304');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message_status`
--
ALTER TABLE `message_status`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `message_status`
--
ALTER TABLE `message_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
