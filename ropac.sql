-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-08-2015 a las 17:20:33
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ropac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
`id_adm` int(11) NOT NULL,
  `useradm` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cor_adm` varchar(350) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pass_adm` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_adm`, `useradm`, `cor_adm`, `pass_adm`) VALUES
(1, 'admin', 'admin@dominio.com', 'ang123.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodega`
--

CREATE TABLE IF NOT EXISTS `bodega` (
`id_bodega` int(11) NOT NULL,
  `nam_bd` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `map_bd` text COLLATE utf8_spanish_ci NOT NULL,
  `dir_bd` varchar(350) COLLATE utf8_spanish_ci NOT NULL,
  `pslc_bd` varchar(350) COLLATE utf8_spanish_ci NOT NULL,
  `tel_bd` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bodega`
--

INSERT INTO `bodega` (`id_bodega`, `nam_bd`, `map_bd`, `dir_bd`, `pslc_bd`, `tel_bd`) VALUES
(1, 'MedellÃ­n Bodega', '//www.google.com/maps/d/embed?mid=zOTyyKuZ2RUI.kz5y3dwR3cyc', 'cll 45 # 53-20 Centro Comercial Gran Plaza', 'Piso 11 - Bodega 1107', '366 6406'),
(2, 'CÃºcuta Bodega', '//www.google.com/maps/d/embed?mid=zOTyyKuZ2RUI.kz5y3dwR3cyc', 'Av. 11 # 2E-10 centro Comercial Deportivo Quinta Velez', 'Bobytech segundo piso Local: 204-205', '5895295'),
(3, 'Los Ãngeles Inc Store CÃºcuta', '//www.google.com/maps/d/embed?mid=zOTyyKuZ2RUI.kz5y3dwR3cyc', 'Cll 10 # 4-05 Centro', '', '5836638');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
`id_cl` int(11) NOT NULL,
  `nam_cl` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cl`, `nam_cl`) VALUES
(1, 'Blusas'),
(2, 'Acesorios'),
(3, 'Jeans'),
(4, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
`id_depart` int(11) NOT NULL,
  `nam_depart` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_depart`, `nam_depart`) VALUES
(1, 'AMAZONAS'),
(2, 'ANTIOQUIA'),
(3, 'ARAUCA'),
(4, 'ATLANTICO'),
(5, 'BOLIVAR'),
(6, 'BOYACA'),
(7, 'CALDAS'),
(8, 'CAQUETÃ'),
(9, 'CASANARE'),
(10, 'CAUCA'),
(11, 'CESAR'),
(12, 'CHOCO'),
(13, 'CORDOBA'),
(14, 'CUNDINAMARCA'),
(15, 'GUAINIA'),
(16, 'GUAVIARE'),
(17, 'HUILA'),
(18, 'LA GUAJIRA'),
(19, 'MAGDALENA'),
(20, 'META'),
(21, 'NARIÃ‘O'),
(22, 'NORTE DE SANTANDER'),
(23, 'PUTUMAYO'),
(24, 'QUINDIO'),
(25, 'RISARALDA'),
(26, 'SAN ANDRES Y ROVIDENCIA'),
(27, 'SANTANDER'),
(28, 'SUCRE'),
(29, 'TOLIMA'),
(30, 'VALLE DEL CAUCA'),
(31, 'VAUPES'),
(32, 'VICHADA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
`id_evet` int(11) NOT NULL,
  `nam_evet` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `text_evet` text COLLATE utf8_spanish_ci NOT NULL,
  `fech_evet` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evet`, `nam_evet`, `text_evet`, `fech_evet`) VALUES
