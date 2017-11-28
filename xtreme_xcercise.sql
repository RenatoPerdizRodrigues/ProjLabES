-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Nov-2017 às 03:10
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xtreme_xcercise`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aparelho`
--

CREATE TABLE `aparelho` (
  `aparelhoID` int(11) NOT NULL,
  `marca` varchar(35) DEFAULT NULL,
  `modelo` varchar(35) DEFAULT NULL,
  `dataAquisicao` date DEFAULT NULL,
  `ultimaManutencao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicio`
--

CREATE TABLE `exercicio` (
  `exercicioID` int(11) NOT NULL,
  `nome` varchar(35) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rotina`
--

CREATE TABLE `rotina` (
  `rotinaID` int(11) NOT NULL,
  `ex1` int(11) DEFAULT NULL,
  `ap1` int(11) DEFAULT NULL,
  `rep1` int(11) DEFAULT NULL,
  `ex2` int(11) DEFAULT NULL,
  `ap2` int(11) DEFAULT NULL,
  `rep2` int(11) DEFAULT NULL,
  `ex3` int(11) DEFAULT NULL,
  `ap3` int(11) DEFAULT NULL,
  `rep3` int(11) DEFAULT NULL,
  `ex4` int(11) DEFAULT NULL,
  `ap4` int(11) DEFAULT NULL,
  `rep4` int(11) DEFAULT NULL,
  `ex5` int(11) DEFAULT NULL,
  `ap5` int(11) DEFAULT NULL,
  `rep5` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `treinador`
--

CREATE TABLE `treinador` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) DEFAULT NULL,
  `sobrenome` varchar(35) DEFAULT NULL,
  `idade` int(11) DEFAULT NULL,
  `RG` varchar(9) DEFAULT NULL,
  `CPF` varchar(11) DEFAULT NULL,
  `carteiraTrab` varchar(5) DEFAULT NULL,
  `salario` int(11) DEFAULT NULL,
  `dataContratacao` date DEFAULT NULL,
  `situacao` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) DEFAULT NULL,
  `sobrenome` varchar(35) DEFAULT NULL,
  `idade` int(11) DEFAULT NULL,
  `RG` varchar(9) DEFAULT NULL,
  `CPF` varchar(11) DEFAULT NULL,
  `sexo` varchar(9) DEFAULT NULL,
  `altura` float DEFAULT NULL,
  `peso` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aparelho`
--
ALTER TABLE `aparelho`
  ADD PRIMARY KEY (`aparelhoID`);

--
-- Indexes for table `exercicio`
--
ALTER TABLE `exercicio`
  ADD PRIMARY KEY (`exercicioID`);

--
-- Indexes for table `rotina`
--
ALTER TABLE `rotina`
  ADD PRIMARY KEY (`rotinaID`),
  ADD KEY `ex1` (`ex1`),
  ADD KEY `ex2` (`ex2`),
  ADD KEY `ex3` (`ex3`),
  ADD KEY `ex4` (`ex4`),
  ADD KEY `ex5` (`ex5`),
  ADD KEY `ap1` (`ap1`),
  ADD KEY `ap2` (`ap2`),
  ADD KEY `ap3` (`ap3`),
  ADD KEY `ap4` (`ap4`),
  ADD KEY `ap5` (`ap5`);

--
-- Indexes for table `treinador`
--
ALTER TABLE `treinador`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `treinador`
--
ALTER TABLE `treinador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `rotina`
--
ALTER TABLE `rotina`
  ADD CONSTRAINT `rotina_ibfk_1` FOREIGN KEY (`ex1`) REFERENCES `exercicio` (`exercicioID`),
  ADD CONSTRAINT `rotina_ibfk_10` FOREIGN KEY (`ap5`) REFERENCES `aparelho` (`aparelhoID`),
  ADD CONSTRAINT `rotina_ibfk_2` FOREIGN KEY (`ex2`) REFERENCES `exercicio` (`exercicioID`),
  ADD CONSTRAINT `rotina_ibfk_3` FOREIGN KEY (`ex3`) REFERENCES `exercicio` (`exercicioID`),
  ADD CONSTRAINT `rotina_ibfk_4` FOREIGN KEY (`ex4`) REFERENCES `exercicio` (`exercicioID`),
  ADD CONSTRAINT `rotina_ibfk_5` FOREIGN KEY (`ex5`) REFERENCES `exercicio` (`exercicioID`),
  ADD CONSTRAINT `rotina_ibfk_6` FOREIGN KEY (`ap1`) REFERENCES `aparelho` (`aparelhoID`),
  ADD CONSTRAINT `rotina_ibfk_7` FOREIGN KEY (`ap2`) REFERENCES `aparelho` (`aparelhoID`),
  ADD CONSTRAINT `rotina_ibfk_8` FOREIGN KEY (`ap3`) REFERENCES `aparelho` (`aparelhoID`),
  ADD CONSTRAINT `rotina_ibfk_9` FOREIGN KEY (`ap4`) REFERENCES `aparelho` (`aparelhoID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
