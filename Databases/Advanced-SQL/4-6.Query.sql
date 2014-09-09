SELECT AVG (Salary) AS [Average Salary for Dep 1]
FROM Employees e
WHERE e.DepartmentId = '1';

SELECT AVG (Salary) AS [Average Salary for Dep Sales]
FROM Employees e, Departments d
WHERE e.DepartmentID = d.DepartmentID AND d.Name = 'Sales';

SELECT COUNT (*) AS [Number if Emnloyees in Sales Dep]
FROM Employees e, Departments d
WHERE e.DepartmentID = d.DepartmentID AND d.Name = 'Sales';