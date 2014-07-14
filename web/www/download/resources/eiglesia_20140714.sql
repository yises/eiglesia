-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-07-2014 a las 17:55:56
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `eiglesia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `id_church_activity` int(11) NOT NULL AUTO_INCREMENT,
  `hour_to` time DEFAULT NULL,
  `hour_from` time DEFAULT NULL,
  `weekday` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `id_church` int(11) NOT NULL,
  `id_activity_type` int(11) NOT NULL,
  PRIMARY KEY (`id_church_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activityunique`
--

CREATE TABLE IF NOT EXISTS `activityunique` (
  `id_activityunique` int(11) NOT NULL AUTO_INCREMENT,
  `date_from` varchar(45) DEFAULT NULL,
  `date_to` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_activityunique`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity_type`
--

CREATE TABLE IF NOT EXISTS `activity_type` (
  `id_activity_type` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id_activity_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `id_address` int(11) NOT NULL AUTO_INCREMENT,
  `latitude` varchar(45) DEFAULT NULL,
  `longitude` varchar(45) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `number` varchar(45) DEFAULT NULL,
  `zipcode` varchar(45) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `id_church` int(11) NOT NULL,
  `id_municipality` int(11) NOT NULL,
  `id_province` int(11) NOT NULL,
  PRIMARY KEY (`id_address`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5653 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `badge`
--

CREATE TABLE IF NOT EXISTS `badge` (
  `id_badge` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id_badge`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `church`
--

