-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2020 at 02:44 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `amphures` (
  `id` int(5) NOT NULL,
  `code` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `name_th` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` int(5) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `amphures` (`id`, `code`, `name_th`, `name_en`, `province_id`) VALUES
(1, '1001', 'Aleutians East', 'Aleutians East', 1),
(2, '1002', 'Aleutians West', 'Aleutians West', 1),
(3, '1003', 'Anchorage', 'Anchorage', 1),
(4, '1004', 'Bethel', 'Bethel', 1),




CREATE TABLE `districts` (
  `id` varchar(6) COLLATE utf8_bin NOT NULL,
  `zip_code` int(11) NOT NULL,
  `name_th` varchar(150) COLLATE utf8_bin NOT NULL,
  `name_en` varchar(150) COLLATE utf8_bin NOT NULL,
  `amphure_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='InnoDB free: 8192 kB';


INSERT INTO `districts` (`id`, `zip_code`, `name_th`, `name_en`, `amphure_id`) VALUES
('100101', 99501, 'Adak', 'Adak', 1),
('100102', 99502, 'Akhiok', 'Akhiok', 1),
('100103', 99503, 'Akiachak', 'Akiachak', 1),
('100104', 99504, 'Akiak', 'Akiak', 1),



CREATE TABLE `provinces` (
  `id` int(5) NOT NULL,
  `code` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `name_th` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `geography_id` int(5) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



INSERT INTO `provinces` (`id`, `code`, `name_th`, `name_en`, `geography_id`) VALUES
(1, '10', 'AK', 'Alaska', 2),
(2, '11', 'AL', 'Alabama', 2),
(3, '12', 'AR', 'Arkansas', 2),
(4, '13', 'AZ', 'Arizona', 2),


ALTER TABLE `amphures`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `geographies`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `amphures`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;


ALTER TABLE `geographies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


ALTER TABLE `provinces`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;