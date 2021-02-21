-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 21/02/2021 às 19:09
-- Versão do servidor: 8.0.23
-- Versão do PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loja`
--
CREATE DATABASE IF NOT EXISTS `loja` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `loja`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbProdutos`
--

CREATE TABLE `tbProdutos` (
  `codigo` int NOT NULL,
  `nome` varchar(30) NOT NULL,
  `preco` decimal(7,2) NOT NULL,
  `validade` date DEFAULT NULL,
  `descricao` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `imagem` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Fazendo dump de dados para tabela `tbProdutos`
--

INSERT INTO `tbProdutos` (`codigo`, `nome`, `preco`, `validade`, `descricao`, `imagem`) VALUES
(5, 'Camisa Bonita', '59.95', '2029-12-25', 'Camisa para testes', 'Camisa Bonita.png'),
(6, 'Mesa de Tenis', '2998.01', '2065-01-25', 'Mesa de ping pong', 'Mesa de Tenis.png'),
(9, 'Geladeira', '1899.99', '2021-02-01', 'Galadeira do Renato', 'Geladeira.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbUsuario`
--

CREATE TABLE `tbUsuario` (
  `id` int NOT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nivel` int NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Fazendo dump de dados para tabela `tbUsuario`
--

INSERT INTO `tbUsuario` (`id`, `usuario`, `email`, `senha`, `nivel`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'prof.ericocosta@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 0, NULL, NULL),
(19, 'erico', 'elcosta@gmail.com', '3a6fe47d36dd3ab763f78ee03c283bea', 0, NULL, '2021-02-21 10:02:43'),
(21, 'Lucas', '', '3a6fe47d36dd3ab763f78ee03c283bea', 0, NULL, NULL),
(27, 'luciana', 'lusipaubacosta@gmail.com', '3a6fe47d36dd3ab763f78ee03c283bea', 0, '2021-02-20 22:25:30', '2021-02-21 10:02:39');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tbProdutos`
--
ALTER TABLE `tbProdutos`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `tbUsuario`
--
ALTER TABLE `tbUsuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tbProdutos`
--
ALTER TABLE `tbProdutos`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de tabela `tbUsuario`
--
ALTER TABLE `tbUsuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
