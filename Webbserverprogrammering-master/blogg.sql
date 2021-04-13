-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 13 apr 2021 kl 14:36
-- Serverversion: 10.4.6-MariaDB
-- PHP-version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `blogg`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `comments`
--

CREATE TABLE `comments` (
  `commentID` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `text` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `postsID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `posts`
--

CREATE TABLE `posts` (
  `postID` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `picture` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `text` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `username` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `status` tinyint(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `username` (`username`),
  ADD KEY `postsID` (`postsID`);

--
-- Index för tabell `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `username` (`username`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `password` (`password`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`postsID`) REFERENCES `posts` (`postID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriktioner för tabell `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
