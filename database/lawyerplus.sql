-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 01:40 PM
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
    ('', '77123456', 'admin', 'admin', 'admin@lawyerplus.lk', '', NULL);

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
    VALUES (NEW.assistant_id,NEW.name,'assistant',NEW.password,'inactive');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_user_assistant` AFTER UPDATE ON `assistant` FOR EACH ROW BEGIN
    UPDATE user
    SET name = NEW.name,
        role = 'assistant',
        password = NEW.password,
        status = 'inactive'
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
                        `C_type` varchar(20) NOT NULL,
                        `submit_date` date NOT NULL,
                        `satuts` varchar(50) NOT NULL,
                        `Amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `case`
--

INSERT INTO `case` (`case_id`, `lawyer_id`, `client_id`, `description`, `C_type`, `submit_date`, `satuts`, `Amount`) VALUES
                                                                                                                         ('100', 'LW12', 'E2046014', 'Devorce', 'Family', '2023-06-30', 'Processing', 5800),
                                                                                                                         ('15', '', 'E2046014', 'test', 'Immigration ', '2023-06-03', 'Pending', 4500),
                                                                                                                         ('16', '', 'E2046014', 'test', 'Employment', '2023-06-03', 'Pending', 5500),
                                                                                                                         ('17', '', 'E2046014', 'test', 'Employment', '2023-06-03', 'Pending', 8000),
                                                                                                                         ('18', '', 'E2046014', 'test', 'Business ', '2023-06-10', 'Pending', 1420),
                                                                                                                         ('19', '', 'E2046014', 'test', 'Business ', '2023-06-10', 'Pending', 2350),
                                                                                                                         ('30', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Completed', 4400),
                                                                                                                         ('31', '', 'E2046014', 'test', 'type1', '2023-06-10', 'Completed', 5000),
                                                                                                                         ('89', 'LW13', 'E2046014', 'Murder ', 'Criminal', '2023-06-10', 'Processing', 7690);

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
                          `password` varchar(25) NOT NULL,
                          `registerd_datte` date NOT NULL DEFAULT current_timestamp(),
                          `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `name`, `nic`, `email`, `DOB`, `contact_number`, `address`, `password`, `registerd_datte`, `status`) VALUES
                                                                                                                                            ('E2046014', 'Sadeesha', '998458213V', 'sadeesha@gmail.com', NULL, '775124523', 'test', 'admin@123', '2023-07-26', 'Blocked'),
                                                                                                                                            ('E2046022', 'Kanishka_Bandara', '992654660V', 'kanishka@gmail.com', NULL, '775756081', 'No 99,welagedra road', 'admin@1234', '2023-07-26', 'Active'),
                                                                                                                                            ('E2046315', 'Tharuka', '9845625812', 'tharuka@gmail.com', NULL, '75845125', 'test2', 'admin@123', '2023-07-26', 'Active'),
                                                                                                                                            ('sdeelz', 'ddcd', 'Thimira Sa', 'sadeeshathimira2000@', '1970-01-01', '228,\"sadeesha\",', '0769371701', '', '2023-07-30', '');

--
-- Triggers `client`
--
DELIMITER $$
CREATE TRIGGER `delete_from_user_client` AFTER DELETE ON `client` FOR EACH ROW BEGIN
    DELETE FROM user WHERE user.user_id = OLD.client_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_user_from_client` AFTER INSERT ON `client` FOR EACH ROW BEGIN
    -- Insert into user table
    INSERT INTO user (user_id, name, role, password, status)
    VALUES (NEW.client_id,NEW.name,'client',NEW.password,'Active');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `record_deletion_trigger_client` AFTER DELETE ON `client` FOR EACH ROW BEGIN
    INSERT INTO deleted_client (`client_id`, `name`, `nic`, `email`, `DOB`, `contact_number`, `address`, `password`, `registerd_datte`, `status`)
    VALUES (OLD.client_id, OLD.name, OLD.nic, OLD.email, OLD.DOB, OLD.contact_number, OLD.address, OLD.password, OLD.registerd_datte, OLD.status);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_user_from_client` AFTER UPDATE ON `client` FOR EACH ROW BEGIN
    UPDATE user
    SET name = NEW.name,
        role = 'client',
        password = NEW.password,
        status = 'Active'
    WHERE user_id = NEW.client_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `client_statement`
--

CREATE TABLE `client_statement` (
                                    `statement_id` varchar(50) NOT NULL,
                                    `client_id` varchar(50) NOT NULL,
                                    `lawyer_id` varchar(50) NOT NULL,
                                    `message` varchar(100) NOT NULL,
                                    `Topic` varchar(500) NOT NULL,
                                    `Case_Id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_statement`
--

INSERT INTO `client_statement` (`statement_id`, `client_id`, `lawyer_id`, `message`, `Topic`, `Case_Id`) VALUES
                                                                                                             ('SMT-001', '', '', 'Apple Inc. is an American multinational technology company headquartered in Cupertino, California. A', 'Sadeesha', '15'),
                                                                                                             ('SMT-002', '', '', 'Discover the innovative world of Apple and shop everything iPhone, iPad, Apple Watch, Mac, and Apple', 'sdsdsd', '16'),
                                                                                                             ('SMT-003', '', '', 'The most powerful Mac laptops and desktops ever ..', 'thimi', '16'),
                                                                                                             ('SMT-004', '', '', 'The most powerful Mac laptops and desktops ever ..', 'thimi', '16'),
                                                                                                             ('SMT-005', '', '', 'The most powerful Mac laptops and desktops ever ..', 'thimi', '16'),
                                                                                                             ('SMT-006', '', '', 'The most powerful Mac laptops and desktops ever ..', 'thimi', '16'),
                                                                                                             ('SMT-007', '', '', 'The most powerful Mac laptops and desktops ever ..', 'thimi', '16'),
                                                                                                             ('SMT-008', '', '', 'Orange S.A., formerly France Télécom S.A. is a French multinational telecommunications corporation. ', 'soooriyo', '16'),
                                                                                                             ('SMT-009', '', '', 'Orange S.A., formerly France Télécom S.A. is a French multinational telecommunications corporation. ', 'soooriyo', '16'),
                                                                                                             ('SMT-010', '', '', 'Hi', 'Test0_Sadee', '16'),
                                                                                                             ('SMT-011', '', '', 'Hi', 'Test0_Sadee', '16');

-- --------------------------------------------------------

--
-- Table structure for table `deleted_client`
--

CREATE TABLE `deleted_client` (
                                  `client_id` varchar(10) NOT NULL,
                                  `name` varchar(252) NOT NULL,
                                  `nic` varchar(10) NOT NULL,
                                  `email` varchar(20) NOT NULL,
                                  `DOB` date DEFAULT NULL,
                                  `contact_number` varchar(15) NOT NULL,
                                  `address` varchar(252) NOT NULL,
                                  `password` varchar(25) NOT NULL,
                                  `registerd_datte` date NOT NULL DEFAULT current_timestamp(),
                                  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `deleted_client`
--
DELIMITER $$
CREATE TRIGGER `insert _to_client` AFTER DELETE ON `deleted_client` FOR EACH ROW BEGIN
    INSERT INTO client (`client_id`, `name`, `nic`, `email`, `DOB`, `contact_number`, `address`, `password`, `registerd_datte`, `status`)
    VALUES (OLD.client_id, OLD.name, OLD.nic, OLD.email, OLD.DOB, OLD.contact_number, OLD.address, OLD.password, OLD.registerd_datte, 'Active');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `deleted_lawyers`
--

CREATE TABLE `deleted_lawyers` (
                                   `lawyer_id` varchar(50) NOT NULL,
                                   `title` varchar(50) NOT NULL,
                                   `name` varchar(50) NOT NULL,
                                   `email` varchar(50) NOT NULL,
                                   `category` varchar(50) NOT NULL,
                                   `contact_number` varchar(50) NOT NULL,
                                   `password` varchar(50) NOT NULL,
                                   `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deleted_lawyers`
--

INSERT INTO `deleted_lawyers` (`lawyer_id`, `title`, `name`, `email`, `category`, `contact_number`, `password`, `status`) VALUES
                                                                                                                              ('6', 'Notary', 'Emily Davis', 'emily.davis@example.com', 'Real Estate Law', '7776665558', '12345678', 'Active'),
                                                                                                                              ('7', 'Prosecutor', 'Robert Taylor', 'robert.taylor@example.com', 'Personal Injury Law', '2223334442', 'passw0rd', 'Delete');

--
-- Triggers `deleted_lawyers`
--
DELIMITER $$
CREATE TRIGGER `record_deletion_trigger_to_lawyer` AFTER DELETE ON `deleted_lawyers` FOR EACH ROW BEGIN
    INSERT INTO lawyer (lawyer_id, title, name, email, category, contact_number, password, status)
    VALUES (OLD.lawyer_id, OLD.title, OLD.name, OLD.email, OLD.category, OLD.contact_number, OLD.password, 'Active');
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
                          `category` varchar(50) NOT NULL,
                          `contact_number` varchar(50) NOT NULL,
                          `password` varchar(50) NOT NULL,
                          `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lawyer`
--

INSERT INTO `lawyer` (`lawyer_id`, `title`, `name`, `email`, `category`, `contact_number`, `password`, `status`) VALUES
                                                                                                                     ('1', 'Mr.', 'John Doe', 'john.doe@example.com', 'Corporate Law', '1234567890', 'password123', 'Active'),
                                                                                                                     ('10', 'Paralegal', 'Olivia Lewis', 'olivia.lewis@example.com', 'Immigration Law', '7778889990', 'mypassword', 'Active'),
                                                                                                                     ('11', 'Arbitrator', 'William Turner', 'william.turner@example.com', 'Corporate Law', '3334445556', 'securepass', 'Inactive'),
                                                                                                                     ('12', 'Legal Consultant', 'Sophia Hernandez', 'sophia.hernandez@example.com', 'Family Law', '9990001112', 'pass123', 'Hold'),
                                                                                                                     ('13', 'Trial Lawyer', 'Ethan Clark', 'ethan.clark@example.com', 'Criminal Law', '2223334448', 'secretpass', 'Active'),
                                                                                                                     ('14', 'Legal Analyst', 'Ava Roberts', 'ava.roberts@example.com', 'Corporate Law', '7778889992', 'mypassword', 'Block'),
                                                                                                                     ('15', 'Legal Officer', 'Benjamin Thompson', 'benjamin.thompson@example.com', 'Intellectual Property Law', '1112223338', '12345678', 'Hold'),
                                                                                                                     ('17', 'Legal Counselor', 'Henry Wilson', 'henry.wilson@example.com', 'Personal Injury Law', '9998887772', 'mysecretpass', 'Active'),
                                                                                                                     ('18', 'Legal Advocate', 'Lily Anderson', 'lily.anderson@example.com', 'Tax Law', '3332221114', 'lawyerpass', 'Inactive'),
                                                                                                                     ('21', 'Legal Specialist', 'James White', 'james.white@example.com', 'Employment Law', '7776665556', 'securepass', 'Active'),
                                                                                                                     ('3', 'Advocate', 'David Johnson', 'david.johnson@example.com', 'Criminal Law', '5551234567', 'pass123', 'Hold'),
                                                                                                                     ('4', 'Barrister', 'Sarah Williams', 'sarah.williams@example.com', 'Immigration Law', '9998887776', 'secretpass', 'Active'),
                                                                                                                     ('5', 'Solicitor', 'Michael Brown', 'michael.brown@example.com', 'Intellectual Property Law', '1112223334', 'mypassword', 'Active'),
                                                                                                                     ('8', 'Jurist', 'Daniel Martinez', 'daniel.martinez@example.com', 'Tax Law', '8887776660', 'mysecretpass', 'Active'),
                                                                                                                     ('9', 'Legal Advisor', 'Jessica Thompson', 'jessica.thompson@example.com', 'Employment Law', '4445556662', 'lawyerpass', 'Active'),
                                                                                                                     ('LW13', 'Chamara', 'Galagedra', 'jane.smith@example.com', 'Family Law', '9876543210', '123345', 'Active');

--
-- Triggers `lawyer`
--
DELIMITER $$
CREATE TRIGGER `delete_from_user` AFTER DELETE ON `lawyer` FOR EACH ROW BEGIN
    DELETE FROM user WHERE user.user_id = OLD.lawyer_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_user_from_lawyer` AFTER INSERT ON `lawyer` FOR EACH ROW BEGIN
    -- Insert into user table
    INSERT INTO user (user_id, name, role, password, status)
    VALUES (NEW.lawyer_id,NEW.name,'lawyer',NEW.password,'Active');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `record_deletion_trigger` AFTER DELETE ON `lawyer` FOR EACH ROW BEGIN
    INSERT INTO deleted_lawyers (lawyer_id, title, name, email, category, contact_number, password, status)
    VALUES (OLD.lawyer_id, OLD.title, OLD.name, OLD.email, OLD.category, OLD.contact_number, OLD.password, OLD.status);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_user_lawyer` AFTER UPDATE ON `lawyer` FOR EACH ROW BEGIN
    UPDATE user
    SET name = NEW.name,
        role = 'lawyer',
        password = NEW.password,
        status = 'Active'
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
                        `Email` varchar(25) NOT NULL,
                        `status` varchar(50) NOT NULL,
                        `otp` varchar(10) DEFAULT NULL,
                        `otp_expiration` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `role`, `password`, `Email`, `status`, `otp`, `otp_expiration`) VALUES
                                                                                                           ('1', 'John Doe', 'lawyer', 'password123', '', 'Active', NULL, NULL),
                                                                                                           ('10', 'Olivia Lewis', 'lawyer', 'mypassword', '', 'inactive', NULL, NULL),
                                                                                                           ('11', 'William Turner', 'lawyer', 'securepass', '', 'inactive', NULL, NULL),
                                                                                                           ('12', 'Sophia Hernandez', 'lawyer', 'pass123', '', 'inactive', NULL, NULL),
                                                                                                           ('13', 'Ethan Clark', 'lawyer', 'secretpass', '', 'inactive', NULL, NULL),
                                                                                                           ('14', 'Ava Roberts', 'lawyer', 'mypassword', '', 'inactive', NULL, NULL),
                                                                                                           ('15', 'Benjamin Thompson', 'lawyer', '12345678', '', 'inactive', NULL, NULL),
                                                                                                           ('16', 'Charlotte Davis', 'lawyer', 'passw0rd', '', 'inactive', NULL, NULL),
                                                                                                           ('17', 'Henry Wilson', 'lawyer', 'mysecretpass', '', 'inactive', NULL, NULL),
                                                                                                           ('18', 'Lily Anderson', 'lawyer', 'lawyerpass', '', 'inactive', NULL, NULL),
                                                                                                           ('19', 'James White', 'lawyer', 'securepass', '', 'inactive', NULL, NULL),
                                                                                                           ('2', 'Galagedra', 'lawyer', '123345', '', 'inactive', NULL, NULL),
                                                                                                           ('21', 'James White', 'lawyer', 'securepass', '', 'inactive', NULL, NULL),
                                                                                                           ('3', 'David Johnson', 'lawyer', 'pass123', '', 'inactive', NULL, NULL),
                                                                                                           ('4', 'Sarah Williams', 'lawyer', 'secretpass', '', 'inactive', NULL, NULL),
                                                                                                           ('5', 'Michael Brown', 'lawyer', 'mypassword', '', 'inactive', NULL, NULL),
                                                                                                           ('8', 'Daniel Martinez', 'lawyer', 'mysecretpass', '', 'inactive', NULL, NULL),
                                                                                                           ('9', 'Jessica Thompson', 'lawyer', 'lawyerpass', '', 'inactive', NULL, NULL),
                                                                                                           ('E2046014', 'Sadeesha', 'client', 'admin@123', '', 'Active', NULL, NULL),
                                                                                                           ('E2046022', 'Kanishka_Bandara', 'client', 'admin@1234', '', 'Active', NULL, NULL),
                                                                                                           ('E2046315', 'Tharuka', 'client', 'admin@123', '', 'Active', NULL, NULL),
                                                                                                           ('sdeelz', 'ddcd', 'client', '', '', 'Active', NULL, NULL),
                                                                                                           ('soori', 'Tharuka', 'client', 'soori', 'tharukaravisara@gmail.com', 'active', NULL, NULL);

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
-- Indexes for table `client_statement`
--
ALTER TABLE `client_statement`
    ADD PRIMARY KEY (`statement_id`);

--
-- Indexes for table `deleted_client`
--
ALTER TABLE `deleted_client`
    ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `deleted_lawyers`
--
ALTER TABLE `deleted_lawyers`
    ADD PRIMARY KEY (`lawyer_id`);

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
