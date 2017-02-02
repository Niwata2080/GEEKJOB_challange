DROP DATABASE IF EXISTS `ekimei`;
CREATE DATABASE ekimei;
USE ekimei;

DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `stations`;
CREATE TABLE `stations` (
  `id` int(11) NOT NULL,
  `name` varchar(255),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO `members` VALUES 
(1, '田中　実'),
(2, '山田　隆夫'),
(3, '春風亭　昇太');

INSERT INTO `stations` VALUES 
(1, '東京'),
(2, '神田'),
(3, '秋葉原');
