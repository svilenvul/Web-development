ALTER PROCEDURE usp_GiveInterestToPersonAccount (
	@AccountID int = 0,
	@interestRate float = 1.10
	)
AS
	
	BEGIN TRANSACTION

	DECLARE @newBalance float 
	DECLARE @oldBalance float 

	SELECT @oldBalance = Balance 
	FROM Accounts
	WHERE AccountID =  @AccountID

	EXEC @newBalance = uf_calculateSum @amount = @oldBalance, @numberOfMonths = 1, @interestRate = @interestRate
	
	UPDATE Accounts 
	SET Balance =  @newBalance	
	WHERE AccountID =  @AccountID

	COMMIT TRANSACTION
GO

EXEC usp_GiveInterestToPersonAccount @AccountID = 3