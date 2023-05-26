-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2022 at 11:49 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 8979555558, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-10-11 04:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `tblbookdarshan`
--

CREATE TABLE `tblbookdarshan` (
  `ID` int(5) NOT NULL,
  `BookingNumber` int(10) DEFAULT NULL,
  `UserID` int(5) DEFAULT NULL,
  `TempleID` int(5) DEFAULT NULL,
  `DateofDarshan` date DEFAULT NULL,
  `TimeofDarshan` time DEFAULT NULL,
  `TotalMember` int(10) DEFAULT NULL,
  `City` varchar(250) DEFAULT NULL,
  `State` varchar(250) DEFAULT NULL,
  `Country` varchar(250) DEFAULT NULL,
  `IdentityProof` varchar(250) DEFAULT NULL,
  `IdentityProofnumber` int(10) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `BookingDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbookdarshan`
--

INSERT INTO `tblbookdarshan` (`ID`, `BookingNumber`, `UserID`, `TempleID`, `DateofDarshan`, `TimeofDarshan`, `TotalMember`, `City`, `State`, `Country`, `IdentityProof`, `IdentityProofnumber`, `Message`, `BookingDate`, `Remark`, `Status`, `UpdationDate`) VALUES
(1, 174264887, 1, 1, '2022-04-02', '09:00:00', 5, 'Ghaziabad', 'UP', 'India', 'Adhar Card', 45464646, ' Ghjgjheyruiery', '2022-03-26 12:10:22', '', 'Accepted', '2022-03-30 12:48:28'),
(2, 833719675, 1, 1, '2022-03-28', '18:45:00', 10, 'Allahabad', 'UP', 'India', 'Voter Card', 457956, ' yuhjbjgjesrt', '2022-03-26 12:24:31', '', 'Rejected', '2022-03-30 12:48:28'),
(3, 399004895, 2, 5, '2022-04-10', '18:41:00', 10, 'Mumbai', 'Maharastra', 'India', 'Voter Card', 0, ' Kindly provide dhramsala too', '2022-04-02 08:20:11', NULL, NULL, '2022-04-02 08:20:11'),
(4, 179174548, 3, 1, '2022-04-22', '18:35:00', 4, 'Noida', 'UP', 'INdia', 'Adhar Card', 2147483647, ' NA', '2022-04-09 08:59:30', '', 'Accepted', '2022-04-09 08:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbldonation`
--

CREATE TABLE `tbldonation` (
  `ID` int(5) NOT NULL,
  `DonationNumber` int(10) DEFAULT NULL,
  `UserID` int(5) DEFAULT NULL,
  `TempleID` int(5) DEFAULT NULL,
  `City` varchar(250) DEFAULT NULL,
  `State` varchar(250) DEFAULT NULL,
  `Country` varchar(250) DEFAULT NULL,
  `PANNumber` varchar(200) DEFAULT NULL,
  `DonationAmount` decimal(10,0) DEFAULT NULL,
  `PaymentOption` varchar(50) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `DonationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldonation`
--

INSERT INTO `tbldonation` (`ID`, `DonationNumber`, `UserID`, `TempleID`, `City`, `State`, `Country`, `PANNumber`, `DonationAmount`, `PaymentOption`, `Message`, `DonationDate`) VALUES
(1, 255885030, 1, 1, 'Allhabad', 'UP', 'India', 'jk789989iuo', '10000', 'Wallet', ' hkyiuewyruiwvbtiut', '2022-03-26 13:34:16'),
(2, 434774268, 1, 1, 'Allahabd', 'UP', 'India', 'hjg878979', '1200', 'UPI', ' khiuytuetgwqurcr4t', '2022-04-01 04:53:42'),
(3, 184472929, 1, 5, 'Allhabad', 'UP', 'INdia', 'iuyi78787', '4500', 'Wallet', ' iyuyiuywiucy biry4ct874t45', '2022-04-01 04:54:19'),
(4, 330480819, 2, 1, 'Mumbai', 'Maharastra', 'India', 'KI7877979', '10000', 'Wallet', ' Har Har Mahadev', '2022-04-02 06:07:34'),
(5, 978081478, 3, 1, 'Noida', 'UP', 'India', 'BSGHG1232H', '21000', 'Cash', ' NA', '2022-04-09 09:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `tblfestivals`
--

CREATE TABLE `tblfestivals` (
  `ID` int(5) NOT NULL,
  `TempleID` int(5) DEFAULT NULL,
  `FestivalName` varchar(250) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Day` varchar(250) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `TempleImage1` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfestivals`
--

INSERT INTO `tblfestivals` (`ID`, `TempleID`, `FestivalName`, `Date`, `Day`, `Description`, `TempleImage1`, `CreationDate`) VALUES
(1, 4, 'Shri Ram Navami', '2022-04-09', 'Saturday', 'The three main festivals are celebrated in Shirdi. They are Ramnavami (March/April), Guru Purnima (July),and Vijayadashami (September). These festivals are celebrated with great passion, verve and he artfulness. There is a programme of puja, music (bhajan) public parayana (reading of scriptures and devotional texts) and exuberant processions with the palanquin and the Rath (Chariot). The Samadhi Mandir remains open all night during one of these days with Dwarkamai being open the previous night and there are all night bhajan and qawali sessions at various locations in the village. Printed programmes with full details are available at the Sansthan Office.', '2e44a4514275349c8b81cb196f316108.png', '2022-03-25 05:31:39'),
(2, 6, 'Shri Ram Navami', '2022-04-09', 'Saturdays', 'The three main festivals are celebrated in Shirdi. They are Ramnavami (March/April), Guru Purnima (July),and Vijayadashami (September). These festivals are celebrated with great passion, verve and he artfulness. There is a programme of puja, music (bhajan) public parayana (reading of scriptures and devotional texts) and exuberant processions with the palanquin and the Rath (Chariot). The Samadhi Mandir remains open all night during one of these days with Dwarkamai being open the previous night and there are all night bhajan and qawali sessions at various locations in the village. Printed programmes with full details are available at the Sansthan Office.', 'a25fd69919fb491062074c53813d7171.png', '2022-03-25 05:32:22'),
(4, 4, 'Shri Ram Navami', '2022-04-09', 'Saturday', 'The three main festivals are celebrated in Shirdi. They are Ramnavami (March/April), Guru Purnima (July),and Vijayadashami (September). These festivals are celebrated with great passion, verve and he artfulness. There is a programme of puja, music (bhajan) public parayana (reading of scriptures and devotional texts) and exuberant processions with the palanquin and the Rath (Chariot). The Samadhi Mandir remains open all night during one of these days with Dwarkamai being open the previous night and there are all night bhajan and qawali sessions at various locations in the village. Printed programmes with full details are available at the Sansthan Office.', '2e44a4514275349c8b81cb196f316108.png', '2022-03-25 05:31:39'),
(5, 1, 'Holi', '2022-03-19', 'Wednesday', 'Holi is a popular ancient Hindu festival, also known as the Festival of Spring, the Festival of Colours or the Festival of Love. The festival celebrates the eternal and divine love of Radha Krishna.', '4ab44c3651d0fba97063db47278dc41c.jpg', '2022-04-02 05:43:54');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About Us', '<div style=\"text-align: center;\"><b style=\"color: rgb(32, 33, 36); font-family: arial, sans-serif;\"><font size=\"6\">Online Temple Management System</font></b></div><div style=\"text-align: justify;\"><span style=\"color: rgb(51, 51, 51); font-family: Raleway, sans-serif; text-align: start; background-color: rgb(251, 251, 251);\"><font size=\"4\">Offering Pujas to murtis of Ganesha, Muruga and Shiva, it was founded on the traditions of Saiva Siddhanta and known as the Palaniswami Sivan Temple. It quickly became a popular site for the ever growing populace of newly arriving Hindus, some of whom personally knew of the Sage from Sri Lanka, YogaSwami, who initiated the American Guru. grow over the years, and on traditional festival days, the small temple could hardly accomodate the crowd of devotees. In 1988, to better facilitate the Hindu community, the temple was moved to a larger site in Concord, CA. The site was chosen due to availability and the fact that it had always been a place of worship.</font></span></div><div style=\"text-align: justify;\"><font size=\"4\"><span style=\"color: rgb(51, 51, 51); font-family: Raleway, sans-serif; text-align: start; background-color: rgb(251, 251, 251);\">The Temple has brouht the priest form all of India&nbsp;</span><span style=\"background-color: rgb(251, 251, 251); color: rgb(51, 51, 51); font-family: Raleway, sans-serif; text-align: left;\">&nbsp;</span><span style=\"background-color: rgb(251, 251, 251); color: rgb(51, 51, 51); font-family: Raleway, sans-serif; text-align: left;\">to oversee the daily rituals.</span><span style=\"background-color: rgb(251, 251, 251); color: rgb(51, 51, 51); font-family: Raleway, sans-serif; text-align: left;\">The first few years have been most generally spent in maintaining the buildings and a dependable schedule of religious events.</span></font></div>', NULL, NULL, NULL),
(2, 'contactus', 'Contact Us', '890,Sector 62, Gyan Sarovar, GAIL Noida(Delhi/NCR)', 'test@gmail.com', 7896541236, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbltemple`
--

CREATE TABLE `tbltemple` (
  `ID` int(5) NOT NULL,
  `TempleName` varchar(250) DEFAULT NULL,
  `TempleLocation` varchar(250) DEFAULT NULL,
  `City` varchar(250) DEFAULT NULL,
  `State` varchar(250) DEFAULT NULL,
  `Country` varchar(250) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `TempleImage1` varchar(250) DEFAULT NULL,
  `TempleImage2` varchar(250) DEFAULT NULL,
  `TempleImage3` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltemple`
--

INSERT INTO `tbltemple` (`ID`, `TempleName`, `TempleLocation`, `City`, `State`, `Country`, `Description`, `TempleImage1`, `TempleImage2`, `TempleImage3`, `CreationDate`) VALUES
(1, 'Kashi Vishwanath Temple', ' Kashi Vishwanath temple is located almost 5 km away from the Varanasi railway station and almost 6 km from the BHU.', 'Varanasi', 'UP', 'India', 'Kashi Vishwanath Temple is one of the most famous temple in Varanasi, also known as the Golden temple dedicated to the Lord Shiva. It was constructed in the year 1780 by the Maratha monarch, Maharani Ahilyabai Holkar of the Indore. This makes Varanasi a tourists place because of great religious importance to the Hindus. The gold used to cover the two domes of the temple was donated by the Punjab Kesari, the Sikh Maharaja Ranjit Singh, who ruled the Punjab. Now, after 28 January 1983, this temple becomes the property of the government of Uttar Pradesh and it is managed by Dr. Vibhuti Narayan Singh, then by the Kashi Naresh.\r\n\r\nCurrent structure built in: 1780\r\nCreator: Maharani Ahilyabai Holkar\r\n\r\nOpening time of the temple is: 3:00 am\r\n\r\nAarti time:\r\nMangala Aarti : 3 AM- 4 AM (Morning)\r\nBhog Aarti : 11.15 AM to 12.20 PM (Day)\r\nSandhya Aarti : 7 PM to 8.15 PM (Evening)\r\nShringar Aarti : 9 PM to 10.15 PM (Night)\r\nShayan Aarti : 10.30 PM â€“ 11 PM (Night)\r\n\r\nHow to reach to the temple: You can reach to the temple by having an auto rickshaw or taxi.', 'e927bc866b006ec9c5362f644f60f228.jpg', 'c83fb009af149ebe58c86fa9d694d95a.jpg', '01302c879592762d0e6debece6574b7c.jpg', '2022-03-24 11:10:07'),
(4, 'Shirdi Sai Temple', 'Located in Ahmednagar district of Maharashtra', 'Nashik', 'Maharashtra', 'India', 'Shirdi is a major religious site in the Indian state of Maharashtra, located near Nashik. It is famous as the â€œland of Saiâ€. Shirdi is the home of the great saint Sai Baba where various temples are built, besides the famous Sai Baba temple and some historical sites. Located in Ahmednagar district of Maharashtra, Shirdi is a very sacred and pilgrimage place for the devotees of Sai Baba, where a large number of devotees come to visit every year.', '53ba34d755d1bbefcb7edb2f8faff5b1.jpg', 'abe7dc9dd47a95fae986698e2a4a2b7c.jpg', '96e0e05b7160d8fa1170206bd9fc736e.jpg', '2022-03-24 11:24:57'),
(5, 'Konark Temple', 'Temple is located in an eponymous village (now NAC Area) about 35 kilometres (22 mi) northeast of Puri and 65 kilometres (40 mi) southeast of Bhubaneswar on the Bay of Bengal coastline in the Indian state of Odisha. The nearest airport is Biju Patnai', 'Puri', 'Odisha', 'India', 'The temple plan includes all the traditional elements of a Hindu temple set on a square plan. According to Kapila Vatsyayan, the ground plan, as well the layout of sculptures and reliefs, follow the square and circle geometry, forms found in Odisha temple design texts such as the Silpasarini.[19] This mandala structure informs the plans of other Hindu temples in Odisha and elsewhere', 'dc85b60c4a5e68317dfcecaaf6769231.jpg', '29c832ba2118670341b03fa85f000023.jpg', 'c879c6fcba34edc90af4c4f50419f876.jpg', '2022-03-24 11:35:19'),
(6, 'Kashi Vishwanath Temple', ' Kashi Vishwanath temple is located almost 5 km away from the Varanasi railway station and almost 6 km from the BHU.', 'Varanasi', 'UP', 'India', 'Kashi Vishwanath Temple is one of the most famous temple in Varanasi, also known as the Golden temple dedicated to the Lord Shiva. It was constructed in the year 1780 by the Maratha monarch, Maharani Ahilyabai Holkar of the Indore. This makes Varanasi a tourists place because of great religious importance to the Hindus. The gold used to cover the two domes of the temple was donated by the Punjab Kesari, the Sikh Maharaja Ranjit Singh, who ruled the Punjab. Now, after 28 January 1983, this temple becomes the property of the government of Uttar Pradesh and it is managed by Dr. Vibhuti Narayan Singh, then by the Kashi Naresh.\r\n\r\nCurrent structure built in: 1780\r\nCreator: Maharani Ahilyabai Holkar\r\n\r\nOpening time of the temple is: 3:00 am\r\n\r\nAarti time:\r\nMangala Aarti : 3 AM- 4 AM (Morning)\r\nBhog Aarti : 11.15 AM to 12.20 PM (Day)\r\nSandhya Aarti : 7 PM to 8.15 PM (Evening)\r\nShringar Aarti : 9 PM to 10.15 PM (Night)\r\nShayan Aarti : 10.30 PM â€“ 11 PM (Night)\r\n\r\nHow to reach to the temple: You can reach to the temple by having an auto rickshaw or taxi.', 'e927bc866b006ec9c5362f644f60f228.jpg', 'c83fb009af149ebe58c86fa9d694d95a.jpg', '01302c879592762d0e6debece6574b7c.jpg', '2022-03-24 11:10:07'),
(7, 'Shirdi Sai Temple', 'Located in Ahmednagar district of Maharashtra', 'Nashik', 'Maharashtra', 'India', 'Shirdi is a major religious site in the Indian state of Maharashtra, located near Nashik. It is famous as the â€œland of Saiâ€. Shirdi is the home of the great saint Sai Baba where various temples are built, besides the famous Sai Baba temple and some historical sites. Located in Ahmednagar district of Maharashtra, Shirdi is a very sacred and pilgrimage place for the devotees of Sai Baba, where a large number of devotees come to visit every year.', '53ba34d755d1bbefcb7edb2f8faff5b1.jpg', 'abe7dc9dd47a95fae986698e2a4a2b7c.jpg', '96e0e05b7160d8fa1170206bd9fc736e.jpg', '2022-03-24 11:24:57'),
(8, 'Shirdi Sai Temple', 'Located in Ahmednagar district of Maharashtra', 'Nashik', 'Maharashtra', 'India', 'Shirdi is a major religious site in the Indian state of Maharashtra, located near Nashik. It is famous as the â€œland of Saiâ€. Shirdi is the home of the great saint Sai Baba where various temples are built, besides the famous Sai Baba temple and some historical sites. Located in Ahmednagar district of Maharashtra, Shirdi is a very sacred and pilgrimage place for the devotees of Sai Baba, where a large number of devotees come to visit every year.', '53ba34d755d1bbefcb7edb2f8faff5b1.jpg', 'abe7dc9dd47a95fae986698e2a4a2b7c.jpg', '96e0e05b7160d8fa1170206bd9fc736e.jpg', '2022-03-24 11:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(120) DEFAULT NULL,
  `LastName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Password`, `RegDate`) VALUES
(1, 'Reema', 'Sharma', 7987987897, 'reema@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-03-26 05:49:10'),
(2, 'test', 'test1', 7979879878, 'test@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-04-02 06:03:02'),
(3, 'Anuj', 'Kumar', 1212121212, 'ak@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2022-04-09 08:58:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbookdarshan`
--
ALTER TABLE `tblbookdarshan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbldonation`
--
ALTER TABLE `tbldonation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblfestivals`
--
ALTER TABLE `tblfestivals`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltemple`
--
ALTER TABLE `tbltemple`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbookdarshan`
--
ALTER TABLE `tblbookdarshan`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbldonation`
--
ALTER TABLE `tbldonation`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblfestivals`
--
ALTER TABLE `tblfestivals`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbltemple`
--
ALTER TABLE `tbltemple`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
