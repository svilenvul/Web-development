SELECT MAX(t.Name) as [Town with max employees]
FROM Employees e  
	JOIN Addresses a
		ON e.AddressID = a.AddressID
	JOIN Towns t
		ON a.TownID = a.AddressID