(1, 'Evento 1 ', 'dex ssds', '2015-01-22'),
(2, 'evet2 4', 'rtexajlkjalkjdlaskjd', '2015-01-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
`cod_f` int(3) unsigned zerofill NOT NULL,
  `fec_f` date DEFAULT NULL,
  `n_vent` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `p_cod` int(11) DEFAULT NULL,
  `us_id` int(11) DEFAULT NULL,
  `cant_f` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `subt_f` decimal(10,0) DEFAULT NULL,
  `total_f` decimal(10,0) DEFAULT NULL,
  `estd_f` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galerya`
--

CREATE TABLE IF NOT EXISTS `galerya` (
`id_gal` int(11) NOT NULL,
  `rut_gal` varchar(400) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `galerya`
--

INSERT INTO `galerya` (`id_gal`, `rut_gal`) VALUES
(3, 'imagenes/galerya/mf1.png'),
(4, 'imagenes/galerya/mf2.png'),
(5, 'imagenes/galerya/mf3.png'),
(6, 'imagenes/galerya/mf4.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iamges_evet`
--

CREATE TABLE IF NOT EXISTS `iamges_evet` (
`id_img_evet` int(11) NOT NULL,
  `evet_id` int(11) NOT NULL,
  `rut_evet` varchar(455) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `iamges_evet`
--

INSERT INTO `iamges_evet` (`id_img_evet`, `evet_id`, `rut_evet`) VALUES
(1, 1, 'imagenes/evento/11.jpg'),
(2, 1, 'imagenes/evento/12_12.png'),
(3, 2, 'imagenes/evento/10868198_769385009782091_4981648391102050436_n (1).jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images_p`
--

CREATE TABLE IF NOT EXISTS `images_p` (
`id_img_p` int(11) NOT NULL,
  `p_cod` int(11) DEFAULT NULL,
  `ruta_p` varchar(455) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `images_p`
--

INSERT INTO `images_p` (`id_img_p`, `p_cod`, `ruta_p`) VALUES
(27, 13, 'imagenes/productos/conaxport.jpg'),
(31, 13, 'imagenes/productos/11.jpg'),
(32, 13, 'imagenes/productos/12_12.png'),
(33, 13, 'imagenes/productos/10868198_769385009782091_4981648391102050436_n (1).jpg'),
(34, 13, 'imagenes/productos/an3.jpg'),
(35, 13, 'imagenes/productos/foper.jpg'),
(36, 13, 'imagenes/productos/autob.jpg'),
(37, 14, 'imagenes/productos/an4.jpg'),
(38, 15, 'imagenes/productos/IMG-20141213-WA0086.jpg'),
(39, 17, 'imagenes/productos/IMG_0400.JPG'),
(40, 17, 'imagenes/productos/DSC_0894.JPG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
`id_mk` int(11) NOT NULL,
  `nam_mk` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tp_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_mk`, `nam_mk`, `tp_id`) VALUES
(7, 'mark 1', 2),
(8, 'mark 2', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marksimg`
--

CREATE TABLE IF NOT EXISTS `marksimg` (
`id_ik` int(11) NOT NULL,
  `rut_ik` varchar(455) COLLATE utf8_spanish_ci NOT NULL,
  `lk_ik` varchar(455) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marksimg`
--

INSERT INTO `marksimg` (`id_ik`, `rut_ik`, `lk_ik`) VALUES
(1, 'imagenes/marca/aac.png', 'https://google.com.co');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE IF NOT EXISTS `municipio` (
`id_muni` int(11) NOT NULL,
  `nam_muni` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1113 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id_muni`, `nam_muni`) VALUES
(1, 'EL ENCANTO'),
(2, 'LA CHORRERA'),
(3, 'LA PEDRERA'),
(4, 'LA VICTORIA'),
(5, 'LETICIA'),
(6, 'MIRITI'),
(7, 'PUERTO ALEGRIA'),
(8, 'PUERTO ARICA'),
(9, 'PUERTO NARIÑO'),
(10, 'PUERTO SANTANDER'),
(11, 'TURAPACA'),
(12, 'ABEJORRAL'),
(13, 'ABRIAQUI'),
(14, 'ALEJANDRIA'),
(15, 'AMAGA'),
(16, 'AMALFI'),
(17, 'ANDES'),
(18, 'ANGELOPOLIS'),
(19, 'ANGOSTURA'),
(20, 'ANORI'),
(21, 'ANTIOQUIA'),
(22, 'ANZA'),
(23, 'APARTADO'),
(24, 'ARBOLETES'),
(25, 'ARGELIA'),
(26, 'ARMENIA'),
(27, 'BARBOSA'),
(28, 'BELLO'),
(29, 'BELMIRA'),
(30, 'BETANIA'),
(31, 'BETULIA'),
(32, 'BOLIVAR'),
(33, 'BRICEÑO'),
(34, 'BURITICA'),
(35, 'CACERES'),
(36, 'CAICEDO'),
(37, 'CALDAS'),
(38, 'CAMPAMENTO'),
(39, 'CANASGORDAS'),
(40, 'CARACOLI'),
(41, 'CARAMANTA'),
(42, 'CAREPA'),
(43, 'CARMEN DE VIBORAL'),
(44, 'CAROLINA DEL PRINCIPE'),
(45, 'CAUCASIA'),
(46, 'CHIGORODO'),
(47, 'CISNEROS'),
(48, 'COCORNA'),
(49, 'CONCEPCION'),
(50, 'CONCORDIA'),
(51, 'COPACABANA'),
(52, 'DABEIBA'),
(53, 'DONMATIAS'),
(54, 'EBEJICO'),
(55, 'EL BAGRE'),
(56, 'EL PENOL'),
(57, 'EL RETIRO'),
(58, 'ENTRERRIOS'),
(59, 'ENVIGADO'),
(60, 'FREDONIA'),
(61, 'FRONTINO'),
(62, 'GIRALDO'),
(63, 'GIRARDOTA'),
(64, 'GOMEZ PLATA'),
(65, 'GRANADA'),
(66, 'GUADALUPE'),
(67, 'GUARNE'),
(68, 'GUATAQUE'),
(69, 'HELICONIA'),
(70, 'HISPANIA'),
(71, 'ITAGUI'),
(72, 'ITUANGO'),
(73, 'JARDIN'),
(74, 'JERICO'),
(75, 'LA CEJA'),
(76, 'LA ESTRELLA'),
(77, 'LA PINTADA'),
(78, 'LA UNION'),
(79, 'LIBORINA'),
(80, 'MACEO'),
(81, 'MARINILLA'),
(82, 'MEDELLIN'),
(83, 'MONTEBELLO'),
(84, 'MURINDO'),
(85, 'MUTATA'),
(86, 'NARINO'),
(87, 'NECHI'),
(88, 'NECOCLI'),
(89, 'OLAYA'),
(90, 'PEQUE'),
(91, 'PUEBLORRICO'),
(92, 'PUERTO BERRIO'),
(93, 'PUERTO NARE'),
(94, 'PUERTO TRIUNFO'),
(95, 'REMEDIOS'),
(96, 'RIONEGRO'),
(97, 'SABANALARGA'),
(98, 'SABANETA'),
(99, 'SALGAR'),
(100, 'SAN ANDRES DE CUERQUIA'),
(101, 'SAN CARLOS'),
(102, 'SAN FRANCISCO'),
(103, 'SAN JERONIMO'),
(104, 'SAN JOSE DE LA MONTAÑA'),
(105, 'SAN JUAN DE URABA'),
(106, 'SAN LUIS'),
(107, 'SAN PEDRO DE LOS MILAGROS'),
(108, 'SAN PEDRO DE URABA'),
(109, 'SAN RAFAEL'),
(110, 'SAN ROQUE'),
(111, 'SAN VICENTE'),
(112, 'SANTA BARBARA'),
(113, 'SANTA ROSA DE OSOS'),
(114, 'SANTO DOMINGO'),
(115, 'SANTUARIO'),
(116, 'SEGOVIA'),
(117, 'SONSON'),
(118, 'SOPETRAN'),
(119, 'TAMESIS'),
(120, 'TARAZA'),
(121, 'TARSO'),
(122, 'TITIRIBI'),
(123, 'TOLEDO'),
(124, 'TURBO'),
(125, 'URAMITA'),
(126, 'URRAO'),
(127, 'VALDIVIA'),
(128, 'VALPARAISO'),
(129, 'VEGACHI'),
(130, 'VENECIA'),
(131, 'VIGIA DEL FUERTE'),
(132, 'YALI'),
(133, 'YARUMAL'),
(134, 'YOLOMBO'),
(135, 'YONDO'),
(136, 'ZARAGOZA'),
(137, 'ARAUCA'),
(138, 'ARAUQUITA'),
(139, 'CRAVO NORTE'),
(140, 'FORTUL'),
(141, 'PUERTO RONDON'),
(142, 'SARAVENA'),
(143, 'TAME'),
(144, 'BARANOA'),
(145, 'BARRANQUILLA'),
(146, 'CAMPO DE LA CRUZ'),
(147, 'CANDELARIA'),
(148, 'GALAPA'),
(149, 'JUAN DE ACOSTA'),
(150, 'LURUACO'),
(151, 'MALAMBO'),
(152, 'MANATI'),
(153, 'PALMAR DE VARELA'),
(154, 'PIOJO'),
(155, 'POLO NUEVO'),
(156, 'PONEDERA'),
(157, 'PUERTO COLOMBIA'),
(158, 'REPELON'),
(159, 'SABANAGRANDE'),
(160, 'SABANALARGA'),
(161, 'SANTA LUCIA'),
(162, 'SANTO TOMAS'),
(163, 'SOLEDAD'),
(164, 'SUAN'),
(165, 'TUBARA'),
(166, 'USIACURI'),
(167, 'ACHI'),
(168, 'ALTOS DEL ROSARIO'),
(169, 'ARENAL'),
(170, 'ARJONA'),
(171, 'ARROYOHONDO'),
(172, 'BARRANCO DE LOBA'),
(173, 'BRAZUELO DE PAPAYAL'),
(174, 'CALAMAR'),
(175, 'CANTAGALLO'),
(176, 'CARTAGENA DE INDIAS'),
(177, 'CICUCO'),
(178, 'CLEMENCIA'),
(179, 'CORDOBA'),
(180, 'EL CARMEN DE BOLIVAR'),
(181, 'EL GUAMO'),
(182, 'EL PENION'),
(183, 'HATILLO DE LOBA'),
(184, 'MAGANGUE'),
(185, 'MAHATES'),
(186, 'MARGARITA'),
(187, 'MARIA LA BAJA'),
(188, 'MONTECRISTO'),
(189, 'MORALES'),
(190, 'MORALES'),
(191, 'NOROSI'),
(192, 'PINILLOS'),
(193, 'REGIDOR'),
(194, 'RIO VIEJO'),
(195, 'SAN CRISTOBAL'),
(196, 'SAN ESTANISLAO'),
(197, 'SAN FERNANDO'),
(198, 'SAN JACINTO'),
(199, 'SAN JACINTO DEL CAUCA'),
(200, 'SAN JUAN DE NEPOMUCENO'),
(201, 'SAN MARTIN DE LOBA'),
(202, 'SAN PABLO'),
(203, 'SAN PABLO NORTE'),
(204, 'SANTA CATALINA'),
(205, 'SANTA CRUZ DE MOMPOX'),
(206, 'SANTA ROSA'),
(207, 'SANTA ROSA DEL SUR'),
(208, 'SIMITI'),
(209, 'SOPLAVIENTO'),
(210, 'TALAIGUA NUEVO'),
(211, 'TUQUISIO'),
(212, 'TURBACO'),
(213, 'TURBANA'),
(214, 'VILLANUEVA'),
(215, 'ZAMBRANO'),
(216, 'AQUITANIA'),
(217, 'ARCABUCO'),
(218, 'BELÉN'),
(219, 'BERBEO'),
(220, 'BETÉITIVA'),
(221, 'BOAVITA'),
(222, 'BOYACÃ'),
(223, 'BRICEÑO'),
(224, 'BUENAVISTA'),
(225, 'BUSBANZÁ'),
(226, 'CALDAS'),
(227, 'CAMPO HERMOSO'),
(228, 'CERINZA'),
(229, 'CHINAVITA'),
(230, 'CHIQUINQUIRÁ'),
(231, 'CHÍQUIZA'),
(232, 'CHISCAS'),
(233, 'CHITA'),
(234, 'CHITARAQUE'),
(235, 'CHIVATÁ'),
(236, 'CIÉNEGA'),
(237, 'CÓMBITA'),
(238, 'COPER'),
(239, 'CORRALES'),
(240, 'COVARACHÍA'),
(241, 'CUBARA'),
(242, 'CUCAITA'),
(243, 'CUITIVA'),
(244, 'DUITAMA'),
(245, 'EL COCUY'),
(246, 'EL ESPINO'),
(247, 'FIRAVITOBA'),
(248, 'FLORESTA'),
(249, 'GACHANTIVÁ'),
(250, 'GÁMEZA'),
(251, 'GARAGOA'),
(252, 'GUACAMAYAS'),
(253, 'GÜICÁN'),
(254, 'IZA'),
(255, 'JENESANO'),
(256, 'JERICÓ'),
(257, 'LA UVITA'),
(258, 'LA VICTORIA'),
(259, 'LABRANZA GRANDE'),
(260, 'MACANAL'),
(261, 'MARIPÍ'),
(262, 'MIRAFLORES'),
(263, 'MONGUA'),
(264, 'MONGUÍ'),
(265, 'MONIQUIRÁ'),
(266, 'MOTAVITA'),
(267, 'MUZO'),
(268, 'NOBSA'),
(269, 'NUEVO COLÓN'),
(270, 'OICATÁ'),
(271, 'OTANCHE'),
(272, 'PACHAVITA'),
(273, 'PÁEZ'),
(274, 'PAIPA'),
(275, 'PAJARITO'),
(276, 'PANQUEBA'),
(277, 'PAUNA'),
(278, 'PAYA'),
(279, 'PAZ DE RÍO'),
(280, 'PESCA'),
(281, 'PISBA'),
(282, 'PUERTO BOYACA'),
(283, 'QUÍPAMA'),
(284, 'RAMIRIQUÍ'),
(285, 'RÁQUIRA'),
(286, 'RONDÓN'),
(287, 'SABOYÁ'),
(288, 'SÁCHICA'),
(289, 'SAMACÁ'),
(290, 'SAN EDUARDO'),
(291, 'SAN JOSÃ‰ DE PARE'),
(292, 'SAN LUÃS DE GACENO'),
(293, 'SAN MATEO'),
(294, 'SAN MIGUEL DE SEMA'),
(295, 'SAN PABLO DE BORBUR'),
(296, 'SANTA MARÍA'),
(297, 'SANTA ROSA DE VITERBO'),
(298, 'SANTA SOFÍA'),
(299, 'SANTANA'),
(300, 'SATIVANORTE'),
(301, 'SATIVASUR'),
(302, 'SIACHOQUE'),
(303, 'SOATÁ'),
(304, 'SOCHA'),
(305, 'SOCOTÁ'),
(306, 'SOGAMOSO'),
(307, 'SORA'),
(308, 'SORACÁ'),
(309, 'SOTAQUIRÁ'),
(310, 'SUSACÓN'),
(311, 'SUTARMACHÁN'),
(312, 'TASCO'),
(313, 'TIBANÁ'),
(314, 'TIBASOSA'),
(315, 'TINJACÁ'),
(316, 'TIPACOQUE'),
(317, 'TOCA'),
(318, 'TOGÜÍ'),
(319, 'TÓPAGA'),
(320, 'TOTA'),
(321, 'TUNJA'),
(322, 'TUNUNGUÁ'),
(323, 'TURMEQUÉ'),
(324, 'TUTA'),
(325, 'TUTAZÁ'),
(326, 'UMBITA'),
(327, 'VENTA QUEMADA'),
(328, 'VILLA DE LEYVA'),
(329, 'VIRACACHÁ'),
(330, 'ZETAQUIRA'),
(331, 'AGUADAS'),
(332, 'ANSERMA'),
(333, 'ARANZAZU'),
(334, 'BELALCAZAR'),
(335, 'CHINCHINÁ'),
(336, 'FILADELFIA'),
(337, 'LA DORADA'),
(338, 'LA MERCED'),
(339, 'MANIZALES'),
(340, 'MANZANARES'),
(341, 'MARMATO'),
(342, 'MARQUETALIA'),
(343, 'MARULANDA'),
(344, 'NEIRA'),
(345, 'NORCASIA'),
(346, 'PACORA'),
(347, 'PALESTINA'),
(348, 'PENSILVANIA'),
(349, 'RIOSUCIO'),
(350, 'RISARALDA'),
(351, 'SALAMINA'),
(352, 'SAMANA'),
(353, 'SAN JOSE'),
(354, 'SUPÍA'),
(355, 'VICTORIA'),
(356, 'VILLAMARÍA'),
(357, 'VITERBO'),
(358, 'ALBANIA'),
(359, 'BELÉN ANDAQUIES'),
(360, 'CARTAGENA DEL CHAIRA'),
(361, 'CURILLO'),
(362, 'EL DONCELLO'),
(363, 'EL PAUJIL'),
(364, 'FLORENCIA'),
(365, 'LA MONTAÑITA'),
(366, 'MILÁN'),
(367, 'MORELIA'),
(368, 'PUERTO RICO'),
(369, 'SAN  VICENTE DEL CAGUAN'),
(370, 'SAN JOSÃ‰ DE FRAGUA'),
(371, 'SOLANO'),
(372, 'SOLITA'),
(373, 'VALPARAÍSO'),
(374, 'AGUAZUL'),
(375, 'CHAMEZA'),
(376, 'HATO COROZAL'),
(377, 'LA SALINA'),
(378, 'MANÍ'),
(379, 'MONTERREY'),
(380, 'NUNCHIA'),
(381, 'OROCUE'),
(382, 'PAZ DE ARIPORO'),
(383, 'PORE'),
(384, 'RECETOR'),
(385, 'SABANA LARGA'),
(386, 'SACAMA'),
(387, 'SAN LUIS DE PALENQUE'),
(388, 'TAMARA'),
(389, 'TAURAMENA'),
(390, 'TRINIDAD'),
(391, 'VILLANUEVA'),
(392, 'YOPAL'),
(393, 'ALMAGUER'),
(394, 'ARGELIA'),
(395, 'BALBOA'),
(396, 'BOLÍVAR'),
(397, 'BUENOS AIRES'),
(398, 'CAJIBIO'),
(399, 'CALDONO'),
(400, 'CALOTO'),
(401, 'CORINTO'),
(402, 'EL TAMBO'),
(403, 'FLORENCIA'),
(404, 'GUAPI'),
(405, 'INZA'),
(406, 'JAMBALÓ'),
(407, 'LA SIERRA'),
(408, 'LA VEGA'),
(409, 'LÓPEZ'),
(410, 'MERCADERES'),
(411, 'MIRANDA'),
(412, 'MORALES'),
(413, 'PADILLA'),
(414, 'PÁEZ'),
(415, 'PATIA (EL BORDO)'),
(416, 'PIAMONTE'),
(417, 'PIENDAMO'),
(418, 'POPAYÁN'),
(419, 'PUERTO TEJADA'),
(420, 'PURACE'),
(421, 'ROSAS'),
(422, 'SAN SEBASTIÁN'),
(423, 'SANTA ROSA'),
(424, 'SANTANDER DE QUILICHAO'),
(425, 'SILVIA'),
(426, 'SOTARA'),
(427, 'SUÁREZ'),
(428, 'SUCRE'),
(429, 'TIMBÍO'),
(430, 'TIMBIQUÍ'),
(431, 'TORIBIO'),
(432, 'TOTORO'),
(433, 'VILLA RICA'),
(434, 'AGUACHICA'),
(435, 'AGUSTÃ“N CODAZZI'),
(436, 'ASTREA'),
(437, 'BECERRIL'),
(438, 'BOSCONIA'),
(439, 'CHIMICHAGUA'),
(440, 'CHIRIGUANÁ'),
(441, 'CURUMANÍ'),
(442, 'EL COPEY'),
(443, 'EL PASO'),
(444, 'GAMARRA'),
(445, 'GONZÁLEZ'),
(446, 'LA GLORIA'),
(447, 'LA JAGUA IBIRICO'),
(448, 'MANAURE BALCÓN DEL CESAR'),
(449, 'PAILITAS'),
(450, 'PELAYA'),
(451, 'PUEBLO BELLO'),
(452, 'RÍO DE ORO'),
(453, 'ROBLES (LA PAZ)'),
(454, 'SAN ALBERTO'),
(455, 'SAN DIEGO'),
(456, 'SAN MARTÃN'),
(457, 'TAMALAMEQUE'),
(458, 'VALLEDUPAR'),
(459, 'ACANDI'),
(460, 'ALTO BAUDO (PIE DE PATO)'),
(461, 'ATRATO'),
(462, 'BAGADO'),
(463, 'BAHIA SOLANO (MUTIS)'),
(464, 'BAJO BAUDO (PIZARRO)'),
(465, 'BOJAYA (BELLAVISTA)'),
(466, 'CANTON DE SAN PABLO'),
(467, 'CARMEN DEL DARIEN'),
(468, 'CERTEGUI'),
(469, 'CONDOTO'),
(470, 'EL CARMEN'),
(471, 'ISTMINA'),
(472, 'JURADO'),
(473, 'LITORAL DEL SAN JUAN'),
(474, 'LLORO'),
(475, 'MEDIO ATRATO'),
(476, 'MEDIO BAUDO (BOCA DE PEPE)'),
(477, 'MEDIO SAN JUAN'),
(478, 'NOVITA'),
(479, 'NUQUI'),
(480, 'QUIBDO'),
(481, 'RIO IRO'),
(482, 'RIO QUITO'),
(483, 'RIOSUCIO'),
(484, 'SAN JOSE DEL PALMAR'),
(485, 'SIPI'),
(486, 'TADO'),
(487, 'UNGUIA'),
(488, 'UNIÓN PANAMERICANA'),
(489, 'AYAPEL'),
(490, 'BUENAVISTA'),
(491, 'CANALETE'),
(492, 'CERETÉ'),
(493, 'CHIMA'),
(494, 'CHINÚ'),
(495, 'CIENAGA DE ORO'),
(496, 'COTORRA'),
(497, 'LA APARTADA'),
(498, 'LORICA'),
(499, 'LOS CÓRDOBAS'),
(500, 'MOMIL'),
(501, 'MONTELÍBANO'),
(502, 'MONTERÍA'),
(503, 'MOÑITOS'),
(504, 'PLANETA RICA'),
(505, 'PUEBLO NUEVO'),
(506, 'PUERTO ESCONDIDO'),
(507, 'PUERTO LIBERTADOR'),
(508, 'PURÍSIMA'),
(509, 'SAHAGÚN'),
(510, 'SAN ANDRÉS SOTAVENTO'),
(511, 'SAN ANTERO'),
(512, 'SAN BERNARDO VIENTO'),
(513, 'SAN CARLOS'),
(514, 'SAN PELAYO'),
(515, 'TIERRALTA'),
(516, 'VALENCIA'),
(517, 'AGUA DE DIOS'),
(518, 'ALBAN'),
(519, 'ANAPOIMA'),
(520, 'ANOLAIMA'),
(521, 'ARBELAEZ'),
(522, 'BELTRÁN'),
(523, 'BITUIMA'),
(524, 'BOGOTÃ DC'),
(525, 'BOJACÁ'),
(526, 'CABRERA'),
(527, 'CACHIPAY'),
(528, 'CAJICÁ'),
(529, 'CAPARRAPÍ'),
(530, 'CAQUEZA'),
(531, 'CARMEN DE CARUPA'),
(532, 'CHAGUANÍ'),
(533, 'CHIA'),
(534, 'CHIPAQUE'),
(535, 'CHOACHÍ'),
(536, 'CHOCONTÁ'),
(537, 'COGUA'),
(538, 'COTA'),
(539, 'CUCUNUBÁ'),
(540, 'EL COLEGIO'),
(541, 'EL PEÑÓN'),
(542, 'EL ROSAL1'),
(543, 'FACATATIVA'),
(544, 'FÓMEQUE'),
(545, 'FOSCA'),
(546, 'FUNZA'),
(547, 'FÚQUENE'),
(548, 'FUSAGASUGA'),
(549, 'GACHALÁ'),
(550, 'GACHANCIPÁ'),
(551, 'GACHETA'),
(552, 'GAMA'),
(553, 'GIRARDOT'),
(554, 'GRANADA2'),
(555, 'GUACHETÁ'),
(556, 'GUADUAS'),
(557, 'GUASCA'),
(558, 'GUATAQUÍ'),
(559, 'GUATAVITA'),
(560, 'GUAYABAL DE SIQUIMA'),
(561, 'GUAYABETAL'),
(562, 'GUTIÉRREZ'),
(563, 'JERUSALÉN'),
(564, 'JUNÍN'),
(565, 'LA CALERA'),
(566, 'LA MESA'),
(567, 'LA PALMA'),
(568, 'LA PEÑA'),
(569, 'LA VEGA'),
(570, 'LENGUAZAQUE'),
(571, 'MACHETÁ'),
(572, 'MADRID'),
(573, 'MANTA'),
(574, 'MEDINA'),
(575, 'MOSQUERA'),
(576, 'NARIÑO'),
(577, 'NEMOCÓN'),
(578, 'NILO'),
(579, 'NIMAIMA'),
(580, 'NOCAIMA'),
(581, 'OSPINA PÉREZ'),
(582, 'PACHO'),
(583, 'PAIME'),
(584, 'PANDI'),
(585, 'PARATEBUENO'),
(586, 'PASCA'),
(587, 'PUERTO SALGAR'),
(588, 'PULÍ'),
(589, 'QUEBRADANEGRA'),
(590, 'QUETAME'),
(591, 'QUIPILE'),
(592, 'RAFAEL REYES'),
(593, 'RICAURTE'),
(594, 'SAN  ANTONIO DEL  TEQUENDAMA'),
(595, 'SAN BERNARDO'),
(596, 'SAN CAYETANO'),
(597, 'SAN FRANCISCO'),
(598, 'SAN JUAN DE RIOSECO'),
(599, 'SASAIMA'),
(600, 'SESQUILÉ'),
(601, 'SIBATÉ'),
(602, 'SILVANIA'),
(603, 'SIMIJACA'),
(604, 'SOACHA'),
(605, 'SOPO'),
(606, 'SUBACHOQUE'),
(607, 'SUESCA'),
(608, 'SUPATÁ'),
(609, 'SUSA'),
(610, 'SUTATAUSA'),
(611, 'TABIO'),
(612, 'TAUSA'),
(613, 'TENA'),
(614, 'TENJO'),
(615, 'TIBACUY'),
(616, 'TIBIRITA'),
(617, 'TOCAIMA'),
(618, 'TOCANCIPÁ'),
(619, 'TOPAIPÍ'),
(620, 'UBALÁ'),
(621, 'UBAQUE'),
(622, 'UBATÉ'),
(623, 'UNE'),
(624, 'UTICA'),
(625, 'VERGARA'),
(626, 'VIANI'),
(627, 'VILLA GOMEZ'),
(628, 'VILLA PINZÓN'),
(629, 'VILLETA'),
(630, 'VIOTA'),
(631, 'YACOPÍ'),
(632, 'ZIPACÓN'),
(633, 'ZIPAQUIRÁ'),
(634, 'BARRANCO MINAS'),
(635, 'CACAHUAL'),
(636, 'INÍRIDA'),
(637, 'LA GUADALUPE'),
(638, 'MAPIRIPANA'),
(639, 'MORICHAL'),
(640, 'PANA PANA'),
(641, 'PUERTO COLOMBIA'),
(642, 'SAN FELIPE'),
(643, 'CALAMAR'),
(644, 'EL RETORNO'),
(645, 'MIRAFLOREZ'),
(646, 'SAN JOSÃ‰ DEL GUAVIARE'),
(647, 'ACEVEDO'),
(648, 'AGRADO'),
(649, 'AIPE'),
(650, 'ALGECIRAS'),
(651, 'ALTAMIRA'),
(652, 'BARAYA'),
(653, 'CAMPO ALEGRE'),
(654, 'COLOMBIA'),
(655, 'ELIAS'),
(656, 'GARZÓN'),
(657, 'GIGANTE'),
(658, 'GUADALUPE'),
(659, 'HOBO'),
(660, 'IQUIRA'),
(661, 'ISNOS'),
(662, 'LA ARGENTINA'),
(663, 'LA PLATA'),
(664, 'NATAGA'),
(665, 'NEIVA'),
(666, 'OPORAPA'),
(667, 'PAICOL'),
(668, 'PALERMO'),
(669, 'PALESTINA'),
(670, 'PITAL'),
(671, 'PITALITO'),
(672, 'RIVERA'),
(673, 'SALADO BLANCO'),
(674, 'SAN AGUSTÍN'),
(675, 'SANTA MARIA'),
(676, 'SUAZA'),
(677, 'TARQUI'),
(678, 'TELLO'),
(679, 'TERUEL'),
(680, 'TESALIA'),
(681, 'TIMANA'),
(682, 'VILLAVIEJA'),
(683, 'YAGUARA'),
(684, 'ALBANIA'),
(685, 'BARRANCAS'),
(686, 'DIBULLA'),
(687, 'DISTRACCIÓN'),
(688, 'EL MOLINO'),
(689, 'FONSECA'),
(690, 'HATO NUEVO'),
(691, 'LA JAGUA DEL PILAR'),
(692, 'MAICAO'),
(693, 'MANAURE'),
(694, 'RIOHACHA'),
(695, 'SAN JUAN DEL CESAR'),
(696, 'URIBIA'),
(697, 'URUMITA'),
(698, 'VILLANUEVA'),
(699, 'ALGARROBO'),
(700, 'ARACATACA'),
(701, 'ARIGUANI'),
(702, 'CERRO SAN ANTONIO'),
(703, 'CHIVOLO'),
(704, 'CIENAGA'),
(705, 'CONCORDIA'),
(706, 'EL BANCO'),
(707, 'EL PIÑON'),
(708, 'EL RETEN'),
(709, 'FUNDACION'),
(710, 'GUAMAL'),
(711, 'NUEVA GRANADA'),
(712, 'PEDRAZA'),
(713, 'PIJIÑO DEL CARMEN'),
(714, 'PIVIJAY'),
(715, 'PLATO'),
(716, 'PUEBLO VIEJO'),
(717, 'REMOLINO'),
(718, 'SABANAS DE SAN ANGEL'),
(719, 'SALAMINA'),
(720, 'SAN SEBASTIAN DE BUENAVISTA'),
(721, 'SAN ZENON'),
(722, 'SANTA ANA'),
(723, 'SANTA BARBARA DE PINTO'),
(724, 'SANTA MARTA'),
(725, 'SITIONUEVO'),
(726, 'TENERIFE'),
(727, 'ZAPAYAN'),
(728, 'ZONA BANANERA'),
(729, 'ACACIAS'),
(730, 'BARRANCA DE UPIA'),
(731, 'CABUYARO'),
(732, 'CASTILLA LA NUEVA'),
(733, 'CUBARRAL'),
(734, 'CUMARAL'),
(735, 'EL CALVARIO'),
(736, 'EL CASTILLO'),
(737, 'EL DORADO'),
(738, 'FUENTE DE ORO'),
(739, 'GRANADA'),
(740, 'GUAMAL'),
(741, 'LA MACARENA'),
(742, 'LA URIBE'),
(743, 'LEJANÍAS'),
(744, 'MAPIRIPÁN'),
(745, 'MESETAS'),
(746, 'PUERTO CONCORDIA'),
(747, 'PUERTO GAITÁN'),
(748, 'PUERTO LLERAS'),
(749, 'PUERTO LÓPEZ'),
(750, 'PUERTO RICO'),
(751, 'RESTREPO'),
(752, 'SAN  JUAN DE ARAMA'),
(753, 'SAN CARLOS GUAROA'),
(754, 'SAN JUANITO'),
(755, 'SAN MARTÍN'),
(756, 'VILLAVICENCIO'),
(757, 'VISTA HERMOSA'),
(758, 'ALBAN'),
(759, 'ALDAÑA'),
(760, 'ANCUYA'),
(761, 'ARBOLEDA'),
(762, 'BARBACOAS'),
(763, 'BELEN'),
(764, 'BUESACO'),
(765, 'CHACHAGUI'),
(766, 'COLON (GENOVA)'),
(767, 'CONSACA'),
(768, 'CONTADERO'),
(769, 'CORDOBA'),
(770, 'CUASPUD'),
(771, 'CUMBAL'),
(772, 'CUMBITARA'),
(773, 'EL CHARCO'),
(774, 'EL PEÑOL'),
(775, 'EL ROSARIO'),
(776, 'EL TABLÓN'),
(777, 'EL TAMBO'),
(778, 'FUNES'),
(779, 'GUACHUCAL'),
(780, 'GUAITARILLA'),
(781, 'GUALMATAN'),
(782, 'ILES'),
(783, 'IMUES'),
(784, 'IPIALES'),
(785, 'LA CRUZ'),
(786, 'LA FLORIDA'),
(787, 'LA LLANADA'),
(788, 'LA TOLA'),
(789, 'LA UNION'),
(790, 'LEIVA'),
(791, 'LINARES'),
(792, 'LOS ANDES'),
(793, 'MAGUI'),
(794, 'MALLAMA'),
(795, 'MOSQUEZA'),
(796, 'NARIÑO'),
(797, 'OLAYA HERRERA'),
(798, 'OSPINA'),
(799, 'PASTO'),
(800, 'PIZARRO'),
(801, 'POLICARPA'),
(802, 'POTOSI'),
(803, 'PROVIDENCIA'),
(804, 'PUERRES'),
(805, 'PUPIALES'),
(806, 'RICAURTE'),
(807, 'ROBERTO PAYAN'),
(808, 'SAMANIEGO'),
(809, 'SAN BERNARDO'),
(810, 'SAN LORENZO'),
(811, 'SAN PABLO'),
(812, 'SAN PEDRO DE CARTAGO'),
(813, 'SANDONA'),
(814, 'SANTA BARBARA'),
(815, 'SANTACRUZ'),
(816, 'SAPUYES'),
(817, 'TAMINANGO'),
(818, 'TANGUA'),
(819, 'TUMACO'),
(820, 'TUQUERRES'),
(821, 'YACUANQUER'),
(822, 'ABREGO'),
(823, 'ARBOLEDAS'),
(824, 'BOCHALEMA'),
(825, 'BUCARASICA'),
(826, 'CÁCHIRA'),
(827, 'CÁCOTA'),
(828, 'CHINÁCOTA'),
(829, 'CHITAGÁ'),
(830, 'CONVENCIÓN'),
(831, 'CUCUTA'),
(832, 'CUCUTILLA'),
(833, 'DURANIA'),
(834, 'EL CARMEN'),
(835, 'EL TARRA'),
(836, 'EL ZULIA'),
(837, 'GRAMALOTE'),
(838, 'HACARI'),
(839, 'HERRÁN'),
(840, 'LA ESPERANZA'),
(841, 'LA PLAYA'),
(842, 'LABATECA'),
(843, 'LOS PATIOS'),
(844, 'LOURDES'),
(845, 'MUTISCUA'),
(846, 'OCAÑA'),
(847, 'PAMPLONA'),
(848, 'PAMPLONITA'),
(849, 'PUERTO SANTANDER'),
(850, 'RAGONVALIA'),
(851, 'SALAZAR'),
(852, 'SAN CALIXTO'),
(853, 'SAN CAYETANO'),
(854, 'SANTIAGO'),
(855, 'SARDINATA'),
(856, 'SILOS'),
(857, 'TEORAMA'),
(858, 'TIBÚ'),
(859, 'TOLEDO'),
(860, 'VILLA CARO'),
(861, 'VILLA DEL ROSARIO'),
(862, 'COLÓN'),
(863, 'MOCOA'),
(864, 'ORITO'),
(865, 'PUERTO ASÍS'),
(866, 'PUERTO CAYCEDO'),
(867, 'PUERTO GUZMÁN'),
(868, 'PUERTO LEGUÍZAMO'),
(869, 'SAN FRANCISCO'),
(870, 'SAN MIGUEL'),
(871, 'SANTIAGO'),
(872, 'SIBUNDOY'),
(873, 'VALLE DEL GUAMUEZ'),
(874, 'VILLAGARZÓN'),
(875, 'ARMENIA'),
(876, 'BUENAVISTA'),
(877, 'CALARCÁ'),
(878, 'CIRCASIA'),
(879, 'CÓRDOBA'),
(880, 'FILANDIA'),
(881, 'GÉNOVA'),
(882, 'LA TEBAIDA'),
(883, 'MONTENEGRO'),
(884, 'PIJAO'),
(885, 'QUIMBAYA'),
(886, 'SALENTO'),
(887, 'APIA'),
(888, 'BALBOA'),
(889, 'BELÉN DE UMBRÍA'),
(890, 'DOS QUEBRADAS'),
(891, 'GUATICA'),
(892, 'LA CELIA'),
(893, 'LA VIRGINIA'),
(894, 'MARSELLA'),
(895, 'MISTRATO'),
(896, 'PEREIRA'),
(897, 'PUEBLO RICO'),
(898, 'QUINCHÍA'),
(899, 'SANTA ROSA DE CABAL'),
(900, 'SANTUARIO'),
(901, 'PROVIDENCIA'),
(902, 'SAN ANDRES'),
(903, 'SANTA CATALINA'),
(904, 'AGUADA'),
(905, 'ALBANIA'),
(906, 'ARATOCA'),
(907, 'BARBOSA'),
(908, 'BARICHARA'),
(909, 'BARRANCABERMEJA'),
(910, 'BETULIA'),
(911, 'BOLÍVAR'),
(912, 'BUCARAMANGA'),
(913, 'CABRERA'),
(914, 'CALIFORNIA'),
(915, 'CAPITANEJO'),
(916, 'CARCASI'),
(917, 'CEPITA'),
(918, 'CERRITO'),
(919, 'CHARALÁ'),
(920, 'CHARTA'),
(921, 'CHIMA'),
(922, 'CHIPATÁ'),
(923, 'CIMITARRA'),
(924, 'CONCEPCIÓN'),
(925, 'CONFINES'),
(926, 'CONTRATACIÓN'),
(927, 'COROMORO'),
(928, 'CURITÍ'),
(929, 'EL CARMEN'),
(930, 'EL GUACAMAYO'),
(931, 'EL PEÑÓN'),
(932, 'EL PLAYÓN'),
(933, 'ENCINO'),
(934, 'ENCISO'),
(935, 'FLORIÁN'),
(936, 'FLORIDABLANCA'),
(937, 'GALÁN'),
(938, 'GAMBITA'),
(939, 'GIRÓN'),
(940, 'GUACA'),
(941, 'GUADALUPE'),
(942, 'GUAPOTA'),
(943, 'GUAVATÁ'),
(944, 'GUEPSA'),
(945, 'HATO'),
(946, 'JESÚS MARIA'),
(947, 'JORDÁN'),
(948, 'LA BELLEZA'),
(949, 'LA PAZ'),
(950, 'LANDAZURI'),
(951, 'LEBRIJA'),
(952, 'LOS SANTOS'),
(953, 'MACARAVITA'),
(954, 'MÁLAGA'),
(955, 'MATANZA'),
(956, 'MOGOTES'),
(957, 'MOLAGAVITA'),
(958, 'OCAMONTE'),
(959, 'OIBA'),
(960, 'ONZAGA'),
(961, 'PALMAR'),
(962, 'PALMAS DEL SOCORRO'),
(963, 'PÁRAMO'),
(964, 'PIEDECUESTA'),
(965, 'PINCHOTE'),
(966, 'PUENTE NACIONAL'),
(967, 'PUERTO PARRA'),
(968, 'PUERTO WILCHES'),
(969, 'RIONEGRO'),
(970, 'SABANA DE TORRES'),
(971, 'SAN ANDRÉS'),
(972, 'SAN BENITO'),
(973, 'SAN GIL'),
(974, 'SAN JOAQUÃN'),
(975, 'SAN JOSÃ‹ DE MIRANDA'),
(976, 'SAN MIGUEL'),
(977, 'SAN VICENTE DE CHUCURÍ'),
(978, 'SANTA BÁRBARA'),
(979, 'SANTA HELENA'),
(980, 'SIMACOTA'),
(981, 'SOCORRO'),
(982, 'SUAITA'),
(983, 'SUCRE'),
(984, 'SURATA'),
(985, 'TONA'),
(986, 'VALLE SAN JOSÉ'),
(987, 'VÉLEZ'),
(988, 'VETAS'),
(989, 'VILLANUEVA'),
(990, 'ZAPATOCA'),
(991, 'BUENAVISTA'),
(992, 'CAIMITO'),
(993, 'CHALÁN'),
(994, 'COLOSO'),
(995, 'COROZAL'),
(996, 'EL ROBLE'),
(997, 'GALERAS'),
(998, 'GUARANDA'),
(999, 'LA UNIÓN'),
(1000, 'LOS PALMITOS'),
(1001, 'MAJAGUAL'),
(1002, 'MORROA'),
(1003, 'OVEJAS'),
(1004, 'PALMITO'),
(1005, 'SAMPUES'),
(1006, 'SAN BENITO ABAD'),
(1007, 'SAN JUAN DE BETULIA'),
(1008, 'SAN MARCOS'),
(1009, 'SAN ONOFRE'),
(1010, 'SAN PEDRO'),
(1011, 'SINCÉ'),
(1012, 'SINCELEJO'),
(1013, 'SUCRE'),
(1014, 'TOLÚ'),
(1015, 'TOLUVIEJO'),
(1016, 'ALPUJARRA'),
(1017, 'ALVARADO'),
(1018, 'AMBALEMA'),
(1019, 'ANZOATEGUI'),
(1020, 'ARMERO (GUAYABAL)'),
(1021, 'ATACO'),
(1022, 'CAJAMARCA'),
(1023, 'CARMEN DE APICALÁ'),
(1024, 'CASABIANCA'),
(1025, 'CHAPARRAL'),
(1026, 'COELLO'),
(1027, 'COYAIMA'),
(1028, 'CUNDAY'),
(1029, 'DOLORES'),
(1030, 'ESPINAL'),
(1031, 'FALÁN'),
(1032, 'FLANDES'),
(1033, 'FRESNO'),
(1034, 'GUAMO'),
(1035, 'HERVEO'),
(1036, 'HONDA'),
(1037, 'IBAGUÉ'),
(1038, 'ICONONZO'),
(1039, 'LÉRIDA'),
(1040, 'LÍBANO'),
(1041, 'MARIQUITA'),
(1042, 'MELGAR'),
(1043, 'MURILLO'),
(1044, 'NATAGAIMA'),
(1045, 'ORTEGA'),
(1046, 'PALOCABILDO'),
(1047, 'PIEDRAS PLANADAS'),
(1048, 'PRADO'),
(1049, 'PURIFICACIÓN'),
(1050, 'RIOBLANCO'),
(1051, 'RONCESVALLES'),
(1052, 'ROVIRA'),
(1053, 'SALDAÑA'),
(1054, 'SAN ANTONIO'),
(1055, 'SAN LUIS'),
(1056, 'SANTA ISABEL'),
(1057, 'SUÁREZ'),
(1058, 'VALLE DE SAN JUAN'),
(1059, 'VENADILLO'),
(1060, 'VILLAHERMOSA'),
(1061, 'VILLARRICA'),
(1062, 'ALCALÁ'),
(1063, 'ANDALUCÍA'),
(1064, 'ANSERMA NUEVO'),
(1065, 'ARGELIA'),
(1066, 'BOLÍVAR'),
(1067, 'BUENAVENTURA'),
(1068, 'BUGA'),
(1069, 'BUGALAGRANDE'),
(1070, 'CAICEDONIA'),
(1071, 'CALI'),
(1072, 'CALIMA (DARIEN)'),
(1073, 'CANDELARIA'),
(1074, 'CARTAGO'),
(1075, 'DAGUA'),
(1076, 'EL AGUILA'),
(1077, 'EL CAIRO'),
(1078, 'EL CERRITO'),
(1079, 'EL DOVIO'),
(1080, 'FLORIDA'),
(1081, 'GINEBRA GUACARI'),
(1082, 'JAMUNDÍ'),
(1083, 'LA CUMBRE'),
(1084, 'LA UNIÓN'),
(1085, 'LA VICTORIA'),
(1086, 'OBANDO'),
(1087, 'PALMIRA'),
(1088, 'PRADERA'),
(1089, 'RESTREPO'),
(1090, 'RIO FRÍO'),
(1091, 'ROLDANILLO'),
(1092, 'SAN PEDRO'),
(1093, 'SEVILLA'),
(1094, 'TORO'),
(1095, 'TRUJILLO'),
(1096, 'TULÚA'),
(1097, 'ULLOA'),
(1098, 'VERSALLES'),
(1099, 'VIJES'),
(1100, 'YOTOCO'),
(1101, 'YUMBO'),
(1102, 'ZARZAL'),
(1103, 'CARURÚ'),
(1104, 'MITÚ'),
(1105, 'PACOA'),
(1106, 'PAPUNAUA'),
(1107, 'TARAIRA'),
(1108, 'YAVARATÉ'),
(1109, 'CUMARIBO'),
(1110, 'LA PRIMAVERA'),
(1111, 'PUERTO CARREÑO'),
(1112, 'SANTA ROSALIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
`cod_p` int(11) NOT NULL,
  `nam_p` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cl_id` int(11) DEFAULT NULL,
  `tip_id` int(11) DEFAULT NULL,
  `mark_id` int(11) DEFAULT NULL,
  `precA_p` decimal(10,0) DEFAULT NULL,
  `precN_p` decimal(10,0) DEFAULT NULL,
  `cant_p` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `txt_p` text COLLATE utf8_spanish_ci NOT NULL,
  `fech_p` date DEFAULT NULL,
  `coleccion_Y` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estd_p` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`cod_p`, `nam_p`, `cl_id`, `tip_id`, `mark_id`, `precA_p`, `precN_p`, `cant_p`, `txt_p`, `fech_p`, `coleccion_Y`, `estd_p`) VALUES
(13, 'funcioneee', 1, 1, 7, '0', '250000', '125', '', '0000-00-00', '', '1'),
(14, 'producto2', 1, 4, NULL, '0', '1850000', '56', '', '0000-00-00', '', '1'),
(15, 'producto4', 2, 4, 7, '0', '145000', '12', '', '0000-00-00', '', '1'),
(17, 'pantalon', 3, 4, NULL, '300000', '150000', '45', '<p>descripcion</p>\r\n', '0000-00-00', '', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_t`
--

CREATE TABLE IF NOT EXISTS `p_t` (
`id_p_t` int(11) NOT NULL,
  `p_cod` int(11) DEFAULT NULL,
  `tll_id` int(11) DEFAULT NULL,
  `cant_p_t` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_dpt_muni`
--

CREATE TABLE IF NOT EXISTS `rel_dpt_muni` (
`id_rel_dpt_muni` int(11) NOT NULL,
  `depart_id` int(11) DEFAULT NULL,
  `muni_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1113 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rel_dpt_muni`
--

INSERT INTO `rel_dpt_muni` (`id_rel_dpt_muni`, `depart_id`, `muni_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 2, 12),
(13, 2, 13),
(14, 2, 14),
(15, 2, 15),
(16, 2, 16),
(17, 2, 17),
(18, 2, 18),
(19, 2, 19),
(20, 2, 20),
(21, 2, 21),
(22, 2, 22),
(23, 2, 23),
(24, 2, 24),
(25, 2, 25),
(26, 2, 26),
(27, 2, 27),
(28, 2, 28),
(29, 2, 29),
(30, 2, 30),
(31, 2, 31),
(32, 2, 32),
(33, 2, 33),
(34, 2, 34),
(35, 2, 35),
(36, 2, 36),
(37, 2, 37),
(38, 2, 38),
(39, 2, 39),
(40, 2, 40),
(41, 2, 41),
(42, 2, 42),
(43, 2, 43),
(44, 2, 44),
(45, 2, 45),
(46, 2, 46),
(47, 2, 47),
(48, 2, 48),
(49, 2, 49),
(50, 2, 50),
(51, 2, 51),
(52, 2, 52),
(53, 2, 53),
(54, 2, 54),
(55, 2, 55),
(56, 2, 56),
(57, 2, 57),
(58, 2, 58),
(59, 2, 59),
(60, 2, 60),
(61, 2, 61),
(62, 2, 62),
(63, 2, 63),
(64, 2, 64),
(65, 2, 65),
(66, 2, 66),
(67, 2, 67),
(68, 2, 68),
(69, 2, 69),
(70, 2, 70),
(71, 2, 71),
(72, 2, 72),
(73, 2, 73),
(74, 2, 74),
(75, 2, 75),
(76, 2, 76),
(77, 2, 77),
(78, 2, 78),
(79, 2, 79),
(80, 2, 80),
(81, 2, 81),
(82, 2, 82),
(83, 2, 83),
(84, 2, 84),
(85, 2, 85),
(86, 2, 86),
(87, 2, 87),
(88, 2, 88),
(89, 2, 89),
(90, 2, 90),
(91, 2, 91),
(92, 2, 92),
(93, 2, 93),
(94, 2, 94),
(95, 2, 95),
(96, 2, 96),
(97, 2, 97),
(98, 2, 98),
(99, 2, 99),
(100, 2, 100),
(101, 2, 101),
(102, 2, 102),
(103, 2, 103),
(104, 2, 104),
(105, 2, 105),
(106, 2, 106),
(107, 2, 107),
(108, 2, 108),
(109, 2, 109),
(110, 2, 110),
(111, 2, 111),
(112, 2, 112),
(113, 2, 113),
(114, 2, 114),
(115, 2, 115),
(116, 2, 116),
(117, 2, 117),
(118, 2, 118),
(119, 2, 119),
(120, 2, 120),
(121, 2, 121),
(122, 2, 122),
(123, 2, 123),
(124, 2, 124),
(125, 2, 125),
(126, 2, 126),
(127, 2, 127),
(128, 2, 128),
(129, 2, 129),
(130, 2, 130),
(131, 2, 131),
(132, 2, 132),
(133, 2, 133),
(134, 2, 134),
(135, 2, 135),
(136, 2, 136),
(137, 3, 137),
(138, 3, 138),
(139, 3, 139),
(140, 3, 140),
(141, 3, 141),
(142, 3, 142),
(143, 3, 143),
(144, 4, 144),
(145, 4, 145),
(146, 4, 146),
(147, 4, 147),
(148, 4, 148),
(149, 4, 149),
(150, 4, 150),
(151, 4, 151),
(152, 4, 152),
(153, 4, 153),
(154, 4, 154),
(155, 4, 155),
(156, 4, 156),
(157, 4, 157),
(158, 4, 158),
(159, 4, 159),
(160, 4, 160),
(161, 4, 161),
(162, 4, 162),
(163, 4, 163),
(164, 4, 164),
(165, 4, 165),
(166, 4, 166),
(167, 5, 167),
(168, 5, 168),
(169, 5, 169),
(170, 5, 170),
(171, 5, 171),
(172, 5, 172),
(173, 5, 173),
(174, 5, 174),
(175, 5, 175),
(176, 5, 176),
(177, 5, 177),
(178, 5, 178),
(179, 5, 179),
(180, 5, 180),
(181, 5, 181),
(182, 5, 182),
(183, 5, 183),
(184, 5, 184),
(185, 5, 185),
(186, 5, 186),
(187, 5, 187),
(188, 5, 188),
(189, 5, 189),
(190, 5, 190),
(191, 5, 191),
(192, 5, 192),
(193, 5, 193),
(194, 5, 194),
(195, 5, 195),
(196, 5, 196),
(197, 5, 197),
(198, 5, 198),
(199, 5, 199),
(200, 5, 200),
(201, 5, 201),
(202, 5, 202),
(203, 5, 203),
(204, 5, 204),
(205, 5, 205),
(206, 5, 206),
(207, 5, 207),
(208, 5, 208),
(209, 5, 209),
(210, 5, 210),
(211, 5, 211),
(212, 5, 212),
(213, 5, 213),
(214, 5, 214),
(215, 5, 215),
(216, 6, 216),
(217, 6, 217),
(218, 6, 218),
(219, 6, 219),
(220, 6, 220),
(221, 6, 221),
(222, 6, 222),
(223, 6, 223),
(224, 6, 224),
(225, 6, 225),
(226, 6, 226),
(227, 6, 227),
(228, 6, 228),
(229, 6, 229),
(230, 6, 230),
(231, 6, 231),
(232, 6, 232),
(233, 6, 233),
(234, 6, 234),
(235, 6, 235),
(236, 6, 236),
(237, 6, 237),
(238, 6, 238),
(239, 6, 239),
(240, 6, 240),
(241, 6, 241),
(242, 6, 242),
(243, 6, 243),
(244, 6, 244),
(245, 6, 245),
(246, 6, 246),
(247, 6, 247),
(248, 6, 248),
(249, 6, 249),
(250, 6, 250),
(251, 6, 251),
(252, 6, 252),
(253, 6, 253),
(254, 6, 254),
(255, 6, 255),
(256, 6, 256),
(257, 6, 257),
(258, 6, 258),
(259, 6, 259),
(260, 6, 260),
(261, 6, 261),
(262, 6, 262),
(263, 6, 263),
(264, 6, 264),
(265, 6, 265),
(266, 6, 266),
(267, 6, 267),
(268, 6, 268),
(269, 6, 269),
(270, 6, 270),
(271, 6, 271),
(272, 6, 272),
(273, 6, 273),
(274, 6, 274),
(275, 6, 275),
(276, 6, 276),
(277, 6, 277),
(278, 6, 278),
(279, 6, 279),
(280, 6, 280),
(281, 6, 281),
(282, 6, 282),
(283, 6, 283),
(284, 6, 284),
(285, 6, 285),
(286, 6, 286),
(287, 6, 287),
(288, 6, 288),
(289, 6, 289),
(290, 6, 290),
(291, 6, 291),
(292, 6, 292),
(293, 6, 293),
(294, 6, 294),
(295, 6, 295),
(296, 6, 296),
(297, 6, 297),
(298, 6, 298),
(299, 6, 299),
(300, 6, 300),
(301, 6, 301),
(302, 6, 302),
(303, 6, 303),
(304, 6, 304),
(305, 6, 305),
(306, 6, 306),
(307, 6, 307),
(308, 6, 308),
(309, 6, 309),
(310, 6, 310),
(311, 6, 311),
(312, 6, 312),
(313, 6, 313),
(314, 6, 314),
(315, 6, 315),
(316, 6, 316),
(317, 6, 317),
(318, 6, 318),
(319, 6, 319),
(320, 6, 320),
(321, 6, 321),
(322, 6, 322),
(323, 6, 323),
(324, 6, 324),
(325, 6, 325),
(326, 6, 326),
(327, 6, 327),
(328, 6, 328),
(329, 6, 329),
(330, 6, 330),
(331, 7, 331),
(332, 7, 332),
(333, 7, 333),
(334, 7, 334),
(335, 7, 335),
(336, 7, 336),
(337, 7, 337),
(338, 7, 338),
(339, 7, 339),
(340, 7, 340),
(341, 7, 341),
(342, 7, 342),
(343, 7, 343),
(344, 7, 344),
(345, 7, 345),
(346, 7, 346),
(347, 7, 347),
(348, 7, 348),
(349, 7, 349),
(350, 7, 350),
(351, 7, 351),
(352, 7, 352),
(353, 7, 353),
(354, 7, 354),
(355, 7, 355),
(356, 7, 356),
(357, 7, 357),
(358, 8, 358),
(359, 8, 359),
(360, 8, 360),
(361, 8, 361),
(362, 8, 362),
(363, 8, 363),
(364, 8, 364),
(365, 8, 365),
(366, 8, 366),
(367, 8, 367),
(368, 8, 368),
(369, 8, 369),
(370, 8, 370),
(371, 8, 371),
(372, 8, 372),
(373, 8, 373),
(374, 9, 374),
(375, 9, 375),
(376, 9, 376),
(377, 9, 377),
(378, 9, 378),
(379, 9, 379),
(380, 9, 380),
(381, 9, 381),
(382, 9, 382),
(383, 9, 383),
(384, 9, 384),
(385, 9, 385),
(386, 9, 386),
(387, 9, 387),
(388, 9, 388),
(389, 9, 389),
(390, 9, 390),
(391, 9, 391),
(392, 9, 392),
(393, 10, 393),
(394, 10, 394),
(395, 10, 395),
(396, 10, 396),
(397, 10, 397),
(398, 10, 398),
(399, 10, 399),
(400, 10, 400),
(401, 10, 401),
(402, 10, 402),
(403, 10, 403),
(404, 10, 404),
(405, 10, 405),
(406, 10, 406),
(407, 10, 407),
(408, 10, 408),
(409, 10, 409),
(410, 10, 410),
(411, 10, 411),
(412, 10, 412),
(413, 10, 413),
(414, 10, 414),
(415, 10, 415),
(416, 10, 416),
(417, 10, 417),
(418, 10, 418),
(419, 10, 419),
(420, 10, 420),
(421, 10, 421),
(422, 10, 422),
(423, 10, 423),
(424, 10, 424),
(425, 10, 425),
(426, 10, 426),
(427, 10, 427),
(428, 10, 428),
(429, 10, 429),
(430, 10, 430),
(431, 10, 431),
(432, 10, 432),
(433, 10, 433),
(434, 11, 434),
(435, 11, 435),
(436, 11, 436),
(437, 11, 437),
(438, 11, 438),
(439, 11, 439),
(440, 11, 440),
(441, 11, 441),
(442, 11, 442),
(443, 11, 443),
(444, 11, 444),
(445, 11, 445),
(446, 11, 446),
(447, 11, 447),
(448, 11, 448),
(449, 11, 449),
(450, 11, 450),
(451, 11, 451),
(452, 11, 452),
(453, 11, 453),
(454, 11, 454),
(455, 11, 455),
(456, 11, 456),
(457, 11, 457),
(458, 11, 458),
(459, 12, 459),
(460, 12, 460),
(461, 12, 461),
(462, 12, 462),
(463, 12, 463),
(464, 12, 464),
(465, 12, 465),
(466, 12, 466),
(467, 12, 467),
(468, 12, 468),
(469, 12, 469),
(470, 12, 470),
(471, 12, 471),
(472, 12, 472),
(473, 12, 473),
(474, 12, 474),
(475, 12, 475),
(476, 12, 476),
(477, 12, 477),
(478, 12, 478),
(479, 12, 479),
(480, 12, 480),
(481, 12, 481),
(482, 12, 482),
(483, 12, 483),
(484, 12, 484),
(485, 12, 485),
(486, 12, 486),
(487, 12, 487),
(488, 12, 488),
(489, 13, 489),
(490, 13, 490),
(491, 13, 491),
(492, 13, 492),
(493, 13, 493),
(494, 13, 494),
(495, 13, 495),
(496, 13, 496),
(497, 13, 497),
(498, 13, 498),
(499, 13, 499),
(500, 13, 500),
(501, 13, 501),
(502, 13, 502),
(503, 13, 503),
(504, 13, 504),
(505, 13, 505),
(506, 13, 506),
(507, 13, 507),
(508, 13, 508),
(509, 13, 509),
(510, 13, 510),
(511, 13, 511),
(512, 13, 512),
(513, 13, 513),
(514, 13, 514),
(515, 13, 515),
(516, 13, 516),
(517, 14, 517),
(518, 14, 518),
(519, 14, 519),
(520, 14, 520),
(521, 14, 521),
(522, 14, 522),
(523, 14, 523),
(524, 14, 524),
(525, 14, 525),
(526, 14, 526),
(527, 14, 527),
(528, 14, 528),
(529, 14, 529),
(530, 14, 530),
(531, 14, 531),
(532, 14, 532),
(533, 14, 533),
(534, 14, 534),
(535, 14, 535),
(536, 14, 536),
(537, 14, 537),
(538, 14, 538),
(539, 14, 539),
(540, 14, 540),
(541, 14, 541),
(542, 14, 542),
(543, 14, 543),
(544, 14, 544),
(545, 14, 545),
(546, 14, 546),
(547, 14, 547),
(548, 14, 548),
(549, 14, 549),
(550, 14, 550),
(551, 14, 551),
(552, 14, 552),
(553, 14, 553),
(554, 14, 554),
(555, 14, 555),
(556, 14, 556),
(557, 14, 557),
(558, 14, 558),
(559, 14, 559),
(560, 14, 560),
(561, 14, 561),
(562, 14, 562),
(563, 14, 563),
(564, 14, 564),
(565, 14, 565),
(566, 14, 566),
(567, 14, 567),
(568, 14, 568),
(569, 14, 569),
(570, 14, 570),
(571, 14, 571),
(572, 14, 572),
(573, 14, 573),
(574, 14, 574),
(575, 14, 575),
(576, 14, 576),
(577, 14, 577),
(578, 14, 578),
(579, 14, 579),
(580, 14, 580),
(581, 14, 581),
(582, 14, 582),
(583, 14, 583),
(584, 14, 584),
(585, 14, 585),
(586, 14, 586),
(587, 14, 587),
(588, 14, 588),
(589, 14, 589),
(590, 14, 590),
(591, 14, 591),
(592, 14, 592),
(593, 14, 593),
(594, 14, 594),
(595, 14, 595),
(596, 14, 596),
(597, 14, 597),
(598, 14, 598),
(599, 14, 599),
(600, 14, 600),
(601, 14, 601),
(602, 14, 602),
(603, 14, 603),
(604, 14, 604),
(605, 14, 605),
(606, 14, 606),
(607, 14, 607),
(608, 14, 608),
(609, 14, 609),
(610, 14, 610),
(611, 14, 611),
(612, 14, 612),
(613, 14, 613),
(614, 14, 614),
(615, 14, 615),
(616, 14, 616),
(617, 14, 617),
(618, 14, 618),
(619, 14, 619),
(620, 14, 620),
(621, 14, 621),
(622, 14, 622),
(623, 14, 623),
(624, 14, 624),
(625, 14, 625),
(626, 14, 626),
(627, 14, 627),
(628, 14, 628),
(629, 14, 629),
(630, 14, 630),
(631, 14, 631),
(632, 14, 632),
(633, 14, 633),
(634, 15, 634),
(635, 15, 635),
(636, 15, 636),
(637, 15, 637),
(638, 15, 638),
(639, 15, 639),
(640, 15, 640),
(641, 15, 641),
(642, 15, 642),
(643, 16, 643),
(644, 16, 644),
(645, 16, 645),
(646, 16, 646),
(647, 17, 647),
(648, 17, 648),
(649, 17, 649),
(650, 17, 650),
(651, 17, 651),
(652, 17, 652),
(653, 17, 653),
(654, 17, 654),
(655, 17, 655),
(656, 17, 656),
(657, 17, 657),
(658, 17, 658),
(659, 17, 659),
(660, 17, 660),
(661, 17, 661),
(662, 17, 662),
(663, 17, 663),
(664, 17, 664),
(665, 17, 665),
(666, 17, 666),
(667, 17, 667),
(668, 17, 668),
(669, 17, 669),
(670, 17, 670),
(671, 17, 671),
(672, 17, 672),
(673, 17, 673),
(674, 17, 674),
(675, 17, 675),
(676, 17, 676),
(677, 17, 677),
(678, 17, 678),
(679, 17, 679),
(680, 17, 680),
(681, 17, 681),
(682, 17, 682),
(683, 17, 683),
(684, 18, 684),
(685, 18, 685),
(686, 18, 686),
(687, 18, 687),
(688, 18, 688),
(689, 18, 689),
(690, 18, 690),
(691, 18, 691),
(692, 18, 692),
(693, 18, 693),
(694, 18, 694),
(695, 18, 695),
(696, 18, 696),
(697, 18, 697),
(698, 18, 698),
(699, 19, 699),
(700, 19, 700),
(701, 19, 701),
(702, 19, 702),
(703, 19, 703),
(704, 19, 704),
(705, 19, 705),
(706, 19, 706),
(707, 19, 707),
(708, 19, 708),
(709, 19, 709),
(710, 19, 710),
(711, 19, 711),
(712, 19, 712),
(713, 19, 713),
(714, 19, 714),
(715, 19, 715),
(716, 19, 716),
(717, 19, 717),
(718, 19, 718),
(719, 19, 719),
(720, 19, 720),
(721, 19, 721),
(722, 19, 722),
(723, 19, 723),
(724, 19, 724),
(725, 19, 725),
(726, 19, 726),
(727, 19, 727),
(728, 19, 728),
(729, 20, 729),
(730, 20, 730),
(731, 20, 731),
(732, 20, 732),
(733, 20, 733),
(734, 20, 734),
(735, 20, 735),
(736, 20, 736),
(737, 20, 737),
(738, 20, 738),
(739, 20, 739),
(740, 20, 740),
(741, 20, 741),
(742, 20, 742),
(743, 20, 743),
(744, 20, 744),
(745, 20, 745),
(746, 20, 746),
(747, 20, 747),
(748, 20, 748),
(749, 20, 749),
(750, 20, 750),
(751, 20, 751),
(752, 20, 752),
(753, 20, 753),
(754, 20, 754),
(755, 20, 755),
(756, 20, 756),
(757, 20, 757),
(758, 21, 758),
(759, 21, 759),
(760, 21, 760),
(761, 21, 761),
(762, 21, 762),
(763, 21, 763),
(764, 21, 764),
(765, 21, 765),
(766, 21, 766),
(767, 21, 767),
(768, 21, 768),
(769, 21, 769),
(770, 21, 770),
(771, 21, 771),
(772, 21, 772),
(773, 21, 773),
(774, 21, 774),
(775, 21, 775),
(776, 21, 776),
(777, 21, 777),
(778, 21, 778),
(779, 21, 779),
(780, 21, 780),
(781, 21, 781),
(782, 21, 782),
(783, 21, 783),
(784, 21, 784),
(785, 21, 785),
(786, 21, 786),
(787, 21, 787),
(788, 21, 788),
(789, 21, 789),
(790, 21, 790),
(791, 21, 791),
(792, 21, 792),
(793, 21, 793),
(794, 21, 794),
(795, 21, 795),
(796, 21, 796),
(797, 21, 797),
(798, 21, 798),
(799, 21, 799),
(800, 21, 800),
(801, 21, 801),
(802, 21, 802),
(803, 21, 803),
(804, 21, 804),
(805, 21, 805),
(806, 21, 806),
(807, 21, 807),
(808, 21, 808),
(809, 21, 809),
(810, 21, 810),
(811, 21, 811),
(812, 21, 812),
(813, 21, 813),
(814, 21, 814),
(815, 21, 815),
(816, 21, 816),
(817, 21, 817),
(818, 21, 818),
(819, 21, 819),
(820, 21, 820),
(821, 21, 821),
(822, 22, 822),
(823, 22, 823),
(824, 22, 824),
(825, 22, 825),
(826, 22, 826),
(827, 22, 827),
(828, 22, 828),
(829, 22, 829),
(830, 22, 830),
(831, 22, 831),
(832, 22, 832),
(833, 22, 833),
(834, 22, 834),
(835, 22, 835),
(836, 22, 836),
(837, 22, 837),
(838, 22, 838),
(839, 22, 839),
(840, 22, 840),
(841, 22, 841),
(842, 22, 842),
(843, 22, 843),
(844, 22, 844),
(845, 22, 845),
(846, 22, 846),
(847, 22, 847),
(848, 22, 848),
(849, 22, 849),
(850, 22, 850),
(851, 22, 851),
(852, 22, 852),
(853, 22, 853),
(854, 22, 854),
(855, 22, 855),
(856, 22, 856),
(857, 22, 857),
(858, 22, 858),
(859, 22, 859),
(860, 22, 860),
(861, 22, 861),
(862, 23, 862),
(863, 23, 863),
(864, 23, 864),
(865, 23, 865),
(866, 23, 866),
(867, 23, 867),
(868, 23, 868),
(869, 23, 869),
(870, 23, 870),
(871, 23, 871),
(872, 23, 872),
(873, 23, 873),
(874, 23, 874),
(875, 24, 875),
(876, 24, 876),
(877, 24, 877),
(878, 24, 878),
(879, 24, 879),
(880, 24, 880),
(881, 24, 881),
(882, 24, 882),
(883, 24, 883),
(884, 24, 884),
(885, 24, 885),
(886, 24, 886),
(887, 25, 887),
(888, 25, 888),
(889, 25, 889),
(890, 25, 890),
(891, 25, 891),
(892, 25, 892),
(893, 25, 893),
(894, 25, 894),
(895, 25, 895),
(896, 25, 896),
(897, 25, 897),
(898, 25, 898),
(899, 25, 899),
(900, 25, 900),
(901, 26, 901),
(902, 26, 902),
(903, 26, 903),
(904, 27, 904),
(905, 27, 905),
(906, 27, 906),
(907, 27, 907),
(908, 27, 908),
(909, 27, 909),
(910, 27, 910),
(911, 27, 911),
(912, 27, 912),
(913, 27, 913),
(914, 27, 914),
(915, 27, 915),
(916, 27, 916),
(917, 27, 917),
(918, 27, 918),
(919, 27, 919),
(920, 27, 920),
(921, 27, 921),
(922, 27, 922),
(923, 27, 923),
(924, 27, 924),
(925, 27, 925),
(926, 27, 926),
(927, 27, 927),
(928, 27, 928),
(929, 27, 929),
(930, 27, 930),
(931, 27, 931),
(932, 27, 932),
(933, 27, 933),
(934, 27, 934),
(935, 27, 935),
(936, 27, 936),
(937, 27, 937),
(938, 27, 938),
(939, 27, 939),
(940, 27, 940),
(941, 27, 941),
(942, 27, 942),
(943, 27, 943),
(944, 27, 944),
(945, 27, 945),
(946, 27, 946),
(947, 27, 947),
(948, 27, 948),
(949, 27, 949),
(950, 27, 950),
(951, 27, 951),
(952, 27, 952),
(953, 27, 953),
(954, 27, 954),
(955, 27, 955),
(956, 27, 956),
(957, 27, 957),
(958, 27, 958),
(959, 27, 959),
(960, 27, 960),
(961, 27, 961),
(962, 27, 962),
(963, 27, 963),
(964, 27, 964),
(965, 27, 965),
(966, 27, 966),
(967, 27, 967),
(968, 27, 968),
(969, 27, 969),
(970, 27, 970),
(971, 27, 971),
(972, 27, 972),
(973, 27, 973),
(974, 27, 974),
(975, 27, 975),
(976, 27, 976),
(977, 27, 977),
(978, 27, 978),
(979, 27, 979),
(980, 27, 980),
(981, 27, 981),
(982, 27, 982),
(983, 27, 983),
(984, 27, 984),
(985, 27, 985),
(986, 27, 986),
(987, 27, 987),
(988, 27, 988),
(989, 27, 989),
(990, 27, 990),
(991, 28, 991),
(992, 28, 992),
(993, 28, 993),
(994, 28, 994),
(995, 28, 995),
(996, 28, 996),
(997, 28, 997),
(998, 28, 998),
(999, 28, 999),
(1000, 28, 1000),
(1001, 28, 1001),
(1002, 28, 1002),
(1003, 28, 1003),
(1004, 28, 1004),
(1005, 28, 1005),
(1006, 28, 1006),
(1007, 28, 1007),
(1008, 28, 1008),
(1009, 28, 1009),
(1010, 28, 1010),
(1011, 28, 1011),
(1012, 28, 1012),
(1013, 28, 1013),
(1014, 28, 1014),
(1015, 28, 1015),
(1016, 29, 1016),
(1017, 29, 1017),
(1018, 29, 1018),
(1019, 29, 1019),
(1020, 29, 1020),
(1021, 29, 1021),
(1022, 29, 1022),
(1023, 29, 1023),
(1024, 29, 1024),
(1025, 29, 1025),
(1026, 29, 1026),
(1027, 29, 1027),
(1028, 29, 1028),
(1029, 29, 1029),
(1030, 29, 1030),
(1031, 29, 1031),
(1032, 29, 1032),
(1033, 29, 1033),
(1034, 29, 1034),
(1035, 29, 1035),
(1036, 29, 1036),
(1037, 29, 1037),
(1038, 29, 1038),
(1039, 29, 1039),
(1040, 29, 1040),
(1041, 29, 1041),
(1042, 29, 1042),
(1043, 29, 1043),
(1044, 29, 1044),
(1045, 29, 1045),
(1046, 29, 1046),
(1047, 29, 1047),
(1048, 29, 1048),
(1049, 29, 1049),
(1050, 29, 1050),
(1051, 29, 1051),
(1052, 29, 1052),
(1053, 29, 1053),
(1054, 29, 1054),
(1055, 29, 1055),
(1056, 29, 1056),
(1057, 29, 1057),
(1058, 29, 1058),
(1059, 29, 1059),
(1060, 29, 1060),
(1061, 29, 1061),
(1062, 30, 1062),
(1063, 30, 1063),
(1064, 30, 1064),
(1065, 30, 1065),
(1066, 30, 1066),
(1067, 30, 1067),
(1068, 30, 1068),
(1069, 30, 1069),
(1070, 30, 1070),
(1071, 30, 1071),
(1072, 30, 1072),
(1073, 30, 1073),
(1074, 30, 1074),
(1075, 30, 1075),
(1076, 30, 1076),
(1077, 30, 1077),
(1078, 30, 1078),
(1079, 30, 1079),
(1080, 30, 1080),
(1081, 30, 1081),
(1082, 30, 1082),
(1083, 30, 1083),
(1084, 30, 1084),
(1085, 30, 1085),
(1086, 30, 1086),
(1087, 30, 1087),
(1088, 30, 1088),
(1089, 30, 1089),
(1090, 30, 1090),
(1091, 30, 1091),
(1092, 30, 1092),
(1093, 30, 1093),
(1094, 30, 1094),
(1095, 30, 1095),
(1096, 30, 1096),
(1097, 30, 1097),
(1098, 30, 1098),
(1099, 30, 1099),
(1100, 30, 1100),
(1101, 30, 1101),
(1102, 30, 1102),
(1103, 31, 1103),
(1104, 31, 1104),
(1105, 31, 1105),
(1106, 31, 1106),
(1107, 31, 1107),
(1108, 31, 1108),
(1109, 32, 1109),
(1110, 32, 1110),
(1111, 32, 1111),
(1112, 32, 1112);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rut_videos`
--

CREATE TABLE IF NOT EXISTS `rut_videos` (
`id_rut_vid_y` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `ruta_y` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fec_y` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rut_videos`
--

INSERT INTO `rut_videos` (`id_rut_vid_y`, `video_id`, `ruta_y`, `fec_y`) VALUES
(1, 1, '//www.youtube.com/embed/v0B0L_moOWY', '2015-01-28'),
(3, 2, 'https://www.youtube.com/embed/Wz4vH9sdz7c', '2015-01-28'),
(4, 2, 'https://www.youtube.com/embed/_B789lus-JE', '2015-01-28'),
(7, 1, '//www.youtube.com/embed/n-RXO3I-Cfw', '2015-01-30'),
(8, 2, 'https://www.youtube.com/embed/QBaIMZ8QjcU', '2015-01-31'),
(9, 2, 'https://www.youtube.com/embed/zpQkD5IfTdg', '2015-02-02'),
(10, 1, '//www.youtube.com/embed/jk4HYngf65w', '2015-02-04'),
(11, 1, '//www.youtube.com/embed/jk4HYngf65w', '2015-02-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla`
--

CREATE TABLE IF NOT EXISTS `talla` (
`id_tll` int(11) NOT NULL,
  `num_tll` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tip_producto`
--

CREATE TABLE IF NOT EXISTS `tip_producto` (
`id_tp` int(11) NOT NULL,
  `nam_tp` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `imag_col` varchar(455) COLLATE utf8_spanish_ci NOT NULL,
  `texto_tp` text COLLATE utf8_spanish_ci NOT NULL,
  `fec_camp` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tip_producto`
--

INSERT INTO `tip_producto` (`id_tp`, `nam_tp`, `imag_col`, `texto_tp`, `fec_camp`) VALUES
(1, 'Clase 1', 'imagenes/campa/mf3.png', 'En la parte del menú que dice campañas al dar clic me abra cuatro cuadros por ahora 2012 – 2013 – 2014 – 2015.    Cada cuadro va enmarcado en algo envejecido con una foto, al lado una breve descripción y ver colección.', '0000-00-00'),
(2, 'Clase 2', 'imagenes/campa/mf1.png', '', '0000-00-00'),
(3, '2012 Coleccion SERAFINd', 'imagenes/campa/mf4.png', 'texto', '2015-01-22'),
(4, '2014 Coleccion SERAFIN', 'imagenes/campa/mf2.png', 'ertd', '2015-01-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id_us` int(11) NOT NULL,
  `avat_us` varchar(350) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cc_us` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nom_us` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ape_us` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cor_us` varchar(455) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pass_us` varchar(800) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cel_us` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tel_us` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `depart_id` int(11) DEFAULT NULL,
  `muni_id` int(11) DEFAULT NULL,
  `direc_us` varchar(355) COLLATE utf8_spanish_ci NOT NULL,
  `cod_actv_us` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estd_us` varchar(5) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tip_us` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `corr_cambio` varchar(400) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_us`, `avat_us`, `cc_us`, `nom_us`, `ape_us`, `cor_us`, `pass_us`, `cel_us`, `tel_us`, `depart_id`, `muni_id`, `direc_us`, `cod_actv_us`, `estd_us`, `tip_us`, `corr_cambio`) VALUES
(1, 'imagenes/avatar/lob_family.jpg', '1090447181', 'albert', 'arias', 'albertarias925@outlook.com', 'dragon', '3143131320', '768508', 22, 831, 'cll 12', '000', '1', '2', ''),
(2, 'imagenes/avatar/dog.jpg', NULL, 'juan', 'Molina', 'juan@gmail.com', 'juan123', '1234567890', '', 14, 604, 'cll 3 NÂ° 2-43E', '000', '2', '1', ''),
(3, NULL, NULL, 'juan', NULL, 'dd@dominio.com', '123456', NULL, NULL, NULL, NULL, '', 'rpMZ1IksZXnBw1V1mfsQG', '2', '1', ''),
(4, NULL, NULL, 'dertrivi', NULL, 'correo@dominio.com', '123456', NULL, NULL, NULL, NULL, '', 'jmgFQQeNJiIDdxILYVGhg', '1', '2', ''),
(5, NULL, NULL, 'prueba', NULL, 'prueba@dominio.com', 'dragon', NULL, NULL, NULL, NULL, '', 'MzIKLlegRxE2yfeVN1Ei5', '2', '1', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
`id_video` int(11) NOT NULL,
  `nam_vid` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ima_vd` varchar(450) COLLATE utf8_spanish_ci NOT NULL,
  `fec_vid` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id_video`, `nam_vid`, `ima_vd`, `fec_vid`) VALUES
(1, 'Video1', 'imagenes/videos/an3.jpg', '2015-01-28'),
(2, 'Video2', 'imagenes/videos/12_12.png', '2015-01-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `whatsap`
--

CREATE TABLE IF NOT EXISTS `whatsap` (
`id_whasap` int(11) NOT NULL,
  `bd_id` int(11) NOT NULL,
  `num_whas` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `whatsap`
--

INSERT INTO `whatsap` (`id_whasap`, `bd_id`, `num_whas`) VALUES
(1, 2, '(+57) 320 527 8275'),
(2, 2, '(+57) 310 214 9353'),
(3, 2, '(+57) 301 363 5300'),
(4, 2, '(+57) 318 370 3970'),
(5, 2, '(+57) 301 711 0059'),
(8, 1, '(+57) 3205278275');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
 ADD PRIMARY KEY (`id_adm`);

--
-- Indices de la tabla `bodega`
--
ALTER TABLE `bodega`
 ADD PRIMARY KEY (`id_bodega`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`id_cl`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
 ADD PRIMARY KEY (`id_depart`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
 ADD PRIMARY KEY (`id_evet`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
 ADD PRIMARY KEY (`cod_f`), ADD KEY `p_cod` (`p_cod`), ADD KEY `us_id` (`us_id`);

--
-- Indices de la tabla `galerya`
--
ALTER TABLE `galerya`
 ADD PRIMARY KEY (`id_gal`);

--
-- Indices de la tabla `iamges_evet`
--
ALTER TABLE `iamges_evet`
 ADD PRIMARY KEY (`id_img_evet`), ADD KEY `evet_id` (`evet_id`);

--
-- Indices de la tabla `images_p`
--
ALTER TABLE `images_p`
 ADD PRIMARY KEY (`id_img_p`), ADD KEY `p_cod` (`p_cod`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
 ADD PRIMARY KEY (`id_mk`), ADD KEY `tp_id` (`tp_id`);

--
-- Indices de la tabla `marksimg`
--
ALTER TABLE `marksimg`
 ADD PRIMARY KEY (`id_ik`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
 ADD PRIMARY KEY (`id_muni`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
 ADD PRIMARY KEY (`cod_p`), ADD KEY `cl_id` (`cl_id`), ADD KEY `tip_id` (`tip_id`), ADD KEY `mark_id` (`mark_id`);

--
-- Indices de la tabla `p_t`
--
ALTER TABLE `p_t`
 ADD PRIMARY KEY (`id_p_t`), ADD KEY `p_cod` (`p_cod`), ADD KEY `tll_id` (`tll_id`);

--
-- Indices de la tabla `rel_dpt_muni`
--
ALTER TABLE `rel_dpt_muni`
 ADD PRIMARY KEY (`id_rel_dpt_muni`), ADD KEY `depart_id` (`depart_id`), ADD KEY `muni_id` (`muni_id`);

--
-- Indices de la tabla `rut_videos`
--
ALTER TABLE `rut_videos`
 ADD PRIMARY KEY (`id_rut_vid_y`), ADD KEY `video_id` (`video_id`);

--
-- Indices de la tabla `talla`
--
ALTER TABLE `talla`
 ADD PRIMARY KEY (`id_tll`);

--
-- Indices de la tabla `tip_producto`
--
ALTER TABLE `tip_producto`
 ADD PRIMARY KEY (`id_tp`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id_us`), ADD KEY `depart_id` (`depart_id`), ADD KEY `muni_id` (`muni_id`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
 ADD PRIMARY KEY (`id_video`);

--
-- Indices de la tabla `whatsap`
--
ALTER TABLE `whatsap`
 ADD PRIMARY KEY (`id_whasap`), ADD KEY `bd_id` (`bd_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `bodega`
--
ALTER TABLE `bodega`
MODIFY `id_bodega` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
MODIFY `id_cl` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
MODIFY `id_depart` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
MODIFY `id_evet` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
MODIFY `cod_f` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `galerya`
--
ALTER TABLE `galerya`
MODIFY `id_gal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `iamges_evet`
--
ALTER TABLE `iamges_evet`
MODIFY `id_img_evet` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `images_p`
--
ALTER TABLE `images_p`
MODIFY `id_img_p` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
MODIFY `id_mk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `marksimg`
--
ALTER TABLE `marksimg`
MODIFY `id_ik` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
MODIFY `id_muni` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1113;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
MODIFY `cod_p` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `p_t`
--
ALTER TABLE `p_t`
MODIFY `id_p_t` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rel_dpt_muni`
--
ALTER TABLE `rel_dpt_muni`
MODIFY `id_rel_dpt_muni` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1113;
--
-- AUTO_INCREMENT de la tabla `rut_videos`
--
ALTER TABLE `rut_videos`
MODIFY `id_rut_vid_y` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `talla`
--
ALTER TABLE `talla`
MODIFY `id_tll` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tip_producto`
--
ALTER TABLE `tip_producto`
MODIFY `id_tp` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id_us` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `whatsap`
--
ALTER TABLE `whatsap`
MODIFY `id_whasap` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`p_cod`) REFERENCES `producto` (`cod_p`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`us_id`) REFERENCES `usuario` (`id_us`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `iamges_evet`
--
ALTER TABLE `iamges_evet`
ADD CONSTRAINT `iamges_evet_ibfk_1` FOREIGN KEY (`evet_id`) REFERENCES `eventos` (`id_evet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `images_p`
--
ALTER TABLE `images_p`
ADD CONSTRAINT `images_p_ibfk_1` FOREIGN KEY (`p_cod`) REFERENCES `producto` (`cod_p`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `marca`
--
ALTER TABLE `marca`
ADD CONSTRAINT `marca_ibfk_1` FOREIGN KEY (`tp_id`) REFERENCES `cliente` (`id_cl`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`cl_id`) REFERENCES `cliente` (`id_cl`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`tip_id`) REFERENCES `tip_producto` (`id_tp`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`mark_id`) REFERENCES `marca` (`id_mk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `p_t`
--
ALTER TABLE `p_t`
ADD CONSTRAINT `p_t_ibfk_1` FOREIGN KEY (`p_cod`) REFERENCES `producto` (`cod_p`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `p_t_ibfk_2` FOREIGN KEY (`tll_id`) REFERENCES `talla` (`id_tll`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rel_dpt_muni`
--
ALTER TABLE `rel_dpt_muni`
ADD CONSTRAINT `rel_dpt_muni_ibfk_1` FOREIGN KEY (`depart_id`) REFERENCES `departamento` (`id_depart`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `rel_dpt_muni_ibfk_2` FOREIGN KEY (`muni_id`) REFERENCES `municipio` (`id_muni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rut_videos`
--
ALTER TABLE `rut_videos`
ADD CONSTRAINT `rut_videos_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id_video`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`depart_id`) REFERENCES `departamento` (`id_depart`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`muni_id`) REFERENCES `municipio` (`id_muni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `whatsap`
--
ALTER TABLE `whatsap`
ADD CONSTRAINT `whatsap_ibfk_1` FOREIGN KEY (`bd_id`) REFERENCES `bodega` (`id_bodega`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
