-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 08:55 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smoothwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `main_cname`
--

CREATE TABLE `main_cname` (
  `sl` int(11) NOT NULL,
  `cn` varchar(50) NOT NULL,
  `cad` varchar(100) NOT NULL,
  `dise_code` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `main_cname`
--

INSERT INTO `main_cname` (`sl`, `cn`, `cad`, `dise_code`) VALUES
(1, 'Smoothwork', 'Krishnagar, Nadia, State : West Bengal', '');

-- --------------------------------------------------------

--
-- Table structure for table `main_log`
--

CREATE TABLE `main_log` (
  `sl` double NOT NULL,
  `username` varchar(300) NOT NULL,
  `ip` varchar(300) NOT NULL,
  `intime` varchar(300) NOT NULL,
  `laccessed` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_log`
--

INSERT INTO `main_log` (`sl`, `username`, `ip`, `intime`, `laccessed`) VALUES
(1, 'admin', '::1', '2023-01-06 13:43:22 PM', '2023-01-06 13:43:22 PM'),
(2, 'admin', '::1', '2023-01-06 13:45:06 PM', '2023-01-06 13:45:06 PM'),
(3, 'admin', '192.168.0.107', '2023-03-02 06:49:52 AM', '2023-03-02 06:49:52 AM'),
(4, 'admin', '192.168.0.107', '2023-03-02 10:44:58 AM', '2023-03-02 10:44:58 AM'),
(5, 'admin', '192.168.0.162', '2023-03-11 05:39:25 AM', '2023-03-11 05:39:25 AM'),
(6, 'admin', '127.0.0.1', '2023-03-11 08:56:02 AM', '2023-03-11 08:56:02 AM'),
(7, 'admin', '::1', '2023-06-13 08:56:05 AM', '2023-06-13 08:56:05 AM'),
(8, '741404', '::1', '2023-06-14 08:16:56 AM', '2023-06-14 08:16:56 AM'),
(9, '741404', '192.168.1.169', '2023-08-03 10:32:51 AM', '2023-08-03 10:32:51 AM'),
(10, 'admin', '192.168.1.177', '2023-09-28 08:16:11 AM', '2023-09-28 08:16:11 AM'),
(11, 'admin', '192.168.1.161', '2023-09-28 09:04:09 AM', '2023-09-28 09:04:09 AM'),
(12, 'admin', '127.0.0.1', '2023-09-29 06:20:35 AM', '2023-09-29 06:20:35 AM'),
(13, 'admin', '192.168.1.22', '2023-09-29 06:37:29 AM', '2023-09-29 06:37:29 AM'),
(14, 'admin', '::1', '2023-10-09 07:00:39 AM', '2023-10-09 07:00:39 AM'),
(15, '741404', '127.0.0.1', '2023-10-09 08:07:46 AM', '2023-10-09 08:07:46 AM'),
(16, 'admin', '127.0.0.1', '2023-10-10 06:58:36 AM', '2023-10-10 06:58:36 AM'),
(17, 'admin', '127.0.0.1', '2023-10-10 12:47:07 PM', '2023-10-10 12:47:07 PM'),
(18, 'admin', '127.0.0.1', '2023-10-11 06:26:06 AM', '2023-10-11 06:26:06 AM');

-- --------------------------------------------------------

--
-- Table structure for table `main_menu`
--

CREATE TABLE `main_menu` (
  `sl` int(11) NOT NULL,
  `mnm` varchar(300) NOT NULL COMMENT 'Menu Name',
  `page` varchar(300) NOT NULL COMMENT 'Page URL',
  `rmsl` int(11) NOT NULL COMMENT 'Root Menu SL',
  `ordr` int(11) NOT NULL COMMENT 'Order',
  `adlvl` varchar(300) NOT NULL COMMENT 'Additional Value',
  `icon` varchar(300) NOT NULL DEFAULT 'fa-edit',
  `user` text NOT NULL,
  `isall` int(11) NOT NULL DEFAULT 0,
  `stat` int(11) NOT NULL,
  `eby` varchar(300) NOT NULL,
  `edt` date NOT NULL,
  `edtm` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_menu`
--

INSERT INTO `main_menu` (`sl`, `mnm`, `page`, `rmsl`, `ordr`, `adlvl`, `icon`, `user`, `isall`, `stat`, `eby`, `edt`, `edtm`) VALUES
(1, 'Dashboard', 'index.php', 0, 0, '', 'fa-home', '-1,5', 1, 0, 'admin', '2019-06-28', '2019-06-28 08:07:12 AM'),
(2, 'Setup', '#', 0, 1, '', 'fa-globe', '-1', 0, 0, 'admin', '2019-06-28', '2019-06-28 08:07:24 AM'),
(3, 'View', '#', 0, 4, '', 'fa-edit', '-1', 0, 0, 'admin', '2019-06-28', '2019-06-28 08:08:03 AM'),
(4, 'Config', '#', 0, 10, '', 'fa-cog', '-1', 0, 0, 'admin', '2019-06-28', '2019-06-28 08:08:17 AM'),
(11, 'Test Entry', 'test.php', 2, 1, '', 'fa-edit', '-1', 0, 0, 'admin', '2023-01-06', '2023-01-06 06:14:27 AM'),
(12, 'Menu Setup', 'menu_setup.php', 4, 1, '', 'fa-edit', '-1', 0, 0, 'admin', '2019-06-28', '2019-06-28 08:08:42 AM'),
(152, 'Branch', 'branch_entry.php', 154, 1, '', 'fa-edit', '5', 0, 0, 'admin', '2023-03-11', '2023-03-11 05:49:18 AM'),
(153, 'Shop', 'main_shop.php', 154, 2, '', 'fa-edit', '5', 0, 0, 'admin', '2023-03-11', '2023-03-11 05:50:59 AM'),
(154, 'Entry', '#', 0, 2, '', 'fa-edit', '5', 0, 0, 'admin', '2023-03-11', '2023-03-11 05:52:24 AM'),
(155, 'Barcode Entry', 'main_barcode.php', 154, 3, '', 'fa-edit', '5', 0, 0, 'admin', '2023-03-11', '2023-03-11 05:55:32 AM'),
(156, 'Photo Upload', 'test_photo.php', 2, 2, '', 'fa-edit', '-1', 0, 0, 'admin', '2023-09-27', '2023-09-27 13:19:00 PM'),
(157, 'Category', 'category.php', 2, 0, '', 'fa-edit', '-1', 0, 0, 'admin', '2023-09-28', '2023-09-28 13:55:57 PM'),
(158, 'Action', '#', 0, 3, '', 'fa-edit', '-1', 0, 0, 'admin', '2023-09-29', '2023-09-29 06:23:18 AM'),
(159, 'Service Setup', 'service_setup.php', 2, 5, '', 'fa-edit', '5', 0, 0, 'admin', '2023-10-09', '2023-10-09 07:27:30 AM'),
(160, 'Employee Setup', 'empsetup.php', 2, 4, '', 'fa-edit', '5', 0, 0, 'admin', '2023-10-09', '2023-10-09 07:51:29 AM'),
(161, 'View Service', 'view_service.php', 3, 1, '', 'fa-edit', '5', 0, 0, 'admin', '2023-10-09', '2023-10-09 07:56:50 AM'),
(162, 'Order', 'b_order.php', 3, 2, '', 'fa-edit', '5', 0, 0, 'admin', '2023-10-09', '2023-10-09 08:02:31 AM'),
(164, 'Joining Request', 'joinreq.php', 3, 1, '', 'fa-edit', '-1', 0, 0, 'admin', '2023-10-11', '2023-10-11 08:04:49 AM'),
(165, 'Listen Companies', 'listcomp.php', 3, 2, '', 'fa-edit', '-1', 0, 0, 'admin', '2023-10-11', '2023-10-11 08:06:20 AM');

-- --------------------------------------------------------

--
-- Table structure for table `main_service_category`
--

CREATE TABLE `main_service_category` (
  `sl` int(11) NOT NULL,
  `cat_id` varchar(255) NOT NULL,
  `cat_nm` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL DEFAULT '0',
  `edt` varchar(255) NOT NULL,
  `edtm` varchar(255) NOT NULL,
  `eby` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_service_category`
--

INSERT INTO `main_service_category` (`sl`, `cat_id`, `cat_nm`, `stat`, `edt`, `edtm`, `eby`) VALUES
(1, 'cat0', 'Sports', '0', '2023-10-10', '2023-10-10 07:53:34', 'admin'),
(2, 'cat1', 'Food', '0', '2023-10-10', '2023-10-10 07:52:43', 'admin'),
(3, 'cat2', 'fashion', '0', '2023-10-10', '2023-10-10 07:53:07', 'admin'),
(4, 'cat3', 'Technology', '0', '2023-10-11', '2023-10-11 07:41:22', '');

-- --------------------------------------------------------

--
-- Table structure for table `main_service_provider`
--

CREATE TABLE `main_service_provider` (
  `sl` int(11) NOT NULL,
  `bissid` varchar(255) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `oname` varchar(255) NOT NULL,
  `servcat` varchar(255) NOT NULL,
  `profadd` varchar(255) NOT NULL,
  `noem` varchar(255) NOT NULL,
  `govid` varchar(255) NOT NULL,
  `offcnum` varchar(255) NOT NULL,
  `offweb` varchar(255) NOT NULL,
  `logpas` varchar(255) NOT NULL,
  `confopas` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT -1,
  `edt` varchar(255) NOT NULL,
  `edtm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_service_provider`
--

INSERT INTO `main_service_provider` (`sl`, `bissid`, `cname`, `oname`, `servcat`, `profadd`, `noem`, `govid`, `offcnum`, `offweb`, `logpas`, `confopas`, `status`, `edt`, `edtm`) VALUES
(1, '23cat30', 'Apple', 'Steve jobs', 'cat3', 'california', '636', '85f2ff54', '7444110258', 'www.apple.com', '123', '123', 5, '2023-10-11', '2023-10-11 11:12:05'),
(2, '23cat31', 'Microsft', 'bill gates', 'cat3', 'california', '74', '6363rter', '7896541230', 'microsoft.com', '123', '123', 5, '2023-10-11', '2023-10-11 11:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `main_signup`
--

CREATE TABLE `main_signup` (
  `sl` double NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `pass` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `fnm` varchar(333) NOT NULL,
  `lnm` varchar(333) NOT NULL,
  `mob` varchar(15) NOT NULL,
  `mailadres` varchar(100) DEFAULT NULL,
  `reg` varchar(33) NOT NULL,
  `council` varchar(333) NOT NULL,
  `state` varchar(33) NOT NULL,
  `actnum` int(11) NOT NULL DEFAULT 0,
  `userlevel` tinyint(4) DEFAULT NULL,
  `signupdate` varchar(100) DEFAULT NULL,
  `lastlogin` varchar(100) DEFAULT NULL,
  `ip` varchar(100) NOT NULL,
  `lastloginfail` bigint(20) DEFAULT NULL,
  `numloginfail` tinyint(4) DEFAULT NULL,
  `noofdownload` int(11) NOT NULL,
  `reqscheme` text NOT NULL,
  `dev_id` text NOT NULL,
  `stat` int(11) NOT NULL,
  `otp` varchar(333) NOT NULL,
  `noofreq` int(11) NOT NULL,
  `reqdt` date NOT NULL,
  `reqdtm` datetime NOT NULL,
  `sms` int(11) NOT NULL DEFAULT 0,
  `eby` varchar(300) NOT NULL,
  `edt` date NOT NULL,
  `edtm` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `main_signup`
--

INSERT INTO `main_signup` (`sl`, `username`, `password`, `pass`, `name`, `fnm`, `lnm`, `mob`, `mailadres`, `reg`, `council`, `state`, `actnum`, `userlevel`, `signupdate`, `lastlogin`, `ip`, `lastloginfail`, `numloginfail`, `noofdownload`, `reqscheme`, `dev_id`, `stat`, `otp`, `noofreq`, `reqdt`, `reqdtm`, `sms`, `eby`, `edt`, `edtm`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'Administrator', '', '1234567890', 'test@ons.com', '', '', '', 0, -1, NULL, '2023-10-11 06:26:06 AM', '103.86.23.37', NULL, 0, 0, '', '', 1, '', 0, '0000-00-00', '0000-00-00 00:00:00', 1, 'admin', '2019-06-20', '2019-06-20 09:33:47 AM'),
(285, '741404', '123', '202cb962ac59075b964b07152d234b70', 'krishnanagar', 'krishnanagar', '', '', NULL, '', '', '', 0, 5, NULL, '2023-10-09 08:07:46 AM', '', NULL, 0, 0, '', '', 0, '', 0, '0000-00-00', '0000-00-00 00:00:00', 0, 'admin', '2023-03-11', '2023-03-11 09:08:33 AM');

-- --------------------------------------------------------

--
-- Table structure for table `main_test`
--

CREATE TABLE `main_test` (
  `sl` int(11) NOT NULL,
  `ttl` varchar(333) NOT NULL,
  `edt` date NOT NULL,
  `edtm` varchar(300) NOT NULL,
  `eby` varchar(300) NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_test`
--

INSERT INTO `main_test` (`sl`, `ttl`, `edt`, `edtm`, `eby`, `stat`) VALUES
(1, 'TEST 15', '2023-03-02', '2023-03-02 10:45:16 AM', 'admin', 1),
(2, 'TEST 2', '2022-03-01', '2022-03-01 12:16:02 PM', 'admin', 0),
(13, 'TEST 38', '2023-03-02', '2023-03-02 10:45:25 AM', 'admin', 0),
(14, 'test 123', '2023-03-11', '2023-03-11 08:52:03 AM', 'admin', 0),
(15, 'TEST 13', '2023-03-11', '2023-03-11 09:11:57 AM', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `main_test_photo`
--

CREATE TABLE `main_test_photo` (
  `sl` double NOT NULL,
  `ttl` text COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `eby` text COLLATE utf8_unicode_ci NOT NULL,
  `edt` date NOT NULL,
  `edtm` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `actn` varchar(333) COLLATE utf8_unicode_ci NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `main_test_photo`
--

INSERT INTO `main_test_photo` (`sl`, `ttl`, `url`, `eby`, `edt`, `edtm`, `actn`, `stat`) VALUES
(2, 'Name 14', 'images/banner/2.png', 'admin', '2023-09-27', '2023-09-27 01:46:55 PM', '', 0),
(3, 'Name 2', '', 'admin', '2023-09-27', '2023-09-27 01:52:16 PM', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `main_user_typ`
--

CREATE TABLE `main_user_typ` (
  `sl` int(11) NOT NULL,
  `typ` varchar(333) NOT NULL,
  `lvl` varchar(333) NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_user_typ`
--

INSERT INTO `main_user_typ` (`sl`, `typ`, `lvl`, `stat`) VALUES
(-1, 'admin', '-1', 0),
(1, 'Busniess', '5', 0),
(2, 'Service Provider', '10', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `main_cname`
--
ALTER TABLE `main_cname`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `main_log`
--
ALTER TABLE `main_log`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `main_menu`
--
ALTER TABLE `main_menu`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `main_service_category`
--
ALTER TABLE `main_service_category`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `main_service_provider`
--
ALTER TABLE `main_service_provider`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `main_signup`
--
ALTER TABLE `main_signup`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `main_test`
--
ALTER TABLE `main_test`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `main_test_photo`
--
ALTER TABLE `main_test_photo`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `main_user_typ`
--
ALTER TABLE `main_user_typ`
  ADD PRIMARY KEY (`sl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `main_cname`
--
ALTER TABLE `main_cname`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `main_log`
--
ALTER TABLE `main_log`
  MODIFY `sl` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `main_menu`
--
ALTER TABLE `main_menu`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `main_service_category`
--
ALTER TABLE `main_service_category`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `main_service_provider`
--
ALTER TABLE `main_service_provider`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `main_signup`
--
ALTER TABLE `main_signup`
  MODIFY `sl` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `main_test`
--
ALTER TABLE `main_test`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `main_test_photo`
--
ALTER TABLE `main_test_photo`
  MODIFY `sl` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `main_user_typ`
--
ALTER TABLE `main_user_typ`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
