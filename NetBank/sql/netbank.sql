-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Már 19. 13:11
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `netbank`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cards`
--

CREATE TABLE `cards` (
  `kartyaszam` varchar(1000) NOT NULL,
  `szamlaszam` varchar(1000) NOT NULL,
  `lejarat` varchar(1000) NOT NULL,
  `save_code` varchar(1000) NOT NULL,
  `PIN` varchar(4) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `cards`
--

INSERT INTO `cards` (`kartyaszam`, `szamlaszam`, `lejarat`, `save_code`, `PIN`, `is_active`) VALUES
('5975-6051-3213-0046', '30697727-89163118-91811473', '03/34', '872', '1234', 1),
('2435-0359-8739-9504', '79241467-25003283-55437944', '03/34', '494', '1234', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szamlak`
--

CREATE TABLE `szamlak` (
  `user_azonosito` varchar(1000) NOT NULL,
  `szamlaszam` varchar(1000) NOT NULL,
  `osszeg` int(11) NOT NULL,
  `letrehozasi_ido` varchar(1000) NOT NULL,
  `tranzakcio` int(255) NOT NULL,
  `tranzakcio_ido` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `szamlak`
--

INSERT INTO `szamlak` (`user_azonosito`, `szamlaszam`, `osszeg`, `letrehozasi_ido`, `tranzakcio`, `tranzakcio_ido`) VALUES
('06598281', '32072610-95824067-84094867', 50642, '', 1, '-'),
('86089710', '34461168-36361108-57052945', 3, '', 0, '2024/03/19'),
('86089710', '58634136-70785793-07193203', 0, '', 335, '2024/03/19');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `code` varchar(8) NOT NULL,
  `vnev` varchar(1000) NOT NULL,
  `knev` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`code`, `vnev`, `knev`, `password`) VALUES
('86089710', 'Test', 'Pista', 'pistike'),
('06598281', 'nem', 'tom', '123456');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
