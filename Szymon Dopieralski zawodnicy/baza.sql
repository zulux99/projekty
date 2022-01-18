-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 21 Kwi 2018, 21:53
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
-- Baza danych: `zawodnicy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wynik`
--

CREATE TABLE `wynik` (
  `id_wyniku` int(11) NOT NULL,
  `czas` decimal(10,2) NOT NULL,
  `styl` text COLLATE utf8_polish_ci NOT NULL,
  `id_zawodnika` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wynik`
--

INSERT INTO `wynik` (`id_wyniku`, `czas`, `styl`, `id_zawodnika`) VALUES
(29, '13.00', 'klasyczny', 15),
(30, '11.00', 'motylkowy', 4),
(32, '11.00', 'kraul', 6),
(33, '11.00', 'motylkowy', 7),
(34, '12.00', 'motylkowy', 8),
(35, '11.00', 'motylkowy', 12),
(36, '11.31', 'motylkowy', 10),
(37, '13.53', 'kraul', 5),
(38, '12.94', 'kraul', 9),
(39, '14.12', 'kraul', 14),
(40, '11.50', 'kraul', 15),
(41, '12.80', 'klasyczny', 7),
(42, '10.93', 'klasyczny', 13),
(43, '11.34', 'grzbietowy', 4),
(44, '11.34', 'grzbietowy', 6),
(45, '12.56', 'grzbietowy', 8),
(46, '13.10', 'grzbietowy', 11);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zawodnik`
--

CREATE TABLE `zawodnik` (
  `id_zawodnika` int(11) NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `plec` text COLLATE utf8_polish_ci NOT NULL,
  `szkola` text COLLATE utf8_polish_ci NOT NULL,
  `druzyna` text COLLATE utf8_polish_ci NOT NULL,
  `styl1` text COLLATE utf8_polish_ci NOT NULL,
  `styl2` text COLLATE utf8_polish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `zawodnik`
--

INSERT INTO `zawodnik` (`id_zawodnika`, `imie`, `nazwisko`, `plec`, `szkola`, `druzyna`, `styl1`, `styl2`) VALUES
(4, 'Jan', 'Kowalski', 'mezczyzna', 'Zespół Szkół Technicznych CKZiU', 'KNOT', 'grzbietowy', 'motylkowy'),
(5, 'Zdzisława', 'Krzywa', 'kobieta', 'Liceum Ogólnokształcące', 'Avengersi', 'kraul', NULL),
(6, 'Bartosz', 'Bartkowiak', 'mezczyzna', 'Zespół Szkół Technicznych CKZiU', 'KNOT', 'kraul', 'grzbietowy'),
(7, 'Zdzisław', 'Krzymiński', 'mezczyzna', 'Liceum Ogólnokształcące', 'KNOT', 'klasyczny', 'motylkowy'),
(8, 'Małgorzata', 'Okoniewicz', 'kobieta', 'Szkoła zawodowa', 'BNS', 'grzbietowy', 'motylkowy'),
(9, 'Marlena', 'Lewandowska', 'kobieta', 'Gimnazjum', 'Avengersi', 'kraul', NULL),
(10, 'Filip', 'Zalewski', 'mezczyzna', 'Liceum Ogólnokształcące', 'BNS', 'motylkowy', 'kraul'),
(11, 'Karol', 'Markowski', 'mezczyzna', 'Zespół Szkół Technicznych CKZiU', 'KNOT', 'grzbietowy', NULL),
(12, 'Kinga', 'Matuszewska', 'kobieta', 'Gimnazjum', 'BNS', 'motylkowy', NULL),
(13, 'Tomasz', 'Pietrzak', 'mezczyzna', 'Zespół Szkół Technicznych CKZiU', 'KNOT', 'klasyczny', NULL),
(14, 'Amelia', 'Włodarczyk', 'kobieta', 'Szkoła zawodowa', 'Avengersi', 'kraul', NULL),
(15, 'Oliwia', 'Wiśniewska', 'kobieta', 'Zespół Szkół Technicznych CKZiU', 'KNOT', 'kraul', 'klasyczny'),
(16, 'Hubert', 'Kowalczyk', 'mezczyzna', 'Gimnazjum', 'Avengersi', 'motylkowy', NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `wynik`
--
ALTER TABLE `wynik`
  ADD PRIMARY KEY (`id_wyniku`),
  ADD KEY `id_zawodnika` (`id_zawodnika`);

--
-- Indexes for table `zawodnik`
--
ALTER TABLE `zawodnik`
  ADD PRIMARY KEY (`id_zawodnika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `wynik`
--
ALTER TABLE `wynik`
  MODIFY `id_wyniku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT dla tabeli `zawodnik`
--
ALTER TABLE `zawodnik`
  MODIFY `id_zawodnika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `wynik`
--
ALTER TABLE `wynik`
  ADD CONSTRAINT `wynik_ibfk_1` FOREIGN KEY (`id_zawodnika`) REFERENCES `zawodnik` (`id_zawodnika`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
