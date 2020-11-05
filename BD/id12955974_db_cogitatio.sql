-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 14-Set-2020 às 22:08
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Estrutura da tabela `adm`
--

CREATE TABLE `adm` (
  `id_adm` int(11) NOT NULL,
  `email_adm` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `senha_adm` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cpf_adm` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `nome_adm` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefone_adm` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `endereco_adm` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `telefone_funcionario` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `fk_psicologo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsalvel`
--

CREATE TABLE `responsalvel` (
  `id_responsavel` int(11) NOT NULL,
  `email_responsavel` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cpf_responsavel` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `nome_responsavel` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefone_responsavel` char(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste`
--

CREATE TABLE `teste` (
  `id_teste` int(11) NOT NULL,
  `email_teste` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `senha_teste` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id_adm`),
  ADD UNIQUE KEY `email_adm` (`email_adm`,`cpf_adm`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD UNIQUE KEY `email_funcionario` (`email_funcionario`,`cpf_funcionario`),
  ADD UNIQUE KEY `fk_psicologo` (`fk_psicologo`);

--
-- Índices para tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`),
  ADD UNIQUE KEY `email_paciente` (`email_paciente`,`cpf_paciente`),
  ADD UNIQUE KEY `fk_psicologo` (`fk_psicologo`);

--
-- Índices para tabela `psicologo`
--
ALTER TABLE `psicologo`
  ADD PRIMARY KEY (`id_psicologo`),
  ADD UNIQUE KEY `cpf` (`cpf_psicologo`),
  ADD UNIQUE KEY `email` (`email_psicologo`),
  ADD UNIQUE KEY `crp` (`crp_psicologo`);

--
-- Índices para tabela `responsalvel`
--
ALTER TABLE `responsalvel`
  ADD PRIMARY KEY (`id_responsavel`),
  ADD UNIQUE KEY `email_responsavel` (`email_responsavel`,`cpf_responsavel`),
  ADD UNIQUE KEY `fk_paciente` (`fk_paciente`);

--
-- Índices para tabela `teste`
--
ALTER TABLE `teste`
  ADD PRIMARY KEY (`id_teste`),
  ADD UNIQUE KEY `email_teste` (`email_teste`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `psicologo`
--
ALTER TABLE `psicologo`
  MODIFY `id_psicologo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `responsalvel`
--
ALTER TABLE `responsalvel`
  MODIFY `id_responsavel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `teste`
--
ALTER TABLE `teste`
  MODIFY `id_teste` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk-funcionario-psicologo` FOREIGN KEY (`fk_psicologo`) REFERENCES `psicologo` (`id_psicologo`);

--
-- Limitadores para a tabela `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `fk-paciente-psicologo` FOREIGN KEY (`fk_psicologo`) REFERENCES `psicologo` (`id_psicologo`);

--
-- Limitadores para a tabela `responsalvel`
--
ALTER TABLE `responsalvel`
  ADD CONSTRAINT `fk` FOREIGN KEY (`fk_paciente`) REFERENCES `paciente` (`id_paciente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;