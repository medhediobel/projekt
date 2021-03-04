-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 01 mars 2021 à 04:31
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `portal`
--

-- --------------------------------------------------------

--
-- Structure de la table `behoerde`
--

CREATE TABLE `behoerde` (
  `id` int(11) NOT NULL,
  `typ` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `benutzername` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `behoerde`
--

INSERT INTO `behoerde` (`id`, `typ`, `email`, `password`, `benutzername`) VALUES
(1, 'natur', 'dlr@mail.com', '0606', 'hedi'),
(2, 'kreisverwaltung ', 'kreisverwaltung@gmail', 'kreisverwaltung0005', 'kreisverwaltung111');

-- --------------------------------------------------------

--
-- Structure de la table `bekanntgabetermin`
--

CREATE TABLE `bekanntgabetermin` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `all_day` tinyint(1) NOT NULL,
  `background_color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `border_color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bekanntgabetermin`
--

INSERT INTO `bekanntgabetermin` (`id`, `title`, `start`, `end`, `description`, `all_day`, `background_color`, `border_color`, `text_color`) VALUES
(1, 'kottweiler', '2021-02-17 21:46:33', '2021-02-18 21:46:33', 'vereinfachtes', 0, '', '', ''),
(2, 'Bekanntgabe', '2021-02-02 03:05:00', '2021-02-04 07:10:00', 'bekanntgabetermin', 0, '#955050', '#000000', '#000000');

-- --------------------------------------------------------

--
-- Structure de la table `beteiligte`
--

CREATE TABLE `beteiligte` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nachname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `benutzername` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codepost` int(11) NOT NULL,
  `ordnum` double NOT NULL,
  `wiederspruche` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `vollmacht` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `beteiligte`
--

INSERT INTO `beteiligte` (`id`, `name`, `nachname`, `email`, `password`, `benutzername`, `telefon`, `adresse`, `city`, `codepost`, `ordnum`, `wiederspruche`, `vollmacht`) VALUES
(1, 'Max', 'Muster', 'muster@gmail.com', 'hhh', 'mhb06', '017661508377', 'GeneraloberstBeckStrasse12', 'mainz', 55129, 0, '1', '1'),
(5, 'Hubert', 'Pokutta', 'Hub.pok@gmx.de', '123456', 'mhb', '01771815600', 'Berliner Str 23', 'ober Ramstadt', 55129, 0, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `typ` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tageszeit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `calendar`
--

INSERT INTO `calendar` (`id`, `title`, `start`, `end`, `description`, `typ`, `tageszeit`) VALUES
(1, 'Anhörungstermin', '2016-01-01 10:00:00', '2016-01-01 13:00:00', 'wiedersprüche', '', ''),
(2, 'Anhörungstermin', '2016-01-01 00:00:00', '2016-01-01 00:00:00', 'jhfdgfsfhgfjh', '', ''),
(3, 'Anhörungstermin', '2021-01-30 13:16:00', '2021-01-30 14:16:00', 'Anhörungstermin für Wiedeschrüche', 'Telefon', 'Nchmitag'),
(4, 'Widerspruch', '2021-02-01 14:21:00', '2021-02-01 15:21:00', 'Widerspruch Termin', 'Telefon', 'Nachmittag'),
(5, 'Anhörungstermin', '2021-02-04 08:00:00', '2021-02-04 18:00:00', 'tageszeit', 'Telefon', 'Vormittag');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `title`, `description`) VALUES
(9, 'Verfahrenname 1', 'V.Art 1'),
(10, 'Verfahrenname 2', 'V.Art 2'),
(11, 'Verfahrenname 3', 'V.Art 3'),
(12, 'Verfahrenname 4', 'V.Art 4');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `article_id`, `amt`, `author`, `content`, `created_at`) VALUES
(1, 19, 'amt', 'Herr Muster', 'Darstellung auf der Grundlage der Geobasisdaten der Vermessungs- und Katasterverwaltung. Mit Genehmigung des Landesamtes für Vermessung und Geobasisinformation Rheinland-Pfalz.', '2020-12-17 02:56:48'),
(2, 19, 'amt', 'Herr Muster', 'Darstellung auf der Grundlage der Geobasisdaten der Vermessungs- und Katasterverwaltung. Mit Genehmigung des Landesamtes für Vermessung und Geobasisinformation Rheinland-Pfalz.', '2020-12-17 02:56:48'),
(3, 19, 'Schutz_amt', 'Herr Mueller', 'Darstellung auf der Grundlage der Geobasisdaten der Vermessungs- und Katasterverwaltung. Mit Genehmigung des Landesamtes für Vermessung und Geobasisinformation Rheinland-Pfalz.', '2020-12-17 02:56:48'),
(11, 20, 'Schutz_amt', 'Herr Mueller', 'Darstellung auf der Grundlage der Geobasisdaten der Vermessungs- und Katasterverwaltung. Mit Genehmigung des Landesamtes für Vermessung und Geobasisinformation Rheinland-Pfalz.', '2020-12-17 02:56:48'),
(14, 21, 'Schutz_amt', 'Herr Mueller', 'Darstellung auf der Grundlage der Geobasisdaten der Vermessungs- und Katasterverwaltung. Mit Genehmigung des Landesamtes für Vermessung und Geobasisinformation Rheinland-Pfalz.', '2020-12-17 02:56:48'),
(21, 22, 'Schutz_amt', 'Herr Mueller', 'Darstellung auf der Grundlage der Geobasisdaten der Vermessungs- und Katasterverwaltung. Mit Genehmigung des Landesamtes für Vermessung und Geobasisinformation Rheinland-Pfalz.', '2020-12-17 02:56:48'),
(26, 23, 'Schutz_amt', 'Herr Mueller', 'Darstellung auf der Grundlage der Geobasisdaten der Vermessungs- und Katasterverwaltung. Mit Genehmigung des Landesamtes für Vermessung und Geobasisinformation Rheinland-Pfalz.', '2020-12-17 02:56:48'),
(27, 23, 'Schutz_amt', 'Herr Mueller', 'Darstellung auf der Grundlage der Geobasisdaten der Vermessungs- und Katasterverwaltung. Mit Genehmigung des Landesamtes für Vermessung und Geobasisinformation Rheinland-Pfalz.', '2020-12-17 02:56:48'),
(35, 24, 'Schutz_amt', 'Herr Mueller', 'Darstellung auf der Grundlage der Geobasisdaten der Vermessungs- und Katasterverwaltung. Mit Genehmigung des Landesamtes für Vermessung und Geobasisinformation Rheinland-Pfalz.', '2020-12-17 02:56:48'),
(36, 24, 'Schutz_amt', 'Herr Mueller', 'Darstellung auf der Grundlage der Geobasisdaten der Vermessungs- und Katasterverwaltung. Mit Genehmigung des Landesamtes für Vermessung und Geobasisinformation Rheinland-Pfalz.', '2020-12-17 02:56:48'),
(39, 25, 'Schutz_amt', 'Herr Mueller', 'Darstellung auf der Grundlage der Geobasisdaten der Vermessungs- und Katasterverwaltung. Mit Genehmigung des Landesamtes für Vermessung und Geobasisinformation Rheinland-Pfalz.', '2020-12-17 02:56:48'),
(45, 26, 'Schutz_amt', 'Herr Mueller', 'Darstellung auf der Grundlage der Geobasisdaten der Vermessungs- und Katasterverwaltung. Mit Genehmigung des Landesamtes für Vermessung und Geobasisinformation Rheinland-Pfalz.', '2020-12-17 02:56:48'),
(48, 26, 'Schutz_amt', 'Herr Mueller', 'Darstellung auf der Grundlage der Geobasisdaten der Vermessungs- und Katasterverwaltung. Mit Genehmigung des Landesamtes für Vermessung und Geobasisinformation Rheinland-Pfalz.', '2020-12-17 02:56:48'),
(49, 19, 'DLR', 'Muster', 'Vereinfach Darstellung auf der Grundlage der Geobasisdaten der Vermessungs- und Katasterverwaltung. Mit Genehmigung des Landesamtes für Vermessung und Geobasisinformation Rheinland-Pfalz.', '2020-12-17 04:42:38'),
(50, 19, 'DLR', 'Muster', 'Vereinfach Darstellung auf der Grundlage der Geobasisdaten der Vermessungs- und Katasterverwaltung. Mit Genehmigung des Landesamtes für Vermessung und Geobasisinformation Rheinland-Pfalz.', '2020-12-17 05:03:14'),
(51, 19, 'DLR', 'Muster', 'Vereinfach Darstellung auf der Grundlage der Geobasisdaten der Vermessungs- und Katasterverwaltung. Mit Genehmigung des Landesamtes für Vermessung und Geobasisinformation Rheinland-Pfalz.', '2020-12-17 05:05:36'),
(52, 19, 'DLR', 'Muster', 'Vereinfach Darstellung auf der Grundlage der Geobasisdaten der Vermessungs- und Katasterverwaltung. Mit Genehmigung des Landesamtes für Vermessung und Geobasisinformation Rheinland-Pfalz.', '2020-12-17 05:05:50'),
(53, 19, 'DLR', 'Muster', 'Vereinfach Darstellung auf der Grundlage der Geobasisdaten der Vermessungs- und Katasterverwaltung. Mit Genehmigung des Landesamtes für Vermessung und Geobasisinformation Rheinland-Pfalz.', '2020-12-17 05:06:23'),
(54, 19, 'DLR', 'Muster', 'Vermessung und Geobasisinformation', '2020-12-17 05:06:49'),
(55, 19, 'DLR', 'Muster', '<p>Vereinfach Darstellung auf der Grundlage der Geobasisdaten der Vermessungs- und Katasterverwaltung. Mit Genehmigung des Landesamtes f&uuml;r Vermessung und Geobasisinformation Rheinland-Pfalz.</p>', '2021-01-29 04:05:16'),
(56, 19, 'DLR', 'Muster', '<p>Vereinfach Darstellung auf der Grundlage der Geobasisdaten der Vermessungs- und Katasterverwaltung. Mit Genehmigung des Landesamtes f&uuml;r Vermessung und Geobasisinformation Rheinland-Pfalz.</p>', '2021-01-29 04:05:43'),
(57, 24, 'amt', 'Muster', '<p>Geobasisdaten der Vermessungs- und Katasterverwaltung.&nbsp;</p>', '2021-01-29 10:56:10');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `einwendung`
--

