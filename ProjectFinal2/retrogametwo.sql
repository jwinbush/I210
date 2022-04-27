-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Apr 27, 2022 at 12:17 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `retrogametwo`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(1, 'Video Game'),
(2, 'Console'),
(3, 'Board Game'),
(4, 'Collectible');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title_name` varchar(120) NOT NULL,
  `description` text,
  `release_date` date NOT NULL,
  `first_price` decimal(5,2) NOT NULL,
  `final_price` decimal(5,2) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `deal_id` tinyint(4) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `publisher_id` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title_name`, `description`, `release_date`, `first_price`, `final_price`, `image`, `category_id`, `deal_id`, `product_category`, `publisher`, `publisher_id`) VALUES
(1, 'Gameboy', 'The Game Boy is an 8-bit handheld game console developed and manufactured by Nintendo', '1989-05-21', '55.99', '45.99', 'https://upload.wikimedia.org/wikipedia/commons/c/c6/Nintendo_Gameboy.jpg', 2, 1, 'Console', 'Nintendo', 1),
(2, 'Nintendo 64', 'he Nintendo 64 (abbreviated as N64, stylized as NINTENDO64) is a home video game console developed and marketed by Nintendo.', '1997-03-01', '75.99', '65.99', 'https://www.pngkey.com/png/full/317-3172188_n64-nintendo-64.png', 2, 1, 'Console', 'Nintendo', 1),
(3, 'NES(Nintendo Entertainment System)', 'The Nintendo Entertainment System (NES) is an 8-bit third-generation home video game console produced by Nintendo.', '1982-07-15', '69.99', '49.99', 'https://www.pngitem.com/pimgs/m/17-174860_nes-first-nintendo-hd-png-download.png', 2, 1, 'Console', 'Nintendo', 1),
(4, 'Vintage Star Wars Action Figure-Wicket', 'Wicket was the brave young Ewok who willingly joined the Rebellion and aided in the battle against the Empire on the forest moon of Endor.', '1984-04-21', '25.99', '25.99', 'https://i.ebayimg.com/images/g/dWMAAOSwq0dfv6YP/s-l300.jpg', 4, 0, 'Collectible', 'Star Wars', 8),
(5, 'Pokemon Yellow Version', 'Pokémon Yellow Version: Special Pikachu Edition, more commonly known as Pokémon Yellow Version, is a 1998 role-playing video game developed by Game Freak and published by Nintendo for the Game Boy.', '1998-02-23', '45.99', '39.99', 'https://upload.wikimedia.org/wikipedia/en/4/4a/Pokemon_Yellow.png', 1, 1, 'Video Game', 'Nintendo', 1),
(6, 'Atari 2600', 'The Atari 2600 is a home video game console developed and produced by Atari, Inc. ', '1972-09-11', '69.99', '45.99', 'https://upload.wikimedia.org/wikipedia/commons/0/02/Atari-2600-Wood-4Sw-Set.png', 2, 1, 'Console', 'Atari Inc.', 10),
(7, 'Super Mario 64', 'Super Mario 64 is a platform game for the Nintendo 64 and the first Super Mario game to feature 3D gameplay.', '1996-06-23', '25.99', '25.99', 'https://upload.wikimedia.org/wikipedia/en/6/6a/Super_Mario_64_box_cover.jpg', 1, 0, 'Video Game', 'Nintendo', 1),
(8, 'Mario Kart 64', 'Mario Kart 64 is a kart racing video game developed and published by Nintendo for the Nintendo 64.', '1996-12-14', '29.99', '29.99', 'https://upload.wikimedia.org/wikipedia/en/a/a1/Mario_Kart_64.jpg', 1, 0, 'Video Game', 'Nintendo', 1),
(9, 'Golden Eye 007', 'GoldenEye 007 is a first-person shooter developed by Rare and published by Nintendo for the Nintendo 64.', '1997-08-25', '29.99', '29.99', 'https://m.media-amazon.com/images/M/MV5BNGZhZTk4ZjQtYjc2ZC00ZTdmLWJkMjEtNmRiY2ZjMjRhZjJlXkEyXkFqcGdeQXVyNzg3NjQyOQ@@._V1_FMjpg_UX1000_.jpg', 1, 0, 'Video Game', 'Nintendo', 1),
(10, 'The Legend of Zelda: Ocarina of Time', 'The Legend of Zelda: Ocarina of Time is an action-adventure game developed and published by Nintendo for the Nintendo 64.', '1998-11-21', '31.99', '31.99', 'https://i.etsystatic.com/6017061/r/il/d245ca/1057882963/il_fullxfull.1057882963_7k1p.jpg', 1, 0, 'Video Game', 'Nintendo', 1),
(11, 'Dreamcast', 'The Dreamcast is a home video game console released by Sega', '1998-11-27', '65.99', '65.99', 'https://upload.wikimedia.org/wikipedia/commons/a/a0/Sega-dreamcast-set.png', 2, 0, 'Console', 'Sega', 3),
(12, 'Halo: Combat Evolved', 'Halo: Combat Evolved is a 2001 first-person shooter science-fiction video game developed by Bungie Studios and the first game in the Halo series.', '2001-11-15', '29.99', '29.99', 'https://halo.wiki.gallery/images/6/6a/Halo_Combat_Evolved_cover.png', 1, 0, 'Video Game', 'Microsoft', 11),
(14, 'Dungeons & Dragons (1974)', 'The original Dungeons & Dragons (commonly abbreviated D&D) boxed set by Gary Gygax and Dave Arneson was published by TSR, Inc.', '1974-06-14', '41.99', '41.99', 'https://upload.wikimedia.org/wikipedia/en/8/8e/D%26d_Box1st.jpg', 4, 0, 'Collectible', 'TSR Inc.', 9),
(15, 'Legends of Batman', 'Vintage 1995 legends of batman twin pack Egyptian batman and Egyptian Catwoman box has some wear as does the plastic but package is unopened and in decent condition', '1995-02-13', '25.99', '25.99', 'https://i.ebayimg.com/images/g/leIAAOSwuLZhRO7L/s-l400.jpg', 4, 0, 'Collectible', 'Kenner', 5),
(16, 'Retro Spider-Man 8in Figure', 'Very first classic action figure of Spider-Man released shortly after the debut of the hit cartoon series.', '1970-03-10', '25.99', '25.99', 'http://marveltoynews.com/wp-content/uploads/2014/04/Vintage-MEGO-Spider-Man-Figure-Carded-e1398126085335.jpg', 4, 0, 'Collectible', 'Marvel', 6),
(17, 'Darth Vader Action Figure', 'Authentic vintage Darth Vader 8in action figure first released in 1978 following the movies.', '1978-05-21', '24.99', '24.99', 'https://m.media-amazon.com/images/I/71mhvXS9OEL._AC_SX679_.jpg', 4, 0, 'Collectible', 'Kenner', 5),
(18, 'Sonic The Hedgehog', 'Sonic the Hedgehog is a platform game developed by Sonic Team and published by Sega for the Sega Genesis home video game console. The first game in the Sonic the Hedgehog franchise.', '1991-06-23', '29.99', '29.99', 'https://upload.wikimedia.org/wikipedia/en/b/ba/Sonic_the_Hedgehog_1_Genesis_box_art.jpg', 1, 0, 'Video Game', 'Sega', 3),
(19, 'Ms. Pac-Man', 'Ms. Pac-Man is a maze arcade game developed by General Computer Corporation and published by Sega. It is the first sequel to Pac-Man (1980), and the first entry in the series to not be made by Namco.', '1982-01-13', '29.99', '16.99', 'https://segaretro.org/images/2/2f/MS.Pacman_title.png', 1, 1, 'Video Game', 'Sega', 3),
(20, 'PlayStation ', 'The PlayStation (abbreviated as PS, commonly known as the PS1 or its codename PSX) is a home video game console developed and marketed by Sony Computer Entertainment', '1994-12-03', '65.99', '55.99', 'https://icon-library.com/images/playstation-1-icon/playstation-1-icon-13.jpg', 2, 1, 'Console', 'Sony', 2),
(21, 'Yahtzee', 'Yahtzee is a dice game made by Milton Bradley (a company that has since been acquired and assimilated by Hasbro), which was first marketed as Yatzie by the National Association Service of Toledo, Ohio, in the early 1940s.', '1940-12-31', '21.99', '14.99', 'https://www.grtoys.com/components/com_virtuemart/shop_image/product/full/717uhFf53L_AC_SL1500_5ed9383825fb7_r1.jpg', 3, 1, 'Board Game', 'Hasbro', 4),
(22, 'Pokémon Gold Version', 'Pokémon Gold Version are role-playing video games developed by Game Freak and published by Nintendo for the Game Boy Color.', '1999-11-21', '37.99', '37.99', 'https://upload.wikimedia.org/wikipedia/en/4/4c/Pok%C3%A9mon_box_art_-_Gold_Version.png', 1, 0, 'Video Game', 'Nintendo', 1),
(23, 'Game Gear', 'The Game Gear is an 8-bit fourth generation handheld game console ', '1990-10-06', '44.99', '34.99', 'https://www.pngitem.com/pimgs/m/307-3078022_sega-game-gear-wb-hd-png-download.png', 2, 1, 'Console', 'Sega', 3),
(24, 'Donkey Kong 64', 'Donkey Kong 64 is a adventure platform game developed by Rare and published by Nintendo for the Nintendo 64. It is the first Donkey Kong game to feature 3D gameplay.', '1999-11-22', '29.99', '29.99', 'https://upload.wikimedia.org/wikipedia/en/a/ae/DonkeyKong64CoverArt.jpg', 1, 0, 'Video Game', 'Nintendo', 1),
(25, 'Mario Party', 'Mario Party is a party video game developed by Hudson Soft and published by Nintendo for the Nintendo 64 game console.', '1998-12-18', '29.99', '19.99', 'https://upload.wikimedia.org/wikipedia/en/c/cd/Marioparty1.jpg', 1, 1, 'Video Game', 'Nintendo', 1),
(26, 'Xbox Game System', 'The Xbox is a video game system developed and published by Microsoft in 2001.', '2001-11-15', '264.99', '219.99', 'http://s3.amazonaws.com/digitaltrends-uploads-prod/2015/04/original-xbox.png', 2, 1, 'Console', 'Microsoft', 11),
(27, 'Superman Action Figure', 'Authentic vintage Superman 12in action figure first released in 1978 following the movies.', '1978-12-15', '29.99', '29.99', 'https://m.media-amazon.com/images/I/61ZO7Wk6PIL._AC_SX425_.jpg', 4, 0, 'Collectible', 'Mego', 0),
(28, 'Crash Bandicoot', 'Crash Bandicoot is a 1996 platform video game developed by Naughty Dog and published by Sony Computer Entertainment for the PlayStation.', '1996-09-09', '29.99', '29.99', 'https://m.media-amazon.com/images/M/MV5BYmJlY2RlYjEtNWU3Yy00YTRlLTllMzUtZmYwY2NkMzgxZmFmXkEyXkFqcGdeQXVyNjM2NTM3ODA@._V1_.jpg', 1, 0, 'Video Game', 'Nintendo', 2),
(29, 'Crash Bandicoot 2: Cortex Strikes Back', 'Crash Bandicoot 2: Cortex Strikes Back is a 1997 platform video game developed by Naughty Dog and the second game in the Crash Bandicoot series.', '1997-10-31', '29.99', '24.99', 'https://upload.wikimedia.org/wikipedia/en/e/e6/Crash_Bandicoot_2_Cortex_Strikes_Back_Game_Cover.jpg', 1, 1, 'Video Game', 'Sony', 2),
(30, 'NBA 2K1', 'NBA 2K1 is a 2000 sports video game developed by Visual Concepts and published by Sega. It was the first NBA 2K game to feature online multiplayer and the first game to feature street courses instead of playing a game inside the arena in the first game, famous street courts such as The Cage, Rucker Park, Franklin Park, and Goat Park.', '2000-10-31', '29.99', '29.99', 'https://upload.wikimedia.org/wikipedia/en/7/79/NBA_2K1_Cover.jpg', 1, 0, 'Video Game', 'Sega', 3),
(31, 'Sonic & Knuckles', 'Sonic & Knuckles is a platform game developed by Sonic Team and published by Sega for the Sega Genesis home video game console. The fourth game in the Sonic the Hedgehog franchise.', '1991-06-23', '29.99', '29.99', 'https://m.media-amazon.com/images/I/51JV6YK81FL.jpg', 1, 0, 'Video Game', 'Sega', 3),
(32, 'Operation', 'Operation is a battery-operated game of physical skill that tests players\' eye-hand coordination and fine motor skills. ', '1964-03-27', '14.99', '14.99', 'https://i.ebayimg.com/images/g/n2cAAOSwvmxci7ms/s-l500.jpg', 3, 0, 'Board Game', 'Hasbro', 4),
(33, 'Monopoly', 'Monopoly is a multi-player economics-themed board game. In the game, players roll two dice to move around the game board, buying and trading properties, and developing them with houses and hotels. Players collect rent from their opponents, with the goal being to drive them into bankruptcy. Money can also be gained or lost through Chance and Community Chest cards, and tax squares. Players receive a stipend every time they pass \"Go\", and can end up in jail, from which they cannot move until they have met one of three conditions.', '1935-06-17', '14.99', '14.99', 'https://www.hasbro.com/common/productimages/en_US/7EABAF9750569047F5778F4663C79E75/0EC335AD6B9448D5BB2F7AD4830C6EED.jpg', 3, 0, 'Board Game', 'Hasbro', 4);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisher_id` int(11) NOT NULL,
  `publisher` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisher_id`, `publisher`) VALUES
