SELECT FirstName + '' + ISNULL(MiddleName,'') + '' + LastName AS Name
FROM Employees
WHERE Salary = (
	SELECT MIN(Salary)
	FROM Employees
)

SELECT FirstName + '' + ISNULL(MiddleName,'') + '' + LastName AS Name, Salary
FROM Employees
WHERE Salary < (
	SELECT MIN(Salary)*1.1
	FROM Employees
)
ORDER BY Salary

SELECT e.FirstName + '' + ISNULL(e.MiddleName,'') + '' + e.LastName AS Name, e.Salary AS Salary, d.Name AS Department
FROM Employees e, Departments d
	WHERE e.DepartmentID = d.DepartmentID
	AND SALARY = (
		SELECT  MIN(e.Salary)
		FROM Employees e
		WHERE d.DepartmentID = e.DepartmentID)
	ORDER BY Department
