-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2021 at 06:23 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab1`
--

-- --------------------------------------------------------

--
-- Table structure for table `darbuotojas`
--

CREATE TABLE `darbuotojas` (
  `Vardas` varchar(255) NOT NULL,
  `Pavarde` varchar(255) NOT NULL,
  `Asmens_kodas` decimal(20,0) NOT NULL,
  `Gimimo_data` varchar(255) NOT NULL,
  `Alga` float NOT NULL,
  `Pareigos` varchar(255) NOT NULL,
  `Idarbinimo_data` varchar(255) NOT NULL,
  `id_Darbuotojas` int(11) NOT NULL,
  `fk_Gamintojasid_Gamintojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `darbuotojas`
--

INSERT INTO `darbuotojas` (`Vardas`, `Pavarde`, `Asmens_kodas`, `Gimimo_data`, `Alga`, `Pareigos`, `Idarbinimo_data`, `id_Darbuotojas`, `fk_Gamintojasid_Gamintojas`) VALUES
('Skipper', 'McCuis', '47507090806', '1975-07-09', 919, 'Sekretorius', '2019/02/25', 1, 1),
('Jorie', 'Cluney', '36405253540', '1964-05-25', 918, 'Sekretorius', '2018/04/11', 2, 4),
('Tatiana', 'Bewshea', '38411206120', '1984-11-20', 718, 'Valytojas', '2019/10/20', 3, 1),
('Homere', 'Lenoir', '36603225137', '1966-03-22', 688, 'Valytojas', '2019/05/25', 4, 2),
('Andrei', 'Klesl', '36607275141', '1966-07-27', 825, 'Operatorius', '2019/03/18', 5, 5),
('Haroun', 'Aime', '38703162238', '1987-03-16', 675, 'Eilinis darbuotojas', '2020/06/20', 6, 2),
('Marris', 'Petri', '37204080847', '1972-04-08', 917, 'Gamybos vadovas', '2018/08/12', 7, 5),
('Camila', 'Myford', '38710269348', '1987-10-26', 723, 'Eilinis darbuotojas', '2019/05/29', 8, 4),
('Hedwig', 'Atling', '36009061099', '1960-09-06', 674, 'Eilinis darbuotojas', '2018/06/05', 9, 1),
('Graeme', 'Mannagh', '39703274282', '1997-03-27', 677, 'Eilinis darbuotojas', '2020/04/27', 10, 2),
('Leah', 'Leathem', '36303100456', '1963-03-10', 688, 'Eilinis darbuotojas', '2019/04/07', 11, 5),
('Gaelan', 'Learmont', '39709270130', '1997-09-27', 805, 'Operatorius', '2020/03/03', 12, 1),
('Emylee', 'Eisak', '36703180322', '1967-03-18', 696, 'Eilinis darbuotojas', '2020/04/20', 13, 2),
('Willow', 'Perschke', '38103191349', '1981-03-19', 658, 'Valytojas', '2019/01/15', 14, 1),
('Hy', 'Whitehurst', '36709025371', '1967-09-02', 661, 'Valytojas', '2019/04/27', 15, 3),
('Corbet', 'Delong', '37208149129', '1972-08-14', 738, 'Valytojas', '2018/04/13', 16, 4),
('Winthrop', 'Brunnen', '47905067847', '1979-05-06', 722, 'Valytojas', '2018/04/03', 17, 2),
('Jeana', 'Upex', '38702180169', '1987-02-18', 694, 'Valytojas', '2019/04/27', 18, 1),
('Trula', 'Thomassen', '39111263680', '1991-11-26', 695, 'Valytojas', '2020/09/01', 19, 4),
('Hunter', 'Blincko', '36104140995', '1961-04-14', 673, 'Valytojas', '2019/09/14', 20, 3),
('Skell', 'Casbourne', '37601110796', '1976-01-11', 857, 'Operatorius', '2018/07/29', 21, 4),
('Ileana', 'Barnaby', '36405296246', '1964-05-29', 684, 'Eilinis darbuotojas', '2019/02/19', 22, 5),
('Gerrard', 'Sekulla', '37302232180', '1973-02-23', 936, 'Sekretorius', '2020/05/01', 23, 2),
('Whitney', 'Notman', '36110012288', '1961-10-01', 706, 'Eilinis darbuotojas', '2019/05/15', 24, 5),
('Zebadiah', 'Derwin', '37602104200', '1976-02-10', 724, 'Valytojas', '2019/05/10', 25, 3),
('Hadley', 'McEntegart', '47310026004', '1973-10-02', 646, 'Eilinis darbuotojas', '2018/09/24', 26, 5),
('Emera', 'Wixey', '37112095166', '1971-12-09', 704, 'Valytojas', '2018/07/21', 27, 5),
('Judd', 'Dunmuir', '36109277816', '1961-09-27', 666, 'Valytojas', '2020/10/28', 28, 1),
('Archy', 'Gonnelly', '36712035720', '1967-12-03', 861, 'Operatorius', '2018/07/09', 29, 4),
('Tabina', 'Mockford', '38006213436', '1980-06-21', 735, 'Eilinis darbuotojas', '2019/10/27', 30, 4),
('Audi', 'Tigwell', '37305192320', '1973-05-19', 703, 'Valytojas', '2018/07/22', 31, 1),
('Daisi', 'Monini', '36508235391', '1965-08-23', 672, 'Eilinis darbuotojas', '2020/07/16', 32, 5),
('Cobbie', 'Smithers', '38603063885', '1986-03-06', 710, 'Eilinis darbuotojas', '2019/07/11', 33, 1),
('Burtie', 'Lehrmann', '38301304619', '1983-01-30', 682, 'Valytojas', '2019/03/01', 34, 4),
('Salomone', 'Harbert', '37605264022', '1976-05-26', 657, 'Eilinis darbuotojas', '2018/04/19', 35, 4),
('Bar', 'Cotman', '36603088089', '1966-03-08', 865, 'Operatorius', '2019/02/16', 36, 2),
('Wendeline', 'Kirlin', '37503026784', '1975-03-02', 748, 'Eilinis darbuotojas', '2020/09/05', 37, 1),
('Forster', 'Wiffen', '48102166127', '1981-02-16', 668, 'Valytojas', '2019/10/24', 38, 4),
('Aime', 'Rhubottom', '38305013189', '1983-05-01', 940, 'Gamybos vadovas', '2019/09/18', 39, 2),
('Cort', 'Ajam', '36809044855', '1968-09-04', 706, 'Eilinis darbuotojas', '2020/09/17', 40, 2),
('Christophe', 'Wilce', '36507033567', '1965-07-03', 909, 'Sekretorius', '2020/08/02', 41, 4),
('Lavina', 'Hazeldene', '48003089288', '1980-03-08', 643, 'Valytojas', '2019/05/23', 42, 1),
('Abigale', 'Nares', '37005033956', '1970-05-03', 823, 'Operatorius', '2018/09/17', 43, 3),
('Gretna', 'Hoy', '38106056479', '1981-06-05', 735, 'Eilinis darbuotojas', '2020/01/10', 44, 5),
('Claresta', 'Bargery', '38307152026', '1983-07-15', 727, 'Eilinis darbuotojas', '2020/09/17', 45, 4),
('Orville', 'Twitchett', '38608123579', '1986-08-12', 704, 'Valytojas', '2020/02/18', 46, 4),
('Moll', 'Griffiths', '37601044203', '1976-01-04', 748, 'Eilinis darbuotojas', '2018/12/11', 47, 1),
('Tonnie', 'Ivanchin', '37510176983', '1975-10-17', 673, 'Eilinis darbuotojas', '2019/11/02', 48, 3),
('Georgeanne', 'Coryndon', '37611232846', '1976-11-23', 979, 'Sekretorius', '2018/11/01', 49, 3),
('Dorine', 'Conklin', '37204050673', '1972-04-05', 702, 'Eilinis darbuotojas', '2020/01/27', 50, 4),
('Babbette', 'O\'Spillane', '37101195073', '1971-01-19', 860, 'Operatorius', '2019/01/03', 51, 4),
('Abey', 'Truckell', '36004098214', '1960-04-09', 847, 'Operatorius', '2019/10/04', 52, 1),
('Genny', 'Govey', '39309109102', '1993-09-10', 738, 'Eilinis darbuotojas', '2020/08/23', 53, 3),
('Merline', 'Filyukov', '36501168976', '1965-01-16', 717, 'Eilinis darbuotojas', '2019/04/30', 54, 3),
('Jarrett', 'Wallice', '39611279876', '1996-11-27', 697, 'Valytojas', '2018/03/06', 55, 4),
('Ettie', 'Deviney', '46906026258', '1969-06-02', 676, 'Valytojas', '2019/09/16', 56, 1),
('Eal', 'Heild', '37103028598', '1971-03-02', 744, 'Eilinis darbuotojas', '2018/04/19', 57, 2),
('Dianne', 'Adrain', '37809106692', '1978-09-10', 788, 'Operatorius', '2019/03/31', 58, 1),
('Reamonn', 'Fenning', '38502109067', '1985-02-10', 820, 'Operatorius', '2020/09/11', 59, 2),
('Barney', 'Pitrasso', '36009037446', '1960-09-03', 718, 'Valytojas', '2021/02/27', 60, 5),
('Winne', 'Cavozzi', '47206249851', '1972-06-24', 695, 'Eilinis darbuotojas', '2019/05/11', 61, 2),
('Nefen', 'Dowden', '36910270586', '1969-10-27', 907, 'Sekretorius', '2020/05/22', 62, 5),
('Augy', 'Botly', '37109167980', '1971-09-16', 676, 'Eilinis darbuotojas', '2020/06/19', 63, 2),
('Randie', 'Goves', '37011106283', '1970-11-10', 659, 'Eilinis darbuotojas', '2020/06/29', 64, 4),
('Christopher', 'Corless', '36910249384', '1969-10-24', 728, 'Eilinis darbuotojas', '2019/10/09', 65, 1),
('Marv', 'Junifer', '37311011874', '1973-11-01', 793, 'Operatorius', '2018/09/05', 66, 3),
('Faith', 'Chsteney', '36608056074', '1966-08-05', 976, 'Sekretorius', '2020/01/23', 67, 5),
('Mari', 'Markus', '48303152505', '1983-03-15', 723, 'Valytojas', '2020/03/08', 68, 5),
('Gael', 'Frier', '38806109490', '1988-06-10', 664, 'Eilinis darbuotojas', '2019/01/27', 69, 4),
('Michael', 'Cutmare', '39103117822', '1991-03-11', 657, 'Valytojas', '2018/10/01', 70, 3),
('Lina', 'Matherson', '36210177770', '1962-10-17', 644, 'Valytojas', '2020/10/09', 71, 3),
('Roobbie', 'Yegorkov', '39606134814', '1996-06-13', 745, 'Eilinis darbuotojas', '2021/02/25', 72, 5),
('Adelaide', 'Freeth', '38608228040', '1986-08-22', 666, 'Eilinis darbuotojas', '2020/10/13', 73, 5),
('Skell', 'Taree', '36609197180', '1966-09-19', 963, 'Sekretorius', '2018/06/30', 74, 2),
('Babbette', 'Nottle', '37803188993', '1978-03-18', 696, 'Eilinis darbuotojas', '2019/04/04', 75, 1),
('Alene', 'Whetton', '36811017217', '1968-11-01', 708, 'Eilinis darbuotojas', '2019/12/19', 76, 1),
('Maris', 'Lorrie', '46705101695', '1967-05-10', 732, 'Valytojas', '2018/12/09', 77, 5),
('Gerick', 'Le Brun', '36410211389', '1964-10-21', 700, 'Valytojas', '2020/04/07', 78, 3),
('Anthony', 'Waddicor', '39412176683', '1994-12-17', 671, 'Eilinis darbuotojas', '2019/05/04', 79, 5),
('Aharon', 'Delieu', '46111151846', '1961-11-15', 767, 'Operatorius', '2019/05/16', 80, 2),
('Rebbecca', 'Sabine', '36207111553', '1962-07-11', 673, 'Valytojas', '2020/08/03', 81, 2),
('Nickolaus', 'Sallarie', '46907058641', '1969-07-05', 647, 'Eilinis darbuotojas', '2018/12/03', 82, 2),
('Vernice', 'Lyfe', '37105195101', '1971-05-19', 675, 'Valytojas', '2018/08/05', 83, 3),
('Lindy', 'Yerrell', '39810198490', '1998-10-19', 677, 'Eilinis darbuotojas', '2020/10/15', 84, 4),
('Tami', 'Veregan', '37202211939', '1972-02-21', 845, 'Operatorius', '2020/02/01', 85, 1),
('Valentine', 'Feldberger', '46210285529', '1962-10-28', 718, 'Eilinis darbuotojas', '2020/11/15', 86, 1),
('Merralee', 'O\'Scandall', '37711236840', '1977-11-23', 742, 'Valytojas', '2020/03/30', 87, 2),
('Rennie', 'Bertwistle', '39410084005', '1994-10-08', 812, 'Operatorius', '2019/02/05', 88, 1),
('Heather', 'Sealeaf', '47807133466', '1978-07-13', 661, 'Valytojas', '2020/06/08', 89, 5),
('Staffard', 'Klees', '37408126524', '1974-08-12', 743, 'Eilinis darbuotojas', '2020/09/19', 90, 1),
('Artemis', 'Klementz', '37701138215', '1977-01-13', 654, 'Eilinis darbuotojas', '2019/07/17', 91, 1),
('Hannie', 'Lease', '37109104080', '1971-09-10', 670, 'Valytojas', '2019/07/07', 92, 4),
('Taddeusz', 'Stockman', '36403144628', '1964-03-14', 729, 'Valytojas', '2018/04/12', 93, 1),
('Issi', 'Tevelov', '39106112666', '1991-06-11', 662, 'Valytojas', '2019/02/20', 94, 2),
('Keen', 'Klassman', '38111245417', '1981-11-24', 751, 'Operatorius', '2019/07/22', 95, 3),
('Goraud', 'Coldicott', '39704122477', '1997-04-12', 644, 'Eilinis darbuotojas', '2020/02/21', 96, 1),
('Adelbert', 'Aharoni', '39207311564', '1992-07-31', 712, 'Eilinis darbuotojas', '2020/01/31', 97, 2),
('Ogden', 'Vivyan', '47907268243', '1979-07-26', 728, 'Eilinis darbuotojas', '2019/01/28', 98, 3),
('Marchelle', 'Franzonello', '36307161008', '1963-07-16', 984, 'Sekretorius', '2020/06/28', 99, 1),
('Winna', 'Darlison', '38411113693', '1984-11-11', 1000, 'Sekretorius', '2019/01/19', 100, 2);

