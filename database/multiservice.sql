-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2022 at 02:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multiservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `oid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `cid` int(10) NOT NULL,
  `oname` varchar(30) NOT NULL,
  `omobile` char(20) NOT NULL,
  `date` date NOT NULL,
  `pincode` int(10) NOT NULL,
  `paymethod` varchar(30) NOT NULL,
  `oaddress` varchar(200) NOT NULL,
  `problem` varchar(200) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`oid`, `pid`, `cid`, `oname`, `omobile`, `date`, `pincode`, `paymethod`, `oaddress`, `problem`, `status`) VALUES
(18, 19, 39, 'gaurav', '7886333245', '2022-08-24', 787254, 'Cash', 'nallasopara east ', 'any  bajdns snbcmbms', 'Pandding'),
(19, 18, 39, 'rahul', '7876423121', '2022-08-24', 454534, 'Cash', 'jklds nc,sn ,shskdhsk', 'no queryhwkkwnekfwkhfwnk', 'Pending'),
(32, 24, 40, 'nklnn ', '7878978978', '2022-08-17', 787846, 'Cash', 'k nknkdgkr kegkd', 'nnnnn   ,mm mklmmgl', 'Pandding'),
(39, 18, 40, 'rahyk ', '7887687654', '2022-08-17', 876844, 'Card', 'klas s lmklsdn slsnlslsn', 'das ascsdsscs  csd sds', 'Rejected'),
(44, 18, 39, 'rahul', '7647345345', '2022-08-31', 476453, 'Cash', 'andheri air cargo east bridge', 'ac problem hfsk  nk  dnk', 'Pandding'),
(45, 20, 39, 'netab nc c, S', '4864531334', '2022-08-18', 465445, 'Cash', 'nkjas n skjcs cskskksnck', 'not ndan dsnks n,nn,', 'Pandding'),
(46, 18, 39, 'yash batavle', '7687646465', '2022-08-23', 767676, 'Cash', 'andheri air cargo east bridge', 'ac repair jsa kcs,nsk', 'Pandding'),
(47, 20, 40, 'rahul', '8774653131', '2022-09-26', 786465, 'Cash', ' m3e,em, re,,mr,e ,me r,me', ' feg,dxx ,v kndvd vmdvdv,.dvd', 'pending'),
(48, 18, 39, 'nitin', '8435131321', '2022-09-20', 764351, 'Cash', 'nckj x,c dsm, cs,s,m ,x', 'nsfk sdm,dsmcmdsds', 'pending'),
(49, 18, 39, 'kumar', '9876464313', '2022-09-29', 897687, 'Cash', 'nzc kj zmx, xc, mc, ,xnvmx ', 'x c,mdxcx,m cx,m x xx ,mcx', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` char(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `name`, `email`, `mobile`, `image`, `gender`, `password`, `token`) VALUES
(40, 'kiran waghmaree', 'kiran@gmail.com', '8768463212', '../image/ca157455c88f7118eb68a960f2b0604a.png', 'Male', '71b3b26aaa319e0cdf6fdb8429c112b0', ''),
(41, 'nitin', 'nitin@gmail.com', '7865413225', '../image/b43a647d3a3685b961dede49c603e947.jpg', 'Male', 'e10adc3949ba59abbe56e057f20f883e', ''),
(42, 'krish', 'krish@gmail.com', '7987465454', '../image/18730bf3aba9cc304b65a6f2903a85a2.jpg', 'Male', 'e10adc3949ba59abbe56e057f20f883e', '');

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `pid` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` char(20) NOT NULL,
  `service` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pincode` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`pid`, `name`, `email`, `mobile`, `service`, `address`, `password`, `city`, `pincode`, `image`, `gender`, `token`) VALUES
