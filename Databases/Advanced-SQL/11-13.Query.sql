SELECT m.FirstName [First Name], m.LastName [Last Name]
FROM Employees m
	JOIN Employees e
		ON e.ManagerID = m.EmployeeID
GROUP BY m.FirstName,m.LastName
HAVING COUNT (m.LastName) = 5

SELECT e.FirstName [First Name], e.LastName [Last Name],ISNULL(m.FirstName + ' '+ m.LastName,'no manager') as Manager
FROM Employees e
	LEFT OUTER JOIN Employees m
		ON e.ManagerID = m.EmployeeID

SELECT FirstName, LastName 
FROM Employees
WHERE LEN(LastName) = 5