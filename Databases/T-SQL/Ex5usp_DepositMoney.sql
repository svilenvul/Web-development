CREATE PROCEDURE usp_DepositMoney (
	@AccountID int = 0,
	@money float = 0
	)
AS
	
	BEGIN TRANSACTION

	DECLARE @newBalance float 
	DECLARE @oldBalance float 

	SELECT @oldBalance = Balance 
	FROM Accounts
	WHERE AccountID =  @AccountID

	SET @newBalance = @oldBalance + @money
	IF @newBalance < 0 
		BEGIN
			PRINT 'Cannot commit transaction.There are not enouhg money'
		END
	ELSE 
		BEGIN
			UPDATE Accounts 
			SET Balance =  @newBalance	
			WHERE AccountID =  @AccountID
		END

	COMMIT TRANSACTION
GO

EXEC usp_DepositMoney @AccountID = 3, @money = 12000