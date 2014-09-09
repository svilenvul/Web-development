CREATE FUNCTION uf_calculateSum (
	@amount float = 0,
	@interestRate float = 1.15,
	@numberOfMonths int = 0	)
	RETURNS float
AS
BEGIN
	DECLARE  @interest float; 
	SET @interest = @amount*(POWER(@interestRate,(@numberOfMonths/12.0)))
	RETURN @interest
END

Go
DECLARE  @sum float; 

EXEC @sum = uf_calculateSum @amount = 1000, @numberOfMonths = 1
PRINT @sum;