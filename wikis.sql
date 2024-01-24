-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2024 at 09:04 PM
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
-- Database: `wiki`
--

-- --------------------------------------------------------

--
-- Table structure for table `wikis`
--

CREATE TABLE `wikis` (
  `wiki_id` int(11) NOT NULL,
  `wiki_title` varchar(255) DEFAULT NULL,
  `wiki_description` text DEFAULT NULL,
  `wiki_date` date DEFAULT curtime(),
  `wiki_author` int(11) DEFAULT NULL,
  `wiki_category` int(11) DEFAULT NULL,
  `archive` int(11) DEFAULT 0,
  `wiki_img` varchar(255) DEFAULT 'project.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wikis`
--

INSERT INTO `wikis` (`wiki_id`, `wiki_title`, `wiki_description`, `wiki_date`, `wiki_author`, `wiki_category`, `archive`, `wiki_img`) VALUES
(74, 'article N01', 'hello guys this is a scientific article ', '2024-01-12', 26, 3, 0, 'editedpic.jpg'),
(75, 'How to solve world hunger ?', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac tincidunt lectus. Mauris et feugiat urna, et euismod nulla. Sed at tempus quam, sit amet feugiat felis. Sed facilisis nibh risus, quis lacinia lectus cursus sit amet. Fusce in feugiat purus. Vestibulum bibendum, felis eget iaculis porta, neque ligula condimentum justo, vel blandit purus augue quis ipsum. Quisque sed nisl vulputate enim facilisis sagittis. Morbi nec semper ipsum. Curabitur lobortis malesuada ex, non sollicitudin magna porttitor at. Cras quam risus, semper id fermentum et, volutpat et arcu. Vestibulum vitae orci felis. Sed a auctor nunc. Integer purus dui, molestie sit amet tristique nec, molestie accumsan orci.  Aliquam ornare convallis mauris vel eleifend. Sed sit amet orci ut lacus mollis venenatis. Morbi sed auctor massa, nec placerat lorem. Sed id laoreet lorem, id condimentum arcu. Nam vel mi lacinia, imperdiet lectus eu, vestibulum est. Vestibulum molestie, magna in facilisis ultricies, velit tortor gravida ante, et auctor metus ante sit amet massa. Nam sapien metus, ultrices ac mi at, convallis mollis urna. Pellentesque eu ipsum velit. Aenean id finibus nisi. Ut ac porttitor tellus. Cras aliquam eget est ac iaculis. Vivamus id odio dui.', '2024-01-14', 26, 3, 0, 'project.png'),
(76, 'why is man city the best footbal club in the world ?', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac tincidunt lectus. Mauris et feugiat urna, et euismod nulla. Sed at tempus quam, sit amet feugiat felis. Sed facilisis nibh risus, quis lacinia lectus cursus sit amet. Fusce in feugiat purus. Vestibulum bibendum, felis eget iaculis porta, neque ligula condimentum justo, vel blandit purus augue quis ipsum. Quisque sed nisl vulputate enim facilisis sagittis. Morbi nec semper ipsum. Curabitur lobortis malesuada ex, non sollicitudin magna porttitor at. Cras quam risus, semper id fermentum et, volutpat et arcu. Vestibulum vitae orci felis. Sed a auctor nunc. Integer purus dui, molestie sit amet tristique nec, molestie accumsan orci.  Aliquam ornare convallis mauris vel eleifend. Sed sit amet orci ut lacus mollis venenatis. Morbi sed auctor massa, nec placerat lorem. Sed id laoreet lorem, id condimentum arcu. Nam vel mi lacinia, imperdiet lectus eu, vestibulum est. Vestibulum molestie, magna in facilisis ultricies, velit tortor gravida ante, et auctor metus ante sit amet massa. Nam sapien metus, ultrices ac mi at, convallis mollis urna. Pellentesque eu ipsum velit. Aenean id finibus nisi. Ut ac porttitor tellus. Cras aliquam eget est ac iaculis. Vivamus id odio dui.', '2024-01-14', 26, 4, 0, 'project.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wikis`
--
ALTER TABLE `wikis`
  ADD PRIMARY KEY (`wiki_id`),
  ADD KEY `wiki_author` (`wiki_author`),
  ADD KEY `fk_wiki_category` (`wiki_category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wikis`
--
ALTER TABLE `wikis`
  MODIFY `wiki_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wikis`
--
ALTER TABLE `wikis`
  ADD CONSTRAINT `fk_wiki_category` FOREIGN KEY (`wiki_category`) REFERENCES `category` (`category_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `wikis_ibfk_1` FOREIGN KEY (`wiki_author`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
