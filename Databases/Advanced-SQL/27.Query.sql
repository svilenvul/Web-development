SELECT TOP 1 t.Name as [Town with max employees],COUNT(a.AddressID) AS Employees
FROM Addresses a 
	JOIN Towns t
		ON a.TownID =t.TownID
GROUP BY t.Name
ORDER BY COUNT(a.AddressID) DESC


