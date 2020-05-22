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

INSERT INTO `author` (`id`, `name`, `score`, `about`, `dateofBirth`, `photo`) VALUES
(10, 'J.K Rowling', 0, 'J. K. Rowling, is a British author, film producer, television producer, screenwriter, and philanthropist. She is best known for writing the Harry Potter fantasy series, which has won multiple awards and sold more than 500 million copies,[2][3] becoming the best-selling book series in history.[4] The books are the basis of a popular film series, over which Rowling had overall approval on the scripts[5] and was a producer on the final films.[6] She also writes crime fiction under the name Robert Galbraith.', '1965-07-31', 'images/author/J.K Rowling_5e8b2c93b57f1517ac4ab954.jpg'),
(12, 'Frank Herbert', 0, 'Franklin Patrick Herbert Jr. (October 8, 1920 – February 11, 1986) was an American science-fiction author best known for the 1965 novel Dune and its five sequels. Though he became famous for his novels, he also wrote short stories and worked as a newspaper journalist, photographer, book reviewer, ecological consultant, and lecturer.', '1920-10-08', 'images/author/Frank Herbert_Frank_Herbert_-_1984.jpg'),
(14, 'Andrzej Sapkowski', 0, 'Andrzej Sapkowski is a Polish fantasy writer. He is best known for his book series, The Witcher. His books have been translated into over 20 languages', '1948-06-21', 'images/author/Andrzej Sapkowski_Sapkowski.jpg'),
(15, 'John Flanagan', 0, 'John Anthony Flanagan is an Australian fantasy author best known for his medieval fantasy series, the Rangers Apprentice, and its sister series, the Brotherband Chronicles. Some of his other works include his Storm Peak duology, as well as the adult novel The Grey Raider.', '1944-05-22', 'images/author/John Flanagan_john-flanagan-profil-P3.jpg');

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

INSERT INTO `bannedusers` (`id`, `username`, `email`, `pw`, `reason`) VALUES
(45, 'goksubayram', 'gbay@gmail.com', '202cb962ac59075b964b07152d234b70', 'Dont like you'),
(49, 'testuser1', 'testm@gmail.com', '202cb962ac59075b964b07152d234b70', 'Harry potter is better');

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

INSERT INTO `book` (`ISBN`, `name`, `authorID`, `releaseDate`, `score`, `summary`, `image`, `categoryID`) VALUES
(747538492, 'Harry Potter and the Chamber of Secrets', 10, '1998-07-02', 0, 'Harry Potter and the Chamber of Secrets is a fantasy novel written by British author J. K. Rowling and the second novel in the Harry Potter series. The plot follows Harrys second year at Hogwarts School of Witchcraft and Wizardry, during which a series of messages on the walls of the schools corridors warn that the Chamber of Secrets has been opened and that the heir of Slytherin would kill all pupils who do not come from all-magical families. These threats are found after attacks that leave residents of the school petrified. Throughout the year, Harry and his friends Ron and Hermione investigate the attacks.', 'images/book/Harry Potter and the Chamber of Secrets_harry-potter-and-the-chamber-of-secrets-5.jpg', 19),
(842502706, 'Dune', 12, '1965-08-01', 3, 'Feature adaptation of Frank Herbert\'s science fiction novel, about the son of a noble family entrusted with the protection of the most valuable asset and most vital element in the galaxy.', 'images/book/Dune_0000000270472-1.jpg', 18),
(978014240, 'Rangers Apprentice: The Ruins of Gorlan', 15, '2004-11-01', 0, 'test', 'images/book/RA.jpg', 17),
(978057507, 'The Witcher: The Last Wish', 14, '2007-06-21', 0, 'The Last Wish is the first book in Andrzej Sapkowskis The Witcher series in terms of story chronology, although the original Polish edition was published in 1993, after Sword of Destiny.', 'images/book/TWLS.jpg', 19),
(2147483647, 'Harry Potter and the Philosophers Stone', 10, '26-06-1997', 19, 'Harry Potter and the Philosopher\'s Stone is a fantasy novel written by British author J. K. Rowling. The first novel in the Harry Potter series and Rowling\'s debut novel, it follows Harry Potter, a young wizard who discovers his magical heritage on his eleventh birthday, when he receives a letter of acceptance to Hogwarts School of Witchcraft and Wizardry. Harry makes close friends and a few enemies during his first year at the school, and with the help of his friends, Harry faces an attempted comeback by the dark wizard Lord Voldemort, who killed Harry\'s parents, but failed to kill Harry when he was just 15 months old.', 'images/book/Harry Potter_MV5BNjQ3NWNlNmQtMTE5ZS00MDdmLTlkZjUtZTBlM2UxMGFiMTU3XkEyXkFqcGdeQXVyNjUwNzk3NDc@._V1_UY1200_CR90,0,630,1200_AL_.jpg', 19);

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

INSERT INTO `category` (`id`, `categoryName`, `photo`) VALUES
(17, 'Adventure', 'images/categoryAdventure_download20200506170900.png'),
(18, 'Sci-Fi', 'images/categorySci-Fi_science-fiction-3212212_960_720.jpg'),
(19, 'Fantasy', 'images/categoryFantasy_Dark_Fantasy_Romane.jpg'),
(20, 'Romance', 'images/categoryRomance_yofo10139173.jpg'),
(21, 'Horror', 'images/categoryHorror_scream-horror.jpg.482x490_q71_crop-smart.jpg'),
(22, 'Dedective', 'images/categoryDedective_indir.jpg'),
(23, 'Biography', 'images/categoryBiography_unnamed.jpg'),
(24, 'Comic Book', 'images/categoryComic Book_cotton-fabric-marvel-comic-book-main-e106751-25_1.jpg'),
(25, 'Other', 'images/categoryOther_other-other.jpg'),
(27, 'Thriller', 'images/categoryThriller_thriller.jpg');

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

INSERT INTO `forgottenpassword` (`id`, `token`, `email`) VALUES
(8, 'a24bdc3e59a4c624eee8318a51bb55b9', 'gksbayram@gmail.com'),
(11, '9d8df73a3cfbf3c5b47bc9b50f214aff', 'goksu.1.9.9.8@gmail.com');

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

INSERT INTO `users` (`id`, `reviewID`, `score`, `photo`, `username`, `email`, `pw`) VALUES
(46, NULL, 10, 'images/users/vito_indir (1).jpg', 'vito', 'fatih_ralarak@hotmail.com', '202cb962ac59075b964b07152d234b70'),
(47, NULL, 0, 'images/users/iik_Screenshot_3.png', 'iik', 'iik@gmail.com', '202cb962ac59075b964b07152d234b70'),
(48, NULL, 0, 'images/users/balik_Screenshot_47.png', 'balik', 'kbalik@gmail.com', '202cb962ac59075b964b07152d234b70'),
(50, NULL, 0, 'images/users/testusers_photo-1511367461989-f85a21fda167.jpg', 'testusers', 'gksbayram@gmail.com', 'fae0b27c451c728867a567e8c1bb4e53'),
(51, NULL, 0, 'images/users/testu_photo-1511367461989-f85a21fda167.jpg', 'testu', 'goksu.1.9.9.8@gmail.com', 'fae0b27c451c728867a567e8c1bb4e53');

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
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Tablo için AUTO_INCREMENT değeri `forgottenpassword`
--
ALTER TABLE `forgottenpassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

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
