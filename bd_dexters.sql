-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Jun-2021 às 16:49
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: bd_dexters
--
CREATE DATABASE IF NOT EXISTS bd_dexters DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE bd_dexters;

-- --------------------------------------------------------

--
-- Estrutura da tabela article
--

DROP TABLE IF EXISTS article;
CREATE TABLE article (
  idArticle int(11) NOT NULL,
  title varchar(200) NOT NULL,
  authors varchar(200) NOT NULL,
  journal int(100) NOT NULL,
  year int(11) NOT NULL,
  volume int(11) NOT NULL,
  number int(11) NOT NULL,
  pages varchar(45) NOT NULL,
  month varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela book
--

DROP TABLE IF EXISTS book;
CREATE TABLE book (
  idBook int(11) NOT NULL,
  author varchar(200) NOT NULL,
  title varchar(200) NOT NULL,
  publisher varchar(200) NOT NULL,
  year int(11) NOT NULL,
  volume int(11) NOT NULL,
  number int(11) NOT NULL,
  series varchar(45) NOT NULL,
  edition varchar(45) NOT NULL,
  month varchar(45) NOT NULL,
  note varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela inproceedings
--

DROP TABLE IF EXISTS inproceedings;
CREATE TABLE inproceedings (
  idinproceedings int(11) NOT NULL,
  authors varchar(300) NOT NULL,
  title varchar(200) NOT NULL,
  booktitle varchar(100) NOT NULL,
  year int(11) NOT NULL,
  editor varchar(45) NOT NULL,
  volume varchar(45) NOT NULL,
  number varchar(45) NOT NULL,
  series varchar(45) NOT NULL,
  pages varchar(45) NOT NULL,
  address varchar(45) NOT NULL,
  month varchar(45) NOT NULL,
  organization varchar(45) NOT NULL,
  publisher varchar(45) NOT NULL,
  note varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela phdthesis
--

DROP TABLE IF EXISTS phdthesis;
CREATE TABLE phdthesis (
  idphdthesis int(11) NOT NULL,
  authors varchar(300) NOT NULL,
  title varchar(200) NOT NULL,
  school varchar(100) NOT NULL,
  year int(11) NOT NULL,
  type int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela article
--
ALTER TABLE article
  ADD PRIMARY KEY (idArticle);

--
-- Índices para tabela book
--
ALTER TABLE book
  ADD PRIMARY KEY (idBook);

--
-- Índices para tabela inproceedings
--
ALTER TABLE inproceedings
  ADD PRIMARY KEY (idinproceedings);

--
-- Índices para tabela phdthesis
--
ALTER TABLE phdthesis
  ADD PRIMARY KEY (idphdthesis);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
