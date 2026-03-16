-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2026 at 08:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(4, 'Asmita', 'asmita@gmail.com', 'Demo', 'Demo'),
(5, 'Anjali Fachara', 'facharaanjali@gmail.com', 'web', 'sfs'),
(6, 'Anjali Fachara', 'facharaanjali@gmail.com', 'Demo', 'Demo'),
(7, 'asmita', 'asmitajethva51@gmail.com', 'web', 'Web'),
(8, 'Anjali Fachara', 'facharaanjali@gmail.com', 'web', 'dfsd');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `person_image` varchar(255) NOT NULL,
  `courses_image` varchar(255) NOT NULL,
  `person_name` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `btn_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `person_image`, `courses_image`, `person_name`, `title`, `description`, `price`, `btn_name`) VALUES
(1, 'Screenshot 2026-03-05 114013.png', 'Screenshot 2026-03-05 113836.png', 'Rahul Patel', 'Full Stack Web Development', 'Learn HTML, CSS, JavaScript, PHP and MySQL with live projects and practical training.', 30000, 'Enroll Now'),
(2, 'Screenshot 2026-03-05 114133.png', 'Screenshot 2026-03-05 114117.png', 'Jiya Shah', 'Graphic Designer', 'Learn professional graphic design using Photoshop, Illustrator and modern design techniques. Create logos, banners, social media posts and branding designs.', 30000, 'Start Course'),
(3, 'Screenshot 2026-03-05 114242.png', 'Screenshot 2026-03-05 114226.png', 'Meet Trivedi', 'Digital Marketing', 'Learn SEO, Social Media Marketing, Google Ads and online marketing strategies to grow any business online and reach more customers.', 30000, 'Join Course');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `events_day` varchar(50) NOT NULL,
  `events_date` date NOT NULL,
  `events_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `image`, `title`, `description`, `events_day`, `events_date`, `events_time`) VALUES
(1, '1773232989_Screenshot 2026-03-05 212328.png', 'Web Development Workshop', 'Join our interactive workshop to learn the basics of HTML, CSS and JavaScript and start building your first website.', 'Saturday', '2026-06-22', '10:00:00'),
(2, '1773233043_Screenshot 2026-03-06 111505.png', 'Graphic Design Workshop', 'Learn the basics of graphic design including color theory, typography and logo design using Photoshop and Illustrator.', 'Saturday', '2026-07-22', '02:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE `mentor` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mentor`
--

INSERT INTO `mentor` (`id`, `image`, `name`, `position`, `description`) VALUES
(1, 'Screenshot 2026-03-05 114447.png', 'Karan Patel', 'Full Stack Web Developer', 'Experienced developer specializing in PHP, JavaScript and modern web application development.'),
(2, 'Screenshot 2026-03-05 115850.png', 'Riya Sharma', 'Senior Graphic Designer', 'Expert in branding, logo design and creative visual concepts with 7+ years of industry experience.'),
(3, 'Screenshot 2026-03-05 115208.png', 'Amit Verma', 'Digital Marketing Specialist', 'Skilled in SEO, Google Ads and social media marketing with proven strategies for business growth.');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `image`, `name`, `position`, `description`) VALUES
(1, 'Screenshot 2026-03-05 120125.png', 'Rahul Shah', 'Web Development Student', 'The web development course was very practical and easy to understand. I built my first website during this training.'),
(2, 'Screenshot 2026-03-05 211352.png', 'Priya Mehta', 'Graphic Design Student', 'This course helped me improve my design skills and build a professional portfolio. The mentor support was excellent.'),
(3, '1773232258_Screenshot 2026-03-05 211502.png', 'Arjun Desai', 'Digital Marketing Student', 'I learned SEO and social media marketing strategies that helped me grow my online business. Highly recommended course.');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `image`, `name`, `position`, `description`) VALUES
(1, 'Screenshot 2026-03-05 211628.png', 'Amit Patel', 'Senior Web Development Trainer', 'Experienced trainer specializing in HTML, CSS, JavaScript and PHP with practical project-based teaching methods.'),
(2, 'Screenshot 2026-03-05 211854.png', 'Neha Sharma', 'Graphic Design Trainer', 'Professional designer with expertise in Photoshop, Illustrator and modern creative design techniques.'),
(3, 'Screenshot 2026-03-05 212155.png', 'Rahul Mehta', 'Digital Marketing Trainer', 'Expert in SEO, Google Ads and social media marketing with real-world marketing campaign experience.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(2, 'anjali', 'facharaanjali@gmail.com', '$2y$10$Ucn83ggYGdJbs2ZyxRGRn.BPO5frtcOUXirBLTilnEddpC5rhqw6K');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentor`
--
ALTER TABLE `mentor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mentor`
--
ALTER TABLE `mentor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
