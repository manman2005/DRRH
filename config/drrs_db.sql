-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2026 at 12:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drrs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bookings`
--

CREATE TABLE `tb_bookings` (
  `booking_id` int(11) NOT NULL COMMENT 'รหัสการจอง',
  `user_id` int(11) NOT NULL COMMENT 'รหัสผู้จอง',
  `room_id` int(11) NOT NULL COMMENT 'รหัสห้อง',
  `booking_date` date NOT NULL COMMENT 'วันที่จอง',
  `start_time` time NOT NULL COMMENT 'เวลาเริ่ม',
  `end_time` time NOT NULL COMMENT 'เวลาสิ้นสุด',
  `purpose` varchar(255) DEFAULT NULL COMMENT 'วัตถุประสงค์',
  `status` enum('รออนุมัติ','อนุมัติ','ไม่อนุมัติ','ยกเลิก') NOT NULL DEFAULT 'รออนุมัติ' COMMENT 'สถานะการจอง',
  `approve_by` int(11) DEFAULT NULL COMMENT 'ผู้อนุมัติ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='ตารางเก็บข้อมูลการจองห้อง';

-- --------------------------------------------------------

--
-- Table structure for table `tb_borrow_return`
--

CREATE TABLE `tb_borrow_return` (
  `borrow_id` int(11) NOT NULL COMMENT 'รหัสการยืม',
  `user_id` int(11) NOT NULL COMMENT 'ผู้ยืม',
  `equipment_id` int(11) NOT NULL COMMENT 'อุปกรณ์',
  `borrow_date` date NOT NULL COMMENT 'วันที่ยืม',
  `return_date` date DEFAULT NULL COMMENT 'วันที่คืน',
  `quantity` int(11) NOT NULL DEFAULT 1 COMMENT 'จำนวนที่ยืม',
  `equipment_status` enum('ปกติ','ชำรุด') DEFAULT 'ปกติ' COMMENT 'สภาพหลังคืน',
  `status` enum('รอยืม','กำลังยืม','คืนแล้ว') NOT NULL DEFAULT 'รอยืม' COMMENT 'สถานะ',
  `remark` varchar(255) DEFAULT NULL COMMENT 'หมายเหตุ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='ตารางเก็บข้อมูลการยืม-คืนอุปกรณ์';

-- --------------------------------------------------------

--
-- Table structure for table `tb_equipments`
--

CREATE TABLE `tb_equipments` (
  `equipment_id` int(11) NOT NULL COMMENT 'รหัสอุปกรณ์',
  `equipment_name` varchar(50) NOT NULL COMMENT 'ชื่ออุปกรณ์',
  `category` varchar(50) DEFAULT NULL COMMENT 'ประเภทอุปกรณ์',
  `quantity` int(10) NOT NULL DEFAULT 0 COMMENT 'จำนวน',
  `status` enum('พร้อมใช้งาน','ถูกยืม','ชำรุด') NOT NULL DEFAULT 'พร้อมใช้งาน' COMMENT 'สถานะอุปกรณ์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='ตารางเก็บข้อมูลอุปกรณ์';

-- --------------------------------------------------------

--
-- Table structure for table `tb_rooms`
--

CREATE TABLE `tb_rooms` (
  `room_id` int(11) NOT NULL COMMENT 'รหัสห้อง',
  `room_name` varchar(100) NOT NULL COMMENT 'ชื่อห้อง',
  `room_type` varchar(50) DEFAULT NULL COMMENT 'ประเภทห้อง',
  `capacity` int(11) NOT NULL DEFAULT 0 COMMENT 'จำนวนที่รองรับ',
  `building` varchar(100) DEFAULT NULL COMMENT 'อาคาร',
  `floor` int(10) DEFAULT NULL COMMENT 'ชั้น',
  `status` enum('ว่าง','ไม่ว่าง','ปิดใช้งาน') NOT NULL DEFAULT 'ว่าง' COMMENT 'สถานะห้อง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='ตารางเก็บข้อมูลห้อง';

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `user_id` int(11) NOT NULL COMMENT 'รหัสผู้ใช้',
  `username` varchar(50) NOT NULL COMMENT 'ชื่อผู้ใช้',
  `password` varchar(255) NOT NULL COMMENT 'รหัสผ่าน',
  `full_name` varchar(255) NOT NULL COMMENT 'ชื่อนาม-สกุล',
  `email` varchar(100) NOT NULL COMMENT 'อีเมล',
  `phone` varchar(10) DEFAULT NULL COMMENT 'เบอร์โทรศัพท์',
  `role` enum('นักศึกษา','อาจารย์','เจ้าหน้าที่','ผู้ดูแลระบบ') NOT NULL DEFAULT 'นักศึกษา' COMMENT 'สิทธิผู้ใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='ตารางเก็บข้อมูลผู้ใช้งาน';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bookings`
--
ALTER TABLE `tb_bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `fk_bookings_user` (`user_id`),
  ADD KEY `fk_bookings_room` (`room_id`),
  ADD KEY `fk_bookings_approve_by` (`approve_by`);

--
-- Indexes for table `tb_borrow_return`
--
ALTER TABLE `tb_borrow_return`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `fk_borrow_user` (`user_id`),
  ADD KEY `fk_borrow_equipment` (`equipment_id`);

--
-- Indexes for table `tb_equipments`
--
ALTER TABLE `tb_equipments`
  ADD PRIMARY KEY (`equipment_id`);

--
-- Indexes for table `tb_rooms`
--
ALTER TABLE `tb_rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `uk_username` (`username`),
  ADD UNIQUE KEY `uk_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bookings`
--
ALTER TABLE `tb_bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการจอง';

--
-- AUTO_INCREMENT for table `tb_borrow_return`
--
ALTER TABLE `tb_borrow_return`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการยืม';

--
-- AUTO_INCREMENT for table `tb_equipments`
--
ALTER TABLE `tb_equipments`
  MODIFY `equipment_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสอุปกรณ์';

--
-- AUTO_INCREMENT for table `tb_rooms`
--
ALTER TABLE `tb_rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสห้อง';

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ใช้';

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_bookings`
--
ALTER TABLE `tb_bookings`
  ADD CONSTRAINT `fk_bookings_approve_by` FOREIGN KEY (`approve_by`) REFERENCES `tb_users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bookings_room` FOREIGN KEY (`room_id`) REFERENCES `tb_rooms` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bookings_user` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_borrow_return`
--
ALTER TABLE `tb_borrow_return`
  ADD CONSTRAINT `fk_borrow_equipment` FOREIGN KEY (`equipment_id`) REFERENCES `tb_equipments` (`equipment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_borrow_user` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
