-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 24 Maj 2018, 10:55
-- Wersja serwera: 10.1.32-MariaDB
-- Wersja PHP: 7.2.5

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
  `rocznik` int(11) NOT NULL,
  `id_szkoly` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klasa`
--

INSERT INTO `klasa` (`id_klasy`, `nazwa`, `rocznik`, `id_szkoly`) VALUES
(1, '1TI1', 2001, 3),
(3, '2TI1', 2000, 2),
(4, '3TI1', 1999, 1),
(5, '4TI1', 1998, 0);

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
(1, 'Bartosz', 'Bartkowiak', 'Osieczna', 713421452, 'Matematyka'),
(2, 'Adam', 'Nowak', 'Kościan', 721312312, 'Język polski'),
(3, 'Maciej', 'Wczorajszy', 'Poznań', 721421412, 'Język angielski'),
(4, 'Wiktoria', 'Baran', 'Krzemieniewo', 518958971, 'SBD');

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
(2, 2, 2),
(3, 3, 3),
(4, 4, 1);

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
(1, 'Zespół Szkół Technicznych', 'Leszno', 'Narutowicza', '74a'),
(2, 'Liceum ogólnokształcące', 'Leszno', 'Błotna', '24c'),
(3, 'Zespół Szkół Ekonomicznych im. J.A. Komeńskiego', 'Leszno', 'Leśna', '81');

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
(1, 'Jan', 'Kowalski', 'Leszno', 721341412),
(2, 'Szymon', 'Daleki', 'Święciechowa', 821347241),
(3, 'Mirosław', 'Zagrobelny', 'Śmigiel', 723112412),
(4, 'Kornelia', 'Król', 'Krzywiń', 718658424),
(5, 'Mateusz', 'Jankowski', 'Święciechowa', 742141241),
(6, 'Aleksander', 'Małecki', 'Kościan', 723132142),
(7, 'Maciej', 'Majewski', 'Śmigiel', 824142142),
(8, 'Aleksandra', 'Pawlak', 'Widziszewo', 621452152),
(9, 'Adrian', 'Wróblewski', 'Poniec', 521697484),
(10, 'Zuzanna', 'Woźniak', 'Rawicz', 589758367);

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
(1, 1, 1),
(2, 3, 3),
(3, 2, 4),
(4, 5, 1),
(5, 4, 4),
(6, 9, 3),
(7, 8, 3),
(8, 7, 1),
(9, 6, 4),
(10, 10, 5);

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
(3, 2, 3),
(4, 2, 4),
(5, 1, 1),
(6, 1, 4),
(7, 4, 3),
(8, 4, 5),
(9, 3, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klasa`
--
ALTER TABLE `klasa`
  ADD PRIMARY KEY (`id_klasy`);

--
-- Indeksy dla tabeli `nauczyciel`
--
ALTER TABLE `nauczyciel`
  ADD PRIMARY KEY (`id_nauczyciela`);

--
-- Indeksy dla tabeli `nauczyciel_szkola`
--
ALTER TABLE `nauczyciel_szkola`
  ADD PRIMARY KEY (`id_ns`),
  ADD KEY `id_nauczyciela` (`id_nauczyciela`),
  ADD KEY `id_szkoly` (`id_szkoly`);

--
-- Indeksy dla tabeli `szkola`
--
ALTER TABLE `szkola`
  ADD PRIMARY KEY (`id_szkoly`);

--
-- Indeksy dla tabeli `uczen`
--
ALTER TABLE `uczen`
  ADD PRIMARY KEY (`id_ucznia`);

--
-- Indeksy dla tabeli `uczen_klasa`
--
ALTER TABLE `uczen_klasa`
  ADD PRIMARY KEY (`id_uk`),
  ADD KEY `id_klasy` (`id_klasy`),
  ADD KEY `id_ucznia` (`id_ucznia`);

--
-- Indeksy dla tabeli `zapisani_do_klasy`
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
  MODIFY `id_klasy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `nauczyciel`
--
ALTER TABLE `nauczyciel`
  MODIFY `id_nauczyciela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `nauczyciel_szkola`
--
ALTER TABLE `nauczyciel_szkola`
  MODIFY `id_ns` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `szkola`
--
ALTER TABLE `szkola`
  MODIFY `id_szkoly` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `uczen`
--
ALTER TABLE `uczen`
  MODIFY `id_ucznia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `uczen_klasa`
--
ALTER TABLE `uczen_klasa`
  MODIFY `id_uk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `zapisani_do_klasy`
--
ALTER TABLE `zapisani_do_klasy`
  MODIFY `id_wpisu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  ADD CONSTRAINT `zapisani_do_klasy_ibfk_1` FOREIGN KEY (`id_nauczyciela`) REFERENCES `nauczyciel` (`id_nauczyciela`),
  ADD CONSTRAINT `zapisani_do_klasy_ibfk_2` FOREIGN KEY (`id_klasy`) REFERENCES `klasa` (`id_klasy`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
