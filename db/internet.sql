DROP DATABASE IF EXISTS internet;

CREATE DATABASE internet;

USE internet;


CREATE TABLE `config` (
  `cd` int(10) unsigned NOT NULL auto_increment,
  `chave` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  PRIMARY KEY  (`cd`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


INSERT INTO `config` (`cd`, `chave`, `valor`) VALUES 
(1, 'senha', '123456'),
(2, 'nivel_script', 'Restrito=usuario_restrito.script\r\nMaster=usuario_master.script');


CREATE TABLE `usuarios` (
  `cd` int(10) unsigned NOT NULL auto_increment,
  `nome` varchar(255) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `nivel` tinyint(4) NOT NULL,
  `expiracao` datetime NOT NULL,
  PRIMARY KEY  (`cd`)
);