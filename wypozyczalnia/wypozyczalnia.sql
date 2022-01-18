-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Lis 2018, 15:01
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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezyser`
--

CREATE TABLE `rezyser` (
  `id_rezysera` int(11) NOT NULL,
  `imie` int(11) NOT NULL,
  `nazwisko` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

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
(1, 'admin', '$2y$10$4yoe0R7yN3MRQ1ZLg.9WEegeh/hRIQhRkImmMU6MGVXlN4VwAxue.', 'admin-adminjb@jb.pl', 1, 'sartuś', 'jakielczykov'),
(3, 'admin123a', '$2y$10$CGI7BV8Ru2MLiQpaVkJwjesOdrC3sLgsGnq6kz6vZG4WZZGG5arKW', 'admin123a@wp.pl', 0, 'imie', 'nazwisko');

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
  MODIFY `id_gatunku` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `kaseta`
--
ALTER TABLE `kaseta`
  MODIFY `id_kasety` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `rezyser`
--
ALTER TABLE `rezyser`
  MODIFY `id_rezysera` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `id_uzytkownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik_kaseta`
--
ALTER TABLE `uzytkownik_kaseta`
  MODIFY `id_uk` int(11) NOT NULL AUTO_INCREMENT;

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
