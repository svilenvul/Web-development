
CREATE TABLE WorkHours (
	TaksID int PRIMARY KEY IDENTITY,
	EmployeeID int NOT NULL,
	WorkDate DateTime NOT NULL,
	Task nvarchar(50) NOT NULL,
	WorkHours int NOT NULL,
	Comments nvarchar(50) NULL,
	CONSTRAINT FK_Employees_WorkHours FOREIGN KEY (EmployeeID) REFERENCES Employees(EmployeeID)
)
GO
INSERT INTO WorkHours VALUES('12',SYSDATETIME(),'Team Building',5,NULL);
INSERT INTO WorkHours VALUES('23',SYSDATETIME(),'Team Building',7,NULL);
INSERT INTO WorkHours VALUES('42',SYSDATETIME(),'Team Building',3,NULL);
GO
UPDATE WorkHours SET Task ='Preparing Documentation' WHERE EmployeeID = 23;
UPDATE WorkHours SET Task ='Talking with customers' WHERE EmployeeID = 42;
GO
DELETE FROM WorkHours WHERE EmployeeID = 12;