-- --------------------------------------------------------

--
-- Table structure for table `gamintojas`
--

CREATE TABLE `gamintojas` (
  `Pavadinimas` varchar(255) NOT NULL,
  `Imones_kodas` int(11) NOT NULL,
  `Miestas` varchar(255) NOT NULL,
  `Adresas` varchar(255) NOT NULL,
  `Vadovo_vardas` varchar(255) DEFAULT NULL,
  `Vadovo_pavarde` varchar(255) DEFAULT NULL,
  `id_Gamintojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gamintojas`
--

INSERT INTO `gamintojas` (`Pavadinimas`, `Imones_kodas`, `Miestas`, `Adresas`, `Vadovo_vardas`, `Vadovo_pavarde`, `id_Gamintojas`) VALUES
('Skanumynas', 757002367, 'Priekulė', '16443 Warbler Avenue', 'Lorine', 'Pugsley', 1),
('Mėsa Visiems', 850287480, 'Zarasai', '262 Scoville Pass', 'Raoul', 'Farmar', 2),
('YUMMY', 876394789, 'Rietavas', '7507 Blackbird Plaza', 'Georgie', 'Grioli', 3),
('Food4You', 388755182, 'Birzai', '01 Mifflin Avenue', 'Analiese', 'Bountiff', 4),
('Smells good', 149122972, 'Širvintos', '5 Anthes Terrace', 'Clywd', 'Faulkes', 5);

-- --------------------------------------------------------

--
-- Table structure for table `produktas`
--

CREATE TABLE `produktas` (
  `Pavadinimas` varchar(255) NOT NULL,
  `Svoris` float NOT NULL,
  `id_Produktas` int(11) NOT NULL,
  `fk_Gamintojasid_Gamintojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produktas`
--

INSERT INTO `produktas` (`Pavadinimas`, `Svoris`, `id_Produktas`, `fk_Gamintojasid_Gamintojas`) VALUES
('TastyFoodz', 0.3, 1, 4),
('Rūkyta vištienos krutinėlė', 2, 2, 2),
('Amtereo', 0.2, 3, 1),
('Natural bread', 0.9, 4, 5),
('YUMYUM', 0.15, 5, 3),
('Smaližius', 0.2, 6, 1),
('Premium meat', 0.5, 7, 2),
('Food+', 1, 8, 4),
('Inkariukas', 0.05, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tiekejas`
--

CREATE TABLE `tiekejas` (
  `Pavadinimas` varchar(255) NOT NULL,
  `Imones_kodas` int(11) NOT NULL,
  `Miestas` varchar(255) NOT NULL,
  `Adresas` varchar(255) NOT NULL,
  `Vadovo_vardas` varchar(255) DEFAULT NULL,
  `Vadovo_pavarde` varchar(255) DEFAULT NULL,
  `id_Tiekejas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tiekejas`
--

INSERT INTO `tiekejas` (`Pavadinimas`, `Imones_kodas`, `Miestas`, `Adresas`, `Vadovo_vardas`, `Vadovo_pavarde`, `id_Tiekejas`) VALUES
('Barrows-Luettgen', 146707277, 'Kybartai', '53 Reindahl Crossing', 'Eldridge', 'Giffon', 1),
('Monahan-Frami', 913758270, 'Rietavas', '8 Shoshone Avenue', 'Hatty', 'Jenik', 2),
('Pollich-Murazik', 334685569, 'Kulautuva', '873 Ridgeway Center', 'Alleen', 'Stubbin', 3),
('Brown', 347221454, 'Rūdiškės', '01 Pine View Drive', 'Fern', 'Skull', 4),
('Ruecker and Sons', 188300196, 'Birzai', '44 Northport Street', 'Sande', 'Divver', 5),
('Durgan', 428992944, 'Mazeikiai', '6 Truax Trail', 'Dinah', 'Sibbering', 6);

-- --------------------------------------------------------

--
-- Table structure for table `transportas`
--

CREATE TABLE `transportas` (
  `Transportuojanti_imone` varchar(255) NOT NULL,
  `Vairuotojo_vardas` varchar(255) NOT NULL,
  `Vairuotojo_pavarde` varchar(255) NOT NULL,
  `id_Reisas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transportas`
--

INSERT INTO `transportas` (`Transportuojanti_imone`, `Vairuotojo_vardas`, `Vairuotojo_pavarde`, `id_Reisas`) VALUES
('Mann, Schamberger and Barton', 'Nye', 'Jolly', 1),
('Hirthe Inc', 'Fonsie', 'Malinowski', 2),
('Yost and Sons', 'Pall', 'Mendus', 3),
('Bogan, Kreiger and Bauch', 'Kennan', 'MacMeanma', 4),
('Walter, Pfeffer and Predovic', 'Malena', 'Oliver-Paull', 5),
('Keebler, Flatley and Reichel', 'May', 'Glencorse', 6),
('Ullrich Group', 'Nikki', 'Van Merwe', 7),
('Luettgen, Bartell and Wilkinson', 'Letty', 'Jansa', 8),
('Pacocha-Prohaska', 'Frederique', 'Sloegrave', 9),
('Legros, Rolfson and Flatley', 'Jobi', 'Gillivrie', 10),
('Zboncak-Denesik', 'Andrey', 'Peaden', 11),
('Hoppe-Kessler', 'Annora', 'Graeser', 12),
('Fay-Batz', 'Gabrielle', 'Grumble', 13);

-- --------------------------------------------------------

--
-- Table structure for table `uzsako1`
--

CREATE TABLE `uzsako1` (
  `fk_Produktasid_Produktas` int(11) NOT NULL,
  `fk_Uzsakymas_gamintojuiid_Uzsakymas_gamintojui` int(11) NOT NULL,
  `Kiekis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uzsako1`
--

INSERT INTO `uzsako1` (`fk_Produktasid_Produktas`, `fk_Uzsakymas_gamintojuiid_Uzsakymas_gamintojui`, `Kiekis`) VALUES
(1, 2, 60),
(1, 9, 54),
(2, 11, 65),
(2, 13, 82),
(3, 12, 24),
(4, 10, 128),
(4, 14, 127),
(5, 8, 106),
(6, 3, 111),
(6, 5, 49),
(6, 6, 134),
(6, 12, 146),
(7, 7, 119),
(7, 11, 50),
(8, 2, 143),
(9, 1, 57),
(9, 4, 70),
(9, 15, 68);

-- --------------------------------------------------------

--
-- Table structure for table `uzsako2`
--

CREATE TABLE `uzsako2` (
  `fk_Uzsakymas_tiekejuiid_Uzsakymas_tiekejui` int(11) NOT NULL,
  `fk_Zaliavosid_Zaliavos` int(11) NOT NULL,
  `Svoris` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uzsako2`
--

INSERT INTO `uzsako2` (`fk_Uzsakymas_tiekejuiid_Uzsakymas_tiekejui`, `fk_Zaliavosid_Zaliavos`, `Svoris`) VALUES
(1, 2, 247.65),
(2, 4, 571.53),
(2, 7, 819.39),
(3, 2, 561.97),
(4, 5, 239.33),
(5, 4, 939.71),
(6, 1, 585.3),
(6, 2, 412.18),
(6, 8, 132.68),
(7, 6, 589.2),
(8, 7, 255.14),
(9, 2, 152.93),
(10, 5, 620.92),
(11, 7, 600.83),
(11, 8, 932.13),
(12, 1, 378.09),
(13, 1, 547.52),
(13, 4, 385.76),
(14, 8, 574.94),
(15, 7, 172.05);

-- --------------------------------------------------------

--
-- Table structure for table `uzsakovas`
--

CREATE TABLE `uzsakovas` (
  `Pavadinimas` varchar(255) NOT NULL,
  `Imones_kodas` int(11) NOT NULL,
  `Miestas` varchar(255) NOT NULL,
  `Adresas` varchar(255) NOT NULL,
  `Vadovo_vardas` varchar(255) DEFAULT NULL,
  `Vadovo_pavarde` varchar(255) DEFAULT NULL,
  `id_Uzsakovas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uzsakovas`
--

INSERT INTO `uzsakovas` (`Pavadinimas`, `Imones_kodas`, `Miestas`, `Adresas`, `Vadovo_vardas`, `Vadovo_pavarde`, `id_Uzsakovas`) VALUES
('Feest-Heaney', 498033555, 'Kupiskis', '344 Bunker Hill Hill', 'Irena', 'Hindhaugh', 1),
('Beatty Group', 237461106, 'Plateliai', '2132 Towne Place', 'Zackariah', 'McKnockiter', 2),
('Dicki and Sons', 718506314, 'Priekulė', '8641 Acker Terrace', 'Reagan', 'La Croce', 3);

-- --------------------------------------------------------

--
-- Table structure for table `uzsakymas_gamintojui`
--

CREATE TABLE `uzsakymas_gamintojui` (
  `id_Uzsakymas_gamintojui` int(11) NOT NULL,
  `Data` varchar(255) NOT NULL,
  `Kaina` float NOT NULL,
  `Terminas` varchar(255) NOT NULL,
  `fk_Uzsakovasid_Uzsakovas` int(11) NOT NULL,
  `fk_Reisasid_Reisas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uzsakymas_gamintojui`
--

INSERT INTO `uzsakymas_gamintojui` (`id_Uzsakymas_gamintojui`, `Data`, `Kaina`, `Terminas`, `fk_Uzsakovasid_Uzsakovas`, `fk_Reisasid_Reisas`) VALUES
(1, '2021-02-05', 646.15, '2021-04-28', 1, 12),
(2, '2021-02-10', 1785.68, '2021-03-16', 3, 7),
(3, '2021-02-11', 1555.23, '2021-04-15', 3, 4),
(4, '2021-01-27', 682.89, '2021-04-03', 1, 10),
(5, '2021-01-12', 315.35, '2021-03-22', 3, 4),
(6, '2021-02-16', 1682.44, '2021-04-06', 3, 6),
(7, '2021-02-22', 425.93, '2021-03-09', 2, 12),
(8, '2021-02-11', 1464.45, '2021-04-23', 1, 6),
(9, '2021-01-05', 338.76, '2021-03-30', 1, 12),
(10, '2021-01-28', 1713.55, '2021-03-10', 3, 8),
(11, '2021-01-28', 1893.72, '2021-04-27', 3, 6),
(12, '2021-02-27', 1933.99, '2021-03-20', 2, 13),
(13, '2021-02-26', 1442.28, '2021-03-18', 2, 7),
(14, '2021-01-26', 409.56, '2021-04-13', 1, 5),
(15, '2021-01-11', 982.06, '2021-04-24', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `uzsakymas_tiekejui`
--

CREATE TABLE `uzsakymas_tiekejui` (
  `id_Uzsakymas_tiekejui` int(11) NOT NULL,
  `Data` varchar(255) NOT NULL,
  `Kaina` float NOT NULL,
  `Terminas` varchar(255) NOT NULL,
  `fk_Reisasid_Reisas` int(11) NOT NULL,
  `fk_Tiekejasid_Tiekejas` int(11) NOT NULL,
  `fk_Gamintojasid_Gamintojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uzsakymas_tiekejui`
--

INSERT INTO `uzsakymas_tiekejui` (`id_Uzsakymas_tiekejui`, `Data`, `Kaina`, `Terminas`, `fk_Reisasid_Reisas`, `fk_Tiekejasid_Tiekejas`, `fk_Gamintojasid_Gamintojas`) VALUES
(1, '2021-01-14', 973.74, '2021-03-30', 8, 2, 3),
(2, '2021-02-14', 1688.13, '2021-04-07', 2, 2, 2),
(3, '2021-02-08', 780.02, '2021-04-22', 10, 1, 5),
(4, '2021-02-06', 1143.64, '2021-03-21', 7, 2, 2),
(5, '2021-01-01', 1316.98, '2021-03-26', 6, 2, 1),
(6, '2021-01-10', 341.8, '2021-04-19', 6, 2, 1),
(7, '2021-02-02', 1399.92, '2021-04-05', 13, 4, 1),
(8, '2021-02-27', 800.53, '2021-03-21', 12, 4, 2),
(9, '2021-01-04', 1045.49, '2021-04-25', 6, 6, 3),
(10, '2021-02-10', 618.6, '2021-04-06', 11, 5, 2),
(11, '2021-02-14', 1556.26, '2021-04-07', 4, 1, 5),
(12, '2021-01-20', 385.33, '2021-04-12', 9, 6, 5),
(13, '2021-01-28', 585.35, '2021-03-26', 13, 2, 5),
(14, '2021-01-07', 1416.28, '2021-04-13', 7, 4, 1),
(15, '2021-01-28', 1297.2, '2021-04-02', 13, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `zaliavos`
--

CREATE TABLE `zaliavos` (
  `Pavadinimas` varchar(255) NOT NULL,
  `id_Zaliavos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zaliavos`
--

INSERT INTO `zaliavos` (`Pavadinimas`, `id_Zaliavos`) VALUES
('Obuoliai', 1),
('Morkos', 2),
('Bulvės', 3),
('Pienas', 4),
('Kiauliena', 5),
('Vištiena', 6),
('Kviečiai', 7),
('Bananai', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `darbuotojas`
--
ALTER TABLE `darbuotojas`
  ADD PRIMARY KEY (`id_Darbuotojas`),
  ADD KEY `Dirba` (`fk_Gamintojasid_Gamintojas`);

--
-- Indexes for table `gamintojas`
--
ALTER TABLE `gamintojas`
  ADD PRIMARY KEY (`id_Gamintojas`);

--
-- Indexes for table `produktas`
--
ALTER TABLE `produktas`
  ADD PRIMARY KEY (`id_Produktas`),
  ADD KEY `Gamina` (`fk_Gamintojasid_Gamintojas`);

--
-- Indexes for table `tiekejas`
--
ALTER TABLE `tiekejas`
  ADD PRIMARY KEY (`id_Tiekejas`);

--
-- Indexes for table `transportas`
--
ALTER TABLE `transportas`
  ADD PRIMARY KEY (`id_Reisas`);

--
-- Indexes for table `uzsako1`
--
ALTER TABLE `uzsako1`
  ADD PRIMARY KEY (`fk_Produktasid_Produktas`,`fk_Uzsakymas_gamintojuiid_Uzsakymas_gamintojui`),
  ADD KEY `Uzsako11` (`fk_Uzsakymas_gamintojuiid_Uzsakymas_gamintojui`);

--
-- Indexes for table `uzsako2`
--
ALTER TABLE `uzsako2`
  ADD PRIMARY KEY (`fk_Uzsakymas_tiekejuiid_Uzsakymas_tiekejui`,`fk_Zaliavosid_Zaliavos`),
  ADD KEY `Uzsako21` (`fk_Zaliavosid_Zaliavos`);

--
-- Indexes for table `uzsakovas`
--
ALTER TABLE `uzsakovas`
  ADD PRIMARY KEY (`id_Uzsakovas`);

--
-- Indexes for table `uzsakymas_gamintojui`
--
ALTER TABLE `uzsakymas_gamintojui`
  ADD PRIMARY KEY (`id_Uzsakymas_gamintojui`),
  ADD KEY `Siuncia2` (`fk_Uzsakovasid_Uzsakovas`),
  ADD KEY `Ivykdo2` (`fk_Reisasid_Reisas`);

--
-- Indexes for table `uzsakymas_tiekejui`
--
ALTER TABLE `uzsakymas_tiekejui`
  ADD PRIMARY KEY (`id_Uzsakymas_tiekejui`),
  ADD KEY `Ivykdo1` (`fk_Reisasid_Reisas`),
  ADD KEY `Siunciamas` (`fk_Tiekejasid_Tiekejas`),
  ADD KEY `Siuncia1` (`fk_Gamintojasid_Gamintojas`);

--
-- Indexes for table `zaliavos`
--
ALTER TABLE `zaliavos`
  ADD PRIMARY KEY (`id_Zaliavos`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `darbuotojas`
--
ALTER TABLE `darbuotojas`
  MODIFY `id_Darbuotojas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `gamintojas`
--
ALTER TABLE `gamintojas`
  MODIFY `id_Gamintojas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produktas`
--
ALTER TABLE `produktas`
  MODIFY `id_Produktas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tiekejas`
--
ALTER TABLE `tiekejas`
  MODIFY `id_Tiekejas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transportas`
--
ALTER TABLE `transportas`
  MODIFY `id_Reisas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `uzsakovas`
--
ALTER TABLE `uzsakovas`
  MODIFY `id_Uzsakovas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uzsakymas_gamintojui`
--
ALTER TABLE `uzsakymas_gamintojui`
  MODIFY `id_Uzsakymas_gamintojui` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `uzsakymas_tiekejui`
--
ALTER TABLE `uzsakymas_tiekejui`
  MODIFY `id_Uzsakymas_tiekejui` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `zaliavos`
--
ALTER TABLE `zaliavos`
  MODIFY `id_Zaliavos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `darbuotojas`
--
ALTER TABLE `darbuotojas`
  ADD CONSTRAINT `Dirba` FOREIGN KEY (`fk_Gamintojasid_Gamintojas`) REFERENCES `gamintojas` (`id_Gamintojas`);

--
-- Constraints for table `produktas`
--
ALTER TABLE `produktas`
  ADD CONSTRAINT `Gamina` FOREIGN KEY (`fk_Gamintojasid_Gamintojas`) REFERENCES `gamintojas` (`id_Gamintojas`);

--
-- Constraints for table `uzsako1`
--
ALTER TABLE `uzsako1`
  ADD CONSTRAINT `Uzsako11` FOREIGN KEY (`fk_Uzsakymas_gamintojuiid_Uzsakymas_gamintojui`) REFERENCES `uzsakymas_gamintojui` (`id_Uzsakymas_gamintojui`),
  ADD CONSTRAINT `Uzsako12` FOREIGN KEY (`fk_Produktasid_Produktas`) REFERENCES `produktas` (`id_Produktas`);

--
-- Constraints for table `uzsako2`
--
ALTER TABLE `uzsako2`
  ADD CONSTRAINT `Uzsako21` FOREIGN KEY (`fk_Zaliavosid_Zaliavos`) REFERENCES `zaliavos` (`id_Zaliavos`),
  ADD CONSTRAINT `Uzsako22` FOREIGN KEY (`fk_Uzsakymas_tiekejuiid_Uzsakymas_tiekejui`) REFERENCES `uzsakymas_tiekejui` (`id_Uzsakymas_tiekejui`);

--
-- Constraints for table `uzsakymas_gamintojui`
--
ALTER TABLE `uzsakymas_gamintojui`
  ADD CONSTRAINT `Ivykdo2` FOREIGN KEY (`fk_Reisasid_Reisas`) REFERENCES `transportas` (`id_Reisas`),
  ADD CONSTRAINT `Siuncia2` FOREIGN KEY (`fk_Uzsakovasid_Uzsakovas`) REFERENCES `uzsakovas` (`id_Uzsakovas`);

--
-- Constraints for table `uzsakymas_tiekejui`
--
ALTER TABLE `uzsakymas_tiekejui`
  ADD CONSTRAINT `Ivykdo1` FOREIGN KEY (`fk_Reisasid_Reisas`) REFERENCES `transportas` (`id_Reisas`),
  ADD CONSTRAINT `Siuncia1` FOREIGN KEY (`fk_Gamintojasid_Gamintojas`) REFERENCES `gamintojas` (`id_Gamintojas`),
  ADD CONSTRAINT `Siunciamas` FOREIGN KEY (`fk_Tiekejasid_Tiekejas`) REFERENCES `tiekejas` (`id_Tiekejas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
