-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 24, 2022 at 01:04 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_tourz_crm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings_tbl`
--

CREATE TABLE `bookings_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `booking_date` date NOT NULL,
  `no_of_adults` varchar(255) NOT NULL,
  `no_of_childs` varchar(255) NOT NULL,
  `package_id` int(11) NOT NULL,
  `per_ticket_price` varchar(255) NOT NULL,
  `total_costs` decimal(10,0) NOT NULL,
  `total_expense` varchar(255) NOT NULL,
  `discounts` varchar(255) NOT NULL,
  `vats` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `cash_type` tinyint(1) NOT NULL COMMENT '1 Cash on pickup',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 pending, 1 confirm, 2 delete, 3 reject, 4 No show',
  `ip_address` varchar(255) NOT NULL,
  `added_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings_tbl`
--

INSERT INTO `bookings_tbl` (`id`, `name`, `email`, `phone_no`, `booking_date`, `no_of_adults`, `no_of_childs`, `package_id`, `per_ticket_price`, `total_costs`, `total_expense`, `discounts`, `vats`, `message`, `cash_type`, `status`, `ip_address`, `added_on`, `updated_on`, `is_new`) VALUES
(63, 'Ghhh', 'Bnbb@rygg.ffg', 'Ghhh', '2018-11-21', '1', '10', 13, '', '4125', '0', '', '', 'Vbvhg', 1, 0, '92.97.176.185', '2018-11-06 08:57:30', '0000-00-00 00:00:00', 1),
(64, 'Sanjeev sachdeva', 'Sachlaw@gmail.com', '9829247907', '2018-12-06', '4', '', 11, '', '600', '0', '', '', '', 1, 0, '223.189.179.158', '2018-12-03 01:52:07', '0000-00-00 00:00:00', 1),
(65, 'Trinathsabar  deaf  ', 'Trinathsabar69101@gmail.com', '6370488364', '1969-12-31', '10', '10', 5, '', '3240', '0', '', '', 'I am you work help  deaf  yes like  friend .communication.. ', 1, 0, '137.97.18.152', '2018-12-25 11:54:12', '0000-00-00 00:00:00', 1),
(66, 'Balawal saleem', 'Balawalsaleem@gmail.com', '00966537293123', '2019-02-03', '1', '', 1, '', '149', '0', '', '', '', 1, 0, '95.186.60.140', '2018-12-28 14:51:26', '0000-00-00 00:00:00', 1),
(67, 'Balawal saleem', 'Balawalsaleem@gmail.com', '00966537293123', '2019-02-04', '1', '', 1, '', '149', '0', '', '', '', 1, 0, '95.186.60.140', '2018-12-28 14:51:48', '0000-00-00 00:00:00', 0),
(68, 'Mr,Mrs Hakeem ', 'Gmsharmeen5@gmail.com', '00923208363132', '2019-11-01', '2', '', 5, '', '350', '0', '', '', 'I am coming this month ', 1, 0, '45.116.232.32', '2019-10-03 21:31:30', '0000-00-00 00:00:00', 1),
(69, 'Mr,Mrs Hakeem ', 'Gmsharmeen5@gmail.com', '00923208363132', '2019-11-01', '2', '', 5, '', '350', '0', '', '', 'I am coming this month ', 1, 0, '45.116.232.32', '2019-10-03 21:31:43', '0000-00-00 00:00:00', 1),
(70, 'Mr,Mrs Hakeem ', 'Gmsharmeen5@gmail.com', '00923208363132', '2019-11-01', '2', '', 5, '', '350', '0', '', '', 'I am coming this month ', 1, 0, '45.116.232.32', '2019-10-03 21:32:00', '0000-00-00 00:00:00', 1),
(71, 'Mr,Mrs Hakeem ', 'Gmsharmeen5@gmail.com', '00923208363132', '2019-11-01', '2', '', 5, '', '350', '0', '', '', 'I am coming this month why would I ', 1, 0, '45.116.232.32', '2019-10-03 21:32:18', '0000-00-00 00:00:00', 1),
(72, 'Mr,Mrs Hakeem ', 'Gmsharmeen5@gmail.com', '00923208363132', '2019-11-01', '2', '', 5, '', '350', '0', '', '', 'I am coming this month why would I ', 1, 0, '45.116.232.32', '2019-10-03 21:32:20', '0000-00-00 00:00:00', 1),
(73, 'Mr,Mrs Hakeem ', 'Gmsharmeen5@gmail.com', '00923208363132', '2019-11-01', '2', '', 5, '', '350', '0', '', '', 'I am coming this month why would I ', 1, 0, '45.116.232.32', '2019-10-03 21:32:23', '0000-00-00 00:00:00', 1),
(74, 'Mr,Mrs Hakeem ', 'Gmsharmeen5@gmail.com', '00923208363132', '2019-11-01', '2', '', 5, '', '350', '0', '', '', 'I am coming this month why would I ', 1, 0, '45.116.232.32', '2019-10-03 21:32:25', '0000-00-00 00:00:00', 1),
(75, 'Mr,Mrs Hakeem ', 'Gmsharmeen5@gmail.com', '00923208363132', '2019-11-01', '2', '', 5, '', '350', '0', '', '', 'I am coming this month why would I ', 1, 0, '45.116.232.32', '2019-10-03 21:32:27', '0000-00-00 00:00:00', 1),
(76, 'Mr,Mrs Hakeem ', 'Gmsharmeen5@gmail.com', '00923208363132', '2019-11-01', '2', '', 5, '', '350', '0', '', '', 'I am coming this month why would I ', 1, 0, '45.116.232.32', '2019-10-03 21:32:30', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `config_tbl`
--

CREATE TABLE `config_tbl` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `per_kg_price_for_adult` varchar(255) NOT NULL,
  `per_kg_price_for_child` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `disclaimer` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `website` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `copyrights` varchar(255) NOT NULL,
  `booking_email_template` text NOT NULL,
  `property_desc_heading` text NOT NULL,
  `property_desc_footer` text NOT NULL,
  `generic_location_desc` text NOT NULL,
  `generic_sale_location_desc` text NOT NULL,
  `generic_rent_location_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config_tbl`
--

INSERT INTO `config_tbl` (`id`, `company_name`, `per_kg_price_for_adult`, `per_kg_price_for_child`, `summary`, `disclaimer`, `image`, `address_1`, `address_2`, `website`, `email`, `phone_no`, `copyrights`, `booking_email_template`, `property_desc_heading`, `property_desc_footer`, `generic_location_desc`, `generic_sale_location_desc`, `generic_rent_location_desc`) VALUES
(1, 'DigitalPoin8', 'DP-S', 'DP-R', 'DigitalPoin8 Real Estate, is an emerging player in the real estate market in Dubai. Our philosophy is centred on upholding the highest standards of quality, integrity and transparency. We lay utmost emphasis on customer satisfaction and offer variegated services to ensure the clients receive a wellrounded and an optimal service experience. Call our experienced team on + 971 55 2900887 Or send us an email quoting the property reference number at info@digitalpoin8.com', 'The information in this email and in any files transmitted with it is intended only for the addressee and may contain confidential and/or privileged material. Access to this email by anyone else is unauthorized. If you receive this in error, please contact the sender immediately and delete the material from any computer. If you are not the intended recipient, any disclosure, copying, distribution or any action taken or omitted to be taken in reliance on it, is strictly prohibited. Statement and opinions expressed in this e-mail are those of the sender, and do not necessarily reflect those of Digitalpoin8. Digitalpoin8 accepts no liability for any damage caused by any virus/worms transmitted by this email.\r\n <br><br>\r\nBuysellown, Dubai, UAE, <a href=\"http://www.digitalpoin8.com\" target=\"_blank\">http://www.digitalpoin8.com</a>', 'logo-tourz.png', 'Call DigitalPoin8 on + 971 55 2900887 to view this property', 'Office 701, Concord Tower, Dubai Media City, Dubai - UAE', 'http://www.digitalpoin8.com', 'info@digitalpoin8.com', '971555584251', 'Powered by DigitalPoin8', '<table style=\"color:#000000; font-size:12px; font-family:tahoma;\" align=\"center\" border=\"0\" cellpadding=\"7\" cellspacing=\"7\" width=\"90%\"> <tbody> <tr> <td> <h4>Booking Details Info</h4> </td> </tr> <tr> <td><p> Dear {{name}}, <br> <br> We are sending you the Tourz booking details as : <br> <br> {{booking_details}} <br> <br> Tourz CRM Team </p></td> </tr> </tbody> </table>  ', 'We speak different languages - Arabic, French, Russian, Dutch, English<br> <br>If you want to book a viewing of this unique property call <br>[[agent_name]]  [[agent_contact_no]] <br>[[agent_email]]<br> <br>Our\r\n successors always take care of the relationships and trust that we have\r\n and will receive the same from our customers and partners!<br><br>Property: [[property_bedrooms]] BR [[listing_category]]<br>Bathrooms: [[property_bathroom]]<br>Size: [[property_size]] [[measuring_unit]]<br>View: [[property_view]]<br>Parking spaces: [[parking_space]]<br>Close to:  [[closed_to]]<br> <br>Facilities: [[facilities]]<br>Service Charges: Fully Paid<br>Vacancy: <br> <br>Other Details:<br>Owner: In Dubai<br> <br>Price: [[property_price]]<br> <br>Similar Properties We Have:', 'P.S. The paperwork can be finished within 2 days, once you make a decision.<br> <br><br>Office Details:<br> <br>Office 701 Concord Tower<br>Dubai Media City UAE<br>T: +971 4 454 7337<br>P.O. Box 487245<br>W: www.buy-sell-own.com', '<p>Dubai \"one of the most futuristic, worldly and luxurious cities on the \r\nmap.\" An international city with a Western-style business model. Built \r\non sand and superlatives, Biggest, Tallest. The most visited cities in \r\nthe world. A barren landscape transformed into a thriving metropolis. \r\nLive, own, sell properties in the most thrilling place and be amazed.<br><br>BUY better, SELL faster, OWN greater with BUYSELLOWN!</p>', '<p>Other expenditures:<br><br>10% Down Payment;<br>4% Transfer Fees;<br>2% Agency Commission<br></p>', '<p>Other expenditures:<br><br>5 % Security Deposit (Refundable) (Unfurnished) / 10 % Security Deposit (Refundable) (Fully Furnished)<br>5 % Agency Fees</p>');

-- --------------------------------------------------------

--
-- Table structure for table `modules_tbl`
--

CREATE TABLE `modules_tbl` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `url_address` varchar(255) NOT NULL,
  `icon_name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `controller_name` varchar(255) NOT NULL,
  `added_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules_tbl`
--

INSERT INTO `modules_tbl` (`id`, `parent_id`, `name`, `url_address`, `icon_name`, `sort_order`, `controller_name`, `added_by`, `created_on`) VALUES
(1, 0, 'Dashboard', '/', 'icon-home5', 1, 'Dashboard', 1, '2017-04-04 20:40:53'),
(2, 0, 'Data Management', '', 'icon-folder-plus2', 2, '', 1, '2017-04-04 20:41:20'),
(3, 2, 'Bookings List', 'emirates/index/', '', 3, 'Bookings', 1, '2017-04-04 20:41:48'),
(12, 0, 'Account Settings', '', 'icon-cog2', 12, 'Accounts', 1, '2017-04-04 20:49:13'),
(13, 12, 'Users', 'users/index/', '', 13, 'Users', 1, '2017-04-04 20:49:27'),
(14, 12, 'Roles', 'roles/index/', '', 14, 'Roles', 1, '2017-04-04 20:49:41'),
(15, 12, 'Modules', 'modules/index/', '', 15, 'Modules', 1, '2017-04-04 20:49:53'),
(16, 12, 'Permissions', 'permissions/index/', '', 16, 'Permissions', 1, '2017-04-04 20:50:33'),
(17, 0, 'Logoff', 'settings/logoff/', 'icon-exit', 17, 'Settings', 1, '2017-04-04 20:50:45'),
(18, 2, 'Packages List', '', '', 18, 'Packages', 1, '2017-11-26 08:29:05'),
(19, 0, 'Reports', '', 'icon-graph', 3, '', 1, '2018-01-18 13:46:13'),
(20, 19, 'Sale Report', '', '', 4, 'Sale_report', 1, '2018-01-18 13:46:27'),
(21, 19, 'Commission Report', '', '', 5, 'Commission_report', 1, '2018-01-18 13:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `packages_tbl`
--

CREATE TABLE `packages_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `adult_ticket_price` varchar(255) NOT NULL,
  `child_ticket_price` varchar(255) NOT NULL,
  `per_ticket_price` decimal(10,0) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 active, 0 inactive',
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages_tbl`
--

INSERT INTO `packages_tbl` (`id`, `name`, `adult_ticket_price`, `child_ticket_price`, `per_ticket_price`, `status`, `added_on`) VALUES
(1, 'Desert Safari Dubai', '149', '120', '50', 1, '2018-01-08 00:00:00'),
(2, 'Hatta Mountain Safari', '700', '700', '60', 1, '2018-01-08 00:00:00'),
(4, 'Morning Desert Safari', '700', '700', '70', 1, '2018-01-08 00:00:00'),
(5, 'Dhow Cruise Marina', '175', '149', '70', 1, '2018-01-11 08:52:31'),
(6, 'Dhow Cruise Creek', '90', '90', '60', 1, '2018-01-11 08:53:02'),
(7, 'Sunset Dhow Cruise', '250', '250', '80', 1, '2018-01-11 08:54:34'),
(8, 'Luxury Yacht', '399', '399', '0', 1, '2018-01-30 10:15:49'),
(9, 'Deep Sea Fishing', '399', '399', '0', 1, '2018-01-30 10:16:13'),
(10, 'Premium Desert Safari Dubai', '799', '50', '0', 1, '2018-11-04 07:45:49'),
(11, 'Dubai Tour', '150', '150', '0', 1, '2018-11-04 09:22:22'),
(12, 'Al Ain Tour', '349', '349', '0', 1, '2018-11-04 09:25:09'),
(13, 'East Coast Tour', '375', '375', '0', 1, '2018-11-04 09:27:19'),
(14, 'Abu Dhabi Tour', '199', '149', '0', 1, '2018-11-04 09:28:15'),
(15, 'Sharjah and Ajman Tour', '275', '275', '0', 1, '2018-11-04 09:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `permissions_tbl`
--

CREATE TABLE `permissions_tbl` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `is_add_permission` tinyint(1) NOT NULL DEFAULT 0,
  `is_update_permission` tinyint(1) NOT NULL DEFAULT 0,
  `is_view_permission` tinyint(1) NOT NULL DEFAULT 0,
  `is_delete_permission` tinyint(1) NOT NULL DEFAULT 0,
  `added_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions_tbl`
--

INSERT INTO `permissions_tbl` (`id`, `role_id`, `module_id`, `is_add_permission`, `is_update_permission`, `is_view_permission`, `is_delete_permission`, `added_by`, `created_on`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, '2017-04-05 15:36:07'),
(2, 1, 2, 1, 1, 1, 1, 1, '2017-04-05 15:36:18'),
(12, 1, 12, 1, 1, 1, 1, 1, '2017-04-05 15:38:21'),
(13, 1, 13, 1, 1, 1, 1, 1, '2017-04-05 15:38:33'),
(14, 1, 14, 1, 1, 1, 1, 1, '2017-04-05 15:38:53'),
(15, 1, 15, 1, 1, 1, 1, 1, '2017-04-05 15:39:11'),
(16, 1, 16, 1, 1, 1, 1, 1, '2017-04-05 15:39:21'),
(17, 1, 17, 1, 1, 1, 1, 1, '2017-04-05 15:39:50'),
(20, 1, 3, 1, 1, 1, 1, 1, '2017-11-22 17:48:04'),
(21, 1, 18, 1, 1, 1, 1, 1, '2017-11-26 08:29:23'),
(22, 1, 19, 1, 1, 1, 1, 1, '2018-01-18 13:49:02'),
(23, 1, 20, 1, 1, 1, 1, 1, '2018-01-18 13:49:23'),
(24, 1, 21, 1, 1, 1, 1, 1, '2018-01-18 13:49:57');

-- --------------------------------------------------------

--
-- Table structure for table `roles_tbl`
--

CREATE TABLE `roles_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `added_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles_tbl`
--

INSERT INTO `roles_tbl` (`id`, `name`, `added_by`, `created_on`) VALUES
(1, 'Admin', 0, '0000-00-00 00:00:00'),
(2, 'Agency', 0, '0000-00-00 00:00:00'),
(3, 'Agent', 0, '0000-00-00 00:00:00'),
(5, 'Marketing ', 0, '0000-00-00 00:00:00'),
(6, 'Director', 0, '0000-00-00 00:00:00'),
(7, 'Owners', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT 0 COMMENT 'assigned to manager',
  `role_id` int(11) NOT NULL DEFAULT 3 COMMENT '1 for admin, 2 for manager, 3 for agents',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_no` varchar(100) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `rera_no` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `random_password` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `last_login_on` datetime NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 for inactive, 1 for active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`id`, `name`, `parent_id`, `role_id`, `email`, `password`, `phone_no`, `mobile_no`, `company_name`, `rera_no`, `address`, `image`, `random_password`, `created_on`, `last_login_on`, `ip_address`, `status`) VALUES
(1, 'Admin', 0, 1, 'admin@admin.com', '$2y$10$fqW.M4ufVu7Vmwupihk9UO.Afgzh/qh8KH0SZY/vmJHMzVj0pKloq', '000000', '1111111', '', '067889', 'Address area', 'image 9.jpg', 'LlUWAh1qBi5oyjxbNc7d', '2016-09-18 14:25:26', '2022-08-24 13:04:27', '::1', 1),
(2, 'Manager', 0, 2, 'manager@manager.com', '$2y$10$fqW.M4ufVu7Vmwupihk9UO.Afgzh/qh8KH0SZY/vmJHMzVj0pKloq', '000000', '2222', 'Safz', '08765', 'tests', '', 'Nip7xwIEVzXWSFmg1auo', '0000-00-00 00:00:00', '2017-04-09 11:13:01', '127.0.0.1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings_tbl`
--
ALTER TABLE `bookings_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config_tbl`
--
ALTER TABLE `config_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules_tbl`
--
ALTER TABLE `modules_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages_tbl`
--
ALTER TABLE `packages_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions_tbl`
--
ALTER TABLE `permissions_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_tbl`
--
ALTER TABLE `roles_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings_tbl`
--
ALTER TABLE `bookings_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `config_tbl`
--
ALTER TABLE `config_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `modules_tbl`
--
ALTER TABLE `modules_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `packages_tbl`
--
ALTER TABLE `packages_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions_tbl`
--
ALTER TABLE `permissions_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roles_tbl`
--
ALTER TABLE `roles_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
