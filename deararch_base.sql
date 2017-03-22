-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 19, 2012 at 10:57 PM
-- Server version: 5.5.24
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `deararch_base`
--

-- --------------------------------------------------------

--
-- Table structure for table `academia`
--

CREATE TABLE IF NOT EXISTS `academia` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `identif` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `active` int(1) NOT NULL,
  `Academia` varchar(300) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `years` int(4) NOT NULL,
  `University` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `Term` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `Degree` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `Professors` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `Description` varchar(500) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `academia`
--

INSERT INTO `academia` (`ID`, `identif`, `active`, `Academia`, `years`, `University`, `Term`, `Degree`, `Professors`, `Description`) VALUES
(49, 'UDEM.2009.Spring.Sustentable I', 1, 'Sustentable I', 2009, 'UDEM', 'Spring', '6th semester', 'Margarita Flores, RubÃ©n SepÃºlveda', NULL),
(51, 'UDEM.2009.Autumn.TAR', 1, 'TAR', 2009, 'UDEM', 'Autumn', '5th semester', 'RubÃ©n Octavio SepÃºlveda Chapa, Margarita Flores', NULL),
(52, 'UDEM.2010.Spring.TAR', 1, 'TAR', 2010, 'UDEM', 'Spring', '6th semester', 'RubÃ©n Octavio SepÃºlveda Chapa, Margarita Flores', NULL),
(56, 'UDEM.2010.Spring.Integral', 0, 'Integral', 2010, 'UDEM', 'Spring', '9th semester', NULL, NULL),
(54, 'UDEM.2010.Spring.Tesis', 0, 'Tesis', 2010, 'UDEM', 'Spring', '10th semester', NULL, NULL),
(48, 'UDEM.2008.Autumn.UDESIGN', 1, 'UDESIGN', 2008, 'UDEM', 'Autumn', NULL, 'Margarita Flores', NULL),
(57, 'UDEM.2010.Autumn.Integral', 1, 'Integral', 2010, 'UDEM', 'Autumn', '9th semester', 'Margarita Flores', NULL),
(58, 'ISAD.2008.Autumn.TectÃ³nica', 0, 'TectÃ³nica', 2008, 'ISAD', 'Autumn', 'Master', NULL, NULL),
(59, 'ISAD.2008.Autumn.Percepciones Sensoriales', 0, 'Percepciones Sensoriales', 2008, 'ISAD', 'Autumn', 'Master', NULL, NULL),
(60, 'ISAD.2009.Autumn.PercepciÃ³n Espacial', 0, 'PercepciÃ³n Espacial', 2009, 'ISAD', 'Autumn', 'Master', NULL, NULL),
(61, 'ISAD.2009.Autumn.Taller de DiseÃ±o', 1, 'Taller de DiseÃ±o', 2009, 'ISAD', 'Autumn', 'Master', 'RubÃ©n SepÃºlveda Chapa, Margarita Flores', NULL),
(62, 'ISAD.2010.Autumn.Taller de DiseÃ±o BioclimÃ¡tico', 0, 'Taller de DiseÃ±o BioclimÃ¡tico', 2010, 'ISAD', 'Autumn', 'Master', NULL, NULL),
(63, 'CMAS.2008.Summer.El Garraf', 1, 'El Garraf', 2008, 'CMAS', 'Summer', 'Master', 'Luis Falcon, Miquel AdriÃ¡, Margarita Flroes', NULL),
(64, 'CMAS.2009.Summer.RÃ­o Magdalena', 1, 'RÃ­o Magdalena', 2009, 'CMAS', 'Summer', 'Master', 'Luis FalcÃ³n, Miquel AdriÃ¡, Margarita Flores', NULL),
(70, 'UIA.2008.Autumn.Vivienda', 1, 'Vivienda', 2008, 'UIA', 'Autumn', '4th semester', 'Francisco Pardo (Coordinador) RaÃºl Acevedo, Julio Amezcua, Axel AraÃ±o, Frida Escobedo, Margarita Flores, Bernardo Lanzagorta, Miguel Angel Lira, Paloma Vera', NULL),
(71, 'UIA.2009.Spring.Vivienda', 1, 'Vivienda', 2009, 'UIA', 'Spring', '4th semester', 'Francisco Pardo (Coordinador) Raul Acevedo, Julio Amezcua, Axel AraÃ±o, Frida Escobedo, Margarita Flores, Bernardo Lanzagorta, Paloma Vera', NULL),
(69, 'ITESM.2009.Spring.DiseÃ±o BioclimÃ¡tico', 0, 'DiseÃ±o BioclimÃ¡tico', 2009, 'ITESM', 'Spring', '4th semester', NULL, NULL),
(72, 'ISAD.2009.Autumn.TectÃ³nica', 0, 'TectÃ³nica', 2009, 'ISAD', 'Autumn', 'Master', NULL, NULL),
(74, 'CEDIM.2008.All.School Direction', 0, 'School Direction', 2008, 'CEDIM', 'All', 'All', NULL, NULL),
(75, 'UIA.2011.Spring.Housing', 1, 'Housing', 2011, 'UIA', 'Spring', '4th semester', 'Francisco Pardo (Coordinador), Axel AraÃ±o, Carlos Bedoya, Miguel Ãngel Lira, Margarita Flores, Ramiro GuzmÃ¡n, JosÃ© Luis Ãlvarez', NULL),
(76, 'ISAD.2011.Spring.Tectonics', 1, 'Tectonics', 2011, 'ISAD', 'Spring', 'Master', 'Margarita Flores', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `academiap`
--

CREATE TABLE IF NOT EXISTS `academiap` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `Academia` varchar(500) NOT NULL,
  `Photo` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=417 ;

--
-- Dumping data for table `academiap`
--

INSERT INTO `academiap` (`ID`, `Academia`, `Photo`) VALUES
(189, 'CMAS.2008.Summer.El Garraf', 'MG_8385.JPG'),
(188, 'CMAS.2008.Summer.El Garraf', '14_ElGarraf.jpg'),
(187, 'CMAS.2008.Summer.El Garraf', '13_ElGarraf.jpg'),
(186, 'CMAS.2008.Summer.El Garraf', '12_ElGarraf.jpg'),
(185, 'CMAS.2008.Summer.El Garraf', '11_ElGarraf.jpg'),
(184, 'CMAS.2008.Summer.El Garraf', '10_ElGarraf.jpg'),
(183, 'CMAS.2008.Summer.El Garraf', '09_ElGarraf.jpg'),
(182, 'CMAS.2008.Summer.El Garraf', '08_ElGarraf.jpg'),
(181, 'CMAS.2008.Summer.El Garraf', '07_ElGarraf.jpg'),
(180, 'CMAS.2008.Summer.El Garraf', '06_ElGarraf.jpg'),
(179, 'CMAS.2008.Summer.El Garraf', '05_ElGarraf.jpg'),
(178, 'CMAS.2008.Summer.El Garraf', '04_ElGarraf.jpg'),
(175, 'CMAS.2008.Summer.El Garraf', '01_ElGarraf.jpg'),
(176, 'CMAS.2008.Summer.El Garraf', '02_ElGarraf.jpg'),
(170, 'UIA.2009.Spring.Vivienda', 'DSC05013.JPG'),
(169, 'UIA.2009.Spring.Vivienda', 'DSC04974.JPG'),
(164, 'UIA.2009.Spring.Vivienda', 'DSC04874.JPG'),
(163, 'UIA.2009.Spring.Vivienda', 'DSC04852.JPG'),
(162, 'UIA.2009.Spring.Vivienda', 'DSC04842.JPG'),
(161, 'UIA.2009.Spring.Vivienda', 'DSC04825.JPG'),
(160, 'UIA.2009.Spring.Vivienda', 'DSC04801.JPG'),
(159, 'UIA.2009.Spring.Vivienda', 'DSC04796.JPG'),
(158, 'UIA.2009.Spring.Vivienda', 'DSC04793.JPG'),
(157, 'UIA.2009.Spring.Vivienda', 'DSC04790.JPG'),
(156, 'UIA.2009.Spring.Vivienda', 'DSC04783.JPG'),
(155, 'UIA.2009.Spring.Vivienda', 'DSC04767.JPG'),
(154, 'UIA.2009.Spring.Vivienda', 'DSC04759.JPG'),
(153, 'UIA.2009.Spring.Vivienda', 'DSC04757.JPG'),
(152, 'UIA.2009.Spring.Vivienda', 'DSC04746.JPG'),
(151, 'UIA.2009.Spring.Vivienda', 'DSC04745.JPG'),
(150, 'UIA.2009.Spring.Vivienda', 'DSC04740.JPG'),
(149, 'UIA.2008.Autumn.Vivienda', 'DSC00316.JPG'),
(146, 'UIA.2008.Autumn.Vivienda', 'DSC00305.JPG'),
(145, 'UIA.2008.Autumn.Vivienda', 'DSC00283.JPG'),
(144, 'UIA.2008.Autumn.Vivienda', 'DSC00275.JPG'),
(143, 'UIA.2008.Autumn.Vivienda', 'DSC00271.JPG'),
(142, 'UIA.2008.Autumn.Vivienda', 'DSC00262.JPG'),
(141, 'UIA.2008.Autumn.Vivienda', 'DSC00247.JPG'),
(140, 'UIA.2008.Autumn.Vivienda', 'DSC00241.JPG'),
(139, 'UIA.2008.Autumn.Vivienda', 'DSC00229.JPG'),
(138, 'UIA.2008.Autumn.Vivienda', 'DSC00227.JPG'),
(137, 'UIA.2008.Autumn.Vivienda', 'DSC00217.JPG'),
(136, 'UIA.2008.Autumn.Vivienda', 'DSC00213.JPG'),
(135, 'UIA.2008.Autumn.Vivienda', 'DSC00212.JPG'),
(134, 'UIA.2008.Autumn.Vivienda', 'DSC00205.JPG'),
(132, 'UIA.2008.Autumn.Vivienda', 'DSC00189.JPG'),
(177, 'CMAS.2008.Summer.El Garraf', '03_ElGarraf.jpg'),
(168, 'UIA.2009.Spring.Vivienda', 'DSC04958.JPG'),
(167, 'UIA.2009.Spring.Vivienda', 'DSC04955.JPG'),
(166, 'UIA.2009.Spring.Vivienda', 'DSC04928.JPG'),
(165, 'UIA.2009.Spring.Vivienda', 'DSC04895.JPG'),
(199, 'CMAS.2008.Summer.El Garraf', 'MG_8708.JPG'),
(198, 'CMAS.2008.Summer.El Garraf', 'MG_8674.JPG'),
(197, 'CMAS.2008.Summer.El Garraf', 'MG_8666.JPG'),
(196, 'CMAS.2008.Summer.El Garraf', 'MG_8651.JPG'),
(195, 'CMAS.2008.Summer.El Garraf', 'MG_8638.JPG'),
(194, 'CMAS.2008.Summer.El Garraf', 'MG_8594.JPG'),
(193, 'CMAS.2008.Summer.El Garraf', 'MG_8458.JPG'),
(192, 'CMAS.2008.Summer.El Garraf', 'MG_8451.JPG'),
(191, 'CMAS.2008.Summer.El Garraf', 'MG_8392.JPG'),
(190, 'CMAS.2008.Summer.El Garraf', 'MG_8387.JPG'),
(228, 'UDEM.2008.Autumn.UDESIGN', 'DSC09045.JPG'),
(229, 'UDEM.2008.Autumn.UDESIGN', 'DSC09076.JPG'),
(226, 'UDEM.2008.Autumn.UDESIGN', 'DSC09013.JPG'),
(227, 'UDEM.2008.Autumn.UDESIGN', 'DSC09019.JPG'),
(225, 'UDEM.2008.Autumn.UDESIGN', 'DSC08986.JPG'),
(224, 'CMAS.2009.Summer.RÃ­o Magdalena', '20.JPG'),
(223, 'CMAS.2009.Summer.RÃ­o Magdalena', '19.JPG'),
(222, 'CMAS.2009.Summer.RÃ­o Magdalena', '18.JPG'),
(221, 'CMAS.2009.Summer.RÃ­o Magdalena', '17.JPG'),
(220, 'CMAS.2009.Summer.RÃ­o Magdalena', '16.JPG'),
(219, 'CMAS.2009.Summer.RÃ­o Magdalena', '15.jpg'),
(218, 'CMAS.2009.Summer.RÃ­o Magdalena', '14.jpg'),
(217, 'CMAS.2009.Summer.RÃ­o Magdalena', '13.jpg'),
(216, 'CMAS.2009.Summer.RÃ­o Magdalena', '12.jpg'),
(215, 'CMAS.2009.Summer.RÃ­o Magdalena', '11.jpg'),
(214, 'CMAS.2009.Summer.RÃ­o Magdalena', '10.jpg'),
(213, 'CMAS.2009.Summer.RÃ­o Magdalena', '09.jpg'),
(212, 'CMAS.2009.Summer.RÃ­o Magdalena', '08.jpg'),
(211, 'CMAS.2009.Summer.RÃ­o Magdalena', '07.jpg'),
(210, 'CMAS.2009.Summer.RÃ­o Magdalena', '06.jpg'),
(209, 'CMAS.2009.Summer.RÃ­o Magdalena', '05.jpg'),
(205, 'CMAS.2009.Summer.RÃ­o Magdalena', '01.jpg'),
(206, 'CMAS.2009.Summer.RÃ­o Magdalena', '02.jpg'),
(207, 'CMAS.2009.Summer.RÃ­o Magdalena', '03.jpg'),
(208, 'CMAS.2009.Summer.RÃ­o Magdalena', '04.jpg'),
(230, 'UDEM.2008.Autumn.UDESIGN', 'DSC09096.JPG'),
(231, 'UDEM.2008.Autumn.UDESIGN', 'DSC09113.JPG'),
(232, 'UDEM.2008.Autumn.UDESIGN', 'DSC09115.JPG'),
(233, 'UDEM.2008.Autumn.UDESIGN', 'DSC09160.JPG'),
(234, 'UDEM.2008.Autumn.UDESIGN', 'DSC09184.JPG'),
(250, 'UDEM.2010.Autumn.Integral', 'UDEM_INT_A_F01.jpg'),
(251, 'UDEM.2010.Autumn.Integral', 'UDEM_INT_A_F02.jpg'),
(249, 'UDEM.2010.Autumn.Integral', 'UDEM_INT_A_05.jpg'),
(248, 'UDEM.2010.Autumn.Integral', 'UDEM_INT_A_04.jpg'),
(247, 'UDEM.2010.Autumn.Integral', 'UDEM_INT_A_03.jpg'),
(246, 'UDEM.2010.Autumn.Integral', 'UDEM_INT_A_02.jpg'),
(245, 'UDEM.2010.Autumn.Integral', 'UDEM_INT_A_01.jpg'),
(252, 'UDEM.2010.Autumn.Integral', 'UDEM_INT_A_F03.jpg'),
(253, 'UDEM.2010.Autumn.Integral', 'UDEM_INT_A_F04.jpg'),
(254, 'UDEM.2010.Autumn.Integral', 'UDEM_INT_A_F05.jpg'),
(255, 'UDEM.2010.Autumn.Integral', 'UDEM_INT_A_F06.jpg'),
(256, 'UDEM.2010.Autumn.Integral', 'UDEM_INT_A_F07.jpg'),
(257, 'UDEM.2010.Autumn.Integral', 'UDEM_INT_A_F08.jpg'),
(258, 'UDEM.2010.Autumn.Integral', 'UDEM_INT_A_F09.jpg'),
(259, 'UDEM.2010.Autumn.Integral', 'UDEM_INT_A_F10.jpg'),
(260, 'UDEM.2010.Autumn.Integral', 'UDEM_INT_A_F11.jpg'),
(261, 'UDEM.2010.Autumn.Integral', 'UDEM_INT_A_F12.jpg'),
(262, 'UDEM.2010.Autumn.Integral', 'UDEM_INT_A_F13.jpg'),
(263, 'UDEM.2010.Autumn.Integral', 'UDEM_INT_A_F14.jpg'),
(264, 'UDEM.2010.Autumn.Integral', 'UDEM_INT_A_F15.jpg'),
(372, 'UIA.2011.Spring.Housing', 'IMG_3735.JPG'),
(371, 'UIA.2011.Spring.Housing', 'IMG_3724.JPG'),
(369, 'UDEM.2010.Autumn.Integral', 'UDEM_INT_A_F18.jpg'),
(367, 'UDEM.2010.Autumn.Integral', 'UDEM_INT_A_F16.jpg'),
(370, 'UIA.2011.Spring.Housing', 'IMG_3717.JPG'),
(368, 'UDEM.2010.Autumn.Integral', 'UDEM_INT_A_F17.jpg'),
(272, 'UDEM.2010.Spring.TAR', '08CJ01.jpg'),
(273, 'UDEM.2010.Spring.TAR', '08CJ02.jpg'),
(274, 'UDEM.2010.Spring.TAR', '08CJ03.jpg'),
(275, 'UDEM.2010.Spring.TAR', '08CJ04.jpg'),
(276, 'UDEM.2010.Spring.TAR', '08CJF1.JPG'),
(277, 'UDEM.2010.Spring.TAR', '08CJF2.JPG'),
(278, 'UDEM.2010.Spring.TAR', '08CJF3.JPG'),
(279, 'UDEM.2010.Spring.TAR', '08CJF4.JPG'),
(280, 'UDEM.2010.Spring.TAR', '08KV02.jpg'),
(281, 'UDEM.2010.Spring.TAR', '08KV03.jpg'),
(282, 'UDEM.2010.Spring.TAR', '08KV04.jpg'),
(283, 'UDEM.2010.Spring.TAR', '08KVF1.JPG'),
(284, 'CEDIM.2008.All.School Direction', 'CEDIM01.jpg'),
(285, 'CEDIM.2008.All.School Direction', 'CEDIM02.jpg'),
(286, 'CEDIM.2008.All.School Direction', 'CEDIM03.jpg'),
(287, 'CEDIM.2008.All.School Direction', 'CEDIM04.jpg'),
(288, 'UDEM.2010.Spring.TAR', '08PM01.jpg'),
(289, 'UDEM.2010.Spring.TAR', '08PM02.jpg'),
(290, 'UDEM.2010.Spring.TAR', '08PM03.jpg'),
(291, 'UDEM.2010.Spring.TAR', '08PM04.jpg'),
(300, 'UDEM.2010.Spring.TAR', '08KVF2.JPG'),
(293, 'UDEM.2010.Spring.TAR', '08PMF2.JPG'),
(294, 'UDEM.2010.Spring.TAR', '08PMF3.JPG'),
(295, 'UDEM.2010.Spring.TAR', '08PMF4.JPG'),
(301, 'UDEM.2010.Spring.TAR', '08RA04A.jpg'),
(314, 'UDEM.2009.Autumn.TAR', '01PF01.JPG'),
(309, 'UDEM.2010.Spring.TAR', '08RA01.jpg'),
(312, 'UDEM.2010.Spring.TAR', '08RA03.jpg'),
(315, 'UDEM.2009.Autumn.TAR', '01PF02.JPG'),
(316, 'UDEM.2009.Autumn.TAR', '01PF05.jpg'),
(317, 'UDEM.2009.Autumn.TAR', '01PF06.JPG'),
(318, 'UDEM.2009.Autumn.TAR', '02CI01A.jpg'),
(319, 'UDEM.2009.Autumn.TAR', '02CI01B.jpg'),
(320, 'UDEM.2009.Autumn.TAR', '02CI01C.jpg'),
(321, 'UDEM.2009.Autumn.TAR', '02CI02A.jpg'),
(322, 'UDEM.2009.Autumn.TAR', '02CI02B.jpg'),
(323, 'UDEM.2009.Autumn.TAR', '03CI01.JPG'),
(324, 'UDEM.2009.Autumn.TAR', '03CI02.JPG'),
(327, 'UDEM.2009.Autumn.TAR', '04EBP01.jpg'),
(328, 'UDEM.2009.Autumn.TAR', '04EBP02.jpg'),
(329, 'UDEM.2009.Autumn.TAR', '04EBP03.jpg'),
(330, 'UDEM.2009.Autumn.TAR', '04EBP05.jpg'),
(331, 'UDEM.2009.Autumn.TAR', '04EBP05A.jpg'),
(332, 'UDEM.2009.Autumn.TAR', '04EBP11.jpg'),
(338, 'UDEM.2009.Autumn.TAR', '04EBP12.jpg'),
(337, 'UDEM.2009.Autumn.TAR', '04EBP11A.JPG'),
(339, 'UDEM.2009.Autumn.TAR', '04EBP14.jpg'),
(341, 'UDEM.2009.Autumn.TAR', '04EBP14A.JPG'),
(345, 'UDEM.2009.Autumn.TAR', '05GDL02.jpg'),
(344, 'UDEM.2009.Autumn.TAR', '05GDL01.jpg'),
(346, 'UDEM.2009.Autumn.TAR', '05GDL03.jpg'),
(353, 'UDEM.2009.Autumn.TAR', '05GDL06.jpg'),
(355, 'UDEM.2009.Autumn.TAR', '05GDL04.jpg'),
(352, 'UDEM.2009.Autumn.TAR', '05GDL05.jpg'),
(354, 'UDEM.2009.Autumn.TAR', '05GDL07.jpg'),
(356, 'UDEM.2009.Spring.Sustentable I', 'DSC04316.JPG'),
(357, 'UDEM.2009.Spring.Sustentable I', 'DSC04333.JPG'),
(358, 'UDEM.2009.Spring.Sustentable I', 'DSC04336.JPG'),
(359, 'UDEM.2009.Spring.Sustentable I', 'DSC04354.JPG'),
(360, 'UDEM.2009.Spring.Sustentable I', 'DSC04383.JPG'),
(361, 'UDEM.2009.Spring.Sustentable I', 'DSC04397.JPG'),
(362, 'ISAD.2009.Autumn.Taller de DiseÃ±o', 'DSC00099.JPG'),
(363, 'ISAD.2009.Autumn.Taller de DiseÃ±o', 'DSC00104.JPG'),
(364, 'ISAD.2009.Autumn.Taller de DiseÃ±o', 'DSC00122.JPG'),
(365, 'ISAD.2009.Autumn.Taller de DiseÃ±o', 'DSC00146.JPG'),
(366, 'ISAD.2009.Autumn.Taller de DiseÃ±o', 'DSC00155.JPG'),
(373, 'UIA.2011.Spring.Housing', 'IMG_3749.JPG'),
(375, 'UIA.2011.Spring.Housing', 'IMG_3768.JPG'),
(377, 'UIA.2011.Spring.Housing', 'IMG_3773.JPG'),
(379, 'UIA.2011.Spring.Housing', 'IMG_3802.JPG'),
(380, 'UIA.2011.Spring.Housing', 'IMG_3816.JPG'),
(382, 'UIA.2011.Spring.Housing', 'IMG_3860.JPG'),
(388, 'UIA.2011.Spring.Housing', 'IMG_3892.JPG'),
(405, 'ISAD.2011.Spring.Tectonics', 'Casa Gaspar.jpg'),
(416, 'ISAD.2011.Spring.Tectonics', 'Capilla-Santa-Ma.-de-los-Angeles.jpg'),
(393, 'UIA.2011.Spring.Housing', 'IMG_3995.JPG'),
(400, 'ISAD.2011.Spring.Tectonics', 'Casa Tolo.jpg'),
(401, 'ISAD.2011.Spring.Tectonics', 'Casa Gordillo.jpg'),
(402, 'ISAD.2011.Spring.Tectonics', 'Perspectiva.jpg'),
(403, 'ISAD.2011.Spring.Tectonics', 'Whitney Museum.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `indexp`
--

CREATE TABLE IF NOT EXISTS `indexp` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `Project` varchar(100) NOT NULL,
  `Foto` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `indexp`
--

INSERT INTO `indexp` (`ID`, `Project`, `Foto`) VALUES
(58, 'Casa de Uno', 'CU 10.jpg'),
(62, 'Casa 4 Planos', '07IMG_2473.jpg'),
(41, 'Perspective Studies', 'IMG_2889.jpg'),
(47, 'Dpto. JG', 'LA_Ab01b.jpg'),
(59, 'Casa de Uno', 'CU 17.JPG'),
(56, 'Casa de Uno', 'CU 03.JPG'),
(57, 'Casa de Uno', 'CU 05.JPG'),
(46, 'Casa America', 'Isometrico.jpg'),
(55, 'Casa 4 Planos', '13IMG_1360.JPG'),
(34, 'Vivienda Social Gpe', 'VSG_S1b_A300.jpg'),
(24, 'Casa 4 Planos', '19IMG_0810.JPG'),
(54, 'Casa 4 Planos', '12IMG_0982.JPG'),
(50, 'Casa en Jardin', 'RB_R01.jpg'),
(51, 'Casa VGA', 'VGA_M04.jpg'),
(39, 'Oficina DA', 'OSJ_02b-Proportion.jpg'),
(61, 'Casa de Uno', 'CU.JPG'),
(64, 'Casa de Uno', 'Wallpaper.jpg'),
(65, 'Casa 4 Planos', 'Su Casa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `active` int(1) NOT NULL,
  `Project` varchar(100) NOT NULL,
  `Year` int(4) DEFAULT NULL,
  `Plot` varchar(50) DEFAULT NULL,
  `FootPrint` varchar(50) DEFAULT NULL,
  `BuiltArea` varchar(50) DEFAULT NULL,
  `Team` varchar(200) DEFAULT NULL,
  `Description` varchar(800) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`ID`, `active`, `Project`, `Year`, `Plot`, `FootPrint`, `BuiltArea`, `Team`, `Description`) VALUES
(1, 1, 'Casa de Uno', 2009, '187 m2', '157 m2', '240 m2', 'Margarita Flores, RubÃ©n Octavio SepÃºlveda Chapa, Abel Salazar, LucÃ­a Castro, Susana GarcÃ­a, Ana Paulina Reyes', 'Shelter and intimacy are achieved on this specific construction that raises from a quoin, long and narrow, lot. The envelope recalls the notion of a back that bends over to protect against â€œthe inhospitable of the times to doâ€; and for the one that knows how to observe, it allows him to sense an intimacy without distractions. Located along the narrow side, the pedestrian door, a wide steel plate, gives entrance to a cut of air that extends along the site, limited by the high neighboring wall and the even higher internal faÃ§ade of the house; it is a gorge of light with the sufficient width to saturate with clarity each of the house precincts. The one that enters the house dwells this open air. Beams of light, at entering, reflect planes of clarity over the long adjoining wall.'),
(3, 1, 'Casa en Jardin', 2008, '660 m2', '270 m2', '270 m2', 'RubÃ©n Octavio SepÃºlveda Chapa, Abel Salazar', NULL),
(4, 1, 'CVI', 2008, '1,932 m2', '979 m2', '3,469 m2', 'Margarita Flores, RubÃ©n Octavio Sepulveda Chapa, Abel Salazar, LucÃ­a Castro, Susana GarcÃ­a', 'The need to solve a program out of constraints leads to the exploration of new strategies and to the definition of new conceptual schemas. On a site with a peculiar location in the center of a block, 24 housing units are lay out.\r\nThe intent is to eliminate hierarchies by providing the conditions that would encourage a sense of community, a public space where neighbors would encounter. \r\nAt the central plaza the various relationships among visual fields get established, at both of its long sides 6 modules containing 4 apartments each, separate from the ground floor to allow: parking space, vehicular circulations, and stairs access to the only horizontal circulation that gives entry to all housing units.'),
(5, 1, 'Casa 4 Planos', 2010, '200 m2', '138 m2', '300 m2', 'Margarita Flores, RubÃ©n Octavio SepÃºlveda Chapa, Abel Salazar, Lorena Darquea, Ana Paulina Reyes', 'With a double ulterior motive, assure the views to the surrounding mountains and provide an specific relation in between each living area and the interior outdoors, a 10m cube is placed 10m behind the street limit, inducing the division of the plot on four identical frames of 5m X 10m; such fragmentation allowed to incorporate the garden as the void that articulates the relationship between the volume of the house and the frontal volume. The character that the house transmits to the exterior is given by the sobriety of its 4 planes, which are distinguished by its change in height and the arrangement of its openings given by the relationship that each bedroom establishes with the exterior; searching for a view and an specific light-shadow effect to complete the tacit sense of inhabitance.'),
(7, 1, 'Dpto. JG', 2009, NULL, '241 m2', '241 m2', 'Margarita Flores, RubÃ©n Octavio SepÃºlveda Chapa, Abel Salazar, Lorena Darquea, Daniela Bejarano, Sofia Arevalo', NULL),
(9, 1, 'Fracc. ViDA', 2007, '1,931 m2', '979 m2', '3,470 m2', 'RubÃ©n Octavio SepÃºlveda Chapa, Abel Salazar', 'Premio Nacional de Vivienda 2007. CategorÃ­a Vivienda Sustentable.\r\nPremio Obras Cemex XVI. CategorÃ­a Vivienda de Interes Social'),
(11, 1, 'Huastaco', 2009, '195 m2', '195 m2', '222 m2', 'Margarita Flores, RubÃ©n Octavio SepÃºlveda Chapa, Abel Salazar', NULL),
(12, 1, 'Oficina DA', 2011, '131 m2', '51 m2', '100 m2', 'Margarita Flores, RubÃ©n Octavio SepÃºlveda Chapa, Abel Salazar, Lorena Darquea, Ana Paulina Reyes', NULL),
(13, 1, 'Casa America', 2010, '240 m2', '189 m2', '213 m2', 'Margarita Flores, RubÃ©n Octavio SepÃºlveda Chapa, Abel Salazar, Ana Paulina Reyes', 'An only axis runs through the siteâ€™s length, at times built others suggested; through it, all areas are located, articulated and accessed.\r\nAs the topography rises from the street a new platform is lay down at every meter in height, each accommodates a different activity and set up a different visual relationship with the exterior. To conciliate this triple condition a telescopic operation was introduced by means of three bodies that superimpose to compromise with topography, views and space use.  \r\nA sequence of events is articulated along the axis and transitions are framed at every platform change, from car parking, through resting areas, until day activities areas that meet with the garden at the end of the path.'),
(15, 1, 'Vivienda Social Gpe', 2010, NULL, NULL, NULL, 'Margarita Flores, RubÃ©n Octavio SepÃºlveda Chapa, Abel Salazar, Ana Paulina Reyes, Cinthia Cavazos', NULL),
(16, 1, 'Casa VGA', 2010, '618 m2', '249 m2', '454 m2', 'Margarita Flores, RubÃ©n Octavio SepÃºlveda Chapa, Abel Salazar, Daniela Bejarano, Lorena Darquea', NULL),
(17, 1, 'Casa EC', 2008, '320 m2', '202 m2', '281 m2', 'RubÃ©n Octavio SepÃºlveda Chapa, Margarita Flores, Abel Salazar, LucÃ­a Castro', NULL),
(18, 1, 'Perspective Studies', 2010, NULL, NULL, NULL, 'RubÃ©n Octavio SepÃºlveda Chapa, Ana Paulina Reyes', NULL),
(24, 1, 'Casa VH', 2008, '704 m2', '379 m2', '833 m2', 'RubÃ©n Octavio SepÃºlveda Chapa, Abel Salazar, LucÃ­a Castro', NULL),
(21, 1, 'Casa MYA', 2012, '162 m2', '128 m2', '378 m2', 'Margarita Flores, RubÃ©n Octavio SepÃºlveda Chapa, Abel Salazar, Ana Paulina Reyes', NULL),
(22, 1, 'Casa Roja', 2011, '328 m2', '171 m2', '420 m2', 'Margarita Flores, RubÃ©n Octavio SepÃºlveda Chapa, Abel Salazar, Ana Paulina Reyes, Lorena Darquea, Daniela Bejarano', 'The house program is summarized in three atmospheres which get arranged in three different levels that solve the project settlement on a site with a slope of twenty percent, this same topography foster the lyric of paths and the sequence between spaces: In direct contact with the lower garden the areas for the family interaction get established, at street level all public areas are located, and the higher level is reserved for the areas of rest.\r\nThe presence of the mountains surrounding the site at distance encourages a set of indoor spaces that allow the recognition of the essence of place, specific views that reveals a fraction of the mountain, a way of fixing the horizon and introduce it in to the house.'),
(23, 1, 'Conjunto AvÃ¡ndaro', 2012, '9126.92 m2', NULL, NULL, 'Margarita Flores, RubÃ©n Octavio SepÃºlveda Chapa, Abel Salazar, Ana Paulina Reyes, Cinthia Cavazos', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projectsp`
--

CREATE TABLE IF NOT EXISTS `projectsp` (
  `ID` int(20) NOT NULL AUTO_INCREMENT,
  `Project` varchar(100) NOT NULL,
  `Photo` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=637 ;

--
-- Dumping data for table `projectsp`
--

INSERT INTO `projectsp` (`ID`, `Project`, `Photo`) VALUES
(32, 'Casa en Jardin', 'IMG_2604.jpg'),
(33, 'Casa en Jardin', 'IMG_2701.jpg'),
(34, 'Casa en Jardin', 'IMG_2584.jpg'),
(35, 'Casa en Jardin', 'IMG_2607.jpg'),
(36, 'Casa en Jardin', 'IMG_2620.jpg'),
(37, 'Casa en Jardin', 'IMG_2647.jpg'),
(38, 'Casa en Jardin', 'IMG_2648.jpg'),
(39, 'Casa en Jardin', 'IMG_2664.jpg'),
(40, 'Casa en Jardin', 'IMG_2680.jpg'),
(494, 'Casa en Jardin', 'RB_R01.jpg'),
(493, 'Casa en Jardin', 'RB_A101.jpg'),
(45, 'Casa de Uno', 'CU 01.jpg'),
(46, 'Casa de Uno', 'CU 02.jpg'),
(47, 'Casa de Uno', 'CU 03.jpg'),
(48, 'Casa de Uno', 'CU 04.jpg'),
(49, 'Casa de Uno', 'CU 05.jpg'),
(50, 'Casa de Uno', 'CU 06.jpg'),
(51, 'Casa de Uno', 'CU 07.jpg'),
(254, 'Casa de Uno', 'CU_Isometria1.jpg'),
(53, 'Casa de Uno', 'CU 09.jpg'),
(54, 'Casa de Uno', 'CU 10.jpg'),
(55, 'Casa de Uno', 'CU 11.jpg'),
(56, 'Casa de Uno', 'CU 12.jpg'),
(57, 'Casa de Uno', 'CU 13.jpg'),
(58, 'Casa de Uno', 'CU 14.jpg'),
(59, 'Casa de Uno', 'CU 15.jpg'),
(60, 'Casa de Uno', 'CU 16.jpg'),
(61, 'Casa de Uno', 'CU 17.jpg'),
(62, 'Casa de Uno', 'CU 18.jpg'),
(63, 'Casa de Uno', 'CU 19.jpg'),
(64, 'Casa de Uno', 'CU 20.jpg'),
(217, 'Casa de Uno', 'CU 26.jpg'),
(216, 'Casa de Uno', 'CU 29.jpg'),
(67, 'Casa de Uno', 'CU 23.jpg'),
(68, 'Casa de Uno', 'CU 24.jpg'),
(69, 'Casa de Uno', 'CU 25.jpg'),
(78, 'Fracc. ViDA', 'lamina 1 copy.jpg'),
(71, 'Huastaco', '03.jpg'),
(72, 'Huastaco', '04.jpg'),
(73, 'Huastaco', '05.jpg'),
(74, 'Huastaco', '07.jpg'),
(75, 'Huastaco', '08.jpg'),
(76, 'Huastaco', '09.jpg'),
(220, 'Huastaco', '10.jpg'),
(79, 'Fracc. ViDA', 'lamina 2 copy.jpg'),
(80, 'Fracc. ViDA', 'lamina 3 copy.jpg'),
(81, 'Fracc. ViDA', 'lamina 4 copy.jpg'),
(82, 'Fracc. ViDA', 'lamina 5 copy.jpg'),
(247, 'Casa 4 Planos', 'LM_A201.jpg'),
(490, 'Casa America', 'ZM_03.jpg'),
(407, 'Casa 4 Planos', '06IMG_1482.JPG'),
(399, 'Huastaco', 'H_A101.jpg'),
(446, 'Dpto. JG', 'LA_Ab04.jpg'),
(462, 'Casa EC', 'EC 04.jpg'),
(472, 'Perspective Studies', 'IMG_2889.jpg'),
(636, 'Casa VH', 'vh4.jpg'),
(635, 'Casa VH', 'vh3.jpg'),
(634, 'Casa VH', 'vh2.jpg'),
(633, 'Casa VH', 'IMG_3352.JPG'),
(632, 'Casa VH', 'IMG_3348.JPG'),
(631, 'Casa VH', 'IMG_4806.jpg'),
(630, 'Casa VH', 'IMG_4783.jpg'),
(629, 'Casa VH', 'IMG_4772.jpg'),
(362, 'CVI', '00-sec-volumen.jpg'),
(116, 'CVI', 'CVI 01.jpg'),
(117, 'CVI', 'CVI 02.jpg'),
(118, 'CVI', 'CVI 03.jpg'),
(119, 'CVI', 'CVI 04.jpg'),
(120, 'CVI', 'CVI 05.jpg'),
(277, 'Casa de Uno', 'CU_A000.jpg'),
(133, 'CVI', 'CVI 09.jpg'),
(131, 'CVI', 'CVI 07.jpg'),
(132, 'CVI', 'CVI 08.jpg'),
(130, 'CVI', 'CVI 06.jpg'),
(255, 'Casa de Uno', 'CU_Isometria2.jpg'),
(361, 'CVI', '1_CVI_C_Iso.jpg'),
(627, 'Casa VH', 'IMG_4739.jpg'),
(413, 'Casa 4 Planos', '10IMG_8033.JPG'),
(306, 'Casa 4 Planos', 'LM_A101.jpg'),
(149, 'Casa 4 Planos', '02IMG_0781_2.jpg'),
(148, 'Casa 4 Planos', '01IMG_1070.JPG'),
(414, 'Casa 4 Planos', '12IMG_0982.JPG'),
(415, 'Casa 4 Planos', '13IMG_1360.JPG'),
(416, 'Casa 4 Planos', '14IMG_0919.jpg'),
(417, 'Casa 4 Planos', '15IMG_2137.jpg'),
(280, 'Casa de Uno', 'CU_A101.jpg'),
(438, 'Casa 4 Planos', '18IMG_2268.jpg'),
(418, 'Casa 4 Planos', '16IMG_2733.JPG'),
(419, 'Casa 4 Planos', '17IMG_2754.JPG'),
(224, 'Casa de Uno', 'CU 30.jpg'),
(492, 'Casa America', 'ZM_01.jpg'),
(409, 'Casa 4 Planos', '08IMG_2600.jpg'),
(411, 'Casa 4 Planos', '09IMG_0218.jpg'),
(412, 'Casa 4 Planos', '11IMG_1546.JPG'),
(408, 'Casa 4 Planos', '07IMG_2473.jpg'),
(389, 'Casa EC', '1 CC_A200.jpg'),
(626, 'Casa VH', 'IMG_4733.jpg'),
(388, 'Casa EC', '1 CC_A102.jpg'),
(405, 'Casa 4 Planos', '05IMG_1024.jpg'),
(406, 'Casa 4 Planos', '04IMG_2664.JPG'),
(387, 'Casa EC', '1 CC_A101.jpg'),
(222, 'Casa de Uno', 'CU 31.jpg'),
(440, 'Casa 4 Planos', '20IMG_1930.jpg'),
(400, 'Huastaco', 'H_A201.jpg'),
(439, 'Casa 4 Planos', '19IMG_1892.jpg'),
(625, 'Casa VH', 'IMG_4729.jpg'),
(624, 'Casa VH', 'IMG_4726.jpg'),
(279, 'Casa de Uno', 'CU_A102.jpg'),
(307, 'Casa 4 Planos', 'LM_Isometria.jpg'),
(402, 'Casa America', 'A_A201.jpg'),
(401, 'Casa America', 'A_A101.jpg'),
(270, 'Casa de Uno', 'CU_Seccion.jpg'),
(308, 'Vivienda Social Gpe', 'VSG_M1_A100.jpg'),
(340, 'Vivienda Social Gpe', 'VSG_M3_R.jpg'),
(310, 'Vivienda Social Gpe', 'VSG_M2_A100.jpg'),
(339, 'Vivienda Social Gpe', 'VSG_M2_R.jpg'),
(314, 'Vivienda Social Gpe', 'VSG_M3_A100.jpg'),
(338, 'Vivienda Social Gpe', 'VSG_M1_R.jpg'),
(403, 'Casa EC', '0_esquema.jpg'),
(293, 'Casa VGA', 'VGA_A101.jpg'),
(296, 'Casa VGA', 'VGA_A102.jpg'),
(298, 'Casa VGA', 'VGA_A103.jpg'),
(522, 'Oficina DA', 'OSJ_02 Proportion.jpg'),
(303, 'Casa VGA', 'VGA_A201.jpg'),
(304, 'Casa VGA', 'VGA_A202.jpg'),
(628, 'Casa VH', 'IMG_4741.jpg'),
(311, 'Vivienda Social Gpe', 'VSG_M1_A301.jpg'),
(312, 'Vivienda Social Gpe', 'VSG_M2_A301.jpg'),
(466, 'Casa EC', 'EC 08.jpg'),
(317, 'Vivienda Social Gpe', 'VSG_M3_A301.jpg'),
(318, 'Vivienda Social Gpe', 'VSG_S1_A300.jpg'),
(336, 'Vivienda Social Gpe', 'VSG_S0_A200.jpg'),
(464, 'Casa EC', 'EC 06.jpg'),
(379, 'Casa 4 Planos', 'LM_00.jpg'),
(335, 'Vivienda Social Gpe', 'VSG_M0_A100.jpg'),
(345, 'Casa America', 'A_Isometrico.jpg'),
(358, 'CVI', '1_CVI_C_A103.jpg'),
(355, 'CVI', '1_CVI_C_A102.jpg'),
(354, 'CVI', '1_CVI_C_A101.jpg'),
(357, 'CVI', '1_CVI_C_A104.jpg'),
(359, 'CVI', '1_CVI_C_A201.jpg'),
(360, 'CVI', '1_CVI_C_A202.jpg'),
(525, 'Oficina DA', 'OSJ_03 Isometric-Projection.jpg'),
(423, 'Casa 4 Planos', '21IMG_2353.jpg'),
(424, 'Casa 4 Planos', '22IMG_0796.jpg'),
(425, 'Casa 4 Planos', '23IMG_0799.jpg'),
(426, 'Casa 4 Planos', '24IMG_0810.JPG'),
(427, 'Casa 4 Planos', '25IMG_0843.JPG'),
(428, 'Casa 4 Planos', '26IMG_0857.JPG'),
(429, 'Casa 4 Planos', '27IMG_0870.JPG'),
(430, 'Casa 4 Planos', '28IMG_2420.jpg'),
(431, 'Casa 4 Planos', '29IMG_0045.jpg'),
(432, 'Casa 4 Planos', '30IMG_0920.jpg'),
(465, 'Casa EC', 'EC 07.jpg'),
(445, 'Dpto. JG', 'LA_Ab03.jpg'),
(449, 'Dpto. JG', 'LA_Ab01.jpg'),
(448, 'Dpto. JG', 'LA_Ab02.jpg'),
(459, 'Casa EC', 'EC 01.jpg'),
(471, 'Casa EC', 'EC 03.jpg'),
(470, 'Casa EC', 'EC 02.JPG'),
(469, 'Casa America', 'Hejduk.jpg'),
(473, 'Perspective Studies', 'IMG_2907.jpg'),
(474, 'Perspective Studies', 'IMG_2910.JPG'),
(489, 'Casa America', 'ZM_02.jpg'),
(487, 'Casa America', 'Perspectiva-03.jpg'),
(482, 'Casa America', 'Perspectiva-01.jpg'),
(483, 'Casa America', 'Perspectiva-02.jpg'),
(486, 'Casa America', 'Perspectiva-00.jpg'),
(501, 'Casa America', 'ZM_00.jpg'),
(498, 'Casa VGA', 'VGA_M01.jpg'),
(496, 'Casa VGA', 'VGA_M02.jpg'),
(497, 'Casa VGA', 'VGA_M03.jpg'),
(499, 'Casa VGA', 'VGA_M04.jpg'),
(500, 'Casa VGA', 'VGA_M05.jpg'),
(508, 'Casa 4 Planos', 'LM_01.jpg'),
(623, 'Casa VH', 'IMG_4660.jpg'),
(622, 'Casa VH', 'IMG_4638.jpg'),
(518, 'Casa America', '01_Regulating.jpg'),
(520, 'Casa de Uno', 'IMG_1379.JPG'),
(531, 'Oficina DA', 'OSJ_01 Site Plan.jpg'),
(621, 'Casa VH', 'IMG_4573.jpg'),
(620, 'Casa VH', 'IMG_4550.jpg'),
(619, 'Casa VH', 'IMG_4534.jpg'),
(582, 'Casa MYA', 'MYA_A202.jpg'),
(618, 'Casa VH', 'IMG_4518.jpg'),
(617, 'Casa VH', 'IMG_4507.jpg'),
(616, 'Casa VH', 'IMG_4496.jpg'),
(615, 'Casa VH', 'IMG_4491.jpg'),
(614, 'Casa VH', 'IMG_4481.jpg'),
(613, 'Casa VH', 'IMG_4480.jpg'),
(551, 'Casa MYA', 'MYA_A102.jpg'),
(550, 'Casa MYA', 'MYA_A100.jpg'),
(549, 'Casa MYA', 'MYA_Esc.jpg'),
(553, 'Casa MYA', 'MYA_A201.jpg'),
(554, 'Casa Roja', '01_Sitting.jpg'),
(556, 'Casa Roja', '03_Seccionaurea.jpg'),
(557, 'Casa Roja', '04_CVD_A101.jpg'),
(558, 'Casa Roja', '05_CVD_A102.jpg'),
(559, 'Casa Roja', '06_CVD_A103.jpg'),
(560, 'Casa Roja', '07_CVD_A201.jpg'),
(561, 'Casa Roja', '08_CVD_AEsc.jpg'),
(562, 'Casa Roja', '09_VISTA 5 LR.jpg'),
(563, 'Casa Roja', '10_VISTA 2 LR.jpg'),
(564, 'Casa Roja', '11_VISTA 1 LR.jpg'),
(565, 'Casa Roja', '12_VISTA 6 LR.jpg'),
(612, 'Casa Roja', ' (6).jpg'),
(611, 'Casa Roja', ' (5).jpg'),
(610, 'Casa Roja', ' (4).jpg'),
(607, 'Casa Roja', ' (1).JPG'),
(608, 'Casa Roja', ' (2).jpg'),
(609, 'Casa Roja', ' (3).JPG'),
(600, 'Casa MYA', 'MYA_PV1_033.jpg'),
(599, 'Casa MYA', 'MYA_PV2_033.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `university_aca`
--

CREATE TABLE IF NOT EXISTS `university_aca` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `uni` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `university_aca`
--

INSERT INTO `university_aca` (`ID`, `uni`) VALUES
(6, 'UDEM'),
(7, 'UIA'),
(8, 'ISAD'),
(9, 'CMAS'),
(10, 'ITESM'),
(11, 'CEDIM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` mediumint(9) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `password` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `permiso` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `permiso`) VALUES
(1, 'adri', '123', '1'),
(2, 'Margarita', 'vacaloca', '1'),
(3, 'Ruben', 'toroloco', '1'),
(5, 'Abel', 'cocheazul', '1'),
(7, 'anapaulina', 'yellow.9', '1');

-- --------------------------------------------------------

--
-- Table structure for table `years_aca`
--

CREATE TABLE IF NOT EXISTS `years_aca` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `year` int(4) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `years_aca`
--

INSERT INTO `years_aca` (`ID`, `year`) VALUES
(3, 2010),
(5, 2009),
(6, 2008);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
