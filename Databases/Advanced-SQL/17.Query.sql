CREATE TABLE Groups (
	GroupID int IDENTITY,
	Name varchar(20) NOT NULL,
	CONSTRAINT UK_Name UNIQUE(Name)
)