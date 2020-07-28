-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Jul-2020 às 04:50
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `meuslocais`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `locais`
--

CREATE TABLE `locais` (
  `id` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `logradouro` varchar(150) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `numero` varchar(6) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `locais`
--

INSERT INTO `locais` (`id`, `nome`, `cep`, `logradouro`, `complemento`, `numero`, `bairro`, `uf`, `cidade`, `data`) VALUES
(21, 'balneario do caldas', '63180000', 'testetetetete', 'novo', '123456', 'teste', 'CE', 'Barbalha', '2020-07-16'),
(22, 'Lugar Aleatório de MG', '31080970', 'Rua Contagem 1385 Lojas 01/02', 'teste de cadastro complemento', '123456', 'Santa Inês', 'MG', 'Belo Horizonte', '2020-07-31'),
(23, 'Casa Gomes Silva', '63180000', 'teste', 'oioijo', '534', 'centro', 'CE', 'Barbalha', '2020-07-10'),
(24, 'Sitio Pinheiros', '63180000', 'Zona rural', 'c', 's/n', 'Zona rural', 'CE', 'Barbalha', '2020-07-03');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `locais`
--
ALTER TABLE `locais`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `locais`
--
ALTER TABLE `locais`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
