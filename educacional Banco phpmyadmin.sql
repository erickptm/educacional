-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 03-Out-2023 às 21:25
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `educacional`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status_cyberbullying` varchar(140) NOT NULL,
  `status_pedofilia` varchar(140) NOT NULL,
  `status_jogos` varchar(140) NOT NULL,
  `status_riscos` varchar(140) NOT NULL,
  `nome` varchar(140) DEFAULT NULL,
  `email` varchar(140) NOT NULL,
  `senha` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `status_cyberbullying`, `status_pedofilia`, `status_jogos`, `status_riscos`, `nome`, `email`, `senha`) VALUES
(27, 'aprovado', 'aprovado', 'aprovado', 'aprovado', 'Fernado Da Silva Medeiros', 'fernado21@gmail.com', '$2y$10$oBfD2XcqQrzNQdFwoUiTf.lrIb863GBSlVRTcbU2mgcwQ7Iqd6pR2'),
(26, 'aprovado', 'aprovado', 'Não realizado', 'Não realizado', 'Erick Piero Teixeira Martins', 'erick@gmail.com', '$2y$10$3OmWmGxp5wgkC47Zs00qY.Kty/IepejB8yNZDpqeBbVAUktGbLLrO');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
