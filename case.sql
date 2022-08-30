-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 30 Ağu 2022, 01:55:36
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `case`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ee_articles`
--

CREATE TABLE `ee_articles` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `articleText` mediumtext COLLATE utf8_turkish_ci NOT NULL,
  `date_modified` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ee_articles`
--

INSERT INTO `ee_articles` (`id`, `title`, `articleText`, `date_modified`, `date_added`, `status`) VALUES
(10, 'What is Lorem Ipsum?', '<p></p><div style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; text-align: left; float: right; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"></div><p></p><div style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; text-align: left; float: left; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify;\"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify;\"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></p></div>', '', '2022-08-30 01:41:00', 1),
(11, 'Why do we use it?', '<p style=\"margin-bottom: 15px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p style=\"margin-bottom: 15px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></p>', '', '2022-08-30 01:41:13', 1),
(12, 'Ortak Makale', '<p><strong style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', '', '2022-08-30 01:49:35', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ee_article_to_category`
--

CREATE TABLE `ee_article_to_category` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ee_article_to_category`
--

INSERT INTO `ee_article_to_category` (`id`, `article_id`, `category_id`, `status`) VALUES
(10, 7, 2, 0),
(11, 7, 3, 0),
(12, 8, 2, 1),
(13, 9, 2, 1),
(14, 10, 2, 1),
(15, 11, 5, 1),
(16, 11, 6, 1),
(17, 12, 2, 1),
(18, 12, 5, 1),
(19, 12, 6, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ee_categories`
--

CREATE TABLE `ee_categories` (
  `id` int(11) NOT NULL,
  `parentId` int(11) NOT NULL,
  `categoryName` varchar(55) COLLATE utf8_turkish_ci NOT NULL,
  `date_modified` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ee_categories`
--

INSERT INTO `ee_categories` (`id`, `parentId`, `categoryName`, `date_modified`, `date_added`, `status`) VALUES
(1, 0, 'Yazılım', '2022-08-29 21:50:25', '2022-08-29 20:46:51', 1),
(2, 1, 'PHP', '', '2022-08-29 20:46:56', 1),
(3, 1, 'C++', '', '2022-08-29 20:51:52', 1),
(4, 0, 'Grafik', '', '2022-08-29 20:52:23', 1),
(5, 4, 'Photoshop', '', '2022-08-29 20:52:30', 1),
(6, 4, 'InDesign', '2022-08-29 21:46:19', '2022-08-29 20:57:56', 1),
(7, 0, 'Microsoft', '', '2022-08-30 01:34:40', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ee_users`
--

CREATE TABLE `ee_users` (
  `id` int(11) NOT NULL,
  `name_surname` varchar(155) COLLATE utf8_turkish_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ee_users`
--

INSERT INTO `ee_users` (`id`, `name_surname`, `phone`, `email`, `password`, `date_added`, `status`) VALUES
(1, 'Emirhan Ertürk', '05538826018', 'erturkemir123@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-08-30 00:26:31', 1),
(2, 'Oğuzhan Ertürk', '03215152515', 'oguzhanert@yandex.com', '202cb962ac59075b964b07152d234b70', '2022-08-30 00:26:56', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ee_articles`
--
ALTER TABLE `ee_articles`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ee_article_to_category`
--
ALTER TABLE `ee_article_to_category`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ee_categories`
--
ALTER TABLE `ee_categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ee_users`
--
ALTER TABLE `ee_users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ee_articles`
--
ALTER TABLE `ee_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `ee_article_to_category`
--
ALTER TABLE `ee_article_to_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `ee_categories`
--
ALTER TABLE `ee_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `ee_users`
--
ALTER TABLE `ee_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
