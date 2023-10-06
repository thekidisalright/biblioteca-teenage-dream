-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 05-Out-2023 às 03:04
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_biblioteca`
--
CREATE DATABASE IF NOT EXISTS `db_biblioteca` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_biblioteca`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_autor`
--

CREATE TABLE `tb_autor` (
  `cd_autor` int(11) NOT NULL,
  `nm_autor` varchar(255) NOT NULL,
  `url_autor` varchar(255) NOT NULL DEFAULT './images/autores/nenhum.jpg',
  `ds_autor` varchar(255) NOT NULL DEFAULT 'Nenhuma descrição.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_bibliotecario`
--

CREATE TABLE `tb_bibliotecario` (
  `cd_bibliotecario` int(11) NOT NULL,
  `pnm_bibliotecario` varchar(255) NOT NULL,
  `sbm_bibliotecario` varchar(255) NOT NULL,
  `email_bibliotecario` varchar(255) NOT NULL,
  `senha_bibliotecario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_editora`
--

CREATE TABLE `tb_editora` (
  `cd_editora` int(11) NOT NULL,
  `nm_editora` varchar(255) NOT NULL,
  `ds_editora` varchar(255) NOT NULL DEFAULT 'Nenhuma descrição.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_genero`
--

CREATE TABLE `tb_genero` (
  `cd_genero` int(11) NOT NULL,
  `nm_genero` varchar(255) NOT NULL,
  `ds_genero` varchar(255) NOT NULL DEFAULT 'Nenhuma descrição.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_livro`
--

CREATE TABLE `tb_livro` (
  `cd_livro` int(11) NOT NULL,
  `nm_livro` varchar(255) NOT NULL,
  `ds_livro` varchar(255) NOT NULL,
  `cd_autor` int(11) NOT NULL,
  `cd_editora` int(11) NOT NULL,
  `url_capa` varchar(255) NOT NULL DEFAULT './images/livros/nenhum.jpg',
  `ds_genero` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_reserva`
--

CREATE TABLE `tb_reserva` (
  `cd_livro` int(11) NOT NULL,
  `cd_usuario` int(11) NOT NULL,
  `dt_reserva` datetime NOT NULL,
  `dt_devolucao` datetime DEFAULT NULL,
  `cd_reserva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `cd_usuario` int(11) NOT NULL,
  `pnm_usuario` varchar(255) NOT NULL,
  `snm_usuario` varchar(255) NOT NULL,
  `ds_usuario` varchar(255) NOT NULL DEFAULT 'Nenhuma descrição.',
  `email_usuario` varchar(255) NOT NULL,
  `senha_usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_autor`
--
ALTER TABLE `tb_autor`
  ADD PRIMARY KEY (`cd_autor`);

--
-- Índices para tabela `tb_bibliotecario`
--
ALTER TABLE `tb_bibliotecario`
  ADD PRIMARY KEY (`cd_bibliotecario`),
  ADD UNIQUE KEY `uq_email_bibliotecario` (`email_bibliotecario`) USING HASH;

--
-- Índices para tabela `tb_editora`
--
ALTER TABLE `tb_editora`
  ADD PRIMARY KEY (`cd_editora`);

--
-- Índices para tabela `tb_livro`
--
ALTER TABLE `tb_livro`
  ADD PRIMARY KEY (`cd_livro`);

--
-- Índices para tabela `tb_reserva`
--
ALTER TABLE `tb_reserva`
  ADD PRIMARY KEY (`cd_reserva`);

--
-- Índices para tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`cd_usuario`),
  ADD UNIQUE KEY `username` (`email_usuario`) USING HASH;

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_autor`
--
ALTER TABLE `tb_autor`
  MODIFY `cd_autor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_bibliotecario`
--
ALTER TABLE `tb_bibliotecario`
  MODIFY `cd_bibliotecario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_editora`
--
ALTER TABLE `tb_editora`
  MODIFY `cd_editora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_livro`
--
ALTER TABLE `tb_livro`
  MODIFY `cd_livro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_reserva`
--
ALTER TABLE `tb_reserva`
  MODIFY `cd_reserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `cd_usuario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;