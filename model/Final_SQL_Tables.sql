DROP DATABASE IF EXISTS musiclydb;
CREATE DATABASE `musiclydb`; 

USE musiclydb;

CREATE TABLE Users (
	User_Id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	Username TINYTEXT NOT NULL,
	User_Email TINYTEXT NOT NULL,
	User_Pwd LONGTEXT NOT NULL
);

CREATE TABLE SongRating (
	Song_RatingID INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	Song_Rating INT(11) NOT NULL,
	Song_Id INT(11) REFERENCES Songs(Song_Id)
);

CREATE TABLE Songs (
	Song_Id INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	Song_Name VARCHAR(255) NOT NULL,
	Song_Artist VARCHAR(255) NOT NULL,
	Song_Genre VARCHAR(255) NOT NULL,
	File_Name VARCHAR(255) NOT NULL	
);

-- create the users and grant priveleges to those users
GRANT SELECT, INSERT, DELETE, UPDATE
ON musiclydb.*
TO mgs_user@localhost
IDENTIFIED BY 'pa55word';