(1, 'Nintendo'),
(2, 'Sony'),
(3, 'Sega'),
(4, 'Hasbro'),
(5, 'Kenner'),
(6, 'Marvel'),
(7, 'Midway'),
(8, 'Star Wars'),
(9, 'TSR Inc.'),
(10, 'Atari Inc.'),
(11, 'Microsoft');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Admin` varchar(100) NOT NULL,
  `Birthday` date NOT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Zip` varchar(100) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `UserName`, `FirstName`, `LastName`, `Email`, `Password`, `Admin`, `Birthday`, `Address`, `Zip`, `State`, `Country`) VALUES
(1, 'coolm', 'Jim', 'Cool', 'coolm@iu.edu', 'retroAdmin', '1', '2022-04-26', '1234 Test Ln', '46228', 'IN', 'United States'),
(2, 'jwinbush', 'Jawon', 'Winbush', 'jwinbush@iu.edu', '333', '1', '2001-05-08', '991 Untrue Dr', '46202', 'IN', 'United States'),
(3, 'cdegraf', 'Charles', 'Degraff', 'cdegraf@iu.edu', '111', '1', '1982-07-10', '112 No Way', '46383', 'IN', 'United States'),
(4, 'aminardo', 'Anthony', 'Minardo', 'aminardo@iu.edu', '222', '1', '1989-03-13', '606 Notan Ave', '46540', 'IN', 'United States'),
(11, 'coolm4816@gmail.com', 'Matthew', 'Cool', 'coolm4816@gmail.com', 'coolm', '0', '2022-04-21', NULL, NULL, NULL, NULL),
(12, 'mcool@iu.edu', 'Tim', 'Smith', 'mcool@iu.edu', 'coolm', '0', '2022-04-26', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
