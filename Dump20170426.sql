CREATE DATABASE  IF NOT EXISTS `db_mentor` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `db_mentor`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: db_mentor
-- ------------------------------------------------------
-- Server version	5.7.17-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_fichastecnicas`
--

DROP TABLE IF EXISTS `tbl_fichastecnicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_fichastecnicas` (
  `id_ft` int(11) NOT NULL AUTO_INCREMENT,
  `nome_ft` varchar(50) NOT NULL,
  `dataInicial_ft` date DEFAULT NULL,
  `dataFinal_ft` date DEFAULT NULL,
  `tempoTeste_ft` int(11) DEFAULT NULL,
  `localTeste_ft` varchar(50) DEFAULT NULL,
  `cliente_ft` varchar(50) DEFAULT NULL,
  `acompanhamento_ft` varchar(50) DEFAULT NULL,
  `componentes_ft` mediumtext,
  `metodologia_ft` mediumtext,
  `observacoes_ft` mediumtext,
  `visibilidade_ft` enum('PR','PU') DEFAULT 'PR',
  `destaque_ft` enum('S','N') DEFAULT 'N',
  `status_ft` char(2) DEFAULT NULL,
  `id_solicitacao_ft` int(11) DEFAULT NULL,
  `id_usuario_ft` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ft`),
  KEY `nome_ft_UNIQUE` (`nome_ft`),
  KEY `fk_idSolicitacao_sol_idx` (`id_solicitacao_ft`),
  KEY `fk_usuario_fichatecnica_idx` (`id_usuario_ft`),
  CONSTRAINT `fk_solicitacao_fichatecnica` FOREIGN KEY (`id_solicitacao_ft`) REFERENCES `tbl_solicitacoes` (`id_sol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_fichatecnica` FOREIGN KEY (`id_usuario_ft`) REFERENCES `tbl_usuarios` (`id_us`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_projetos`
--

DROP TABLE IF EXISTS `tbl_projetos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_projetos` (
  `id_prj` int(11) NOT NULL AUTO_INCREMENT,
  `nome_prj` varchar(70) CHARACTER SET utf8 NOT NULL,
  `descricao_prj` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `status_prj` char(1) CHARACTER SET utf8 NOT NULL DEFAULT 'I',
  `id_usuario_prj` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_prj`),
  UNIQUE KEY `nome_projeto_UNIQUE` (`nome_prj`),
  KEY `fk_usuario_projeto_idx` (`id_usuario_prj`),
  CONSTRAINT `fk_usuario_projeto` FOREIGN KEY (`id_usuario_prj`) REFERENCES `tbl_usuarios` (`id_us`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_relatorios`
--

DROP TABLE IF EXISTS `tbl_relatorios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_relatorios` (
  `id_rel` int(11) NOT NULL AUTO_INCREMENT,
  `idSolicitacao_rel` int(11) DEFAULT NULL,
  `obsRelator_rel` varchar(200) DEFAULT NULL,
  `obsDesenvolvedor_rel` varchar(200) DEFAULT NULL,
  `statusRelator_rel` char(1) DEFAULT NULL,
  `statusDesenvolvedor_rel` char(1) DEFAULT NULL,
  `id_Usuario_rel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rel`),
  KEY `fk_idSolicitacao_rel_idx` (`idSolicitacao_rel`),
  KEY `fk_usuario_relatorio_idx` (`id_Usuario_rel`),
  CONSTRAINT `fk_solicitacao_relatorio` FOREIGN KEY (`idSolicitacao_rel`) REFERENCES `tbl_solicitacoes` (`id_sol`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_relatorio` FOREIGN KEY (`id_Usuario_rel`) REFERENCES `tbl_usuarios` (`id_us`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_solicitacoes`
--

DROP TABLE IF EXISTS `tbl_solicitacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_solicitacoes` (
  `id_sol` int(11) NOT NULL AUTO_INCREMENT,
  `nome_sol` varchar(50) NOT NULL,
  `dataAbertura_sol` date NOT NULL,
  `dataNecessidade_sol` date DEFAULT NULL,
  `tempoTeste_sol` int(11) DEFAULT NULL,
  `unidadeMedida_sol` char(2) DEFAULT NULL,
  `componentesTestar_sol` mediumtext,
  `metodologia_sol` mediumtext,
  `observacoes_sol` mediumtext,
  `visibilidade_sol` char(2) DEFAULT 'PR',
  `status_sol` char(1) DEFAULT NULL,
  `idProjeto_sol` int(11) DEFAULT NULL,
  `idUsuario_sol` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_sol`),
  UNIQUE KEY `nome_sol_UNIQUE` (`nome_sol`),
  KEY `fk_idprojeto_idx` (`idProjeto_sol`),
  KEY `fk_idusuario_usuario_idx` (`idUsuario_sol`),
  CONSTRAINT `fk_solicitacao_projeto` FOREIGN KEY (`idProjeto_sol`) REFERENCES `tbl_projetos` (`id_prj`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitacao_usuario` FOREIGN KEY (`idUsuario_sol`) REFERENCES `tbl_usuarios` (`id_us`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_usuarios` (
  `id_us` int(11) NOT NULL AUTO_INCREMENT,
  `nome_us` varchar(45) DEFAULT NULL,
  `email_us` varchar(60) DEFAULT NULL,
  `login_us` varchar(15) DEFAULT NULL,
  `senha_us` varchar(45) DEFAULT NULL,
  `telefone_us` varchar(15) DEFAULT NULL,
  `status_us` char(1) DEFAULT 'I',
  `permissao_relator_us` char(1) DEFAULT NULL,
  `permissao_Grelator_us` char(1) DEFAULT NULL,
  `permissao_desenvolvedor_us` char(1) DEFAULT NULL,
  `permissao_Gdesenvolvedor_us` char(1) DEFAULT NULL,
  `permissao_secretario_us` char(1) DEFAULT NULL,
  `permissao_visualizador_us` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_us`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-26  1:29:31
