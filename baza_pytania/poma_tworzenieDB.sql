-- PLIK UTWORZONY CO BY SIĘ NIE DENERWOWAĆ PODCZAS TWORZENIA TABEL PODCZAS SZUKANIA PO TYM JEBITYM PLIKU
CREATE DATABASE poma;
USE poma;
-- Struktura tabeli dla tabeli `mvc_konkurs_batalia`
CREATE TABLE IF NOT EXISTS `mvc_konkurs_batalia` (
  `runda` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `druzyna_id` int(11) NOT NULL,
  `kategoria` varchar(255) NOT NULL,
  `poziom` int(11) NOT NULL,
  `img_odpowiedzi` varchar(255) NOT NULL,
  `img_pytania` varchar(255) NOT NULL,
  `event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- Struktura tabeli dla tabeli `mvc_konkurs_pytania`
CREATE TABLE IF NOT EXISTS `mvc_konkurs_pytania` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `kategoria` varchar(255) NOT NULL,
  `poziom` int(11) NOT NULL,
  `img_pytania` varchar(255) NOT NULL,
  `img_odpowiedzi` varchar(255) NOT NULL,
  `uzyte` boolean,
  `media` varchar(255) NOT NULL,
  `media_typ` enum('','audio','wideo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- Struktura tabeli dla tabeli `mvc_konkurs_wyniki`
CREATE TABLE IF NOT EXISTS `mvc_konkurs_wyniki` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `nazwa` varchar(250) NOT NULL,
  `wynik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;