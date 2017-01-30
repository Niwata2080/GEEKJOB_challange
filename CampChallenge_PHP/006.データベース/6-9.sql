CREATE TABLE department(departmentID int PRIMARY KEY, departmentName varchar(255));
INSERT INTO department VALUES(1, '開発部'), (2, '営業部'), (3, '総務部');
SELECT * FROM department;

CREATE TABLE station(stationID int PRIMARY KEY, stationName varchar(255));
INSERT INTO station VALUES(1, '九段下'), (2, '永田町'), (3, '渋谷'), (4, '神保町'), (5, '上井草');
SELECT * FROM station;

CREATE TABLE user(userID int PRIMARY KEY, name varchar(255), tell varchar(255), age int, birthday date, departmentID int, stationID int, FOREIGN KEY(departmentID) REFERENCES department(departmentID));
ALTER TABLE user ADD FOREIGN KEY(stationID) REFERENCES station(stationID);
INSERT INTO user VALUES(1, '田中 実', '012-345-6789', 30, '1994-02-01', 3, 1), 
(2, '鈴木 茂', '090-1122-3344', 37, '1987-08-12', 3, 4), 
(3, '鈴木 実', '080-5566-7788', 24, '2000-12-24', 2, 5), 
(4, '佐藤 清', '012-0987-6543', 19, '2005-08-01', 1, 5), 
(5, '高橋 清', '090-9900-1234', 24, '2000-12-24', 3, 5);
SELECT * FROM user;

/*このリンク(2)にあるようなテーブル群(複数シートあり)をCREATEし、記述されているレコードをINSERTしてください。CREATE時には同時に主キーと外部キーの指定もしてください(Primary Key と Foreign Keyを宣言)。全件INSERT後、SELECT *を実行することにより全要素を表示してください。

user						
userID	name	tell	age	birthday	departmentID	stationID
int	varchar(255)	varchar(255)	int	date	int	int
1	田中 実	012-345-6789	30	1994-02-01	3	1
2	鈴木 茂	090-1122-3344	37	1987-08-12	3	4
3	鈴木 実	080-5566-7788	24	2000-12-24	2	5
4	佐藤 清	012-0987-6543	19	2005-08-01	1	5
5	高橋 清	090-9900-1234	24	2000-12-24	3	5

department	
departmentID	departmentName
int	varchar(255)
1	開発部
2	営業部
3	総務部

station	
stationID	stationName
int	varchar(255)
1	九段下
2	永田町
3	渋谷
4	神保町
5	上井草
*/
