-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Maio-2021 às 02:31
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dqc84`
--

CREATE TABLE `dqc84` (
  `ID` int(11) NOT NULL,
  `MODEL` int(11) NOT NULL,
  `FAT_PART_NO` varchar(15) NOT NULL,
  `TOTAL_LOCATION` int(11) NOT NULL,
  `UPDATE_DT` timestamp NOT NULL DEFAULT current_timestamp(),
  `CREATE_DT` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dqc84`
--

INSERT INTO `dqc84` (`ID`, `MODEL`, `FAT_PART_NO`, `TOTAL_LOCATION`, `UPDATE_DT`, `CREATE_DT`) VALUES
(4, 6, 'SD018CMABO', 128, '2021-05-05 23:43:19', '2021-05-05 17:27:47'),
(7, 8, 'SD019CMAB1R', 56, '2021-05-05 21:58:17', '2021-05-05 21:58:17'),
(9, 8, 'SD019CMAB1Y', 7, '2021-05-05 23:02:19', '2021-05-05 23:02:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dqc841`
--

CREATE TABLE `dqc841` (
  `ID` int(11) NOT NULL,
  `FAT_PART_NO` int(11) NOT NULL,
  `PARTS_NO` varchar(15) NOT NULL,
  `UNT_USG` int(11) NOT NULL,
  `DESCRIPTION` longtext NOT NULL,
  `REF_DESIGNATOR` longtext DEFAULT NULL,
  `UPDATE_DT` timestamp NOT NULL DEFAULT current_timestamp(),
  `CREATE_DT` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dqc841`
--

INSERT INTO `dqc841` (`ID`, `FAT_PART_NO`, `PARTS_NO`, `UNT_USG`, `DESCRIPTION`, `REF_DESIGNATOR`, `UPDATE_DT`, `CREATE_DT`) VALUES
(5, 4, 'HGSE5014R06', 2, 'LABEL PCB BARCODE LABEL 10X6MMM 25# PLASTIC BLANK', 'U11', '2021-05-05 23:37:49', '2021-05-05 20:16:42'),
(6, 4, 'SAH8NCJRZ05', 9, 'IC(DDR4 SDRAM) 1GX8 2666 FBGA 78P 1.2V TP', 'U1,U2,U3,U4,U5,U6,U7,U8', '2021-05-06 00:30:40', '2021-05-05 20:17:08'),
(8, 7, 'SDH40009Z07', 8, 'CHIT RES. 1/16W 240 +-1% 0402', 'R1,R2,R3,R4,R5,R6,R7,R8', '2021-05-05 23:49:32', '2021-05-05 22:01:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dqcmodel`
--

CREATE TABLE `dqcmodel` (
  `ID` int(11) NOT NULL,
  `MODEL` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dqcmodel`
--

INSERT INTO `dqcmodel` (`ID`, `MODEL`) VALUES
(9, 'SSD016'),
(6, 'SSD018'),
(8, 'SSD019'),
(10, 'SSD020');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `dqc84`
--
ALTER TABLE `dqc84`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `FAT_PART_NO` (`FAT_PART_NO`),
  ADD KEY `fk_DQCMODEL_MODEL` (`MODEL`);

--
-- Índices para tabela `dqc841`
--
ALTER TABLE `dqc841`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_DQC841_FAT_PART_NO` (`FAT_PART_NO`);

--
-- Índices para tabela `dqcmodel`
--
ALTER TABLE `dqcmodel`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `MODEL` (`MODEL`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `dqc84`
--
ALTER TABLE `dqc84`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `dqc841`
--
ALTER TABLE `dqc841`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `dqcmodel`
--
ALTER TABLE `dqcmodel`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `dqc84`
--
ALTER TABLE `dqc84`
  ADD CONSTRAINT `fk_DQCMODEL_MODEL` FOREIGN KEY (`MODEL`) REFERENCES `dqcmodel` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `dqc841`
--
ALTER TABLE `dqc841`
  ADD CONSTRAINT `fk_DQC841_FAT_PART_NO` FOREIGN KEY (`FAT_PART_NO`) REFERENCES `dqc84` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
