-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 29, 2022 at 07:04 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `buku_tamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `crud_users`
--

CREATE TABLE `crud_users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crud_users`
--

INSERT INTO `crud_users` (`id`, `name`, `email`, `address`, `phone`) VALUES
(4, 'Wayan Baglug', 'mantap@gmail.com', 'Bedugul', '082111111111'),
(5, 'Made Baglug', 'made@gmail.com', 'Tabanan', '082111111112'),
(6, 'Komang Baglug', 'komang@gmail.com', 'Gianyar', '082111111113'),
(7, 'Ketut Baglug', 'ketut@gmail.com', 'Karangasem', '082111111114');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud_users`
--
ALTER TABLE `crud_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crud_users`
--
ALTER TABLE `crud_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
