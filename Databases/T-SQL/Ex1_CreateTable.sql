CREATE TABLE Persons(
	PersonID int PRIMARY KEY IDENTITY,
	FirstName nvarchar(20) NOT NULL,
	LastName nvarchar(20) NOT NULL,
	SSN int 
)

CREATE TABLE Accounts(
	AccountID int PRIMARY KEY IDENTITY,
	PersonID INT,
	Balance INT,
	CONSTRAINT FK_Persons_Accounts FOREIGN KEY (PersonID)
		REFERENCES Persons(PersonID)
)

INSERT INTO Persons VALUES 
('Svilen','Valkanov','2345153'),
('Pavel','Valkanov','6548741'),
('Kremena','Valkanova','4757894')


INSERT INTO Accounts VALUES 
('1','2453'),
('2','5457'),
('3','487515')

GO

CREATE PROCEDURE usp_SelectFullNameOfPersons 
AS
	SELECT FirstName + ' ' + LastName
	FROM Persons
GO