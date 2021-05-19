-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Maio-2021 às 16:23
-- Versão do servidor: 10.4.16-MariaDB
-- versão do PHP: 7.4.12

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

-- --------------------------------------------------------

--
-- Estrutura da tabela citacao
--

CREATE TABLE citacao (
  codigo int(11) NOT NULL,
  titulo varchar(200) NOT NULL,
  autores varchar(500) NOT NULL,
  revista varchar(200) NOT NULL,
  ano int(11) NOT NULL,
  volume int(11) NOT NULL,
  edicao int(11) NOT NULL,
  paginas varchar(100) NOT NULL,
  bibtex varchar(700) NOT NULL,
  link varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela citacao
--

INSERT INTO citacao (codigo, titulo, autores, revista, ano, volume, edicao, paginas, bibtex, link) VALUES
(2, 'Adaptando o Design Thinking para a Definição e Desenvolvimento de um Jogo Educacional Não Digital no Ensino de Gerenciamento de Riscos', 'Santos, Sebastião and Costa, Yandson and Carvalho, Flávia and Viana, Davi and Rivero, Luis', 'Anais do XXVIII Workshop sobre Educação em Computação', 2020, 0, 0, '46-50', '@inproceedings{santos2020adaptando,\r\n  title={Adaptando o Design Thinking para a Defini{\\c{c}}{~a}o e Desenvolvimento de um Jogo Educacional N{~a}o Digital no Ensino de Gerenciamento de Riscos},\r\n  author={Santos, Sebasti{~a}o and Costa, Yandson and Carvalho, Fl{\'a}via and Viana, Davi and Rivero, Luis},\r\n  booktitle={Anais do XXVIII Workshop sobre Educa{\\c{c}}{~a}o em Computa{\\c{c}}{~a}o},\r\n  pages={46--50},\r\n  year={2020},\r\n  organization={SBC}\r\n}', 'https://sol.sbc.org.br/index.php/wei/article/view/11127'),
(3, 'Identificando Jogos Sérios Para o Ensino de Engenharia de Software no Brasil Através de Um Mapeamento Sistemático', 'Santos, Sebastião Henrique Nascimento and Costa, Yandson de Jesus Saraiva and dos Santos, Davi Viana and Barradas Filho, Alex Oliveira and Junior, João Batista Bottentuit and Cabrejos, Luis Jorge Enrique Rivero', 'Research, Society and Development', 2020, 9, 7, 'e329973702-e329973702', '@article{santos2020identificando,\r\n  title={Identificando Jogos S{\'e}rios Para o Ensino de Engenharia de Software no Brasil Atrav{\'e}s de Um Mapeamento Sistem{\'a}tico},\r\n  author={Santos, Sebasti{~a}o Henrique Nascimento and Costa, Yandson de Jesus Saraiva and dos Santos, Davi Viana and Barradas Filho, Alex Oliveira and Junior, Jo{~a}o Batista Bottentuit and Cabrejos, Luis Jorge Enrique Rivero},\r\n  journal={Research, Society and Development},\r\n  volume={9},\r\n  number={7},\r\n  pages={e329973702--e329973702},\r\n  year={2020}\r\n}', 'https://www.researchgate.net/publication/341393524_Identificando_Jogos_Serios_Para_o_Ensino_de_Engenharia_de_Software_no_Brasil_Atraves_de_Um_Mapeamento_Sistematico'),
(4, 'ProgramSE: Um Jogo para Aprendizagem de Conceitos de Lógica de Programação', 'Silva, Rodrigo Ribeiro and Rivero, Luis and dos Santos, Rodrigo Pereira', 'Revista Brasileira de Informática na Educação', 2021, 29, 0, '301-330', '@article{silva2021programse,\r\n  title={ProgramSE: Um Jogo para Aprendizagem de Conceitos de L{\'o}gica de Programa{\\c{c}}{~a}o},\r\n  author={Silva, Rodrigo Ribeiro and Rivero, Luis and dos Santos, Rodrigo Pereira},\r\n  journal={Revista Brasileira de Inform{\'a}tica na Educa{\\c{c}}{~a}o},\r\n  volume={29},\r\n  pages={301--330},\r\n  year={2021}\r\n}', 'https://bsi.uniriotec.br/wp-content/uploads/sites/31/2020/05/201907RodrigoSilva.pdf'),
(5, 'APLICANDO TÉCNICAS DE ELICITAÇÃO DE REQUISITOS PARA A CONCEPÇÃO DE UM SISTEMA DE INFORMAÇÃO: UM RELATO DE EXPERIÊNCIA', 'Costa, Yandson de Jesus Saraiva and Estrela, Igor Rafael Barbosa and Gomes, Micael Machado and dos Santos, Davi Viana and Cabrejos, Luis Jorge Enrique Rivero and others', 'Interfaces Científicas-Exatas e Tecnológicas', 2020, 4, 1, '101-115', '@article{costa2020aplicando,\r\n  title={APLICANDO T{\'E}CNICAS DE ELICITA{\\c{C}}{~A}O DE REQUISITOS PARA A CONCEP{\\c{C}}{~A}O DE UM SISTEMA DE INFORMA{\\c{C}}{~A}O: UM RELATO DE EXPERI{^E}NCIA},\r\n  author={Costa, Yandson de Jesus Saraiva and Estrela, Igor Rafael Barbosa and Gomes, Micael Machado and dos Santos, Davi Viana and Cabrejos, Luis Jorge Enrique Rivero and others},\r\n  journal={Interfaces Cient{\'\\i}ficas-Exatas e Tecnol{\'o}gicas},\r\n  volume={4},\r\n  number={1},\r\n  pages={101--115},\r\n  year={2020}\r\n}', 'https://periodicos.set.edu.br/exatas/article/view/8809');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela citacao
--
ALTER TABLE citacao
  ADD PRIMARY KEY (codigo);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela citacao
--
ALTER TABLE citacao
  MODIFY codigo int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
