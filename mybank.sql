-- ADMIN PRATHAM AJERU
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 03:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mybank`
--
CREATE DATABASE IF NOT EXISTS `id22014493_bank` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `id22014493_bank`;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
CREATE TABLE `branch` (
  `branchId` int(11) NOT NULL,
  `branchNo` varchar(111) NOT NULL,
  `branchName` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- RELATIONSHIPS FOR TABLE `branch`:
--

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branchId`, `branchNo`, `branchName`) VALUES
(1, '100101', 'Maani'),
(2, '100102', 'Kaladka');

-- --------------------------------------------------------

--
-- Table structure for table `card_request`
--

DROP TABLE IF EXISTS `card_request`;
CREATE TABLE `card_request` (
  `accountNo` varchar(111) NOT NULL,
  `name` varchar(111) NOT NULL,
  `aadhar` varchar(111) NOT NULL,
  `number` varchar(111) NOT NULL,
  `cardType` varchar(111) NOT NULL,
  `pan` varchar(15) NOT NULL,
  `purpose` varchar(111) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- RELATIONSHIPS FOR TABLE `card_request`:
--   `c_id`
--       `useraccounts` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(111) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `email` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `employee`:
--   `branch_id`
--       `branch` -> `branchId`
--

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `branch_id`, `email`, `password`) VALUES
(1, 'Ramesh', 1, 'cashier@vbp.com', 'cashier'),
(2, 'Suresh', 2, 'cashier2@vbp.com', 'cashier');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback` (
  `feedbackId` int(11) NOT NULL,
  `message` text NOT NULL,
  `userId` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- RELATIONSHIPS FOR TABLE `feedback`:
--   `userId`
--       `useraccounts` -> `id`
--

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackId`, `message`, `userId`, `date`) VALUES
(5, 'hlo', 1, '2024-02-01 14:53:57'),
(6, 'pradeep', 2, '2024-02-01 15:06:10'),
(7, 'Card issue', 1, '2024-02-03 07:50:05'),
(8, 'i Want some card', 1, '2024-02-03 07:54:27');

-- --------------------------------------------------------

--
-- Table structure for table `loan_request`
--

