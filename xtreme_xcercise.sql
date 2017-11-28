-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Nov-2017 às 01:49
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
-- Estrutura da tabela `exercicio`
--

CREATE TABLE `exercicio` (
  `nome` varchar(35) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `exercicio`
--

INSERT INTO `exercicio` (`nome`, `descricao`) VALUES
('Abdominal', 'De costas');

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

--
-- Extraindo dados da tabela `treinador`
--

INSERT INTO `treinador` (`id`, `nome`, `sobrenome`, `idade`, `RG`, `CPF`, `carteiraTrab`, `salario`, `dataContratacao`, `situacao`) VALUES
(1, 'Renato', 'Rodrigues', 22, '123456789', '123456789', '12345', 12345, '2017-01-01', 'Ativo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `treinador`
--
ALTER TABLE `treinador`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `treinador`
--
ALTER TABLE `treinador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
