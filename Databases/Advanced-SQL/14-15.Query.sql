SELECT FORMAT(SYSDATETIME(), 'yyyy.MM.dd HH:mm:ss:fffffff') AS [Date]

CREATE  TABLE Users (
	UserID int IDENTITY, 
	UserName nvarchar(50) NOT NULL,
	UserPass nvarchar(50) NOT NULL,
	FullName nvarchar(30) NOT NULL,
	LoginTime datetime NOT NULL
	CONSTRAINT PK_UserID PRIMARY KEY(UserID),
	CONSTRAINT UK_UserName UNIQUE (UserName),
	CONSTRAINT CK_UserPass CHECK (LEN(UserPass)>5)
)

