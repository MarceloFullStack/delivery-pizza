-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 15/04/2019 às 07:42
-- Versão do servidor: 5.6.41-84.1
-- Versão do PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadmo695_delivery`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `admin`
--

CREATE TABLE `admin` (
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `ativo` int(11) NOT NULL,
  `nivel` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `data_cadastro` varchar(100) NOT NULL,
  `data_expira` varchar(100) NOT NULL,
  `plano` varchar(100) NOT NULL,
  `valor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `admin`
--

INSERT INTO `admin` (`email`, `senha`, `ativo`, `nivel`, `nome`, `id`, `data_cadastro`, `data_expira`, `plano`, `valor`) VALUES
('admin@admin.com.br', '202cb962ac59075b964b07152d234b70', 1, 1, 'Administrador', 1, '', '14/12/2019', 'Light', '70.00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `bairros`
--

CREATE TABLE `bairros` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `id_estrangeiro` int(11) NOT NULL,
  `taxa` decimal(10,2) NOT NULL,
  `tempo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `bairros`
--

INSERT INTO `bairros` (`id`, `nome`, `id_estrangeiro`, `taxa`, `tempo`) VALUES
(120, 'Parque santa tereza', 8, '2.00', '40:00'),
(121, 'Vila Principe de Galles', 9, '3.00', '00:60'),
(122, 'Brasilia', 10, '7.00', '30:00'),
(123, '', 0, '0.00', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `banner` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `banners`
--

INSERT INTO `banners` (`id`, `banner`) VALUES
(10, '1538346979.png'),
(7, '1515973048.png'),
(9, '1537651236.png'),
(8, '1518891571.png'),
(11, '1544571751.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `borda`
--

CREATE TABLE `borda` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `taxa` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `borda`
--

INSERT INTO `borda` (`id`, `nome`, `taxa`) VALUES
(4, 'Catipiry', '10.00'),
(5, 'Cheddar', '10.00'),
(6, 'Mussarela', '10.00'),
(7, 'Presunto', '10.00'),
(8, 'Mista', '10.00'),
(9, 'Twist', '10.00'),
(11, '', '0.00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `montar` int(11) NOT NULL,
  `ordem` int(11) NOT NULL,
  `posicao` int(11) NOT NULL,
  `escolha_ingredientes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `url`, `montar`, `ordem`, `posicao`, `escolha_ingredientes`) VALUES
