-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 03:47 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iequity_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_management_permission`
--

CREATE TABLE `account_management_permission` (
  `role_id` int(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `delete_account` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_management_permission`
--

INSERT INTO `account_management_permission` (`role_id`, `role`, `delete_account`) VALUES
(1, 'super admin', 'Yes'),
(2, 'admin', 'Yes'),
(3, 'service support', 'No'),
(4, 'service', 'No'),
(5, 'technical support', 'No'),
(6, 'technical', 'No'),
(7, 'user', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `cancelled_tickets`
--

CREATE TABLE `cancelled_tickets` (
  `ticket_no` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `comp_name` varchar(255) NOT NULL,
  `comp_address` varchar(255) NOT NULL,
  `comp_tel` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `tin_no` varchar(255) NOT NULL,
  `ticket_registration_date` date NOT NULL,
  `t_ticket_status` varchar(255) NOT NULL,
  `t_technical_assigned` varchar(255) NOT NULL,
  `t_model` varchar(255) NOT NULL,
  `t_serial_no` varchar(255) NOT NULL,
  `t_dr_no` varchar(255) NOT NULL,
  `t_problem` text NOT NULL,
  `t_qty` int(255) NOT NULL,
  `t_unit` varchar(255) NOT NULL,
  `warranty` varchar(255) NOT NULL,
  `date_of_release` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE `company_profile` (
  `company_id` int(255) NOT NULL,
  `comp_logo` varchar(255) NOT NULL,
  `comp_name` varchar(255) NOT NULL,
  `comp_bldg_pic` varchar(255) NOT NULL,
  `comp_address` varchar(255) NOT NULL,
  `comp_tel_no` varchar(255) NOT NULL,
  `comp_telefax` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `comp_email` varchar(255) NOT NULL,
  `comp_web_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`company_id`, `comp_logo`, `comp_name`, `comp_bldg_pic`, `comp_address`, `comp_tel_no`, `comp_telefax`, `contact_no`, `comp_email`, `comp_web_address`) VALUES
(1, 'iequity_logo1.png', 'iEquity Technologies Corporation', 'Tektite_bldg.jpg', 'Unit 813, West Tower, Tektite Tower, Exchange Road, Ortigas Center, Pasig City, Philippines', '(632) 570 - 9381 | 584 - 2926 | 584 - 3303', '(632) 571 - 8350', '0917-629-9952 | 0917-651-2854 | 0917-632-6089', 'service@iequity.com.ph', 'https://www.iequity.com.ph');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `iequity_tickets`
--

CREATE TABLE `iequity_tickets` (
  `ticket_no` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `comp_name` varchar(255) NOT NULL,
  `comp_address` varchar(255) NOT NULL,
  `comp_tel` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `tin_no` varchar(255) NOT NULL,
  `ticket_registration_date` date NOT NULL,
  `t_ticket_status` varchar(255) NOT NULL,
  `t_technical_assigned` varchar(255) NOT NULL,
  `t_model` varchar(255) NOT NULL,
  `t_serial_no` varchar(255) NOT NULL,
  `t_dr_no` varchar(255) NOT NULL,
  `t_problem` text NOT NULL,
  `t_qty` int(255) NOT NULL,
  `t_unit` varchar(255) NOT NULL,
  `warranty` varchar(255) NOT NULL,
  `date_of_release` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `iequity_users`
--

CREATE TABLE `iequity_users` (
  `account_no` int(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `email_verification` int(11) NOT NULL,
  `user_registration_date` date DEFAULT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `comp_name` varchar(255) NOT NULL,
  `comp_address` varchar(255) NOT NULL,
  `comp_tel` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `tin_no` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `labor_or_other_charges`
--

CREATE TABLE `labor_or_other_charges` (
  `loc_id` int(255) NOT NULL,
  `ticket_no` varchar(255) NOT NULL,
  `charges` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `memo`
--

CREATE TABLE `memo` (
  `memo_id` int(255) NOT NULL,
  `ticket_no` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `problem` varchar(255) NOT NULL,
  `repair_solution` varchar(255) NOT NULL,
  `accessories` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `attachments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mr`
--

CREATE TABLE `mr` (
  `mr_no` int(255) NOT NULL,
  `ticket_no` varchar(255) NOT NULL,
  `serial_no` varchar(255) NOT NULL,
  `accessories` varchar(255) NOT NULL,
  `prepared_by` varchar(255) NOT NULL,
  `received_by` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `parts_or_material_charges`
--

CREATE TABLE `parts_or_material_charges` (
  `pmc_id` int(255) NOT NULL,
  `ticket_no` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `print_doc_permissions`
--

CREATE TABLE `print_doc_permissions` (
  `role_id` int(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `print_list_of_tickets` enum('Yes','No') DEFAULT NULL,
  `service_invoice` enum('Yes','No') DEFAULT NULL,
  `mr` enum('Yes','No') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `print_doc_permissions`
--

INSERT INTO `print_doc_permissions` (`role_id`, `role`, `print_list_of_tickets`, `service_invoice`, `mr`) VALUES
(1, 'super admin', 'Yes', 'Yes', 'Yes'),
(2, 'admin', 'Yes', 'Yes', 'Yes'),
(3, 'service support', 'No', 'Yes', 'Yes'),
(4, 'service', 'No', 'Yes', 'Yes'),
(5, 'technical support', 'No', 'No', 'No'),
(6, 'technical', 'No', 'No', 'No'),
(7, 'user', 'No', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `service_invoice`
--

CREATE TABLE `service_invoice` (
  `se_id` int(255) NOT NULL,
  `ticket_no` varchar(255) NOT NULL,
  `serial_no` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `pmc_charges_php` varchar(255) NOT NULL,
  `lo_charges_php` varchar(255) NOT NULL,
  `labor_and_parts_cost` varchar(255) NOT NULL,
  `approved_by` varchar(255) NOT NULL,
  `checked_by` varchar(255) NOT NULL,
  `released_by` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `technical_activity_permissions`
--

CREATE TABLE `technical_activity_permissions` (
  `role_id` int(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `assign_technician` varchar(255) NOT NULL,
  `close_ticket` varchar(255) NOT NULL,
  `create_diagnose` varchar(255) NOT NULL,
  `edit_memo` varchar(255) NOT NULL,
  `delete_memo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `technical_activity_permissions`
--

INSERT INTO `technical_activity_permissions` (`role_id`, `role`, `assign_technician`, `close_ticket`, `create_diagnose`, `edit_memo`, `delete_memo`) VALUES
(1, 'super admin', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(2, 'admin', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(3, 'service support', 'Yes', 'Yes', 'No', 'No', 'No'),
(4, 'service', 'Yes', 'Yes', 'No', 'No', 'No'),
(5, 'technical support', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(6, 'technical', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(7, 'user', 'No', 'Yes', 'No', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_operations_permissions`
--

CREATE TABLE `ticket_operations_permissions` (
  `role_id` int(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `edit_ticket` varchar(255) NOT NULL,
  `resume_ticket` varchar(255) NOT NULL,
  `cancel_ticket` varchar(255) NOT NULL,
  `delete_entirely` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_operations_permissions`
--

INSERT INTO `ticket_operations_permissions` (`role_id`, `role`, `edit_ticket`, `resume_ticket`, `cancel_ticket`, `delete_entirely`) VALUES
(1, 'super admin', 'Yes', 'Yes', 'Yes', 'Yes'),
(2, 'admin', 'Yes', 'Yes', 'Yes', 'Yes'),
(3, 'service support', 'No', 'No', 'No', 'No'),
(4, 'service', 'Yes', 'Yes', 'Yes', 'Yes'),
(5, 'technical support', 'No', 'No', 'No', 'No'),
(6, 'technical', 'Yes', 'Yes', 'Yes', 'Yes'),
(7, 'user', 'Yes', 'No', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_status`
--

CREATE TABLE `ticket_status` (
  `ticket_status_id` int(255) NOT NULL,
  `ticket_id` int(255) NOT NULL,
  `technician_name` varchar(255) NOT NULL,
  `date_assigned` date NOT NULL,
  `ticket_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_files`
--

CREATE TABLE `uploaded_files` (
  `id` int(11) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_management_permission`
--
ALTER TABLE `account_management_permission`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iequity_tickets`
--
ALTER TABLE `iequity_tickets`
  ADD PRIMARY KEY (`ticket_no`);

--
-- Indexes for table `iequity_users`
--
ALTER TABLE `iequity_users`
  ADD PRIMARY KEY (`account_no`);

--
-- Indexes for table `labor_or_other_charges`
--
ALTER TABLE `labor_or_other_charges`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `memo`
--
ALTER TABLE `memo`
  ADD PRIMARY KEY (`memo_id`);

--
-- Indexes for table `mr`
--
ALTER TABLE `mr`
  ADD PRIMARY KEY (`mr_no`);

--
-- Indexes for table `parts_or_material_charges`
--
ALTER TABLE `parts_or_material_charges`
  ADD PRIMARY KEY (`pmc_id`);

--
-- Indexes for table `print_doc_permissions`
--
ALTER TABLE `print_doc_permissions`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `service_invoice`
--
ALTER TABLE `service_invoice`
  ADD PRIMARY KEY (`se_id`);

--
-- Indexes for table `technical_activity_permissions`
--
ALTER TABLE `technical_activity_permissions`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `ticket_operations_permissions`
--
ALTER TABLE `ticket_operations_permissions`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `ticket_status`
--
ALTER TABLE `ticket_status`
  ADD PRIMARY KEY (`ticket_status_id`);

--
-- Indexes for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_management_permission`
--
ALTER TABLE `account_management_permission`
  MODIFY `role_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `company_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iequity_tickets`
--
ALTER TABLE `iequity_tickets`
  MODIFY `ticket_no` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iequity_users`
--
ALTER TABLE `iequity_users`
  MODIFY `account_no` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labor_or_other_charges`
--
ALTER TABLE `labor_or_other_charges`
  MODIFY `loc_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `memo`
--
ALTER TABLE `memo`
  MODIFY `memo_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mr`
--
ALTER TABLE `mr`
  MODIFY `mr_no` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parts_or_material_charges`
--
ALTER TABLE `parts_or_material_charges`
  MODIFY `pmc_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `print_doc_permissions`
--
ALTER TABLE `print_doc_permissions`
  MODIFY `role_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `service_invoice`
--
ALTER TABLE `service_invoice`
  MODIFY `se_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `technical_activity_permissions`
--
ALTER TABLE `technical_activity_permissions`
  MODIFY `role_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ticket_operations_permissions`
--
ALTER TABLE `ticket_operations_permissions`
  MODIFY `role_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ticket_status`
--
ALTER TABLE `ticket_status`
  MODIFY `ticket_status_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
