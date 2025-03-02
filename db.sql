-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2025 at 06:44 AM
-- Server version: 10.11.6-MariaDB-0+deb12u1
-- PHP Version: 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'General Discussion'),
(2, 'Web Development'),
(3, 'Technology & Hardware');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `createdAt`, `user_id`, `post_id`, `forum_id`) VALUES
(43, 'Frozen Hiring Edition\r\n\r\nTech News & Industry Insights\r\nThe Register - https://www.theregister.com/\r\nTechCrunch - https://techcrunch.com/\r\nHacker News - https://news.ycombinator.com/\r\nFudzilla - https://fudzilla.com/news\r\nZDNet - https://www.zdnet.com', '2025-03-01 21:06:39', 1, 19, 1),
(44, 'Software Development & Programming\r\nGitHub Trending - https://github.com/trending\r\nDevDocs - https://devdocs.io/\r\nJavaScript, CSS, HTML sandbox - https://jsfiddle.net/\r\nMDN Web Docs - https://developer.mozilla.org/\r\nStack Overflow Blog - https://stackoverflow.blog/', '2025-03-01 21:08:04', 4, 19, 1),
(45, 'IT Operations & Infrastructure\r\nAWS Service Health Dashboard - https://status.aws.amazon.com/\r\nCloudflare System Status - https://www.cloudflarestatus.com/\r\nDownDetector - https://downdetector.com/\r\nMicrosoft Azure Status - https://status.azure.com/\r\nMicrosoft Office 365 Status - https://portal.office.com/servicestatus', '2025-03-01 21:08:04', 2, 19, 1),
(46, 'Nice', '2025-03-01 21:08:04', 4, 19, 1),
(47, 'Unemployment Advice\r\nInterview Prep - https://www.wikihow.com/Ask-Your-Parents-for-Money\r\nBuilding a Resume - https://www.wikihow.com/Write-a-Manifesto\r\nSalary Stuff - https://www.usa.gov/benefit-finder/disability\r\nHelpful YouTube Channels - [YouTube] Insane Clown Posse - It\'s All Over (embed) [Embed] [Embed] (Embed) [Embed] [Embed] [Embed]\r\nEmotional Support - https://lostallhope.com/suicide-methods/statistics-most-lethal-methods\r\nPeople who will be joining us shortly - https://layoffs.fyi', '2025-03-01 21:15:24', 3, 20, 1),
(48, 'Software Development & Programming\r\nGitHub Trending - https://github.com/trending\r\nDevDocs - https://devdocs.io/\r\nJavaScript, CSS, HTML sandbox - https://jsfiddle.net/\r\nMDN Web Docs - https://developer.mozilla.org/\r\nStack Overflow Blog - https://stackoverflow.blog/', '2025-03-01 21:15:24', 2, 20, 1),
(49, 'IT Operations & Infrastructure\r\nAWS Service Health Dashboard - https://status.aws.amazon.com/\r\nCloudflare System Status - https://www.cloudflarestatus.com/\r\nDownDetector - https://downdetector.com/\r\nMicrosoft Azure Status - https://status.azure.com/\r\nMicrosoft Office 365 Status - https://portal.office.com/servicestatus', '2025-03-01 21:15:24', 1, 20, 1),
(50, '>Keyboard recommendation template:\r\nhttps://pastebin.com/n220xk9V\r\n(Helps also to mention if you\'re open to soldering or not)', '2025-03-01 21:23:08', 4, 21, 2),
(51, '>Layouts and switches\r\nhttps://compare.splitkb.com\r\nhttps://keyboard-design.com\r\nhttps://www.theremingoat.com\r\nhttps://www.switchesdb.com', '2025-03-01 21:23:08', 2, 21, 2),
(52, 'Today was a gooood day!', '2025-03-01 21:25:01', 3, 22, 3),
(53, 'Today was a baaaad day!', '2025-03-01 21:25:01', 3, 23, 3),
(54, '>Free beginner resources to get started with HTML, CSS and JS\r\nhttps://developer.mozilla.org/en-US/docs/Learn - MDN is your friend for web dev fundamentals\r\nhttps://web.dev/learn/ - Guides by Google, you can also learn concepts like Accessibility, Responsive Design etc\r\nhttps://eloquentjavascript.net/Eloquent_JavaScript.pdf - A modern introduction to JavaScript', '2025-03-01 21:28:05', 4, 24, 4),
(55, 'https://javascript.info/ - Quite a good JS tutorial\r\nhttps://flukeout.github.io/ - Learn CSS selectors in no time\r\nhttps://flexboxfroggy.com/ and https://cssgridgarden.com/ - Learn flex and grid in CSS\r\nhttps://roadmap.sh/roadmaps?g=Web+Development - Guided beginner roadmaps\r\n', '2025-03-01 21:28:05', 2, 24, 4),
(56, 'https://github.com/bradtraversy/design-resources-for-developers - List of design resources\r\nhttps://www.digitalocean.com/community/tutorials - Usually the best guides for everything server related', '2025-03-01 21:29:14', 1, 25, 4),
(57, 'https://nodejs.org/en/learn/getting-started/introduction-to-nodejs - An intro to Node.js\r\nhttps://www.phptutorial.net - A PHP tutorial', '2025-03-01 21:30:23', 2, 26, 5),
(58, 'https://dev.java/learn/ - A Java tutorial\r\nhttps://rentry.org/htbby - Links for Python and Go', '2025-03-01 21:30:23', 1, 26, 5),
(59, 'READ THE WIKI! & help by contributing:\r\nhttps://wiki.installgentoo.com/wiki/Home_server\r\n\r\n>What software should I run?\r\nInstall Gentoo. Or whatever flavor of *nix is best for the job or most comfy for you. Jellyfin/Emby/Plex to replace Netflix, Nextcloud to replace Googlel, Ampache/Navidrome to replace Spotify, the list goes on. Look at the awesome self-hosted list and ask.', '2025-03-01 21:32:46', 4, 29, 6),
(60, '>Links & resources\r\nCool stuff to host: https://gitlab.com/awesome-selfhosted/awesome-selfhosted\r\nhttps://reddit.com/r/datahoarder\r\nhttps://www.labgopher.com\r\nhttps://www.reddit.com/r/homelab/wiki/index\r\nhttps://wiki.debian.org/FreedomBox/Features\r\nARM-based SBCs: https://docs.google.com/spreadsheets/d/1PGaVu0sPBEy5GgLM8N-CvHB2FESdlfBOdQKqLziJLhQ\r\nLow-power x86 systems: https://docs.google.com/spreadsheets/d/1LHvT2fRp7I6Hf18LcSzsNnjp10VI-odvwZpQZKv_NCI\r\nSFF cases https://docs.google.com/spreadsheets/d/1AddRvGWJ_f4B6UC7_IftDiVudVc8CJ8sxLUqlxVsCz4/\r\nCheap disks: https://shucks.top/ https://diskprices.com/\r\nPCIE info: https://files.catbox.moe/id6o0n.pdf', '2025-03-01 21:32:46', 2, 29, 6),
(61, '>UPGRADE & BUILD ADVICE.\r\nPost build list or current specs including MONITOR: https://pcpartpicker.com/\r\nProvide specific use cases.\r\nState BUDGET and COUNTRY or you will NOT be helped.\r\nBuilding guide: https://wiki.installgentoo.com/index.php/Build_a_PC', '2025-03-01 21:42:49', 4, 30, 7),
(62, '>PC Figures\r\nGPU: Noodle Stopper\r\n<90mm base: Nendoroids, Deformed Figure, Mini Chara Stand\r\n90-120mm base: Figma, Pop Up Parade (Non L/XL), Arylic Stand (<19cm height)\r\n120-140mm base: Taito, Pop Up Parade (L), 1/8 Scale\r\n140mm+ base: Pop Up Parade (XL), 1/7+ Scale', '2025-03-01 21:42:49', 1, 30, 7);

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `link` text NOT NULL,
  `createdAt` datetime NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `name`, `description`, `link`, `createdAt`, `category_id`) VALUES
