SELECT t.Name AS Town,COUNT(e.FirstName) AS [Number of managers]
FROM Employees e
	JOIN Addresses a
		ON e.AddressID = a.AddressID
	JOIN Towns t
		ON a.TownID = t.TownID
WHERE e.EmployeeID IN (
	SELECT e.ManagerID
	FROM Employees e)
GROUP BY t.Name
ORDER BY COUNT(e.FirstName) DESC