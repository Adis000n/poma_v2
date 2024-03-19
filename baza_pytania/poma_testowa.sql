  create database poma; 
  use poma;
  CREATE TABLE IF NOT EXISTS `mvc_konkurs_pytania` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `kategoria` varchar(255),
    `poziom` int(11),
    `img_pytania` varchar(255),
    `img_odpowiedzi` varchar(255),
    `rok_uzycia` int(4) DEFAULT '0',
    `media` varchar(255),
    `media_typ` enum('','audio','wideo')
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  CREATE TABLE IF NOT EXISTS `mvc_konkurs_druzyny` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `nazwa` varchar(255),
    `punkty` int(11)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  CREATE TABLE IF NOT EXISTS `mvc_konkurs_batalia` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `kategoria` varchar(255),
    `poziom` int(11),
    `ilosc_druzyn` int(11),
    `nr_druzyny` int(11),
    `img_odpowiedzi` varchar(255),
    `img_pytania` varchar(255)
    `media` varchar(255),
    `media_typ` enum('','audio','wideo')
    `stan` enum('clear','pytanie','odpowiedz','done')
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  --
  -- Zrzut danych tabeli `mvc_konkurs_pytania`
  --

  INSERT INTO `mvc_konkurs_pytania` (`id`, `kategoria`, `poziom`, `img_pytania`, 
  `img_odpowiedzi`, `rok_uzycia`, `media`, `media_typ`) VALUES
  (default, 'bonus', 3, 'baza/bonus/1/b10.jpg', 'baza/bonus/1/bo10.jpg', 0, '', ''),
  (default, 'bonus', 3, 'baza/bonus/1/b15.jpg', 'baza/bonus/1/bo15.jpg', 0, 'baza/audio/b15.mp3', 'audio'),
  (default, 'bonus', 3, 'baza/bonus/1/b17.jpg', 'baza/bonus/1/bo17.jpg', 0, 'baza/wideo/b17.mp4', 'wideo'),
  (default, 'bonus', 3, 'baza/bonus/1/b23.jpg', 'baza/bonus/1/bo23.jpg', 0, '', ''),
  (default, 'chemia', 1, 'baza/chemia/1/c21.png', 'baza/chemia/1/co21.png', 0, '', ''),
  (default, 'chemia', 1, 'baza/chemia/1/c30.png', 'baza/chemia/1/co30.png', 0, '', ''),
  (default, 'chemia', 1, 'baza/chemia/1/c6.png', 'baza/chemia/1/co6.png', 0, '', ''),
  (default, 'chemia', 2, 'baza/chemia/2/c17.jpg', 'baza/chemia/2/co17.jpg', 0, '', ''),
  (default, 'chemia', 2, 'baza/chemia/2/c69.jpg', 'baza/chemia/2/co69.jpg', 0, '', ''),
  (default, 'fizyka', 1, 'baza/fizyka/1/f2.png', 'baza/fizyka/1/fo2.png', 0, '', ''),
  (default, 'fizyka', 1, 'baza/fizyka/1/f25.png', 'baza/fizyka/1/fo25.png', 0, '', ''),
  (default, 'fizyka', 1, 'baza/fizyka/1/f4.png', 'baza/fizyka/1/fo4.png', 0, '', ''),
  (default, 'fizyka', 2, 'baza/fizyka/2/f2.jpg', 'baza/fizyka/2/fo2.jpg', 0, '', ''),
  (default, 'fizyka', 2, 'baza/fizyka/2/f20.jpg', 'baza/fizyka/2/fo20.jpg', 0, '', ''),
  (default, 'fizyka', 2, 'baza/fizyka/2/f24.jpg', 'baza/fizyka/2/fo24.jpg', 0, '', ''),
  (default, 'informatyka', 1, 'baza/informatyka/1/i12.jpg', 'baza/informatyka/1/io12.jpg', 0, '', ''),
  (default, 'informatyka', 1, 'baza/informatyka/1/i28.jpg', 'baza/informatyka/1/io28.jpg', 0, '', ''),
  (default, 'informatyka', 1, 'baza/informatyka/1/i35.jpg', 'baza/informatyka/1/io35.jpg', 0, '', ''),
  (default, 'informatyka', 2, 'baza/informatyka/2/id2.jpg', 'baza/informatyka/2/ido2.jpg', 0, '', ''),
  (default, 'informatyka', 2, 'baza/informatyka/2/id29.jpg', 'baza/informatyka/2/ido29.jpg', 0, '', ''),
  (default, 'informatyka', 2, 'baza/informatyka/2/id8.jpg', 'baza/informatyka/2/ido8.jpg', 0, '', ''),
  (default, 'matematyka', 1, 'baza/matematyka/1/m12.jpg', 'baza/matematyka/1/mo12.jpg', 0, '', ''),
  (default, 'matematyka', 1, 'baza/matematyka/1/m19.jpg', 'baza/matematyka/1/mo19.jpg', 0, '', ''),
  (default, 'matematyka', 1, 'baza/matematyka/1/m30.jpg', 'baza/matematyka/1/mo30.jpg', 0, '', ''),
  (default, 'matematyka', 2, 'baza/matematyka/2/m11.jpg', 'baza/matematyka/2/mo11.jpg', 0, '', ''),
  (default, 'matematyka', 2, 'baza/matematyka/2/m16.jpg', 'baza/matematyka/2/mo16.jpg', 0, '', ''),
  (default, 'matematyka', 2, 'baza/matematyka/2/m22.jpg', 'baza/matematyka/2/mo22.jpg', 0, '', ''),
  (default, 'niespodzianka', 1, 'baza/niespodzianka/1/n13.png', 'baza/niespodzianka/1/no13.png', 0, '', ''),
  (default, 'niespodzianka', 1, 'baza/niespodzianka/1/n25.png', 'baza/niespodzianka/1/no25.png', 0, '', ''),
  (default, 'niespodzianka', 1, 'baza/niespodzianka/1/n36.png', 'baza/niespodzianka/1/no36.png', 0, '', ''),
  (default, 'niespodzianka', 2, 'baza/niespodzianka/2/n2.jpg', 'baza/niespodzianka/2/no2.jpg', 0, '', ''),
  (default, 'niespodzianka', 2, 'baza/niespodzianka/2/n3.jpg', 'baza/niespodzianka/2/no3.jpg', 0, '', ''),
  (default, 'niespodzianka', 2, 'baza/niespodzianka/2/n12.jpg', 'baza/niespodzianka/2/no12.jpg', 0, '', ''),
  (default, 'technika', 1, 'baza/technika/1/t12.jpg', 'baza/technika/1/to12.jpg', 0, '', ''),
  (default, 'technika', 1, 'baza/technika/1/t4.jpg', 'baza/technika/1/to4.jpg', 0, '', ''),
  (default, 'technika', 1, 'baza/technika/1/t5.jpg', 'baza/technika/1/to5.jpg', 0, '', '');
