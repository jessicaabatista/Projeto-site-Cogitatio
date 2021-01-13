-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Jan-2021 às 03:27
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id12955974_db_cogitatio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avisos`
--

CREATE TABLE `avisos` (
  `id_aviso` int(11) NOT NULL,
  `mensagem` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `fk_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE `consulta` (
  `id_consulta` int(11) NOT NULL,
  `data` date NOT NULL,
  `horario` int(11) NOT NULL,
  `fk_paciente` int(11) NOT NULL,
  `fk_psicologo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `data`, `horario`, `fk_paciente`, `fk_psicologo`) VALUES
(4, '2021-01-14', 10, 3, 6),
(8, '2021-01-20', 18, 3, 6),
(9, '2021-01-10', 17, 3, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `senha_funcionario` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email_funcionario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cpf_funcionario` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `nome_funcionario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `endereco_funcionario` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `telefone_funcionario` char(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `senha_funcionario`, `email_funcionario`, `cpf_funcionario`, `nome_funcionario`, `endereco_funcionario`, `telefone_funcionario`) VALUES
(2, '12345678', 'teste2@gmail.com', '00000000000', 'testetestetesteteste', 'aaaaaaaaaaaaaaaaaa', '11111111111');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `email_paciente` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `senha_paciente` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cpf_paciente` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `nome_paciente` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefone_paciente` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `endereco_paciente` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `data_nasc_paciente` date NOT NULL,
  `fk_psicologo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `email_paciente`, `senha_paciente`, `cpf_paciente`, `nome_paciente`, `telefone_paciente`, `endereco_paciente`, `data_nasc_paciente`, `fk_psicologo`) VALUES
(3, 'teste3@gmail.com', '12345678', '00000000011', 'teste pacteste pacteste pac', '22222222222', 'teste endereço 3', '2021-01-12', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `psicologo`
--

CREATE TABLE `psicologo` (
  `id_psicologo` int(11) NOT NULL,
  `crp_psicologo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `senha_psicologo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cpf_psicologo` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `nome_psicologo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email_psicologo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefone_psicologo` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `endereco_psicologo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `infos_psicologo` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `psicologo`
--

INSERT INTO `psicologo` (`id_psicologo`, `crp_psicologo`, `senha_psicologo`, `cpf_psicologo`, `nome_psicologo`, `email_psicologo`, `telefone_psicologo`, `endereco_psicologo`, `infos_psicologo`) VALUES
(6, '123451111111', '12345678', '11111111111', 'psi testeaaaaaaaaaaaaaaaa', 'teste@gmail.com', '12222222222', 'aaaaaaaaaaaaaaaaaaaaaaaa', 'teste');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avisos`
--
ALTER TABLE `avisos`
  ADD PRIMARY KEY (`id_aviso`),
  ADD KEY `fk_paciente` (`fk_paciente`);

--
-- Índices para tabela `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `fk_paciente` (`fk_paciente`) USING BTREE,
  ADD KEY `fk_psicologo` (`fk_psicologo`) USING BTREE;

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD UNIQUE KEY `email_funcionario` (`email_funcionario`,`cpf_funcionario`);

--
-- Índices para tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`),
  ADD UNIQUE KEY `email_paciente` (`email_paciente`,`cpf_paciente`),
  ADD KEY `fk_psicologo` (`fk_psicologo`) USING BTREE;

--
-- Índices para tabela `psicologo`
--
ALTER TABLE `psicologo`
  ADD PRIMARY KEY (`id_psicologo`),
  ADD UNIQUE KEY `cpf` (`cpf_psicologo`),
  ADD UNIQUE KEY `email` (`email_psicologo`),
  ADD UNIQUE KEY `crp` (`crp_psicologo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `psicologo`
--
ALTER TABLE `psicologo`
  MODIFY `id_psicologo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `fk_paciente` FOREIGN KEY (`fk_paciente`) REFERENCES `paciente` (`id_paciente`),
  ADD CONSTRAINT `fk_psicologo` FOREIGN KEY (`fk_psicologo`) REFERENCES `psicologo` (`id_psicologo`);

--
-- Limitadores para a tabela `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `fk-paciente-psicologo` FOREIGN KEY (`fk_psicologo`) REFERENCES `psicologo` (`id_psicologo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
