-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2015 at 03:35 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `esgi1i`
--

-- --------------------------------------------------------

--
-- Table structure for table `evenements`
--

CREATE TABLE IF NOT EXISTS `evenements` (
  `id_evenement` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(130) NOT NULL,
  `resume` text NOT NULL,
  `contenu` text NOT NULL,
  `date` datetime NOT NULL,
  `image` varchar(50) NOT NULL,
  `baniere` varchar(50) NOT NULL,
  `video` varchar(250) NOT NULL,
  `date_crea` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_evenement`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `evenements`
--

INSERT INTO `evenements` (`id_evenement`, `titre`, `resume`, `contenu`, `date`, `image`, `baniere`, `video`, `date_crea`) VALUES
(1, 'Tomorrowland', 'Tomorrowland est l’un si ce n’est LE festival EDM le plus connu de nos jours, il a connu ses débuts en 2003 sur l’idée de 2 frères et ne cesse de prendre de l''ampleur. En 2012 il compte plus de 365 DJ’s avec 185 000 visiteurs en provenance de 75 pays différents.', '<p>Tomorrowland est l’un si ce n’est LE festival EDM le plus connu de nos jours, il a vu le jour en 2003 sur l’idée de 2 frères et ne cesse depuis de grandir. En 2012 il compte plus de 365 DJ’s avec 185 000 visiteurs en provenance de 75 pays différents.</p>\r\n<p>Le festival a connu une reconnaissance massive après leur édition 2011 suite à laquelle ils ont réalisé un aftermovie qui a extrêmement bien mit le festival en avant et qui a donc attiré une foule du monde entier, ce qui rend depuis 2011 l’achat de places bien compliqué, en effet, il ne faut que 2 minutes pour que les 200 000 places soit vendues, une très grosse part de l’achat de places repose donc sur la chance. Il y a d’autres moyens d’avoir des places mais je ne garantit rien et les prix flambes très vite, ceci dit, j’ai obtenu mes places sur le site VIAGOGO pour un prix légèrement plus élevé  que le prix de base, mais j’ai eu accès à mon rêve !</p>\r\n\r\n<p>Les prix, parlons-en, c’est élevé, TRES élevé, comptez 300 euros minimum pour les 3 jours sans camping, 400 euros environ avec le camping, et pour plus de confort les prix augmentent très vite .</p>\r\n<p>Le festival prend place fin Juillet de chaque année pour 3 jours, et se situe a BOOM en Belgique.</p>\r\n<p>Aftermovie 2014 : https://www.youtube.com/watch?v=NtDG-Cnj-pw</p>\r\n<p>Site : http://www.tomorrowland.com/home</p>\r\n', '2015-04-24 00:00:00', 'upload/31048554153660de005.04868673.jpg', 'upload/17377554153661080c7.75231794.jpg', 'https://www.youtube.com/embed/vELPDd4BEZc', '2015-04-20 13:18:12'),
(9, 'Don’t Let Daddy Know', ' Dont Let Daddy Know est un festival qui a vu le jour à Ibiza il y a quelques années, crée par le DJ Sem Vox celui-ci s''étends dannée en année, en effet, de plus en plus de festivals portant le nom de DLDK ont lieu dans différents pays du monde.', ' Dont let daddy know est un festival qui a vu le jour à Ibiza il y a quelques années, créer par le DJ Sem Vox il sétend dannée en année, en effet, de plus en plus de festivals portant le nom de DLDK ont lieu dans différents pays du monde, Chine, Angleterre, Belgique,  Hollande. Lorsqu?on aperçoit le Logo dont let daddy know, il est possible de prendre sa place les yeux fermé, en effet, la line up ne déçoit que TRES RAREMENT et les scènes sont grandioses, habituellement et daprès mon expérience, le mur de la salle ou se situe la scène est rempli décrans ce qui nous donne une vue exceptionnelle. Le prix est de 50 euros approximativement Site : http://dldk.com/\r\n', '2016-02-16 00:00:00', 'upload/29107553cd737e4c898.01350227.jpg', 'upload/9072553cd737e58b15.28682585.jpg', 'https://www.youtube.com/embed/qgXSyZDobxQ', '2015-04-26 12:04:20'),
(10, 'Ultra Europe', '  L’ultra music festival est la deuxième enseigne la plus connue dans le monde EDM (Electronic Dance Music) niveau festival, l’Europe est, après l’édition de Miami, la plus connue, elle se situe en Croatie a Split dans le stade de football national croate...', ' L’ultra music festival est la deuxième enseigne la plus connue dans le monde EDM (Electronic Dance Music) niveau festival, l’Europe est, après l’édition de Miami, la plus connue, elle se situe en Croatie a Split dans le stade de football national croate,  le festival prend place en Juillet et dure 3 jours.\r\n\r\nCe festival est réputé pour le contraste qu’il apporte, le calme et la beauté des paysages croate comparé à l’ambiance festive constante qui règne autour de ce festival . \r\n\r\nMajoritairement axé electro / house et ne disposant que de peu de scènes, il accueille un public assez ciblé venant du monde entier. Le prix pour les 3 jours sans logements ou transport est de 130 euros. \r\nSite : http://www.ultraeurope.com/\r\n', '2016-02-16 00:00:00', 'upload/13215553cd8b936b6c9.12037966.jpg', 'upload/7404553cd8b93a2900.97498717.jpg', 'https://www.youtube.com/embed/wW9uBeGQRyo', '2015-04-26 12:22:38'),
(11, 'Amsterdam Music Festival', ' AMF 2014 : L’Amsterdam Music Festival est la nuit de célébration du TOP 100 DJ MAG pour lequel des votes sont collectés toute l’année afin d’établir un classement qui est révélé en direct aux spectateurs comme aux DJ’s...', ' AMF 2014 : L’Amsterdam Music Festival est la nuit de célébration du TOP 100 DJ MAG pour lequel des votes sont collectés toute l’année afin d’établir un classement qui est révélé en direct aux spectateurs comme aux DJ’s, il était organisé sur une nuit depuis ses débuts mais au vu de son succès il sera, en 2015, organisé sur 2 nuits toujours en Octobre dans l’enceinte du magnifique stade de football de l’AJAX d’Amsterdam .\r\n\r\nL’édition 2014 a laquelle j’ai eu la chance de participer a vu se réunir pour une nuit une line up incroyable qui était celle-ci : \r\n-Hardwell\r\n-Martin Garrix	\r\n-W&W\r\n-Wildstylerz\r\n-Dimitri Vegas & Like Mike\r\n-David Guetta\r\n-Deorro\r\n-Armin Van Buren\r\n\r\nLe festival prend place au mois d’octobre de chaque année. \r\n\r\nLe prix des places était en 2014 d’une 60 aine d’euros .\r\n\r\nSite : http://amsterdammusicfestival.com/\r\n', '2016-02-16 00:00:00', 'upload/25328553cd911cd7bf7.97405880.jpg', 'upload/28777553cd911e1e231.68218489.jpg', 'https://www.youtube.com/embed/bsp-fvmU4-M', '2015-04-26 12:24:50'),
(12, 'Ultra Miami', '  L’ultra music festival est l’évènement le plus mythique du continent américain , en effet, le festival prend place en bord de mer à Miami, les immenses scènes sont en plein cœur de Miami ce qui rend le paysage complètement surréaliste. Tous les ans en Mars, et ce pendant 3 jours, Miami se transforme en dancefloor géant ....', ' L’ultra music festival est l’évènement le plus mythique du continent américain , en effet, le festival prend place en bord de mer à Miami, les immenses scènes sont en plein cœur de Miami ce qui rend le paysage complètement surréaliste. Tous les ans en Mars, et ce pendant 3 jours, Miami se transforme en dancefloor géant .\r\n\r\nLe festival existe depuis maintenant 15 ans et il s’agrandit de plus en plus chaque année.\r\nUn fait important du festival a eu lieu en 2012, en effet le groupe adulé par beaucoup de fans de musique electro (moi y compris) Swedish House Mafia, a joué pour la dernière fois ensemble a l’ultra miami 2012, avant de se séparer après une tournée de 50 concerts a guichet fermé \r\n\r\nDu fait de ses nombreuses scènes, beaucoup de genres musicaux y sont représentés, la trap l’électro la dubstep la trance la deep house tout y passe ! \r\n\r\nLe prix pour le festival seul tourne autour de 200 euros environ. \r\n\r\nSite : http://www.ultramusicfestival.com/\r\n', '2016-02-16 00:00:00', 'upload/26805553cd9612a4c30.77704170.jpg', 'upload/27466553cd96140c8f6.39315000.jpg', 'https://www.youtube.com/embed/7nGjmPIh0w4', '2015-04-26 12:26:09'),
(13, 'Defqon 1', '  Defqon.1 (Defqon-1, Defqon.1 Festival 1, ou simplement DQ12) est un festival de musiques électroniques, principalement axé hardstyle et techno hardcore, annuellement organisé depuis 2003 par Q-dance aux Pays-Bas. Il s''agit d''un événement de grande ampleur partagée entre activités et animations grandioses et pyrotechnie..', ' Defqon.1 (Defqon-1, Defqon.1 Festival 1, ou simplement DQ12) est un festival de musiques électroniques, principalement axé hardstyle et techno hardcore, annuellement organisé depuis 2003 par Q-dance aux Pays-Bas. Il s''agit d''un événement de grande ampleur partagée entre activités et animations grandioses et pyrotechnie.\r\n\r\nEnviron 60 000 participants sont attendu chaque année, en Juin (19/20/21 pour l’édition 2015).\r\n\r\nSite : http://www.defqon1.nl/\r\n', '2016-02-16 00:00:00', 'upload/23984553cda19f01390.22678627.jpg', 'upload/13353553cda1a0d8192.98750478.jpg', 'https://www.youtube.com/embed/0fC-eHILSsE', '2015-04-26 12:29:14'),
(14, 'Jungle Juice', '  La Jungle Juice est une soirée qui a lieu 2 fois par ans a Paris...', ' La Jungle Juice est une soirée qui a lieu 2 fois par ans a Paris, en général au YOYO dans le 16eme arrondissement, c’est LA soirée Drum&Bass Parisienne, pour un prix de 20 euros elle vous propose une nuit de folie avec une line up de qualité. \r\n\r\nPage facebook : https://www.facebook.com/junglejuicegig\r\n', '2016-02-16 00:00:00', 'upload/2798553cdaca640af2.57997109.jpg', 'upload/23439553cdaca74f0a8.30234734.jpg', 'https://www.youtube.com/embed/XzUueXn_9x4', '2015-04-26 12:32:10'),
(15, 'World Club Dome', ' Le world club dome est le plus gros évenement musicale situé en Allemagne. Le festival prend place dans un stade de foot et se déroule chaque année début Juin, et ce pour 3 jours.', 'Le world club dome est le plus gros évenement musicale situé en Allemagne , a Franfort plus précisément. Le festival prend place dans un stade de foot et se déroule chaque année début Juin, et ce pour 3 jours.Cette année, 150 DJ''s vont se réunir en allemagne avec de très grand noms comme chaque année.\r\n\r\nLe prix des billets est de 130 euros environ.\r\n\r\nSite : http://www.worldclubdome.com/', '2016-02-16 00:00:00', 'upload/8901553cee07098915.66652733.jpg', 'upload/1050553cee0709dbe8.03523733.jpg', 'https://www.youtube.com/embed/n2PVZK2cVMc', '2015-04-26 13:54:15');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `commentaire_id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`commentaire_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`commentaire_id`, `pseudo`, `contenu`, `date_creation`) VALUES
(3, 'Admin', 'Bienvenues sur notre site! N''hésitez pas à créer des petites discussions ici', '2015-04-30 00:50:38');

-- --------------------------------------------------------

--
-- Table structure for table `galerie`
--

CREATE TABLE IF NOT EXISTS `galerie` (
  `id_image` int(11) NOT NULL AUTO_INCREMENT,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(250) NOT NULL,
  PRIMARY KEY (`id_image`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `galerie`
--

INSERT INTO `galerie` (`id_image`, `date_creation`, `image`) VALUES
(1, '2015-04-29 23:09:44', 'media/tomorow.jpg'),
(5, '2014-04-29 23:31:54', 'upload/15645554169eaadd502.45269419.jpg'),
(6, '2013-04-29 23:31:59', 'upload/5408554169efbc9a54.16493179.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo_expediteur` varchar(50) NOT NULL,
  `pseudo_destinataire` varchar(50) NOT NULL,
  `titre` text NOT NULL,
  `contenu` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_message`),
  UNIQUE KEY `id_message` (`id_message`),
  KEY `id_expediteur` (`pseudo_expediteur`),
  KEY `id_destinataire` (`pseudo_destinataire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `resume` text NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_news`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `titre`, `resume`, `contenu`, `date_creation`) VALUES
(3, 'KingsDay', 'Le Kingsday a eu lieu Lundi 27 avril 2015 à Amsterdam, ce jour de fête particulié pour les Hollandais a été animé par de nombreux DJ sur de nombreuses scènes, pour seulement 25 euros vous pouviez danser devant  Martin Garrix, Yellow Claw, Jack U, Hardwell pour ne citer qu’eux, les DJ’s headliners se comptait par dizaines.\r\nJe n’y étais pas mais au vu des nombreuses vidéos ce festival avait l’air d’être une très franche réussite et un rapport qualité prix IMBATTABLE.\r\n', 'Le Kingsday a eu lieu Lundi 27 avril 2015 à Amsterdam, ce jour de fête particulié pour les Hollandais a été animé par de nombreux DJ sur de nombreuses scènes, pour seulement 25 euros vous pouviez danser devant  Martin Garrix, Yellow Claw, Jack U, Hardwell pour ne citer qu’eux, les DJ’s headliners se comptait par dizaines.', '2015-04-30 00:05:07'),
(4, 'DJ Excision', 'Si vous habitez à Paris et que vous êtes fan de Dubstep vous devriez connaitre Excision, ce DJ Star qui fait tant parlé de lui au travers de ses Shambala mix annuels, il a mixé devant plusieurs milliers de personnes le 17 Avril 2015 à Aubervilliers au Docks Pullman, j’ai pu assisté à cette soirée et ce fut une franche réussite, deux soirée avec la même affiche devait prendre place le week end suivant à Strasbourg.\r\n\r\nMalheureusement, ces soirées n’ont pas eu lieu, en effet, Excision a été victime d’une intoxication alimentaire dans un restaurant Parisien ce qui lui a valu d’être cloué au lit et d’annuler ce week end de fête !\r\n', 'Si vous habitez à Paris et que vous êtes fan de Dubstep vous devriez connaitre Excision, ce DJ Star qui fait tant parlé de lui au travers de ses Shambala mix annuels, il a mixé devant plusieurs milliers de personnes le 17 Avril 2015 à Aubervilliers au Docks Pullman, j’ai pu assisté à cette soirée et ce fut une franche réussite, deux soirée avec la même affiche devait prendre place le week end suivant à Strasbourg.', '2015-04-30 00:05:35'),
(5, 'Line Up - Festival de musique électronique', 'La line up du plus gros festival de musique électronique français a été révélée il y a peu, sans surprise et comme chaque année le festival prend de l’ampleur, encore une fois un bon nombre de Dj Internationaux reconnus ont répondu présent à l’appel de Port Barcares.\r\nLa line up est à retrouver ici : http://france.electrobeach.com/fr/line-up/\r\n\r\nPrix du pass 3 jours plein tarif : 150 euros ! \r\n', 'La line up du plus gros festival de musique électronique français a été révélée il y a peu, sans surprise et comme chaque année le festival prend de l’ampleur, encore une fois un bon nombre de Dj Internationaux reconnus ont répondu présent à l’appel de Port Barcares.', '2015-04-30 00:06:17'),
(6, 'Pendulum (AKA. Knife Party)', 'Pour les fans de Drum&Bass comme moi, vous n’êtes pas sans connaitre le groupe PENDULUM, renommé il y a quelques années sous l’alias Knife Party afin de produire un genre différent : De la dubstep.\r\nExcellente nouvelle que nous apprenons il y a peu, Knife party a décidé de reprendre le temps d’un album et d’une tournée l’alias PENDULUM. \r\n', 'Pour les fans de Drum&Bass comme moi, vous n’êtes pas sans connaitre le groupe PENDULUM, renommé il y a quelques années sous l’alias Knife Party afin de produire un genre différent : De la dubstep.', '2015-04-30 00:06:50'),
(7, 'Jack U (Skrillex & Diplo) ', 'Le collectif Jack U (Skrillex & Diplo) ont sorti une collaboration qui en a surpris plus d’un, en effet, le chanteur de cette chanson est : JUSTIN BIEBER ! Les avis sont divisés, beaucoup des avis négatifs viennent simplement du fait que Justin Bieber a une certaine réputation qui ne colle pas spécialement à Jack U, le mieux reste de se faire son propre avis, le son est à écouter ici : https://www.youtube.com/watch?v=YKS1xjqEv8o', 'Le collectif Jack U (Skrillex & Diplo) ont sorti une collaboration qui en a surpris plus d’un, en effet, le chanteur de cette chanson est : JUSTIN BIEBER ! Les avis sont divisés, beaucoup des avis négatifs viennent simplement du fait que Justin Bieber a une certaine réputation qui ne colle pas spécialement à Jack U, le mieux reste de se faire son propre avis, le son est à écouter ici : https://www.youtube.com/watch?v=YKS1xjqEv8o', '2015-04-30 00:07:22'),
(8, 'Insafe Festival - Sud', 'Un des plus gros festival Trance/ Hardcore s’est déroulé dans le sud de la France , l’insane festival , pour un prix de 60 euros vous aviez droit à une journée + soirée de son avec au commandes certains des plus gros DJ’s de leurs genre. ', 'Un des plus gros festival Trance/ Hardcore s’est déroulé dans le sud de la France , l’insane festival , pour un prix de 60 euros vous aviez droit à une journée + soirée de son avec au commandes certains des plus gros DJ’s de leurs genre. ', '2015-04-30 00:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int(11) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contenu` text NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`status_id`),
  UNIQUE KEY `status_id` (`status_id`),
  KEY `articles_id` (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `utilisateurs_id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `genre` char(1) NOT NULL,
  `ville` varchar(10) NOT NULL,
  `avatar` varchar(40) NOT NULL DEFAULT 'upload/default.png',
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_maj` timestamp NOT NULL,
  `role` int(2) NOT NULL DEFAULT '2',
  PRIMARY KEY (`utilisateurs_id`),
  UNIQUE KEY `utilisateurs_id` (`utilisateurs_id`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`utilisateurs_id`, `pseudo`, `nom`, `prenom`, `email`, `mdp`, `genre`, `ville`, `avatar`, `date_creation`, `date_maj`, `role`) VALUES
(2, 'Admin', 'Admin', 'Admin', 'admin@hotmail.fr', '0ba2d27f8db2727958ff303c6e98f523', '', '', 'upload/9478554153cfb07316.62830477.png', '2015-04-04 00:41:04', '2015-04-20 11:35:08', 1),
(3, 'User', 'User', 'User', 'user@hotmail.fr', 'c7ccdc947e928d7a2afe5a7d7e1c4eee', '', '', 'upload/1582355415516abaee5.08584607.png', '2015-04-04 00:44:21', '2015-04-20 11:35:14', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
