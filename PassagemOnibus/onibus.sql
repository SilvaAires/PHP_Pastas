-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/07/2024 às 05:03
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `onibus`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `assentos`
--

CREATE TABLE `assentos` (
  `idAssento` int(11) NOT NULL,
  `fkOnibus` int(11) NOT NULL,
  `fkUser` int(11) NOT NULL,
  `numAssento` int(11) NOT NULL,
  `tipoAssento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `companhiaonibus`
--

CREATE TABLE `companhiaonibus` (
  `idCIA` int(11) NOT NULL,
  `nomeCIA` varchar(255) NOT NULL,
  `localCIA` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `companhiaonibus`
--

INSERT INTO `companhiaonibus` (`idCIA`, `nomeCIA`, `localCIA`, `telefone`, `email`, `logo`) VALUES
(3, 'aa', 'aa', 'aa', 'aa@aa.com', 'Logo/download.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `onibus`
--

CREATE TABLE `onibus` (
  `idOnibus` int(11) NOT NULL,
  `fkCIA` int(11) NOT NULL,
  `numOnibus` varchar(20) NOT NULL,
  `localOrigem` varchar(255) NOT NULL,
  `localDestino` varchar(255) NOT NULL,
  `tipoOnibus` varchar(255) NOT NULL,
  `dia` date NOT NULL,
  `dataHoraSaida` time NOT NULL,
  `dataHoraPrevisao` time NOT NULL,
  `preco` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `onibus`
--

INSERT INTO `onibus` (`idOnibus`, `fkCIA`, `numOnibus`, `localOrigem`, `localDestino`, `tipoOnibus`, `dia`, `dataHoraSaida`, `dataHoraPrevisao`, `preco`) VALUES
(2, 3, '1', '1', '2', '3', '2024-07-06', '15:35:00', '16:35:00', 100),
(3, 3, '32', '4', '5', 'exe', '2024-07-06', '21:01:00', '22:01:00', 100),
(5, 3, '54', '4', '5', 'semi', '2024-07-06', '19:03:00', '20:03:00', 100),
(6, 3, '5434', '4', '5', 'wer', '2024-07-06', '03:39:00', '05:39:00', 235),
(7, 3, '435', '4', '5', 'rtrwet', '2024-07-06', '05:39:00', '06:40:00', 542);

-- --------------------------------------------------------

--
-- Estrutura para tabela `passagemcompra`
--

CREATE TABLE `passagemcompra` (
  `idPass` int(11) NOT NULL,
  `fkOnibus` int(11) NOT NULL,
  `fkUser` int(11) NOT NULL,
  `preco` double NOT NULL,
  `formaPag` varchar(255) NOT NULL,
  `dataHoraComprada` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `apelido` varchar(100) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `CPF` varchar(20) NOT NULL,
  `Telefone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`idUser`, `apelido`, `nome`, `senha`, `CPF`, `Telefone`) VALUES
(5, 'adm', 'ADMINSTSADSA', '@ADMIN22', '111.111.121-11', '55 998549865');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `assentos`
--
ALTER TABLE `assentos`
  ADD PRIMARY KEY (`idAssento`),
  ADD KEY `fkonibusAss` (`fkOnibus`),
  ADD KEY `fkuserAss` (`fkUser`);

--
-- Índices de tabela `companhiaonibus`
--
ALTER TABLE `companhiaonibus`
  ADD PRIMARY KEY (`idCIA`);

--
-- Índices de tabela `onibus`
--
ALTER TABLE `onibus`
  ADD PRIMARY KEY (`idOnibus`),
  ADD KEY `fkCIAOnibus` (`fkCIA`);

--
-- Índices de tabela `passagemcompra`
--
ALTER TABLE `passagemcompra`
  ADD PRIMARY KEY (`idPass`),
  ADD KEY `fkonibusPass` (`fkOnibus`),
  ADD KEY `fkuserPass` (`fkUser`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `assentos`
--
ALTER TABLE `assentos`
  MODIFY `idAssento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `companhiaonibus`
--
ALTER TABLE `companhiaonibus`
  MODIFY `idCIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `onibus`
--
ALTER TABLE `onibus`
  MODIFY `idOnibus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `passagemcompra`
--
ALTER TABLE `passagemcompra`
  MODIFY `idPass` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `assentos`
--
ALTER TABLE `assentos`
  ADD CONSTRAINT `fkonibusAss` FOREIGN KEY (`fkOnibus`) REFERENCES `onibus` (`idOnibus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkuserAss` FOREIGN KEY (`fkUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `onibus`
--
ALTER TABLE `onibus`
  ADD CONSTRAINT `fkCIAOnibus` FOREIGN KEY (`fkCIA`) REFERENCES `companhiaonibus` (`idCIA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `passagemcompra`
--
ALTER TABLE `passagemcompra`
  ADD CONSTRAINT `fkonibusPass` FOREIGN KEY (`fkOnibus`) REFERENCES `onibus` (`idOnibus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkuserPass` FOREIGN KEY (`fkUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
