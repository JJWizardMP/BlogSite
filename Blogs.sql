-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 11, 2021 at 11:30 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Blogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE `Comments` (
  `ID_Comment` int(11) NOT NULL,
  `ID_Post` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `DateTime` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Comments`
--

INSERT INTO `Comments` (`ID_Comment`, `ID_Post`, `ID_User`, `Comment`, `DateTime`) VALUES
(1, 1, 5, 'Python Rules!', 'May 10, 2021 at 10:37:23 PM'),
(2, 1, 6, 'Python was my first program languaje, I have used it since the 2.5 version ', 'May 11, 2021 at 02:23:16 PM'),
(3, 3, 7, 'I love so much working with react and kubernetes', 'May 11, 2021 at 03:13:27 PM'),
(4, 1, 7, 'Python always will be my main', 'May 11, 2021 at 03:23:06 PM'),
(5, 2, 5, 'I want to become in a A.I developer', 'May 11, 2021 at 03:45:18 PM'),
(6, 6, 6, 'It is that true, I prefer react native over flutter!', 'May 11, 2021 at 03:52:57 PM');

-- --------------------------------------------------------

--
-- Table structure for table `Posts`
--

CREATE TABLE `Posts` (
  `ID_Post` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Imagepath` varchar(60) NOT NULL,
  `Description` text NOT NULL,
  `Content` longtext NOT NULL,
  `DateTime` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Posts`
--

INSERT INTO `Posts` (`ID_Post`, `ID_User`, `Title`, `Imagepath`, `Description`, `Content`, `DateTime`) VALUES
(1, 1, 'What’s new in Python 3.10', './uploads/ID-1.jpeg', 'The latest beta version of Python sports powerful pattern matching features, better error reporting, and smarter typing syntax for wrapped functions.', 'Python 3.10, the latest in-development version of Python, has been released in its first beta version. With the beta release, the feature set for Python 3.10 has been locked down, and intrepid Python developers are encouraged to test their code against the latest builds (although not in a production environment, of course).\r\n\r\nThere aren’t many truly new major features in Python 3.10, but of the few that we do have, one of them — structural pattern matching — may be the single most significant addition to the language syntax since async.', 'May 8, 2021 at 07:01:07 PM'),
(2, 1, 'Global Artificial Intelligence and Machine Learning Survey - In-depth Interviews with 406 Qualified AI and Machine Learning Developers', './uploads/ID-2.jpeg', 'The \"Artificial Intelligence and Machine Learning 2020, Volume 1\" report has been added to ResearchAndMarkets.com\'s offering.', 'This survey gives a comprehensive view of the attitudes, adoption patterns and intentions of artificial intelligence and machine learning developers worldwide. This series focuses on tools, methodologies, and concerns related to implementing machine learning, deep learning, image recognition, pattern recognition and other forms of artificial intelligence as well as efficiently storing, handling, and analyzing large datasets and databases from a wide range of sources.\r\n\r\nArtificial intelligence is permeating software development in many ways and many industries, which necessitates a thorough knowledge of how developers are doing this.', 'May 10, 2021 at 02:14:12 PM'),
(3, 1, 'Kubernetes, React Native the fastest-emerging IT skills: Report', './uploads/ID-3.jpeg', 'Kubernetes has jumped 53 ranks up to 32 in a year, while React Native has jumped 59 ranks and Redux 40 ranks to stand at 42 and 66, respectively, according to the report.', 'Mumbai: As the coronavirus pandemic created digital transformation across industries, it also increased the demand for IT professionals, with expertise in programmes such as Kubernetes, React Native and Redux becoming fast-emerging choices for recruiters, according to a report. The adoption of a digital way of life came from the disruption due to the pandemic, from ordering groceries online to working remotely, resulting in robust demand for IT professionals in the mid-to-long term, according to the Naukri Pulse IT skills report.\r\n\r\nKubernetes, React Native and Redux have come up as the fast-emerging skills of choice for recruiters, it added.\r\n\r\nKubernetes has jumped 53 ranks up to 32 in a year, while React Native has jumped 59 ranks and Redux 40 ranks to stand at 42 and 66, respectively, according to the report.\r\n\r\nProficiency in skills like Kafka, Magento and Docker can also help job seekers gain a competitive edge, it said.\r\n\r\n', 'May 10, 2021 at 02:30:42 PM'),
(4, 1, 'AWS announces availability of Advanced Query Accelerator for Amazon Redshift', './uploads/ID-4.jpeg', 'Amazon Web Services, Inc. (AWS), announced on Wednesday the general availability of Advanced Query Accelerator (AQUA) for Amazon Redshift.', 'AQUA brings compute to the storage layer, helping customers avoid networking bandwidth limitations by eliminating unnecessary data movement between where data is stored and compute clusters, the company said.\r\n\r\nSince its launch in 2012, Amazon Redshift has become one of the most popular cloud data warehouses, it said.\r\n\r\nAQUA for Amazon Redshift is a distributed and hardware-accelerated cache for Amazon Redshift; an innovation that improves performance for analytics at the new scale of data.\r\n\r\n\"Existing data warehouse architectures with centralized storage require that data be moved to compute clusters for processing, which creates a bottleneck and slows down performance,\" said Rahul Pathak, vice president of analytics at AWS. \"By bringing compute to the storage layer, AQUA helps customers eliminate unnecessary data movement to avoid these networking bandwidth limitations, delivering up to an order-of-magnitude query performance improvement.\" Enditem', 'May 10, 2021 at 02:34:57 PM'),
(5, 7, 'Nhost is an open source Firebase rival backed by GitHub’s founders', './uploads/ID-5.png', 'In a world where technical talent is at a premium, businesses have to tap into the broader technology ecosystem to help build and scale their digital products. In truth, most companies probably don’t care much how their software is constructed', 'Against this backdrop, Swedish startup Nhost is setting out to expedite the development process with an open source backend-as-a-service (BaaS) platform that lets developers forget about the infrastructure and focus purely on the customer-facing frontend.\r\n\r\nWith Nhost, companies can automate their entire backend development and cloud infrastructure spanning file storage, databases, user authentication, APIs, and more.\r\n\r\n“We remove a considerable amount of ongoing effort, time, and resources for tasks that are not directly related to the product our customers want to build,” Nhost CEO and cofounder Johan Eliasson told VentureBeat. “With Nhost, they can start building their customer-facing products after only one minute.”\r\n\r\nTo help fund its next stage of growth, Nhost today announced it has raised $3 million in a round of funding led by Nauta Capital, with participation from some prominent angel investors, including GitHub founders Scott Chacon and Tom Preston-Werner and Netlify founders Christian Bach and Mathias Biilmann Christensen. Existing investor Antler also participated in the round.', 'May 11, 2021 at 03:21:20 PM'),
(6, 5, 'Flutter Vs React Native For Mobile App Development', './uploads/ID-6.png', 'According to a 2020 Statista report, 42% of developers prefer React, while Flutter is the choice framework for 39% of developers. Irrespective of their mutual rivalry and competition, it is extremely important to evaluate their strengths and weaknesses, pros and cons, and particular features that app developers may find helpful.', 'Flutter and React Native are two of the most popular frameworks that received widespread acclaim for their capabilities in building powerful native-looking and native-feeling cross-platform apps. No wonder, they are also subjected to frequent comparison and evaluation. Whether you should go for a React Native or Flutter app development company, for your next app project, needs meticulous consideration of several aspects.\r\n\r\nAccording to a 2020 Statista report, 42% of developers prefer React, while Flutter is the choice framework for 39% of developers. Irrespective of their mutual rivalry and competition, it is extremely important to evaluate their strengths and weaknesses, pros and cons, and particular features that app developers may find helpful. Let us begin by introducing each framework and their key attributes.', 'May 11, 2021 at 03:49:28 PM');

-- --------------------------------------------------------

--
-- Table structure for table `Replies`
--

CREATE TABLE `Replies` (
  `ID_Reply` int(11) NOT NULL,
  `ID_Comment` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `ID_Post` int(11) NOT NULL,
  `Reply` text NOT NULL,
  `DateTime` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Replies`
--

INSERT INTO `Replies` (`ID_Reply`, `ID_Comment`, `ID_User`, `ID_Post`, `Reply`, `DateTime`) VALUES
(1, 1, 6, 1, 'I think the same as you!', 'May 11, 2021 at 11:29:41 AM'),
(2, 2, 7, 1, 'My case is the same jeje', 'May 11, 2021 at 03:23:49 PM');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `ID_User` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`ID_User`, `Name`, `Username`, `Password`) VALUES
(1, 'Joan J', 'jjwizard', '$2y$10$.j1c5BG48SWcJ5xr9PyEaeQ27z9Ryjf70IDQt.x.fdnfM/0TDpdmO'),
(3, 'LLoyd', 'xiao', '$2y$10$vq2b/ww48bXRx0pYzoGw5OS4GxqfRWD1tAaumnldzPD9/xCbIc3h2'),
(4, 'Jesus', 'Tensor', '$2y$10$UgVykvuAzMgBYJHJfnRPxukzwPez696hWAY/FPvHx1J1KwIbu0pQC'),
(5, 'Uziel', 'Uzi', '$2y$10$SCQpcuPY30dQDqe/y8NH6u.s0FMBrzQ4K1qTqr3Jf5wO0JdwxLjAi'),
(6, 'Jesus J', 'Kei', '$2y$10$2uwOoCMevRSNgoDw6R7cSOJemTvO0xboYRKD3wzLRjVzcqXHTJsT2'),
(7, 'Alejandra', 'Ale', '$2y$10$PlsV8ipWewIVKCBM6R8XTe.TGl5WERVKkkSLmBZxuchUGeNBgJ54a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`ID_Comment`);

--
-- Indexes for table `Posts`
--
ALTER TABLE `Posts`
  ADD PRIMARY KEY (`ID_Post`);

--
-- Indexes for table `Replies`
--
ALTER TABLE `Replies`
  ADD PRIMARY KEY (`ID_Reply`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Comments`
--
ALTER TABLE `Comments`
  MODIFY `ID_Comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Posts`
--
ALTER TABLE `Posts`
  MODIFY `ID_Post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Replies`
--
ALTER TABLE `Replies`
  MODIFY `ID_Reply` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
