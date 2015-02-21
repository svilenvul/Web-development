<?php
class Workman extends User {
	protected $profession;
	protected $paymentPerHour;
	
	public function __construct($fname, $lname, $email, $age, $sex, $pass, $secquestion, $secanswer,$profession,$paymentPerHour) {
		parent::__construct($fname, $lname, $email, $age, $sex, $pass, $secquestion, $secanswer);
		$this->profession = $profession;
		$this->paymentPerHour = $paymentPerHour; 
	}
	
	public function getProfession() {
		return $this->getProfession();
	}
	
	public function setProfession($value) {
		$this->profession = $value;
	}
	
	public function getPaymentPerHour() {
		return $this->paymentPerHour;
	}
	
	public function setPaymentPerHour($value) {
		$this->paymentPerHour = $value;
	}
	
	public function add() {
		try {
			$dbh = new PDO("mysql:host=localhost:3306;dbname=OOP;", "root", "");
			$sql = "INSERT INTO Workamns(UserName,FirstName,LastName,
					Email,Age,Picture,Sex,Password,Question,Answer,Profession,Payment)
					VALUES(:username,:fname,:lname,:email,:age,:picture,
					:sex,:pass,:secquestion,:secanswer,:profession,:payment)";
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
			$profession = $this->getProfession();
			$payment = $this->getPaymentPerHour();
			
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
			$statement->bindParam(":profession", $profession, PDO::PARAM_STR);
			$statement->bindParam(":payment", $payment, PDO::PARAM_STR);
				
			$statement->execute();
				
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	
	public static function getWorkman($name) {
		try {
			$dbh = new PDO("mysql:host=localhost:3306;dbname=OOP;", "root", "");
			$sql = "SELECT";
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	
	public static function searchWorkman($userName,$profession) {
		try {
			$dbh = new PDO("mysql:host=localhost:3306;dbname=OOP;", "root", "");
			$sql = "SELECT * FROM Workmans WHERE FirstName LIKE :name OR FamilyName LIKE :name OR Profession = :profession";
			$statement = $dbh->prepare($sql);
	
			$name = "%{$userName}%";
	
			$statement->bindParam(":name", $name,PDO::PARAM_STR);
			$statement->bindParam(":profession", $profession, PDO::PARAM_STR);
	
			$statement->execute();
				
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	
}