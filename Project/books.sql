-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 Nis 2020, 11:47:32
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
-- Tablo için tablo yapısı `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `bookID` int(11) DEFAULT NULL,
  `about` text NOT NULL,
  `dateofBirth` varchar(20) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `author`
--

INSERT INTO `author` (`id`, `name`, `score`, `bookID`, `about`, `dateofBirth`, `photo`) VALUES
(1, 'Kırmızı Balık', 0, NULL, '111', '12.02.1212', 'images/authorKırmızı Balık_EVGOxyTWsAURrWC.jpg'),
(2, 'Kırmızı Balık', 0, NULL, '111', '12.02.1212', 'images/authorKırmızı Balık_EVGOxyTWsAURrWC.jpg'),
(3, 'Kırmızı Balık', 0, NULL, 'balık', '12.02.1212', 'images/authorKırmızı Balık_EVGOxyTWsAURrWC.jpg'),
(4, 'Adventure', 0, NULL, '123213', '12.02.1212', 'images/authorAdventure_Emmelie_de_Forest,_ESC2013_press_conference_12_(crop).jpg'),
(5, 'İrem Güregci', 0, NULL, 'İrem Güregci Maaşı gitmiştir', '12.12.2012', 'images/author/İrem Güregci_Screenshot_3.png'),
(6, 'fatih', 0, NULL, 'adsagyh', '123', 'images/author/fatih_Screenshot_14.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `book`
--

CREATE TABLE `book` (
  `ISBN` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `authorID` int(11) NOT NULL,
  `releaseDate` varchar(20) NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `review` text DEFAULT NULL,
  `summary` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `book`
--

INSERT INTO `book` (`ISBN`, `name`, `authorID`, `releaseDate`, `score`, `review`, `summary`, `image`, `categoryID`) VALUES
(0, 'images/book/Adventure_JPEG_example_JPG_RIP_001.jpg', 1, '213214', 0, NULL, '124214214', NULL, 7),
(15436435, 'vodafone', 1, '123213', 0, NULL, '435435', 'images/book/vodafone_ERD.png', 10),
(435436436, 'Kırmızı Balık', 5, '12.12.2011', 0, NULL, 'Cerenin maceraları', 'images/book/Kırmızı Balık_Screenshot_47.png', 12);

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

INSERT INTO `category` (`id`, `categoryName`, `photo`) VALUES
(7, 'Adventure', 'images/categoryAdventure_Screenshot_4.png'),
(9, 'Sci-Fi', 'images/categorySci-Fi_Screenshot_20.png'),
(10, 'History', 'images/categoryHistory_Screenshot_4.png'),
(11, 'K?rm?z? Bal?k', 'images/categoryK?rm?z? Bal?k_EVbOSOEXYAEzv9S.png'),
(12, 'CreepyPasta', 'images/categoryCreepyPasta_Screenshot_67.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `review` text DEFAULT NULL,
  `bookID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `pw` text NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `isBanned` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `reviewID`, `score`, `photo`, `username`, `email`, `pw`, `isAdmin`, `isBanned`) VALUES
