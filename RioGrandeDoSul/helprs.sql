-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/06/2024 às 16:34
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `helprs`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidade`
--

CREATE TABLE `cidade` (
  `idCidade` int(11) NOT NULL,
  `nome` varchar(130) NOT NULL,
  `populacao` int(11) NOT NULL,
  `feridos` int(11) NOT NULL,
  `mortos` int(11) NOT NULL,
  `desabrigados` int(11) NOT NULL,
  `pix` varchar(250) NOT NULL,
  `estadoSituacao` varchar(100) NOT NULL,
  `prejuizo` double NOT NULL,
  `valorArrecadado` double NOT NULL,
  `desemprego` int(11) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `userFKCidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cidade`
--

INSERT INTO `cidade` (`idCidade`, `nome`, `populacao`, `feridos`, `mortos`, `desabrigados`, `pix`, `estadoSituacao`, `prejuizo`, `valorArrecadado`, `desemprego`, `telefone`, `email`, `userFKCidade`) VALUES
(5, 'POA', 0, 0, 0, 0, 'POA', 'POA', 0, 0, 0, 'POA', 'POA', 29);

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `cnpj` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `prejuizo` double NOT NULL,
  `valorArrecadado` double NOT NULL,
  `pix` varchar(250) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `cidade` varchar(150) NOT NULL,
  `comporvanteResidencia` varchar(255) NOT NULL,
  `vagasDeEmprego` int(11) NOT NULL,
  `empregadosTotal` int(11) NOT NULL,
  `userFKEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagens`
--

CREATE TABLE `imagens` (
  `idimagem` int(11) NOT NULL,
  `descricao` varchar(130) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `userFK` int(11) NOT NULL,
  `data_upload` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `imagens`
--

INSERT INTO `imagens` (`idimagem`, `descricao`, `caminho`, `userFK`, `data_upload`) VALUES
(11, 'Imagem1', 'Imagens/c1.jpg', 29, '2024-06-14 13:44:04'),
(12, 'Imagem2', 'Imagens/c2.jpg', 29, '2024-06-14 13:44:13'),
(13, 'Imagem3', 'Imagens/c3.jpg', 29, '2024-06-14 13:44:23');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `idPessoa` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `pix` varchar(250) NOT NULL,
  `prejuizo` double NOT NULL,
  `valorArrecadado` double NOT NULL,
  `endereco` int(11) NOT NULL,
  `cidade` varchar(150) NOT NULL,
  `comprovanteResidencia` varchar(255) NOT NULL,
  `situacaoDeEmprego` varchar(150) NOT NULL,
  `userFKPessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pontodeajuda`
--

CREATE TABLE `pontodeajuda` (
  `idAjuda` int(11) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `cnpj` varchar(40) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `userFK` int(11) NOT NULL,
  `nome` varchar(130) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `redecomunicacoes`
--

CREATE TABLE `redecomunicacoes` (
  `idRede` int(11) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `whatsApp` int(20) NOT NULL,
  `site` varchar(100) NOT NULL,
  `portifolio` varchar(100) NOT NULL,
  `userFKRede` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `redecomunicacoes`
--

INSERT INTO `redecomunicacoes` (`idRede`, `facebook`, `twitter`, `linkedin`, `whatsApp`, `site`, `portifolio`, `userFKRede`) VALUES
(13, 'POA', 'POA', 'POA', 0, 'POA', 'POA', 29);

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `passaword` varchar(50) NOT NULL,
  `criacao` datetime NOT NULL,
  `tipoDeConta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`idUser`, `login`, `passaword`, `criacao`, `tipoDeConta`) VALUES
(29, 'POA', 'POA', '2024-06-14 15:43:51', 'cidade');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`idCidade`),
  ADD KEY `userFKCidade` (`userFKCidade`);

--
-- Índices de tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD KEY `userFKEmpresa` (`userFKEmpresa`);

--
-- Índices de tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`idimagem`),
  ADD KEY `userFK` (`userFK`);

--
-- Índices de tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`idPessoa`),
  ADD KEY `userFKPessoa` (`userFKPessoa`);

--
-- Índices de tabela `pontodeajuda`
--
ALTER TABLE `pontodeajuda`
  ADD PRIMARY KEY (`idAjuda`),
  ADD KEY `userFKPonto` (`userFK`);

--
-- Índices de tabela `redecomunicacoes`
--
ALTER TABLE `redecomunicacoes`
  ADD PRIMARY KEY (`idRede`),
  ADD KEY `userFKRede` (`userFKRede`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `idCidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `idimagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `idPessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pontodeajuda`
--
ALTER TABLE `pontodeajuda`
  MODIFY `idAjuda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `redecomunicacoes`
--
ALTER TABLE `redecomunicacoes`
  MODIFY `idRede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `userFKCidade` FOREIGN KEY (`userFKCidade`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `userFKEmpresa` FOREIGN KEY (`userFKEmpresa`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `userFK` FOREIGN KEY (`userFK`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `pessoa`
--
ALTER TABLE `pessoa`
  ADD CONSTRAINT `userFKPessoa` FOREIGN KEY (`userFKPessoa`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `pontodeajuda`
--
ALTER TABLE `pontodeajuda`
  ADD CONSTRAINT `userFKPonto` FOREIGN KEY (`userFK`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `redecomunicacoes`
--
ALTER TABLE `redecomunicacoes`
  ADD CONSTRAINT `userFKRede` FOREIGN KEY (`userFKRede`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
