-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Jun-2021 às 03:26
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bibtex`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `article`
--

CREATE TABLE `article` (
  `idArticle` int(11) NOT NULL,
  `Title` varchar(150) DEFAULT NULL,
  `Authors` varchar(300) DEFAULT NULL,
  `Journal` varchar(100) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Volume` varchar(10) DEFAULT NULL,
  `Number` varchar(10) DEFAULT NULL,
  `Pages` varchar(20) DEFAULT NULL,
  `Month` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `article`
--

INSERT INTO `article` (`idArticle`, `Title`, `Authors`, `Journal`, `Year`, `Volume`, `Number`, `Pages`, `Month`) VALUES
(1, 'Identificando Jogos Sérios Para o Ensino de Engenharia de Software no Brasil Através de Um Mapeamento Sistemático', 'Santos, Sebastião Henrique Nascimento and Costa, Yandson de Jesus Saraiva and dos Santos, Davi Viana and Barradas Filho, Alex Oliveira and Junior, João Batista Bottentuit and Cabrejos, Luis Jorge Enrique Rivero', 'Research, Society and Development', 2020, '9', '7', 'e329973702-e32997370', ''),
(2, 'ProgramSE: Um Jogo para Aprendizagem de Conceitos de Lógica de Programação', 'Silva, Rodrigo Ribeiro and Rivero, Luis and dos Santos, Rodrigo Pereira', 'Revista Brasileira de Informática na Educação', 2021, '29', '', '301-330', ''),
(3, 'APLICANDO TÉCNICAS DE ELICITAÇÃO DE REQUISITOS PARA A CONCEPÇÃO DE UM SISTEMA DE INFORMAÇÃO: UM RELATO DE EXPERIÊNCIA', 'Costa, Yandson de Jesus Saraiva and Estrela, Igor Rafael Barbosa and Gomes, Micael Machado and dos Santos, Davi Viana and Cabrejos, Luis Jorge Enrique Rivero and others', 'Interfaces Científicas-Exatas e Tecnológicas', 2020, '4', '1', '101-115', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `book`
--

CREATE TABLE `book` (
  `idBook` int(11) NOT NULL,
  `Title` varchar(150) DEFAULT NULL,
  `Authors` varchar(150) DEFAULT NULL,
  `Publisher` varchar(100) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Volume` varchar(10) DEFAULT NULL,
  `Number` varchar(10) DEFAULT NULL,
  `Series` varchar(45) DEFAULT NULL,
  `Edition` varchar(45) DEFAULT NULL,
  `Month` varchar(20) DEFAULT NULL,
  `Note` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `book`
--

INSERT INTO `book` (`idBook`, `Title`, `Authors`, `Publisher`, `Year`, `Volume`, `Number`, `Series`, `Edition`, `Month`, `Note`) VALUES
(1, 'Why the best man for the job is a woman: The unique female qualities of leadership', 'Book, Esther Wachs and Book, Esther Wachs', 'HarperBusiness New York, NY', 2000, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `inproceedings`
--

CREATE TABLE `inproceedings` (
  `idInproceedings` int(11) NOT NULL,
  `Title` varchar(150) DEFAULT NULL,
  `Authors` varchar(150) DEFAULT NULL,
  `Booktitle` varchar(150) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Editor` varchar(100) DEFAULT NULL,
  `Volume` varchar(10) DEFAULT NULL,
  `Number` varchar(10) DEFAULT NULL,
  `Series` varchar(45) DEFAULT NULL,
  `Pages` varchar(20) DEFAULT NULL,
  `Address` varchar(45) DEFAULT NULL,
  `Month` varchar(20) DEFAULT NULL,
  `Organization` varchar(100) DEFAULT NULL,
  `Publisher` varchar(100) DEFAULT NULL,
  `Note` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `inproceedings`
--

INSERT INTO `inproceedings` (`idInproceedings`, `Title`, `Authors`, `Booktitle`, `Year`, `Editor`, `Volume`, `Number`, `Series`, `Pages`, `Address`, `Month`, `Organization`, `Publisher`, `Note`) VALUES
(1, 'Adaptando o Design Thinking para a Definição e Desenvolvimento de um Jogo Educacional Não Digital no Ensino de Gerenciamento de Riscos', 'Santos, Sebastião and Costa, Yandson and Carvalho, Flávia and Viana, Davi and Rivero, Luis', 'Anais do XXVIII Workshop sobre Educação em Computação', 2020, '', '', '', '', '46-50', '', '', 'SBC', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `misc`
--

CREATE TABLE `misc` (
  `idMisc` int(11) NOT NULL,
  `Title` varchar(150) DEFAULT NULL,
  `Author` varchar(150) DEFAULT NULL,
  `Howpublished` varchar(100) DEFAULT NULL,
  `Month` varchar(20) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Note` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `phdthesis`
--

CREATE TABLE `phdthesis` (
  `idPhdthesis` int(11) NOT NULL,
  `Title` varchar(150) DEFAULT NULL,
  `Authors` varchar(150) DEFAULT NULL,
  `School` varchar(100) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `phdthesis`
--

INSERT INTO `phdthesis` (`idPhdthesis`, `Title`, `Authors`, `School`, `Year`, `Type`) VALUES
(1, 'PhD Thesis of The Universite de Lyon', 'Perrot, Vincent', 'Philips Research Paris', 2019, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idArticle`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`idBook`);

--
-- Indexes for table `inproceedings`
--
ALTER TABLE `inproceedings`
  ADD PRIMARY KEY (`idInproceedings`);

--
-- Indexes for table `misc`
--
ALTER TABLE `misc`
  ADD PRIMARY KEY (`idMisc`);

--
-- Indexes for table `phdthesis`
--
ALTER TABLE `phdthesis`
  ADD PRIMARY KEY (`idPhdthesis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
