-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-07-19 09:14:01
-- 伺服器版本: 5.6.26
-- PHP 版本： 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `employees`
--

-- --------------------------------------------------------

--
-- 資料表結構 `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `number` int(20) NOT NULL,
  `Id` varchar(20) NOT NULL,
  `Name` varchar(10) NOT NULL,
  `EName` varchar(20) DEFAULT NULL,
  `Sex` varchar(5) NOT NULL,
  `Id_Card` varchar(10) NOT NULL,
  `Office` varchar(10) NOT NULL,
  `Country` varchar(10) DEFAULT NULL,
  `Birthday` varchar(10) NOT NULL,
  `Telephone` varchar(20) DEFAULT NULL,
  `Cellphone` varchar(10) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Letter_city` varchar(10) DEFAULT NULL,
  `Letter_towns` varchar(10) DEFAULT NULL,
  `Letter_postal` varchar(10) DEFAULT NULL,
  `Letter` varchar(50) DEFAULT NULL,
  `Address_city` varchar(10) DEFAULT NULL,
  `Address_towns` varchar(10) DEFAULT NULL,
  `Address_postal` varchar(10) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Person` varchar(10) DEFAULT NULL,
  `Connection` varchar(20) DEFAULT NULL,
  `Wedding` varchar(10) DEFAULT NULL,
  `Soldier` varchar(10) DEFAULT NULL,
  `Special` varchar(20) DEFAULT NULL,
  `Driver1` varchar(5) DEFAULT NULL,
  `Driver2` varchar(5) DEFAULT NULL,
  `Driver3` varchar(5) DEFAULT NULL,
  `Driver4` varchar(5) DEFAULT NULL,
  `Image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `person`
--

INSERT INTO `person` (`number`, `Id`, `Name`, `EName`, `Sex`, `Id_Card`, `Office`, `Country`, `Birthday`, `Telephone`, `Cellphone`, `Email`, `Letter_city`, `Letter_towns`, `Letter_postal`, `Letter`, `Address_city`, `Address_towns`, `Address_postal`, `Address`, `Person`, `Connection`, `Wedding`, `Soldier`, `Special`, `Driver1`, `Driver2`, `Driver3`, `Driver4`, `Image`) VALUES
(1, 'C222', '林澤皓', NULL, '男', 'R333333333', '學生', '韓國', '321321', NULL, '651651', '5151651651', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16516516', '165165161', '未婚', '免役', '原住民', NULL, '', '', '', '2016-07-12/1468302283.jpg'),
(5, 'BBBBBBB', 'SSS', '3', '男', '5555555DDD', '在職', '台灣', '22222', '999999999', '2151515151', 'DDDDDD', '台中市', '中區', '400', 'WWWWWW', '新竹市', '東區', '300', 'AAADDDDD', NULL, NULL, '未婚', '未服役', NULL, '機車', '汽車', '', '', '2016-07-12/1468302271.jpg'),
(14, '15315616', '玩完雸玩完', 'pupu', '女', 'F333333333', '無職', '台灣', '07/13/2016', '05-5555555', NULL, NULL, '南投縣', '南投市', '540', '南南南南南南南', '台南市', '中西區', '700', '南南南南南南南南', NULL, NULL, '未婚', '未服役', '原住民', '機車', NULL, NULL, '大客車', '2016-07-11/1468203353.jpg'),
(15, 'DDDD', 'DDDDD', NULL, '女', 'dDD', '在職', '台灣', '07/03/2016', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未上傳照片'),
(16, 'LL111111', '之之之之', NULL, '男', 'K333333333', '學生', '韓國', '12/04/2009', NULL, NULL, NULL, '嘉義市', '東區', '600', 'DDDDD', NULL, NULL, NULL, NULL, NULL, NULL, '未婚', '未服役', NULL, NULL, NULL, NULL, NULL, '未上傳照片'),
(18, 'llllll', '四十四隻石獅子', NULL, '女', 'F333333333', '學生', '台灣', '67-09-12', '0000000000', '9999999999', 'EEEEEEE', NULL, NULL, NULL, NULL, '嘉義市', NULL, '600', NULL, '11111', '2222222222', '未婚', '免役', '身心障礙者', NULL, '汽車', '貨車', '大客車', '2016-07-18/1468833388.gif');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`number`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `person`
--
ALTER TABLE `person`
  MODIFY `number` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
