SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `images` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO `images` (`id`, `title`, `image`) VALUES
(1, 'Cladire', 'images/p1.jpg'),
(2, 'Louvre', 'images/p2.jpg'),
(3, 'Munti', 'images/p3.jpg'),
(4, 'Far', 'images/p4.jpg'),
(5, 'Elicopter', 'images/p5.jpg'),
(6, 'Balena', 'images/p6.jpg'),
(7, 'Mare', 'images/p7.jpg'),
(8, 'Fata ', 'images/p8.jpg');
CREATE TABLE `images_updated` (
  `title` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `edtime` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `images`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;
