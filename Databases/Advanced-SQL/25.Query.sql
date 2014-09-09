SELECT AVG(e.Salary) AS [Average Salary],d.Name AS Department,e.JobTitle as [Job Title]
FROM Employees e
 JOIN Departments d
	ON e.DepartmentID = d.DepartmentID
GROUP BY d.Name,e.JobTitle