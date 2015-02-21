<?php

class User {
	protected $username;
	protected $fname;
	protected $lname;
	protected $email;
	protected $age;
	protected $profilePicture;
	protected $sex;
	protected $pass;
	protected $secquestion;
	protected $secanswer;
	protected $cars; 
	
	
	public function __construct($username,$fname,$lname,$email,$age,$sex,$pass,$secquestion,$secanswer) {
		$this->username = $username;
		$this->fname = $fname;
		$this->lname = $lname;
		$this->email = $email;
		$this->age = $age;
		$this->profilePicture = new Imagick();
		$this->sex = $sex;
		$this->pass = $pass;
		$this->secquestion = $secquestion;
		$this->secanswer = $secanswer;
		$this->cars = array();
	}
	public function getUserName() {
		return $this->username;
	}
	
	public function setUserName($value) {
		$this->username = $value;
	}
	
	public function getFname() {
		return $this->fname;
	}
	
	public function setFname($value) {
		$this->fname = $value;
	}
	
	public function getLname() {
		return $this->lname;
	}
	
	public function setLname ($value) {
		$this->lname = $value;
	}
	
	public function getEmail() {
		return $this->email;
	}
	
	public function setEmail ($value) {
		$this->email = $value;
	}
	
	public function getAge() {
		return $this->age;
	}
	
	public function setAge($value){
		$this->age = $value;
	}
	
	public function getPass() {
		return $this->pass;
	}
	
	public function setPass($value) {
		$this->pass = $value;
	}
	
	public function getSecquestion() {
		return $this->secquestion;
	}
	
	public function setSecquestion($value) {
		$this->secquestion = $value;
	}
	
	public function getSecanswer() {
		return $this->secanswer;
	}
	
	public function setSecanswer($value) {
		$this->secanswer = $value;
	}
	public function getPicture() {
		return $this->profilePicture;
	}
	
	public function setPicture($value) {
		$this->profilePicture = $value;
	}
	
	public function getSex() {
		return $this->sex;
	}
	
	public function setSex($value) {
		$this->sex = $value;
	}

	
	protected function addPicture($url) {
		
	}	

	public function add() {
		try {
			$dbh = new PDO("mysql:host=localhost:3306;dbname=OOP;", "root", "");
			$sql = "INSERT INTO Users(UserName,FirstName,FamilyName,
					Email,Age,Picture,Sex,Password,Question,Answer) 
					VALUES(:username,:fname,:lname,:email,:age,:picture,
					:sex,:pass,:secquestion,:secanswer)";
			$statement = $dbh->prepare($sql);
		
			$username = $this->getUserName();
			$fname = $this->getFname();
			$lname = $this->getLname();
			$email = $this->getEmail();
			$age = $this->getAge();
			$picture = $this->getPicture();
			$sex = $this->getSex();
			$pass = $this->getPass();
			$question = $this->getSecquestion();
			$answer = $this->getSecanswer();
			
			$statement->bindParam(":username", $username,PDO::PARAM_STR);
			$statement->bindParam(":fname", $fname, PDO::PARAM_STR);
			$statement->bindParam(":lname", $lname,PDO::PARAM_STR);
			$statement->bindParam(":email", $email, PDO::PARAM_STR);
			$statement->bindParam(":age", $age,PDO::PARAM_INT);
			$statement->bindParam(":picture", $picture, PDO::PARAM_STR);
			$statement->bindParam(":sex", $sex,PDO::PARAM_STR);
			$statement->bindParam(":pass", $pass, PDO::PARAM_STR);
			$statement->bindParam(":secquestion", $question,PDO::PARAM_STR);
			$statement->bindParam(":secanswer", $answer, PDO::PARAM_STR);
			
			$statement->execute();			
			
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	
	public static function getUser($name) {
		try {
			$dbh = new PDO("mysql:host=localhost:3306;dbname=OOP;", "root", "");
			$sql = "SELECT * FROM Users WHERE UserName = :username";
			$statement = $dbh->prepare($sql);
			$statement->bindParam(":username", $name,PDO::PARAM_STR);
			$statement->execute();
			$result = $statement->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}