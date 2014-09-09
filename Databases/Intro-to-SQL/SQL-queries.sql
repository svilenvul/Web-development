--SELECT * FROM Departments;
--SELECT Name FROM Departments;
--SELECT Salary FROM Employees;

--SELECT FirstName  + ' ' + IsNull(MiddleName,'') + ' ' + LastName 
--AS FullName FROM Employees


--SELECT FirstName  + '.' + LastName  + '@telerik.com '
--AS 'Full Email Adresses' FROM Employees

--SELECT DISTINCT Salary FROM Employees;

--SELECT * FROM Employees
--WHERE JobTitlE = 'Sales Representative';

--SELECT FirstName  + ' ' + IsNull(MiddleName,'') + ' ' + LastName 
--AS FullName FROM Employees
--WHERE FirstName LIKE 'SA%'

--SELECT FirstName  + ' ' + IsNull(MiddleName,'') + ' ' + LastName 
--AS FullName FROM Employees
--WHERE LastName LIKE '%ei%'

--SELECT Salary FROM Employees
--WHERE Salary BETWEEN 20000 AND 30000

--SELECT FirstName + ' ' + IsNull(MiddleName,'') + ' ' + LastName AS Names 
--FROM Employees
--WHERE Salary IN(25000,14000,12500,23600)

--SELECT FirstName + ' ' + IsNull(MiddleName,'') + ' ' + LastName AS EmplyeesWithoutManager 
--FROM Employees
--WHERE ManagerID IS NULL;

--SELECT FirstName + ' ' + IsNull(MiddleName,'') + ' ' + LastName AS Name
--FROM Employees
--WHERE Salary > 50000
--ORDER BY Salary DESC

--SELECT TOP 5 FirstName + ' ' + IsNull(MiddleName,'') + ' ' + LastName AS Top_5_By_Salary
--FROM Employees
--ORDER BY Salary

--SELECT e.FirstName + ' ' + IsNull(e.MiddleName,'') + ' ' + e.LastName Name, a.AddressText adress
--FROM Employees e
	--JOIN Addresses a
		--ON e.AddressID = a.AddressID;

--SELECT e.FirstName + ' ' + IsNull(e.MiddleName,'') + ' ' + e.LastName Name, a.AddressText adress
--FROM Employees e, Addresses a
--WHERE e.AddressID = a.AddressID;

--SELECT e.FirstName + ' ' + IsNull(e.MiddleName,'') + ' ' + e.LastName Name, m.FirstName + ' ' + IsNull(m.MiddleName,'') + ' ' + m.LastName ManagerName
--FROM Employees e
	--JOIN Employees m
		--ON e.ManagerID = m.EmployeeID;

--SELECT e.FirstName + ' ' + IsNull(e.MiddleName,'') + ' ' + e.LastName Name, m.FirstName + ' ' + IsNull(m.MiddleName,'') + ' ' + m.LastName ManagerName,a.AddressText adress
--FROM Employees e
	--JOIN Employees m
		--ON e.ManagerID = m.EmployeeID
	--JOIN Addresses a
		--ON e.AddressID = a.AddressID;

--SELECT Name
--FROM Departments
--UNION
--SELECT Name
--FROM Towns 

--SELECT e.FirstName + ' ' + IsNull(e.MiddleName,'') + ' ' + e.LastName Name, m.FirstName + ' ' + IsNull(m.MiddleName,'') + ' ' + m.LastName ManagerName
--FROM Employees e
	--LEFT OUTER JOIN Employees m
		--ON e.ManagerID = m.EmployeeID;

--SELECT e.FirstName + ' ' + IsNull(e.MiddleName,'') + ' ' + e.LastName Name, m.FirstName + ' ' + IsNull(m.MiddleName,'') + ' ' + m.LastName ManagerName
--FROM Employees m
	--RIGHT OUTER JOIN Employees e
		--ON e.ManagerID = m.EmployeeID;

--SELECT e.FirstName + ' ' + IsNull(e.MiddleName,'') + ' ' + e.LastName Name,d.Name DepartmentName, e.HireDate HireDate
--FROM Employees e
	--JOIN Departments d
		--ON e.DepartmentID = d.DepartmentID
--WHERE d.Name IN('Sales','Finance') 
--AND e.HireDate BETWEEN '1995' AND '2005';