BEGIN TRANSACTION

SELECT EmployeeID, ProjectID INTO #temp 
FROM   EmployeesProjects
GO
DROP TABLE EmployeesProjects
GO
SELECT EmployeeID, ProjectID INTO EmployeesProjects 
FROM   #temp 


COMMIT TRANSACTION 