-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2023 at 04:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lawyerplus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
                         `name` varchar(50) NOT NULL,
                         `contact_number` varchar(50) NOT NULL,
                         `username` varchar(10) NOT NULL,
                         `password` varchar(10) NOT NULL,
                         `email` varchar(50) NOT NULL,
                         `address` varchar(50) NOT NULL,
                         `DOB` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `contact_number`, `username`, `password`, `email`, `address`, `DOB`) VALUES
    ('', '', 'admin', 'admin', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appoinment`
--

CREATE TABLE `appoinment` (
                              `appoinment_id` varchar(50) NOT NULL,
                              `case_id` varchar(50) NOT NULL,
                              `time` varchar(50) NOT NULL,
                              `date` varchar(50) NOT NULL,
                              `court` varchar(50) NOT NULL,
                              `place` varchar(50) NOT NULL,
                              `client_id` varchar(50) NOT NULL,
                              `lawyer_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assistant`
--

CREATE TABLE `assistant` (
                             `assistant_id` varchar(50) NOT NULL,
                             `name` varchar(50) NOT NULL,
                             `email` varchar(50) NOT NULL,
                             `lawyer_id` varchar(50) NOT NULL,
                             `contact_number` varchar(50) NOT NULL,
                             `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `assistant`
--
DELIMITER $$
CREATE TRIGGER `insert_user_from_assistant` AFTER INSERT ON `assistant` FOR EACH ROW BEGIN
    -- Insert into assistant table
    INSERT INTO user (user_id, name, role, password, status)
    VALUES (NEW.assistant_id,NEW.name,"assistant",NEW.password,"inactive");
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_user_assistant` AFTER UPDATE ON `assistant` FOR EACH ROW BEGIN
    UPDATE user
    SET name = NEW.name,
        role = "assistant",
        password = NEW.password,
        status = "inactive"
    WHERE user_id = NEW.assistant_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `case`
--

CREATE TABLE `case` (
                        `case_id` varchar(20) NOT NULL,
                        `lawyer_id` varchar(50) NOT NULL,
                        `client_id` varchar(20) NOT NULL,
                        `description` varchar(25) NOT NULL,
                        `type` varchar(20) NOT NULL,
                        `submit_date` date NOT NULL,
                        `satuts` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `case`
--

INSERT INTO `case` (`case_id`, `lawyer_id`, `client_id`, `description`, `type`, `submit_date`, `satuts`) VALUES
                                                                                                             ('1', '', 'E2046022', 'test', 'type1', '2023-06-10', 'Pending'),
                                                                                                             ('10', '', 'E2046022', 'test', 'type1', '2023-06-10', 'Pending'),
                                                                                                             ('11', '', 'E2046022', 'test', 'type1', '2023-06-10', 'Pending'),
                                                                                                             ('12', '', 'E2046022', 'test', 'type1', '2023-06-10', 'Pending'),
                                                                                                             ('13', '', 'E2046022', 'test', 'type1', '2023-06-10', 'Pending'),
                                                                                                             ('14', '', 'E2046022', 'test', 'type1', '2023-06-10', 'Pending'),
                                                                                                             ('15', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Pending'),
                                                                                                             ('16', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Pending'),
                                                                                                             ('17', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Pending'),
                                                                                                             ('18', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Pending'),
                                                                                                             ('19', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Pending'),
                                                                                                             ('2', '', 'E2046022', 'test', 'type1', '2023-06-10', 'Pending'),
                                                                                                             ('20', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Pending'),
                                                                                                             ('21', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Pending'),
                                                                                                             ('22', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Pending'),
                                                                                                             ('23', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Completed'),
                                                                                                             ('24', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Completed'),
                                                                                                             ('25', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Completed'),
                                                                                                             ('26', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Completed'),
                                                                                                             ('27', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Completed'),
                                                                                                             ('28', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Completed'),
                                                                                                             ('29', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Completed'),
                                                                                                             ('3', '', 'E2046022', 'test', 'type1', '2023-06-10', 'Pending'),
                                                                                                             ('30', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Completed'),
                                                                                                             ('31', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Completed'),
                                                                                                             ('32', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Completed'),
                                                                                                             ('33', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Completed'),
                                                                                                             ('34', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Completed'),
                                                                                                             ('35', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Completed'),
                                                                                                             ('36', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Completed'),
                                                                                                             ('37', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Completed'),
                                                                                                             ('38', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Completed'),
                                                                                                             ('39', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Completed'),
                                                                                                             ('4', '', 'E2046022', 'test', 'type1', '2023-06-10', 'Pending'),
                                                                                                             ('40', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Completed'),
                                                                                                             ('41', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Completed'),
                                                                                                             ('42', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Completed'),
                                                                                                             ('43', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Completed'),
                                                                                                             ('44', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Completed'),
                                                                                                             ('45', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Completed'),
                                                                                                             ('46', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Completed'),
                                                                                                             ('47', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Ongoing'),
                                                                                                             ('48', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Ongoing'),
                                                                                                             ('49', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Ongoing'),
                                                                                                             ('5', '', 'E2046022', 'test', 'type1', '2023-06-10', 'Pending'),
                                                                                                             ('50', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Ongoing'),
                                                                                                             ('51', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Ongoing'),
                                                                                                             ('52', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Ongoing'),
                                                                                                             ('53', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Ongoing'),
                                                                                                             ('55', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Ongoing'),
                                                                                                             ('56', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Ongoing'),
                                                                                                             ('57', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Ongoing'),
                                                                                                             ('58', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Ongoing'),
                                                                                                             ('59', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Ongoing'),
                                                                                                             ('6', '', 'E2046022', 'test', 'type1', '2023-06-10', 'Pending'),
                                                                                                             ('60', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Ongoing'),
                                                                                                             ('61', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Ongoing'),
                                                                                                             ('62', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Ongoing'),
                                                                                                             ('63', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Ongoing'),
                                                                                                             ('64', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Ongoing'),
                                                                                                             ('65', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Ongoing'),
                                                                                                             ('66', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Ongoing'),
                                                                                                             ('67', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Ongoing'),
                                                                                                             ('68', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Ongoing'),
                                                                                                             ('7', '', 'E2046022', 'test', 'type1', '2023-06-10', 'Pending'),
                                                                                                             ('70', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Ongoing'),
                                                                                                             ('8', '', 'E2046022', 'test', 'type1', '2023-06-10', 'Pending'),
                                                                                                             ('80', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Cancelled'),
                                                                                                             ('81', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Cancelled'),
                                                                                                             ('82', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Cancelled'),
                                                                                                             ('83', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Cancelled'),
                                                                                                             ('84', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Cancelled'),
                                                                                                             ('85', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Cancelled'),
                                                                                                             ('86', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Cancelled'),
                                                                                                             ('87', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Cancelled'),
                                                                                                             ('88', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Cancelled'),
                                                                                                             ('89', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Cancelled'),
                                                                                                             ('90', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
                          `client_id` varchar(10) NOT NULL,
                          `name` varchar(252) NOT NULL,
                          `nic` varchar(10) NOT NULL,
                          `email` varchar(20) NOT NULL,
                          `DOB` date DEFAULT NULL,
                          `contact_number` varchar(15) NOT NULL,
                          `address` varchar(252) NOT NULL,
                          `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `name`, `nic`, `email`, `DOB`, `contact_number`, `address`, `password`) VALUES
                                                                                                               ('E2046014', 'Sadeesha', '998458213V', 'sadeesha@gmail.com', NULL, '775124523', 'test', 'admin@123'),
                                                                                                               ('E2046022', 'Kanishka_Bandara', '992654660V', 'kanishka@gmail.com', NULL, '775756081', 'No 99,welagedra road', 'admin@1234'),
                                                                                                               ('E2046315', 'Tharuka', '9845625812', 'tharuka@gmail.com', NULL, '75845125', 'test2', 'admin@123');

