BEGIN TRANSACTION

ALTER TABLE Employees
DROP CONSTRAINT FK_Employees_Addresses
ALTER TABLE Employees
ADD CONSTRAINT FK_Employees_Addresses
	foreign key (AddressID)
   references Addresses(AddressID)
   on delete cascade;
ALTER TABLE Employees
DROP CONSTRAINT FK_Employees_Departments
ALTER TABLE Employees
ADD CONSTRAINT FK_Employees_Departments
	foreign key (DepartmentID)
   references Departments(DepartmentID)
   on delete cascade;
ALTER TABLE Employees
DROP CONSTRAINT FK_Employees_Employees
ALTER TABLE Employees
ADD CONSTRAINT FK_Employees_Employees
	foreign key (ManagerID)
   references Employees(EmployeeID)
   on delete NO ACTION;
ALTER TABLE Departments
DROP CONSTRAINT FK_Departments_Employees

DELETE FROM Employees
WHERE DepartmentID = 3;

ROLLBACK TRANSACTION