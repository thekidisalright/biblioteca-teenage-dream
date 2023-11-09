SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE db_biblioteca;
USE db_biblioteca;

CREATE TABLE `tb_autor` (
  `cd_autor` int(11) NOT NULL,
  `nm_autor` text NOT NULL,
  `img_autor` varchar(255) NULL DEFAULT './images/autores/nenhum.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tb_emprestimo` (
  `cd_emprestimo` int(11) NOT NULL,
  `cd_livro` int(11) NOT NULL,
  `cd_usuario` int(11) NOT NULL,
  `dt_emprestimo` datetime NOT NULL,
  `dt_devolucao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tb_livro` (
  `cd_livro` int(11) NOT NULL,
  `nm_livro` text NOT NULL,
  `img_livro` varchar(255) NOT NULL DEFAULT './images/livros/nenhum.jpg',
  `disponivel` tinyint(1) NOT NULL DEFAULT 1,
  `cd_autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tb_pedido` (
  `cd_pedido` int(11) NOT NULL,
  `cd_livro` int(11) NOT NULL,
  `cd_usuario` int(11) NOT NULL,
  `dt_pedido` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tb_usuario` (
  `cd_usuario` int(11) NOT NULL,
  `pnm_usuario` varchar(255) NOT NULL,
  `sbnm_usuario` varchar(255) NOT NULL,
  `email_usuario` text NOT NULL,
  `senha_usuario` text NOT NULL,
  `privilegio` char(5) NOT NULL DEFAULT 'comum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `tb_autor`
  ADD PRIMARY KEY (`cd_autor`);

ALTER TABLE `tb_emprestimo`
  ADD PRIMARY KEY (`cd_emprestimo`);

ALTER TABLE `tb_livro`
  ADD PRIMARY KEY (`cd_livro`);

ALTER TABLE `tb_pedido`
  ADD PRIMARY KEY (`cd_pedido`);

ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`cd_usuario`);

ALTER TABLE `tb_autor`
  MODIFY `cd_autor` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tb_emprestimo`
  MODIFY `cd_emprestimo` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tb_livro`
  MODIFY `cd_livro` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tb_pedido`
  MODIFY `cd_pedido` int(11) NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `tb_usuario`
  MODIFY `cd_usuario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;