-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03-Dez-2018 às 14:06
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motorama`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `user_comentario` int(11) NOT NULL,
  `conteudo_comentario` varchar(200) NOT NULL,
  `data_comentario` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `noticia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `user_comentario`, `conteudo_comentario`, `data_comentario`, `noticia`) VALUES
(12, 2, '123', '2018-12-02 16:03:14', 9),
(13, 2, 'teste', '2018-12-02 16:04:25', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `par1` varchar(1000) NOT NULL,
  `img1` varchar(1000) NOT NULL,
  `par2` varchar(1000) DEFAULT NULL,
  `img2` varchar(1000) DEFAULT NULL,
  `par3` varchar(1000) DEFAULT NULL,
  `img3` varchar(1000) DEFAULT NULL,
  `par4` varchar(1000) DEFAULT NULL,
  `img4` varchar(1000) DEFAULT NULL,
  `data` datetime DEFAULT CURRENT_TIMESTAMP,
  `original_poster` int(11) DEFAULT NULL,
  `preview` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `titulo`, `par1`, `img1`, `par2`, `img2`, `par3`, `img3`, `par4`, `img4`, `data`, `original_poster`, `preview`) VALUES
(9, 'dwqdqw', 'dwqdqw', 'http://static.hasselblad.com/2015/04/Dolphins_1-1000x1000.jpg', '', '', '', '', '', '', '2018-12-02 15:37:56', 2, 'testando 123 aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(10, 'teste 123', 'fabiano', 'http://static.hasselblad.com/2015/04/Dolphins_1-1000x1000.jpg', '', '', '', '', '', '', '2018-12-02 15:49:18', 2, 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `nome`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `data_nasc` datetime DEFAULT NULL,
  `data_conta` datetime DEFAULT CURRENT_TIMESTAMP,
  `tipo_usuario` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `username`, `senha`, `data_nasc`, `data_conta`, `tipo_usuario`, `email`, `foto`) VALUES
(1, 'joao', 'joao', '81dc9bdb52d04dc20036dbd8313ed055', '2018-11-15 00:00:00', '2018-11-30 16:54:19', 2, '', 'https://e0.365dm.com/18/06/768x432/skysports-f1-kimi-raikkonen_4348213.jpg?20180628171614'),
(2, 'administrador', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2018-11-15 00:00:00', '2018-11-30 20:59:30', 1, '', ''),
(3, 'pedro', 'pedrin', '81dc9bdb52d04dc20036dbd8313ed055', '0000-00-00 00:00:00', '2018-12-02 16:54:33', 2, 'lola123@gmail.com', 'https://i.pinimg.com/originals/b8/59/f1/b859f1e68b68eec03d8f663c6668c088.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `user_comentario` (`user_comentario`),
  ADD KEY `noticia` (`noticia`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`),
  ADD KEY `fk_noticias_usuarios1_idx` (`original_poster`);

--
-- Indexes for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `tipo_usuario` (`tipo_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`user_comentario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`noticia`) REFERENCES `noticias` (`id_noticia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`original_poster`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