CREATE TABLE `einwendung` (
  `id` int(11) NOT NULL,
  `verfahrennummer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_art` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `verfasser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abteilung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anhange` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aktenzeichen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `karte`
--

CREATE TABLE `karte` (
  `id` int(11) NOT NULL,
  `ort` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bilder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `planes`
--

CREATE TABLE `planes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inhalt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `auszuge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auslage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_nach` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verfahren_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nummer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `art` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ort` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `link` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `planes`
--

INSERT INTO `planes` (`id`, `title`, `inhalt`, `plan`, `created_at`, `category_id`, `user_id`, `auszuge`, `auslage`, `plan_nach`, `verfahren_id`, `name`, `nummer`, `art`, `ort`, `lat`, `lng`, `link`) VALUES
(19, 'Ortschaft 1', '	Feststellung der UVP-Pflicht In dem Vereinfachten Flurbereinigungsverfahren Ilbeheim ist der Bau gemeinschaftlicher und öffentlicher Anlagen im Sinne des Flurbereinigungsgesetzes vorgesehen. Das Vorhaben wird nach Einschätzung der Aufsichts- und Dienstle', 'https://picsum.photos/id/237/200/300', '2020-12-17 02:56:48', 9, NULL, '', '', '', 1, '', '', '', '', 0, 0, ''),
(20, 'Ortschaft 2', '	Feststellung der UVP-Pflicht\r\nIn dem Vereinfachten Flurbereinigungsverfahren Ilbeheim ist der Bau gemeinschaftlicher und öffentlicher Anlagen im Sinne des Flurbereinigungsgesetzes vorgesehen.\r\nDas Vorhaben wird nach Einschätzung der Aufsichts- und Dienst', 'https://picsum.photos/id/237/200/300', '2020-12-17 02:56:48', 9, NULL, '', '', '', 2, '', '', '', '', 0, 0, ''),
(21, 'Ortschaft 1', '	Feststellung der UVP-Pflicht\r\nIn dem Vereinfachten Flurbereinigungsverfahren Ilbeheim ist der Bau gemeinschaftlicher und öffentlicher Anlagen im Sinne des Flurbereinigungsgesetzes vorgesehen.\r\nDas Vorhaben wird nach Einschätzung der Aufsichts- und Dienst', 'https://picsum.photos/id/237/200/300', '2020-12-17 02:56:48', 10, NULL, '', '', '', 1, '', '', '', '', 0, 0, ''),
(22, 'Ortschaft 2', '	Feststellung der UVP-Pflicht\r\nIn dem Vereinfachten Flurbereinigungsverfahren Ilbeheim ist der Bau gemeinschaftlicher und öffentlicher Anlagen im Sinne des Flurbereinigungsgesetzes vorgesehen.\r\nDas Vorhaben wird nach Einschätzung der Aufsichts- und Dienst', 'https://picsum.photos/id/237/200/300', '2020-12-17 02:56:48', 10, NULL, '', '', '', 2, '', '', '', '', 0, 0, ''),
(23, 'Ortschaft 1', '	Feststellung der UVP-Pflicht\r\nIn dem Vereinfachten Flurbereinigungsverfahren Ilbeheim ist der Bau gemeinschaftlicher und öffentlicher Anlagen im Sinne des Flurbereinigungsgesetzes vorgesehen.\r\nDas Vorhaben wird nach Einschätzung der Aufsichts- und Dienst', 'https://picsum.photos/id/237/200/300', '2020-12-17 02:56:48', 11, NULL, '', '', '', 1, '', '', '', '', 0, 0, ''),
(24, 'Ortschaft 2', '	Feststellung der UVP-Pflicht\r\nIn dem Vereinfachten Flurbereinigungsverfahren Ilbeheim ist der Bau gemeinschaftlicher und öffentlicher Anlagen im Sinne des Flurbereinigungsgesetzes vorgesehen.\r\nDas Vorhaben wird nach Einschätzung der Aufsichts- und Dienst', 'https://picsum.photos/id/237/200/300', '2020-12-17 02:56:48', 11, NULL, '', '', '', 2, '', '', '', '', 0, 0, ''),
(25, 'Ortschaft 1', '	Feststellung der UVP-Pflicht\r\nIn dem Vereinfachten Flurbereinigungsverfahren Ilbeheim ist der Bau gemeinschaftlicher und öffentlicher Anlagen im Sinne des Flurbereinigungsgesetzes vorgesehen.\r\nDas Vorhaben wird nach Einschätzung der Aufsichts- und Dienst', 'https://picsum.photos/id/237/200/300', '2020-12-17 02:56:48', 12, NULL, '', '', '', 1, '', '', '', '', 0, 0, ''),
(26, 'Ortschaft 2', '	Feststellung der UVP-Pflicht\r\nIn dem Vereinfachten Flurbereinigungsverfahren Ilbeheim ist der Bau gemeinschaftlicher und öffentlicher Anlagen im Sinne des Flurbereinigungsgesetzes vorgesehen.\r\nDas Vorhaben wird nach Einschätzung der Aufsichts- und Dienst', 'https://picsum.photos/id/237/200/300', '2020-12-17 02:56:48', 12, NULL, '', '', '', 2, '', '', '', '', 0, 0, ''),
(27, 'Ortschaft 2 Badenheimgffhgj', '	Feststellung der UVP-Pflicht\r\nIn dem Vereinfachten Flurbereinigungsverfahren Ilbeheim ist der Bau gemeinschaftlicher und öffentlicher Anlagen im Sinne des Flurbereinigungsgesetzes vorgesehen.\r\nDas Vorhaben wird nach Einschätzung der Aufsichts- und Dienst', 'https://picsum.photos/id/237/200/300', '2020-12-21 15:42:20', 10, NULL, '', '', '', 1, '', '', '', '', 0, 0, ''),
(28, 'Flurbereinigung', '	Feststellung der UVP-Pflicht\r\nIn dem Vereinfachten Flurbereinigungsverfahren Ilbeheim ist der Bau gemeinschaftlicher und öffentlicher Anlagen im Sinne des Flurbereinigungsgesetzes vorgesehen.\r\nDas Vorhaben wird nach Einschätzung der Aufsichts- und Dienst', 'https://picsum.photos/id/237/200/300', '2020-12-21 15:42:49', 11, NULL, '', '', '', 2, '', '', '', '', 0, 0, ''),
(29, 'Flurbereinigung', '	Feststellung der UVP-Pflicht\r\nIn dem Vereinfachten Flurbereinigungsverfahren Ilbeheim ist der Bau gemeinschaftlicher und öffentlicher Anlagen im Sinne des Flurbereinigungsgesetzes vorgesehen.\r\nDas Vorhaben wird nach Einschätzung der Aufsichts- und Dienst', 'https://picsum.photos/id/237/200/300', '2020-12-21 15:58:46', 12, 13, '', '', '', 1, '', '', '', '', 0, 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` int(11) NOT NULL,
  `benutzname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `first_name`, `last_name`, `reference`, `telefon`, `benutzname`) VALUES
(13, 'max.muster@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$ZU5ROHNkZEJ6SWllbXdRdw$Z13hOnYawUMhGHDLAqwWyIGsqnpF7ex2acd3k8Z9F+I', 'Max', 'muster', '', 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `verfahren`
--

CREATE TABLE `verfahren` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nummer` int(11) NOT NULL,
  `art` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `groesse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kosten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finanzierung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ort` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `verfahren`
--

INSERT INTO `verfahren` (`id`, `name`, `nummer`, `art`, `groesse`, `kosten`, `finanzierung`, `ort`, `lat`, `lng`) VALUES
(1, 'Adenauer Bach Süd', 31266, 'Beschleunigte Zusammenlegung nach §91', '', '', '', 'Ilbesheim', 49.693313, 8.079472),
(2, 'Allenbach-Wirschweiler', 61110, 'Vereinfachte Flurbereinigung nach §86(1) Nr.1', '', '', '', 'Simmern', 0, 0),
(3, 'Ilbesheim', 21126, 'Vereinfachte Flurbereinigung nach §86(1) Nr.1', '', '', '', 'Ilbesheim', 49.693313, 8.079472);

-- --------------------------------------------------------

--
-- Structure de la table `vertreta`
--

CREATE TABLE `vertreta` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nachname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `behoerde_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vollmacht`
--

CREATE TABLE `vollmacht` (
  `id` int(11) NOT NULL,
  `vollmachtgeber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bevollmachtiger` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordnummer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `wiedersprueche`
--

CREATE TABLE `wiedersprueche` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nachname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordnumer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `behoerde`
--
ALTER TABLE `behoerde`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bekanntgabetermin`
--
ALTER TABLE `bekanntgabetermin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `beteiligte`
--
ALTER TABLE `beteiligte`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9474526C7294869C` (`article_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `einwendung`
--
ALTER TABLE `einwendung`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `karte`
--
ALTER TABLE `karte`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F677FF0612469DE2` (`category_id`),
  ADD KEY `IDX_F677FF06A76ED395` (`user_id`),
  ADD KEY `IDX_F677FF06BD3D1FC8` (`verfahren_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- Index pour la table `verfahren`
--
ALTER TABLE `verfahren`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vertreta`
--
ALTER TABLE `vertreta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_62E74219DCAFC59C` (`behoerde_id`);

--
-- Index pour la table `vollmacht`
--
ALTER TABLE `vollmacht`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `wiedersprueche`
--
ALTER TABLE `wiedersprueche`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `behoerde`
--
ALTER TABLE `behoerde`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `bekanntgabetermin`
--
ALTER TABLE `bekanntgabetermin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `beteiligte`
--
ALTER TABLE `beteiligte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `einwendung`
--
ALTER TABLE `einwendung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `karte`
--
ALTER TABLE `karte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `verfahren`
--
ALTER TABLE `verfahren`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `vertreta`
--
ALTER TABLE `vertreta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `vollmacht`
--
ALTER TABLE `vollmacht`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `wiedersprueche`
--
ALTER TABLE `wiedersprueche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526C7294869C` FOREIGN KEY (`article_id`) REFERENCES `planes` (`id`);

--
-- Contraintes pour la table `planes`
--
ALTER TABLE `planes`
  ADD CONSTRAINT `FK_F677FF0612469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_F677FF06A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_F677FF06BD3D1FC8` FOREIGN KEY (`verfahren_id`) REFERENCES `verfahren` (`id`);

--
-- Contraintes pour la table `vertreta`
--
ALTER TABLE `vertreta`
  ADD CONSTRAINT `FK_62E74219DCAFC59C` FOREIGN KEY (`behoerde_id`) REFERENCES `behoerde` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
