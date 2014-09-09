ALTER PROCEDURE usp_CreateListWithEmployeesInEachTown 
AS
	Select t.Name AS Town, e.FirstName + ' ' + e.LastName AS Name INTO #sortedList
	FROM Employees e
		JOIN Addresses a 
			ON e.AddressID = a.AddressID
		JOIN Towns t 
			ON  a.TownID = t.TownID
	GROUP BY t.Name , e.FirstName + ' ' + e.LastName


	Declare @lastTownName  nvarchar(50),@townName nvarchar(50),@name nvarchar(50), @listStr  nvarchar(50)
	CREATE TABLE #result (
		Town nvarchar(50),
		Employees nvarchar(MAX)
	)

	SET @lastTownName = '';
	SET @listStr  = '';


	While (Select Count(*) From #sortedList) > 0
	Begin
	
		Select Top 1 @townName = Town, @name = Name  From #sortedList

		IF(@townName != @lastTownName)
			BEGIN
				IF (@listStr !='')
					BEGIN
						INSERT INTO #result VALUES (@lastTownName,@listStr);
					END
				SET @lastTownName = @townName;				
				SET @listStr = @name;
				CONTINUE; 				
			END
		SET @listStr = COALESCE(@listStr + ',' ,'') +  @name

		DELETE TOP (1)
		FROM   #sortedList
	End

	SELECT * FROM #result	
GO

EXEC usp_CreateListWithEmployeesInEachTown