--
-- Triggers `client`
--
DELIMITER $$
CREATE TRIGGER `insert_user_from_client` AFTER INSERT ON `client` FOR EACH ROW BEGIN
    -- Insert into user table
    INSERT INTO user (user_id, name, role, password, status)
    VALUES (NEW.client_id,NEW.name,"client",NEW.password,"inactive");
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_user_from_client` AFTER UPDATE ON `client` FOR EACH ROW BEGIN
    UPDATE user
    SET name = NEW.name,
        role = "client",
        password = NEW.password,
        status = "inactive"
    WHERE user_id = NEW.client_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `lawyer`
--

CREATE TABLE `lawyer` (
                          `lawyer_id` varchar(50) NOT NULL,
                          `title` varchar(50) NOT NULL,
                          `name` varchar(50) NOT NULL,
                          `email` varchar(50) NOT NULL,
                          `DOB` date NOT NULL,
                          `category` varchar(50) NOT NULL,
                          `contact_number` varchar(50) NOT NULL,
                          `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `lawyer`
--
DELIMITER $$
CREATE TRIGGER `insert_user_from_lawyer` AFTER INSERT ON `lawyer` FOR EACH ROW BEGIN
    -- Insert into user table
    INSERT INTO user (user_id, name, role, password, status)
    VALUES (NEW.lawyer_id,NEW.name,"lawyer",NEW.password,"inactive");
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_user_lawyer` AFTER UPDATE ON `lawyer` FOR EACH ROW BEGIN
    UPDATE user
    SET name = NEW.name,
        role = "lawyer",
        password = NEW.password,
        status = "inactive"
    WHERE user_id = NEW.lawyer_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
                           `payment_id` varchar(50) NOT NULL,
                           `client_id` varchar(50) NOT NULL,
                           `type` varchar(50) NOT NULL,
                           `date` varchar(50) NOT NULL,
                           `case_id` varchar(50) NOT NULL,
                           `lawyer_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
                        `user_id` varchar(50) NOT NULL,
                        `name` varchar(50) NOT NULL,
                        `role` varchar(50) NOT NULL,
                        `password` varchar(50) NOT NULL,
                        `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `role`, `password`, `status`) VALUES
                                                                         ('E2046014', 'Sadeesha', 'client', 'admin@123', 'inactive'),
                                                                         ('E2046022', 'Kanishka_Bandara', 'client', 'admin@1234', 'inactive'),
                                                                         ('E2046315', 'Tharuka', 'client', 'admin@123', 'inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
    ADD PRIMARY KEY (`username`);

--
-- Indexes for table `appoinment`
--
ALTER TABLE `appoinment`
    ADD PRIMARY KEY (`appoinment_id`),
    ADD KEY `case_id` (`case_id`),
    ADD KEY `client_id` (`client_id`),
    ADD KEY `lawyer_id` (`lawyer_id`);

--
-- Indexes for table `assistant`
--
ALTER TABLE `assistant`
    ADD PRIMARY KEY (`assistant_id`),
    ADD KEY `lawyer_id` (`lawyer_id`);

--
-- Indexes for table `case`
--
ALTER TABLE `case`
    ADD PRIMARY KEY (`case_id`),
    ADD KEY `client_id` (`client_id`),
    ADD KEY `lawyer_id` (`lawyer_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
    ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `lawyer`
--
ALTER TABLE `lawyer`
    ADD PRIMARY KEY (`lawyer_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
    ADD PRIMARY KEY (`payment_id`),
    ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
    ADD PRIMARY KEY (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appoinment`
--
ALTER TABLE `appoinment`
    ADD CONSTRAINT `appoinment_ibfk_1` FOREIGN KEY (`case_id`) REFERENCES `case` (`case_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `appoinment_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `appoinment_ibfk_3` FOREIGN KEY (`lawyer_id`) REFERENCES `lawyer` (`lawyer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assistant`
--
ALTER TABLE `assistant`
    ADD CONSTRAINT `assistant_ibfk_1` FOREIGN KEY (`lawyer_id`) REFERENCES `lawyer` (`lawyer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `case`
--
ALTER TABLE `case`
    ADD CONSTRAINT `case_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
    ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
