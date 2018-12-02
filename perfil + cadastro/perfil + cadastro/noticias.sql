-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05-Fev-2018 às 11:34
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noticias`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aut_noticias`
--

CREATE TABLE `aut_noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `conteudo` varchar(255) DEFAULT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `aut_usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aut_noticias`
--

INSERT INTO `aut_noticias` (`id`, `titulo`, `conteudo`, `data`, `aut_usuario_id`) VALUES
(1, 'assunto', 'conteúdo blablabla blablabla bala blaba', '2018-02-05 02:00:00', 1),
(2, 'noticia 2', 'blablablablablabla blablabal balablabla balbal albal balbal albalbalba', '2018-02-05 10:33:57', 1),
(3, 'noticia 3', 'blablablablablabla blablabal balablabla balbal albal balbal albalbalba', '2018-02-05 10:33:59', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aut_usuario`
--

CREATE TABLE `aut_usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `postar` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aut_usuario`
--

INSERT INTO `aut_usuario` (`id`, `nome`, `login`, `senha`, `postar`) VALUES
(1, 'Fabiano Araujo', 'fabiano', NULL, 's');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aut_noticias`
--
ALTER TABLE `aut_noticias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_aut_noticias_aut_usuario_idx` (`aut_usuario_id`);

--
-- Indexes for table `aut_usuario`
--
ALTER TABLE `aut_usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aut_noticias`
--
ALTER TABLE `aut_noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `aut_usuario`
--
ALTER TABLE `aut_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aut_noticias`
--
ALTER TABLE `aut_noticias`
  ADD CONSTRAINT `fk_aut_noticias_aut_usuario` FOREIGN KEY (`aut_usuario_id`) REFERENCES `aut_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
