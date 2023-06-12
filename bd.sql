-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.40 - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              12.0.0.6468
-- --------------------------------------------------------

-- Copiando estrutura do banco de dados para bd_object1ve
CREATE DATABASE IF NOT EXISTS `bd_object1ve` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bd_object1ve`;

-- Copiando estrutura para tabela bd_object1ve.notices
CREATE TABLE IF NOT EXISTS `notices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_notice_api` int(11) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `categories` mediumtext,
  `content` mediumtext,
  `excerpt` mediumtext,
  `thumb` text,
  `title` varchar(100) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7756 DEFAULT CHARSET=latin1;

-- Copiando estrutura para tabela bd_object1ve.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;