(1, NULL, 0, NULL, 'goksubay', 'goksu1.9.9.8@gmail.com', '698d51a19d8a121ce581499d7b701668', 0, 0),
(2, NULL, 0, NULL, 'goksubay', 'goksu1.9.9.8@gmail.com', '698d51a19d8a121ce581499d7b701668', 0, 0),
(3, NULL, 0, NULL, 'goksubay', 'goksu1.9.9.8@gmail.com', '698d51a19d8a121ce581499d7b701668', 0, 0),
(4, NULL, 0, NULL, 'goksubay', 'goksu1.9.9.8@gmail.com', '698d51a19d8a121ce581499d7b701668', 0, 0),
(5, NULL, 0, NULL, 'goksubay', 'goksu1.9.9.8@gmail.com', '698d51a19d8a121ce581499d7b701668', 0, 0),
(6, NULL, 0, NULL, 'goksubay', 'goksu1.9.9.8@gmail.com', '698d51a19d8a121ce581499d7b701668', 0, 0),
(7, NULL, 0, NULL, 'adsadsad', '05345209048', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 0, 0),
(8, NULL, 0, NULL, 'test', 'sadsadsad', '202cb962ac59075b964b07152d234b70', 0, 0),
(9, NULL, 0, NULL, 'goksubay', 'goksu1.9.9.8@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', 0, 0),
(10, NULL, 0, NULL, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0, 0),
(11, NULL, 0, NULL, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0, 0),
(12, NULL, 0, NULL, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0, 0),
(13, NULL, 0, NULL, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0, 0),
(14, NULL, 0, NULL, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0, 0),
(15, NULL, 0, NULL, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0, 0),
(16, NULL, 0, NULL, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0, 0),
(17, NULL, 0, NULL, 'goksubay', '05345209048', '202cb962ac59075b964b07152d234b70', 0, 0),
(18, NULL, 0, NULL, 'goksubay', '05345209048', '202cb962ac59075b964b07152d234b70', 0, 0),
(19, NULL, 0, NULL, 'adsadsad', 'gksbayram@gmail.com', '698d51a19d8a121ce581499d7b701668', 0, 0),
(20, NULL, 0, NULL, 'adsadsad', 'gksbayram@gmail.com', '698d51a19d8a121ce581499d7b701668', 0, 0),
(21, NULL, 0, NULL, 'sadsad', '05345209048', '698d51a19d8a121ce581499d7b701668', 0, 0),
(22, NULL, 0, NULL, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0, 0),
(23, NULL, 0, NULL, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0, 0),
(24, NULL, 0, NULL, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0, 0),
(25, NULL, 0, NULL, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0, 0),
(26, NULL, 0, NULL, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0, 0),
(27, NULL, 0, NULL, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0, 0),
(28, NULL, 0, 'images/de_EVGOxyTWsAURrWC.jpg', 'de', 'sad@dsg', 'c4ca4238a0b923820dcc509a6f75849b', 0, 0),
(29, NULL, 0, 'images/de_EVGOxyTWsAURrWC.jpg', 'de', 'sad@dsg', 'c4ca4238a0b923820dcc509a6f75849b', 0, 0),
(30, NULL, 0, 'images/asdsa321_JPEG_example_JPG_RIP_001.jpg', 'asdsa321', 'goksu1.9.449.8@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 0, 0),
(31, NULL, 0, 'images/asdsa321_JPEG_example_JPG_RIP_001.jpg', 'asdsa321', 'goksu1.9.449.8@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 0, 0),
(32, NULL, 0, 'images/goksubay_Screenshot_4.png', 'goksubay', 'goksu1.9.9.8@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 0, 0),
(33, NULL, 0, 'images/goksubay_4b.png', 'goksubay', 'goksu1.9.9.8@gmail.com', '698d51a19d8a121ce581499d7b701668', 0, 0),
(34, NULL, 0, 'images/goksubay_4a.png', 'goksubay', 'goksu1.9.9.8@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0),
(35, NULL, 0, 'images/goksubay_Screenshot_5.png', 'goksubay', 'goksu1.9.9.8@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0),
(36, NULL, 0, 'images/goksubay_4b.png', 'goksubay', 'goksu1.9.9.8@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0),
(37, NULL, 0, 'images/goksubay_Screenshot_5.png', 'goksubay', 'goksu1.9.9.8@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 0, 0),
(38, NULL, 0, 'images/goksubay_Screenshot_6.png', 'goksubay', 'goksu1.9.9.8@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0),
(39, NULL, 0, 'images/goksubay_Screenshot_5.png', 'goksubay', 'goksu1.9.9.8@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0),
(40, NULL, 0, 'images/şifre123_Screenshot_18.png', 'şifre123', 'g2@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0),
(41, NULL, 0, 'images/123şifre_Screenshot_6.png', '123şifre', 'sdsa@sadsa.csad', '202cb962ac59075b964b07152d234b70', 0, 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `author`
--
ALTER TABLE `author`
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
  ADD KEY `reviewID` (`reviewID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
