#
# TABLE STRUCTURE FOR: account_management_permission
#

DROP TABLE IF EXISTS `account_management_permission`;

CREATE TABLE `account_management_permission` (
  `role_id` int(255) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  `delete_account` varchar(255) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO `account_management_permission` (`role_id`, `role`, `delete_account`) VALUES (1, 'super admin', 'Yes');
INSERT INTO `account_management_permission` (`role_id`, `role`, `delete_account`) VALUES (2, 'admin', 'Yes');
INSERT INTO `account_management_permission` (`role_id`, `role`, `delete_account`) VALUES (3, 'service support', 'No');
INSERT INTO `account_management_permission` (`role_id`, `role`, `delete_account`) VALUES (4, 'service', 'No');
INSERT INTO `account_management_permission` (`role_id`, `role`, `delete_account`) VALUES (5, 'technical support', 'No');
INSERT INTO `account_management_permission` (`role_id`, `role`, `delete_account`) VALUES (6, 'technical', 'No');
INSERT INTO `account_management_permission` (`role_id`, `role`, `delete_account`) VALUES (7, 'user', 'No');


#
# TABLE STRUCTURE FOR: cancelled_tickets
#

DROP TABLE IF EXISTS `cancelled_tickets`;

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

INSERT INTO `cancelled_tickets` (`ticket_no`, `fname`, `mname`, `lname`, `email`, `mobile`, `comp_name`, `comp_address`, `comp_tel`, `department`, `tin_no`, `ticket_registration_date`, `t_ticket_status`, `t_technical_assigned`, `t_model`, `t_serial_no`, `t_dr_no`, `t_problem`, `t_qty`, `t_unit`, `warranty`, `date_of_release`) VALUES (3, 'Juan', 'Dela', 'Cruz', 'admin@gmail.com', '09555555555', 'iEquity', 'Pasig City', 'N/a', 'Admin', 'N/a', '2024-03-08', 'unassigned', 'none', 'Acer Laptop', '123123', 'n/a', 'Help', 1, '1', 'yes', '0000-00-00');
INSERT INTO `cancelled_tickets` (`ticket_no`, `fname`, `mname`, `lname`, `email`, `mobile`, `comp_name`, `comp_address`, `comp_tel`, `department`, `tin_no`, `ticket_registration_date`, `t_ticket_status`, `t_technical_assigned`, `t_model`, `t_serial_no`, `t_dr_no`, `t_problem`, `t_qty`, `t_unit`, `warranty`, `date_of_release`) VALUES (4, 'Julian Paolo', 'Villanueva', 'Velasco', 'user1@gmail.com', '09888888888', 'MSI', 'Pasig City', 'N/A', 'Technical ', 'N/A', '2024-03-08', 'unassigned', 'none', 'Acer Laptop', '18401', 'N/A', 'Need Help', 1, '1', 'yes', '0000-00-00');


#
# TABLE STRUCTURE FOR: company_profile
#

DROP TABLE IF EXISTS `company_profile`;

CREATE TABLE `company_profile` (
  `company_id` int(255) NOT NULL AUTO_INCREMENT,
  `comp_logo` varchar(255) NOT NULL,
  `comp_name` varchar(255) NOT NULL,
  `comp_bldg_pic` varchar(255) NOT NULL,
  `comp_address` varchar(255) NOT NULL,
  `comp_tel_no` varchar(255) NOT NULL,
  `comp_telefax` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `comp_email` varchar(255) NOT NULL,
  `comp_web_address` varchar(255) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO `company_profile` (`company_id`, `comp_logo`, `comp_name`, `comp_bldg_pic`, `comp_address`, `comp_tel_no`, `comp_telefax`, `contact_no`, `comp_email`, `comp_web_address`) VALUES (1, 'iequity_logo1.png', 'iEquity Technologies Corporation', 'Tektite_bldg.jpg', 'Unit 813, West Tower, Tektite Tower, Exchange Road, Ortigas Center, Pasig City, Philippines', '(632) 570 - 9381 | 584 - 2926 | 584 - 3303', '(632) 571 - 8350', '0917-629-9952 | 0917-651-2854 | 0917-632-6089', 'service@iequity.com.ph', 'https://www.iequity.com.ph');


#
# TABLE STRUCTURE FOR: contact_form
#

DROP TABLE IF EXISTS `contact_form`;

CREATE TABLE `contact_form` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO `contact_form` (`id`, `first_name`, `last_name`, `email`, `subject`, `message`, `created_at`) VALUES (1, 'Alexander', 'Dumaraos', 'dumaraosalex8@gmail.com', 'Return', 'NOOOO', '2024-03-08 14:31:16');
INSERT INTO `contact_form` (`id`, `first_name`, `last_name`, `email`, `subject`, `message`, `created_at`) VALUES (2, 'Marvie_Joy', 'Cababat', 'example@gmail.com', 'Repair ', 'How can we send you our items to be repaired', '2024-03-08 14:34:40');


#
# TABLE STRUCTURE FOR: iequity_tickets
#

DROP TABLE IF EXISTS `iequity_tickets`;

CREATE TABLE `iequity_tickets` (
  `ticket_no` int(255) NOT NULL AUTO_INCREMENT,
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
  `date_of_release` date NOT NULL,
  PRIMARY KEY (`ticket_no`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO `iequity_tickets` (`ticket_no`, `fname`, `mname`, `lname`, `email`, `mobile`, `comp_name`, `comp_address`, `comp_tel`, `department`, `tin_no`, `ticket_registration_date`, `t_ticket_status`, `t_technical_assigned`, `t_model`, `t_serial_no`, `t_dr_no`, `t_problem`, `t_qty`, `t_unit`, `warranty`, `date_of_release`) VALUES (1, 'Julian Paolo', 'Villanueva', 'Velasco', 'therealjpvelasco34@gmail.com', '09774164268', 'iEquity', 'Pasig City', 'N/A', 'Technical ', 'n/a', '2024-03-08', 'open', 'Tech Cal', 'Acer Laptop', 'N12345678', 'N/A', 'No sound output', 2, '23', 'yes', '0000-00-00');
INSERT INTO `iequity_tickets` (`ticket_no`, `fname`, `mname`, `lname`, `email`, `mobile`, `comp_name`, `comp_address`, `comp_tel`, `department`, `tin_no`, `ticket_registration_date`, `t_ticket_status`, `t_technical_assigned`, `t_model`, `t_serial_no`, `t_dr_no`, `t_problem`, `t_qty`, `t_unit`, `warranty`, `date_of_release`) VALUES (5, 'Alexander', 'Maderal', 'Dumaraos', 'user2@gmail.com', '09165581490', 'iEquity', 'Pasig City', 'N/A', 'Sales', 'N/A', '2024-03-08', 'closed', 'Tech Cal', 'HP', '749812', 'N/A', 'Help', 11, '1', 'yes', '2024-03-08');


#
# TABLE STRUCTURE FOR: iequity_users
#

DROP TABLE IF EXISTS `iequity_users`;

CREATE TABLE `iequity_users` (
  `account_no` int(255) NOT NULL AUTO_INCREMENT,
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
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`account_no`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO `iequity_users` (`account_no`, `account_type`, `email_verification`, `user_registration_date`, `fname`, `mname`, `lname`, `email`, `mobile`, `comp_name`, `comp_address`, `comp_tel`, `department`, `tin_no`, `password`) VALUES (1, 'user', 1, '2024-03-08', 'Julian Paolo', 'Villanueva', 'Velasco', 'therealjpvelasco34@gmail.com', '09774164268', 'iEquity', 'Pasig City', 'N/A', 'Technical ', 'n/a', '$2y$10$VP1tdIeofF9WWjcHAiLoOuLfjtWfA7/oavzRkUfofObEUHcfxPwbO');
INSERT INTO `iequity_users` (`account_no`, `account_type`, `email_verification`, `user_registration_date`, `fname`, `mname`, `lname`, `email`, `mobile`, `comp_name`, `comp_address`, `comp_tel`, `department`, `tin_no`, `password`) VALUES (2, 'super admin', 1, '2024-03-08', 'Alexander', 'Maderal', 'Dumaraos', 'dumaraosalex8@gmail.com', '09165581490', 'iEquity', 'Pasig City', 'N/a', 'Technical ', 'n/a', '$2y$10$ZYMPRCJJb.2mqTzKcra4beX//PieugEPkVdRE9lffMIwbklQkkKpy');
INSERT INTO `iequity_users` (`account_no`, `account_type`, `email_verification`, `user_registration_date`, `fname`, `mname`, `lname`, `email`, `mobile`, `comp_name`, `comp_address`, `comp_tel`, `department`, `tin_no`, `password`) VALUES (3, 'technical', 1, '2024-03-08', 'Tech', 'Ni', 'Cal', 'technical@gmail.com', '09111111111', 'iEquity', 'Pasig City', 'N/a', 'Technical ', 'n/a', '$2y$10$.wyqjmTzWupn.6ncb1Fm0eeCJDzYdJR6Avxx0X8d7phsBj9fpTeEm');
INSERT INTO `iequity_users` (`account_no`, `account_type`, `email_verification`, `user_registration_date`, `fname`, `mname`, `lname`, `email`, `mobile`, `comp_name`, `comp_address`, `comp_tel`, `department`, `tin_no`, `password`) VALUES (4, 'technical support', 1, '2024-03-08', 'Tech', 'Ni', 'Supp', 'technical.support@gmail.com', '09222222222', 'iEquity', 'Pasig City', 'N', 'Technical ', 'n/a', '$2y$10$piiGNx.kTqsXn4AFGUe02euDpbM/Ojt7gkWet8hbVVt6ntC4AadhC');
INSERT INTO `iequity_users` (`account_no`, `account_type`, `email_verification`, `user_registration_date`, `fname`, `mname`, `lname`, `email`, `mobile`, `comp_name`, `comp_address`, `comp_tel`, `department`, `tin_no`, `password`) VALUES (5, 'service', 1, '2024-03-08', 'Ser', 'V', 'Ice', 'service@gmail.com', '09333333333', 'iEquity', 'Pasig City', 'N', 'Service', 'n/a', '$2y$10$6sjLmukWn2PR8Z7yRrE1Xegb2L2aXKs2Wn9TIwBbzsS3vslHQUQSC');
INSERT INTO `iequity_users` (`account_no`, `account_type`, `email_verification`, `user_registration_date`, `fname`, `mname`, `lname`, `email`, `mobile`, `comp_name`, `comp_address`, `comp_tel`, `department`, `tin_no`, `password`) VALUES (6, 'service support', 1, '2024-03-08', 'Serv', 'Ice', 'Supp', 'service.support@gmail.com', '09444444444', 'iEquity', 'Pasig City', 'N/a', 'Service', 'n/a', '$2y$10$p3YM3kL6CTxcC.1vx80l2.BgnpoO7QN5wFLq/MvgAbi4R5hZu0Yhq');
INSERT INTO `iequity_users` (`account_no`, `account_type`, `email_verification`, `user_registration_date`, `fname`, `mname`, `lname`, `email`, `mobile`, `comp_name`, `comp_address`, `comp_tel`, `department`, `tin_no`, `password`) VALUES (7, 'admin', 1, '2024-03-08', 'Juan', 'Dela', 'Cruz', 'admin@gmail.com', '09555555555', 'iEquity', 'Pasig City', 'N/a', 'Admin', 'N/a', '$2y$10$YE3GvsfoSDsNzMeyN.UmvuXaCf2IrOTX9AUolex0Aa/uGXfzsDLje');
INSERT INTO `iequity_users` (`account_no`, `account_type`, `email_verification`, `user_registration_date`, `fname`, `mname`, `lname`, `email`, `mobile`, `comp_name`, `comp_address`, `comp_tel`, `department`, `tin_no`, `password`) VALUES (8, 'user', 1, '2024-03-08', 'Julian Paolo', 'Villanueva', 'Velasco', 'user1@gmail.com', '09888888888', 'MSI', 'Pasig City', 'N/A', 'Technical ', 'N/A', '$2y$10$x5z04K3KK.FvzS5/HsCNxeV5KRSqe8sFRRRU4vlGUCB.1M4qpHIM2');
INSERT INTO `iequity_users` (`account_no`, `account_type`, `email_verification`, `user_registration_date`, `fname`, `mname`, `lname`, `email`, `mobile`, `comp_name`, `comp_address`, `comp_tel`, `department`, `tin_no`, `password`) VALUES (9, 'user', 1, '2024-03-08', 'Alexander', 'Maderal', 'Dumaraos', 'user2@gmail.com', '09165581490', 'iEquity', 'Pasig City', 'N/A', 'Sales', 'N/A', '$2y$10$4JoImU57m.2mzZQpUMV8/.tDvD6M3NWsULHoojeO4WPQlsBJm5Dyi');


#
# TABLE STRUCTURE FOR: labor_or_other_charges
#

DROP TABLE IF EXISTS `labor_or_other_charges`;

CREATE TABLE `labor_or_other_charges` (
  `loc_id` int(255) NOT NULL AUTO_INCREMENT,
  `ticket_no` varchar(255) NOT NULL,
  `charges` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  PRIMARY KEY (`loc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# TABLE STRUCTURE FOR: memo
#

DROP TABLE IF EXISTS `memo`;

CREATE TABLE `memo` (
  `memo_id` int(255) NOT NULL AUTO_INCREMENT,
  `ticket_no` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `problem` varchar(255) NOT NULL,
  `repair_solution` varchar(255) NOT NULL,
  `accessories` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `attachments` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`memo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO `memo` (`memo_id`, `ticket_no`, `date`, `problem`, `repair_solution`, `accessories`, `status`, `attachments`) VALUES (2, '5', '2024-03-08', 'lcd', 'Change lcd', 'Charger', 'on-progress', 'Sample_serviceinvoice2.jpg');
INSERT INTO `memo` (`memo_id`, `ticket_no`, `date`, `problem`, `repair_solution`, `accessories`, `status`, `attachments`) VALUES (3, '5', '2024-03-08', 'LCD', 'Change LCD, Done', 'Charger', 'repaired', 'Alejandro_OUTPUT3.pdf');


#
# TABLE STRUCTURE FOR: mr
#

DROP TABLE IF EXISTS `mr`;

CREATE TABLE `mr` (
  `mr_no` int(255) NOT NULL AUTO_INCREMENT,
  `ticket_no` varchar(255) NOT NULL,
  `serial_no` varchar(255) NOT NULL,
  `accessories` varchar(255) NOT NULL,
  `prepared_by` varchar(255) NOT NULL,
  `received_by` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`mr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO `mr` (`mr_no`, `ticket_no`, `serial_no`, `accessories`, `prepared_by`, `received_by`, `remarks`, `status`, `date`) VALUES (1, '1', '', '', 'Technical', '', 'Done', 'PULL-OUT', '2024-03-08');


#
# TABLE STRUCTURE FOR: parts_or_material_charges
#

DROP TABLE IF EXISTS `parts_or_material_charges`;

CREATE TABLE `parts_or_material_charges` (
  `pmc_id` int(255) NOT NULL AUTO_INCREMENT,
  `ticket_no` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  PRIMARY KEY (`pmc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# TABLE STRUCTURE FOR: print_doc_permissions
#

DROP TABLE IF EXISTS `print_doc_permissions`;

CREATE TABLE `print_doc_permissions` (
  `role_id` int(255) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  `print_list_of_tickets` enum('Yes','No') DEFAULT NULL,
  `service_invoice` enum('Yes','No') DEFAULT NULL,
  `mr` enum('Yes','No') DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO `print_doc_permissions` (`role_id`, `role`, `print_list_of_tickets`, `service_invoice`, `mr`) VALUES (1, 'super admin', 'Yes', 'Yes', 'Yes');
INSERT INTO `print_doc_permissions` (`role_id`, `role`, `print_list_of_tickets`, `service_invoice`, `mr`) VALUES (2, 'admin', 'Yes', 'Yes', 'Yes');
INSERT INTO `print_doc_permissions` (`role_id`, `role`, `print_list_of_tickets`, `service_invoice`, `mr`) VALUES (3, 'service support', 'No', 'Yes', 'Yes');
INSERT INTO `print_doc_permissions` (`role_id`, `role`, `print_list_of_tickets`, `service_invoice`, `mr`) VALUES (4, 'service', 'No', 'Yes', 'Yes');
INSERT INTO `print_doc_permissions` (`role_id`, `role`, `print_list_of_tickets`, `service_invoice`, `mr`) VALUES (5, 'technical support', 'No', 'No', 'No');
INSERT INTO `print_doc_permissions` (`role_id`, `role`, `print_list_of_tickets`, `service_invoice`, `mr`) VALUES (6, 'technical', 'No', 'No', 'No');
INSERT INTO `print_doc_permissions` (`role_id`, `role`, `print_list_of_tickets`, `service_invoice`, `mr`) VALUES (7, 'user', 'No', 'No', 'No');


#
# TABLE STRUCTURE FOR: service_invoice
#

DROP TABLE IF EXISTS `service_invoice`;

CREATE TABLE `service_invoice` (
  `se_id` int(255) NOT NULL AUTO_INCREMENT,
  `ticket_no` varchar(255) NOT NULL,
  `serial_no` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `pmc_charges_php` varchar(255) NOT NULL,
  `lo_charges_php` varchar(255) NOT NULL,
  `labor_and_parts_cost` varchar(255) NOT NULL,
  `approved_by` varchar(255) NOT NULL,
  `checked_by` varchar(255) NOT NULL,
  `released_by` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`se_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

#
# TABLE STRUCTURE FOR: technical_activity_permissions
#

DROP TABLE IF EXISTS `technical_activity_permissions`;

CREATE TABLE `technical_activity_permissions` (
  `role_id` int(255) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  `assign_technician` varchar(255) NOT NULL,
  `close_ticket` varchar(255) NOT NULL,
  `create_diagnose` varchar(255) NOT NULL,
  `edit_memo` varchar(255) NOT NULL,
  `delete_memo` varchar(255) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO `technical_activity_permissions` (`role_id`, `role`, `assign_technician`, `close_ticket`, `create_diagnose`, `edit_memo`, `delete_memo`) VALUES (1, 'super admin', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes');
INSERT INTO `technical_activity_permissions` (`role_id`, `role`, `assign_technician`, `close_ticket`, `create_diagnose`, `edit_memo`, `delete_memo`) VALUES (2, 'admin', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes');
INSERT INTO `technical_activity_permissions` (`role_id`, `role`, `assign_technician`, `close_ticket`, `create_diagnose`, `edit_memo`, `delete_memo`) VALUES (3, 'service support', 'Yes', 'Yes', 'No', 'No', 'No');
INSERT INTO `technical_activity_permissions` (`role_id`, `role`, `assign_technician`, `close_ticket`, `create_diagnose`, `edit_memo`, `delete_memo`) VALUES (4, 'service', 'Yes', 'Yes', 'No', 'No', 'No');
INSERT INTO `technical_activity_permissions` (`role_id`, `role`, `assign_technician`, `close_ticket`, `create_diagnose`, `edit_memo`, `delete_memo`) VALUES (5, 'technical support', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes');
INSERT INTO `technical_activity_permissions` (`role_id`, `role`, `assign_technician`, `close_ticket`, `create_diagnose`, `edit_memo`, `delete_memo`) VALUES (6, 'technical', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes');
INSERT INTO `technical_activity_permissions` (`role_id`, `role`, `assign_technician`, `close_ticket`, `create_diagnose`, `edit_memo`, `delete_memo`) VALUES (7, 'user', 'No', 'Yes', 'No', 'No', 'No');


#
# TABLE STRUCTURE FOR: ticket_operations_permissions
#

DROP TABLE IF EXISTS `ticket_operations_permissions`;

CREATE TABLE `ticket_operations_permissions` (
  `role_id` int(255) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  `edit_ticket` varchar(255) NOT NULL,
  `resume_ticket` varchar(255) NOT NULL,
  `cancel_ticket` varchar(255) NOT NULL,
  `delete_entirely` varchar(255) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO `ticket_operations_permissions` (`role_id`, `role`, `edit_ticket`, `resume_ticket`, `cancel_ticket`, `delete_entirely`) VALUES (1, 'super admin', 'Yes', 'Yes', 'Yes', 'Yes');
INSERT INTO `ticket_operations_permissions` (`role_id`, `role`, `edit_ticket`, `resume_ticket`, `cancel_ticket`, `delete_entirely`) VALUES (2, 'admin', 'Yes', 'Yes', 'Yes', 'Yes');
INSERT INTO `ticket_operations_permissions` (`role_id`, `role`, `edit_ticket`, `resume_ticket`, `cancel_ticket`, `delete_entirely`) VALUES (3, 'service support', 'No', 'No', 'No', 'No');
INSERT INTO `ticket_operations_permissions` (`role_id`, `role`, `edit_ticket`, `resume_ticket`, `cancel_ticket`, `delete_entirely`) VALUES (4, 'service', 'Yes', 'Yes', 'Yes', 'Yes');
INSERT INTO `ticket_operations_permissions` (`role_id`, `role`, `edit_ticket`, `resume_ticket`, `cancel_ticket`, `delete_entirely`) VALUES (5, 'technical support', 'No', 'No', 'No', 'No');
INSERT INTO `ticket_operations_permissions` (`role_id`, `role`, `edit_ticket`, `resume_ticket`, `cancel_ticket`, `delete_entirely`) VALUES (6, 'technical', 'Yes', 'Yes', 'Yes', 'Yes');
INSERT INTO `ticket_operations_permissions` (`role_id`, `role`, `edit_ticket`, `resume_ticket`, `cancel_ticket`, `delete_entirely`) VALUES (7, 'user', 'Yes', 'No', 'Yes', 'Yes');


#
# TABLE STRUCTURE FOR: ticket_status
#

DROP TABLE IF EXISTS `ticket_status`;

CREATE TABLE `ticket_status` (
  `ticket_status_id` int(255) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(255) NOT NULL,
  `technician_name` varchar(255) NOT NULL,
  `date_assigned` date NOT NULL,
  `ticket_status` varchar(255) NOT NULL,
  PRIMARY KEY (`ticket_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO `ticket_status` (`ticket_status_id`, `ticket_id`, `technician_name`, `date_assigned`, `ticket_status`) VALUES (1, 1, 'Tech Cal', '2024-03-08', 'open');
INSERT INTO `ticket_status` (`ticket_status_id`, `ticket_id`, `technician_name`, `date_assigned`, `ticket_status`) VALUES (2, 1, 'Tech Supp', '2024-03-08', 'open');
INSERT INTO `ticket_status` (`ticket_status_id`, `ticket_id`, `technician_name`, `date_assigned`, `ticket_status`) VALUES (3, 5, 'Tech Cal', '2024-03-08', 'open');


#
# TABLE STRUCTURE FOR: uploaded_files
#

DROP TABLE IF EXISTS `uploaded_files`;

CREATE TABLE `uploaded_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receiver` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO `uploaded_files` (`id`, `receiver`, `subject`, `message`, `file_name`) VALUES (1, 'user2@gmail.com', 'Return', 'OTW', 'logo template.docx');


