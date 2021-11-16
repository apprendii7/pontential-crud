-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 15-Nov-2021 às 19:48
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pontential_crud`
--
CREATE DATABASE IF NOT EXISTS `pontential_crud` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pontential_crud`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `desenvolvedores`
--

DROP TABLE IF EXISTS `desenvolvedores`;
CREATE TABLE IF NOT EXISTS `desenvolvedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(300) NOT NULL,
  `sexo` char(1) NOT NULL,
  `idade` int(3) NOT NULL,
  `hobby` varchar(300) NOT NULL,
  `datanascimento` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `desenvolvedores`
--

INSERT INTO `desenvolvedores` (`id`, `nome`, `sexo`, `idade`, `hobby`, `datanascimento`) VALUES
(54, 'das', 'M', 1, 'd', '2021-11-07'),
(51, 'pessoa 1234', 'M', 1, 'dasdads', '2021-11-07'),
(55, 'das 2', 'M', 1, 'da', '2021-11-17'),
(7, 'Alexandre', 'M', 29, 'Natureza', '1991-12-22'),
(53, 'dsadsad', 'M', 2, '2', '2021-11-17'),
(52, 'wadasdas', 'M', 2, '2', '2021-11-17'),
(57, 'JosÃ© Henrique', 'M', 21, 'Nadar', '2000-01-01'),
(13, 'Denise', 'F', 25, 'Ciclismo', '1995-09-10'),
(16, 'Pedro 2', 'M', 25, 'Gamer', '1995-10-10'),
(17, 'Denise', 'F', 25, 'Ciclismo', '1995-09-10'),
(18, 'Carla', 'F', 23, 'Gamer', '1998-04-10'),
(19, 'Alexandre', 'M', 29, 'Natureza', '1991-12-22'),
(20, 'Douglas', 'M', 25, 'Gamer', '1995-10-10'),
(21, 'Denise', 'F', 25, 'Ciclismo', '1995-09-10'),
(22, 'Carla', 'F', 23, 'Gamer', '1998-04-10'),
(23, 'Alexandre', 'M', 29, 'Natureza', '1991-12-22'),
(24, 'Douglas', 'M', 25, 'Gamer', '1995-10-10'),
(25, 'Denise', 'F', 25, 'Ciclismo', '1995-09-10'),
(27, 'Alexandre', 'M', 29, 'Natureza', '1991-12-22'),
(28, 'Douglas', 'M', 25, 'Gamer', '1995-10-10'),
(29, 'Denise', 'F', 25, 'Ciclismo', '1995-09-10'),
(30, 'Carla', 'F', 23, 'Gamer', '1998-04-10'),
(31, 'Alexandre', 'M', 29, 'Natureza', '1991-12-22'),
(32, 'Douglas', 'M', 25, 'Gamer', '1995-10-10'),
(33, 'Denise', 'F', 25, 'Ciclismo', '1995-09-10'),
(34, 'Carla', 'F', 23, 'Gamer', '1998-04-10'),
(35, 'Alexandre', 'M', 29, 'Natureza', '1991-12-22'),
(36, 'Douglas', 'M', 25, 'Gamer', '1995-10-10'),
(37, 'Denise', 'F', 25, 'Ciclismo', '1995-09-10'),
(38, 'Carla', 'F', 23, 'Gamer', '1998-04-10'),
(40, 'Douglas', 'M', 25, 'Gamer', '1995-10-10'),
(41, 'Denise', 'F', 25, 'Ciclismo', '1995-09-10'),
(42, 'Carla', 'F', 23, 'Gamer', '1998-04-10'),
(43, 'Alexandre', 'M', 29, 'Natureza', '1991-12-22'),
(44, 'Douglas', 'M', 25, 'Gamer', '1995-10-10'),
(45, 'Denise', 'F', 25, 'Ciclismo', '1995-09-10'),
(46, 'Carla', 'F', 23, 'Gamer', '1998-04-10'),
(47, 'Alexandre', 'M', 29, 'Natureza', '1991-12-22'),
(48, 'Douglas', 'M', 25, 'Gamer', '1995-10-10'),
(49, 'Denise', 'F', 25, 'Ciclismo', '1995-09-10'),
(50, 'Carla', 'F', 23, 'Gamer', '1998-04-10'),
(56, 'dsaddsadasdasdsadasdasdasdsadasd', 'M', 231, 'dsdadasdsa', '2021-11-07');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