DROP TABLE IF EXISTS `loan_request`;
CREATE TABLE `loan_request` (
  `accountNo` varchar(111) NOT NULL,
  `name` varchar(111) NOT NULL,
  `aadhar` varchar(111) NOT NULL,
  `number` varchar(111) NOT NULL,
  `loanType` varchar(111) NOT NULL,
  `l_amount` int(111) NOT NULL,
  `term` varchar(111) NOT NULL,
  `pan` varchar(15) NOT NULL,
  `r_name` varchar(111) NOT NULL,
  `r_number` varchar(111) NOT NULL,
  `purpose` varchar(111) NOT NULL,
  `l_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- RELATIONSHIPS FOR TABLE `loan_request`:
--   `l_id`
--       `useraccounts` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `type` varchar(111) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- RELATIONSHIPS FOR TABLE `login`:
--

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `type`, `date`) VALUES
(1, 'cashier@vbp.com', 'cashier', 'cashier', '2024-02-02 05:50:06'),
(2, 'manager@vbp.com', 'manager', 'manager', '2024-02-02 04:36:27'),
(6, 'cashier2@cashier.com', 'cashier2', 'cashier', '2024-02-02 07:14:47');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

DROP TABLE IF EXISTS `manager`;
CREATE TABLE `manager` (
  `mgr_id` int(11) NOT NULL,
  `mgr_name` varchar(111) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `email` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `manager`:
--   `branch_id`
--       `branch` -> `branchId`
--

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`mgr_id`, `mgr_name`, `branch_id`, `email`, `password`) VALUES
(1, 'Honappa', 1, 'manager@vbp.com', 'manager'),
(2, 'Ramdas', 2, 'manager2@vbp.com', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `notice` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- RELATIONSHIPS FOR TABLE `notice`:
--   `userId`
--       `useraccounts` -> `id`
--

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `userId`, `notice`, `date`) VALUES
(1, 1, 'Dear Customer! <br> OUr privacy policy is changed for account information get new prospectus from your nearest branch', '2024-02-15 13:11:46'),
(6, 2, 'Dear Customer,<br>\r\nOur privacy policy has been changed please visit nearest VBP branch for new prospectus.', '2024-02-15 06:29:23'),
(7, 1, 'loan katto', '2024-02-01 15:27:24'),
(19, 2, 'Your Loan has been Sanctioned, for more details visit nearest VBP Branch', '2024-02-22 14:44:37'),
(20, 1, 'Your Loan has been Sanctioned, for more details visit nearest VBP Branch', '2024-02-26 07:24:24'),
(22, 1, 'Your Card request has been approved, for more details visit nearest VBP Branch', '2024-02-26 15:31:10'),
(23, 1, 'Your Card request has been approved, for more details visit nearest VBP Branch', '2024-02-26 15:31:52'),
(24, 1, 'Your Card request has been approved, for more details visit nearest VBP Branch', '2024-02-26 15:35:12'),
(25, 2, 'Your Card request has been cancelled, for more details visit nearest VBP Branch', '2024-02-26 15:42:59');

-- --------------------------------------------------------

--
-- Table structure for table `otheraccounts`
--

DROP TABLE IF EXISTS `otheraccounts`;
CREATE TABLE `otheraccounts` (
  `id` int(11) NOT NULL,
  `accountNo` varchar(111) NOT NULL,
  `bankName` varchar(111) NOT NULL,
  `holderName` varchar(111) NOT NULL,
  `balance` varchar(111) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- RELATIONSHIPS FOR TABLE `otheraccounts`:
--

--
-- Dumping data for table `otheraccounts`
--

INSERT INTO `otheraccounts` (`id`, `accountNo`, `bankName`, `holderName`, `balance`, `date`) VALUES
(1, '1200112123756', 'Canara', 'Supreeth', '40800', '2024-02-04 11:55:07'),
(2, '12001123', 'BOB', 'Adarsh', '71000', '2024-02-04 11:55:07'),
(3, '12001124', 'Union', 'Akanksh', '71000', '2024-02-04 11:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction` (
  `transactionId` int(11) NOT NULL,
  `action` varchar(111) NOT NULL,
  `credit` varchar(111) NOT NULL,
  `debit` varchar(111) NOT NULL,
  `balance` varchar(111) NOT NULL,
  `beneId` varchar(111) NOT NULL,
  `other` varchar(111) NOT NULL,
  `userId` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- RELATIONSHIPS FOR TABLE `transaction`:
--   `userId`
--       `useraccounts` -> `id`
--

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transactionId`, `action`, `credit`, `debit`, `balance`, `beneId`, `other`, `userId`, `date`) VALUES
(28, 'deposit', '10', '', '', '', '501234', 9, '2024-02-01 15:45:01'),
(29, 'transfer', '', '5000', '', '', '1706802028', 1, '2024-02-02 06:27:43'),
(30, 'transfer', '', '4000', '', '', '1706802028', 1, '2024-02-02 06:28:05'),
(31, 'deposit', '50000', '', '', '', '1234', 1, '2024-02-03 06:12:07'),
(32, 'deposit', '50000', '', '', '', '1234', 1, '2024-02-03 06:12:22'),
(33, 'deposit', '50000', '', '', '', '1234', 1, '2024-02-03 06:12:26'),
(34, 'transfer', '', '10', '', '', '12001122', 1, '2024-02-10 15:48:33'),
(35, 'withdraw', '', '50000', '', '', '123458', 1, '2024-02-16 09:21:14'),
(36, 'deposit', '5000', '', '', '', '1245', 1, '2024-02-16 09:21:38'),
(37, 'transfer', '', '10000', '', '', '1005469154', 2, '2024-02-20 14:14:23'),
(48, 'loan', '50000', '', '', '', '1005477785', 2, '2024-02-22 14:44:37'),
(49, 'credit', '3000', '', '', '', '4582', 2, '2024-02-24 12:34:23'),
(50, 'credit', '500', '', '', '', '500', 2, '2024-02-24 12:35:53'),
(51, 'credit', '500', '', '', '', '500', 2, '2024-02-24 12:38:10'),
(52, 'credit', '4000', '', '', '', '12245', 2, '2024-02-24 12:38:31'),
(53, 'payloan', '40', '', '', '', '4581', 2, '2024-02-24 12:42:25'),
(54, 'payloan', '400', '', '', '', '7845', 2, '2024-02-24 12:42:45'),
(55, 'payloan', '400', '', '', '', '7845', 2, '2024-02-24 15:17:14'),
(56, 'payloan', '400', '', '', '', '7845', 2, '2024-02-24 15:17:32'),
(57, 'loan', '85255', '', '', '', '1005469154', 1, '2024-02-26 07:24:24'),
(58, 'payloan', '255', '', '', '', '1005469154', 1, '2024-02-26 14:20:45'),
(59, 'payloan', '500', '', '', '', '125', 1, '2024-03-06 17:09:07');

--
-- Triggers `transaction`
--
DROP TRIGGER IF EXISTS `transaction_balance_update`;
DELIMITER $$
CREATE TRIGGER `transaction_balance_update` AFTER INSERT ON `transaction` FOR EACH ROW BEGIN
    DECLARE new_balance DECIMAL(10, 2);

    IF NEW.action = 'deposit' THEN
        SET new_balance = NEW.credit + (SELECT balance FROM useraccounts WHERE id = NEW.userId);
    ELSEIF NEW.action = 'withdraw' THEN
        SET new_balance = (SELECT balance FROM useraccounts WHERE id = NEW.userId) - NEW.debit;
    ELSEIF NEW.action = 'transfer' THEN
        SET new_balance = (SELECT balance FROM useraccounts WHERE id = NEW.userId) - NEW.debit;
    ELSEIF NEW.action = 'loan' THEN
        SET new_balance = (SELECT balance FROM useraccounts WHERE id = NEW.userId) + NEW.credit;
    ELSEIF NEW.action = 'payloan' THEN
        SET new_balance = (SELECT balance FROM useraccounts WHERE id = NEW.userId) - NEW.credit;
    ELSE
        -- Handle other actions if necessary
        SET new_balance = (SELECT balance FROM useraccounts WHERE id = NEW.userId);
    END IF;

    UPDATE useraccounts SET balance = new_balance WHERE id = NEW.userId;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

DROP TABLE IF EXISTS `useraccounts`;
CREATE TABLE `useraccounts` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `name` varchar(111) NOT NULL,
  `dob` date DEFAULT NULL,
  `accountNo` varchar(111) NOT NULL,
  `accountType` varchar(111) NOT NULL,
  `branch` int(11) NOT NULL,
  `balance` varchar(111) NOT NULL,
  `aadhar` varchar(111) NOT NULL,
  `number` bigint(20) NOT NULL,
  `address` varchar(111) NOT NULL,
  `source` varchar(111) NOT NULL,
  `loan` varchar(111) DEFAULT NULL,
  `loantype` varchar(50) DEFAULT NULL,
  `card` varchar(111) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ;

--
-- RELATIONSHIPS FOR TABLE `useraccounts`:
--   `branch`
--       `branch` -> `branchId`
--

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`id`, `email`, `password`, `name`, `dob`, `accountNo`, `accountType`, `branch`, `balance`, `aadhar`, `number`, `address`, `source`, `loan`, `loantype`, `card`, `date`) VALUES
(1, 'pratham@gmail.com', '12345678', 'Pratham', '2003-06-10', '1005469154', 'Current', 1, '165290.00', '321037555541', 8867939274, 'Pariyaldadka', 'Programmer', '84500', 'vehical', 'Debit', '2024-02-02 05:50:06'),
(2, 'pradeep@gmail.com', '123456789', 'Pradeep', '2003-07-15', '1005477785', 'Saving', 1, '180500', '321037555534', 9449662174, 'kaladka', 'Programmer', '49200', 'house', 'Debit', '2024-02-02 04:50:06'),
(6, 'kiran@gmail.com', '123456780', 'kiran', '2004-07-20', '1513410739', 'saving', 2, '234234', '324033883490', 7975987512, 'Mithur', 'Govt. job', NULL, NULL, 'Debit', '2024-02-02 07:52:40'),
(7, 'aneesh@gmail.com', '123789456', 'aneesh', '2003-05-12', '1513410837', 'current', 1, '12121', '324033883490', 9481758964, 'Ira', 'Govt. job', NULL, NULL, 'Debit', '2024-02-02 07:54:18'),
(9, 'mk@gmail.com', 'qwerty', 'per', NULL, '1706802028', 'current', 2, '9511', '123456789020', 8896321457, 'poi', '25 cow', NULL, NULL, 'Debit', '2024-02-01 15:41:45'),
(10, 'pp@gmail.com', 'pathu', 'pathu', NULL, '1706944921', 'saving', 1, '50000', '123456789102', 8899663322, 'puttur', 'coder', NULL, NULL, 'Debit', '2024-02-03 07:23:25');

--
-- Triggers `useraccounts`
--
DROP TRIGGER IF EXISTS `verify_phone_number`;
DELIMITER $$
CREATE TRIGGER `verify_phone_number` BEFORE INSERT ON `useraccounts` FOR EACH ROW BEGIN
    IF LENGTH(NEW.number) <> 10 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Phone number must be 10 digits.';
    END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branchId`);

--
-- Indexes for table `card_request`
--
ALTER TABLE `card_request`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `emp_branch` (`branch_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackId`),
  ADD KEY `id` (`userId`);

--
-- Indexes for table `loan_request`
--
ALTER TABLE `loan_request`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`mgr_id`),
  ADD KEY `mg_branch` (`branch_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id1` (`userId`);

--
-- Indexes for table `otheraccounts`
--
ALTER TABLE `otheraccounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transactionId`),
  ADD KEY `id2` (`userId`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch` (`branch`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branchId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `card_request`
--
ALTER TABLE `card_request`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1708074744;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1709742839;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `loan_request`
--
ALTER TABLE `loan_request`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1708074915;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `mgr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `otheraccounts`
--
ALTER TABLE `otheraccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transactionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `card_request`
--
ALTER TABLE `card_request`
  ADD CONSTRAINT `card_id` FOREIGN KEY (`c_id`) REFERENCES `useraccounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `emp_branch` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branchId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `id` FOREIGN KEY (`userId`) REFERENCES `useraccounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan_request`
--
ALTER TABLE `loan_request`
  ADD CONSTRAINT `loan_id` FOREIGN KEY (`l_id`) REFERENCES `useraccounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `mg_branch` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branchId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notice`
--
ALTER TABLE `notice`
  ADD CONSTRAINT `id1` FOREIGN KEY (`userId`) REFERENCES `useraccounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `id2` FOREIGN KEY (`userId`) REFERENCES `useraccounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD CONSTRAINT `branch` FOREIGN KEY (`branch`) REFERENCES `branch` (`branchId`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
