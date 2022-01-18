-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Maj 2018, 13:55
-- Wersja serwera: 10.1.28-MariaDB
-- Wersja PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `naszaklasa`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klasa`
--

CREATE TABLE `klasa` (
  `id_klasy` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `rocznik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klasa`
--

INSERT INTO `klasa` (`id_klasy`, `nazwa`, `rocznik`) VALUES
(6, '3ti2', 1999),
(7, '3ti1', 1999);

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
(3, 'asdsa', 'jacek', 'dsadsa', 21321, 'matma'),
(5, 'jacek', 'tomczak', 'widziszewo', 332112231, 'polak'),
(6, 'kamil', 'nowak', 'widziszewo', 321321321, 'chemia');

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
(6, 3, 3);

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
(3, 'konior', 'leszno', 'narutowicza', '74');

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
(3, 'kamil', 'rzanny', 'widziszewo', 321321321);

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
(7, 3, 6);

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
(8, 3, 6);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `klasa`
--
ALTER TABLE `klasa`
  ADD PRIMARY KEY (`id_klasy`);

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
  ADD KEY `id_klasy` (`id_klasy`),
  ADD KEY `id_nauczyciela` (`id_nauczyciela`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `klasa`
--
ALTER TABLE `klasa`
  MODIFY `id_klasy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `nauczyciel`
--
ALTER TABLE `nauczyciel`
  MODIFY `id_nauczyciela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id_ucznia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `uczen_klasa`
--
ALTER TABLE `uczen_klasa`
  MODIFY `id_uk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `zapisani_do_klasy`
--
ALTER TABLE `zapisani_do_klasy`
  MODIFY `id_wpisu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ograniczenia dla zrzutów tabel
--

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
  ADD CONSTRAINT `zapisani_do_klasy_ibfk_1` FOREIGN KEY (`id_klasy`) REFERENCES `klasa` (`id_klasy`),
  ADD CONSTRAINT `zapisani_do_klasy_ibfk_2` FOREIGN KEY (`id_nauczyciela`) REFERENCES `nauczyciel` (`id_nauczyciela`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
