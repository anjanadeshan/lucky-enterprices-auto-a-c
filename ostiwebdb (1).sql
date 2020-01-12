-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2020 at 08:28 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ostiwebdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_name` varchar(20) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `securityq1` varchar(45) DEFAULT NULL,
  `securityq2` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cusid` int(11) NOT NULL,
  `customer_name` varchar(45) NOT NULL,
  `address` varchar(45) DEFAULT NULL,
  `phone_no` varchar(45) NOT NULL,
  `nic_no` varchar(15) NOT NULL,
  `vehicle_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `job_details`
--

CREATE TABLE `job_details` (
  `job_id` int(11) NOT NULL,
  `customer_name` varchar(45) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone_no` varchar(45) NOT NULL,
  `nic_no` varchar(15) NOT NULL,
  `vehicle_no` varchar(20) NOT NULL,
  `vehicle_model` varchar(45) NOT NULL,
  `vehicle_brand` varchar(45) DEFAULT NULL,
  `colour` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `Description` varchar(1000) DEFAULT NULL,
  `Remarks` varchar(1000) DEFAULT NULL,
  `bill_date` varchar(50) NOT NULL,
  `bill_time` varchar(45) DEFAULT NULL,
  `last_update` varchar(45) NOT NULL,
  `user` varchar(45) NOT NULL,
  `last_update_user` varchar(45) DEFAULT NULL,
  `job_Status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_details`
--

