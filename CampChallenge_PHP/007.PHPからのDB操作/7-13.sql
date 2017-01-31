DROP TABLE IF EXISTS `timetable`;

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `week` varchar(255) NOT NULL,
  `period` int(11) NOT NULL,
  `name` varchar(255),
  `subjects` varchar(255),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=cp932;

INSERT INTO timetable(week, period)
VALUES ('月', 1), ('月', 2), ('月', 3), ('月', 4), ('月', 5), ('火', 1), ('火', 2), ('火', 3), ('火', 4), ('火', 5), ('水', 1), ('水', 2), ('水', 3), ('水', 4), ('水', 5), ('木', 1), ('木', 2), ('木', 3), ('木', 4), ('木', 5), ('金', 1), ('金', 2), ('金', 3), ('金', 4), ('金', 5);