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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_fichastecnicas`
--

LOCK TABLES `tbl_fichastecnicas` WRITE;
/*!40000 ALTER TABLE `tbl_fichastecnicas` DISABLE KEYS */;
INSERT INTO `tbl_fichastecnicas` VALUES (1,'nome','2017-01-01','2017-02-02',12,'local','cliente','acomp','comp','met','obs','PR','S','N',1,1),(3,'Nome ft','2017-01-01','2018-02-02',12,'cassio','cliente','acomp','comp','met','obs','PR','S','N',NULL,NULL),(4,'nova ft','2017-01-01','2017-02-02',32,'cassio','cliente','acomp','compo','met','obs','PR','S','N',1,NULL),(5,'q','2017-05-12','2017-05-20',5,'trsste','abc','afdg','bnm,','bnm,','bm,','PR','S','N',1,NULL),(6,'tre','2017-01-01','2017-01-01',9,'tre','tre','tre','ter','tre','tre','PR','S','N',3,NULL),(7,'FT sol 7','2017-01-01','2018-02-02',32,'local','cliente','acomp','comp','met','obs','PU','S','N',7,NULL),(8,'Nova FT da sol 7','2017-05-08','2018-11-01',52,'local','cliente','acomp','cccc','aaaaa','oooooo','PR','S','N',7,NULL),(9,'FT da SOL6 e PRJ 29','2016-10-02','2017-10-02',65,'Casa do Diego','UPF - STARA','Cássio F.','Gravação da FT','Inserindo dados no formulário','obs','PR','S','N',6,NULL),(10,'FT da SOL 8 e PRJ 14','2017-05-15','2017-05-15',1,'No Ap','UPF','Cassio','comp da FT da SOL 8 e PRJ 14','met da FT da SOL 8 e PRJ 14','obs da FT da SOL 8 e PRJ 14','PR','N','N',8,NULL),(11,'Ficha técnica da Solicitação 13 e Projeto 29','2016-07-09','2017-02-09',950,'Casa do Diego','UPF - STARA','Cássio','Componentes testados da Ficha técnica da Solicitação 13 e Projeto 29 Componentes testados da Ficha técnica da Solicitação 13 e Projeto 29 Componentes testados da Ficha técnica da Solicitação 13 e Projeto 29 Componentes testados da Ficha técnica da Solicitação 13 e Projeto 29.','Metodologia da Ficha técnica da Solicitação 13 e Projeto 29 Metodologia da Ficha técnica da Solicitação 13 e Projeto 29 Metodologia da Ficha técnica da Solicitação 13 e Projeto 29 Metodologia da Ficha técnica da Solicitação 13 e Projeto 29 Metodologia da Ficha técnica da Solicitação 13 e Projeto 29 Metodologia da Ficha técnica da Solicitação 13 e Projeto 29.\r\n\r\n- Metodologia da Ficha técnica da Solicitação 13 e Projeto 29 \r\n- Metodologia da Ficha técnica da Solicitação 13 e Projeto 29 \r\n- Metodologia da Ficha técnica da Solicitação 13 e Projeto 29 \r\n- Metodologia da Ficha técnica da Solicitação 13 e Projeto 29 \r\n- Metodologia da Ficha técnica da Solicitação 13 e Projeto 29 ','Observações da Ficha técnica da Solicitação 13 e Projeto 29 ','PU','S','N',8,NULL);
/*!40000 ALTER TABLE `tbl_fichastecnicas` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_projetos`
--

