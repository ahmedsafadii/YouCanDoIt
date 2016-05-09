-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 09, 2016 at 09:46 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `RiotC3`
--

-- --------------------------------------------------------

--
-- Table structure for table `champions`
--

CREATE TABLE `champions` (
  `id` int(255) NOT NULL,
  `champion_id` varchar(255) NOT NULL,
  `champion_name` varchar(255) NOT NULL,
  `champion_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `champions`
--

INSERT INTO `champions` (`id`, `champion_id`, `champion_name`, `champion_title`) VALUES
(1, '266', 'Aatrox', 'the Darkin Blade'),
(2, '103', 'Ahri', 'the Nine-Tailed Fox'),
(3, '84', 'Akali', 'the Fist of Shadow'),
(4, '12', 'Alistar', 'the Minotaur'),
(5, '32', 'Amumu', 'the Sad Mummy'),
(6, '34', 'Anivia', 'the Cryophoenix'),
(7, '1', 'Annie', 'the Dark Child'),
(8, '22', 'Ashe', 'the Frost Archer'),
(9, '136', 'AurelionSol', 'The Star Forger'),
(10, '268', 'Azir', 'the Emperor of the Sands'),
(11, '432', 'Bard', 'the Wandering Caretaker'),
(12, '53', 'Blitzcrank', 'the Great Steam Golem'),
(13, '63', 'Brand', 'the Burning Vengeance'),
(14, '201', 'Braum', 'the Heart of the Freljord'),
(15, '51', 'Caitlyn', 'the Sheriff of Piltover'),
(16, '69', 'Cassiopeia', 'the Serpent''s Embrace'),
(17, '31', 'Chogath', 'the Terror of the Void'),
(18, '42', 'Corki', 'the Daring Bombardier'),
(19, '122', 'Darius', 'the Hand of Noxus'),
(20, '131', 'Diana', 'Scorn of the Moon'),
(21, '119', 'Draven', 'the Glorious Executioner'),
(22, '36', 'DrMundo', 'the Madman of Zaun'),
(23, '245', 'Ekko', 'the Boy Who Shattered Time'),
(24, '60', 'Elise', 'the Spider Queen'),
(25, '28', 'Evelynn', 'the Widowmaker'),
(26, '81', 'Ezreal', 'the Prodigal Explorer'),
(27, '9', 'FiddleSticks', 'the Harbinger of Doom'),
(28, '114', 'Fiora', 'the Grand Duelist'),
(29, '105', 'Fizz', 'the Tidal Trickster'),
(30, '3', 'Galio', 'the Sentinel''s Sorrow'),
(31, '41', 'Gangplank', 'the Saltwater Scourge'),
(32, '86', 'Garen', 'The Might of Demacia'),
(33, '150', 'Gnar', 'the Missing Link'),
(34, '79', 'Gragas', 'the Rabble Rouser'),
(35, '104', 'Graves', 'the Outlaw'),
(36, '120', 'Hecarim', 'the Shadow of War'),
(37, '74', 'Heimerdinger', 'the Revered Inventor'),
(38, '420', 'Illaoi', 'the Kraken Priestess'),
(39, '39', 'Irelia', 'the Will of the Blades'),
(40, '40', 'Janna', 'the Storm''s Fury'),
(41, '59', 'JarvanIV', 'the Exemplar of Demacia'),
(42, '24', 'Jax', 'Grandmaster at Arms'),
(43, '126', 'Jayce', 'the Defender of Tomorrow'),
(44, '202', 'Jhin', 'the Virtuoso'),
(45, '222', 'Jinx', 'the Loose Cannon'),
(46, '429', 'Kalista', 'the Spear of Vengeance'),
(47, '43', 'Karma', 'the Enlightened One'),
(48, '30', 'Karthus', 'the Deathsinger'),
(49, '38', 'Kassadin', 'the Void Walker'),
(50, '55', 'Katarina', 'the Sinister Blade'),
(51, '10', 'Kayle', 'The Judicator'),
(52, '85', 'Kennen', 'the Heart of the Tempest'),
(53, '121', 'Khazix', 'the Voidreaver'),
(54, '203', 'Kindred', 'The Eternal Hunters'),
(55, '96', 'KogMaw', 'the Mouth of the Abyss'),
(56, '7', 'Leblanc', 'the Deceiver'),
(57, '64', 'LeeSin', 'the Blind Monk'),
(58, '89', 'Leona', 'the Radiant Dawn'),
(59, '127', 'Lissandra', 'the Ice Witch'),
(60, '236', 'Lucian', 'the Purifier'),
(61, '117', 'Lulu', 'the Fae Sorceress'),
(62, '99', 'Lux', 'the Lady of Luminosity'),
(63, '54', 'Malphite', 'Shard of the Monolith'),
(64, '90', 'Malzahar', 'the Prophet of the Void'),
(65, '57', 'Maokai', 'the Twisted Treant'),
(66, '11', 'MasterYi', 'the Wuju Bladesman'),
(67, '21', 'MissFortune', 'the Bounty Hunter'),
(68, '62', 'MonkeyKing', 'the Monkey King'),
(69, '82', 'Mordekaiser', 'the Iron Revenant'),
(70, '25', 'Morgana', 'Fallen Angel'),
(71, '267', 'Nami', 'the Tidecaller'),
(72, '75', 'Nasus', 'the Curator of the Sands'),
(73, '111', 'Nautilus', 'the Titan of the Depths'),
(74, '76', 'Nidalee', 'the Bestial Huntress'),
(75, '56', 'Nocturne', 'the Eternal Nightmare'),
(76, '20', 'Nunu', 'the Yeti Rider'),
(77, '2', 'Olaf', 'the Berserker'),
(78, '61', 'Orianna', 'the Lady of Clockwork'),
(79, '80', 'Pantheon', 'the Artisan of War'),
(80, '78', 'Poppy', 'Keeper of the Hammer'),
(81, '133', 'Quinn', 'Demacia''s Wings'),
(82, '33', 'Rammus', 'the Armordillo'),
(83, '421', 'RekSai', 'the Void Burrower'),
(84, '58', 'Renekton', 'the Butcher of the Sands'),
(85, '107', 'Rengar', 'the Pridestalker'),
(86, '92', 'Riven', 'the Exile'),
(87, '68', 'Rumble', 'the Mechanized Menace'),
(88, '13', 'Ryze', 'the Rogue Mage'),
(89, '113', 'Sejuani', 'the Winter''s Wrath'),
(90, '35', 'Shaco', 'the Demon Jester'),
(91, '98', 'Shen', 'the Eye of Twilight'),
(92, '102', 'Shyvana', 'the Half-Dragon'),
(93, '27', 'Singed', 'the Mad Chemist'),
(94, '14', 'Sion', 'The Undead Juggernaut'),
(95, '15', 'Sivir', 'the Battle Mistress'),
(96, '72', 'Skarner', 'the Crystal Vanguard'),
(97, '37', 'Sona', 'Maven of the Strings'),
(98, '16', 'Soraka', 'the Starchild'),
(99, '50', 'Swain', 'the Master Tactician'),
(100, '134', 'Syndra', 'the Dark Sovereign'),
(101, '223', 'TahmKench', 'the River King'),
(102, '91', 'Talon', 'the Blade''s Shadow'),
(103, '44', 'Taric', 'the Shield of Valoran'),
(104, '17', 'Teemo', 'the Swift Scout'),
(105, '412', 'Thresh', 'the Chain Warden'),
(106, '18', 'Tristana', 'the Yordle Gunner'),
(107, '48', 'Trundle', 'the Troll King'),
(108, '23', 'Tryndamere', 'the Barbarian King'),
(109, '4', 'TwistedFate', 'the Card Master'),
(110, '29', 'Twitch', 'the Plague Rat'),
(111, '77', 'Udyr', 'the Spirit Walker'),
(112, '6', 'Urgot', 'the Headsman''s Pride'),
(113, '110', 'Varus', 'the Arrow of Retribution'),
(114, '67', 'Vayne', 'the Night Hunter'),
(115, '45', 'Veigar', 'the Tiny Master of Evil'),
(116, '161', 'Velkoz', 'the Eye of the Void'),
(117, '254', 'Vi', 'the Piltover Enforcer'),
(118, '112', 'Viktor', 'the Machine Herald'),
(119, '8', 'Vladimir', 'the Crimson Reaper'),
(120, '106', 'Volibear', 'the Thunder''s Roar'),
(121, '19', 'Warwick', 'the Blood Hunter'),
(122, '101', 'Xerath', 'the Magus Ascendant'),
(123, '5', 'XinZhao', 'the Seneschal of Demacia'),
(124, '157', 'Yasuo', 'the Unforgiven'),
(125, '83', 'Yorick', 'the Gravedigger'),
(126, '154', 'Zac', 'the Secret Weapon'),
(127, '238', 'Zed', 'the Master of Shadows'),
(128, '115', 'Ziggs', 'the Hexplosives Expert'),
(129, '26', 'Zilean', 'the Chronokeeper'),
(130, '143', 'Zyra', 'Rise of the Thorns');

-- --------------------------------------------------------

--
-- Table structure for table `experts`
--

CREATE TABLE `experts` (
  `expert_id` int(255) NOT NULL,
  `expert_name` varchar(255) NOT NULL,
  `expert_country` varchar(255) NOT NULL,
  `expert_status` varchar(255) NOT NULL,
  `expert_image` varchar(255) NOT NULL,
  `expert_summoner` varchar(255) NOT NULL,
  `expert_server` varchar(255) NOT NULL,
  `expert_rank` varchar(255) NOT NULL,
  `expert_years` varchar(255) NOT NULL,
  `expert_lane` varchar(255) NOT NULL,
  `expert_champion` varchar(255) NOT NULL,
  `expert_lastseason` varchar(255) NOT NULL,
  `expert_array_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experts`
--

INSERT INTO `experts` (`expert_id`, `expert_name`, `expert_country`, `expert_status`, `expert_image`, `expert_summoner`, `expert_server`, `expert_rank`, `expert_years`, `expert_lane`, `expert_champion`, `expert_lastseason`, `expert_array_id`) VALUES
(2, 'Ahmed Safadi', 'Palestine', 'old', '3214821', 'Skt T1 Feed3r', 'Europe West', 'Platinum I', '3', 'Support', 'Thresh', 'Platinum', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rateExpert`
--

CREATE TABLE `rateExpert` (
  `id` int(255) NOT NULL,
  `player_id` varchar(255) NOT NULL,
  `expert_id` varchar(255) NOT NULL,
  `rate_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `searchedPlayer`
--

CREATE TABLE `searchedPlayer` (
  `id` int(255) NOT NULL,
  `player_id` int(255) NOT NULL,
  `champion_id` int(255) NOT NULL,
  `region_id` varchar(255) NOT NULL,
  `expert_id` int(255) NOT NULL,
  `champion_grade` varchar(255) NOT NULL,
  `champion_points` varchar(255) NOT NULL,
  `champion_box` varchar(255) NOT NULL,
  `champion_level` varchar(255) NOT NULL,
  `champion_rank` varchar(255) NOT NULL,
  `champion_last_played` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `statusPlayer`
--

CREATE TABLE `statusPlayer` (
  `id` int(255) NOT NULL,
  `player_id` int(255) NOT NULL,
  `champion_id` int(255) NOT NULL,
  `region_id` varchar(255) NOT NULL,
  `match_played` varchar(255) NOT NULL,
  `match_win` varchar(255) NOT NULL,
  `match_lose` varchar(255) NOT NULL,
  `match_kills` varchar(255) NOT NULL,
  `match_farms` varchar(255) NOT NULL,
  `match_death` varchar(255) NOT NULL,
  `match_gold` varchar(255) NOT NULL,
  `match_assist` varchar(255) NOT NULL,
  `match_turret` varchar(255) NOT NULL,
  `match_pkill` varchar(255) NOT NULL,
  `match_qkill` varchar(255) NOT NULL,
  `match_tkill` varchar(255) NOT NULL,
  `match_dkill` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `champions`
--
ALTER TABLE `champions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experts`
--
ALTER TABLE `experts`
  ADD PRIMARY KEY (`expert_id`);

--
-- Indexes for table `rateExpert`
--
ALTER TABLE `rateExpert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `searchedPlayer`
--
ALTER TABLE `searchedPlayer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `statusPlayer`
--
ALTER TABLE `statusPlayer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `champions`
--
ALTER TABLE `champions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT for table `experts`
--
ALTER TABLE `experts`
  MODIFY `expert_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rateExpert`
--
ALTER TABLE `rateExpert`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `searchedPlayer`
--
ALTER TABLE `searchedPlayer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `statusPlayer`
--
ALTER TABLE `statusPlayer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
