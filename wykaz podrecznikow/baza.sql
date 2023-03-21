-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 18 Mar 2018, 14:45
-- Wersja serwera: 10.1.29-MariaDB
-- Wersja PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `wykaz`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `glowna`
--

CREATE TABLE `glowna` (
  `id_glownej` int(11) NOT NULL,
  `id_klasy` int(11) NOT NULL,
  `id_ksiazki` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `glowna`
--

INSERT INTO `glowna` (`id_glownej`, `id_klasy`, `id_ksiazki`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 13),
(13, 1, 14),
(15, 1, 16),
(16, 1, 17),
(17, 1, 18),
(18, 1, 19),
(19, 1, 20),
(20, 1, 21),
(21, 1, 22),
(22, 1, 23),
(23, 2, 1),
(24, 2, 2),
(25, 2, 3),
(26, 2, 4),
(27, 2, 5),
(28, 2, 6),
(29, 2, 7),
(30, 2, 8),
(31, 2, 9),
(32, 2, 10),
(34, 2, 11),
(35, 2, 13),
(36, 2, 14),
(38, 2, 16),
(39, 2, 17),
(40, 2, 18),
(41, 2, 19),
(42, 2, 20),
(43, 2, 21),
(44, 2, 22),
(45, 2, 23),
(46, 3, 14),
(47, 3, 25),
(48, 3, 26),
(49, 3, 18),
(50, 3, 28),
(51, 3, 29),
(52, 3, 21),
(53, 3, 22),
(54, 3, 23),
(55, 3, 33),
(56, 4, 14),
(57, 4, 25),
(58, 4, 26),
(59, 4, 18),
(60, 4, 28),
(61, 4, 29),
(62, 4, 21),
(63, 4, 22),
(64, 4, 23),
(65, 4, 33),
(66, 5, 34),
(67, 5, 35),
(68, 5, 36),
(69, 5, 37),
(70, 5, 38),
(71, 5, 39),
(72, 5, 40),
(73, 5, 41),
(74, 5, 18),
(75, 5, 43),
(76, 5, 44),
(77, 5, 45),
(78, 5, 46),
(79, 5, 33),
(80, 5, 48),
(81, 6, 34),
(82, 6, 35),
(83, 6, 36),
(84, 6, 37),
(85, 6, 38),
(86, 6, 39),
(87, 6, 40),
(88, 6, 41),
(89, 6, 18),
(90, 6, 43),
(91, 6, 44),
(92, 6, 45),
(93, 6, 46),
(94, 6, 33),
(95, 6, 48),
(96, 7, 34),
(97, 7, 50),
(98, 7, 36),
(99, 7, 52),
(100, 7, 8),
(101, 7, 37),
(102, 7, 38),
(103, 7, 56),
(104, 7, 40),
(105, 7, 41),
(106, 7, 18),
(107, 7, 43),
(108, 7, 44),
(109, 7, 45),
(110, 7, 33),
(111, 7, 48),
(112, 8, 1),
(113, 8, 2),
(114, 8, 3),
(115, 8, 4),
(116, 8, 5),
(117, 8, 6),
(118, 8, 7),
(119, 8, 8),
(120, 8, 9),
(121, 8, 10),
(122, 8, 11),
(123, 8, 13),
(124, 8, 14),
(125, 8, 16),
(126, 8, 65),
(127, 8, 17),
(128, 8, 18),
(129, 8, 19),
(130, 8, 20),
(131, 8, 66),
(132, 8, 67),
(133, 8, 68),
(134, 9, 1),
(135, 9, 2),
(136, 9, 3),
(137, 9, 4),
(138, 9, 5),
(139, 9, 6),
(140, 9, 7),
(141, 9, 8),
(142, 9, 9),
(143, 9, 10),
(144, 9, 11),
(145, 9, 13),
(146, 9, 14),
(147, 9, 16),
(148, 9, 17),
(149, 9, 18),
(150, 9, 19),
(151, 9, 20),
(152, 9, 69),
(153, 9, 70),
(154, 10, 1),
(155, 10, 2),
(156, 10, 3),
(157, 10, 4),
(158, 10, 5),
(159, 10, 6),
(160, 10, 7),
(161, 10, 8),
(162, 10, 9),
(163, 10, 10),
(164, 10, 11),
(165, 10, 13),
(166, 10, 14),
(167, 10, 16),
(168, 10, 17),
(169, 10, 18),
(170, 10, 19),
(171, 10, 20),
(172, 10, 74),
(173, 10, 75),
(174, 10, 76),
(175, 10, 71),
(176, 10, 72),
(177, 10, 73),
(178, 11, 2),
(179, 11, 3),
(180, 11, 4),
(181, 11, 5),
(182, 11, 6),
(183, 11, 7),
(184, 11, 8),
(185, 11, 9),
(186, 11, 10),
(187, 11, 11),
(188, 11, 13),
(189, 11, 14),
(190, 11, 16),
(191, 11, 17),
(192, 11, 18),
(193, 11, 19),
(194, 11, 20),
(195, 11, 77),
(196, 11, 78),
(197, 11, 79),
(198, 11, 80),
(199, 12, 104),
(200, 12, 105),
(201, 12, 106),
(202, 12, 11),
(203, 12, 14),
(204, 12, 25),
(205, 12, 26),
(206, 12, 17),
(207, 12, 18),
(208, 12, 66),
(209, 12, 67),
(210, 12, 68),
(211, 12, 81),
(212, 12, 82),
(213, 12, 83),
(214, 12, 84),
(215, 12, 85),
(216, 13, 104),
(217, 13, 105),
(218, 13, 106),
(219, 13, 41),
(220, 13, 14),
(221, 13, 25),
(222, 13, 26),
(223, 13, 17),
(224, 13, 18),
(225, 13, 86),
(226, 13, 87),
(227, 13, 88),
(228, 14, 89),
(229, 14, 107),
(230, 14, 105),
(231, 14, 106),
(232, 14, 14),
(233, 14, 25),
(234, 14, 26),
(235, 14, 18),
(236, 14, 90),
(237, 14, 73),
(238, 14, 74),
(239, 14, 75),
(240, 14, 91),
(241, 14, 108),
(242, 14, 76),
(244, 15, 1),
(245, 15, 107),
(246, 15, 105),
(247, 15, 101),
(248, 15, 106),
(249, 15, 38),
(250, 15, 14),
(251, 15, 25),
(252, 15, 26),
(253, 15, 18),
(254, 15, 92),
(255, 15, 78),
(256, 15, 80),
(257, 15, 94),
(258, 16, 1),
(259, 16, 107),
(260, 16, 105),
(261, 16, 101),
(262, 16, 106),
(263, 16, 38),
(264, 16, 14),
(265, 16, 25),
(266, 16, 26),
(267, 16, 18),
(268, 16, 92),
(269, 16, 78),
(270, 16, 80),
(271, 16, 94),
(272, 17, 35),
(273, 17, 37),
(274, 17, 38),
(275, 17, 39),
(276, 17, 40),
(277, 17, 41),
(278, 17, 18),
(279, 17, 95),
(280, 17, 96),
(281, 17, 67),
(282, 17, 68),
(283, 18, 104),
(284, 18, 37),
(285, 18, 38),
(286, 18, 39),
(287, 18, 40),
(288, 18, 41),
(289, 18, 18),
(290, 18, 86),
(291, 18, 97),
(292, 18, 98),
(293, 18, 82),
(294, 18, 83),
(295, 18, 85),
(296, 19, 34),
(297, 19, 35),
(298, 19, 37),
(299, 19, 38),
(300, 19, 39),
(301, 19, 40),
(302, 19, 41),
(303, 19, 18),
(304, 19, 99),
(305, 19, 91),
(306, 19, 76),
(307, 20, 100),
(308, 20, 34),
(309, 20, 35),
(310, 20, 36),
(311, 20, 37),
(312, 20, 101),
(313, 20, 38),
(314, 20, 39),
(315, 20, 40),
(316, 20, 41),
(317, 20, 18),
(318, 20, 78),
(319, 20, 80),
(320, 20, 94),
(321, 21, 100),
(322, 21, 34),
(323, 21, 35),
(324, 21, 36),
(325, 21, 37),
(326, 21, 101),
(327, 21, 38),
(328, 21, 39),
(329, 21, 40),
(330, 21, 41),
(331, 21, 18),
(332, 21, 78),
(333, 21, 80),
(334, 21, 94),
(335, 22, 94),
(336, 23, 109),
(337, 23, 110),
(338, 23, 52),
(339, 23, 8),
(340, 23, 36),
(341, 23, 37),
(342, 23, 38),
(343, 23, 56),
(344, 23, 40),
(345, 23, 41),
(346, 23, 18),
(347, 23, 86),
(348, 23, 98),
(349, 23, 85),
(350, 24, 34),
(351, 24, 50),
(352, 24, 36),
(353, 24, 52),
(354, 24, 37),
(355, 24, 38),
(356, 24, 56),
(357, 24, 40),
(358, 24, 41),
(359, 24, 18),
(360, 25, 50),
(361, 25, 52),
(362, 25, 8),
(363, 25, 36),
(364, 25, 37),
(365, 25, 38),
(366, 25, 56),
(367, 25, 40),
(368, 25, 41),
(369, 25, 18),
(370, 25, 91),
(371, 25, 76),
(372, 25, 43),
(373, 25, 44),
(374, 25, 45),
(375, 25, 33),
(376, 25, 48);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klasa`
--

CREATE TABLE `klasa` (
  `id_klasy` int(11) NOT NULL,
  `numer` text COLLATE utf8_polish_ci NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klasa`
--

INSERT INTO `klasa` (`id_klasy`, `numer`, `nazwa`) VALUES
(1, '1', '1TI1'),
(2, '1', '1TI2'),
(3, '2', '2TI1'),
(4, '2', '2TI2'),
(5, '3', '3TI1'),
(6, '3', '3TI2'),
(7, '4', '4TI'),
(8, '1', '1TS'),
(9, '1', '1TP'),
(10, '1', '1ELE'),
(11, '1', '1TM'),
(12, '2', '2TSM'),
(13, '2', '2TP'),
(14, '2', '2ELE'),
(15, '2', '2TM1'),
(16, '2', '2TM2'),
(17, '3', '3TS'),
(18, '3', '3TOS'),
(19, '3', '3ELE'),
(20, '3', '3TM1'),
(21, '3', '3TM2'),
(22, '4', '4TLM'),
(23, '4', '4TOS'),
(24, '4', '4TS'),
(25, '4', '4TEI');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiazka`
--

CREATE TABLE `ksiazka` (
  `id_ksiazki` int(11) NOT NULL,
  `tytul` text COLLATE utf8_polish_ci NOT NULL,
  `autor` text COLLATE utf8_polish_ci NOT NULL,
  `wydawnictwo` text COLLATE utf8_polish_ci NOT NULL,
  `uwagi` text COLLATE utf8_polish_ci,
  `zdjecie` text COLLATE utf8_polish_ci,
  `zawod` text COLLATE utf8_polish_ci,
  `przedmiot` text COLLATE utf8_polish_ci NOT NULL,
  `k_przedmiot` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ksiazka`
--

INSERT INTO `ksiazka` (`id_ksiazki`, `tytul`, `autor`, `wydawnictwo`, `uwagi`, `zdjecie`, `zawod`, `przedmiot`, `k_przedmiot`) VALUES
(1, 'Bezpieczeństwo i higiena pracy', 'Wanda Bukała, Krzysztof Szczęch', 'WSiP', NULL, 'okladki/97.jpg', NULL, 'Bezpieczeństwo i higiena pracy', 'BHP'),
(2, 'Biologia. Po prostu zakres podstawowy', 'K.Archacka, R.Archacki, K.Spalik, J.Stocka', 'WSiP', NULL, 'okladki/12.jpg', NULL, 'Biologia', 'Bio'),
(3, 'To jest chemia Podręcznik dla szkół ponadgimnazjalnych Zakres podstawowy', 'R.Hassa, A.Mrzigod, J.Mrzigot', 'Nowa Era', NULL, 'okladki/13.jpg', NULL, 'Chemia', 'Chem'),
(4, 'Zyję i działam bezpiecznie', 'J.Słoma', 'Nowa Era', NULL, 'okladki/88.jpg', NULL, 'Edukacja dla Bezpieczeństwa', 'EdB'),
(5, 'Odkryć fizykę Podręcznik dla szkół ponadgimnazjalnych Zakres podstawowy', 'Marcin Braun, Weronika Śliwa', 'Nowa Era', NULL, 'okladki/14.jpg', NULL, 'Fizyka', 'Fiz'),
(6, 'Oblicza geografii książka; Karty pracy ucznia', 'Radosław Uliszak, Krzysztof Wiedermann; Małgorzata Kubik, Monika Nikołajew-Banaszewska', 'Nowa Era', NULL, 'okladki/11.jpg', NULL, 'Geografia', 'Geo'),
(7, 'Poznać przeszłość Wiek XX', 'S.Roszak, J.Kłaczkow', 'Nowa Era', NULL, 'okladki/8.jpg', NULL, 'Historia', 'His'),
(8, 'Poznać przeszłość Europa i świat', 'K.Kłodziński, T.Krzemiński', 'Nowa Era', NULL, 'okladki/81.jpg', NULL, 'Historia i społeczeństwo*', 'His*'),
(9, 'Informatyka dla szkół ponadgimnazjalnych Zakres podstawowy', 'Grażyna Koba', 'MiGra', NULL, 'okladki/16.jpg', NULL, 'Informatyka', 'Inf'),
(10, 'Matura Focus2 Student\'s Book A2 /B1', 'Sue Kay, Vaughan Jones, Daniel Brayshaw, Bartosz Michałowski', 'Pearson', NULL, 'okladki/5.jpg', NULL, 'Język Angielski', 'JA'),
(11, 'Meine Welttour 1', 'S.Mróz-Dwornikowska', 'Nowa Era', NULL, 'okladki/6.jpg', NULL, 'Język Niemiecki', 'JN'),
(13, 'Ponad słowami kl.I cz.1', 'M.Chmiel, E.Kostrzewa', 'Nowa Era', NULL, 'okladki/1.jpg', NULL, 'Język Polski', 'JP'),
(14, 'Ponad słowami kl.I cz. 2', 'M.Chmiel, A.Równy', 'Nowa Era', NULL, 'okladki/2.jpg', NULL, 'Język Polski', 'JP'),
(16, 'Matematyka - zakres rozszerzony cz.I', 'W.Babiański, L.Chańko, D.Ponczek', 'Nowa Era', NULL, 'okladki/15.jpg', NULL, 'Matematyka', 'Mat'),
(17, 'Ekonomia stosowana. Podręcznik do podstaw przedsiębiorczości.', 'praca zbiorowa pod red. Jarosława Nenemana', 'Fundacja Młodzieżowej Przedsiębiorczości , Warszawa', NULL, 'okladki/10.jpg', NULL, 'Podstawy Przedsiębiorczości', 'PP'),
(18, 'Moje miejsce w kościele', 'J.Szpet, D.Jackowiak', 'Wydawnictwo Święty Wojciech, Poznań', NULL, 'okladki/17.jpg', NULL, 'Religia', 'Rel'),
(19, 'Spotkania z kulturą', 'Monika Bokiniec, Barbara Forysiewicz', 'Nowa Era', NULL, 'okladki/7.jpg', NULL, 'Wiedza o Kulturze', 'WoK'),
(20, 'W centrum uwagi Wiedza o społeczeństwie', 'A.Janicki', 'Nowa Era', NULL, 'okladki/9.jpg', NULL, 'Wiedza o Społeczeństwie', 'WoS'),
(21, 'Przygotowanie stanowiska komputerowego do pracy cz. 1 i 2', 'Tomasz Marcinuk, Krzysztof Pytel, Sylwia Osetek', 'WSiP', NULL, 'okladki/21.jpg', 'Technik Informatyk', 'Urządzenia techniki komputerowej', 'Utk'),
(22, 'Użytkowanie urządzeń peryferyjnych komputera osobistego', 'Tomasz Marcinuk, Krzysztof Pytel, Sylwia Osetek', 'WSiP', NULL, 'okladki/22.jpg', 'Technik Informatyk', 'Urządzenia techniki komputerowej', 'Utk'),
(23, 'Naprawa komputera osobistego', 'Tomasz Marcinuk, Krzysztof Pytel, Sylwia Osetek', 'WSiP', NULL, 'okladki/23.jpg', 'Technik Informatyk', 'Urządzenia techniki komputerowej', 'Utk'),
(25, 'Matematyka - zakres rozszerzony cz.I i II', 'W.Babiański, L.Chańko, D.Ponczek', 'Nowa Era', NULL, 'okladki/44.jpg', NULL, 'Matematyka', 'Mat'),
(26, 'Matematyka - zakres rozszerzony cz.I i II', 'W.Babiański, L.Chańko, D.Ponczek', 'Nowa Era', NULL, 'okladki/45.jpg', NULL, 'Matematyka*', 'Mat*'),
(28, 'Information technology', 'Evans V., Dooley J., Wright S.', 'Express Publishing', NULL, 'okladki/61.jpg', 'Technik Informatyk', 'Język angielski w branży', 'Jawb'),
(29, 'Kwalifikacja E13. Projektowanie lokalnych sieci komputerowych i administrowanie sieciami. Podręcznik do nauki zawodu technik informatyk cz. 1 i 2.', 'Barbara Halska, Paweł Bensel', 'Helion', NULL, 'okladki/58.jpg', 'Technik Informatyk', 'Sieci komputerowe', 'Sk'),
(33, 'Witryny internetowe', 'Małgorzata Łokińska', 'WSiP', NULL, 'okladki/59.jpg', 'Technik Informatyk', 'Witryny i aplikacje internetowe', 'Wiai'),
(34, 'Zrozumieć fizykę 2 Podręcznik dla szkół ponadgimnazjalnych Zakres rozszerzony (z dostępem do matura-ROMu)', 'Marcin Braun, Agnieszka Seweryn-Byrczuk', 'Nowa Era', NULL, 'okladki/69.jpg', NULL, 'Fizyka*', 'Fiz*'),
(35, 'Poznać przeszłość Ojczysty Panteon i ojczyste spory', 'T.Maćkowski', 'Nowa Era', NULL, 'okladki/70.jpg', NULL, 'Historia i społeczeństwo*', 'His*'),
(36, 'Poznać przeszłość Rządzący i rządzeni', 'I.Janicka', 'Nowa Era', NULL, 'okladki/76.jpg', NULL, 'Historia i społeczeństwo*', 'His*'),
(37, 'Matura explorer-inter/ Gateway 3', 'J.Nauton, B.Polit/ praca zbiorowa', 'Nowa Era/ Macmillan', NULL, 'okladki/66.jpg', NULL, 'Język Angielski', 'JA'),
(38, 'Welttour 3', 'S.Mróz-Dwornikowska', 'Nowa Era', NULL, 'okladki/43.jpg', NULL, 'Język Niemiecki', 'JN'),
(39, 'Ponad słowami kl.II cz.1', 'M.Chmiel, E.Kostrzewa', 'Nowa Era', NULL, 'okladki/65.jpg', NULL, 'Język Polski', 'JP'),
(40, 'Matematyka - zakres rozszerzony cz.II i III', 'W.Babiański, L.Chańko, D.Ponczek', 'Nowa Era', NULL, 'okladki/67.jpg', NULL, 'Matematyka', 'Mat'),
(41, 'Matematyka - zakres rozszerzony cz.II i III', 'W.Babiański, L.Chańko, D.Ponczek', 'Nowa Era', NULL, 'okladki/68.jpg', NULL, 'Matematyka*', 'Mat*'),
(43, 'Kwalifikacja E14 cz.2 Tworzenie baz danych i administrowanie bazami. Podręcznik do nauki zawodu Technik Informatyk', 'Jolanta Kokolska', 'Helion', NULL, 'okladki/82.jpg', 'Technik Informatyk', 'Administracja bazami danych', 'Abd'),
(44, 'Kwalifikacja E.14 cz.1 Tworzenie stron internetowych', 'Jolanta Pokorska', 'Helion', NULL, 'okladki/83.jpg', 'Technik Informatyk', 'Programowanie aplikacji internetowych', 'Pai'),
(45, 'Kwalifikacja E.14 cz.3 Tworzenie aplikacji internetowych podręcznik do nauki zawodu technik informatyk', 'Jolanta Pokorska', 'Helion', NULL, 'okladki/84.jpg', 'Technik Informatyk', 'Programowanie aplikacji internetowych', 'Pai'),
(46, 'Kwalifikacja E14 cz. 2. Tworzewnie baz danych i administrowania bazami. Podręcznik do nauaki zawodu technik informatyk', 'Jolanta Pokorska', 'Helion', NULL, 'okladki/79.jpg', 'Technik Informatyk', 'Systemy baz danych', 'Sbd'),
(48, 'Aplikacje internetowe', 'Małgorzata Łokińska', 'WSiP', NULL, 'okladki/60.jpg', 'Technik Informatyk', 'Witryny i aplikacje internetowe', 'Wiai'),
(50, 'Zrozumieć fizykę 3 Podręcznik dla szkół ponadgimnazjalnych Zakres rozszerzony (z dostępem do matura-ROMu)', 'Marcin Braun, Agnieszka Seweryn-Byrczuk', 'Nowa Era', NULL, 'okladki/87.jpg', NULL, 'Fizyka*', 'Fiz*'),
(52, 'Poznać przeszłość Wojna i wojskowość', 'J.Centek', 'Nowa Era', NULL, 'okladki/80.jpg', NULL, 'Historia i społeczeństwo*', 'His*'),
(56, 'Ponad słowami kl.III', 'M.Chmiel, E.Kostrzewa', 'Nowa Era', NULL, 'okladki/85.jpg', NULL, 'Język Polski', 'JP'),
(65, 'Podstawy konstrukcji maszyn cz.1 i cz.2', 'Piotr Boś', 'WKŁ', NULL, 'okladki/33.jpg', 'Technik Pojazdów Samochodowych', 'Podstawy konstrukcji maszyn', 'Pkm'),
(66, 'Elektryczne i elektroniczne wyposażenie pojazdów samochodowych cz.1', 'Krzysztof Pacholski', 'WKiŁ', NULL, 'okladki/36.jpg', 'Technik Pojazdów Samochodowych', 'Technologia napraw elektrycznych i elektronicznych układów pojazdów samochodowych', 'Tneieups'),
(67, 'Podwozia i nadwozia pojazdów samochodowych', 'Marek Gabryelewicz', 'WKiŁ', NULL, 'okladki/34.jpg', 'Technik Pojazdów Samochodowych', 'Technologia napraw zespołów i podzespołow mechanicznych pojazdów samochodowych', 'Tnzipmps'),
(68, 'Silniki pojazdów samochodowych', 'Piotr Zając', 'WKiŁ', NULL, 'okladki/35.jpg', 'Technik Pojazdów Samochodowych', 'Technologia napraw zespołów i podzespołow mechanicznych pojazdów samochodowych', 'Tnzipmps'),
(69, 'Transport i spedycja', 'M. Stajniak, M. Foltyński, M. Hajdul, A. Krupa', 'WSL Poznań', NULL, 'okladki/31.jpg', 'Technik Spedytor', 'Podstawy transportu i spedycji', 'Ptis'),
(70, 'Środki transportu', 'R. Kacperczyk', 'Difin', NULL, 'okladki/32.jpg', 'Technik Spedytor', 'Przewóz ładunków', 'Pł'),
(71, 'Elektrotechnika', 'Stanisław Bolkowski', 'WSiP', NULL, 'okladki/18.jpg', 'Technik Elektronik', 'Elektrotechnika i elektronika', 'Eie'),
(72, 'Elektronika', 'Grzegorz Płoszajski, August Chwaleba, Bogdan Moescheke', 'WSiP', NULL, 'okladki/19.jpg', 'Technik Elektronik', 'Elektrotechnika i elektronika', 'Eie'),
(73, 'Urządzenia elektroniczne cz.1 i cz.2', 'Sylwia Żyburt-Wasilewska', 'WSiP', NULL, 'okladki/20.jpg', 'Technik Elektronik', 'Urządzenia elektroniczne', 'Ue'),
(74, 'Elektrotechnika', 'Stanisław Bolkowski', 'WSiP', NULL, 'okladki/26.jpg', 'Technik Elektryk', 'Elektrotechnika i elektronika', 'Eie'),
(75, 'Elektronika', 'Grzegorz Płoszajski, August Chwaleba, Bogdan Moescheke', 'WSiP', NULL, 'okladki/27.jpg', 'Technik Elektryk', 'Elektrotechnika i elektronika', 'Eie'),
(76, 'Maszyny elektryczne', 'Elżbieta Goźlińska', 'WSiP', NULL, 'okladki/25.jpg', 'Technik Elektryk', 'Maszyny i urządzenia elektryczne', 'Miue'),
(77, 'Elektrotechnika', 'Stanisław Bolkowski', 'WSiP', NULL, 'okladki/28.jpg', 'Technik Mechatronik', 'Elektrotechnika i elektronika', 'Eie'),
(78, 'Podstawy mechatroniki', 'prac. zbior. pod kier. M. Olszewski', 'REA', NULL, 'okladki/30.jpg', 'Technik Mechatronik', 'Pneumatyka i hydraulika', 'Pih'),
(79, 'Podstawy elektrotechniki w praktyce', 'Artur Bielawski', 'WSiP', NULL, 'okladki/98.jpg', 'Technik Mechatronik', 'Podstawy mechatroniki', 'pod-mech'),
(80, 'Podstawy konstrukcji maszyn cz. 1 i 2', 'Piotr Boś', 'WKiŁ', NULL, 'okladki/29.jpg', 'Technik Mechatronik', 'Technologie i konstrukcje mechaniczne', 'Tikm'),
(81, 'Modelowanie form odzieży damskiej', 'E. Stark, B. Tymolewska', 'SOP Toruń', NULL, 'okladki/50.jpg', 'Technik Technologii Odzieży', 'Konstrukcja i modelowanie odzieży', 'Kimo'),
(82, 'Materiałoznawstwo odzieżowe', 'J. Idryjan-Pajor', 'SOP Toruń', NULL, 'okladki/48.jpg', 'Technik Technologii Odzieży', 'Materiałoznawstwo odzieżowe', 'Mo'),
(83, 'Podstawy projektowania odzieży', 'E.Fałkowska-Rękawek', 'WSiP', NULL, 'okladki/47.jpg', 'Technik Technologii Odzieży', 'Stylizacja ubiorów', 'Su'),
(84, 'Techniki szycia odzieży damskiej', 'E. Stark, Z. Lipke-Skrawek', 'SOP Toruń', NULL, 'okladki/51.jpg', 'Technik Technologii Odzieży', 'Techniki konfekcjonowania odzieży', 'Tko'),
(85, 'Modelowanie form odzieży - SOP', 'Elżbieta Lewandowska', 'SOP', NULL, 'okladki/49.jpg', 'Technik Technologii Odzieży', 'Technologia wytwarzania odzieży', 'Two'),
(86, 'Career paths. Logistics', 'V.Evans, J.Dooley, D.Buchannan', 'Express Publishing', NULL, 'okladki/54.jpg', 'Technik Spedytor', 'Język angielski w branży', 'Jawb'),
(87, 'Korzystanie z platformy internetowej', '-', '-', '', 'okladki/52.jpg', 'Technik Spedytor', 'Podstawy organizacji przedsiębiorstwa transportowospedycyjnego', 'Popt'),
(88, 'Przewóz ładunków', 'M. Wiszniewska', 'Difin', NULL, 'okladki/53.jpg', 'Technik Spedytor', 'Przewóz ładunków', 'Pł'),
(89, 'Podstawy elektroniki cz.1', 'Barbara Pióro, Marek Pióro', 'WSiP', NULL, 'okladki/89.jpg', 'Technik Elektronik', 'Elektrotechnika i elektronika', 'Eie'),
(90, 'Język angielski zawodowy elektronicznej, informatycznej i elektrycznej.', 'Sebastian Chadaj', 'WSiP', NULL, 'okladki/64.jpg', 'Technik Elektronik', 'Język angielski w branży', 'Jawb'),
(91, 'Instalacje i urządzenia elektroenergetyczne', 'Edward Musiał', 'WSiP', NULL, 'okladki/62.jpg', 'Technik Elektryk', 'Instalacje elektryczne', 'Ie'),
(92, 'Podstawy mechatroniki', 'prac. zbior. pod kier. M. Olszewski', 'REA', NULL, 'okladki/55.jpg', 'Technik Mechatronik', 'Elektrotechnika i elektronika', 'Eie'),
(94, 'Urządzenia i systemy mechatroniczne cz. 1 i 2', 'prac zbior pod kier Mariusz Olszewskiego', '-', NULL, 'okladki/56.jpg', 'Technik Mechatronik', 'Urządzenia i systemy mechatroniczne', 'Uism'),
(95, 'Career Paths Mechanics 1', 'Dearholt Jim D.', 'Express Publishing', NULL, 'okladki/72.jpg', 'Technik Pojazdów Samochodowych', 'Język angielski w branży', 'Jawb'),
(96, 'Elektryczne i elektroniczne wyposażenie pojazdów samochodowych cz.2', 'Krzysztof Pacholski', 'WKiŁ', NULL, 'okladki/71.jpg', 'Technik Pojazdów Samochodowych', 'Technologia napraw elektrycznych i elektronicznych układów pojazdów samochodowych', 'Tneieups'),
(97, 'Zarys statystyki. Podręcznik do nauczania zawodu z branży ekonomicznej', 'Alicja Maksimowicz-Ajchel', 'WSiP', NULL, 'okladki/75.jpg', 'Technik Spedytor', 'Statystyka', 'St'),
(98, 'Konstrukcja i modelowanie odzieży lekkiej', 'K.Trzecińska', 'WSiP', NULL, 'okladki/74.jpg', 'Technik Technologii Odzieży', 'Konstrukcja i modelowanie form odzieży', 'Kimfo'),
(99, 'Układy mikroprocesorowe', 'Ryszard Krzyżanowski', 'PWN', NULL, 'okladki/78.jpg', 'Technik Elektronik', 'Urządzenia elektroniczne', 'Ue'),
(100, 'Podstawy elektroniki cz.2', 'Barbara Pióro, Marek Pióro', 'WSiP', NULL, 'okladki/77.jpg', 'Technik Mechatronik', 'Elektrotechnika i elektronika', 'Eie'),
(101, 'Career Paths Mechabical Engieneering', 'V.Evans, J.Dooley, J.Kern', 'Express Publishing', NULL, 'okladki/57.jpg', 'Technik Mechatronik', 'Język angielski w branży', 'Jawb'),
(104, 'Oblicza geografii 1 zakres rozszerzony / Oblicza geografii 1 maturalne karty pracy', 'Roman Malarz, Marek Więckowski / Anna Karaś, Ewa Grząba', 'Nowa Era', NULL, 'okladki/73.jpg', NULL, 'Geografia*', 'Geo*'),
(105, 'Matura explorer-pre/ Gateway 2', 'J.Nauton, B.Polit/ praca zbiorowa', 'Nowa Era/ Macmillan', NULL, 'okladki/41.jpg', NULL, 'Język Angielski', 'JA'),
(106, 'Welttour 2', 'S.Mróz-Dwornikowska', 'Nowa Era', NULL, 'okladki/42.jpg', NULL, 'Język Niemiecki', 'JN'),
(107, 'Zrozumieć fizykę 1 Podręcznik dla szkół ponadgimnazjalnych Zakres rozszerzony (z dostępem do matura-ROMu)', 'Marcin Braun, Agnieszka Seweryn-Byrczuk', 'Nowa Era', NULL, 'okladki/46.jpg', NULL, 'Fizyka*', 'Fiz*'),
(108, 'Język angielski zawodowy elektronicznej, informatycznej i elektrycznej.', 'Sebastian Chadaj', 'WSiP', NULL, 'okladki/63.jpg', 'Technik Elektryk', 'Język angielski w branży', 'Jawb'),
(109, 'Oblicza geografii 3 zakres rozszerzony/Oblicza geografii 3 maturalne karty pracy', 'Marek Więckowski , Roman Malarz', 'Nowa Era', NULL, 'okladki/86.jpg', NULL, 'Geografia*', 'Geo*'),
(110, 'Oblicza geografii 2 zakres rozszerzony/Oblicza geografii 2 maturalne karty pracy', 'Marek Więckowski , Roman Malarz', 'Nowa Era', NULL, 'okladki/96.jpg', NULL, 'Geografia*', 'Geo*');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `glowna`
--
ALTER TABLE `glowna`
  ADD PRIMARY KEY (`id_glownej`),
  ADD KEY `glowna_ibfk_1` (`id_klasy`),
  ADD KEY `glowna_ibfk_2` (`id_ksiazki`);

--
-- Indexes for table `klasa`
--
ALTER TABLE `klasa`
  ADD PRIMARY KEY (`id_klasy`);

--
-- Indexes for table `ksiazka`
--
ALTER TABLE `ksiazka`
  ADD PRIMARY KEY (`id_ksiazki`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `glowna`
--
ALTER TABLE `glowna`
  MODIFY `id_glownej` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=377;

--
-- AUTO_INCREMENT dla tabeli `klasa`
--
ALTER TABLE `klasa`
  MODIFY `id_klasy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT dla tabeli `ksiazka`
--
ALTER TABLE `ksiazka`
  MODIFY `id_ksiazki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `glowna`
--
ALTER TABLE `glowna`
  ADD CONSTRAINT `glowna_ibfk_1` FOREIGN KEY (`id_klasy`) REFERENCES `klasa` (`id_klasy`),
  ADD CONSTRAINT `glowna_ibfk_2` FOREIGN KEY (`id_ksiazki`) REFERENCES `ksiazka` (`id_ksiazki`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
