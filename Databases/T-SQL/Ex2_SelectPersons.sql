USE ChapterSevenTSQLDatabase
GO
CREATE PROC usp_SelectPersonsWithMoreThan (@money int = 0)
AS
	SELECT p.FirstName + ' ' + p.LastName
	FROM Persons p
		JOIN Accounts a
			ON p.PersonID = a.PersonID 
	WHERE a.Balance >  @money
GO

EXEC usp_SelectPersonsWithMoreThan 500;
EXEC usp_SelectPersonsWithMoreThan 5000;
EXEC usp_SelectPersonsWithMoreThan 2000;