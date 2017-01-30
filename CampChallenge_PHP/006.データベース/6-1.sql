
CREATE TABLE profiles(profilesID int, name varchar(255), tell varchar(255), age int, birthday date);

INSERT INTO profiles VALUES(1, '田中　実', '012-345-6789', 30, 1994-02-01);
INSERT INTO profiles VALUES(2, '鈴木　茂', '090-1122-3344', 37, 1987-08-12),(3, '鈴木　実', '080-5566-7788', 24, 2000-12-24),(4, '佐藤　清', '012-0987-6543', 19, 2005-08-01)
INSERT INTO profiles VALUES(5, '高橋　清', '090-9900-1234', 24, 2000-12-24);

/*↑でbirthdayを''で囲わず直接書いてしまったため*/
UPDATE profiles SET birthday='1994-02-01' WHERE profilesID=1;
UPDATE profiles SET birthday='1987-08-12' WHERE profilesID=2;
UPDATE profiles SET birthday='2000-12-24' WHERE profilesID=3;
UPDATE profiles SET birthday='2005-08-01' WHERE profilesID=4;
UPDATE profiles SET birthday='2000-12-24' WHERE profilesID=5;

SELECT * FROM profiles;

SELECT * FROM profiles WHERE profilesID=3;

SELECT * FROM profiles WHERE name='高橋　清';

SELECT * FROM profiles WHERE age=24;

SELECT * FROM profiles WHERE name LIKE '%実%';

UPDATE profiles SET name='吉田　茂' WHERE profilesID=2;
SELECT * FROM profiles WHERE profilesID=2;

DELETE FROM profiles WHERE birthday='2000-12-24';
SELECT * FROM profiles;


