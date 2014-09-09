CREATE TABLE Logs (
	LogID int PRIMARY KEY IDENTITY,
	AccountID int NOT NULL,
	OldSum float,
	NewSum float,
	CONSTRAINT FK_Accounts_Logs FOREIGN KEY (AccountID) REFERENCES Accounts(AccountID)
)
GO

ALTER TRIGGER tr_LogUpdate ON Accounts FOR UPDATE 
AS
	IF UPDATE(Balance)
	BEGIN
	DECLARE @AccountID int,
		@OldSum float,
		@NewSum float

	SELECT @AccountID = i.AccountID ,
		@NewSum  = i.Balance,
		@OldSum = d.Balance
	FROM inserted i 
		JOIN deleted d
			ON i.AccountID = d.AccountID

	INSERT INTO Logs Values(@AccountID,@OldSum,@NewSum);
	END
GO

