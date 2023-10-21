// Creation table
CREATE TABLE `portefolio_blog`.`users` (`id` INT NOT NULL AUTO_INCREMENT , `first_name` VARCHAR(50) NOT NULL , `last_name` VARCHAR(50) NOT NULL , `email` VARCHAR(50) NOT NULL , `date_creation` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , `date_update` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , `password` TEXT NOT NULL , `blocked` BOOLEAN NOT NULL DEFAULT FALSE, `admin` BOOLEAN NOT NULL DEFAULT FALSE, `secret` TEXT NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `portefolio_blog`.`articles` (`id` INT NOT NULL AUTO_INCREMENT, `title` TEXT NOT NULL, `description` TEXT NOT NULL , `content` TEXT NOT NULL , `date_creation` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , `date_update` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , `published` BOOLEAN NOT NULL DEFAULT FALSE, `id_category` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `portefolio_blog`.`comments` (`id` INT NOT NULL AUTO_INCREMENT , `id_user` INT NOT NULL , `id_article` INT NOT NULL , `content` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `portefolio_blog`.`projects` (`id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(50) NOT NULL , `date_creation` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP ,`date_update` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , `display` BOOLEAN NOT NULL DEFAULT FALSE , `description` TEXT NOT NULL , `content` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `portefolio_blog`.`images` (`id` INT NOT NULL AUTO_INCREMENT , `id_project` INT NULL DEFAULT NULL , `id_article` INT NULL DEFAULT NULL , `image` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `portefolio_blog`.`categories` (`id` INT NOT NULL AUTO_INCREMENT , `categorie` VARCHAR(50) NOT NULL, `url` VARCHAR(50) NOT NULL , `active` BOOLEAN NOT NULL DEFAULT TRUE , `date_creation` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , `date_update` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `portefolio_blog`.`message_status` (`id` INT NOT NULL AUTO_INCREMENT , `status` VARCHAR(20) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `portefolio_blog`.`messages` (`id` INT NOT NULL AUTO_INCREMENT , `id_status` INT NOT NULL DEFAULT '1' , `first_name` VARCHAR(50) NOT NULL , `last_name` VARCHAR(50) NOT NULL , `email` VARCHAR(50) NOT NULL , `content` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

// insertion jeu test
INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `date_creation`, `date_update`, `password`, `blocked`, `admin`, `secret`) VALUES (NULL, 'Olivier', 'Rabillon', 'olivier.rabillon@gmail.com', current_timestamp(), current_timestamp(), 'aq471cdece319dcc596802561da9cc75f8f1daea52aa27', '0', '1', '6dd390e1deed70c556063001291572b09346adb61697205108') // pass "admin"
INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `date_creation`, `date_update`, `password`, `blocked`, `admin`, `secret`) VALUES (NULL, 'Thomas', 'Dupuy', 't.d@laposte.net', current_timestamp(), current_timestamp(), 'aq473d573b540b97cd0a6167fbac7e4a095b2b6cad1a27', '0', '0','f6e3913714cc195c31f063d0c5414058253570971697205304') // pass "azerty"
INSERT INTO `categories` (`id`, `categorie`, `url`, `active`, `date_creation`, `date_update`) VALUES (NULL, 'Divertissement', 'divertissement', '1', current_timestamp(), current_timestamp()), (NULL, 'Voyage','voyage', '1', current_timestamp(), current_timestamp()), (NULL, 'Informatique', 'informatique', '1', current_timestamp(), current_timestamp())
INSERT INTO `articles` (`id`, `content`, `date_creation`, `date_update`, `published`, `id_category`) VALUES (NULL, '<b>À la découverte des trésors millénaires de l\'Égypte : Un voyage inoubliable</b>\r\nL\'Égypte, cette terre envoûtante qui a captivé l\'imagination des voyageurs depuis des siècles, est bien plus qu\'une simple destination touristique. C\'est un voyage dans le temps, une immersion dans l\'histoire ancienne et une expérience culturelle unique. Dans cet article, nous allons vous emmener à la découverte des trésors millénaires de l\'Égypte, à travers les pyramides majestueuses, les temples mystérieux et les rives légendaires du Nil.\r\n<b>Les Pyramides de Gizeh : Un chef-d\'œuvre architectural</b>\r\nNotre périple débute inévitablement par les pyramides de Gizeh, l\'une des sept merveilles du monde antique et un symbole emblématique de l\'Égypte. Ces monuments grandioses, construits il y a plus de 4 000 ans, continuent d\'émerveiller les visiteurs par leur taille imposante et leur ingéniosité architecturale. Vous pourrez explorer les pyramides de Khéops, Khéphren et Mykérinos, ainsi que le majestueux Sphinx, gardien silencieux de ces trésors antiques.\r\n<b>La vallée des rois : Les tombeaux des pharaons</b>\r\nEn poursuivant notre voyage, nous nous rendons à Louxor, où se trouve la vallée des rois. Cet endroit mystique abrite les tombes de nombreux pharaons, dont Toutankhamon. Vous aurez l\'occasion de descendre dans les profondeurs de la terre pour explorer ces tombes richement décorées, où les hiéroglyphes et les fresques murales racontent l\'histoire de l\'Égypte ancienne.\r\n<b>Les temples majestueux de Louxor et Karnak</b>\r\nÀ Louxor, vous découvrirez également les temples majestueux de Louxor et Karnak. Ces monuments imposants vous transporteront dans le temps, avec leurs colonnes monumentales, leurs obélisques et leurs statues impressionnantes. Le temple de Karnak, en particulier, est un chef-d\'œuvre de l\'architecture égyptienne antique, avec son impressionnante allée de sphinx et son immense salle hypostyle.\r\n<b>Croisière sur le Nil : Une expérience inoubliable</b>\r\nPour une expérience vraiment inoubliable, ne manquez pas de prendre une croisière sur le Nil. Vous naviguerez sur les eaux légendaires du fleuve qui a nourri l\'Égypte pendant des millénaires, en passant par de charmants villages, des temples cachés et des paysages à couper le souffle. C\'est l\'occasion idéale pour vous détendre, tout en découvrant la vie quotidienne des Égyptiens le long du fleuve.\r\n<b>Le trésor de l\'Égypte moderne : Le Caire</b>\r\nEnfin, terminez votre voyage en Égypte en explorant la capitale, Le Caire. Vous pourrez visiter le célèbre musée égyptien, qui abrite une incroyable collection d\'antiquités, y compris les trésors de Toutankhamon. N\'oubliez pas de vous aventurer dans la vieille ville, où les rues étroites et les marchés animés vous plongeront dans l\'ambiance authentique de l\'Égypte.\r\n<b>Conclusion</b>\r\nUn voyage en Égypte est bien plus qu\'une simple escapade touristique. C\'est une aventure dans l\'histoire, la culture et la beauté de l\'Égypte ancienne. Que vous soyez fasciné par les pyramides majestueuses, les temples mystérieux ou les rives du Nil, l\'Égypte ne manquera pas de vous enchanter et de vous laisser des souvenirs inoubliables. Alors, préparez vos bagages et partez à la découverte de ce joyau de l\'histoire du monde.', current_timestamp(), current_timestamp(), '1', '2'), (NULL, '<b>À la découverte de la beauté et de la tradition du Japon : Un voyage inoubliable</b>\r\nLe Japon, ce pays fascinant où la tradition millénaire se marie harmonieusement avec la modernité, est une destination de rêve pour les voyageurs du monde entier. Dans cet article, nous vous invitons à découvrir la beauté du Japon, à travers ses temples anciens, ses jardins paisibles, sa cuisine exquise et ses innovations technologiques.\r\n<b>Kyoto : Le cœur de la tradition japonaise</b>\r\nNotre voyage commence à Kyoto, la capitale culturelle du Japon. Cette ville pittoresque est célèbre pour ses temples et ses jardins traditionnels. Vous pourrez visiter le temple d\'or, le temple Kinkaku-ji, avec sa façade dorée scintillante qui se reflète dans un étang paisible. N\'oubliez pas de vous promener dans les ruelles de Gion, le quartier des geishas, où le charme de l\'ancien Japon est omniprésent.\r\n<b>Tokyo : L\'effervescence de la mégalopole</b>\r\nDe Kyoto, nous nous dirigeons vers Tokyo, la capitale moderne du Japon. Cette mégapole dynamique est le reflet de la vie urbaine trépidante du pays. Vous pourrez explorer des quartiers tels que Shibuya, Harajuku et Akihabara, qui sont le cœur de la culture pop japonaise. Assurez-vous de visiter le marché aux poissons de Tsukiji pour déguster des sushis frais et délicieux.\r\n<b>Hiroshima : Un rappel poignant de l\'histoire</b>\r\nUn voyage au Japon ne serait pas complet sans une visite à Hiroshima, où vous pourrez découvrir le Mémorial de la Paix d\'Hiroshima et son musée poignant. C\'est un endroit pour réfléchir sur les horreurs de la guerre et la résilience du peuple japonais.\r\n<b>Les jardins japonais : Havres de paix</b>\r\nPartout au Japon, vous trouverez des jardins japonais sereins, conçus avec une précision artistique. Les jardins de pierres de Ryoan-ji à Kyoto, les jardins de thé à Tokyo, et les jardins zen à travers le pays vous offriront une pause apaisante dans votre voyage.\r\n<b>La technologie de pointe : Une autre facette du Japon</b>\r\nLe Japon est également connu pour ses innovations technologiques. À Tokyo, visitez le quartier d\'Akihabara pour découvrir les dernières avancées en matière de gadgets électroniques. N\'oubliez pas de faire un voyage futuriste au musée Miraikan, où les robots et les technologies de pointe vous étonneront.\r\n<b>Conclusion</b>\r\nUn voyage au Japon est une expérience inoubliable, une immersion dans une culture riche en histoire et en tradition, tout en étant à la pointe de la modernité. Que vous soyez fasciné par les temples anciens, la cuisine exquise, la technologie de pointe ou la beauté naturelle du pays, le Japon vous offrira une aventure inoubliable. Alors, préparez-vous à explorer ce pays envoûtant et à créer des souvenirs qui dureront toute une vie.', current_timestamp(), current_timestamp(), '1', '2'), (NULL, '<b>L\'Art de Passer une Après-midi à Parcourir les Bois</b>\r\nIl n\'y a rien de plus ressourçant qu\'une après-midi passée à parcourir les bois. Loin de l\'agitation de la vie quotidienne, la forêt offre un refuge naturel où l\'on peut se reconnecter avec la nature, se détendre et découvrir des trésors cachés. Dans cet article, nous allons explorer les joies et les bienfaits d\'une après-midi à se perdre dans les bois.\r\n<b>Le Bien-être au Contact de la Nature</b>\r\nLorsque l\'on pénètre dans la forêt, on se trouve immédiatement immergé dans un monde de verdure, de tranquillité et de vie sauvage. L\'air frais et pur de la forêt, imprégné de l\'odeur de la terre, des arbres et des fleurs, a un effet apaisant sur l\'esprit. Les bruits de la nature, tels que le chant des oiseaux et le murmure du vent dans les feuilles, agissent comme une mélodie naturelle qui calme les sens.\r\n<b>La Découverte de la Faune et de la Flore</b>\r\nL\'une des plus grandes joies de se promener dans les bois est la possibilité d\'observer la faune et la flore locales. Vous pourriez croiser le chemin d\'animaux sauvages, comme des cerfs, des lapins, ou même des écureuils. Les amateurs d\'ornithologie peuvent repérer une multitude d\'oiseaux, chacun avec son propre chant mélodieux. Et n\'oublions pas la diversité des plantes, des champignons aux fleurs sauvages, qui embellissent le paysage forestier.\r\n<b>La Relaxation et la Méditation</b>\r\nSe perdre dans les bois peut être une forme de méditation en mouvement. La marche lente à travers les sentiers forestiers permet de se recentrer et de se libérer du stress. L\'ambiance paisible de la forêt encourage la contemplation, la réflexion et le lâcher-prise. Beaucoup de gens trouvent que c\'est l\'endroit idéal pour méditer, se ressourcer mentalement et se reconnecter avec eux-mêmes.\r\n<b>L\'Exploration et l\'Aventure</b>\r\nChaque promenade en forêt est une aventure en soi. Les chemins sinueux vous invitent à explorer, à voir ce qui se cache derrière la prochaine colline ou au détour du prochain sentier. C\'est une opportunité de sortir de sa zone de confort, d\'apprendre à lire les indices de la nature et de développer un sens aigu de l\'orientation.\r\n<b>Le Respect de l\'Environnement</b>\r\nEn parcourant les bois, nous renforçons également notre connexion avec la nature et notre désir de la préserver. En prenant conscience de la beauté et de la fragilité de l\'écosystème forestier, nous devenons souvent des défenseurs plus déterminés de l\'environnement, prêts à contribuer à sa préservation.\r\n<b>Conclusion</b>\r\nEn somme, une après-midi à parcourir les bois est une expérience revitalisante pour le corps et l\'esprit. C\'est une pause bienvenue dans nos vies bien remplies, un moment pour se reconnecter avec la nature, se détendre et se recentrer. Alors, enfilez vos chaussures de randonnée, prenez votre sac à dos, et partez à la découverte de la splendeur de la forêt. Vous ne tarderez pas à découvrir que les bois ont beaucoup à offrir à ceux qui prennent le temps de les explorer.', current_timestamp(), current_timestamp(), '1', '1')
INSERT INTO `images` (`id`, `id_project`, `id_article`, `image`) VALUES (NULL, NULL, '1', 'Egypte1.jpg'), (NULL, NULL, '1', 'Egypte2.jpg')
INSERT INTO `images` (`id`, `id_project`, `id_article`, `image`) VALUES (NULL, NULL, '2', 'Japon1.jpg'), (NULL, NULL, '2', 'Japon2.jpg'), (NULL, NULL, '2', 'Japon3.jpg');
INSERT INTO `images` (`id`, `id_project`, `id_article`, `image`) VALUES (NULL, NULL, '3', 'Forest1.jpg'), (NULL, NULL, '3', 'Forest2.jpg'), (NULL, NULL, '3', 'Forest3.jpg');
INSERT INTO `comments` (`id`, `id_user`, `id_article`, `content`) VALUES (NULL, '2', '2', 'Super, sa donne vraiment envie d\'y allez');
INSERT INTO `message_status` (`id`, `status`) VALUES (NULL, 'Nouveau'), (NULL, 'Lu');

// update jeu d'essai 
UPDATE `articles` SET `content` = 'L\'Égypte, cette terre envoûtante qui a captivé l\'imagination des voyageurs depuis des siècles, est bien plus qu\'une simple destination touristique. C\'est un voyage dans le temps, une immersion dans l\'histoire ancienne et une expérience culturelle unique. Dans cet article, nous allons vous emmener à la découverte des trésors millénaires de l\'Égypte, à travers les pyramides majestueuses, les temples mystérieux et les rives légendaires du Nil.<br><br>\r\n<b>Les Pyramides de Gizeh : Un chef-d\'œuvre architectural</b><br><br>\r\nNotre périple débute inévitablement par les pyramides de Gizeh, l\'une des sept merveilles du monde antique et un symbole emblématique de l\'Égypte. Ces monuments grandioses, construits il y a plus de 4 000 ans, continuent d\'émerveiller les visiteurs par leur taille imposante et leur ingéniosité architecturale. Vous pourrez explorer les pyramides de Khéops, Khéphren et Mykérinos, ainsi que le majestueux Sphinx, gardien silencieux de ces trésors antiques.<br><br>\r\n<b>La vallée des rois : Les tombeaux des pharaons</b><br><br>\r\nEn poursuivant notre voyage, nous nous rendons à Louxor, où se trouve la vallée des rois. Cet endroit mystique abrite les tombes de nombreux pharaons, dont Toutankhamon. Vous aurez l\'occasion de descendre dans les profondeurs de la terre pour explorer ces tombes richement décorées, où les hiéroglyphes et les fresques murales racontent l\'histoire de l\'Égypte ancienne.<br><br>\r\n<b>Les temples majestueux de Louxor et Karnak</b><br><br>\r\nÀ Louxor, vous découvrirez également les temples majestueux de Louxor et Karnak. Ces monuments imposants vous transporteront dans le temps, avec leurs colonnes monumentales, leurs obélisques et leurs statues impressionnantes. Le temple de Karnak, en particulier, est un chef-d\'œuvre de l\'architecture égyptienne antique, avec son impressionnante allée de sphinx et son immense salle hypostyle.<br><br>\r\n<b>Croisière sur le Nil : Une expérience inoubliable</b><br><br>\r\nPour une expérience vraiment inoubliable, ne manquez pas de prendre une croisière sur le Nil. Vous naviguerez sur les eaux légendaires du fleuve qui a nourri l\'Égypte pendant des millénaires, en passant par de charmants villages, des temples cachés et des paysages à couper le souffle. C\'est l\'occasion idéale pour vous détendre, tout en découvrant la vie quotidienne des Égyptiens le long du fleuve.<br><br>\r\n<b>Le trésor de l\'Égypte moderne : Le Caire</b><br><br>\r\nEnfin, terminez votre voyage en Égypte en explorant la capitale, Le Caire. Vous pourrez visiter le célèbre musée égyptien, qui abrite une incroyable collection d\'antiquités, y compris les trésors de Toutankhamon. N\'oubliez pas de vous aventurer dans la vieille ville, où les rues étroites et les marchés animés vous plongeront dans l\'ambiance authentique de l\'Égypte.<br><br>\r\n<b>Conclusion</b><br><br>\r\nUn voyage en Égypte est bien plus qu\'une simple escapade touristique. C\'est une aventure dans l\'histoire, la culture et la beauté de l\'Égypte ancienne. Que vous soyez fasciné par les pyramides majestueuses, les temples mystérieux ou les rives du Nil, l\'Égypte ne manquera pas de vous enchanter et de vous laisser des souvenirs inoubliables. Alors, préparez vos bagages et partez à la découverte de ce joyau de l\'histoire du monde.' WHERE `articles`.`id` = 1
UPDATE `articles` SET `content` = 'Le Japon, ce pays fascinant où la tradition millénaire se marie harmonieusement avec la modernité, est une destination de rêve pour les voyageurs du monde entier. Dans cet article, nous vous invitons à découvrir la beauté du Japon, à travers ses temples anciens, ses jardins paisibles, sa cuisine exquise et ses innovations technologiques.<br><br>\r\n<b>Kyoto : Le cœur de la tradition japonaise</b><br><br>\r\nNotre voyage commence à Kyoto, la capitale culturelle du Japon. Cette ville pittoresque est célèbre pour ses temples et ses jardins traditionnels. Vous pourrez visiter le temple d\'or, le temple Kinkaku-ji, avec sa façade dorée scintillante qui se reflète dans un étang paisible. N\'oubliez pas de vous promener dans les ruelles de Gion, le quartier des geishas, où le charme de l\'ancien Japon est omniprésent.<br><br>\r\n<b>Tokyo : L\'effervescence de la mégalopole</b><br><br>\r\nDe Kyoto, nous nous dirigeons vers Tokyo, la capitale moderne du Japon. Cette mégapole dynamique est le reflet de la vie urbaine trépidante du pays. Vous pourrez explorer des quartiers tels que Shibuya, Harajuku et Akihabara, qui sont le cœur de la culture pop japonaise. Assurez-vous de visiter le marché aux poissons de Tsukiji pour déguster des sushis frais et délicieux.<br><br>\r\n<b>Hiroshima : Un rappel poignant de l\'histoire</b><br><br>\r\nUn voyage au Japon ne serait pas complet sans une visite à Hiroshima, où vous pourrez découvrir le Mémorial de la Paix d\'Hiroshima et son musée poignant. C\'est un endroit pour réfléchir sur les horreurs de la guerre et la résilience du peuple japonais.<br><br>\r\n<b>Les jardins japonais : Havres de paix</b><br><br>\r\nPartout au Japon, vous trouverez des jardins japonais sereins, conçus avec une précision artistique. Les jardins de pierres de Ryoan-ji à Kyoto, les jardins de thé à Tokyo, et les jardins zen à travers le pays vous offriront une pause apaisante dans votre voyage.<br><br>\r\n<b>La technologie de pointe : Une autre facette du Japon</b><br><br>\r\nLe Japon est également connu pour ses innovations technologiques. À Tokyo, visitez le quartier d\'Akihabara pour découvrir les dernières avancées en matière de gadgets électroniques. N\'oubliez pas de faire un voyage futuriste au musée Miraikan, où les robots et les technologies de pointe vous étonneront.<br><br>\r\n<b>Conclusion</b><br><br>\r\nUn voyage au Japon est une expérience inoubliable, une immersion dans une culture riche en histoire et en tradition, tout en étant à la pointe de la modernité. Que vous soyez fasciné par les temples anciens, la cuisine exquise, la technologie de pointe ou la beauté naturelle du pays, le Japon vous offrira une aventure inoubliable. Alors, préparez-vous à explorer ce pays envoûtant et à créer des souvenirs qui dureront toute une vie.' WHERE `articles`.`id` = 2
UPDATE `articles` SET `content` = 'Il n\'y a rien de plus ressourçant qu\'une après-midi passée à parcourir les bois. Loin de l\'agitation de la vie quotidienne, la forêt offre un refuge naturel où l\'on peut se reconnecter avec la nature, se détendre et découvrir des trésors cachés. Dans cet article, nous allons explorer les joies et les bienfaits d\'une après-midi à se perdre dans les bois.<br><br>\r\n<b>Le Bien-être au Contact de la Nature</b><br><br>\r\nLorsque l\'on pénètre dans la forêt, on se trouve immédiatement immergé dans un monde de verdure, de tranquillité et de vie sauvage. L\'air frais et pur de la forêt, imprégné de l\'odeur de la terre, des arbres et des fleurs, a un effet apaisant sur l\'esprit. Les bruits de la nature, tels que le chant des oiseaux et le murmure du vent dans les feuilles, agissent comme une mélodie naturelle qui calme les sens.<br><br>\r\n<b>La Découverte de la Faune et de la Flore</b><br><br>\r\nL\'une des plus grandes joies de se promener dans les bois est la possibilité d\'observer la faune et la flore locales. Vous pourriez croiser le chemin d\'animaux sauvages, comme des cerfs, des lapins, ou même des écureuils. Les amateurs d\'ornithologie peuvent repérer une multitude d\'oiseaux, chacun avec son propre chant mélodieux. Et n\'oublions pas la diversité des plantes, des champignons aux fleurs sauvages, qui embellissent le paysage forestier.<br><br>\r\n<b>La Relaxation et la Méditation</b><br><br>\r\nSe perdre dans les bois peut être une forme de méditation en mouvement. La marche lente à travers les sentiers forestiers permet de se recentrer et de se libérer du stress. L\'ambiance paisible de la forêt encourage la contemplation, la réflexion et le lâcher-prise. Beaucoup de gens trouvent que c\'est l\'endroit idéal pour méditer, se ressourcer mentalement et se reconnecter avec eux-mêmes.<br><br>\r\n<b>L\'Exploration et l\'Aventure</b><br><br>\r\nChaque promenade en forêt est une aventure en soi. Les chemins sinueux vous invitent à explorer, à voir ce qui se cache derrière la prochaine colline ou au détour du prochain sentier. C\'est une opportunité de sortir de sa zone de confort, d\'apprendre à lire les indices de la nature et de développer un sens aigu de l\'orientation.<br><br>\r\n<b>Le Respect de l\'Environnement</b><br><br>\r\nEn parcourant les bois, nous renforçons également notre connexion avec la nature et notre désir de la préserver. En prenant conscience de la beauté et de la fragilité de l\'écosystème forestier, nous devenons souvent des défenseurs plus déterminés de l\'environnement, prêts à contribuer à sa préservation.<br><br>\r\n<b>Conclusion</b><br><br>\r\nEn somme, une après-midi à parcourir les bois est une expérience revitalisante pour le corps et l\'esprit. C\'est une pause bienvenue dans nos vies bien remplies, un moment pour se reconnecter avec la nature, se détendre et se recentrer. Alors, enfilez vos chaussures de randonnée, prenez votre sac à dos, et partez à la découverte de la splendeur de la forêt. Vous ne tarderez pas à découvrir que les bois ont beaucoup à offrir à ceux qui prennent le temps de les explorer.' WHERE `articles`.`id` = 3

