-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Nov-2017 às 13:18
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 5.6.31

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

--
-- Extraindo dados da tabela `aparelho`
--

INSERT INTO `aparelho` (`aparelhoID`, `marca`, `modelo`, `dataAquisicao`, `ultimaManutencao`) VALUES
(1, 'Nakagym', 'Supino Vertical', '2017-01-01', '2017-03-01'),
(2, 'GymStudio', 'Esteira', '2017-05-04', '2017-06-06'),
(3, 'Nakagym', 'Cama Flexora', '2017-06-05', '2017-07-07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicio`
--

CREATE TABLE `exercicio` (
  `exercicioID` int(11) NOT NULL,
  `nome` varchar(35) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `exercicio`
--

INSERT INTO `exercicio` (`exercicioID`, `nome`, `descricao`) VALUES
(1, 'Abdominal', 'Deitado, de costas.'),
(2, 'FlexÃ£o', 'De barriga para baixo.'),
(3, 'Polichinelo', 'Pular e abrir braÃ§os e pernas.');

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

--
-- Extraindo dados da tabela `rotina`
--

INSERT INTO `rotina` (`rotinaID`, `ex1`, `ap1`, `rep1`, `ex2`, `ap2`, `rep2`, `ex3`, `ap3`, `rep3`, `ex4`, `ap4`, `rep4`, `ex5`, `ap5`, `rep5`) VALUES
(1, 2, 2, 4, 1, 1, 2, 3, 2, 5, 3, 1, 6, 1, 3, 2);

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
  `situacao` varchar(7) DEFAULT NULL,
  `permissao` int(11) DEFAULT NULL,
  `senha` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `treinador`
--

INSERT INTO `treinador` (`id`, `nome`, `sobrenome`, `idade`, `RG`, `CPF`, `carteiraTrab`, `salario`, `dataContratacao`, `situacao`, `permissao`, `senha`) VALUES
(1, 'admin', NULL, NULL, '12345', NULL, NULL, NULL, NULL, NULL, 3, '$2y$10$upn1970UnI7mw19jgueiqOyOD447ywNFWLza8/LyryqZ1Cu5PutHO'),
(2, 'JosÃ©', 'Arantes Nascimento', 29, '265486984', '43606064861', '12345', 3500, '2017-04-02', 'Ativo', 1, '$2y$10$YA6gaTsUeVEd4KgDHAqAZOEvpihZv6SY/lMQTeMbxQuWbSbl8UODO'),
(3, 'Rodrigo', 'Pereira', 29, '849652587', '43606064861', '12345', 2800, '2017-02-02', 'Ativo', 1, '$2y$10$hv19e7MvUlJyakFs57DEd.JiqofyyUO2f6vZUSFJ6H8ANqITmLUmK');

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
  `peso` double DEFAULT NULL,
  `permissao` int(11) DEFAULT NULL,
  `senha` varchar(60) DEFAULT NULL,
  `temrotina` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `idade`, `RG`, `CPF`, `sexo`, `altura`, `peso`, `permissao`, `senha`, `temrotina`) VALUES
(1, 'Isabela', 'Almeida', 35, '548726598', '43606064861', 'Feminino', 170, 64, 0, '$2y$10$QzSZiOQp3q4.K6tb57ILwuQrmyi5VwoMTdrC.atJkUF6GrjjSEXiW', 1),
(2, 'Mario', 'Rodrigues', 25, '514987524', '43606064861', 'Masculino', 150, 65, 0, '$2y$10$IViw6CDbu7jNTwRhCigFXuYxlge6fDR2TmLeipyhKwbcRJpx5/oZO', 0);

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
-- AUTO_INCREMENT for table `aparelho`
--
ALTER TABLE `aparelho`
  MODIFY `aparelhoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `exercicio`
--
ALTER TABLE `exercicio`
  MODIFY `exercicioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `treinador`
--
ALTER TABLE `treinador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