(1, 'Programming Careers & Jobs', 'Discuss job hunting, resumes, and interview experiences in the tech industry.', 'forum', '2025-02-20 10:27:35', 1),
(2, 'Hobby Projects & Side Hustles', 'Showcase personal projects, get feedback, and collaborate with others.', 'forum', '2025-02-20 10:27:35', 1),
(3, 'Off-Topic & Casual Chat', 'Relax and talk about anything from gaming to daily life topics.', 'forum', '2025-02-20 10:27:35', 1),
(4, 'Frontend Development', 'Discuss HTML, CSS, JavaScript, and frontend frameworks like Vue.js, React, and Svelte.', 'forum', '2025-02-20 10:27:35', 2),
(5, 'Backend Development', 'Talk about PHP, Symfony, Node.js, databases, and server-side programming.', 'forum', '2025-02-20 10:27:35', 2),
(6, 'DevOps & Hosting', 'Share knowledge on VPS hosting, Linux servers, security, and deployment strategies.', 'forum', '2025-02-20 10:27:35', 2),
(7, 'PC Building & Hardware', 'Ask for advice on building PCs, upgrading components, and troubleshooting hardware.', 'forum', '2025-02-20 10:27:35', 3),
(8, 'Networking & Security', 'Discuss networking setups, firewalls, VPNs, and best security practices.', 'forum', '2025-02-20 10:27:35', 3),
(9, 'IoT & Embedded Systems', 'Talk about Raspberry Pi, Arduino, and other embedded development projects.', 'forum', '2025-02-20 10:27:35', 3);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `author` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `forum_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `name`, `author`, `createdAt`, `forum_id`) VALUES
(19, 'Tech Workers General', 1, '2025-03-01 20:03:57', 1),
(20, 'Unemployable Tech Workers General', 3, '2025-03-01 20:03:57', 1),
(21, 'Mechanical Keyboard General ', 4, '2025-03-01 20:21:19', 2),
(22, 'Howdy, friend!', 3, '2025-03-01 20:23:46', 3),
(23, 'Goodbye!', 3, '2025-03-01 20:23:46', 3),
(24, 'Friendly Web Development General', 4, '2025-03-01 20:26:35', 4),
(25, 'Resources for miscellaneous areas', 1, '2025-03-01 20:28:39', 4),
(26, 'Resources for backend languages', 2, '2025-03-01 20:29:32', 5),
(29, 'Home Server General ', 4, '2025-03-01 20:31:27', 6),
(30, 'PC Building General ', 4, '2025-03-01 20:41:58', 7);

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `quote` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `quote`) VALUES
(1, 'Life is short. Smile while you still have teeth.'),
(2, 'Don’t wait for the storm to pass, learn to dance in the rain.'),
(3, 'You can’t pour from an empty cup. Take care of yourself first.'),
(4, 'Be a voice, not an echo.'),
(5, 'The best time for new beginnings is now.'),
(6, 'Believe you can and you\'re halfway there.'),
(7, 'Happiness is not something ready-made. It comes from your own actions.'),
(8, 'If you can’t find the sunshine, be the sunshine.'),
(9, 'You miss 100% of the shots you don’t take.'),
(10, 'A day without laughter is a day wasted.'),
(11, 'The only way to do great work is to love what you do.'),
(12, 'Do what you love, and you\'ll never work a day in your life.'),
(13, 'Sometimes the smallest things take up the most room in your heart.'),
(14, 'The only limit to our realization of tomorrow is our doubts of today.'),
(15, 'You are never too old to set another goal or to dream a new dream.'),
(16, 'It always seems impossible until it\'s done.'),
(17, 'Be the change that you wish to see in the world.'),
(18, 'You’re never fully dressed without a smile.'),
(19, 'Everything you can imagine is real.'),
(20, 'It’s not about how hard you hit. It’s about how hard you can get hit and keep moving forward.'),
(21, 'Life is like a puzzle; every day is a new piece.'),
(22, 'Smile, because you never know who might fall in love with your joy.'),
(23, 'Happiness is homemade and shared.'),
(24, 'Find beauty in every day, even in the smallest moments.'),
(25, 'Laughter is the best curve on your body.'),
(26, 'Every sunrise brings a new adventure.'),
(27, 'A sprinkle of kindness can brighten a dark day.'),
(28, 'Dare to dream and let your imagination run wild.'),
(29, 'In the garden of life, laughter is the best fertilizer.'),
(30, 'Chase your dreams with a heart full of hope and a mind full of wonder.'),
(31, 'Today is a good day to sparkle and shine.'),
(32, 'Embrace the magic of everyday moments.'),
(33, 'Dance like nobody\'s watching and laugh like there\'s no tomorrow.'),
(34, 'Keep your spirit light and your heart bright.'),
(35, 'A little progress each day adds up to big results.'),
(36, 'Let your smile change the world, but don\'t let the world change your smile.'),
(37, 'Be a rainbow in someone else\'s cloud.'),
(38, 'Every moment is a fresh beginning.'),
(39, 'Find joy in the journey and not just the destination.'),
(40, 'Let curiosity lead the way and wonder fill your heart.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `avatar`, `token`) VALUES
(1, 'Anon342', 'avatar', 'Token'),
(2, 'bigAnon222', 'bigAnon222', 'bigAnon222'),
(3, 'TinyAnon', 'TinyAnon', 'TinyAnon'),
(4, 'aMouse22', 'aMouse22', 'aMouse22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_post` (`post_id`),
  ADD KEY `comment_forum` (`forum_id`),
  ADD KEY `comment_user` (`user_id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_forum` (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_forum` (`forum_id`),
  ADD KEY `post_user` (`author`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_forum` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_post` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `category_forum` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_forum` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_user` FOREIGN KEY (`author`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
