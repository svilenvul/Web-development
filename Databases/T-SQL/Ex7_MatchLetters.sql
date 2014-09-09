USE ChapterFiveTelerikAcademy

GO

ALTER FUNCTION udf_FindAllNamesAndTownsWithLetters (
@letters  nvarchar(100) = '')
RETURNS  @words TABLE (
	Id int PRIMARY KEY IDENTITY,
	Word nvarchar(50) NOT NULL
)
AS
BEGIN
DECLARE @strIndex int = 1,
	 @strLen int = 0,
	 @currLetter nchar(1),
	 @wordIndex int = 1,
	 @wordsLen int= 0,
	 @currWord nvarchar(50),
	 @containsAll bit ;
	 

INSERT INTO @words(Word)
SELECT FirstName
FROM Employees
UNION
SELECT LastName
FROM Employees
UNION 
SELECT Name 
FROM Towns

SELECT @wordsLen = COUNT(Id)
FROM @words

WHILE(@wordIndex <= @wordsLen)
	BEGIN
		SELECT @currWord= Word FROM @words WHERE Id = @wordIndex
		SET @strLen = LEN(@currWord)
		SET @containsAll = 1;
		
		SET @strIndex = 1;
				
		WHILE (@strIndex <= @strLen)
			BEGIN
				SET @currLetter = SUBSTRING(@currWord,@strIndex,1);
				SET @strIndex = @strIndex + 1;
				IF (CHARINDEX(@currLetter,@letters)=0)
					BEGIN
						SET @containsAll = 0;
						BREAK;
					END			
			END

		IF (@containsAll  = 0)
			BEGIN
				DELETE FROM @words WHERE Id = @wordIndex
			END

		SET @wordIndex = @wordIndex + 1;	
	END
	RETURN
END

GO

SELECT * FROM udf_FindAllNamesAndTownsWithLetters('a');
SELECT * FROM udf_FindAllNamesAndTownsWithLetters ( 'oistmiahf')