CREATE TABLE IF NOT EXISTS `church` (
  `id_church` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `id_motherchurch` int(11) DEFAULT NULL,
  `numbermember` int(11) DEFAULT NULL,
  `exists` int(11) DEFAULT NULL,
  `id_denomination` int(11) NOT NULL,
  PRIMARY KEY (`id_church`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='	' AUTO_INCREMENT=5653 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `church_activityunique`
--

CREATE TABLE IF NOT EXISTS `church_activityunique` (
  `id_church_activityunique` int(11) NOT NULL AUTO_INCREMENT,
  `id_church` int(11) NOT NULL,
  `id_activityunique` int(11) NOT NULL,
  PRIMARY KEY (`id_church_activityunique`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `church_badge`
--

CREATE TABLE IF NOT EXISTS `church_badge` (
  `id_church_badge` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT NULL,
  `id_badge` int(11) NOT NULL,
  `id_church` int(11) NOT NULL,
  PRIMARY KEY (`id_church_badge`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `church_servant`
--

CREATE TABLE IF NOT EXISTS `church_servant` (
  `id_church_servant` int(11) NOT NULL AUTO_INCREMENT,
  `id_servant` int(11) NOT NULL,
  `id_church` int(11) NOT NULL,
  PRIMARY KEY (`id_church_servant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id_country` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_country`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denomination`
--

CREATE TABLE IF NOT EXISTS `denomination` (
  `id_denomination` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id_denomination`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `id_email` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `id_church` int(11) NOT NULL,
  PRIMARY KEY (`id_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1356 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id_gallery` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `id_church` int(11) NOT NULL,
  PRIMARY KEY (`id_gallery`,`id_church`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id_images` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `id_gallery` int(11) NOT NULL,
  PRIMARY KEY (`id_images`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipality`
--

CREATE TABLE IF NOT EXISTS `municipality` (
  `id_municipality` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `id_province` int(11) NOT NULL,
  PRIMARY KEY (`id_municipality`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1005 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pobox`
--

CREATE TABLE IF NOT EXISTS `pobox` (
  `id_pobox` int(11) NOT NULL AUTO_INCREMENT,
  `id_church` int(11) NOT NULL,
  `data` varchar(45) DEFAULT NULL,
  `zipcode` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_pobox`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preach`
--

CREATE TABLE IF NOT EXISTS `preach` (
  `id_preach` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `author` varchar(255) DEFAULT NULL,
  `audio` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `tag` text,
  `id_church` int(11) NOT NULL,
  PRIMARY KEY (`id_preach`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preach_quote`
--

CREATE TABLE IF NOT EXISTS `preach_quote` (
  `id_preach_quote` int(11) NOT NULL AUTO_INCREMENT,
  `book` varchar(255) DEFAULT NULL,
  `chapter_from` varchar(45) DEFAULT NULL,
  `chapter_to` varchar(45) DEFAULT NULL,
  `verse_from` varchar(45) DEFAULT NULL,
  `verse_to` varchar(45) DEFAULT NULL,
  `id_preach` int(11) NOT NULL,
  PRIMARY KEY (`id_preach_quote`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='	' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `province`
--

CREATE TABLE IF NOT EXISTS `province` (
  `id_province` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `id_country` int(11) NOT NULL,
  PRIMARY KEY (`id_province`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servant`
--

CREATE TABLE IF NOT EXISTS `servant` (
  `id_servant` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_servant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telephone`
--

CREATE TABLE IF NOT EXISTS `telephone` (
  `id_telephone` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `id_church` int(11) NOT NULL,
  PRIMARY KEY (`id_telephone`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2800 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_contact`
--

CREATE TABLE IF NOT EXISTS `web_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_gallery`
--

CREATE TABLE IF NOT EXISTS `web_gallery` (
  `id_web_gallery` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_web_gallery`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_team`
--

CREATE TABLE IF NOT EXISTS `web_team` (
  `id_web_team` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_web_team`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_workwithus`
--

CREATE TABLE IF NOT EXISTS `web_workwithus` (
  `id_web_workwithus` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_web_workwithus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `www`
--

CREATE TABLE IF NOT EXISTS `www` (
  `id_www` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `id_church` int(11) NOT NULL,
  `id_www_type` int(11) NOT NULL,
  PRIMARY KEY (`id_www`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=676 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `www_type`
--

CREATE TABLE IF NOT EXISTS `www_type` (
  `id_www_type` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_www_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zzz_final030614`
--

CREATE TABLE IF NOT EXISTS `zzz_final030614` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `oldid` int(5) NOT NULL,
  `idprov` int(3) NOT NULL,
  `idmun` int(3) NOT NULL,
  `provincia` varchar(99) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `municipio` varchar(99) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nombre` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `origen` varchar(3) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lat` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lon` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `direccion` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `numero` varchar(99) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `extra` varchar(99) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cp` varchar(7) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `apdo` varchar(7) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cpapdo` varchar(7) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `zona` varchar(2) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `horarios` varchar(999) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `denom` varchar(99) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `igmadre` int(5) NOT NULL DEFAULT '0',
  `miembros` int(9) NOT NULL,
  `ofrendas_me` int(9) NOT NULL,
  `cajasonn2009` varchar(9) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cajasonn2010` varchar(9) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cajasonn2011` varchar(9) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cajasonn2012` varchar(9) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cajasonn2013` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cajasonn2014` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cajasonn2015` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cajasonn2016` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cajasonn2017` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cajasonn2018` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cajasonn2019` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cajasonn2020` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `vol_onn` int(9) NOT NULL,
  `vol_decision` int(9) NOT NULL,
  `tlf1` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tlf2` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `mvl1` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `mvl2` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `fax` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email1` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email2` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `web1` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `web2` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `facebook` varchar(99) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `twitter` varchar(99) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `youtube` varchar(99) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `gplus` varchar(99) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `idembajador` int(5) NOT NULL,
  `existe` varchar(2) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `informacion` varchar(999) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `direccionoriginal` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `devoluciones` int(2) NOT NULL,
  `relevante` varchar(2) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'si',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5943 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zzz_intermedia`
--

CREATE TABLE IF NOT EXISTS `zzz_intermedia` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `oldid` int(4) NOT NULL,
  `idprov` int(3) NOT NULL,
  `idmun` int(3) NOT NULL,
  `provincia` varchar(99) COLLATE utf8_bin NOT NULL,
  `municipio` varchar(99) COLLATE utf8_bin NOT NULL,
  `titulo` varchar(25) COLLATE utf8_bin NOT NULL,
  `nombre1` varchar(50) COLLATE utf8_bin NOT NULL,
  `nombre2` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellido1` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellido2` varchar(50) COLLATE utf8_bin NOT NULL,
  `tlf1` varchar(15) COLLATE utf8_bin NOT NULL,
  `tlf2` varchar(15) COLLATE utf8_bin NOT NULL,
  `mvl1` varchar(15) COLLATE utf8_bin NOT NULL,
  `mvl2` varchar(15) COLLATE utf8_bin NOT NULL,
  `email1` varchar(99) COLLATE utf8_bin NOT NULL,
  `email2` varchar(99) COLLATE utf8_bin NOT NULL,
  `web1` varchar(99) COLLATE utf8_bin NOT NULL,
  `web2` varchar(99) COLLATE utf8_bin NOT NULL,
  `facebook` varchar(99) COLLATE utf8_bin NOT NULL,
  `twitter` varchar(99) COLLATE utf8_bin NOT NULL,
  `gplus` varchar(99) COLLATE utf8_bin NOT NULL,
  `youtube` varchar(99) COLLATE utf8_bin NOT NULL,
  `dir` varchar(99) COLLATE utf8_bin NOT NULL,
  `num` varchar(5) COLLATE utf8_bin NOT NULL,
  `extra` varchar(50) COLLATE utf8_bin NOT NULL,
  `cp` varchar(5) COLLATE utf8_bin NOT NULL,
  `cp2` varchar(5) COLLATE utf8_bin NOT NULL,
  `zona` varchar(9) COLLATE utf8_bin NOT NULL,
  `lat` varchar(15) COLLATE utf8_bin NOT NULL,
  `lon` varchar(15) COLLATE utf8_bin NOT NULL,
  `org1` int(4) NOT NULL,
  `org2` int(4) NOT NULL,
  `org3` int(4) NOT NULL,
  `org4` int(4) NOT NULL,
  `org5` int(4) NOT NULL,
  `org6` int(4) NOT NULL,
  `org7` int(4) NOT NULL,
  `org8` int(4) NOT NULL,
  `onn2010` varchar(1) COLLATE utf8_bin NOT NULL,
  `onn2011` varchar(1) COLLATE utf8_bin NOT NULL,
  `onn2012` varchar(1) COLLATE utf8_bin NOT NULL,
  `onn2013` varchar(1) COLLATE utf8_bin NOT NULL,
  `onn2014` varchar(1) COLLATE utf8_bin NOT NULL,
  `onn2015` varchar(1) COLLATE utf8_bin NOT NULL,
  `onn2016` varchar(1) COLLATE utf8_bin NOT NULL,
  `onn2017` varchar(1) COLLATE utf8_bin NOT NULL,
  `onn2018` varchar(1) COLLATE utf8_bin NOT NULL,
  `onn2019` varchar(1) COLLATE utf8_bin NOT NULL,
  `onn2020` varchar(1) COLLATE utf8_bin NOT NULL,
  `director` varchar(1) COLLATE utf8_bin NOT NULL,
  `me` varchar(1) COLLATE utf8_bin NOT NULL,
  `onn` varchar(1) COLLATE utf8_bin NOT NULL,
  `voldec` varchar(1) COLLATE utf8_bin NOT NULL,
  `info` varchar(999) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2400 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
