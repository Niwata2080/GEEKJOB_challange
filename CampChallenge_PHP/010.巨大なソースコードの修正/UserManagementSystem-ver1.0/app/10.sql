USE challenge_db;

DROP TABLE IF EXISTS `user_t`;
CREATE TABLE `user_t` (
  `userID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` Date,
  `tell` varchar(255),
  `type` int,
  `comment` text,
  `newDate` Datetime,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;