INSERT INTO `job_details` (`job_id`, `customer_name`, `address`, `phone_no`, `nic_no`, `vehicle_no`, `vehicle_model`, `vehicle_brand`, `colour`, `type`, `Description`, `Remarks`, `bill_date`, `bill_time`, `last_update`, `user`, `last_update_user`, `job_Status`) VALUES
(4, 'Anjana', 'Anjana', '59595678', 'asd', 'dasdf', 'Toyota', 'Toyota', 'Anjana', 'Van', '                                                                                                                                                                                                             ', '                                                                                                                                                                                                             ', '2018-10-03', '09:55:43 AM ', '2018/10/05 12:19:12 AM ', '', 'DESH', 'INPROGRESS'),
(5, 'Anjana', '', '119', '06', '112112', '', '', '', '', '', 'hsb iuhb', '2018-10-03', '04:10:41 PM ', '2018/10/03 04:10:41 PM ', 'DESH', NULL, 'INPROGRESS'),
(6, 'Anjana Deshan Sandeepa', 'Sudam		', '0777595678', '972652687V', 'UM-5254', 'Star Sport`', 'TVS', 'REd', 'BIKE', 'No	', 'nothing', '2018-10-03', '05:08:27 PM ', '2018/10/06 01:39:52 PM ', 'DESH', 'Thadi', 'FIXED-REPAIRED'),
(7, 'sfsf', '', '66412', 'sdfadf', '451121dg', '', '', '', '', '', '', '2018-10-03', '05:19:24 PM ', '2018/10/06 02:17:09 PM ', 'ASD', 'ANJANA', 'PAID-JOB DONE'),
(8, 'gargff', '', 'afsgafdgzfg', '', 'sdfgreg', '', '', '', '', '', '', '2018-10-03', '05:19:38 PM ', '2018/10/03 05:19:38 PM ', 'ASD', NULL, 'INPROGRESS'),
(9, 'DESH', '', '11212121212', '', '191919', '', '', '', '', '', '', '2018-10-03', '05:20:39 PM ', '2018/10/03 05:20:39 PM ', 'ASD', NULL, 'INPROGRESS'),
(10, 'Thadi', '*8', '93489', '9a5sd', '1245789', '', '', '', '', '', '', '2018-10-03', '07:17:56 PM ', '2018/10/03 07:17:56 PM ', 'DESH', NULL, 'INPROGRESS'),
(11, 'Chethana Jeewanthi De Silva ', '38/A2, Kandawatta, Kuda Waskaduwa, Waskaduwa.', '\"0715452691 0719987691\" ', '966080728V ', '1990', 'Van', 'Ambulace', 'White', 'Van', '38/A2, Kandawatta, Kuda Waskaduwa, Waskaduwa.\n38/A2, Kandawatta, Kuda Waskaduwa, Waskaduwa.\n38/A2, Kandawatta, Kuda Waskaduwa, Waskaduwa.\n', '38/A2, Kandawatta, Kuda Waskaduwa, Waskaduwa.\n38/A2, Kandawatta, Kuda Waskaduwa, Waskaduwa.\n', '2018-10-03', '10:54:48 PM ', '2019/01/31 01:41:07 PM ', '', '', 'PAID-JOB DONE'),
(12, 'Ishani Eranga Ramanayaka ', '9/26, Wiwekarama Rd, Kalutara North\n', '0763085097, 0776085249 ', '976560515V ', '7575', 'Dio', 'Honda', 'Black', 'BIKE', 'Kuruppu Arachchige Ishani Eranga Ramanayaka Kuruppu Arachchige Ishani Eranga Ramanayaka 9/26, Wiwekarama Rd, Kalutara North\n', '9/26, Wiwekarama Rd, Kalutara North\n9/26, Wiwekarama Rd, Kalutara North\n9/26, Wiwekarama Rd, Kalutara North\n9/26, Wiwekarama Rd, Kalutara North\n9/26, Wiwekarama Rd, Kalutara North\n9/26, Wiwekarama Rd, Kalutara North\n9/26, Wiwekarama Rd, Kalutara North\n9/26, Wiwekarama Rd, Kalutara North\n9/26, Wiwekarama Rd, Kalutara North\n9/26, Wiwekarama Rd, Kalutara North\n9/26, Wiwekarama Rd, Kalutara North\n9/26, Wiwekarama Rd, Kalutara North\n9/26, Wiwekarama Rd, Kalutara North\n9/26, Wiwekarama Rd, Kalutara North\n9/26, Wiwekarama Rd, Kalutara North\n', '2018-10-03', '10:58:24 PM ', '2018/10/03 10:58:24 PM ', 'anjana', NULL, 'FIXED-REPAIRED'),
(13, ' Hiran Anujitha Gunawardhana ', 'Paraduwa, Galpatha\n', '0766238811	034-2227470 ', '973122193V ', 'ekak na', 'DIO', ' HONDA', 'Yellow,White,Blue-White', 'BIKE', 'Paraduwa, GalpathaParaduwa, GalpathaParaduwa, Galpatha Hiran Anujitha Gunawardhana  Hiran Anujitha Gunawardhana  Hiran Anujitha Gunawardhana  Hiran Anujitha Gunawardhana  Hiran Anujitha Gunawardhana  Hiran Anujitha Gunawardhana  Hiran Anujitha Gunawardhana  Hiran Anujitha Gunawardhana  Hiran Anujitha Gunawardhana  Hiran Anujitha Gunawardhana  Hiran Anujitha Gunawardhana ', ' Hiran Anujitha Gunawardhana  Hiran Anujitha Gunawardhana  Hiran Anujitha Gunawardhana  Hiran Anujitha Gunawardhana  Hiran Anujitha Gunawardhana  Hiran Anujitha Gunawardhana  Hiran Anujitha Gunawardhana  Hiran Anujitha Gunawardhana ', '2018-10-03', '11:09:50 PM ', '2018/10/03 11:09:50 PM ', 'thadi', NULL, 'INPROGRESS'),
(14, 'Dhanush Madhushan ', '156/A, Wendesiwaththa, Weniwelkatiya, Nagoda, Kalutara\n', '0765618814, 0772706202 ', '993160970V ', '123 Bambala P', 'Hunk', 'Honda', 'Red-Black', 'BIKE', '156/A, Wendesiwaththa, Weniwelkatiya, Nagoda, Kalutara0765618814, 0772706202 0765618814, 0772706202 156/A, Wendesiwaththa, Weniwelkatiya, Nagoda, Kalutara0765618814, 0772706202 0765618814, 0772706202 ', '156/A, Wendesiwaththa, Weniwelkatiya, Nagoda, Kalutara0765618814, 0772706202 0765618814, 0772706202 156/A, Wendesiwaththa, Weniwelkatiya, Nagoda, Kalutara0765618814, 0772706202 0765618814, 0772706202 156/A, Wendesiwaththa, Weniwelkatiya, Nagoda, Kalutara0765618814, 0772706202 0765618814, 0772706202 ', '2018-10-03', '11:13:46 PM ', '2018/10/15 01:31:11 PM ', 'thadi', 'asd', 'FIXED-REPAIRED'),
(15, ' Pumuditha Sewwandi ', '127/B, Thisera Mw, Kothalawala, Bandaragama\n', '0775531208   038-2288564 ', '966222212V ', '29SRI-9726', 'Padi', 'Buddy', 'RED-White', 'VAN', '127/B, Thisera Mw, Kothalawala, Bandaragama\n127/B, Thisera Mw, Kothalawala, Bandaragama\n127/B, Thisera Mw, Kothalawala, Bandaragama\n127/B, Thisera Mw, Kothalawala, Bandaragama\n0775531208   038-2288564 0775531208   038-2288564 0775531208   038-2288564 0775531208   038-2288564 0775531208   038-2288564 0775531208   038-2288564 ', '127/B, Thisera Mw, Kothalawala, Bandaragama\n127/B, Thisera Mw, Kothalawala, Bandaragama\n127/B, Thisera Mw, Kothalawala, Bandaragama\n127/B, Thisera Mw, Kothalawala, Bandaragama\n0775531208   038-2288564 0775531208   038-2288564 0775531208   038-2288564 0775531208   038-2288564 0775531208   038-2288564 0775531208   038-2288564 127/B, Thisera Mw, Kothalawala, Bandaragama\n127/B, Thisera Mw, Kothalawala, Bandaragama\n127/B, Thisera Mw, Kothalawala, Bandaragama\n127/B, Thisera Mw, Kothalawala, Bandaragama\n0775531208   038-2288564 0775531208   038-2288564 0775531208   038-2288564 0775531208   038-2288564 0775531208   038-2288564 0775531208   038-2288564 ', '2018-10-03', '11:18:56 PM ', '2018/10/05 01:02:56 AM ', 'thadi', '', 'FIXED-REPAIRED'),
(16, 'Rusiru Nirmal Fernando ', '14, Thissa Mw, Walana, Panadura\n', '076650534	071-3046108 ', '982940249V ', '1011010110', '4Stroke Double Light', 'Bajab', 'red', 'Three wheel', '14, Thissa Mw, Walana, Panadura14, Thissa Mw, Walana, Panadura14, Thissa Mw, Walana, Panadura076650534	071-3046108 076650534	071-3046108 076650534	071-3046108 ', '14, Thissa Mw, Walana, Panadura14, Thissa Mw, Walana, Panadura14, Thissa Mw, Walana, Panadura076650534	071-3046108 076650534	071-3046108 076650534	071-3046108 14, Thissa Mw, Walana, Panadura14, Thissa Mw, Walana, Panadura14, Thissa Mw, Walana, Panadura076650534	071-3046108 076650534	071-3046108 076650534	071-3046108 14, Thissa Mw, Walana, Panadura14, Thissa Mw, Walana, Panadura14, Thissa Mw, Walana, Panadura076650534	071-3046108 076650534	071-3046108 076650534	071-3046108 ', '2018-10-03', '11:22:12 PM ', '2019/01/10 03:53:32 PM ', 'thadi', 'thadi', 'FIXED-REPAIRED'),
(17, 'Mithun Chamara Premarathne ', '\"Suvinda\", Pirivena Rd, Molligoda Wadduwa\n', '0773031288	038-2284864 ', '971081864V ', '111111111222222', 'J7 MAX', 'Samsung', 'Black', 'Phone', '\"Suvinda\", Pirivena Rd, Molligoda Wadduwa\n\"Suvinda\", Pirivena Rd, Molligoda Wadduwa\n\"Suvinda\", Pirivena Rd, Molligoda Wadduwa\n\"Suvinda\", Pirivena Rd, Molligoda Wadduwa\n\"Suvinda\", Pirivena Rd, Molligoda Wadduwa\n', '0773031288	038-2284864 0773031288	038-2284864 ', '2018-10-03', '11:24:33 PM ', '2018/10/03 11:24:33 PM ', 'thadi', NULL, 'INPROGRESS'),
(18, 'Thakshila Sandaruwan Perera ', '39, Bandaragama Rd, Bandaragama\n', '0756802519	038-2293131 ', '19980070735V ', 'abe-1025', 'Jade', 'Honda', 'Black', 'Bike', '39, Bandaragama Rd, Bandaragama39, Bandaragama Rd, Bandaragama39, Bandaragama Rd, Bandaragama39, Bandaragama Rd, Bandaragama39, Bandaragama Rd, Bandaragama39, Bandaragama Rd, Bandaragama39, Bandaragama Rd, Bandaragama39, Bandaragama Rd, Bandaragama39, Bandaragama Rd, Bandaragama39, Bandaragama Rd, Bandaragama39, Bandaragama Rd, Bandaragama39, Bandaragama Rd, Bandaragama39, Bandaragama Rd, Bandaragama', '0756802519	038-2293131 0756802519	038-2293131 0756802519	038-2293131 0756802519	038-2293131 0756802519	038-2293131 0756802519	038-2293131 0756802519	038-2293131 ', '2018-10-03', '11:26:08 PM ', '2018/10/03 11:26:08 PM ', 'thadi', NULL, 'INPROGRESS'),
(19, 'Sandun Chethana Silva ', '43, Aariyarathna Mw, Nagoda, Kalutara\n', '0711948333	304-2228670 ', '199835710820V ', 'zzzzzz-', 'Sleeply', 'zzzz', 'Black', 'DOI', '43, Aariyarathna Mw, Nagoda, Kalutara43, Aariyarathna Mw, Nagoda, Kalutara43, Aariyarathna Mw, Nagoda, Kalutara43, Aariyarathna Mw, Nagoda, Kalutara43, Aariyarathna Mw, Nagoda, Kalutara43, Aariyarathna Mw, Nagoda, Kalutara', '0711948333	304-2228670 0711948333	304-2228670 0711948333	304-2228670 0711948333	304-2228670 0711948333	304-2228670 ', '2018-10-03', '11:27:33 PM ', '2018/10/03 11:27:33 PM ', 'thadi', NULL, 'INPROGRESS'),
(20, 'Thadi2', '5191', '59+6589784', '', '5494', '848', '8484', '84', '48', '', '', '2018-10-04', '01:21:32 AM ', '2018/10/05 12:08:56 AM ', 'THADI', 'desh', 'FIXED-REPAIRED'),
(21, 'Ostin aiya', 'danna ', 'mataka na', '123456', '1990', 'Ambulance', 'bajaj', 'red', 'BIKE', 'hasbgd oahdf adbf hdbfhadofabdo fbadf', 'usdh ohzdf oadgf oaidbf iashd fbsdfbdd', '2018-10-05', '10:02:58 PM ', '2018/10/06 01:54:32 PM ', 'ANJANA', 'ANJANA', 'FIXED-REPAIRED'),
(22, 'koriyalatha', 'ashbxhbasb', '119', '95645252526', '121212', '655', 'bds c ', '321', '545', 'n sjsd', 'bdchjwdcjkndc			', '2018-10-06', '11:50:00 AM ', '2018/10/06 11:50:00 AM ', 'Thadi', NULL, 'INPROGRESS'),
(23, 'jhbjb', '', 'hjb', '', 'kjbknjn', '', '', '', '', '', '', '2018-10-06', '11:50:27 AM ', '2018/10/06 11:50:27 AM ', 'Thadi', NULL, 'INPROGRESS'),
(24, 'Chinthi Akka', 'molligoda', '0716820091', '817222918V', 'LA-2278', 'ysg', 'Vodka', 'White', 'Lorry', 'Ape MIss', 'Hari Hodai', '2018-10-06', '01:24:12 PM ', '2018/10/06 01:41:45 PM ', 'Thadi', 'ANJANA', 'FIXED-REPAIRED'),
(26, 'Tha', 'ciudsh', '121622433', '', '5494', '', '', '', '', 'hgvsv	', 'gduyg', '2018-10-06', '01:52:20 PM ', '2018/10/06 01:52:20 PM ', 'ANJANA', NULL, 'INPROGRESS'),
(27, 'Yasara Hansani', 'asdd', 'aadad', 'ad', '12145', '1021', '4578', '120', '4120', 'hjaksj	', '1021', '2018-10-13', '01:08:51 PM ', '2018/10/13 01:28:00 PM ', 'Thadi', 'thadi', 'INPROGRESS'),
(28, 'test1212121', '', '11991', '', '201', '', '', '', '', '', '', '2018-10-13', '01:28:24 PM ', '2018/10/13 01:28:24 PM ', 'thadi', NULL, 'INPROGRESS'),
(29, 'Kota', 'sdgdhf', '52525252', '102', '555k', '', 'jgfg', '', '', 'r', 'ytftftfytf', '2018-10-15', '01:27:48 PM ', '2018/10/15 01:29:33 PM ', 'asd', 'asd', 'FIXED-REPAIRED'),
(30, 'xdfbxfd', 'xdfbxf', 'bxfbxf', 'bxfbxfb', 'xfbxfg', '', 'b', '', '', '', '', '2019-01-10', '01:31:53 PM ', '2019/01/10 01:31:53 PM ', 'thadi', NULL, 'INPROGRESS'),
(31, 'testasd', 'test', '119119', '', '119119', '111111111', '1111111', '11111111', '11111111', 'test\n............', '111111111111111', '2019-01-10', '01:35:19 PM ', '2019/01/10 01:35:19 PM ', 'thadi', NULL, 'INPROGRESS'),
(32, 'vzdfvdf', 'vdfv', 'fvd', 'fv', 'dfv', 'vd', 'Cherry', '', '', '', '', '0000-00-00', NULL, '', 'test', NULL, ''),
(33, 'vzdfvdf', 'vdfv', 'fvd', 'fv', 'dfv', 'vd', 'Cherry', '', '', '', '', '0000-00-00', NULL, '', 'test', NULL, ''),
(34, 'vzdfvdf', 'vdfv', 'fvd', 'fv', 'dfv', 'vd', 'Cherry', '', '', '', '', '0000-00-00', NULL, '', 'test', NULL, ''),
(35, 'vzdfvdf', 'vdfv', 'fvd', 'fv', 'dfv', 'vd', 'Cherry', '', '', '', '', '0000-00-00', NULL, '', 'test', NULL, ''),
(36, 'vzdfvdf', 'vdfv', 'fvd', 'fv', 'dfv', 'vd', 'Cherry', '', '', '', '', '0000-00-00', NULL, '', '', NULL, ''),
(37, 'vzdfvdf', 'vdfv', 'fvd', 'fv', 'dfv', 'vd', 'Cherry', '', '', '', '', '0000-00-00', NULL, '', 'test', NULL, ''),
(38, 'vzdfvdf', 'vdfv', 'fvd', 'fv', 'dfv', 'vd', 'Cherry', '', '', '', '', '0000-00-00', NULL, '', 'test', NULL, ''),
(39, 'vzdfvdf', 'vdfv', 'fvd', 'fv', 'dfv', 'vd', 'Cherry', '', '', '', '', '0000-00-00', NULL, '', 'test', NULL, ''),
(40, 'vzdfvdf', 'vdfv', 'fvd', 'fv', 'dfv', 'vd', 'Cherry', '', '', '', '', '0000-00-00', NULL, '', 'test', NULL, ''),
(41, 'vzdfvdf', 'vdfv', 'fvd', 'fv', 'dfv', 'vd', 'Cherry', '', '', '', '', '0000-00-00', NULL, '', 'test', NULL, ''),
(42, 'vzdfvdf', 'vdfv', 'fvd', 'fv', 'dfv', 'vd', 'Cherry', '', '', '', '', '0000-00-00', NULL, '', 'test', NULL, ''),
(43, 'vzdfvdf', 'vdfv', 'fvd', 'fv', 'dfv', 'vd', 'Cherry', '', '', '', '', '0000-00-00', NULL, '', 'test', NULL, ''),
(44, 'da', 'dasd', 'asd', 'asd', 'csdc', 'cs', 'Suzuki', 'cc', 'Van', '                        zc                ', '           zxc                            ', '0000-00-00', NULL, '', 'test', NULL, 'INPROGRESS'),
(45, 'anjana', 'anjana', 'anjana', 'anjana', 'anjana', 'anjana', 'Toyota', 'anjana', 'Car', '                             XX           ', '                            ZXC            ', '', NULL, '', 'test', NULL, 'INPROGRESS'),
(46, 'anjana', 'anjana', 'anjana', 'anjana', 'anjana', 'anjana', 'Toyota', 'anjana', 'Car', '                             XX           ', '                            ZXC            ', '', NULL, '', 'test', NULL, 'INPROGRESS'),
(47, 'sd', 'sdf', 'fs', 'fs', 'fs', 'sfs', 'Honda', 'fs', 'Van', '                         fs               ', '            fs                            ', 'Sat Nov 09 2019|23:3', NULL, '', 'test', NULL, 'INPROGRESS'),
(48, 'sd', 'sdf', 'fs', 'fs', 'fs', 'sfs', 'Honda', 'fs', 'Van', '                         fs               ', '            fs                            ', 'Sat Nov 09 2019|23:3', NULL, '', 'test', NULL, 'INPROGRESS'),
(49, 'sd', 'sd', 'ds', 'd', 'fvdf', 'dvfv', 'Honda', 'vdf', 'Car', '                             vdfv           ', '             vdf                           ', 'Sat Nov 09 2019|23:3', NULL, '', 'test', NULL, 'FIXED-REPAIRED'),
(50, 'a', 'a', 'a', 'a', 'a', 'a', 'Nissan', 'a', 'Van', ' aa                                       ', 'a                                        ', 'Sat Nov 09 2019|23:40:51', NULL, '', 'test', NULL, 'INPROGRESS'),
(51, 'Anjana', 'AJnajnj', 'najnaj', 'najnj', 'asx', 'xasx', 'Volvo', 'vfvf', 'Bus', '                        grerg                ', '                   ergerg                     ', 'Tue Nov 19 2019|15:13:9', NULL, '', 'test', NULL, 'INPROGRESS'),
(52, 'test', 'test', 'et', 'test', 'test', 'test', 'Toyota', 'test', 'Car', '                    cdsc                    ', '    sdc                                    ', 'Tue Nov 19 2019|15:14:9', NULL, '', 'test', NULL, 'INPROGRESS'),
(53, 'cefc', 'rfcrfc', 'rfcrf', 'crfcrfcr', 'crfcrf', 'rcff', 'Toyota', 'crc', 'Car', '                  crf                      ', '                          crfc              ', 'Tue Nov 19 2019|15:15:28', NULL, '', 'test', NULL, 'INPROGRESS'),
(59, 'anja', 'anja', 'anja', 'asd', 'dasdf', 'anja', 'Toyota', 'red', 'SUV', '                                         ', '                                         ', '2018-10-03', NULL, '', 'test', NULL, 'FIXED-REPAIRED'),
(60, 'anja', 'a', 'asd', 'asd', 'dasdf', 'ss', 'Toyota', 'r', 'Van', '                                         ', '                                         ', '2018-10-03', NULL, '', 'test', NULL, 'FIXED-REPAIRED'),
(61, 'anja', 'aa', 'asd', 'asd', 'dasdf', 'a', 'BMW', 'a', 'SUV', '                                         ', '                                         ', '2018-10-03', NULL, '', 'test', NULL, 'FIXED-REPAIRED'),
(62, 'anja', 'aa', 'asd', 'asd', 'dasdf', 'a', 'BMW', 'a', 'SUV', '                                         ', '                                         ', '2018-10-03', NULL, '', 'test', NULL, 'FIXED-REPAIRED');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `s_question` varchar(100) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `last_login` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fname`, `lname`, `username`, `password`, `s_question`, `user_type`, `last_login`) VALUES
('Anjana', 'Deshan', 'anja', 'anja', '', 'Admin', NULL),
('anjana', 'deshan', 'anjana', 'anjana', '', 'Admin', NULL),
('anja', 'xasx', 'asx', 'asx', '', 'Admin', NULL),
('test', 'test', 'test', 'test', '', 'Admin', '2019-11-28 15:43:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `uid` int(11) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `User_password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`uid`, `user_name`, `User_password`) VALUES
(1, 'asd', 'asd'),
(2, 'ads', ''),
(3, 'desh', ''),
(4, 'anjana', '123'),
(5, 'thadi', '123'),
(6, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_login_history`
--

CREATE TABLE `user_login_history` (
  `ui_d` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(45) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_no` varchar(10) NOT NULL,
  `vehicle_model` varchar(45) DEFAULT NULL,
  `vehicle_brand` varchar(45) DEFAULT NULL,
  `colour` varchar(20) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `cusid` int(11) NOT NULL,
  `enum` enum('anjana','deshan') NOT NULL DEFAULT 'anjana',
  `vehiclecol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cusid`,`nic_no`,`vehicle_no`),
  ADD KEY `vehicle_no_idx` (`vehicle_no`);

--
-- Indexes for table `job_details`
--
ALTER TABLE `job_details`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `customer_name` (`customer_name`),
  ADD KEY `vehicle_no` (`vehicle_no`),
  ADD KEY `bill_date` (`bill_date`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`uid`,`user_name`);

--
-- Indexes for table `user_login_history`
--
ALTER TABLE `user_login_history`
  ADD PRIMARY KEY (`ui_d`),
  ADD KEY `uid_idx` (`ui_d`),
  ADD KEY `uid_idx1` (`user_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_no`,`cusid`),
  ADD KEY `cusid_idx` (`cusid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_details`
--
ALTER TABLE `job_details`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `vehicle_no` FOREIGN KEY (`vehicle_no`) REFERENCES `vehicle` (`vehicle_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `cusid` FOREIGN KEY (`cusid`) REFERENCES `customer` (`cusid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
