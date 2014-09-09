SELECT MIN(e.Salary) AS [Min Salary],d.Name AS Department,e.JobTitle as [Job Title],MAX(e.FirstName + ' ' + e.LastName) AS [Name]
FROM Employees e
 JOIN Departments d
	ON e.DepartmentID = d.DepartmentID
GROUP BY d.Name,e.JobTitle