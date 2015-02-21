<?php
class Comment{
	private $commentID;
	private $fromUser;
	private $toUser;
	private $text;
	private $date;
	
	function __construct ($fromUser,$toUser,$text) {
		$this->fromUser = $fromUser;
		$this->toUser = $toUse;
		$this->date = date('Y-m-d');
		$this->text = $text;
	}
	
	public function getFromUser() {
		return $this->fromUser;
	}
	
	public function setFromUser($value) {
		$this->fromUser = $value;
	}
	
	public function getToUser() {
		return $this->toUser;
	}
	
	public function setToUser($value) {
		$this->toUser = $value;
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
			$sql = "INSERT INTO Comments(FromUser,ToUser,Text,Date) Values(:fromUser,:toUser,:text,:date)";
			$statement = $dbh->prepare($sql);
			
			$toUser = $this->getToUser();
			$fromUser = $this->getUserName();
			$date = $this->getDate();
			$text = $this->getText();
			
			$statement->bindParam(":fromUser", $fromUser,PDO::PARAM_STR);
			$statement->bindParam(":toUser", $toUser, PDO::PARAM_STR);
			$statement->bindParam(":text", $text,PDO::PARAM_STR);
			$statement->bindParam(":date", $date,PDO::PARAM_STR);
			
			$statement->execute();
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	public static function getAll($name) {
		try {
			$dbh = new PDO("mysql:host=localhost:3306;dbname=OOP;", "root", "");
			$sql = "SELECT * FROM Comments WHERE ToUser = :name";
			$statement = $dbh->prepare($sql);
						
			$statement->bindParam(":name", $name,PDO::PARAM_INT);
							
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}
?>