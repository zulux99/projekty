-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 20 Maj 2018, 20:27
-- Wersja serwera: 10.1.28-MariaDB
-- Wersja PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `jakubstrugalaabdszkola`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klasa`
--

CREATE TABLE `klasa` (
  `id_klasy` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `rocznik` int(11) NOT NULL,
  `idszkoly` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klasa`
--

INSERT INTO `klasa` (`id_klasy`, `nazwa`, `rocznik`, `idszkoly`) VALUES
(1, '1ti1', 1, 1),
(2, '1ti2', 1, 1),
(3, '1ti1', 2001, 1),
(4, '1tm', 2001, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nauczyciel`
--

CREATE TABLE `nauczyciel` (
  `id_nauczyciela` int(11) NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `adres_m` text COLLATE utf8_polish_ci NOT NULL,
  `telefon` int(11) NOT NULL,
  `przedmiot` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `nauczyciel`
--

INSERT INTO `nauczyciel` (`id_nauczyciela`, `imie`, `nazwisko`, `adres_m`, `telefon`, `przedmiot`) VALUES
(1, 'Adam', 'Nieznany', 'rawicz', 123123123, 'fizyka'),
(3, 'bbbb', 'bb', 'bbbbb', 333, 'bbbb'),
(4, 'undefined', 'undefined', 'undefined', 0, 'undefined');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nauczyciel_szkola`
--

CREATE TABLE `nauczyciel_szkola` (
  `id_ns` int(11) NOT NULL,
  `id_nauczyciela` int(11) NOT NULL,
  `id_szkoly` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `nauczyciel_szkola`
--

INSERT INTO `nauczyciel_szkola` (`id_ns`, `id_nauczyciela`, `id_szkoly`) VALUES
(1, 1, 1),
(5, 4, 4),
(6, 4, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `szkola`
--

CREATE TABLE `szkola` (
  `id_szkoly` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `adres_m` text COLLATE utf8_polish_ci NOT NULL,
  `adres_ul` text COLLATE utf8_polish_ci NOT NULL,
  `adres_nr` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `szkola`
--

INSERT INTO `szkola` (`id_szkoly`, `nazwa`, `adres_m`, `adres_ul`, `adres_nr`) VALUES
(1, 'Zst', 'Leszno', 'Garbiela narutowiczna', '63'),
(4, 'nazwa', 'miasto', 'ulica', '1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uczen`
--

CREATE TABLE `uczen` (
  `id_ucznia` int(11) NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `adres_m` text COLLATE utf8_polish_ci NOT NULL,
  `telefon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uczen`
--

INSERT INTO `uczen` (`id_ucznia`, `imie`, `nazwisko`, `adres_m`, `telefon`) VALUES
(1, 'jakub', 'Strugała', 'Rozstępniewo', 123321123),
(2, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(3, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(4, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(5, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(6, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(7, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(8, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(9, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(10, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(11, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(12, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(13, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(14, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(15, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(16, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(17, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(18, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(19, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(20, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(21, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(22, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(23, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(24, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(25, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(26, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(27, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(28, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(29, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(30, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(31, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(32, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(33, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(34, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(35, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(36, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(37, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(38, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(39, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(40, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(41, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(42, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(43, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(44, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(45, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(46, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(47, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(48, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(49, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(50, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(51, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(52, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(53, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(54, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(55, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(56, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(57, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(58, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(59, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(60, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(61, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(62, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(63, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(64, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(65, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(66, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(67, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(68, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(69, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(70, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(71, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(72, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(73, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(74, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(75, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(76, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(77, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(78, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(79, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(80, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(81, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(82, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(83, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(84, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(85, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(86, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(87, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(88, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(89, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(90, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(91, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(92, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(93, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(94, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(95, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(96, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(97, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(98, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(99, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(100, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(101, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(102, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(103, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(104, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(105, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(106, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(107, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(108, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(109, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(110, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(111, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(112, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(113, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(114, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(115, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(116, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(117, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(118, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(119, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(120, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(121, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(122, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(123, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(124, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(125, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(126, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(127, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(128, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(129, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(130, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(131, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(132, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(133, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(134, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(135, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(136, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(137, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(138, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(139, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(140, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(141, 'asdasd', 'dasdasd', 'asdasdasd', 123123213),
(142, 'asdasd', 'dasdasd', 'asdasdasd', 123123213);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uczen_klasa`
--

CREATE TABLE `uczen_klasa` (
  `id_uk` int(11) NOT NULL,
  `id_ucznia` int(11) NOT NULL,
  `id_klasy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uczen_klasa`
--

INSERT INTO `uczen_klasa` (`id_uk`, `id_ucznia`, `id_klasy`) VALUES
(1, 2, 1),
(2, 3, 1),
(3, 4, 1),
(4, 5, 1),
(5, 6, 1),
(6, 7, 1),
(7, 8, 1),
(8, 9, 1),
(9, 10, 1),
(10, 11, 1),
(11, 12, 1),
(12, 13, 1),
(13, 14, 1),
(14, 15, 1),
(15, 16, 1),
(16, 17, 1),
(17, 18, 1),
(18, 19, 1),
(19, 20, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zapisani_do_klasy`
--

CREATE TABLE `zapisani_do_klasy` (
  `id_wpisu` int(11) NOT NULL,
  `id_nauczyciela` int(11) NOT NULL,
  `id_klasy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `zapisani_do_klasy`
--

INSERT INTO `zapisani_do_klasy` (`id_wpisu`, `id_nauczyciela`, `id_klasy`) VALUES
(1, 1, 2),
(3, 4, 1),
(4, 3, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `klasa`
--
ALTER TABLE `klasa`
  ADD PRIMARY KEY (`id_klasy`),
  ADD KEY `idszkoly` (`idszkoly`);

--
-- Indexes for table `nauczyciel`
--
ALTER TABLE `nauczyciel`
  ADD PRIMARY KEY (`id_nauczyciela`);

--
-- Indexes for table `nauczyciel_szkola`
--
ALTER TABLE `nauczyciel_szkola`
  ADD PRIMARY KEY (`id_ns`),
  ADD KEY `id_nauczyciela` (`id_nauczyciela`),
  ADD KEY `id_szkoly` (`id_szkoly`);

--
-- Indexes for table `szkola`
--
ALTER TABLE `szkola`
  ADD PRIMARY KEY (`id_szkoly`);

--
-- Indexes for table `uczen`
--
ALTER TABLE `uczen`
  ADD PRIMARY KEY (`id_ucznia`);

--
-- Indexes for table `uczen_klasa`
--
ALTER TABLE `uczen_klasa`
  ADD PRIMARY KEY (`id_uk`),
  ADD KEY `id_klasy` (`id_klasy`),
  ADD KEY `id_ucznia` (`id_ucznia`);

--
-- Indexes for table `zapisani_do_klasy`
--
ALTER TABLE `zapisani_do_klasy`
  ADD PRIMARY KEY (`id_wpisu`),
  ADD KEY `id_nauczyciela` (`id_nauczyciela`),
  ADD KEY `id_klasy` (`id_klasy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `klasa`
--
ALTER TABLE `klasa`
  MODIFY `id_klasy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `nauczyciel`
--
ALTER TABLE `nauczyciel`
  MODIFY `id_nauczyciela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `nauczyciel_szkola`
--
ALTER TABLE `nauczyciel_szkola`
  MODIFY `id_ns` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `szkola`
--
ALTER TABLE `szkola`
  MODIFY `id_szkoly` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `uczen`
--
ALTER TABLE `uczen`
  MODIFY `id_ucznia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT dla tabeli `uczen_klasa`
--
ALTER TABLE `uczen_klasa`
  MODIFY `id_uk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `zapisani_do_klasy`
--
ALTER TABLE `zapisani_do_klasy`
  MODIFY `id_wpisu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `klasa`
--
ALTER TABLE `klasa`
  ADD CONSTRAINT `klasa_ibfk_1` FOREIGN KEY (`idszkoly`) REFERENCES `szkola` (`id_szkoly`);

--
-- Ograniczenia dla tabeli `nauczyciel_szkola`
--
ALTER TABLE `nauczyciel_szkola`
  ADD CONSTRAINT `nauczyciel_szkola_ibfk_1` FOREIGN KEY (`id_nauczyciela`) REFERENCES `nauczyciel` (`id_nauczyciela`),
  ADD CONSTRAINT `nauczyciel_szkola_ibfk_2` FOREIGN KEY (`id_szkoly`) REFERENCES `szkola` (`id_szkoly`);

--
-- Ograniczenia dla tabeli `uczen_klasa`
--
ALTER TABLE `uczen_klasa`
  ADD CONSTRAINT `uczen_klasa_ibfk_1` FOREIGN KEY (`id_klasy`) REFERENCES `klasa` (`id_klasy`),
  ADD CONSTRAINT `uczen_klasa_ibfk_2` FOREIGN KEY (`id_ucznia`) REFERENCES `uczen` (`id_ucznia`);

--
-- Ograniczenia dla tabeli `zapisani_do_klasy`
--
ALTER TABLE `zapisani_do_klasy`
  ADD CONSTRAINT `zapisani_do_klasy_ibfk_1` FOREIGN KEY (`id_nauczyciela`) REFERENCES `nauczyciel` (`id_nauczyciela`),
  ADD CONSTRAINT `zapisani_do_klasy_ibfk_2` FOREIGN KEY (`id_klasy`) REFERENCES `klasa` (`id_klasy`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
