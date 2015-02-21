CREATE database OOP;

USE OOP;

CREATE TABLE Users(
UserName varchar(30) NOT NULL PRIMARY KEY,
FirstName varchar(30) NOT NULL,
FamilyName varchar(30) NOT NULL,
Email varchar(255) NOT NULL,
Age INTEGER NOT NULL,
Picture varchar(255) NOT NULL,
Sex varchar(10) NOT NULL,
Password char(60) NOT NULL,
Question varchar(60) NOT NULL,
Answer varchar(30) NOT NULL
);

CREATE TABLE Workmans(
UserName varchar(30) NOT NULL PRIMARY KEY,
Profession varchar(30) NOT NULL,
Payment INTEGER NOT NULL,
FOREIGN KEY (UserName)
	REFERENCES Users(UserName)
);

CREATE TABLE Commments(
CommentID INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
FromUser varchar(30) NOT NULL ,
ToUser varchar(30) NOT NULL,
Text varchar(500) NOT NULL,
Date date NOT NULL,
FOREIGN KEY (FromUser)
      REFERENCES Users(UserName),
FOREIGN KEY (ToUser)
      REFERENCES Workmans(UserName)
);

CREATE TABLE Answers(
AnswerID  INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
CommentID INTEGER NOT NULL,
FOREIGN KEY (CommentID)
      REFERENCES Commments(CommentID),
Text varchar(500) NOT NULL,
FromUser varchar(30) NOT NULL,
Date date NOT NULL
);

CREATE TABLE Cars(
CarID integer  NOT NULL PRIMARY key AUTO_INCREMENT,
Owner  varchar(30) NOT NULL,
FOREIGN KEY (Owner)
	REFERENCES Users(UserName),
Model varchar(30) NOT NULL,
Trademark  varchar(30) NOT NULL,
Year INTEGER NOT NULL ,
EngineSize INTEGER NOT NULL 
);