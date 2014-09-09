SELECT COUNT (ManagerID)
FROM Employees

SELECT COUNT(*) - COUNT (ManagerID)
FROM Employees

SELECT d.Name AS [Dep Name], AVG(e.Salary) AS AvgSalary
FROM Employees e
	JOIN Departments d
		ON e.DepartmentID = d.DepartmentID
GROUP BY d.Name

SELECT d.Name AS [Department],t.Name AS [Town],COUNT(e.EmployeeID) AS Employees
FROM Employees e
	JOIN Departments d
		ON e.DepartmentID = d.DepartmentID
	JOIN Addresses a
		ON e.AddressID = a.AddressID
	JOIN Towns t
		ON a.TownID = t.TownID
GROUP BY t.Name,d.Name

