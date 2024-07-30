-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 07:20 AM
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
-- Database: `zoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal_adoption`
--

CREATE TABLE `animal_adoption` (
  `adoption_id` int(11) NOT NULL,
  `adoption_no` varchar(50) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `adopter_name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `adoption_from_date` date NOT NULL,
  `adoption_to_date` date NOT NULL,
  `amount` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animal_adoption`
--

INSERT INTO `animal_adoption` (`adoption_id`, `adoption_no`, `animal_id`, `adopter_name`, `image`, `date_of_birth`, `nationality`, `address`, `email`, `phone`, `adoption_from_date`, `adoption_to_date`, `amount`, `description`, `status`) VALUES
(1, 'ADP-3602', 1, 'John', '1712557927.jpg', '2023-06-28', 'Indian', 'Manglore', 'john@gmail.com', '7845121245', '2024-04-10', '2025-04-10', '45000', 'Want to adopt elephant.\r\n', 'Paid'),
(2, 'ADP-6798', 4, 'John', '1714020887.jpg', '2024-04-03', 'Indian', 'kukkaje', 'john@gmail.com', '1234564712', '2024-04-25', '2024-07-05', '25000', 'test', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `animal_master`
--

CREATE TABLE `animal_master` (
  `animal_id` int(11) NOT NULL,
  `animal_name` varchar(100) NOT NULL,
  `scientific_name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `no_of_animal` varchar(50) NOT NULL,
  `adaption_amount` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animal_master`
--

INSERT INTO `animal_master` (`animal_id`, `animal_name`, `scientific_name`, `category`, `image`, `no_of_animal`, `adaption_amount`, `description`, `status`) VALUES
(1, 'Elephant', 'Loxodonta', 'Mammal', '1712830115.jpg', '5', '45000', 'Elephants are the largest living land animals. Three living species are currently recognised: the African bush elephant (Loxodonta africana), the African forest elephant (L. cyclotis), and the Asian elephant (Elephas maximus). They are the only surviving members of the family Elephantidae and the order Proboscidea; extinct relatives include mammoths and mastodons. Distinctive features of elephants include a long proboscis called a trunk, tusks, large ear flaps, pillar-like legs, and tough but se', 'Active'),
(2, 'Giraffe', 'Giraffa camelopardalis', 'Mammal', '1712830124.jpg', '3', '55000', 'The giraffe is a large African hoofed mammal belonging to the genus Giraffa. It is the tallest living terrestrial animal and the largest ruminant on Earth. Traditionally, giraffes have been thought of as one species, Giraffa camelopardalis, with nine subspecies. Most recently, researchers proposed dividing them into up to eight extant species due to new research into their mitochondrial and nuclear DNA, as well as morphological measurements. Seven other extinct species of Giraffa are known from ', 'Active'),
(4, 'Peacock', 'Pavo cristatus', 'Bird', '1712830252.jpg', '8', '25000', 'Pavo cristatus is the scientific name for a peacock. The Indian blue peafowl is also known as the common peafowl, blue peafowl, and blue Indian peafowl. It is a large and brightly coloured bird that is native to the Indian subcontinent but has been introduced to many other parts of the world.', 'Active'),
(5, 'TIGER', 'TIGER', 'Mammal', '1714021194.jpg', '5', '50000', 'TIGER', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` varchar(25) NOT NULL,
  `address` varchar(500) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`customer_id`, `customer_name`, `phone`, `email`, `age`, `address`, `gender`, `dob`, `create_date`) VALUES
(1, 'Ajay', '1234564712', 'customer@gmail.com', '25', 'Manglore', 'male', '2019-06-06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `enquiry_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`enquiry_id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'roy', 'roy@gmail.com', 'Regarding ticket', 'Regarding ticket'),
(2, 'test', 'test@gmail.com', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `ticket_no` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `ticket_no`, `name`, `message`) VALUES
(1, 'TIC-0085', 'allen', 'good experience'),
(2, 'TIC-0085', 'john', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_no` varchar(100) NOT NULL,
  `payment_for` varchar(100) NOT NULL,
  `card_holder` varchar(100) NOT NULL,
  `card_no` varchar(500) NOT NULL,
  `card_exp_month` varchar(50) NOT NULL,
  `card_exp_year` int(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_no`, `payment_for`, `card_holder`, `card_no`, `card_exp_month`, `card_exp_year`, `amount`, `date`) VALUES
(1, 'PAY-4161', 'ADP-3602', 'john', '123456', '8', 2032, '45000', '2024-04-08'),
(2, 'PAY-6654', 'TIC-0085', 'john', '45124512456897', '11', 2030, '200.00', '2024-04-10'),
(3, 'PAY-6204', 'TIC-9816', 'abel', '7877878787455787', '11', 2033, '240.00', '2024-04-10'),
(4, 'PAY-4719', 'ADP-6798', 'john', '1212121212121212', '7', 2032, '25000', '2024-04-25'),
(5, 'PAY-4800', 'TIC-9976', 'john', '4545454545454545', '9', 2033, '200.00', '2024-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usertype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`user_id`, `username`, `email`, `phone`, `password`, `usertype`) VALUES
(1, 'Aman', 'admin@gmail.com', '1234567894', '12', 'Admin'),
(2, 'Ajay', 'customer@gmail.com', '1234564712', '12', 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_booking`
--

CREATE TABLE `ticket_booking` (
  `ticket_id` int(11) NOT NULL,
  `ticket_no` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `no_of_ticket` varchar(25) NOT NULL,
  `price` varchar(100) NOT NULL,
  `visit_date` date DEFAULT NULL,
  `create_date` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_booking`
--

INSERT INTO `ticket_booking` (`ticket_id`, `ticket_no`, `user_id`, `no_of_ticket`, `price`, `visit_date`, `create_date`, `status`) VALUES
(1, 'TIC-0085', 2, '3', '200.00', '2024-04-09', '2024-04-10', 'Active'),
(2, 'TIC-9816', 2, '4', '240.00', '2024-04-12', '2024-04-10', 'Canceled'),
(3, 'TIC-9976', 2, '3', '200.00', '2024-04-26', '2024-04-25', 'Canceled');

-- --------------------------------------------------------

--
-- Table structure for table `zoo_master`
--

CREATE TABLE `zoo_master` (
  `zoo_master_id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `phone_no` varchar(25) NOT NULL,
  `entry_time` time NOT NULL,
  `exit_time` time NOT NULL,
  `weekly_holiday` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zoo_master`
--

INSERT INTO `zoo_master` (`zoo_master_id`, `location`, `phone_no`, `entry_time`, `exit_time`, `weekly_holiday`, `description`, `status`) VALUES
(1, 'Biolagical park', '7894561231', '09:00:00', '17:00:00', 'Monday', 'Pilikula Nisargadhama is a multi-purpose tourist attraction, at Vamanjoor, eastern part of Mangalore city in Karnataka, managed by the District Administration of Dakshina Kannada. It is a major tourist attraction of Mangalore. It attracts large number of tourists due to the availability of multiple facilities.', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal_adoption`
--
ALTER TABLE `animal_adoption`
  ADD PRIMARY KEY (`adoption_id`);

--
-- Indexes for table `animal_master`
--
ALTER TABLE `animal_master`
  ADD PRIMARY KEY (`animal_id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`enquiry_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `ticket_booking`
--
ALTER TABLE `ticket_booking`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `zoo_master`
--
ALTER TABLE `zoo_master`
  ADD PRIMARY KEY (`zoo_master_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal_adoption`
--
ALTER TABLE `animal_adoption`
  MODIFY `adoption_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `animal_master`
--
ALTER TABLE `animal_master`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `enquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket_booking`
--
ALTER TABLE `ticket_booking`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `zoo_master`
--
ALTER TABLE `zoo_master`
  MODIFY `zoo_master_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
