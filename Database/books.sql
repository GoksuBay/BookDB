-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 18 May 2020, 11:12:05
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `books`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `adminview`
-- (Asıl görünüm için aşağıya bakın)
--
CREATE TABLE `adminview` (
`id` int(11)
,`username` varchar(50)
,`password` varchar(255)
);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `about` text NOT NULL,
  `dateofBirth` varchar(20) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `author`
--

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `authorview`
-- (Asıl görünüm için aşağıya bakın)
--
CREATE TABLE `authorview` (
`id` int(11)
,`name` varchar(50)
,`score` int(11)
,`about` text
,`dateofBirth` varchar(20)
,`photo` varchar(255)
);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bannedusers`
--

CREATE TABLE `bannedusers` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pw` text NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `bannedusers`
--

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `bannedusersview`
-- (Asıl görünüm için aşağıya bakın)
--
CREATE TABLE `bannedusersview` (
`id` int(11)
,`username` varchar(100)
,`email` varchar(100)
,`pw` text
,`reason` text
);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `book`
--

CREATE TABLE `book` (
  `ISBN` int(15) NOT NULL,
  `name` text NOT NULL,
  `authorID` int(11) NOT NULL,
  `releaseDate` varchar(20) NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `summary` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `book`
--


-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `bookview`
-- (Asıl görünüm için aşağıya bakın)
--
CREATE TABLE `bookview` (
`ISBN` int(15)
,`name` text
,`authorID` int(11)
,`releaseDate` varchar(20)
,`score` int(11)
,`summary` text
,`image` varchar(255)
,`categoryID` int(11)
);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(50) NOT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `category`
--

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `categoryview`
-- (Asıl görünüm için aşağıya bakın)
--
CREATE TABLE `categoryview` (
`id` int(11)
,`categoryName` varchar(50)
,`photo` varchar(255)
);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `forgottenpassword`
--

CREATE TABLE `forgottenpassword` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `forgottenpassword`
--

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `forgottenpasswordview`
-- (Asıl görünüm için aşağıya bakın)
--
CREATE TABLE `forgottenpasswordview` (
`id` int(11)
,`token` varchar(255)
,`email` varchar(255)
);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `review` text DEFAULT NULL,
  `bookID` int(15) NOT NULL,
  `userID` int(11) NOT NULL,
  `givenScore` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `reviews`
--

INSERT INTO `reviews` (`id`, `review`, `bookID`, `userID`, `givenScore`, `score`) VALUES
(9, 'I like this series!', 2147483647, 46, 7, 10),
(10, 'Not bad, but not good as well', 2147483647, 47, 1, 9);

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `reviewsview`
-- (Asıl görünüm için aşağıya bakın)
--
CREATE TABLE `reviewsview` (
`id` int(11)
,`review` text
,`bookID` int(15)
,`userID` int(11)
,`givenScore` int(11)
,`score` int(11)
);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `reviewID` int(11) DEFAULT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `photo` varchar(255) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pw` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `usersview`
-- (Asıl görünüm için aşağıya bakın)
--
CREATE TABLE `usersview` (
`id` int(11)
,`reviewID` int(11)
,`score` int(11)
,`photo` varchar(255)
,`username` varchar(100)
,`email` varchar(100)
,`pw` text
);

-- --------------------------------------------------------

--
-- Görünüm yapısı `adminview`
--
DROP TABLE IF EXISTS `adminview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `adminview`  AS  select `admin`.`id` AS `id`,`admin`.`username` AS `username`,`admin`.`password` AS `password` from `admin` ;

-- --------------------------------------------------------

--
-- Görünüm yapısı `authorview`
--
DROP TABLE IF EXISTS `authorview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `authorview`  AS  select `author`.`id` AS `id`,`author`.`name` AS `name`,`author`.`score` AS `score`,`author`.`about` AS `about`,`author`.`dateofBirth` AS `dateofBirth`,`author`.`photo` AS `photo` from `author` ;

-- --------------------------------------------------------

--
-- Görünüm yapısı `bannedusersview`
--
DROP TABLE IF EXISTS `bannedusersview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bannedusersview`  AS  select `bannedusers`.`id` AS `id`,`bannedusers`.`username` AS `username`,`bannedusers`.`email` AS `email`,`bannedusers`.`pw` AS `pw`,`bannedusers`.`reason` AS `reason` from `bannedusers` ;

-- --------------------------------------------------------

--
-- Görünüm yapısı `bookview`
--
DROP TABLE IF EXISTS `bookview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bookview`  AS  select `book`.`ISBN` AS `ISBN`,`book`.`name` AS `name`,`book`.`authorID` AS `authorID`,`book`.`releaseDate` AS `releaseDate`,`book`.`score` AS `score`,`book`.`summary` AS `summary`,`book`.`image` AS `image`,`book`.`categoryID` AS `categoryID` from `book` ;

-- --------------------------------------------------------

--
-- Görünüm yapısı `categoryview`
--
DROP TABLE IF EXISTS `categoryview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `categoryview`  AS  select `category`.`id` AS `id`,`category`.`categoryName` AS `categoryName`,`category`.`photo` AS `photo` from `category` ;

-- --------------------------------------------------------

--
-- Görünüm yapısı `forgottenpasswordview`
--
DROP TABLE IF EXISTS `forgottenpasswordview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `forgottenpasswordview`  AS  select `forgottenpassword`.`id` AS `id`,`forgottenpassword`.`token` AS `token`,`forgottenpassword`.`email` AS `email` from `forgottenpassword` ;

-- --------------------------------------------------------

--
-- Görünüm yapısı `reviewsview`
--
DROP TABLE IF EXISTS `reviewsview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reviewsview`  AS  select `reviews`.`id` AS `id`,`reviews`.`review` AS `review`,`reviews`.`bookID` AS `bookID`,`reviews`.`userID` AS `userID`,`reviews`.`givenScore` AS `givenScore`,`reviews`.`score` AS `score` from `reviews` ;

-- --------------------------------------------------------

--
-- Görünüm yapısı `usersview`
--
DROP TABLE IF EXISTS `usersview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usersview`  AS  select `users`.`id` AS `id`,`users`.`reviewID` AS `reviewID`,`users`.`score` AS `score`,`users`.`photo` AS `photo`,`users`.`username` AS `username`,`users`.`email` AS `email`,`users`.`pw` AS `pw` from `users` ;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Tablo için indeksler `bannedusers`
--
ALTER TABLE `bannedusers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `authorID` (`authorID`);

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categoryName` (`categoryName`);

--
-- Tablo için indeksler `forgottenpassword`
--
ALTER TABLE `forgottenpassword`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookID` (`bookID`),
  ADD KEY `userID` (`userID`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`authorID`) REFERENCES `author` (`id`);

--
-- Tablo kısıtlamaları `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`bookID`) REFERENCES `book` (`ISBN`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Tablo kısıtlamaları `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`reviewID`) REFERENCES `reviews` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