(11, 'mSZ', 'max@gmail.com', '754', 'Electrician', 'xcc', '9400ebf223f50ff8fccb32ed13ea819e', 'Dhule', 54, 'image/et.jpg', '2', ''),
(13, 'yash batavle', 'yashbatavle123b@gmail.com', '7874542454', 'Pest Control', 'andheri east indian air ', '71b3b26aaa319e0cdf6fdb8429c112b0', 'Jalgaon', 789456, 'image/bg.png', 'Male', 'd54df41f5b2d686c0fb30dfa6fb4e53c'),
(15, 'sham', 'sham@gmail.com', '2147483647', 'Pest Control', 'ncxknx kx,xccx.x k.x cx kc', 'e10adc3949ba59abbe56e057f20f883e', 'Solapur', 555545, 'image/hk.jpg', 'Male', ''),
(16, 'rahul', 'rahul@gmail.com', '2147483647', 'Pest Control', 'b njksdk ddkcxc c n jdf', 'e10adc3949ba59abbe56e057f20f883e', 'Thane', 877687, 'image/bg.png', 'Male', ''),
(17, 'ketan', 'ketan@gmail.com', '2147483647', 'Housekeeping', 'b  k   dnkvddk        kfc', 'e10adc3949ba59abbe56e057f20f883e', 'Amravati', 444877, 'image/id.jpg', 'Male', ''),
(18, 'kiran wagmare', 'kiran@gmail.com', '9565413513', 'Ac Repair', 'Andheri air cargo east', 'e10adc3949ba59abbe56e057f20f883e', 'Jalgaon', 987645, '../image/a3e230685ac1d513b14776ab97f85de1.jpg', 'Male', ''),
(19, 'rutu jalgaonkar', 'rutu@gmail.com', '2147483647', 'Real Estate', 'k kd kd   k c kdcm dcd', 'e10adc3949ba59abbe56e057f20f883e', 'Panvel', 555555, 'image/pk.jpg', 'Female', ''),
(20, 'netra', 'netra@gmail.com', '2147483647', 'Ac Repair', 'mkm , ,,d ,d .d ,.,d,d', 'e10adc3949ba59abbe56e057f20f883e', 'Jalgaon', 464424, 'image/id.jpg', 'Female', ''),
(21, 'prem', 'prem@gmail.com', '2147483647', 'Real Estate', '6464       x kl l ,ncklzjlcznl', 'e10adc3949ba59abbe56e057f20f883e', 'Nagpur', 465454, 'image/pk.jpg', 'Male', ''),
(22, 'rohan', 'rohan@gmail.com', '2147483647', 'Interior Designer', '5  , vdvd,vdm  kdmdkml', 'e10adc3949ba59abbe56e057f20f883e', 'Nashik', 476757, 'image/sa.jpg', 'Male', ''),
(23, 'pratik gorivale', 'pratikgorivale@gmail.com', '7863242424', 'Ac Repair', 'jgjgjgmhmhkhkh,n,nlkhjk', '71b3b26aaa319e0cdf6fdb8429c112b0', 'Jalgaon', 786424, 'image/et.jpg', 'Male', ''),
(24, 'suyog', 'suyog@gmail.com', '4768789465', 'Ac Repair', ' nknk  k ,  ldkofmekmv', '71b3b26aaa319e0cdf6fdb8429c112b0', 'Jalgaon', 786764, 'image/about.jpg', 'Male', ''),
(25, 'kitu', 'kitu@gmail.com', '8964651321', 'Interior Designer', ' kn ckkz xkxkxkc kx kxck', 'e10adc3949ba59abbe56e057f20f883e', 'Nagpur', 984764, '../image/36eda929726a3d43f157534eb149894d.jpg', 'Male', ''),
(26, 'faran', 'faran@gmail.com', '7846461213', 'Housekeeping', ',nck zmxm kx,mkxm,x cx c', 'e10adc3949ba59abbe56e057f20f883e', 'Dhule', 878964, '../image/e1b0b7e7e76d8acb22ed70190f5378c4.jpg', 'Male', ''),
(27, 'yasif', 'yasif@gmail.com', '9846131321', 'Ac Repair', 'nscd s cms mz  km,szx', 'e10adc3949ba59abbe56e057f20f883e', 'Nagpur', 878946, '../image/5e1e6354b3a8513cf3b51a49f6b7a11e.jpg', 'Male', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`pid`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `oid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
