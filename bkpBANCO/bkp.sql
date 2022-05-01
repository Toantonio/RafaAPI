phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Abr-2022 às 00:59
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `rafagourmet`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `cep` varchar(8) NOT NULL,
  `logradouro` varchar(150) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `nome` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_nasc` date DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `cpf` varchar(12) NOT NULL,
  `id` int(11) NOT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`nome`, `senha`, `data_nasc`, `email`, `foto_perfil`, `tel`, `cpf`, `id`, `ativo`) VALUES
('antonio carlos', '12344', '1988-03-30', 'to_120@hotmail.com', '', '5555-55555', '123456789', 1, 0),
('Silvia Cristina2', '$5$rounds=5000$sc@email.com$e24FghG2q.nJb3WnW8UhQh9149g3ZweVFMu4DlWmI.1', '2010-05-12', 'sc@email.com', '', '5555-666666', '12312312344', 2, 1),
('Silvia Cristina2', '3f415f27d8797b3003575ee77b0ec225', '2010-05-12', 'sc@email.com', '', '5555-666666', '12312312344', 3, 1),
('Silvia Cristin4a', '3f415f27d8797b3003575ee77b0ec225', '2010-05-12', 'sc@email.com', '', '5555-666666', '12312312344', 4, 1),
('Silvia Cristin4a', '3f415f27d8797b3003575ee77b0ec225', '2010-05-12', 'sc@email.com', '', '5555-666666', '12312312344', 5, 1),
('Maria das Graças', '3d302d85d53c6ab4a85b55c1999eeab5', '1979-08-21', 'mg@email.com', '', '5555-88888', '123123888', 6, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_endereco`
--

CREATE TABLE `usuario_endereco` (
  `numero` varchar(20) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `ehPrincipal` tinyint(1) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`cep`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario_endereco`
--
ALTER TABLE `usuario_endereco`
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `cep` (`cep`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--