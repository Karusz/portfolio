-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Jan 03. 15:19
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `webshop`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `username`) VALUES
(2, 2, 'Karesz');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `checks`
--

CREATE TABLE `checks` (
  `id` int(11) NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `products_id` varchar(100) NOT NULL,
  `pay_price` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `checks`
--

INSERT INTO `checks` (`id`, `order_code`, `products_id`, `pay_price`, `price`) VALUES
(1, 'QCAEO', '1-;1-;1-;', 200, 800),
(2, 'BSYYN', '20-;19-;18-;', 200, 1952200),
(3, 'PICAX', '21-;20-;19-;', 200, 1865200),
(4, 'RBHIW', '22-;21-;', 200, 965200),
(5, 'KKCLV', '21-;20-;', 200, 1105200),
(6, 'IJVBY', '21-;20-;', 200, 1105200),
(7, 'GFQVL', '22-;22-;21-;', 200, 1405200);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cupons`
--

CREATE TABLE `cupons` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `value` int(11) NOT NULL,
  `reedem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `products` varchar(1000) NOT NULL,
  `order_email` varchar(1000) NOT NULL,
  `order_tel` varchar(1000) NOT NULL,
  `order_name` varchar(1000) NOT NULL,
  `order_address` varchar(1000) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `pay` varchar(1000) NOT NULL,
  `paycount` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `orders`
--

INSERT INTO `orders` (`id`, `code`, `products`, `order_email`, `order_tel`, `order_name`, `order_address`, `text`, `pay`, `paycount`, `date`, `status`) VALUES
(7, 'IJVBY', '21-;20-;', '', '', ' ', '      ', '', 'utanvetel', 1105200, '2023-12-31', 'failed');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(1000) NOT NULL,
  `price` int(255) NOT NULL,
  `sale_price` int(255) NOT NULL,
  `on_sale` int(1) NOT NULL,
  `sold` int(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `sale_price`, `on_sale`, `sold`, `img`) VALUES
(2, 'Black', 'butterfly', 20000, 15000, 1, 0, 'butterfly/black.jpg'),
(3, 'Blue', 'butterfly', 20000, 0, 0, 0, 'butterfly/blue.jpg'),
(4, 'Fade', 'butterfly', 20000, 0, 1, 3, 'butterfly/fade.jpg'),
(5, 'Gold Haircomb', 'butterfly', 13000, 5000, 1, 0, 'butterfly/gold-haircomb.jpg'),
(6, 'Green', 'butterfly', 20000, 0, 0, 0, 'butterfly/green-gray.jpg'),
(7, 'Pink', 'butterfly', 18000, 0, 0, 0, 'butterfly/pink.jpg'),
(8, 'Traning', 'butterfly', 15000, 0, 0, 0, 'butterfly/traning.jpg'),
(9, 'Black', 'huntsman', 24000, 0, 0, 0, 'huntsman/black.jpg'),
(10, 'Blue', 'huntsman', 24000, 0, 0, 0, 'huntsman/blue.jpg'),
(11, 'Fade', 'huntsman', 24000, 0, 0, 1, 'huntsman/fade.jpg'),
(12, 'Galaxy', 'huntsman', 30000, 0, 0, 0, 'huntsman/galaxy.jpg'),
(13, 'Green', 'huntsman', 21000, 0, 0, 0, 'huntsman/green.jpg'),
(14, 'Orange', 'huntsman', 24000, 0, 0, 0, 'huntsman/orange.jpg'),
(15, 'Red', 'huntsman', 24000, 0, 0, 0, 'huntsman/red.jpg'),
(16, 'Black', 'karambit', 30000, 0, 0, 0, 'karambit/black.jpg'),
(17, 'Kamileon', 'karambit', 35000, 0, 0, 0, 'karambit/camileon.jpg'),
(18, 'Fade', 'karambit', 34000, 0, 0, 0, 'karambit/fade.jpg'),
(19, 'Galaxy', 'karambit', 40000, 0, 0, 0, 'karambit/galaxy.jpg'),
(20, 'Gold', 'karambit', 29000, 0, 0, 0, 'karambit/gold.jpg'),
(21, 'Red', 'karambit', 25000, 0, 0, 0, 'karambit/red.jpg'),
(22, 'Traning', 'karambit', 20000, 0, 0, 0, 'karambit/traning.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `passhash` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `passhash`) VALUES
(2, 'Karesz', 'modkarcsika@gmail.com', '$2y$10$lcgYZuCGSFJSiUfk/TnITu24YIFINa3KPlLWwh/FPRcFedgSdTgg2');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `checks`
--
ALTER TABLE `checks`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `cupons`
--
ALTER TABLE `cupons`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `checks`
--
ALTER TABLE `checks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `cupons`
--
ALTER TABLE `cupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT a táblához `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
