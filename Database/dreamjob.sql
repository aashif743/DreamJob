-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2021 at 08:01 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dreamjob`
--

-- --------------------------------------------------------

--
-- Table structure for table `cvdocs`
--

CREATE TABLE `cvdocs` (
  `fileID` int(11) NOT NULL,
  `FileName` varchar(255) NOT NULL,
  `Size` varchar(255) NOT NULL,
  `FilePath` varchar(225) NOT NULL,
  `FName` varchar(150) NOT NULL,
  `LName` varchar(150) NOT NULL,
  `Nic` varchar(20) NOT NULL,
  `Drive` varchar(20) NOT NULL,
  `Mno` varchar(15) NOT NULL,
  `Dob` varchar(15) NOT NULL,
  `Address` varchar(225) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Province` varchar(100) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Year` varchar(150) NOT NULL,
  `IndexNo` varchar(15) NOT NULL,
  `Year1` varchar(150) NOT NULL,
  `IndexNo1` varchar(15) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cvdocs`
--

INSERT INTO `cvdocs` (`fileID`, `FileName`, `Size`, `FilePath`, `FName`, `LName`, `Nic`, `Drive`, `Mno`, `Dob`, `Address`, `City`, `Province`, `Email`, `Year`, `IndexNo`, `Year1`, `IndexNo1`, `Status`, `date`) VALUES
(7, 'Cv.pdf', '118026', 'uploads/Cv.pdf', 'Ridmal', 'Akmeemana', '1122154548545', '1511545454', '0773697070', '1998-09-22', '570/4, Pathalwaththa Rd, Arawwala\r\nPannipitiya', 'Maharagama', 'Western', 'rajeewaakmeemana@gmail.com', '2014', '1215154544', 'Not Done', 'Not Done', 'School Leaver', '2021-10-07 12:22:47'),
(8, 'CV Final.pdf', '237026', 'uploads/CV Final.pdf', 'Ridmal', 'Akmeemana', '1122154548545', '1511545454', '0773697070', '1998-09-22', '570/4, Pathalwaththa Rd, Arawwala\r\nPannipitiya', 'Maharagama', 'Western', 'rajeewaakmeemana@gmail.com', '2014', '1215154544', '2017', '125655657', 'Staff Assistant', '2021-10-07 12:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES
(13, 'rajeewaakmeemana@gmail.com', 'Ridmal Akmeemana', '$2y$10$OEf7jAGGPoVNL0dcpmjZae1EfZ4x/c7PyU4UBLKLaMoaDGnHaaC1S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cvdocs`
--
ALTER TABLE `cvdocs`
  ADD PRIMARY KEY (`fileID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cvdocs`
--
ALTER TABLE `cvdocs`
  MODIFY `fileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
