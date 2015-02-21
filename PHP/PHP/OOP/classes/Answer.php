<?php
class Answer {
	private $commentID;
	private $fromUser;
	private $text;
	private $date;
	
	function __construct ($fromUser,$commentID,$text) {
		$this->fromUser = $fromUser;
		$this->date = date('Y-m-d');
		$this->text = $text;
		$this->commentID = $commentID;
	}
	
	public function getFromUser() {
		return $this->fromUser;
	}
	
	public function setFromUser($value) {
		$this->fromUser = $value;
	}
	
	public function getCommentID() {
		return $this->$commentID;
	}
	
	public function setCommentID($value) {
		$this->$commentID = $value;
	}
	
	public function getDate() {
		return $this->date;
	}
	
	public function setDate($value) {
		$this->date = $value;
	}
	
	public function getText() {
		return $this->text;
	}
	
	public function setText($value) {
		$this->value = $value;
	}
	public function add() {
		try {
			$dbh = new PDO("mysql:host=localhost:3306;dbname=OOP;", "root", "");
			$sql = "INSERT INTO Answers(CommendID,Text,FromUser,Date) Values(:commentID,:text,:fromUser,:date)";
			$statement = $dbh->prepare($sql);
				
			$commentID = $this->getCommentID();
			$fromUser = $this->getFromUser();
			$date = $this->getDate();
			$text = $this->getText();
				
			$statement->bindParam(":fromUser", $fromUser,PDO::PARAM_STR);
			$statement->bindParam(":commentID", $commentID, PDO::PARAM_INT);
			$statement->bindParam(":text", $text,PDO::PARAM_STR);
			$statement->bindParam(":date", $date,PDO::PARAM_STR);
				
			$statement->execute();
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	
	public static function getAll($commentID) {
		try {
			$dbh = new PDO("mysql:host=localhost:3306;dbname=OOP;", "root", "");
			$sql = "SELECT * FROM Answers WHERE CommentID = :commendID";
			$statement = $dbh->prepare($sql);
		
			$statement->bindParam(":commentID", $commentID,PDO::PARAM_INT);
				
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}