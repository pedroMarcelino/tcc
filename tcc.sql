-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 05/06/2019 às 18:07
-- Versão do servidor: 5.5.57-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao`
--

CREATE TABLE IF NOT EXISTS `avaliacao` (
  `cd_avaliacao` int(5) NOT NULL AUTO_INCREMENT,
  `ds_comentario` varchar(1000) DEFAULT NULL,
  `vl_limpeza` int(1) DEFAULT NULL,
  `vl_limpeza_areia` int(1) DEFAULT NULL,
  `vl_qualidade_comida` int(1) DEFAULT NULL,
  `vl_qualidade_atendimento` int(1) DEFAULT NULL,
  `vl_preco` int(1) DEFAULT NULL,
  `id_quiosque` int(5) NOT NULL,
  `id_pessoa` int(5) NOT NULL,
  PRIMARY KEY (`cd_avaliacao`),
  KEY `id_quiosque` (`id_quiosque`),
  KEY `id_pessoa` (`id_pessoa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Fazendo dump de dados para tabela `avaliacao`
--

INSERT INTO `avaliacao` (`cd_avaliacao`, `ds_comentario`, `vl_limpeza`, `vl_limpeza_areia`, `vl_qualidade_comida`, `vl_qualidade_atendimento`, `vl_preco`, `id_quiosque`, `id_pessoa`) VALUES
(9, NULL, 4, 4, 4, 4, 4, 2, 14),
(10, NULL, 4, 4, 4, 4, 4, 2, 14),
(12, NULL, 3, 4, 4, 4, 4, 5, 14),
(14, NULL, 5, 5, 5, 5, 1, 3, 14),
(15, NULL, 5, 5, 5, 5, 2, 9, 14),
(16, NULL, 5, 5, 5, 5, 3, 2, 14),
(17, NULL, 5, 5, 5, 5, 3, 4, 14),
(18, NULL, 5, 5, 5, 5, 3, 4, 14),
(19, NULL, 3, 3, 3, 3, 3, 13, 16),
(20, NULL, 3, 2, 5, 4, 1, 12, 17),
(21, NULL, 4, 4, 5, 4, 4, 2, 5),
(22, NULL, 4, 4, 4, 3, 2, 4, 18),
(23, NULL, 1, 1, 1, 1, 1, 14, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `favoritos`
--

CREATE TABLE IF NOT EXISTS `favoritos` (
  `cd_favoritos` int(5) NOT NULL AUTO_INCREMENT,
  `id_quiosque` int(5) NOT NULL,
  `id_pessoa` int(5) NOT NULL,
  PRIMARY KEY (`cd_favoritos`),
  KEY `id_pessoa` (`id_pessoa`),
  KEY `id_quiosque` (`id_quiosque`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagem`
--

CREATE TABLE IF NOT EXISTS `imagem` (
  `cd_imagem` int(5) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(45) DEFAULT NULL,
  `id_quiosque` int(5) DEFAULT NULL,
  PRIMARY KEY (`cd_imagem`),
  KEY `id_quiosque` (`id_quiosque`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Fazendo dump de dados para tabela `imagem`
--

INSERT INTO `imagem` (`cd_imagem`, `img_url`, `id_quiosque`) VALUES
(1, 'imgMenu/fotoMenu1238.jpg', 2),
(2, 'imgMenu/fotoMenu3238.jpg', 2),
(3, 'imgMenu/fotoMenu155.jpg', 5),
(4, 'imgMenu/fotoMenu255.jpg', 5),
(5, 'imgMenu/fotoMenu355.jpg', 5),
(6, 'imgMenu/fotoMenu455.jpg', 5),
(10, 'imgMenu/fotoMenu1384.jpg', 3),
(11, 'imgMenu/fotoMenu2384.jpg', 3),
(12, 'imgMenu/fotoMenu3384.jpg', 3),
(13, 'imgMenu/fotoMenu4384.jpg', 3),
(14, 'imgMenu/fotoMenu1427.jpg', 4),
(15, 'imgMenu/fotoMenu2427.jpg', 4),
(16, 'imgMenu/fotoMenu3427.jpg', 4),
(17, 'imgMenu/fotoMenu4427.jpg', 4),
(18, 'imgMenu/fotoMenu1672.jpg', 6),
(19, 'imgMenu/fotoMenu2672.jpg', 6),
(20, 'imgMenu/fotoMenu3672.jpg', 6),
(21, 'imgMenu/fotoMenu4672.jpg', 6),
(22, 'imgMenu/fotoMenu1749.jpg', 7),
(23, 'imgMenu/fotoMenu2749.jpg', 7),
(24, 'imgMenu/fotoMenu3749.jpg', 7),
(25, 'imgMenu/fotoMenu4749.jpg', 7),
(26, 'imgMenu/fotoMenu183.jpg', 8),
(27, 'imgMenu/fotoMenu283.jpg', 8),
(28, 'imgMenu/fotoMenu383.jpg', 8),
(29, 'imgMenu/fotoMenu483.jpg', 8),
(30, 'imgMenu/fotoMenu1975.jpg', 9),
(31, 'imgMenu/fotoMenu2975.jpg', 9),
(32, 'imgMenu/fotoMenu3975.jpg', 9),
(33, 'imgMenu/fotoMenu4975.jpg', 9),
(42, 'imgMenu/fotoMenu11217.jpg', 12),
(43, 'imgMenu/fotoMenu21217.jpg', 12),
(44, 'imgMenu/fotoMenu31217.jpg', 12),
(45, 'imgMenu/fotoMenu41217.jpg', 12),
(46, 'imgMenu/fotoMenu11360.jpg', 13),
(47, 'imgMenu/fotoMenu11422.jpg', 14),
(48, 'imgMenu/fotoMenu31440.jpg', 14);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoa`
--

CREATE TABLE IF NOT EXISTS `pessoa` (
  `cd_pessoa` int(5) NOT NULL AUTO_INCREMENT,
  `nm_usuario` varchar(50) NOT NULL,
  `nm_email` varchar(50) NOT NULL,
  `nm_senha` varchar(50) NOT NULL,
  `img_usuario` varchar(45) DEFAULT NULL,
  `ds_tipo` bit(1) NOT NULL,
  PRIMARY KEY (`cd_pessoa`),
  UNIQUE KEY `nm_email` (`nm_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Fazendo dump de dados para tabela `pessoa`
--

INSERT INTO `pessoa` (`cd_pessoa`, `nm_usuario`, `nm_email`, `nm_senha`, `img_usuario`, `ds_tipo`) VALUES
(4, 'Plinilioswaldo', 'Plinilioswaldo@gmail.com', 'Plinilioswaldo', NULL, b'1'),
(5, 'Pedro SIlva', 'pedro@gmail.com', '001', 'ftDono5.jpg', b'1'),
(6, 'Guilherme', 'guilherme@gmail.com', 'guilherme', NULL, b'1'),
(7, 'Cleberson Silva', 'cleberson@gmail.com', 'cleberson', NULL, b'1'),
(8, 'Pingu Amaro', 'pingo@gmail.com', 'pingu', NULL, b'1'),
(9, 'Pingo Amaro', 'pingoo@gmail.com', 'pingoo', 'ftDono9.jpg', b'1'),
(10, 'Henrique Blay Barboza', 'blay@email.com', '1234', NULL, b'1'),
(11, 'Luiz', 'luiz@gmail.com', 'luiz', NULL, b'1'),
(14, 'MIlton Nascimento', 'milton@gmail.com', '001', 'ftDono14.jpg', b'0'),
(15, 'Fabiana Marcelino', 'fabiana@gmail.com', '123', NULL, b'1'),
(16, 'angela marcelino', 'anjinha@gmail.com', '001', NULL, b'0'),
(17, 'Admin. Blay', 'blay@gmail.com', '123', 'ftDono17.jpg', b'1'),
(18, 'augusto', 'augusto@gmail.com', '001', NULL, b'0');

-- --------------------------------------------------------

--
-- Estrutura para tabela `quiosque`
--

CREATE TABLE IF NOT EXISTS `quiosque` (
  `cd_quiosque` int(5) NOT NULL AUTO_INCREMENT,
  `nm_quiosque` varchar(50) NOT NULL,
  `nm_endereco` varchar(50) NOT NULL,
  `hr_quiosque_inicio` varchar(6) NOT NULL,
  `hr_quiosque_fim` varchar(6) NOT NULL,
  `nr_cnpj` varchar(20) NOT NULL,
  `ds_quiosque` varchar(5000) NOT NULL,
  `tel_quiosque` varchar(15) DEFAULT NULL,
  `id_pessoa` int(5) NOT NULL,
  `nm_cidade` varchar(50) NOT NULL,
  `nm_estado` varchar(50) NOT NULL,
  `img_quiosque` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cd_quiosque`),
  KEY `id_pessoa` (`id_pessoa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Fazendo dump de dados para tabela `quiosque`
--

INSERT INTO `quiosque` (`cd_quiosque`, `nm_quiosque`, `nm_endereco`, `hr_quiosque_inicio`, `hr_quiosque_fim`, `nr_cnpj`, `ds_quiosque`, `tel_quiosque`, `id_pessoa`, `nm_cidade`, `nm_estado`, `img_quiosque`) VALUES
(2, 'Bandeira Branca', 'Em frente a loja Americanas', '06:00', '18:30', '72.029.038/0001-06', 'O melhor da praia para vocÃª aproveitar da forma que deseja!', '(13) 99436-5895', 6, 'MongaguÃ¡', 'SP - SÃ£o Paulo', 'imgQuiosque/fotoQuiosque233.png'),
(3, 'Quiosque do Chopp', 'Rua jabair, 89', '07:50', '18:59', '79.437.504/0001-23', 'Otimo chopp ', '(12) 32132-1321', 5, 'PeruÃ­be', 'SP - SÃ£o Paulo', 'imgQuiosque/fotoQuiosque392.png'),
(4, 'Quiosque Pandora', 'Rua Trump, 09', '08:00', '19:50', '43.783.295/0001-22', 'Venha comer a melhor comida de todas !', '(13) 49191-6161', 5, 'PeruÃ­be', 'SP - SÃ£o Paulo', 'imgQuiosque/fotoQuiosque436.png'),
(5, 'Amonarque', 'Rua gororo, 4665', '08:30', '18:50', '73.676.285/0001-59', 'Melhor pastel da regiÃ£o!', '(13) 16544-9878', 5, 'GuarujÃ¡', 'SP - SÃ£o Paulo', 'imgQuiosque/fotoQuiosque550.png'),
(6, 'Quiosque Flor de Lotos', 'Av. Joaquin, 098', '06:30', '19:30', '03.835.847/0001-84', 'Venha curtir uma praia maravilhosa', '(25) 16546-5465', 5, 'SÃ£o Vicente', 'SP - SÃ£o Paulo', 'imgQuiosque/fotoQuiosque63.png'),
(7, 'Quiosque do 4Friends ', 'Rua Deravin, 654', '07:30', '20:40', '28.256.643/0001-10', 'Muito bom', '(15) 94876-5256', 5, 'ItanhaÃ©m', 'SP - SÃ£o Paulo', 'imgQuiosque/fotoQuiosque72.png'),
(8, 'Ponto do ForrÃ³', 'Rua adolpho, 9876', '07:50', '20:40', '73.664.955/0001-17', 'Melhor forrÃ³ da cidade', '(79) 87897-9879', 5, 'Santos', 'SP - SÃ£o Paulo', 'imgQuiosque/fotoQuiosque882.png'),
(9, 'Quiosque Pooh', 'Av. slash, 6549', '07:30', '21:50', '71.503.343/0001-17', 'AlÃ©m de comida e bebida, alugamos pranchas ', '(32) 13216-5465', 5, 'Santos', 'SP - SÃ£o Paulo', 'imgQuiosque/fotoQuiosque973.png'),
(12, 'Quiosque martini', 'Rua azevedo, 4159', '08:15', '21:54', '69.475.209/0001-08', 'Venha provar a melhor caipirinha da martini da sua VIDA !!', '(13) 26546-5987', 5, 'PeruÃ­be', 'SP - SÃ£o Paulo', 'imgQuiosque/fotoQuiosque1280.png'),
(13, '2088', 'DireÃ§Ã£o do Mercado Rede Krill', '09:00', '22:00', '60.522.665/0001-97', 'SÃ³ aqui vocÃª encontra os melhores preÃ§os e o melhor atendimento! Venha conferir agora!', '(13) 94937-6855', 7, 'GuarujÃ¡', 'SP - SÃ£o Paulo', 'imgQuiosque/fotoQuiosque135.png'),
(14, 'Quiosque sacana', 'Puta que pariu', '09:30', '23:30', '23.562.011/0001-60', 'Quiosque com exibiÃ§Ã£o das melhores partidas de futebol da histÃ³ria, todo Domingo, a partir das 14:10! Venha aproveitar nossa breja e um bom papo.', '(13) 98989-7977', 17, 'ItanhaÃ©m', 'SP - SÃ£o Paulo', 'imgQuiosque/fotoQuiosque1414.jpg');

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`id_quiosque`) REFERENCES `quiosque` (`cd_quiosque`) ON DELETE CASCADE,
  ADD CONSTRAINT `avaliacao_ibfk_2` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`cd_pessoa`) ON DELETE CASCADE;

--
-- Restrições para tabelas `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`cd_pessoa`) ON DELETE CASCADE,
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`id_quiosque`) REFERENCES `quiosque` (`cd_quiosque`) ON DELETE CASCADE;

--
-- Restrições para tabelas `imagem`
--
ALTER TABLE `imagem`
  ADD CONSTRAINT `imagem_ibfk_1` FOREIGN KEY (`id_quiosque`) REFERENCES `quiosque` (`cd_quiosque`) ON DELETE CASCADE;

--
-- Restrições para tabelas `quiosque`
--
ALTER TABLE `quiosque`
  ADD CONSTRAINT `quiosque_ibfk_1` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`cd_pessoa`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
