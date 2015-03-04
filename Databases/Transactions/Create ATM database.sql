CREATE DATABASE DT16TransactionsATM 

USE DT16TransactionsATM

CREATE TABLE CardAccounts (
Id INTEGER PRIMARY KEY IDENTITY,
CardNumber char(10)  NOT NULL UNIQUE,
CardPIN char(4) NOT NULL,
CardCash money NOT NULL)

INSERT INTO CardAccounts VALUES 
('1234567890','4587',250),
('9876543210','4787',4570),
('4567879123','1240',4571)