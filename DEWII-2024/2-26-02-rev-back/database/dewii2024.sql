-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Fev-2024 às 15:54
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `dewii2024`
--
CREATE DATABASE IF NOT EXISTS `dewii2024` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dewii2024`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id` int(11) NOT NULL,
  `fabricante` varchar(128) NOT NULL,
  `modelo` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`id`, `fabricante`, `modelo`) VALUES
(1, 'Ford', 'Maverick'),
(2, 'VW', 'Fusca');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata para tabela veiculos
--

--
-- Metadata para o banco de dados dewii2024
--
COMMIT;