(1, 'Bebidas', 'bebidas', 0, 3, 3, 1),
(2, 'PorÃ§Ãµes', 'porcoes', 1, 0, 1, 1),
(6, 'Lanches', 'lanches', 1, 3, 2, 1),
(10, 'Coxinha', 'coxinha', 1, 0, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidades`
--

CREATE TABLE `cidades` (
  `id` int(11) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `cidades`
--

INSERT INTO `cidades` (`id`, `cidade`, `estado`) VALUES
(8, 'jandira', 'SP'),
(9, 'Santo Andre', 'SP'),
(10, 'Brasilia', 'DF'),
(11, '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `alerta` int(11) NOT NULL,
  `aberto` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `logomarca` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hora_de` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hora_ate` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci NOT NULL,
  `metatags` text COLLATE utf8_unicode_ci NOT NULL,
  `chamada1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `chamada2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `chamada3` text COLLATE utf8_unicode_ci NOT NULL,
  `banner` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mostrar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `instagran` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pagon` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'nao',
  `pagseguro` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tokem` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `borda` int(11) NOT NULL,
  `banner_tamanho` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `config`
--

INSERT INTO `config` (`id`, `alerta`, `aberto`, `nome`, `logomarca`, `hora_de`, `hora_ate`, `facebook`, `descricao`, `metatags`, `chamada1`, `chamada2`, `chamada3`, `banner`, `mostrar`, `instagran`, `twitter`, `telefone`, `pagon`, `pagseguro`, `tokem`, `borda`, `banner_tamanho`) VALUES
(1, 1, 1, '', 'file_5a5be8eb08b8c.jpg', '', '', '', '', '', '', '', '', 'file_5ba6b1fa6607d.jpg', '', '', '', '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `entregador`
--

CREATE TABLE `entregador` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `entregador`
--

INSERT INTO `entregador` (`id`, `nome`, `telefone`, `foto`, `endereco`) VALUES
(2, 'ERMISON', '(71) 98285-6970', '', 'R DA MANGUEIRA 01-A, IMBUI'),
(3, 'AXEL', '(71) 987456618', '', 'R AMARGOSA 5, PERNAMBUÃ‰S'),
(4, 'HENRIQUE', '(71) 982985606', '', 'R AMARGOSA 5, PERNAMBUÃ‰S'),
(5, '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `extras`
--

CREATE TABLE `extras` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `extras`
--

INSERT INTO `extras` (`id`, `nome`) VALUES
(1, 'Cebola'),
(2, 'Catupiri'),
(4, 'Cheddar');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagens_pizzas`
--

CREATE TABLE `imagens_pizzas` (
  `id` int(11) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `imagens_pizzas`
--

INSERT INTO `imagens_pizzas` (`id`, `imagem`, `categoria`) VALUES
(1, '4af91b65e743af91ae454a32f7717a36.jpg  ', 'pizzas'),
(2, '6bea12680b6672c5427a4413d7fbbed0.jpg  ', 'pizzas'),
(3, '31dd7223d9103a8b518281cc099139b8.jpg  ', 'pizzas'),
(4, '863f443c06e0d5ee8103c6a11716e9cc.jpg  ', 'pizzas'),
(5, 'a415f28ee13ec97d6219867fbc7bbadb.jpg  ', 'pizzas'),
(6, '621396ff1c6baf6578a381d65f2773ad.jpg  ', 'pizzas'),
(7, '0f0e0ddd3be45a94e4941c890a8ed1d1.jpg  ', 'pizzas'),
(8, '09f6b4532afcddc8aab6a51fc95691f2.jpg  ', 'pizzas'),
(9, '6643ec79d64fae0eb191466101ae6430.jpg  ', 'pizzas'),
(10, '6612a77570b6dc012112a10218132ec5.jpg  ', 'pizzas'),
(11, 'c0f0acfad420dc7ac1abe0c4298fa0e7.jpg  ', 'pizzas'),
(14, '11d3c61ce719dd89e0c5fb6073f984b4.jpg  ', 'lanches'),
(15, 'cf1919d15c85ee790ca28f514613b021.jpg  ', 'lanches'),
(16, '7db936f2a8183df54d79ae340b3525e0.jpg  ', 'lanches'),
(17, '71f58ea124a4f23b83d8852d2145eec5.jpg  ', 'lanches'),
(18, '9401f8ff65c77c74c7c559c5f1c189a9.jpg  ', 'lanches'),
(19, '3b9b5603b7cc87e30b26ab2fdfc353c8.jpg  ', 'lanches'),
(20, '9b209dfbde88c7664234fa27994e0600.jpg  ', 'lanches'),
(21, '26f05ffd37d94846799632ff268bbf2c.jpg  ', 'lanches'),
(22, '92138b1ad976ed575277d12c83f09ba0.jpg  ', 'lanches'),
(23, 'c80bf5b9042ee5841fc6bca30de2d466.jpg  ', 'lanches'),
(24, '42c90d6e522e71ec9c4f37378a9493c1.jpg  ', 'lanches'),
(25, '0eb3356f20167eb38e0c1635363788d1.jpg  ', 'lanches'),
(26, '34f254313ff1c40d7ebe96bb39e232e9.jpg  ', 'lanches'),
(27, 'afce25f6e38fb40d45276768232f9d7e.jpg  ', 'lanches'),
(28, 'e1aedd38b8f0b3e11af232e2f8217815.jpg  ', 'porcoes'),
(29, '849671a0506da155a54496ae6e599a77.jpg  ', 'bebidas'),
(30, '0ed1a95082d8b2c0a162cf00ab6ea1ac.jpg  ', 'bebidas'),
(32, '968549125080443ee0c30846a6379a46.jpg  ', 'bebidas'),
(33, '14cc739f51f6dc9ac21c0a7f5dae05d9.jpg  ', 'bebidas'),
(34, '7fc66ffb5d8a37d038faa461701f4578.jpg  ', 'porcoes'),
(36, 'b89c48d85fa520a46247d984b8164777.jpg  ', 'bebidas'),
(37, 'ae040aafa0cc459e2aa2a86c99d0bd76.jpg  ', 'bebidas'),
(38, '36e6fb1f657d050f624aa557a26e9c6b.jpg  ', 'bebidas'),
(39, '2fadf9e97c02e335346ae6350658642d.jpg  ', 'bebidas'),
(40, 'c2f2e83005318143808f543f249500c5.jpg  ', 'bebidas'),
(41, 'd58febe2d9babf4e83734a8d75cf6abf.jpg  ', 'bebidas'),
(43, '6b3cf085a1105feb4bf91c81dc19977b.jpg  ', 'porcoes'),
(44, 'dd7703756aa366625c8ff6ec3bd40207.jpg  ', 'sobremesas'),
(47, '873684c045bdbbdb109ea2626e64b9d1.jpg  ', 'pizzas'),
(48, '5b70a1073c0d12a0e29716a00b28eb9e.png  ', 'pizzas'),
(49, '1bd31e04a36fb1ae0741dfd9cd756d16.jpg  ', 'pizzas'),
(51, '989a30cb7bd8ef9416972de2cc862ec5.jpg  ', 'pizzas'),
(52, 'c85a5dca5f4205daae0924b559f808ec.jpg  ', 'pizzas'),
(54, 'bdae50f44c4dcd719613534bb7d1e47d.png  ', 'pizzas'),
(55, '482e9331b3386314a606a8c4b9898fb5.png  ', 'pizzas'),
(56, 'd3fc5d5584325a09a6b2bfa9dfd5df5d.png  ', 'pizzas'),
(57, '411fedaa23537d6762b1d79a9d0d59e3.png  ', 'pizzas'),
(58, '06be9761cfa3f936c51118c55fae377a.png  ', 'pizzas'),
(59, 'fc13cd9cdcd8cc0f9347e53e21f6c510.png  ', 'pizzas'),
(60, 'c98031956ca8c13eb6065be1bd63e00c.png  ', 'pizzas'),
(61, '00b481d7aba60e0c48805655ca45c274.png  ', 'pizzas'),
(62, '0b7f5994b76a891c50213b3286957fce.jpg  ', 'pizzas'),
(63, 'd518ea3dbf4f2d438107dccb0a7bd939.jpg  ', 'pizzas'),
(65, '316aa105745eb4b2fd11f1361a201b14.jpg  ', 'coxinha');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ingredientes`
--

CREATE TABLE `ingredientes` (
  `id` int(11) NOT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `permitir_adicional` int(11) NOT NULL,
  `maximo_adicional` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `ingredientes`
--

INSERT INTO `ingredientes` (`id`, `valor`, `nome`, `permitir_adicional`, `maximo_adicional`) VALUES
(58, '5.00', 'Alcachofras', 0, 0),
(59, '10.00', 'Alcaparras', 0, 0),
(60, '15.00', 'Aspargos', 0, 0),
(61, '20.00', 'Atum', 0, 0),
(64, '0.00', 'AÃ§Ãºcar', 0, 0),
(65, '0.00', 'Ameixas secas', 0, 0),
(67, '0.00', 'Bacalhau', 0, 0),
(68, '0.00', 'Bacon', 0, 0),
(69, '0.00', 'Banana prata', 0, 0),
(70, '0.30', 'Batata palha', 1, 2),
(71, '0.00', 'Beijinho', 0, 0),
(72, '0.00', 'Berinjela', 0, 0),
(73, '0.00', 'BrÃ³colis', 0, 0),
(74, '0.00', 'Brigadeiro', 0, 0),
(75, '0.00', 'Calabresa', 0, 0),
(76, '0.00', 'CamarÃ£o', 0, 0),
(77, '0.00', 'Canela em pÃ³', 0, 0),
(81, '0.00', 'Carne do sol', 0, 0),
(83, '0.00', 'Carne moÃ­da', 0, 0),
(84, '15.00', 'Catupiry', 0, 0),
(86, '0.00', 'Champignon', 0, 0),
(87, '0.00', 'Cheddar', 0, 0),
(89, '0.00', 'Chocolate granulado', 0, 0),
(90, '0.00', 'Coco ralado', 0, 0),
(92, '5.00', 'Ervilha', 0, 0),
(93, '2.00', 'Frango', 0, 0),
(94, '0.00', 'Goiabada', 0, 0),
(95, '0.00', 'Gorgonzola', 0, 0),
(96, '0.00', 'Lombo', 0, 0),
(97, '0.00', 'ManjericÃ£o', 0, 0),
(100, '0.00', 'Milho verde', 0, 0),
(101, '3.00', 'Molho de tomate', 0, 0),
(102, '0.00', 'Mussarela ', 0, 0),
(103, '0.00', 'Ovos', 0, 0),
(104, '0.00', 'Palmito', 0, 0),
(105, '0.00', 'ParmesÃ£o', 0, 0),
(106, '0.00', 'Peito de peru', 0, 0),
(108, '0.00', 'Pepperoni', 0, 0),
(109, '0.00', 'PessÃªgo', 0, 0),
(110, '0.00', 'Pimenta calabresa', 0, 0),
(111, '0.00', 'PimentÃ£o', 0, 0),
(112, '0.00', 'Presunto', 0, 0),
(113, '0.00', 'Provolone', 0, 0),
(114, '0.00', 'RÃºcula', 0, 0),
(115, '0.00', 'Sal', 0, 0),
(116, '0.00', 'Salame', 0, 0),
(117, '0.00', 'Sardinha ao sugo', 0, 0),
(118, '0.00', 'Tomate', 0, 0),
(119, '0.00', 'Tomate seco', 0, 0),
(121, '0.00', 'OrÃ©gano', 0, 0),
(122, '0.00', 'Alho frito', 0, 0),
(123, '0.00', 'SALSICHA ', 0, 0),
(124, '1.50', 'Abacaxi', 0, 0),
(125, '1.00', 'Azeitona', 0, 0),
(126, '1.00', 'cebola', 0, 0),
(128, '3.00', 'MUSSARELLA ', 0, 0),
(129, '7.00', 'BATATAS FRITAS PALITO', 0, 0),
(130, '7.00', 'BACON FRITO', 0, 0),
(131, '1.50', 'Bife caseiro', 1, 3),
(132, '0.00', 'Carne ', 0, 1),
(133, '0.00', 'Coxinha de Frango Mini 10g - 25 Unidades', 0, 5),
(134, '0.00', 'Enroladinho de Pizza Mini 10g - 25 Unidades', 0, 5),
(135, '0.00', 'Pastel de Carne MoÃ­da Mini 10g - 25 Unidades', 0, 1),
(136, '0.00', 'Bolinha de Queijo Mini 10g - 25 Unidades', 0, 6),
(137, '3.00', 'queijo ricota', 1, 1),
(138, '0.00', 'INGREDIENTE TESTE', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `opcionais`
--

CREATE TABLE `opcionais` (
  `id` int(11) NOT NULL,
  `id_sabor` int(11) NOT NULL,
  `id_ingrediente` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `sessao_usuario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `opcionais`
--

INSERT INTO `opcionais` (`id`, `id_sabor`, `id_ingrediente`, `nome`, `valor`, `sessao_usuario`) VALUES
(213, 1, 124, 'Abacaxi', '2', '2944201b4d01a9ff409cad733755468f'),
(214, 4, 104, 'Palmito', '0', '2944201b4d01a9ff409cad733755468f'),
(215, 4, 100, 'Milho verde', '0', '2944201b4d01a9ff409cad733755468f'),
(216, 3, 124, 'Abacaxi', '2', '2944201b4d01a9ff409cad733755468f'),
(222, 1, 124, 'Abacaxi', '2', '52'),
(223, 3, 104, 'Palmito', '0', '52'),
(224, 3, 100, 'Milho verde', '0', '52'),
(225, 3, 104, 'Palmito', '0', '52'),
(226, 3, 100, 'Milho verde', '0', '52'),
(227, 4, 124, 'Abacaxi', '2', '52'),
(228, 1, 104, 'Palmito', '0', '52'),
(229, 1, 100, 'Milho verde', '0', '52'),
(230, 3, 124, 'Abacaxi', '2', '52'),
(231, 3, 104, 'Palmito', '0', '52'),
(232, 1, 124, 'Abacaxi', '2', '52'),
(233, 4, 104, 'Palmito', '0', '52'),
(234, 4, 100, 'Milho verde', '0', '52'),
(235, 1, 104, 'Palmito', '0', '52'),
(236, 3, 100, 'Milho verde', '0', '52'),
(237, 3, 104, 'Palmito', '0', '52'),
(238, 2, 124, 'Abacaxi', '2', '52'),
(239, 3, 104, 'Palmito', '0', '52'),
(240, 3, 100, 'Milho verde', '0', '52'),
(241, 3, 104, 'Palmito', '0', '52'),
(242, 3, 100, 'Milho verde', '0', '52'),
(243, 2, 104, 'Palmito', '0', '52'),
(244, 1, 104, 'Palmito', '0', '52'),
(245, 1, 100, 'Milho verde', '0', '52'),
(246, 2, 104, 'Palmito', '0', '52'),
(247, 3, 100, 'Milho verde', '0', '52'),
(248, 1, 104, 'Palmito', '0', '52'),
(249, 1, 100, 'Milho verde', '0', '52'),
(250, 2, 124, 'Abacaxi', '2', '52'),
(251, 4, 104, 'Palmito', '0', '52'),
(252, 3, 100, 'Milho verde', '0', '52'),
(253, 3, 124, 'Abacaxi', '2', '52'),
(254, 4, 100, 'Milho verde', '0', 'zvh0ge7qb8nrscl'),
(255, 4, 104, 'Palmito', '0', 'zvh0ge7qb8nrscl'),
(256, 3, 100, 'Milho verde', '0', 'zvh0ge7qb8nrscl'),
(259, 1, 124, 'Abacaxi', '2', '5dc991abd74e2c73e81204223dc81e98'),
(263, 1, 100, 'Milho verde', '0', '8e48fabcc7298530b97a575a915beded'),
(264, 1, 104, 'Palmito', '0', '8e48fabcc7298530b97a575a915beded'),
(271, 1, 124, 'Abacaxi', '2', 'd24a74efce22f6d8846932207c4a70d1'),
(303, 1, 124, 'Abacaxi', '2', '83be0faaa371754c6f00490b2c73645a'),
(304, 2, 127, '', '0', 'a011acd9fb0b154635fc424e5042155a'),
(308, 1, 127, '', '0', '39247d26dfee31646399aa846fdbe69c'),
(309, 1, 124, 'Abacaxi', '2', 'fb7303708906bdba16133a1f2dc805d2'),
(310, 3, 104, 'Palmito', '0', 'fb7303708906bdba16133a1f2dc805d2'),
(312, 4, 124, 'Abacaxi', '2', 'fb7303708906bdba16133a1f2dc805d2');

-- --------------------------------------------------------

--
-- Estrutura para tabela `opcionais_lanches`
--

CREATE TABLE `opcionais_lanches` (
  `id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `valor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sessao_usuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `produto` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `opcionais_lanches`
--

INSERT INTO `opcionais_lanches` (`id`, `quantidade`, `nome`, `valor`, `sessao_usuario`, `produto`) VALUES
(72, 0, 'Pastel de Carne MoÃ­da Mini 10g - 25 Unidades', '0.00', '6a4676a27c596e1dca3e8ba4472ecf10', 238),
(71, 0, 'Enroladinho de Pizza Mini 10g - 25 Unidades', '0.00', '6a4676a27c596e1dca3e8ba4472ecf10', 238),
(69, 1, 'Bolinha de Queijo Mini 10g - 25 Unidades', '0.00', '9389a7b6014322bc6d668d2000f9f414', 238),
(67, 1, 'Coxinha de Frango Mini 10g - 25 Unidades', '0.00', '9389a7b6014322bc6d668d2000f9f414', 238),
(68, 1, 'Enroladinho de Pizza Mini 10g - 25 Unidades', '0.00', '9389a7b6014322bc6d668d2000f9f414', 238),
(70, 0, 'Coxinha de Frango Mini 10g - 25 Unidades', '0.00', '6a4676a27c596e1dca3e8ba4472ecf10', 238),
(48, 2, 'Bife caseiro', '1.50', '373798a11ed1de8892bbf7c219d0673c', 236),
(47, 0, 'Bacon', '0.00', '373798a11ed1de8892bbf7c219d0673c', 236),
(46, 1, 'Batata palha', '0.30', '373798a11ed1de8892bbf7c219d0673c', 236),
(73, 0, 'Bolinha de Queijo Mini 10g - 25 Unidades', '0.00', '6a4676a27c596e1dca3e8ba4472ecf10', 238),
(77, 0, 'Enroladinho de Pizza Mini 10g - 25 Unidades', '0.00', '20fb825ff1500032c2678782ad4c84b3', 238),
(76, 4, 'Coxinha de Frango Mini 10g - 25 Unidades', '0.00', '20fb825ff1500032c2678782ad4c84b3', 238),
(78, 2, 'Bife caseiro', '1.50', '0adc3707873f58aeb2bd83d1be267e42', 236),
(79, 0, 'Bacon', '0.00', '2f016ff2ec41b81cb6da8c7cd209d859', 236),
(80, 0, 'Batata palha', '0.30', '6832f73dcf2c7706cdf522e3794c05ba', 236),
(81, 0, 'Bacon', '0.00', 'gyt5xl72o39uqas', 236),
(82, 0, 'Batata palha', '0.30', 'gyt5xl72o39uqas', 236),
(83, 0, 'Bife caseiro', '1.50', 'gyt5xl72o39uqas', 236),
(84, 0, 'Carne ', '0.00', 'gyt5xl72o39uqas', 236);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `sessao_estrangeiro` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `produto` int(11) NOT NULL,
  `ingredientes` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `valor` varchar(100) NOT NULL,
  `ingredientes` text NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `data` varchar(100) NOT NULL,
  `views` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `sabor` varchar(100) NOT NULL,
  `tamanho` varchar(100) NOT NULL,
  `tamanhos` int(11) NOT NULL,
  `opcionais` text NOT NULL,
  `maximo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `valor`, `ingredientes`, `categoria`, `url`, `data`, `views`, `foto`, `sabor`, `tamanho`, `tamanhos`, `opcionais`, `maximo`) VALUES
(7, 'Cerveja Skol latÃ£o 473 ml', '8.00', '', 'bebidas', 'cerveja-skol-lata', '12/07/2016', 0, '36e6fb1f657d050f624aa557a26e9c6b.jpg  ', '', '', 0, '', 0),
(8, 'Ãgua Mineral 500 ml', '3.00', '', 'bebidas', 'gua-mineral-copo', '12/07/2016', 0, 'ae040aafa0cc459e2aa2a86c99d0bd76.jpg  ', '', '', 0, '', 0),
(27, '', '30.00', 'Catupiry,Ervilha,Frango,Molho de tomate,Mussarela ,Presunto,OrÃ©gano', 'pizzas', '', '19/05/2017', 0, '09f6b4532afcddc8aab6a51fc95691f2.jpg  ', '007', 'MÃ©dia', 0, '', 0),
(28, '', '36.00', 'Catupiry,Ervilha,Frango,Molho de tomate,Mussarela ,Presunto,OrÃ©gano', 'pizzas', '', '19/05/2017', 0, '09f6b4532afcddc8aab6a51fc95691f2.jpg  ', '007', 'Grande', 0, '', 0),
(30, '', '26.00', 'Catupiry,Cheddar,Molho de tomate,Mussarela,OrÃ©gano', 'pizzas', '', '19/05/2017', 0, 'a415f28ee13ec97d6219867fbc7bbadb.jpg  ', '3 queijos', 'MÃ©dia', 0, '', 0),
(31, '', '33.00', 'Catupiry,Cheddar,Molho de tomate,Mussarela,OrÃ©gano', 'pizzas', '', '20/05/2017', 0, 'a415f28ee13ec97d6219867fbc7bbadb.jpg  ', '3 queijos', 'Grande', 0, '', 0),
(33, '', '30.00', 'Catupiry,Gorgonzola,Molho de tomate,Mussarela ,Provolone,OrÃ©gano', 'pizzas', '', '20/05/2017', 0, 'a415f28ee13ec97d6219867fbc7bbadb.jpg  ', '4 queijos', 'MÃ©dia', 0, '', 0),
(34, '', '36.00', 'Catupiry,Gorgonzola,Molho de tomate,Mussarela ,Provolone,OrÃ©gano', 'pizzas', '', '20/05/2017', 0, 'a415f28ee13ec97d6219867fbc7bbadb.jpg  ', '4 queijos', 'Grande', 0, '', 0),
(36, '', '30.00', 'Catupiry,Cheddar,Gorgonzola,Molho de tomate,Mussarela ,Provolone,OrÃ©gano', 'pizzas', '', '20/05/2017', 0, 'a415f28ee13ec97d6219867fbc7bbadb.jpg  ', '5 queijos', 'MÃ©dia', 0, '', 0),
(37, '', '36.00', 'Catupiry,Cheddar,Gorgonzola,Molho de tomate,Mussarela ,Provolone,OrÃ©gano', 'pizzas', '', '20/05/2017', 0, 'a415f28ee13ec97d6219867fbc7bbadb.jpg  ', '5 queijos', 'Grande', 0, '', 0),
(39, '', '22.00', 'Molho de tomate,Mussarela ,OrÃ©gano,Alho frito', 'pizzas', '', '20/05/2017', 0, 'a415f28ee13ec97d6219867fbc7bbadb.jpg  ', 'Alho e Ã³leo ', 'MÃ©dia', 0, '', 0),
(40, '', '28.00', 'Molho de tomate,Mussarela ,OrÃ©gano,Alho frito', 'pizzas', '', '20/05/2017', 0, 'a415f28ee13ec97d6219867fbc7bbadb.jpg  ', 'Alho e Ã³leo ', 'Grande', 0, '', 0),
(42, '', '30.00', 'Atum,Bacon,Catupiry,Molho de tomate,Mussarela ,Ovos,OrÃ©gano', 'pizzas', '', '20/05/2017', 0, '6643ec79d64fae0eb191466101ae6430.jpg  ', 'Americana', 'MÃ©dia', 0, '', 0),
(43, '', '36.00', 'Atum,Bacon,Catupiry,Molho de tomate,Mussarela ,Ovos,OrÃ©gano', 'pizzas', '', '20/05/2017', 0, '6643ec79d64fae0eb191466101ae6430.jpg  ', 'Americana', 'Grande', 0, '', 0),
(45, '', 'R26,00', 'Bacon,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '22/05/2017', 0, '0f0e0ddd3be45a94e4941c890a8ed1d1.jpg  ', 'Bacon', 'MÃ©dia', 0, '', 0),
(46, '', '32.00', 'Bacon,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '22/05/2017', 0, '0f0e0ddd3be45a94e4941c890a8ed1d1.jpg  ', 'Bacon', 'Grande', 0, '', 0),
(48, '', '30.00', 'Calabresa,Cebola,Ervilha,Molho de tomate,Mussarela ,Ovos,Pimenta calabresa', 'pizzas', '', '28/07/2017', 0, '09f6b4532afcddc8aab6a51fc95691f2.jpg  ', 'Baiana', 'MÃ©dia', 0, '', 0),
(49, '', '36.00', 'Calabresa,Cebola,Ervilha,Molho de tomate,Mussarela ,Ovos,Pimenta calabresa', 'pizzas', '', '28/07/2017', 0, '09f6b4532afcddc8aab6a51fc95691f2.jpg  ', 'Baiana', 'Grande', 0, '', 0),
(51, '', '26.00', 'Batata palha,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Batata Palha', 'MÃ©dia', 0, '', 0),
(52, '', '32.00', 'Batata palha,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Batata Palha', 'Grande', 0, '', 0),
(60, '', '26.00', 'Frango,Milho verde,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Caipira', 'MÃ©dia', 0, '', 0),
(61, '', '32.00', 'Frango,Milho verde,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Caipira', 'Grande', 0, '', 0),
(64, '', '32.00', 'Calabresa,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Calabresa', 'Grande', 0, '', 0),
(71, '', '26.00', 'Milho verde,Molho de tomate,Mussarela ,Presunto,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Camponesa', 'MÃ©dia', 0, '', 0),
(72, '', '32.00', 'Milho verde,Molho de tomate,Mussarela ,Presunto,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Camponesa', 'Grande', 0, '', 0),
(74, '', '30.00', 'Bacon,Calabresa,Cebola,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Caribenha', 'MÃ©dia', 0, '', 0),
(75, '', '36.00', 'Bacon,Calabresa,Cebola,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Caribenha', 'Grande', 0, '', 0),
(80, '', '30.00', 'Champignon,Molho de tomate,Mussarela ,Provolone,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Champignon', 'MÃ©dia', 0, '', 0),
(81, '', '36.00', 'Champignon,Molho de tomate,Mussarela ,Provolone,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Champignon', 'Grande', 0, '', 0),
(83, '', '30.00', 'Carne de charque,Cebola,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Charque', 'MÃ©dia', 0, '', 0),
(84, '', '36.00', 'Carne de charque,Cebola,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Charque', 'Grande', 0, '', 0),
(86, '', '22.00', 'Cheddar,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Cheddar ', 'Pequena', 0, '', 0),
(87, '', '28.00', 'Cheddar,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Cheddar ', 'Grande', 0, '', 0),
(89, '', '26.00', 'Ervilha,Frango,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Cigana', 'MÃ©dia', 0, '', 0),
(90, '', '32.00', 'Ervilha,Frango,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Cigana', 'Grande', 0, '', 0),
(92, '', '30.00', 'Calabresa,Cebola,Ervilha,Molho de tomate,Mussarela ,Presunto,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Colombiana ', 'MÃ©dia', 0, '', 0),
(93, '', '36.00', 'Calabresa,Ervilha,Molho de tomate,Mussarela ,Presunto,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Colombiana ', 'Grande', 0, '', 0),
(98, '', '30.00', 'Bacon,Calabresa,Cebola,Molho de tomate,Mussarela ,Ovos,PimentÃ£o,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Da casa', 'MÃ©dia', 0, '', 0),
(99, '', '36.00', 'Bacon,Calabresa,Cebola,Molho de tomate,Mussarela ,Ovos,PimentÃ£o,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Da casa', 'Grande', 0, '', 0),
(101, '', '30.00', 'Catupiry,Frango,Molho de tomate,Mussarela ,Uvas passas,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Del rey', 'MÃ©dia', 0, '', 0),
(102, '', '36.00', 'Catupiry,Frango,Molho de tomate,Mussarela ,Uvas passas,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Del rey', 'Grande', 0, '', 0),
(104, '', '22.00', 'Ervilha,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Ervilha', 'MÃ©dia', 0, '', 0),
(105, '', '28.00', 'Ervilha,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Ervilha', 'Grande', 0, '', 0),
(107, '', '30.00', 'Atum,Cebola,Molho de tomate,Mussarela ,Ovos,Palmito,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Francesa', 'MÃ©dia', 0, '', 0),
(108, '', '36.00', 'Atum,Cebola,Molho de tomate,Mussarela ,Ovos,Palmito,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Francesa', 'Grande', 0, '', 0),
(110, '', '30.00', 'Frango,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Frango', 'MÃ©dia', 0, '', 0),
(111, '', '36.00', 'Frango,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Frango', 'Grande', 0, '', 0),
(113, '', '30.00', 'Batata palha,Ervilha,Milho verde,Molho de tomate,Mussarela ,OrÃ©gano,SALSICHA ', 'pizzas', '', '28/07/2017', 0, '', 'Hot-dog', 'MÃ©dia', 0, '', 0),
(114, '', '36.00', 'Batata palha,Ervilha,Milho verde,Molho de tomate,Mussarela ,OrÃ©gano,SALSICHA', 'pizzas', '', '28/07/2017', 0, '', 'Hot-dog', 'Grande', 0, '', 0),
(122, '', '26.00', 'Lombo,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Lombo', 'MÃ©dia', 0, '', 0),
(124, '', '32.00', 'Lombo,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Lombo', 'Grande', 0, '', 0),
(126, '', '22.00', 'ManjericÃ£o,Molho de tomate,Mussarela ,Tomate,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Marguerita', 'MÃ©dia', 0, '', 0),
(127, '', '28.00', 'ManjericÃ£o,Molho de tomate,Mussarela ,Tomate,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Marguerita', 'Grande', 0, '', 0),
(129, '', '30.00', 'Bacon,Batata palha,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Miami', 'MÃ©dia', 0, '', 0),
(130, '', '36.00', 'Bacon,Batata palha,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Miami', 'Grande', 0, '', 0),
(132, '', '22.00', 'Milho verde,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Milho verde', 'MÃ©dia', 0, '', 0),
(133, '', '28.00', 'Milho verde,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Milho verde', 'Grande', 0, '', 0),
(135, '', '22.00', 'Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Mussarela', 'MÃ©dia', 0, '', 0),
(136, '', '28.00', 'Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Mussarela', 'Grande', 0, '', 0),
(138, '', '22.00', 'Molho de tomate,Mussarela ,ParmesÃ£o,Tomate,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Napolitana', 'MÃ©dia', 0, '', 0),
(139, '', '28.00', 'Molho de tomate,Mussarela ,ParmesÃ£o,Tomate,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Napolitana', 'Grande', 0, '', 0),
(141, '', '30.00', 'Molho de tomate,Mussarela ,Palmito,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Palmito', 'MÃ©dia', 0, '', 0),
(142, '', '36.00', 'Molho de tomate,Mussarela ,Palmito,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Palmito', 'Grande', 0, '', 0),
(147, '', '30.00', 'Molho de tomate,Mussarela ,Peito de peru,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Peito de peru ', 'MÃ©dia', 0, '', 0),
(148, '', '36.00', 'Molho de tomate,Mussarela ,Peito de peru,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Peito de peru ', 'Grande', 0, '', 0),
(153, '', '30.00', 'Ervilha,ManjericÃ£o,Molho de tomate,Mussarela ,Palmito,Presunto,Tomate,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Pizzaiolo', 'MÃ©dia', 0, '', 0),
(154, '', '36.00', 'Ervilha,ManjericÃ£o,Molho de tomate,Mussarela ,Palmito,Presunto,Tomate,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Pizzaiolo', 'Grande', 0, '', 0),
(156, '', '30.00', 'Cebola,Milho verde,Molho de tomate,Mussarela ,Ovos,PimentÃ£o,Presunto,Tomate,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Portuguesa', 'MÃ©dia', 0, '', 0),
(157, '', '36.00', 'Cebola,Milho verde,Molho de tomate,Mussarela ,Ovos,PimentÃ£o,Presunto,Tomate,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Portuguesa', 'Grande', 0, '', 0),
(159, '', '26.00', 'Molho de tomate,Mussarela ,Presunto,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Presunto', 'MÃ©dia', 0, '', 0),
(160, '', '32.00', 'Molho de tomate,Mussarela ,Presunto,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Presunto', 'Grande', 0, '', 0),
(162, '', '30.00', 'Molho de tomate,Mussarela ,Provolone,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Provolone', 'MÃ©dia', 0, '', 0),
(163, '', '36.00', 'Molho de tomate,Mussarela ,Provolone,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Provolone', 'Grande', 0, '', 0),
(165, '', '30.00', 'Bacon,Catupiry,Champignon,Molho de tomate,Mussarela ,Presunto,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Romanesca', 'MÃ©dia', 0, '', 0),
(166, '', '36.00', 'Bacon,Catupiry,Champignon,Molho de tomate,Mussarela ,Presunto,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Romanesca', 'Grande', 0, '', 0),
(168, '', '30.00', 'Molho de tomate,Mussarela ,Salame,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Salame', 'MÃ©dia', 0, '', 0),
(169, '', '36.00', 'Molho de tomate,Mussarela ,Salame,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Salame', 'Grande', 0, '', 0),
(172, '', '30.00', 'Molho de tomate,Mussarela ,Sardinha ao sugo,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Sardinha', 'MÃ©dia', 0, '', 0),
(173, '', '36.00', 'Molho de tomate,Mussarela ,Sardinha ao sugo,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Sardinha', 'Grande', 0, '', 0),
(175, '', '30.00', 'Bacon,Cheddar,Frango,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'SensaÃ§Ã£o', 'MÃ©dia', 0, '', 0),
(176, '', '36.00', 'Bacon,Cheddar,Frango,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'SensaÃ§Ã£o', 'Grande', 0, '', 0),
(178, '', '30.00', 'Bacon,Champignon,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Siciliana', 'MÃ©dia', 0, '', 0),
(179, '', '36.00', 'Bacon,Champignon,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '28/07/2017', 0, '', 'Siciliana', 'Grande', 0, '', 0),
(187, '', '26.00', 'AÃ§Ãºcar,Banana prata,Canela em pÃ³,Molho de tomate,Mussarela', 'pizzas', '', '28/07/2017', 0, '873684c045bdbbdb109ea2626e64b9d1.jpg  ', 'Banana c/ canela', 'MÃ©dia', 0, '', 0),
(188, '', '32.00', 'AÃ§Ãºcar,Banana prata,Canela em pÃ³,Molho de tomate,Mussarela', 'pizzas', '', '28/07/2017', 0, '873684c045bdbbdb109ea2626e64b9d1.jpg  ', 'Banana c/ canela', 'Grande', 0, '', 0),
(190, '', '26.00', 'Beijinho,Coco ralado', 'pizzas', '', '28/07/2017', 0, '5b70a1073c0d12a0e29716a00b28eb9e.png  ', 'Beijinho', 'MÃ©dia', 0, '', 0),
(191, '', '32.00', 'Beijinho,Coco ralado', 'pizzas', '', '28/07/2017', 0, '5b70a1073c0d12a0e29716a00b28eb9e.png  ', 'Beijinho', 'Grande', 0, '', 0),
(193, '', '26.00', 'Brigadeiro,Chocolate granulado', 'pizzas', '', '28/07/2017', 0, '1bd31e04a36fb1ae0741dfd9cd756d16.jpg  ', 'Brigadeiro', 'MÃ©dia', 0, '', 0),
(194, '', '32.00', 'Brigadeiro,Chocolate granulado', 'pizzas', '', '28/07/2017', 0, '1bd31e04a36fb1ae0741dfd9cd756d16.jpg  ', 'Brigadeiro', 'Grande', 0, '', 0),
(196, '', '26.00', 'Banana prata,Brigadeiro', 'pizzas', '', '28/07/2017', 0, '', 'Choconana', 'MÃ©dia', 0, '', 0),
(197, '', '32.00', 'Banana prata,Brigadeiro', 'pizzas', '', '28/07/2017', 0, '', 'Choconana', 'Grande', 0, '', 0),
(199, '', '26.00', 'Brigadeiro,Chocolate granulado,Coco ralado', 'pizzas', '', '28/07/2017', 0, '', 'PrestÃ­gio', 'MÃ©dia', 0, '', 0),
(200, '', '32.00', 'Brigadeiro,Chocolate granulado,Coco ralado', 'pizzas', '', '28/07/2017', 0, '', 'PrestÃ­gio', 'Grande', 0, '', 0),
(202, '', '26.00', 'Goiabada,Molho de tomate,Mussarela ', 'pizzas', '', '28/07/2017', 0, '', 'Romeu e Julieta', 'MÃ©dia', 0, '', 0),
(203, '', '32.00', 'Goiabada,Molho de tomate,Mussarela', 'pizzas', '', '28/07/2017', 0, '', 'Romeu e Julieta', 'Grande', 0, '', 0),
(205, '', '26.00', 'Brigadeiro,Confetes de chocolate', 'pizzas', '', '28/07/2017', 0, '', 'MMS', 'MÃ©dia', 0, '', 0),
(206, '', '32.00', 'Brigadeiro,Confetes de chocolate', 'pizzas', '', '28/07/2017', 0, '', 'MMS', 'Grande', 0, '', 0),
(211, '', '30.00', 'Atum,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '30/07/2017', 0, '', 'Atum', 'MÃ©dia', 0, '', 0),
(212, '', '36.00', 'Atum,Molho de tomate,Mussarela ,OrÃ©gano', 'pizzas', '', '30/07/2017', 0, '', 'Atum', 'Grande', 0, '', 0),
(214, 'Ãgua mineral c/ gÃ¡s 500 ml', '3.00', '', 'bebidas', '', '04/08/2017', 0, 'b89c48d85fa520a46247d984b8164777.jpg  ', '', '', 0, '', 0),
(215, 'GuaranÃ¡ AntÃ¡rtica 1 L', '6.00', '', 'bebidas', '', '04/08/2017', 0, 'd58febe2d9babf4e83734a8d75cf6abf.jpg  ', '', '', 0, '', 0),
(216, 'Pepsi 1L', '6.00', '', 'bebidas', '', '04/08/2017', 0, 'c2f2e83005318143808f543f249500c5.jpg  ', '', '', 0, '', 0),
(217, 'Cerveja Schin latÃ£o 473 ml', '8.00', '', 'bebidas', '', '04/08/2017', 0, '2fadf9e97c02e335346ae6350658642d.jpg  ', '', '', 0, '', 0),
(224, '', '35.00', 'Calabresa,Atum,Abacaxi,Azeitona', 'pizzas', '', '29/10/2017', 0, '6bea12680b6672c5427a4413d7fbbed0.jpg  ', 'Calabresa', 'MÃ©dia', 0, 'Abacaxi,Azeitona,Alcachofras', 0),
(225, 'X-Salada', '', ' Bacon, Cebola, Ervilha, Lombo', 'lanches', '', '17/11/2017', 0, '92138b1ad976ed575277d12c83f09ba0.jpg  ', '', '', 1, '', 0),
(226, '', '36.00', 'Calabresa,Cheddar,Catupiry,Gorgonzola', 'pizzas', '', '19/12/2017', 0, '5b70a1073c0d12a0e29716a00b28eb9e.png  ', '4 queijos', 'Familia', 0, 'Milho verde,Palmito', 0),
(227, '', '5.00', 'Alcaparras,Alho frito', 'pizzas', '', '03/01/2018', 0, '6643ec79d64fae0eb191466101ae6430.jpg  ', '3 queijos', 'Familia', 0, 'Abacaxi', 0),
(228, '', '70.00', 'Peito de peru', 'pizzas', '', '17/02/2018', 0, '6643ec79d64fae0eb191466101ae6430.jpg  ', 'Peito de peru ', 'Familia', 0, '', 0),
(229, '', '29.00', 'Bacon', 'pizzas', '', '17/02/2018', 0, '0b7f5994b76a891c50213b3286957fce.jpg  ', 'Bacon', 'MÃ©dia', 0, 'Bacon', 0),
(231, '', '', '', 'pizzas', '', '04/07/2018', 0, '', '', '', 0, '', 0),
(233, 'FRITAS QUEIJO E BACON', '', ' MUSSARELLA , BATATAS FRITAS PALITO, BACON FRITO', 'porcoes', '', '22/09/2018', 0, '6b3cf085a1105feb4bf91c81dc19977b.jpg  ', '', '', 1, '', 0),
(236, 'Coxinha', '3.00', '  Bacon,  Batata palha,  Bife caseiro, Carne ', 'coxinha', '', '07/10/2018', 0, '316aa105745eb4b2fd11f1361a201b14.jpg  ', '', '', 0, '', 0),
(238, 'Coxinha 150 Unidades', '35', '    Coxinha de Frango Mini 10g - 25 Unidades,    Enroladinho de Pizza Mini 10g - 25 Unidades,    Pastel de Carne MoÃ­da Mini 10g - 25 Unidades,    Bolinha de Queijo Mini 10g - 25 Unidades', 'coxinha', '', '15/10/2018', 0, '316aa105745eb4b2fd11f1361a201b14.jpg  ', '', '', 0, '', 6),
(239, '', '49.99', 'Bacalhau,Azeitona,OrÃ©gano,Mussarela ,Molho de tomate', 'pizzas', '', '11/12/2018', 0, '621396ff1c6baf6578a381d65f2773ad.jpg  ', 'Bacalhau', 'Familia', 0, '', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `sabores`
--

CREATE TABLE `sabores` (
  `id` int(11) NOT NULL,
  `sabor` varchar(100) NOT NULL,
  `extra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `sabores`
--

INSERT INTO `sabores` (`id`, `sabor`, `extra`) VALUES
(14, '3 queijos', 1),
(15, '4 queijos', 0),
(16, '5 queijos', 0),
(20, 'Alho e Ã³leo ', 0),
(21, 'Americana', 0),
(23, 'Atum', 1),
(24, 'Bacalhau', 1),
(25, 'Bacon', 1),
(33, 'Calabresa', 1),
(35, 'CamarÃ£o ', 1),
(39, 'Champignon', 1),
(41, 'Cheddar ', 0),
(45, 'Da casa', 0),
(49, 'Frango', 1),
(54, 'Lombo', 1),
(55, 'Marguerita', 0),
(58, 'Mussarela', 0),
(60, 'Palmito', 1),
(62, 'Peito de peru ', 1),
(63, 'Pepperoni', 1),
(65, 'Portuguesa', 0),
(67, 'Presunto', 1),
(68, 'Provolone', 0),
(71, 'Sardinha', 0),
(72, '', 0),
(73, 'Moda da Casa', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `id_estrangeiro` varchar(100) NOT NULL,
  `sessao` varchar(100) NOT NULL,
  `produto` varchar(100) NOT NULL,
  `produto_id` varchar(100) NOT NULL,
  `pizza` varchar(100) NOT NULL,
  `bebida` varchar(100) NOT NULL,
  `bebida_id` int(11) NOT NULL,
  `tamanho` varchar(100) NOT NULL,
  `ingredientes1` text NOT NULL,
  `sabores1` varchar(100) NOT NULL,
  `data` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `valor` varchar(100) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `ingredientes2` text NOT NULL,
  `ingredientes3` text NOT NULL,
  `ingredientes4` text NOT NULL,
  `sabores2` varchar(100) NOT NULL,
  `sabores3` varchar(100) NOT NULL,
  `sabores4` varchar(100) NOT NULL,
  `ids_pizzas` varchar(100) NOT NULL,
  `quant_sabores` int(11) NOT NULL,
  `borda` varchar(100) NOT NULL,
  `lanche` varchar(100) NOT NULL,
  `lanche_id` int(11) NOT NULL,
  `ingredientes` text NOT NULL,
  `id_tamanho` int(11) NOT NULL,
  `ingredientes_todos1` text NOT NULL,
  `ingredientes_todos2` text NOT NULL,
  `ingredientes_todos3` text NOT NULL,
  `ingredientes_todos4` text NOT NULL,
  `obs` text NOT NULL,
  `opcionais_1` varchar(100) NOT NULL,
  `opcionais_2` varchar(100) NOT NULL,
  `opcionais_3` varchar(100) NOT NULL,
  `opcionais_4` varchar(100) NOT NULL,
  `taxa_entrega` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `store`
--

INSERT INTO `store` (`id`, `id_estrangeiro`, `sessao`, `produto`, `produto_id`, `pizza`, `bebida`, `bebida_id`, `tamanho`, `ingredientes1`, `sabores1`, `data`, `status`, `valor`, `quantidade`, `ingredientes2`, `ingredientes3`, `ingredientes4`, `sabores2`, `sabores3`, `sabores4`, `ids_pizzas`, `quant_sabores`, `borda`, `lanche`, `lanche_id`, `ingredientes`, `id_tamanho`, `ingredientes_todos1`, `ingredientes_todos2`, `ingredientes_todos3`, `ingredientes_todos4`, `obs`, `opcionais_1`, `opcionais_2`, `opcionais_3`, `opcionais_4`, `taxa_entrega`) VALUES
(43, '', 'fd1cf1b82424482d8b8918aba99d7216', '', 'P-47', 'sim', '', 0, 'Pizza FamÃ­lia', 'Calabresa, Cheddar, Catupiry, Gorgonzola', '4 queijos', '24/01/18', 0, '\n36,00', 1, 'Calabresa, Cheddar, Catupiry, Gorgonzola', 'Alcaparras, Alho frito', 'Alcaparras, Alho frito', '4 queijos', '3 queijos', '3 queijos', '227-227-226-226', 4, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(44, '', '5e2c449feb55da034d177b07b53d3302', '', 'P-69', 'sim', '', 0, 'MÃ©dia', 'Bacon, Molho de tomate, Mussarela , OrÃ©gano', 'Bacon', '29/01/18', 0, '\n30,00', 1, 'Catupiry, Gorgonzola, Molho de tomate, Mussarela , Provolone, OrÃ©gano', '', '', '4 queijos', '', '', '33-45', 2, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(45, '', '5e2c449feb55da034d177b07b53d3302', '', '7', '', 'sim', 7, '', '', '', '29-01-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(46, '', '5e2c449feb55da034d177b07b53d3302', '', '215', '', 'sim', 215, '', '', '', '29-01-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(47, '', '6e84d7b8103243f3f773ec2b61798544', '', '7', '', 'sim', 7, '', '', '', '02-02-2018', 0, '8.00', 10, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(48, '', '6e84d7b8103243f3f773ec2b61798544', '', '215', '', 'sim', 215, '', '', '', '02-02-2018', 0, '6.00', 4, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(49, '', '6e84d7b8103243f3f773ec2b61798544', '', '216', '', 'sim', 216, '', '', '', '02-02-2018', 0, '6.00', 6, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(50, '', '6e84d7b8103243f3f773ec2b61798544', '', '214', '', 'sim', 214, '', '', '', '02-02-2018', 0, '3.00', 3, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(51, '', '6e84d7b8103243f3f773ec2b61798544', '', '8', '', 'sim', 8, '', '', '', '02-02-2018', 0, '3.00', 3, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(52, '', '6e84d7b8103243f3f773ec2b61798544', '', '217', '', 'sim', 217, '', '', '', '02-02-2018', 0, '8.00', 2, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(53, '', '6e84d7b8103243f3f773ec2b61798544', '', 'P-9', 'sim', '', 0, 'Pizza FamÃ­lia', 'Calabresa, Cheddar, Catupiry, Gorgonzola', '4 queijos', '02/02/18', 0, '\n46,00', 1, 'Calabresa, Cheddar, Catupiry, Gorgonzola', 'Alcaparras, Alho frito', 'Alcaparras, Alho frito', '4 queijos', '3 queijos', '3 queijos', '227-227-226-226', 4, '+ Borda Twist', '', 0, '', 0, '', '', '', '', '', 'Milho verde, Palmito', '', '', '', '0.00'),
(54, '', '6e84d7b8103243f3f773ec2b61798544', '', 'P-87', 'sim', '', 0, 'Pizza FamÃ­lia', 'Calabresa, Cheddar, Catupiry, Gorgonzola', '4 queijos', '02/02/18', 0, '\n46,00', 1, 'Alcaparras, Alho frito', 'Alcaparras, Alho frito', 'Calabresa, Cheddar, Catupiry, Gorgonzola', '3 queijos', '3 queijos', '4 queijos', '226-227-226-227-227-227-226-226', 4, '+ Borda Twist', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(55, '', '6e84d7b8103243f3f773ec2b61798544', '', 'P-25', 'sim', '', 0, 'Pizza FamÃ­lia', 'Alcaparras, Alho frito', '3 queijos', '02/02/18', 0, '\n46,00', 1, 'Calabresa, Cheddar, Catupiry, Gorgonzola', 'Calabresa, Cheddar, Catupiry, Gorgonzola', 'Calabresa, Cheddar, Catupiry, Gorgonzola', '4 queijos', '4 queijos', '4 queijos', '226-227-226-226-226-227-226-227-227-227-226-226', 4, '+ Borda Twist', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(57, '', '4fe35a5e7ddfa78e7cb1eeb136ff51a4', '', '8', '', 'sim', 8, '', '', '', '05-02-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(58, '', '4fe35a5e7ddfa78e7cb1eeb136ff51a4', '', '7', '', 'sim', 7, '', '', '', '05-02-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(59, '', '4fe35a5e7ddfa78e7cb1eeb136ff51a4', '', 'P-22', 'sim', '', 0, 'Pizza FamÃ­lia', 'Alcaparras, Alho frito', '3 queijos', '05/02/18', 0, '\n36,00', 1, 'Calabresa, Cheddar, Catupiry, Gorgonzola', '', '', '4 queijos', '', '', '227-226', 2, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(60, '', '19589829870a973b44e9f94528cdc08b', '', 'P-12', 'sim', '', 0, 'Pizza FamÃ­lia', 'Alcaparras, Alho frito', '3 queijos', '17/02/18', 0, '\n70,00', 1, 'Calabresa, Cheddar, Catupiry, Gorgonzola', 'Alcaparras, Alho frito', 'Peito de peru', '4 queijos', '3 queijos', 'Peito de peru ', '227-227-226-228', 4, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(61, '', '19589829870a973b44e9f94528cdc08b', '', '215', '', 'sim', 215, '', '', '', '17-02-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(62, '', '19589829870a973b44e9f94528cdc08b', '', '8', '', 'sim', 8, '', '', '', '17-02-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(65, '', 'd97b04453042a60d88efdac4e5fd6bed', '', '8', '', 'sim', 8, '', '', '', '23-02-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(66, '', 'd97b04453042a60d88efdac4e5fd6bed', '', 'P-58', 'sim', '', 0, 'MÃ©dia', 'Catupiry, Ervilha, Frango, Molho de tomate, Mussarela , Presunto, OrÃ©gano', '007', '23/02/18', 0, '\n30,00', 1, 'Catupiry, Gorgonzola, Molho de tomate, Mussarela , Provolone, OrÃ©gano', '', '', '4 queijos', '', '', '27-33', 2, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(67, '', '551ac9977ffb885cdf4e2993d3603c22', '', '216', '', 'sim', 216, '', '', '', '25-02-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(69, '', '838004f3f8fae4d54fe83c3268b85c11', '', 'P-59', 'sim', '', 0, 'Familia', 'Calabresa, Cheddar, Catupiry, Gorgonzola', '4 queijos', '26/02/18', 0, '\n36,00', 1, '', '', '', '', '', '', '226', 1, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(70, '', 'z84mhpikb7fgyl6', '', '217', '', 'sim', 217, '', '', '', '26-02-2018', 0, '8.00', 3, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(71, '', 'z84mhpikb7fgyl6', '', '216', '', 'sim', 216, '', '', '', '26-02-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(72, '', 'z84mhpikb7fgyl6', '', 'P-60', 'sim', '', 0, 'Pizza FamÃ­lia', 'Calabresa, Cheddar, Catupiry, Gorgonzola', '4 queijos', '26/02/18', 0, '\n36,00', 1, '', '', '', '', '', '', '226', 1, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(73, '', 'z84mhpikb7fgyl6', '', '214', '', 'sim', 214, '', '', '', '26-02-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(74, '', 'z84mhpikb7fgyl6', '', '8', '', 'sim', 8, '', '', '', '26-02-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(75, '', '88f29c23c47635e94a75653a2f409524', '', '215', '', 'sim', 215, '', '', '', '01-03-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(76, '', '88f29c23c47635e94a75653a2f409524', '', 'P-3', 'sim', '', 0, 'Grande', 'Catupiry, Cheddar, Molho de tomate, Mussarela, OrÃ©gano', '3 queijos', '01/03/18', 0, '\n36,00', 1, 'Atum, Bacon, Catupiry, Molho de tomate, Mussarela , Ovos, OrÃ©gano', '', '', 'Americana', '', '', '43-31', 2, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(77, '', '0ccb3ea81745eff2978778a349da7f1b', '', '7', '', 'sim', 7, '', '', '', '02-03-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(78, '', '7b1d0cf82d99fd9ee7a091bfdce66041', '', '7', '', 'sim', 7, '', '', '', '06-03-2018', 0, '8.00', 3, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(79, '', '7b1d0cf82d99fd9ee7a091bfdce66041', '', '215', '', 'sim', 215, '', '', '', '06-03-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(80, '', '2d60da8aa19764a356f17a4fabcbbc3a', '', '8', '', 'sim', 8, '', '', '', '07-03-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(81, '', '2d60da8aa19764a356f17a4fabcbbc3a', '', '214', '', 'sim', 214, '', '', '', '07-03-2018', 0, '3.00', 4, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(82, '', '728c346c74984331c324166ce405d719', '', 'P-92', 'sim', '', 0, 'Pizza FamÃ­lia', 'Alcaparras, Alho frito', '3 queijos', '09/03/18', 0, '\n70,00', 1, 'Calabresa, Cheddar, Catupiry, Gorgonzola', 'Calabresa, Cheddar, Catupiry, Gorgonzola', 'Peito de peru', '4 queijos', '4 queijos', 'Peito de peru ', '226-228-226-227', 4, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(83, '', '507f549c21ac5afdf7c4625abf3a0440', '', '7', '', 'sim', 7, '', '', '', '09-03-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(84, '', '507f549c21ac5afdf7c4625abf3a0440', '', 'P-95', 'sim', '', 0, 'Grande', 'Mussarela , OrÃ©gano, Alho frito', 'Alho e Ã³leo ', '09/03/18', 0, '\n70,00', 1, 'Catupiry, Cheddar, Molho de tomate, Mussarela, OrÃ©gano', '', '', '3 queijos', '', '', '40-31-226-226-226-228-228-227', 2, '', '', 0, '', 0, 'Molho de tomate', '', '', '', '', '', '', '', '', '0.00'),
(85, '', '507f549c21ac5afdf7c4625abf3a0440', '', 'P-99', 'sim', '', 0, 'Grande', 'Catupiry, Cheddar, Molho de tomate, Mussarela, OrÃ©gano', '3 queijos', '09/03/18', 0, '\n70,00', 1, 'Catupiry, Cheddar, Gorgonzola, Molho de tomate, Mussarela , Provolone, OrÃ©gano', '', '', '5 queijos', '', '', '37-31-40-31-226-226-226-228-228-227', 2, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(86, '', 'dca7545df88bb8a6f12eaae6d78c93f7', '', 'P-90', 'sim', '', 0, 'Grande', 'Molho de tomate, Mussarela , OrÃ©gano, Alho frito', 'Alho e Ã³leo ', '10/03/18', 0, '\n36,00', 1, 'Catupiry, Cheddar, Gorgonzola, Molho de tomate, Mussarela , Provolone, OrÃ©gano', '', '', '5 queijos', '', '', '37-40', 2, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(87, '', 'dca7545df88bb8a6f12eaae6d78c93f7', '', '215', '', 'sim', 215, '', '', '', '10-03-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(88, '', 'd0faadae8433d3fa3f21d8914c0c2304', '', '7', '', 'sim', 7, '', '', '', '12-03-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(89, '', 'd0faadae8433d3fa3f21d8914c0c2304', '', '215', '', 'sim', 215, '', '', '', '12-03-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(90, '', 'd0faadae8433d3fa3f21d8914c0c2304', '', '8', '', 'sim', 8, '', '', '', '12-03-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(91, '', '96b7a4259ca7203090f4ed62be782dee', '', '7', '', 'sim', 7, '', '', '', '13-03-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(92, '', '258085ed19a264a915af0c26b654961f', '', '217', '', 'sim', 217, '', '', '', '13-03-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(93, '', '258085ed19a264a915af0c26b654961f', '', '214', '', 'sim', 214, '', '', '', '13-03-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(95, '', 'e81571a35c02cba084f75f7f96e90de4', '', 'P-85', 'sim', '', 0, 'Pizza FamÃ­lia', 'Calabresa, Cheddar, Catupiry, Gorgonzola', '4 queijos', '16/03/18', 0, '\n70,00', 1, 'Alcaparras, Alho frito', 'Alcaparras, Alho frito', 'Peito de peru', '3 queijos', '3 queijos', 'Peito de peru ', '228-227-227-226', 4, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(97, '', 'e81571a35c02cba084f75f7f96e90de4', '', '8', '', 'sim', 8, '', '', '', '16-03-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(98, '', 'e81571a35c02cba084f75f7f96e90de4', '', '214', '', 'sim', 214, '', '', '', '16-03-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(99, '', 'e81571a35c02cba084f75f7f96e90de4', '', '215', '', 'sim', 215, '', '', '', '16-03-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(100, '', 'e81571a35c02cba084f75f7f96e90de4', '', 'P-67', 'sim', '', 0, 'Pizza FamÃ­lia', 'Calabresa, Cheddar, Catupiry, Gorgonzola', '4 queijos', '16/03/18', 0, '\n36,00', 1, '', '', '', '', '', '', '226', 1, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(101, '', 'c1a5291d4930850b52c8b83b2aa338ee', '', '7', '', 'sim', 7, '', '', '', '16-03-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(102, '', 'c1a5291d4930850b52c8b83b2aa338ee', '', '216', '', 'sim', 216, '', '', '', '16-03-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(103, '', 'a38b13cf42b2321f985baf33bef2d7e2', '', '216', '', 'sim', 216, '', '', '', '19-03-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(104, '', 'a38b13cf42b2321f985baf33bef2d7e2', '', '7', '', 'sim', 7, '', '', '', '19-03-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(105, '', '5euwlrpcv3sm7y9', '', '8', '', 'sim', 8, '', '', '', '21-03-2018', 0, '3.00', 2, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '2.00'),
(106, '', 'w8gzyp52xsviblq', '', '7', '', 'sim', 7, '', '', '', '22-03-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '2.00'),
(107, '', '0fa2a6d0e939ed8c8fe5a7a90bf94968', '', '215', '', 'sim', 215, '', '', '', '28-03-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(108, '', '0fa2a6d0e939ed8c8fe5a7a90bf94968', '', '214', '', 'sim', 214, '', '', '', '28-03-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(109, '', '0fa2a6d0e939ed8c8fe5a7a90bf94968', '', '8', '', 'sim', 8, '', '', '', '28-03-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(110, '', '0fa2a6d0e939ed8c8fe5a7a90bf94968', '', '217', '', 'sim', 217, '', '', '', '28-03-2018', 0, '8.00', 2, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(111, '', '0fa2a6d0e939ed8c8fe5a7a90bf94968', '', '216', '', 'sim', 216, '', '', '', '28-03-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(112, '', '0fa2a6d0e939ed8c8fe5a7a90bf94968', '', '7', '', 'sim', 7, '', '', '', '28-03-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(115, '', '3f6efacc05504fe7032f8e9785d9ad81', '', '8', '', 'sim', 8, '', '', '', '01-04-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(116, '', 'd27f476f3d0beffd155748ffe3e1acfb', '', '216', '', 'sim', 216, '', '', '', '05-04-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(117, '', '6f23774a05abc6d25690f96dd1249b1d', '', '7', '', 'sim', 7, '', '', '', '05-04-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(118, '', 'ac599af990bcc775f789705a970030e5', '', '8', '', 'sim', 8, '', '', '', '09-04-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(119, '', 'ac599af990bcc775f789705a970030e5', '', '215', '', 'sim', 215, '', '', '', '09-04-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(120, '', '45f56d16e3f067810d4be92de7b784d3', '', '215', '', 'sim', 215, '', '', '', '11-04-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(121, '', '45f56d16e3f067810d4be92de7b784d3', '', '216', '', 'sim', 216, '', '', '', '11-04-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(122, '', '45f56d16e3f067810d4be92de7b784d3', '', '8', '', 'sim', 8, '', '', '', '11-04-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(123, '', 'da6a0b1ccc0423c822ec2ddd59926196', '', '215', '', 'sim', 215, '', '', '', '15-04-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(124, '', 'd9d3ab72670aa9a083bdb4bd884bf821', '', '215', '', 'sim', 215, '', '', '', '18-04-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(125, '', 'd9d3ab72670aa9a083bdb4bd884bf821', '', 'P-54', 'sim', '', 0, 'Familia', 'Calabresa, Cheddar, Catupiry, Gorgonzola', '4 queijos', '18/04/18', 0, '\n36,00', 1, '', '', '', '', '', '', '226', 1, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(126, '', '42a85592342a1ef11bd8448d824d7bb3', '', '215', '', 'sim', 215, '', '', '', '25-04-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(127, '', '42a85592342a1ef11bd8448d824d7bb3', '', '225', '', '', 0, '', '', '', '25-04-2018', 0, '5.50', 1, '', '', '', '', '', '', '', 0, '', 'sim', 225, ' Bacon, Cebola, Ervilha, Lombo', 80, '', '', '', '', '', '', '', '', '', '0.00'),
(128, '', '176640be8a2197a71d90efa299b7c10a', '', '216', '', 'sim', 216, '', '', '', '03-05-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(129, '', '176640be8a2197a71d90efa299b7c10a', '', '7', '', 'sim', 7, '', '', '', '03-05-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(130, '', 'bb9571b87cb11902bc417e2a04bb1433', '', '8', '', 'sim', 8, '', '', '', '19-05-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(131, '', '83902cd18a118e3b98972c0dee79011a', '', '7', '', 'sim', 7, '', '', '', '22-05-2018', 0, '8.00', 3, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(132, '', '83902cd18a118e3b98972c0dee79011a', '', '215', '', 'sim', 215, '', '', '', '22-05-2018', 0, '6.00', 5, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(133, '', '83902cd18a118e3b98972c0dee79011a', '', 'P-78', 'sim', '', 0, 'Pizza FamÃ­lia', 'Alcaparras, Alho frito', '3 queijos', '22/05/18', 0, '\n80,00', 1, 'Calabresa, Cheddar, Catupiry, Gorgonzola', 'Alcaparras, Alho frito', 'Peito de peru', '4 queijos', '3 queijos', 'Peito de peru ', '228-227-226-227', 4, '+ Borda Mussarela', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(137, '', '4116b8c2ce7c96fbe52b80a80c7101f4', '', '215', '', 'sim', 215, '', '', '', '30-05-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(138, '', '4116b8c2ce7c96fbe52b80a80c7101f4', '', '216', '', 'sim', 216, '', '', '', '30-05-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(139, '', '4116b8c2ce7c96fbe52b80a80c7101f4', '', '217', '', 'sim', 217, '', '', '', '30-05-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(140, '', '4116b8c2ce7c96fbe52b80a80c7101f4', '', '225', '', '', 0, '', '', '', '30-05-2018', 0, '3.50', 1, '', '', '', '', '', '', '', 0, '', 'sim', 225, ' Bacon, Cebola', 79, '', '', '', '', '', '', '', '', '', '0.00'),
(146, '', '6bc7869168394d4e4784678cfca6d3cb', '', '7', '', 'sim', 7, '', '', '', '11-06-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(147, '', '6bc7869168394d4e4784678cfca6d3cb', '', '225', '', '', 0, '', '', '', '11-06-2018', 0, '7.50', 1, '', '', '', '', '', '', '', 0, '', 'sim', 225, ' Bacon, Cebola, Ervilha, Lombo', 81, '', '', '', '', '', '', '', '', '', '0.00'),
(148, '', '8e48fabcc7298530b97a575a915beded', '', '7', '', 'sim', 7, '', '', '', '13-06-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(149, '', '8e48fabcc7298530b97a575a915beded', '', '215', '', 'sim', 215, '', '', '', '13-06-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(150, '', '8e48fabcc7298530b97a575a915beded', '', 'P-92', 'sim', '', 0, 'Pizza FamÃ­lia', 'Calabresa, Cheddar, Catupiry, Gorgonzola', '4 queijos', '13/06/18', 0, '\n70,00', 1, 'Calabresa, Cheddar, Catupiry, Gorgonzola', 'Peito de peru', 'Peito de peru', '4 queijos', 'Peito de peru ', 'Peito de peru ', '228-228-226-226', 4, '', '', 0, '', 0, '', '', '', '', '', 'Milho verde, Palmito', '', '', '', '0.00'),
(151, '', 'cb7da0875adf674c8df4c65b75b75243', '', 'P-0', 'sim', '', 0, 'Familia', 'Alcaparras, Alho frito', '3 queijos', '14/06/18', 0, '\n36,00', 1, 'Calabresa, Cheddar, Catupiry, Gorgonzola', '', '', '4 queijos', '', '', '226-227', 2, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(152, '', 'cb7da0875adf674c8df4c65b75b75243', '', '8', '', 'sim', 8, '', '', '', '14-06-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(159, '', '711454929f6ba4ff3210c9f6992dc8bb', '', 'P-94', 'sim', '', 0, 'Pizza FamÃ­lia', 'Calabresa, Cheddar, Catupiry, Gorgonzola', '4 queijos', '18/06/18', 0, '\n70,00', 1, 'Peito de peru', 'Alcaparras, Alho frito', 'Peito de peru', 'Peito de peru ', '3 queijos', 'Peito de peru ', '228-227-228-226', 4, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(160, '', '711454929f6ba4ff3210c9f6992dc8bb', '', '7', '', 'sim', 7, '', '', '', '18-06-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(161, '', '711454929f6ba4ff3210c9f6992dc8bb', '', '8', '', 'sim', 8, '', '', '', '18-06-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(162, '', '711454929f6ba4ff3210c9f6992dc8bb', '', '214', '', 'sim', 214, '', '', '', '18-06-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(166, '', '26026af549e25fe97af370323b415f10', '', '7', '', 'sim', 7, '', '', '', '27-06-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(169, '', '3f8192eb8bbda1e542bb2d530cc04167', '', '215', '', 'sim', 215, '', '', '', '04-07-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(170, '', '3f8192eb8bbda1e542bb2d530cc04167', '', '217', '', 'sim', 217, '', '', '', '04-07-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(174, '', '765701d17f4b79a0bbc980ee25a91030', '', '214', '', 'sim', 214, '', '', '', '04-07-2018', 0, '3.00', 2, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(175, '', '765701d17f4b79a0bbc980ee25a91030', '', '216', '', 'sim', 216, '', '', '', '04-07-2018', 0, '6.00', 2, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(176, '', '765701d17f4b79a0bbc980ee25a91030', '', '215', '', 'sim', 215, '', '', '', '04-07-2018', 0, '6.00', 2, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(179, '', '9e593d3fe4094d4513c8e688f1b30c98', '', 'P-55', 'sim', '', 0, 'Grande', 'Catupiry, Cheddar, Molho de tomate, Mussarela, OrÃ©gano', '3 queijos', '07/07/18', 0, '\n36,00', 1, 'Catupiry, Gorgonzola, Molho de tomate, Mussarela , Provolone, OrÃ©gano', 'Atum, Bacon, Catupiry, Molho de tomate, Mussarela , Ovos, OrÃ©gano', '', '4 queijos', 'Americana', '', '43-34-31', 3, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(180, '', '9e593d3fe4094d4513c8e688f1b30c98', '', '215', '', 'sim', 215, '', '', '', '07-07-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(181, '', '9e593d3fe4094d4513c8e688f1b30c98', '', '216', '', 'sim', 216, '', '', '', '07-07-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(182, '', '9e593d3fe4094d4513c8e688f1b30c98', '', 'P-38', 'sim', '', 0, 'MÃ©dia', 'Catupiry, Ervilha, Frango, Molho de tomate, Mussarela , Presunto, OrÃ©gano', '007', '07/07/18', 0, '\n36,00', 1, 'Molho de tomate, Mussarela , OrÃ©gano, Alho frito', '', '', 'Alho e Ã³leo ', '', '', '39-27-43-34-31', 2, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(184, '', '765701d17f4b79a0bbc980ee25a91030', '', '7', '', 'sim', 7, '', '', '', '11-07-2018', 0, '8.00', 2, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(185, '', '765701d17f4b79a0bbc980ee25a91030', '', 'P-58', 'sim', '', 0, 'Pizza FamÃ­lia', 'Peito de peru', 'Peito de peru ', '11/07/18', 0, '\n70,00', 2, 'Calabresa, Cheddar, Catupiry, Gorgonzola', 'Peito de peru', 'Alcaparras, Alho frito', '4 queijos', 'Peito de peru ', '3 queijos', '228-227-228-226', 4, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(186, '', '765701d17f4b79a0bbc980ee25a91030', '', '225', '', '', 0, '', '', '', '11-07-2018', 0, '5.50', 1, '', '', '', '', '', '', '', 0, '', 'sim', 225, ' Bacon, Cebola, Ervilha, Lombo', 80, '', '', '', '', '', '', '', '', '', '0.00'),
(194, '', '5990bbf57da8556f3d8764a82403b168', '', '215', '', 'sim', 215, '', '', '', '18-07-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(195, '', '5990bbf57da8556f3d8764a82403b168', '', 'P-9', 'sim', '', 0, 'Pizza FamÃ­lia', 'Alcaparras, Alho frito', '3 queijos', '18/07/18', 0, '\n5,00', 1, '', '', '', '', '', '', '227', 1, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(196, '', '5990bbf57da8556f3d8764a82403b168', '', '225', '', '', 0, '', '', '', '18-07-2018', 0, '3.50', 1, '', '', '', '', '', '', '', 0, '', 'sim', 225, ' Bacon, Cebola, Ervilha, Lombo', 79, '', '', '', '', '', '', '', '', '', '0.00'),
(204, '', '4581bc9ef1cc1594007764f56c6a225e', '', '7', '', 'sim', 7, '', '', '', '21-07-2018', 0, '8.00', 10, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(206, '', '4581bc9ef1cc1594007764f56c6a225e', '', 'P-94', 'sim', '', 0, 'Grande', 'Catupiry, Gorgonzola, Molho de tomate, Mussarela , Provolone, OrÃ©gano', '4 queijos', '21/07/18', 0, '\n36,00', 1, 'Molho de tomate, Mussarela , OrÃ©gano, Alho frito', 'Atum, Bacon, Catupiry, Molho de tomate, Mussarela , Ovos, OrÃ©gano', '', 'Alho e Ã³leo ', 'Americana', '', '43-40-34-34', 3, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(207, '', '4581bc9ef1cc1594007764f56c6a225e', '', '216', '', 'sim', 216, '', '', '', '21-07-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(208, '', '4581bc9ef1cc1594007764f56c6a225e', '', '217', '', 'sim', 217, '', '', '', '21-07-2018', 0, '8.00', 4, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(210, '', '4581bc9ef1cc1594007764f56c6a225e', '', '214', '', 'sim', 214, '', '', '', '22-07-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(211, '', '1556f16f6575d2534fe757475de204fd', '', '7', '', 'sim', 7, '', '', '', '22-07-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(212, '', '1556f16f6575d2534fe757475de204fd', '', '8', '', 'sim', 8, '', '', '', '22-07-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(216, '', '83be0faaa371754c6f00490b2c73645a', '', 'P-50', 'sim', '', 0, 'Pizza FamÃ­lia', 'Alcaparras, Alho frito', '3 queijos', '22/07/18', 0, '\n5,00', 1, '', '', '', '', '', '', '227', 1, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(217, '', 'd24a74efce22f6d8846932207c4a70d1', '', 'P-44', 'sim', '', 0, 'Pizza FamÃ­lia', 'Alcaparras, Alho frito', '3 queijos', '23/07/18', 0, '\n72,00', 1, 'Peito de peru', '', '', 'Peito de peru ', '', '', '228-227', 2, '', '', 0, '', 0, '', '', '', '', '', 'Abacaxi', '', '', '', '0.00'),
(218, '', '83be0faaa371754c6f00490b2c73645a', '', '', '', 'sim', 0, '', '', '', '23-07-2018', 0, '', 7, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(220, '', '4058ca811c3088cba985928a951d6233', '', '8', '', 'sim', 8, '', '', '', '27-07-2018', 0, '3.00', 3, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(221, '', '83be0faaa371754c6f00490b2c73645a', '', '8', '', 'sim', 8, '', '', '', '01-08-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(222, '', '83be0faaa371754c6f00490b2c73645a', '', 'P-2', 'sim', '', 0, 'Pizza FamÃ­lia', 'Alcaparras, Alho frito', '3 queijos', '04/08/18', 0, '\n72,00', 1, 'Peito de peru', '', '', 'Peito de peru ', '', '', '228-227', 2, '', '', 0, '', 0, '', '', '', '', '', 'Abacaxi', '', '', '', '0.00'),
(223, '', '49', '', '8', '', 'sim', 8, '', '', '', '07-08-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(224, '', '49', '', '', 'sim', '', 0, 'Grande', '<i>Com Catupiry,Ervilha,Frango,Molho de tomate,Mussarela ,Presunto</i>', '007 ', '07/08/18', 0, '\n33,00', 1, '<i>Com Catupiry,Cheddar,Mussarela,OrÃ©gano</i>', '', '', '3 queijos ', '', '', '', 2, '', '', 0, '', 0, 'OrÃ©gano', 'Molho de tomate', '', '', '', '', '', '', '', '0.00'),
(225, '', 'c88a5fabcc4ef52e941c99ff3c912e2b', '', '216', '', 'sim', 216, '', '', '', '07-08-2018', 0, '6.00', 3, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(226, '', 'c88a5fabcc4ef52e941c99ff3c912e2b', '', '7', '', 'sim', 7, '', '', '', '07-08-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(228, '', '2fcb682e225ab4057c9d386d0db10349', '', '7', '', 'sim', 7, '', '', '', '10-08-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(229, '', '2fcb682e225ab4057c9d386d0db10349', '', '215', '', 'sim', 215, '', '', '', '10-08-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(230, '', '2fcb682e225ab4057c9d386d0db10349', '', 'P-47', 'sim', '', 0, 'Pizza FamÃ­lia', 'Alcaparras, Alho frito', '3 queijos', '10/08/18', 0, '\n36,00', 1, 'Calabresa, Cheddar, Catupiry, Gorgonzola', 'Alcaparras, Alho frito', 'Alcaparras, Alho frito', '4 queijos', '3 queijos', '3 queijos', '227-227-226-227', 4, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(231, '', '33616329643fa7ec5ea3de7848aa9b34', '', 'P-74', 'sim', '', 0, 'Pizza FamÃ­lia', 'Calabresa, Cheddar, Catupiry, Gorgonzola', '4 queijos', '11/08/18', 0, '\n70,00', 1, 'Alcaparras, Alho frito', 'Alcaparras, Alho frito', 'Peito de peru', '3 queijos', '3 queijos', 'Peito de peru ', '227-228-226-227', 4, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(232, '', '7036569b45cf769d916187e561f5f0ed', '', '8', '', 'sim', 8, '', '', '', '21-08-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(233, '', '7036569b45cf769d916187e561f5f0ed', '', '225', '', '', 0, '', '', '', '21-08-2018', 0, '7.50', 1, '', '', '', '', '', '', '', 0, '', 'sim', 225, ' Bacon, Cebola, Ervilha', 81, '', '', '', '', '', '', '', '', '', '0.00'),
(234, '', '0b02d4a58ab93ccc69d5282347d8f9c0', '', '214', '', 'sim', 214, '', '', '', '27-08-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(235, '', '0b02d4a58ab93ccc69d5282347d8f9c0', '', '216', '', 'sim', 216, '', '', '', '27-08-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(237, '', '0b02d4a58ab93ccc69d5282347d8f9c0', '', '217', '', 'sim', 217, '', '', '', '27-08-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(239, '', 'f644c0d34ad41580ac434d7b2e101c55', '', '7', '', 'sim', 7, '', '', '', '08-09-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(240, '', 'f644c0d34ad41580ac434d7b2e101c55', '', '216', '', 'sim', 216, '', '', '', '08-09-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(241, '', 'f644c0d34ad41580ac434d7b2e101c55', '', 'P-8', 'sim', '', 0, 'Familia', 'Peito de peru', 'Peito de peru ', '08/09/18', 0, '\n70,00', 1, 'Alcaparras, Alho frito', 'Peito de peru', 'Calabresa, Cheddar, Catupiry, Gorgonzola', '3 queijos', 'Peito de peru ', '4 queijos', '228-228-227-226', 4, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(242, '', 'afc73ac74ce6e63cdce788491e2ed39d', '', 'P-15', 'sim', '', 0, 'Familia', 'Calabresa, Cheddar, Catupiry, Gorgonzola', '4 queijos', '10/09/18', 0, '\n70,00', 1, 'Calabresa, Cheddar, Catupiry, Gorgonzola', 'Alcaparras, Alho frito', 'Peito de peru', '4 queijos', '3 queijos', 'Peito de peru ', '227-228-227-226-226', 4, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(243, '', 'afc73ac74ce6e63cdce788491e2ed39d', '', '216', '', 'sim', 216, '', '', '', '10-09-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(244, '', 'fc28e7fabe392bd2e43274178133a8a3', '', '214', '', 'sim', 214, '', '', '', '11-09-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(245, '', 'ee9a19bf7847eedd5d15d1899572a430', '', '7', '', 'sim', 7, '', '', '', '11-09-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(246, '', 'ee9a19bf7847eedd5d15d1899572a430', '', 'P-24', 'sim', '', 0, 'Familia', 'Calabresa, Cheddar, Catupiry, Gorgonzola', '4 queijos', '11/09/18', 0, '\n70,00', 1, 'Peito de peru', 'Alcaparras, Alho frito', 'Alcaparras, Alho frito', 'Peito de peru ', '3 queijos', '3 queijos', '227-226-227-227-228', 4, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(247, '', '2672a99d7a985c26035270864a70ceda', '', '215', '', 'sim', 215, '', '', '', '13-09-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(248, '', '2672a99d7a985c26035270864a70ceda', '', '225', '', '', 0, '', '', '', '13-09-2018', 0, '7.50', 1, '', '', '', '', '', '', '', 0, '', 'sim', 225, ' Bacon, Cebola', 81, '', '', '', '', '', '', '', '', '', '0.00'),
(249, '', 'bae16d0a951b81316f04987a6cb4fc16', '', '215', '', 'sim', 215, '', '', '', '14-09-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(250, '', 'bae16d0a951b81316f04987a6cb4fc16', '', '216', '', 'sim', 216, '', '', '', '14-09-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(251, '', 'bae16d0a951b81316f04987a6cb4fc16', '', '217', '', 'sim', 217, '', '', '', '14-09-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(252, '', '5bcdcb0deea4967b43b6e9b8141e1aa6', '', '217', '', 'sim', 217, '', '', '', '15-09-2018', 0, '8.00', 2, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(254, '', '2672a99d7a985c26035270864a70ceda', '', '225', '', '', 0, '', '', '', '19-09-2018', 0, '7.50', 1, '', '', '', '', '', '', '', 0, '', 'sim', 225, ' Bacon, Cebola, Ervilha, Lombo', 81, '', '', '', '', '', '', '', '', '', '0.00'),
(255, '', '2672a99d7a985c26035270864a70ceda', '', '232', '', 'sim', 232, '', '', '', '19-09-2018', 0, '', 3, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(256, '', 'a881269ba1eab9bacedef2bebb17e7e4', '', '225', '', '', 0, '', '', '', '20-09-2018', 0, '7.50', 4, '', '', '', '', '', '', '', 0, '', 'sim', 225, ' Bacon, Cebola, Ervilha, Lombo', 81, '', '', '', '', '', '', '', '', '', '0.00'),
(257, '', 'a3bffb3d947109a8be098af0d7c380c5', '', '7', '', 'sim', 7, '', '', '', '20-09-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(258, '', 'a011acd9fb0b154635fc424e5042155a', '', '215', '', 'sim', 215, '', '', '', '22-09-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(259, '', 'a011acd9fb0b154635fc424e5042155a', '', 'P-22', 'sim', '', 0, 'Pizza FamÃ­lia', 'Calabresa, Cheddar, Catupiry', '4 queijos', '22/09/18', 0, '\n70,00', 1, 'Peito de peru', 'Alcaparras, Alho frito', 'Alcaparras', 'Peito de peru ', '3 queijos', '3 queijos', '227-227-226-226-228-228', 4, '', '', 0, '', 0, 'Gorgonzola', '', '', 'Alho frito', '', '', '', '', '', '0.00'),
(260, '', 'a011acd9fb0b154635fc424e5042155a', '', '225', '', '', 0, '', '', '', '22-09-2018', 0, '7.50', 1, '', '', '', '', '', '', '', 0, '', 'sim', 225, ' Bacon, Cebola, Ervilha, Lombo', 81, '', '', '', '', '', '', '', '', '', '0.00'),
(264, '', '0770c821b40dfc2d265464aace5e5c61', '', '225', '', '', 0, '', '', '', '26-09-2018', 0, '7.50', 1, '', '', '', '', '', '', '', 0, '', 'sim', 225, ' Ervilha, Lombo', 81, '', '', '', '', '', '', '', '', '', '0.00'),
(265, '', '89ada4b54f6ada6331866358ec72f090', '', '7', '', 'sim', 7, '', '', '', '27-09-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(266, '', '89ada4b54f6ada6331866358ec72f090', '', '216', '', 'sim', 216, '', '', '', '27-09-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(267, '', '89ada4b54f6ada6331866358ec72f090', '', '214', '', 'sim', 214, '', '', '', '27-09-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(268, '', '89ada4b54f6ada6331866358ec72f090', '', '217', '', 'sim', 217, '', '', '', '27-09-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(272, '', 'b338220798fa744ac918158c0b175ba4', '', '234', '', 'sim', 234, '', '', '', '29-09-2018', 0, '22.22', 2, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(273, '', 'b338220798fa744ac918158c0b175ba4', '', '235', '', 'sim', 235, '', '', '', '29-09-2018', 0, '50.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(274, '', '9f317d1d9ca60463965718f302d4c9ae', '', '8', '', 'sim', 8, '', '', '', '29-09-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(294, '', '39247d26dfee31646399aa846fdbe69c', '', 'P-79', 'sim', '', 0, 'Grande', 'Molho de tomate, Mussarela , OrÃ©gano', 'Alho e Ã³leo ', '29/09/18', 0, '\n28,00', 1, '', '', '', '', '', '', '40', 1, '', '', 0, '', 0, 'Alho frito', '', '', '', '', '', '', '', '', '0.00'),
(295, '', '39247d26dfee31646399aa846fdbe69c', '', 'P-79', 'sim', '', 0, 'Grande', 'Catupiry, Ervilha, Frango, Molho de tomate, Mussarela , Presunto, OrÃ©gano', '007', '29/09/18', 0, '\n36,00', 1, 'Catupiry, Cheddar, Gorgonzola, Molho de tomate, Mussarela , Provolone, OrÃ©gano', '', '', '5 queijos', '', '', '37-28', 2, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(298, '', '39247d26dfee31646399aa846fdbe69c', '', '8', '', 'sim', 8, '', '', '', '29-09-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(299, '', '39247d26dfee31646399aa846fdbe69c', '', '7', '', 'sim', 7, '', '', '', '29-09-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(300, '', '39247d26dfee31646399aa846fdbe69c', '', '215', '', 'sim', 215, '', '', '', '29-09-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(301, '', '2a9aed04ecc02d893eee75694b719412', '', '225', '', '', 0, '', '', '', '30-09-2018', 0, '5.50', 1, '', '', '', '', '', '', '', 0, '', 'sim', 225, ' Bacon, Cebola, Lombo', 80, '', '', '', '', '', '', '', '', '', '0.00'),
(303, '', '3d16cebf0d88fd570a2f3c17a77994a2', '', '234', '', 'sim', 234, '', '', '', '01-10-2018', 0, '22.22', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(304, '', '569d74a7980c6aa855b80d79898af8ac', '', '215', '', 'sim', 215, '', '', '', '01-10-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(308, '', '62a8c411fddbaef8acd8b79ff762fbe3', '', '215', '', 'sim', 215, '', '', '', '01-10-2018', 0, '6.00', 2, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(309, '', 'xcmw1g2a4l6qnv9', '', 'P-16', 'sim', '', 0, 'Grande', 'Catupiry, Cheddar, Molho de tomate, Mussarela, OrÃ©gano', '3 queijos', '02/10/18', 0, '\n36,00', 1, 'Calabresa, Cebola, Ervilha, Molho de tomate, Mussarela , Ovos, Pimenta calabresa', '', '', 'Baiana', '', '', '49-43-31', 2, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(310, '', 'xcmw1g2a4l6qnv9', '', '217', '', 'sim', 217, '', '', '', '02-10-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(311, '', '2500cab8316a230707ef0c11f5f42815', '', '8', '', 'sim', 8, '', '', '', '03-10-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(312, '', '2500cab8316a230707ef0c11f5f42815', '', '215', '', 'sim', 215, '', '', '', '03-10-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(313, '', '10a15fa82dc839df5503daf4fe6a9cb1', '', 'P-30', 'sim', '', 0, 'Pizza FamÃ­lia', 'Alcaparras, Alho frito', '3 queijos', '05/10/18', 0, '\n5,00', 1, '', '', '', '', '', '', '227', 1, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(315, '', '10a15fa82dc839df5503daf4fe6a9cb1', '', '7', '', 'sim', 7, '', '', '', '05-10-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(316, '', '10a15fa82dc839df5503daf4fe6a9cb1', '', '216', '', 'sim', 216, '', '', '', '05-10-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(330, '', '9af453dcf0dad65c0e7ea6797290d092', '', '236', '', '', 0, '', '', '', '11-10-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', 'sim', 236, '6 Bacon 3 Batata palha  1 Bife caseiro ', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(363, '', '4324ac015a8446a8ec897b70d9ec6d52', '', '7', '', 'sim', 7, '', '', '', '17-10-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(364, '', 'f3c7e0478c4daac1c8e71ad629be22d9', '', '215', '', 'sim', 215, '', '', '', '19-10-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(365, '', '8ed52b3b3b0c9d39395c76923b13b676', '', 'P-85', 'sim', '', 0, 'Grande', 'Milho verde, Molho de tomate, Mussarela , Presunto, OrÃ©gano', 'Camponesa', '22/10/18', 0, '\n36,00', 1, 'Cheddar, Molho de tomate, Mussarela , OrÃ©gano', 'Bacon, Calabresa, Cebola, Molho de tomate, Mussarela , Ovos, PimentÃ£o, OrÃ©gano', '', 'Cheddar ', 'Da casa', '', '99-87-72', 3, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(366, '', 'pixgyb9zkoq06lw', '', '214', '', 'sim', 214, '', '', '', '31-10-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(367, '', 'pixgyb9zkoq06lw', '', 'P-46', 'sim', '', 0, 'Pizza FamÃ­lia', 'Alcaparras', '3 queijos', '31/10/18', 0, '\n70,00', 1, 'Calabresa, Cheddar, Catupiry', 'Alcaparras', 'Peito de peru', '4 queijos', '3 queijos', 'Peito de peru ', '228-227-228-226-227', 4, '', '', 0, '', 0, 'Alho frito', 'Gorgonzola', 'Alho frito', '', '', '', '', '', '', '0.00'),
(368, '', '0adc3707873f58aeb2bd83d1be267e42', '', '225', '', '', 0, '', '', '', '01-11-2018', 0, '7.50', 1, '', '', '', '', '', '', '', 0, '', 'sim', 225, ' Bacon, Cebola, Ervilha, Lombo', 81, '', '', '', '', '', '', '', '', '', '0.00'),
(369, '', '0adc3707873f58aeb2bd83d1be267e42', '', '215', '', 'sim', 215, '', '', '', '01-11-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(370, '', '57741edc2592f7823f8851343ef2c3d5', '', '215', '', 'sim', 215, '', '', '', '17-11-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(371, '', '57741edc2592f7823f8851343ef2c3d5', '', '225', '', '', 0, '', '', '', '17-11-2018', 0, '7.50', 1, '', '', '', '', '', '', '', 0, '', 'sim', 225, ' Bacon, Cebola, Ervilha, Lombo', 81, '', '', '', '', '', '', '', '', '', '0.00'),
(372, '', 'c1310913a5641e4da90564359021d475', '', '8', '', 'sim', 8, '', '', '', '04-12-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(373, '', 'c1310913a5641e4da90564359021d475', '', '7', '', 'sim', 7, '', '', '', '04-12-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(374, '', 'ca7b3df8420e2e03e2242b9137308e07', '', 'P-83', 'sim', '', 0, 'Pizza FamÃ­lia', 'Bacalhau, Azeitona, OrÃ©gano, Mussarela , Molho de tomate', 'Bacalhau', '11/12/18', 0, '\n70,00', 1, 'Peito de peru', '', '', 'Peito de peru ', '', '', '228-239', 2, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(375, '', 'ca7b3df8420e2e03e2242b9137308e07', '', '215', '', 'sim', 215, '', '', '', '11-12-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(376, '', 'ca7b3df8420e2e03e2242b9137308e07', '', '233', '', '', 0, '', '', '', '11-12-2018', 0, '14.00', 1, '', '', '', '', '', '', '', 0, '', 'sim', 233, ' MUSSARELLA , BATATAS FRITAS PALITO', 82, '', '', '', '', '', '', '', '', '', '0.00'),
(379, '', '5391399602dc0f7a85faf752166f431e', '', '7', '', 'sim', 7, '', '', '', '17-12-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(380, '', '402355453087636712bbeda49165427e', '', '215', '', 'sim', 215, '', '', '', '17-12-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(381, '', '402355453087636712bbeda49165427e', '', '8', '', 'sim', 8, '', '', '', '17-12-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(382, '', '402355453087636712bbeda49165427e', '', 'P-53', 'sim', '', 0, 'Pizza FamÃ­lia', 'Alcaparras, Alho frito', '3 queijos', '17/12/18', 0, '\n70,00', 1, 'Bacalhau, Azeitona, OrÃ©gano, Mussarela , Molho de tomate', 'Calabresa, Cheddar, Catupiry, Gorgonzola', 'Peito de peru', 'Bacalhau', '4 queijos', 'Peito de peru ', '226-228-239-227', 4, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(383, '', 'zvh0ge7qb8nrscl', '', '216', '', 'sim', 216, '', '', '', '18-12-2018', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(384, '', 'zvh0ge7qb8nrscl', '', '7', '', 'sim', 7, '', '', '', '18-12-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(385, '', '5b17dbd44c06459166f296b7105c6020', '', '8', '', 'sim', 8, '', '', '', '20-12-2018', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(386, '', '5b17dbd44c06459166f296b7105c6020', '', 'P-78', 'sim', '', 0, 'Grande', 'Atum, Bacon, Catupiry, Molho de tomate, Mussarela , Ovos, OrÃ©gano', 'Americana', '20/12/18', 0, '\n36,00', 1, 'Catupiry, Gorgonzola, Molho de tomate, Mussarela , Provolone, OrÃ©gano', '', '', '4 queijos', '', '', '34-43-31-34', 2, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00');
INSERT INTO `store` (`id`, `id_estrangeiro`, `sessao`, `produto`, `produto_id`, `pizza`, `bebida`, `bebida_id`, `tamanho`, `ingredientes1`, `sabores1`, `data`, `status`, `valor`, `quantidade`, `ingredientes2`, `ingredientes3`, `ingredientes4`, `sabores2`, `sabores3`, `sabores4`, `ids_pizzas`, `quant_sabores`, `borda`, `lanche`, `lanche_id`, `ingredientes`, `id_tamanho`, `ingredientes_todos1`, `ingredientes_todos2`, `ingredientes_todos3`, `ingredientes_todos4`, `obs`, `opcionais_1`, `opcionais_2`, `opcionais_3`, `opcionais_4`, `taxa_entrega`) VALUES
(387, '', '5b17dbd44c06459166f296b7105c6020', '', '217', '', 'sim', 217, '', '', '', '20-12-2018', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(388, '', '5b17dbd44c06459166f296b7105c6020', '', 'P-55', 'sim', '', 0, 'Familia', 'Alcaparras, Alho frito', '3 queijos', '20/12/18', 0, '\n70,00', 1, 'Peito de peru', 'Alcaparras, Alho frito', 'Bacalhau, Azeitona, OrÃ©gano, Mussarela , Molho de tomate', 'Peito de peru ', '3 queijos', 'Bacalhau', '227-239-228-227-34-43-31-34', 4, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(389, '', '6832f73dcf2c7706cdf522e3794c05ba', '', '216', '', 'sim', 216, '', '', '', '09-01-2019', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(390, '', '6832f73dcf2c7706cdf522e3794c05ba', '', '225', '', '', 0, '', '', '', '09-01-2019', 0, '5.50', 1, '', '', '', '', '', '', '', 0, '', 'sim', 225, ' Bacon, Cebola, Ervilha, Lombo', 80, '', '', '', '', '', '', '', '', '', '0.00'),
(392, '', '84245d8b8f1c9b6b61f7ffb84689d1d4', '', '215', '', 'sim', 215, '', '', '', '19-01-2019', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(393, '', '84245d8b8f1c9b6b61f7ffb84689d1d4', '', '225', '', '', 0, '', '', '', '19-01-2019', 0, '5.50', 1, '', '', '', '', '', '', '', 0, '', 'sim', 225, ' Bacon, Cebola, Ervilha', 80, '', '', '', '', '', '', '', '', '', '0.00'),
(394, '', 'jm98aqmar5753pte2qbrglmgq5', '', '', '', 'sim', 0, '', '', '', '30-01-2019', 0, '', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(395, '', 'jm98aqmar5753pte2qbrglmgq5', '', '', '', '', 0, '', '', '', '30-01-2019', 0, '0', 1, '', '', '', '', '', '', '', 0, '', 'sim', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(396, '', '8e9105d865519cece07c8588105ff581', '', '217', '', 'sim', 217, '', '', '', '10-02-2019', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(397, '', '8e9105d865519cece07c8588105ff581', '', 'P-96', 'sim', '', 0, 'MÃ©dia', 'Catupiry, Cheddar, Gorgonzola, Molho de tomate, Mussarela , Provolone, OrÃ©gano', '5 queijos', '10/02/19', 0, '\n30,00', 1, 'Catupiry, Gorgonzola, Molho de tomate, Mussarela , Provolone, OrÃ©gano', '', '', '4 queijos', '', '', '33-36', 2, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(399, '', '0c83ab226f33419103f3f3254394570c', '', '216', '', 'sim', 216, '', '', '', '13-02-2019', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(400, '', '0c83ab226f33419103f3f3254394570c', '', '7', '', 'sim', 7, '', '', '', '13-02-2019', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(401, '', '1ffff43c2933f1e875051f0d08c58ee7', '', '216', '', 'sim', 216, '', '', '', '15-02-2019', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(402, '', 'd92f14873b0771507b579406d6ba8510', '', '8', '', 'sim', 8, '', '', '', '15-02-2019', 0, '3.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(403, '', 'd92f14873b0771507b579406d6ba8510', '', '215', '', 'sim', 215, '', '', '', '15-02-2019', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(404, '', 'd92f14873b0771507b579406d6ba8510', '', '217', '', 'sim', 217, '', '', '', '15-02-2019', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(405, '', 'd92f14873b0771507b579406d6ba8510', '', '216', '', 'sim', 216, '', '', '', '15-02-2019', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(406, '', 'd92f14873b0771507b579406d6ba8510', '', 'P-44', 'sim', '', 0, 'Pizza FamÃ­lia', 'Alcaparras, Alho frito', '3 queijos', '15/02/19', 0, '\n49,99', 1, 'Bacalhau, Azeitona, OrÃ©gano, Mussarela , Molho de tomate', '', '', 'Bacalhau', '', '', '239-227', 2, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(407, '', 'b9b87ba5ae2807cb18896abded613094', '', '215', '', 'sim', 215, '', '', '', '15-02-2019', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(408, '', 'b9b87ba5ae2807cb18896abded613094', '', 'P-73', 'sim', '', 0, 'Pizza FamÃ­lia', 'Peito de peru', 'Peito de peru ', '15/02/19', 0, '\n70,00', 1, 'Bacalhau, Azeitona, OrÃ©gano, Mussarela , Molho de tomate', '', '', 'Bacalhau', '', '', '239-228', 2, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(409, '', 'b9b87ba5ae2807cb18896abded613094', '', '', '', '', 0, '', '', '', '15-02-2019', 0, '0', 1, '', '', '', '', '', '', '', 0, '', 'sim', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(410, '', '849ba959f2902d4d11dd6c5608699519', '', '7', '', 'sim', 7, '', '', '', '24-02-2019', 0, '8.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(411, '', 'gyt5xl72o39uqas', '', '216', '', 'sim', 216, '', '', '', '09-03-2019', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00'),
(414, '', '51c35d2d61cf2cec9096894d131757a0', '', '215', '', 'sim', 215, '', '', '', '02-04-2019', 0, '6.00', 1, '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '0.00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `store_finalizado`
--

CREATE TABLE `store_finalizado` (
  `id` int(11) NOT NULL,
  `id_estrangeiro` varchar(100) NOT NULL,
  `sessao` varchar(100) NOT NULL,
  `produto` varchar(100) NOT NULL,
  `produto_id` varchar(100) NOT NULL,
  `pizza` varchar(100) NOT NULL,
  `bebida` varchar(100) NOT NULL,
  `bebida_id` int(11) NOT NULL,
  `tamanho` varchar(100) NOT NULL,
  `ingredientes1` text NOT NULL,
  `sabores1` varchar(100) NOT NULL,
  `data` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `ingredientes2` text NOT NULL,
  `ingredientes3` text NOT NULL,
  `ingredientes4` text NOT NULL,
  `sabores2` varchar(100) NOT NULL,
  `sabores3` varchar(100) NOT NULL,
  `sabores4` varchar(100) NOT NULL,
  `ids_pizzas` varchar(100) NOT NULL,
  `quant_sabores` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `data_aprovado` varchar(100) NOT NULL,
  `data_forno` varchar(100) NOT NULL,
  `data_entrega` varchar(100) NOT NULL,
  `tempo` int(11) NOT NULL,
  `data_cancelado` varchar(100) NOT NULL,
  `entregador` varchar(100) NOT NULL,
  `data_finalizado` varchar(100) NOT NULL,
  `entrega` varchar(100) NOT NULL,
  `pagamento` varchar(100) NOT NULL,
  `troco` decimal(10,2) NOT NULL,
  `borda` varchar(100) NOT NULL,
  `status_view` int(11) NOT NULL,
  `taxa_entrega` decimal(10,2) NOT NULL,
  `ingredientes_todos1` text NOT NULL,
  `ingredientes_todos2` text NOT NULL,
  `ingredientes_todos3` text NOT NULL,
  `ingredientes_todos4` text NOT NULL,
  `obs` text NOT NULL,
  `opcionais_1` text NOT NULL,
  `opcionais_2` text NOT NULL,
  `opcionais_3` text NOT NULL,
  `opcionais_4` text NOT NULL,
  `pagseguro_code` varchar(100) DEFAULT NULL,
  `status_pagamento` varchar(100) DEFAULT NULL,
  `ingredientes` text NOT NULL,
  `lanche` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `store_finalizado`
--

INSERT INTO `store_finalizado` (`id`, `id_estrangeiro`, `sessao`, `produto`, `produto_id`, `pizza`, `bebida`, `bebida_id`, `tamanho`, `ingredientes1`, `sabores1`, `data`, `status`, `valor`, `quantidade`, `ingredientes2`, `ingredientes3`, `ingredientes4`, `sabores2`, `sabores3`, `sabores4`, `ids_pizzas`, `quant_sabores`, `id_pedido`, `data_aprovado`, `data_forno`, `data_entrega`, `tempo`, `data_cancelado`, `entregador`, `data_finalizado`, `entrega`, `pagamento`, `troco`, `borda`, `status_view`, `taxa_entrega`, `ingredientes_todos1`, `ingredientes_todos2`, `ingredientes_todos3`, `ingredientes_todos4`, `obs`, `opcionais_1`, `opcionais_2`, `opcionais_3`, `opcionais_4`, `pagseguro_code`, `status_pagamento`, `ingredientes`, `lanche`) VALUES
(70, '60', '2esbn6zjy0pm49o', '', '217', '', 'sim', 217, '', '', '', '29/09/18', 1, '8.00', 1, '', '', '', '', '', '', '', 0, 589374, '', '', '', 1538233893, '', '', '', 'Retirar na Pizzaria', '', '0.00', '', 1, '0.00', '', '', '', '', '', '', '', '', '', NULL, NULL, '', ''),
(71, '60', '2esbn6zjy0pm49o', '', '8', '', 'sim', 8, '', '', '', '29/09/18', 1, '3.00', 1, '', '', '', '', '', '', '', 0, 589374, '', '', '', 1538233893, '', '', '', 'Retirar na Pizzaria', '', '0.00', '', 1, '0.00', '', '', '', '', '', '', '', '', '', NULL, NULL, '', ''),
(72, '60', '2esbn6zjy0pm49o', '', '8', '', 'sim', 8, '', '', '', '29/09/18', 1, '3.00', 1, '', '', '', '', '', '', '', 0, 859461, '', '', '', 1538233937, '', '', '', 'Retirar na Pizzaria', '', '0.00', '', 1, '0.00', '', '', '', '', '', '', '', '', '', NULL, NULL, '', ''),
(73, '60', '2esbn6zjy0pm49o', '', '214', '', 'sim', 214, '', '', '', '29/09/18', 1, '3.00', 1, '', '', '', '', '', '', '', 0, 859461, '', '', '', 1538233937, '', '', '', 'Retirar na Pizzaria', '', '0.00', '', 1, '0.00', '', '', '', '', '', '', '', '', '', NULL, NULL, '', ''),
(74, '59', '59', '', '235', '', 'sim', 235, '', '', '', '01/10/18', 1, '50.00', 1, '', '', '', '', '', '', '', 0, 921607, '', '', '', 1538417039, '', '', '', 'Retirar na Pizzaria', '', '0.00', '', 1, '0.00', '', '', '', '', '', '', '', '', '', NULL, NULL, '', ''),
(75, '59', '59', '', '233', '', '', 0, '', '', '', '01/10/18', 1, '14.00', 1, '', '', '', '', '', '', '', 0, 921607, '', '', '', 1538417039, '', '', '', 'Retirar na Pizzaria', '', '0.00', '', 1, '0.00', '', '', '', '', '', '', '', '', '', NULL, NULL, '', ''),
(76, '52', 'zvh0ge7qb8nrscl', '', '236', '', '', 0, '', '', '', '15/10/18', 1, '6.30', 1, '', '', '', '', '', '', '', 0, 93845, '', '', '', 1539618281, '', '', '', 'Retirar na Pizzaria', '', '0.00', '', 1, '0.00', '', '', '', '', 'fhfhgf', '', '', '', '', NULL, NULL, '', ''),
(77, '52', 'zvh0ge7qb8nrscl', '', '236', '', '', 0, '', '', '', '15/10/18', 1, '6.30', 1, '', '', '', '', '', '', '', 0, 582617, '', '', '', 1539624408, '', '', '', 'Retirar na Pizzaria', '', '0.00', '', 1, '0.00', '', '', '', '', '', '', '', '', '', NULL, NULL, ' 1  Bacon 2  Batata palha 3  Bife caseiro  1 Carne  ', ''),
(78, '52', 'zvh0ge7qb8nrscl', '', '236', '', '', 0, '', '', '', '15/10/18', 2, '4.80', 1, '', '', '', '', '', '', '', 0, 21574, '16-12-18 22:22', '', '', 1539624970, '', '', '', 'Retirar na Pizzaria', '', '0.00', '', 1, '0.00', '', '', '', '', '', '', '', '', '', NULL, NULL, ' 1  Bacon 2  Batata palha 2  Bife caseiro  1 Carne  ', 'sim'),
(79, '62', 'rx61mg9l8370vbf', '', '238', '', '', 0, '', '', '', '15/10/18', 5, '35.00', 1, '', '', '', '', '', '', '', 0, 96245, '15-10-18 21:18', '', '15-10-18 21:19', 1539656278, '', 'ERMISON', '16-12-18 22:31', 'Retirar na Pizzaria', '', '0.00', '', 1, '0.00', '', '', '', '', '', '', '', '', '', NULL, NULL, '2    Coxinha de Frango Mini 10g - 25 Unidades 2    Enroladinho de Pizza Mini 10g - 25 Unidades  1    Pastel de Carne MoÃ­da Mini 10g - 25 Unidades  1    Bolinha de Queijo Mini 10g - 25 Unidades ', 'sim'),
(80, '62', 'rx61mg9l8370vbf', '', '238', '', '', 0, '', '', '', '15/10/18', 4, '35.00', 1, '', '', '', '', '', '', '', 0, 105879, '15-10-18 21:22', '15-10-18 21:23', '15-10-18 21:23', 1539656532, '', 'AXEL', '', 'Entrega a DomicÃ­lio', 'CartÃ£o', '0.00', '', 1, '2.00', '', '', '', '', '', '', '', '', '', NULL, NULL, ' 1    Coxinha de Frango Mini 10g - 25 Unidades  1    Enroladinho de Pizza Mini 10g - 25 Unidades  1    Pastel de Carne MoÃ­da Mini 10g - 25 Unidades  1    Bolinha de Queijo Mini 10g - 25 Unidades ', 'sim'),
(81, '62', 'rx61mg9l8370vbf', '', '238', '', '', 0, '', '', '', '15/10/18', 2, '35.00', 1, '', '', '', '', '', '', '', 0, 92673, '15-10-18 21:24', '', '', 1539656674, '', '', '', 'Retirar na Pizzaria', '', '0.00', '', 1, '0.00', '', '', '', '', '', '', '', '', '', NULL, NULL, ' 1    Coxinha de Frango Mini 10g - 25 Unidades  1    Enroladinho de Pizza Mini 10g - 25 Unidades  1    Pastel de Carne MoÃ­da Mini 10g - 25 Unidades  1    Bolinha de Queijo Mini 10g - 25 Unidades ', 'sim'),
(82, '48', '48', '', '', 'sim', '', 0, 'MÃ©dia', '<i>Com Catupiry,Ervilha,Frango,Molho de tomate,Mussarela ,Presunto,OrÃ©gano</i>', '007 ', '16/12/18', 1, '36.00', 1, '<i>Com Catupiry,Cheddar,Molho de tomate,Mussarela,OrÃ©gano</i>', '', '', '3 queijos ', '', '', '', 2, 612340, '', '', '', 1545020698, '', '', '', 'Retirar na Pizzaria', '', '0.00', '', 1, '0.00', '', '', '', '', '', '', '', '', '', NULL, NULL, '', ''),
(83, '48', '48', '', '233', '', '', 0, '', '', '', '16/12/18', 1, '14.00', 1, '', '', '', '', '', '', '', 0, 910473, '', '', '', 1545021580, '', '', '', 'Retirar na Pizzaria', '', '0.00', '', 1, '0.00', '', '', '', '', '', '', '', '', '', NULL, NULL, '', ''),
(84, '66', 'x7i1mkduajey3t9', '', '215', '', 'sim', 215, '', '', '', '21/01/19', 1, '6.00', 1, '', '', '', '', '', '', '', 0, 385970, '', '', '', 1548097999, '', '', '', 'Entrega a DomicÃ­lio', 'CartÃ£o', '0.00', '', 1, '3.00', '', '', '', '', 'xxxxxxxxxxxxxxxxxxxxxxxnnnnnnnnnnnnnnnnnnnn', '', '', '', '', NULL, NULL, '', ''),
(85, '66', 'x7i1mkduajey3t9', '', '225', '', '', 0, '', '', '', '21/01/19', 1, '5.50', 1, '', '', '', '', '', '', '', 0, 385970, '', '', '', 1548097999, '', '', '', 'Entrega a DomicÃ­lio', 'CartÃ£o', '0.00', '', 1, '3.00', '', '', '', '', 'xxxxxxxxxxxxxxxxxxxxxxxnnnnnnnnnnnnnnnnnnnn', '', '', '', '', NULL, NULL, ' Bacon, Cebola, Ervilha, Lombo', 'sim'),
(86, '69', 'z4b2dtrjh3pxu1f', '', '8', '', 'sim', 8, '', '', '', '19/03/19', 1, '3.00', 1, '', '', '', '', '', '', '', 0, 901652, '', '', '', 1553025366, '', '', '', 'Entrega a DomicÃ­lio', 'CartÃ£o', '40.00', '', 0, '7.00', '', '', '', '', '', '', '', '', '', NULL, NULL, '', ''),
(87, '69', 'z4b2dtrjh3pxu1f', '', '217', '', 'sim', 217, '', '', '', '19/03/19', 1, '8.00', 1, '', '', '', '', '', '', '', 0, 901652, '', '', '', 1553025366, '', '', '', 'Entrega a DomicÃ­lio', 'CartÃ£o', '40.00', '', 0, '7.00', '', '', '', '', '', '', '', '', '', NULL, NULL, '', ''),
(88, '72', 'g6t5i84yws7o1vz', '', 'P-72', 'sim', '', 0, 'Grande', 'Catupiry, Ervilha, Frango, Molho de tomate, Mussarela , Presunto, OrÃ©gano', '007', '14/04/19', 3, '36.00', 1, 'Molho de tomate, Mussarela , OrÃ©gano, Alho frito', '', '', 'Alho e Ã³leo ', '', '', '40-28', 2, 596148, '', '14-04-19 14:54', '', 1555271475, '', '', '', 'Entrega a DomicÃ­lio', 'Dinheiro', '0.00', '', 1, '2.00', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tamanho`
--

CREATE TABLE `tamanho` (
  `id` int(11) NOT NULL,
  `tamanho` varchar(100) NOT NULL,
  `fatias` int(11) NOT NULL,
  `quant_sabores` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tamanho`
--

INSERT INTO `tamanho` (`id`, `tamanho`, `fatias`, `quant_sabores`) VALUES
(2, 'Familia', 12, 4),
(6, 'Grande', 8, 3),
(7, 'MÃ©dia', 6, 2),
(8, 'Pequena', 4, 1),
(9, 'Mini', 2, 2),
(10, '', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tamanhos`
--

CREATE TABLE `tamanhos` (
  `id` int(11) NOT NULL,
  `id_estrangeiro` int(11) NOT NULL,
  `tamanho` varchar(100) NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tamanhos`
--

INSERT INTO `tamanhos` (`id`, `id_estrangeiro`, `tamanho`, `valor`) VALUES
(20, 37, 'MÃ©dia', '15.00'),
(21, 37, 'Grande', '18.00'),
(22, 58, 'P', '55.00'),
(23, 58, 'M', '65.00'),
(24, 58, 'G', '75.00'),
(25, 60, 'P', '55.00'),
(26, 60, 'M', '65.00'),
(27, 60, 'G', '75.00'),
(28, 61, 'P', '40.00'),
(29, 61, 'M', '45.00'),
(30, 61, 'G', '55.00'),
(31, 62, 'P', '55.00'),
(32, 62, 'M', '65.00'),
(33, 62, 'G', '75.00'),
(34, 63, 'P', '45.00'),
(35, 63, 'M', '55.00'),
(36, 63, 'G', '65.00'),
(37, 65, 'COCA COLA 2LTS', '9.00'),
(38, 65, 'PEPSI COLA 2LTS', '8.00'),
(39, 65, 'SUKITA UVA', '7.00'),
(40, 65, 'SUKITA LARANJA', '7.00'),
(41, 65, 'KUAT', '7.00'),
(42, 66, 'COCA COLA 2LTS', '9.00'),
(43, 66, 'PEPSI COLA 2LTS', '8.00'),
(44, 66, 'SUKITA UVA', '7.00'),
(45, 66, 'SUKITA LARANJA', '7.00'),
(46, 66, 'KUAT', '7.00'),
(56, 23, 'Inteira', '22.20'),
(57, 23, 'Meia', '16.50'),
(58, 23, 'Grande', '19.00'),
(59, 21, 'Pequeno', '10.50'),
(60, 21, 'MÃ©dio', '15.50'),
(63, 25, 'Pequeno', '1.50'),
(64, 25, 'MÃ©dio', '2.50'),
(69, 218, '500 gr', '22.00'),
(70, 218, '1 kg', '35.00'),
(71, 219, '500 gr', '18.00'),
(72, 219, '1 kg', '28.00'),
(73, 220, '500 gr', '22.00'),
(74, 220, '1 kg', '35.00'),
(75, 221, '500 gr', '32.00'),
(76, 221, '1 kg', '48.00'),
(77, 222, '500 gr ', '28.00'),
(78, 222, '1 kg ', '42.00'),
(79, 225, 'Pequeno', '3.50'),
(80, 225, 'MÃ©dio', '5.50'),
(81, 225, 'Grande', '7.50'),
(82, 233, 'MEIA ', '14.00'),
(83, 233, 'INTEIRA', '18.00'),
(84, 235, 'pequena 2g', '50.00'),
(85, 235, 'media 10g', '60.00'),
(86, 235, 'grande 20g', '70.00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_u` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `celular` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `endereco` text NOT NULL,
  `complemento` text NOT NULL,
  `numero` int(11) NOT NULL,
  `data` varchar(100) NOT NULL,
  `id_logado` varchar(100) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `cpf` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id_u`, `nome`, `email`, `senha`, `telefone`, `celular`, `cidade`, `bairro`, `endereco`, `complemento`, `numero`, `data`, `id_logado`, `latitude`, `longitude`, `cpf`) VALUES
(48, 'Pablo Andrade', 'pablo.veloso@hotmail.com', '25f9e794323b453885f5181f1b624d0b', '37988087746', '37988087746', 'Salvador', '16', 'Rua GuaporÃ©', '', 1066, '10/11/2017', 'w2o4ezarmcqupt8', '-12.8934433', '-38.4713706', ''),
(49, 'CARLOS', 'professorzecarlos@yahoo.com.br', 'e6cceea2425f89de9a364ac1aaffc09d', '46184131', '11958302959', 'Salvador', '33', 'rua sbc', '', 155, '07/12/2017', 'q49zijug0fevhln', '-12.9238027', '-38.4217526', ''),
(50, 'jairo da rocha ', 'jairoshalom@gmail.com', '46ad5ac2ed9f74a1b2357bceaf01da89', '11975906098', '11975906098', 'jandira', '120', 'Rua Vicente de Carvalho', '', 33, '30/12/2017', 'q9ha361tvd5nwbf', '-23.5245357', '-46.8482188', ''),
(51, 'jairo da rocha souza', 'jairoshalom@gmail.com', '46ad5ac2ed9f74a1b2357bceaf01da89', '49917182', '975906098', 'Santo Andre', '121', 'Rua Vicente de Carvalho', 'Perto padaria SÃ£o Jorge ', 378, '13/01/2018', 'dxag657olkqitsc', '-23.6634552', '-46.5524481', ''),
(52, 'Messias', 'messiasjgmm@hotmail.com', '202cb962ac59075b964b07152d234b70', '31984610102', '31984610102', 'jandira', '120', 'ghgfhgf', 'fgdfgfdg', 56, '16/01/2018', 'zvh0ge7qb8nrscl', '', '', '546456456'),
(53, 'herson', 'herson.computer@gmail.com', '0082b70509846c1a68afb0217a03462d', '', '', 'Santo Andre', '121', 'rua teste', '', 1, '26/02/2018', 'z84mhpikb7fgyl6', '49.1011849', '-0.3728059', ''),
(54, 'joseph', 'joseph@gmail.com', '202cb962ac59075b964b07152d234b70', 'gggghh', 'hbbbbbbv', 'jandira', '120', 'hhgf', '', 0, '21/03/2018', '5euwlrpcv3sm7y9', '', '', ''),
(55, 'hdfgrsegvzv', 'evwewe', '202cb962ac59075b964b07152d234b70', 'ewvev', 'evewe', 'jandira', '120', 'eveev', '', 0, '22/03/2018', 'w8gzyp52xsviblq', '', '', ''),
(56, 'Murillo ', 'megapizza.vendas@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', '63999733022', 'Santo Andre', '121', 'quadra 1106 sul alameda 10', '', 7, '23/05/2018', 'y2ueh9v3g7tf68i', '37.7652065', '-122.2416355', ''),
(57, 'teste', 'teste@teste.com', '202cb962ac59075b964b07152d234b70', '99999999', '99999999', 'Santo Andre', '121', 'rua de teste', '', 1, '22/07/2018', 'zk73th6nr9ubx2p', '-23.6742228', '-46.5436003', ''),
(58, 'Nabuco', 'Nabucodonozor@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '95555555', '95555555', 'Brasilia', '122', 'Rua teste ', '', 1, '09/08/2018', 'z5vs7nybhw6p1ct', '', '', ''),
(59, 'Thiago', 'wt', 'e10adc3949ba59abbe56e057f20f883e', '84999146549', '84999146549', 'Santo Andre', '121', 'Rua EugÃªnia de Melo', '', 30, '26/09/2018', 'w7juk2xtfy1eqnh', '', '', ''),
(60, 'Thiago', 'wtsolucoespreticas@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '84999146549', '8499146549', 'Brasilia', '122', 'teste', 'teste', 30, '29/09/2018', '2esbn6zjy0pm49o', '', '', ''),
(61, 'Fagner', 'fagsantiago@gmail.com', '45efec4bc9667ea0188927dbcfb0d685', '71986191049', '', 'Brasilia', '122', 'Rua twste', 'Casa', 0, '02/10/2018', 'xcmw1g2a4l6qnv9', '', '', ''),
(62, 'thiago', 'teste@teste.com.br', 'e10adc3949ba59abbe56e057f20f883e', '84999146549', '', 'jandira', '120', 'teste', '', 0, '06/10/2018', 'rx61mg9l8370vbf', '', '', ''),
(63, 'teste', 'teste', '202cb962ac59075b964b07152d234b70', '00000000000', '00000000000', 'jandira', '120', 'teste', '', 0, '31/10/2018', 'pixgyb9zkoq06lw', '', '', ''),
(64, 'jorge', 'jorgelessa43@yahoo.com.br', '81dc9bdb52d04dc20036dbd8313ed055', '', '81995925798', 'Brasilia', '122', 'Rua cuiabÃ¡,', '201', 4280, '19/01/2019', 'pu2bfn8013gdwsv', '', '', ''),
(65, 'jorge', 'jorgelessa43@yahoo.com.br', '81dc9bdb52d04dc20036dbd8313ed055', '', '81995925798', 'Brasilia', '122', 'Rua cuiabÃ¡,', '201', 4280, '19/01/2019', 'scgadu17wm6otrv', '', '', ''),
(66, 'jorge', 'jorgelessa43@yahoo.com.br', 'e10adc3949ba59abbe56e057f20f883e', '81995925798', '81995925798', 'Santo Andre', '121', 'rua biscui', '3301', 54549, '21/01/2019', 'x7i1mkduajey3t9', '', '', ''),
(67, 'jorge', 'jorgelessa43@yahoo.com.br', 'e10adc3949ba59abbe56e057f20f883e', '81995925798', '81995925798', 'Santo Andre', '121', 'rua biscui', '3301', 54549, '21/01/2019', '8xr23mo4ug6k7be', '', '', ''),
(68, 'Jeferson Matias ', 'je.soumaisbh@gmail.com', '2806391a0ba8195f4f13b2f8beb96092', '31996440533', '', 'Santo Andre', '121', 'Rua Edivaldo Mendes,494 A', '', 0, '09/03/2019', 'gyt5xl72o39uqas', '', '', ''),
(69, 'Carlos ', 'Carlos@gmail.com', '9d2e6525313fda0ffa9d21354a421fb0', '212984747', '04597890372', 'Brasilia', '122', 'Rua Brasil', '', 254, '19/03/2019', 'z4b2dtrjh3pxu1f', '', '', ''),
(70, 'Carlos ', 'Carlos@gmail.com', '9d2e6525313fda0ffa9d21354a421fb0', '212984747', '04597890372', 'Brasilia', '122', 'Rua Brasil', '', 254, '19/03/2019', 'hb7086aqsxid4mn', '', '', ''),
(71, 'Carlos ', 'Carlos@gmail.com', '9d2e6525313fda0ffa9d21354a421fb0', '212984747', '04597890372', 'Brasilia', '122', 'Rua Brasil', '', 254, '19/03/2019', 'abpxhdy72ezv35m', '', '', ''),
(72, 'Teste a', 'empresa@empresa.com', 'e10adc3949ba59abbe56e057f20f883e', '9999999999', '999999999999', 'jandira', '120', 'teste ', '', 1, '14/04/2019', 'g6t5i84yws7o1vz', '', '', '');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `bairros`
--
ALTER TABLE `bairros`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `borda`
--
ALTER TABLE `borda`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `entregador`
--
ALTER TABLE `entregador`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `imagens_pizzas`
--
ALTER TABLE `imagens_pizzas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `opcionais`
--
ALTER TABLE `opcionais`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `opcionais_lanches`
--
ALTER TABLE `opcionais_lanches`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sabores`
--
ALTER TABLE `sabores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `store_finalizado`
--
ALTER TABLE `store_finalizado`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tamanho`
--
ALTER TABLE `tamanho`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tamanhos`
--
ALTER TABLE `tamanhos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `bairros`
--
ALTER TABLE `bairros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de tabela `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `borda`
--
ALTER TABLE `borda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `entregador`
--
ALTER TABLE `entregador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `extras`
--
ALTER TABLE `extras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `imagens_pizzas`
--
ALTER TABLE `imagens_pizzas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de tabela `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT de tabela `opcionais`
--
ALTER TABLE `opcionais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT de tabela `opcionais_lanches`
--
ALTER TABLE `opcionais_lanches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT de tabela `sabores`
--
ALTER TABLE `sabores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de tabela `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=416;

--
-- AUTO_INCREMENT de tabela `store_finalizado`
--
ALTER TABLE `store_finalizado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de tabela `tamanho`
--
ALTER TABLE `tamanho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tamanhos`
--
ALTER TABLE `tamanhos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
