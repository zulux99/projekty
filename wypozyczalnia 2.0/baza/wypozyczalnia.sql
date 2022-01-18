-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Lis 2018, 18:49
-- Wersja serwera: 10.1.35-MariaDB
-- Wersja PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `wypozyczalnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gatunek`
--

CREATE TABLE `gatunek` (
  `id_gatunku` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `gatunek`
--

INSERT INTO `gatunek` (`id_gatunku`, `nazwa`) VALUES
(1, 'horror'),
(2, 'komedia'),
(4, 'Dramat'),
(9, 'Akcja');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kaseta`
--

CREATE TABLE `kaseta` (
  `id_kasety` int(11) NOT NULL,
  `nazwa_filmu` text COLLATE utf8_polish_ci NOT NULL,
  `gatunek` int(11) NOT NULL,
  `rezyser` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kaseta`
--

INSERT INTO `kaseta` (`id_kasety`, `nazwa_filmu`, `gatunek`, `rezyser`, `ilosc`) VALUES
(2, 'Skazani na Shawshank', 4, 6, 117),
(3, 'Mroczny Rycerz', 9, 14, -1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezyser`
--

CREATE TABLE `rezyser` (
  `id_rezysera` int(11) NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `rezyser`
--

INSERT INTO `rezyser` (`id_rezysera`, `imie`, `nazwisko`) VALUES
(6, 'Frank', 'Darabont'),
(14, 'Nolan', 'Christopher');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `id_uzytkownika` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`id_uzytkownika`, `login`, `haslo`, `email`, `admin`, `imie`, `nazwisko`) VALUES
(1, 'admin', '$2y$10$x7XYMYXec0YVDy3iyUXQCOI6f0ekz2lo7R4PGV6ATzzDwOX/DWpE6\r\n', 'admin-adminjb@jb.pl', 1, 'sartuś', 'jakielczykov'),
(3, 'admin123a', '$2y$10$CGI7BV8Ru2MLiQpaVkJwjesOdrC3sLgsGnq6kz6vZG4WZZGG5arKW', 'admin123a@wp.pl', 0, 'imie', 'nazwisko'),
(4, 'admin', '$2y$10$z96xj3IzF4wUJ77V8zH0L.Wng0eIFOr6f/5ko6k8e0d.lL9k9xxmy', 'admin123@wp.pl', 0, 'imie', 'nazwisko'),
(5, 'admin', '$2y$10$ygAf/nIlKXPYr2L4M6I8serRr.rvTq4nL5hGnnhr8xuEJSPHNFux2', 'admin123@wp.pl', 0, 'imie', 'nazwisko'),
(6, 'kuba123', '$2y$10$x7XYMYXec0YVDy3iyUXQCOI6f0ekz2lo7R4PGV6ATzzDwOX/DWpE6', 'kuba123@wp.pl', 1, 'imie', 'nazwisko');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik_kaseta`
--

CREATE TABLE `uzytkownik_kaseta` (
  `id_uk` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `id_kasety` int(11) NOT NULL,
  `data_wypozyczenia` date NOT NULL,
  `data_oddania` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownik_kaseta`
--

INSERT INTO `uzytkownik_kaseta` (`id_uk`, `id_uzytkownika`, `id_kasety`, `data_wypozyczenia`, `data_oddania`) VALUES
(7, 6, 2, '2018-11-04', '2018-11-30'),
(8, 6, 3, '2018-11-04', '2018-11-05'),
(9, 1, 2, '2018-11-04', NULL),
(10, 6, 2, '2018-11-04', '2018-11-04'),
(11, 6, 3, '2018-11-04', '2018-11-04'),
(12, 6, 2, '2018-11-04', '2018-11-04'),
(13, 6, 3, '2018-11-04', '2018-11-04'),
(14, 6, 3, '2018-11-04', '2018-11-04'),
(15, 6, 3, '2018-11-04', '2018-11-04');

--
-- Wyzwalacze `uzytkownik_kaseta`
--
DELIMITER $$
CREATE TRIGGER `wypozyczenie` AFTER INSERT ON `uzytkownik_kaseta` FOR EACH ROW UPDATE kaseta
SET ilosc = ilosc-1
WHERE id_kasety = NEW.id_kasety
$$
DELIMITER ;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `gatunek`
--
ALTER TABLE `gatunek`
  ADD PRIMARY KEY (`id_gatunku`);

--
-- Indeksy dla tabeli `kaseta`
--
ALTER TABLE `kaseta`
  ADD PRIMARY KEY (`id_kasety`),
  ADD KEY `gatunek` (`gatunek`),
  ADD KEY `rezyser` (`rezyser`);

--
-- Indeksy dla tabeli `rezyser`
--
ALTER TABLE `rezyser`
  ADD PRIMARY KEY (`id_rezysera`);

--
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`id_uzytkownika`);

--
-- Indeksy dla tabeli `uzytkownik_kaseta`
--
ALTER TABLE `uzytkownik_kaseta`
  ADD PRIMARY KEY (`id_uk`),
  ADD KEY `id_kasety` (`id_kasety`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `gatunek`
--
ALTER TABLE `gatunek`
  MODIFY `id_gatunku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `kaseta`
--
ALTER TABLE `kaseta`
  MODIFY `id_kasety` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `rezyser`
--
ALTER TABLE `rezyser`
  MODIFY `id_rezysera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `id_uzytkownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik_kaseta`
--
ALTER TABLE `uzytkownik_kaseta`
  MODIFY `id_uk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `kaseta`
--
ALTER TABLE `kaseta`
  ADD CONSTRAINT `kaseta_ibfk_1` FOREIGN KEY (`gatunek`) REFERENCES `gatunek` (`id_gatunku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kaseta_ibfk_2` FOREIGN KEY (`rezyser`) REFERENCES `rezyser` (`id_rezysera`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `uzytkownik_kaseta`
--
ALTER TABLE `uzytkownik_kaseta`
  ADD CONSTRAINT `uzytkownik_kaseta_ibfk_1` FOREIGN KEY (`id_kasety`) REFERENCES `kaseta` (`id_kasety`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uzytkownik_kaseta_ibfk_2` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownik` (`id_uzytkownika`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