LOCK TABLES `tbl_projetos` WRITE;
/*!40000 ALTER TABLE `tbl_projetos` DISABLE KEYS */;
INSERT INTO `tbl_projetos` VALUES (1,'Nome do projeto 1','Mais dados sobre o projeto 1','A',1),(8,'Nome do projeto 8','Descrição do Projeto 8','A',1),(10,'Nome do projeto 10','Mais dados sobre o projeto 3','I',1),(11,'Nome do projeto 11','Mais dados sobre o projeto 4','I',1),(14,'Nome do projeto 14','Mais dados sobre o projeto 5','I',1),(22,'Nome do projeto 22','Mais dados sobre o projeto 6','I',1),(24,'Nome do projeto 24','Mais dados sobre o projeto 7','I',1),(26,'Nome do projeto 26','Descrição Projeto 26','A',1),(27,'Nome do projeto 27','Descrição do Projeto 27','I',1),(29,'Nome do projeto 29','Descrição do Mais um projeto','I',1);
/*!40000 ALTER TABLE `tbl_projetos` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `tbl_relatorios`
--

LOCK TABLES `tbl_relatorios` WRITE;
/*!40000 ALTER TABLE `tbl_relatorios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_relatorios` ENABLE KEYS */;
UNLOCK TABLES;

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
  `status_sol` char(2) DEFAULT NULL,
  `idProjeto_sol` int(11) DEFAULT NULL,
  `idUsuario_sol` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_sol`),
  UNIQUE KEY `nome_sol_UNIQUE` (`nome_sol`),
  KEY `fk_idprojeto_idx` (`idProjeto_sol`),
  KEY `fk_idusuario_usuario_idx` (`idUsuario_sol`),
  CONSTRAINT `fk_solicitacao_projeto` FOREIGN KEY (`idProjeto_sol`) REFERENCES `tbl_projetos` (`id_prj`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitacao_usuario` FOREIGN KEY (`idUsuario_sol`) REFERENCES `tbl_usuarios` (`id_us`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_solicitacoes`
--

LOCK TABLES `tbl_solicitacoes` WRITE;
/*!40000 ALTER TABLE `tbl_solicitacoes` DISABLE KEYS */;
INSERT INTO `tbl_solicitacoes` VALUES (1,'Nome da solicitação 1','2017-01-01','2017-01-01',2,'HR','Testar todos os componentes da solicitação 1 Testar todos os componentes da solicitação 1 Testar todos os componentes da solicitação 1 Testar todos os componentes da solicitação 1 Testar todos os componentes da solicitação 1 Testar todos os componentes da solicitação 1 ','Fazer uma metodologia onde todos os componentes da solicitação 1 sejam testados.','Observações da solicitação.','PU','AV',1,1),(3,'Nome da solicitação 2','2017-05-05','2017-05-19',12,'HR','Testar todos os componentes da solicitação 2','Fazer uma metodologia onde todos os componentes da solicitação 2 sejam testados.','Observações da solicitação.','on','NO',1,1),(4,'Nome da solicitação 3','2017-05-04','2017-05-20',1300,'HA','Testar todos os componentes da solicitação 3 Testar todos os componentes da solicitação 3 Testar todos os componentes da solicitação 3 Testar todos os componentes da solicitação 3 Testar todos os componentes da solicitação 3','Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados Fazer uma metodologia onde todos os componentes da solicitação 3 sejam testados ','Observações da solicitação.','on','PZ',1,1),(5,'Nome da solicitação do Projeto 6','2017-06-05','2017-07-20',3500,'HA','Testar todos os componentes da solicitação do projeto 06','Criar uma metodologia para testar todos os componentes da solicitação do projeto 06','Observações da solicitação do projeto 06','on','AV',22,1),(6,'SOL numero 1 do PRJ 29','2017-02-02','2017-03-02',47,'HA','Compo teste','Metod teste','Obs','PU','AT',29,1),(7,'NOme da solicitação','2017-02-03','2017-04-02',10,'HA','Componentes a testar','metodologia','observações','PR','PZ',11,1),(8,'SOL numero 1 do PRJ 14','2017-05-15','2017-05-16',1,'HA','comp da SOL do PRJ 14','met da SOL do PRJ 14','obs da SOL do PRJ 14','PU','AP',14,1),(10,'SOL numero 2 do PRJ 14','2016-01-01','2017-01-01',33,'HA','comp da SOL do PRJ 14','met da SOL do PRJ 14','obs da SOL do PRJ 14','PR','US',14,1),(11,'SOL numero 3 do PRJ 14','2016-01-01','2017-01-01',99,'HA','comp da SOL do PRJ 14','met da SOL do PRJ 14','obs da SOL do PRJ 14','PR','RP',14,1),(12,'SOL numero 4 do PRJ 14','2016-01-01','2017-01-01',25,'HA','comp da SOL do PRJ 14','met da SOL do PRJ 14','obs da SOL do PRJ 14','PR','CL',14,1),(13,'Solicitação do Projeto 29','2016-09-20','2017-07-15',3500,'HA','Testar os componentes da solicitação 29 Testar os componentes da solicitação 29 Testar os componentes da solicitação 29 Testar os componentes da solicitação 29 Testar os componentes da solicitação 29 Testar os componentes da solicitação 29 Testar os componentes da solicitação 29.\r\n\r\nTestar os componentes da solicitação 29 Testar os componentes da solicitação 29 Testar os componentes da solicitação 29 Testar os componentes da solicitação 29 Testar os componentes da solicitação 29.','Metodologia para os componentes da solicitação do projeto 29 Metodologia para os componentes da solicitação do projeto 29 Metodologia para os componentes da solicitação do projeto 29 Metodologia para os componentes da solicitação do projeto 29 Metodologia para os componentes da solicitação do projeto 29 Metodologia para os componentes da solicitação do projeto 29.\r\n\r\n- Metodologia para os componentes da solicitação do projeto 29 \r\n- Metodologia para os componentes da solicitação do projeto 29 \r\n- Metodologia para os componentes da solicitação do projeto 29 \r\n- Metodologia para os componentes da solicitação do projeto 29 ','Metodologia para os componentes da solicitação do projeto 29 Metodologia para os componentes da solicitação do projeto 29.','PU','N',29,1);
/*!40000 ALTER TABLE `tbl_solicitacoes` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuarios`
--

LOCK TABLES `tbl_usuarios` WRITE;
/*!40000 ALTER TABLE `tbl_usuarios` DISABLE KEYS */;
INSERT INTO `tbl_usuarios` VALUES (1,'diego','diego@email.com','diego','123',NULL,'A',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbl_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'db_mentor'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-16  0:52:48
