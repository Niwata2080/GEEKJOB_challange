DROP DATABASE IF EXISTS `stock_system`;
CREATE DATABASE stock_system;
USE stock_system;

DROP TABLE IF EXISTS `s_users`;
CREATE TABLE `s_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=cp932;

DROP TABLE IF EXISTS `s_stocks`;
CREATE TABLE `s_stocks` (
  `id` int(11) NOT NULL,
  `name` varchar(255),
  `price` int(11),
  `qty` int(11),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=cp932;

INSERT INTO `s_users` VALUES 
(1, '田中　実', 'tanaka'),
(2, '山田　隆夫', 'yamada'),
(3, '春風亭　昇太', 'shota');

INSERT INTO `s_stocks` VALUES 
(1, '座布団（紫）', 1000, 100),
(2, '座布団（金）', 5000, 10),
(3, '亀の子たわし', 300, 50);
