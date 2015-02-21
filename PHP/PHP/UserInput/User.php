<?php
	class User {
		private $name;
		private $pass;
		private $question;
		private $answer;
		private $email;
		private $fname;
		private $lname;
		private $sex;
		private $birthday;
		private $picture;		
		
		const PATH = "users.txt";
		const DBNAME = "UserInput";
		const USER = "root";
		const PASS = "";
		
		public function __construct($name,$pass,$question,$answer,$email,$fname,$lname,$sex,$birthday,$picture) {
			$this->name = $name;
			$this->pass = $pass;
			$this->question = $question;
			$this->answer = $answer;
			$this->email = $email;
			$this->fname = $fname;
			$this->lname = $lname;
			$this->sex = $sex;
			$this->birthday = $birthday;
			$this->picture = $picture;
		}
		
		public function __sleep () {
			return array (
				'name','pass','question','answer','email',
				'fname','lname','sex','birthday'
			);
		}	
		
		public function getName() {
			return $this->name;
		}
		
		public function setName($value) {
			return $this->name = $value;
		}
		
		public function getPass() {
			return $this->pass;
		}
		
		public function setPass($value) {
			$this->pass = $value;
		} 
		
		public function getQuestion() {
			return $this->question;
		}
		
		public function setQuestion ($value) {
			$this->question = $value;
		}
		
		public function getAnswer() {
			return $this->answer;
		}
		
		public function setAnswer($value) {
			$this->answer = $value;
		}
		
		public function getEmail() {
			return $this->email;
		}
		
		public function setEmail($value){
			$this->email = $value;
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
		
		public function setLname($value) {
			$this->lname = $value;
		}
		
		public function getSex() {
			return $this->sex;
		}
		
		public function setSex($value) {
			$this->sex = $value;
		}
		
		public function getBirthday() {
			return $this->birthday;
		}
		
		public function setBirthday($value) {
			$this->birthday = $value;
		}
		public function getPicture() {
			return $this->picture;
		}
		
		public function setPicture($value) {
			$this->picture = $value;
		}
		
		public static function compare($a, $b)
		{
			if ($a->name < $b->name) return -1;
			else if($a->name == $b->name) return 0;
			else return 1;
		}
		public function __wakeup () {
		
		}
		public static function updateUser($user) {
			try {
				$dbh = new PDO("mysql:host=localhost:3306;dbname=UserInput;", self::USER, self::PASS);
				$dbh->beginTransaction();
				$sql = "UPDATE Users SET Pass = :pass,
						Question = :question,
						Answer = :answer,
						Email = :email,
						Fname = :fname,
						Lname = :lname,
						Sex = :sex,
						Birthday = :birthday,
						Picture = :pic
					WHERE Name = :name";
				
				$statement = $dbh->prepare($sql);
				
				$name =$user->getName();
				$pass = $user->getPass();
				$question = $user->getQuestion();
				$answer = $user->getAnswer();
				$email = $user->getEmail();
				$fname = $user->getFname();
				$lname = $user->getLname();
				$sex = $user->getSex();
				$birthday = $user->getBirthday();
				$pic = basename($user->getPicture());			
				
				$statement->bindParam(":pass", $pass,PDO::PARAM_STR);
				$statement->bindParam(":question", $question,PDO::PARAM_STR);
				$statement->bindParam(":answer", $answer,PDO::PARAM_STR);
				$statement->bindParam(":email", $email,PDO::PARAM_STR);
				$statement->bindParam(":fname", $fname,PDO::PARAM_STR);
				$statement->bindParam(":lname", $lname,PDO::PARAM_STR);
				$statement->bindParam(":sex", $sex,PDO::PARAM_STR);
				$statement->bindParam(":birthday", $birthday,PDO::PARAM_STR);
				$statement->bindParam(":pic", $pic,PDO::PARAM_STR);
				$statement->bindParam(":name", $name,PDO::PARAM_STR);				
					
				$statement->execute();				
				
				if(!$user->uploadImage()) {
					throw new PDOException("Error uploading file");
				}
				$dbh->commit();
				if($statement->rowCount()===0) {
					echo "update failed";
				}
			} catch (PDOException $e) {
				$dbh->rollBack();
				echo $e->getMessage();
			}
			
		}
		
		public static function searchUsers($username) {
			try {
				$dbh = new PDO("mysql:host=localhost:3306;dbname=UserInput;", self::USER, self::PASS);
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
			$param = "%$username%";
			$sql = "select * from users where name like :name";
			$statement = $dbh->prepare($sql);
			$statement->bindParam(":name",$param,PDO::PARAM_STR);
			
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}		
		
		public static function getUser($username) {
			try {
				$dbh = new PDO("mysql:host=localhost:3306;dbname=UserInput;", self::USER, self::PASS);
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
			$sql = "SELECT * FROM Users WHERE Name = :name";
			$statement = $dbh->prepare($sql);
			$statement->bindParam(":name", $username);
			$statement->execute();
			$result = $statement->fetch(PDO::FETCH_ASSOC);
			return $result;
		}
		public static function addUser ($newUser) {				
			try {
				$dbh = new PDO("mysql:host=localhost:3306;dbname=UserInput;", self::USER, self::PASS);
				
				$dbh->beginTransaction();
				
				$sql = "INSERT Into Users (Name,Pass,Question,Answer,Email,
						Fname,Lname,Sex,Birthday,Picture)
					VALUES(:name,:pass,:question,:answer,:email,:fname,:lname,:sex,:birthday,:picture)";
				$statement = $dbh->prepare($sql);
				$name = $newUser->getName();
				$pass = $newUser->getPass();
				$question = $newUser->getQuestion();
				$answer = $newUser->getAnswer();
				$email = $newUser->getEmail();
				$fname = $newUser->getFname();
				$lname = $newUser->getLname();
				$sex = $newUser->getSex();
				$birtday = $newUser->getBirthday();
				$picture = basename($newUser->getPicture());
				
				$statement->bindParam(":name", $name,PDO::PARAM_STR);
				$statement->bindParam(":pass", $pass,PDO::PARAM_STR);
				$statement->bindParam(":question", $question,PDO::PARAM_STR);
				$statement->bindParam(":answer", $answer,PDO::PARAM_STR);
				$statement->bindParam(":email", $email,PDO::PARAM_STR);
				$statement->bindParam(":fname", $fname,PDO::PARAM_STR);
				$statement->bindParam(":lname", $lname,PDO::PARAM_STR);
				$statement->bindParam(":sex", $sex,PDO::PARAM_STR);
				$statement->bindParam(":birthday", $birtday,PDO::PARAM_STR);
				$statement->bindParam(":picture", $picture,PDO::PARAM_STR);
				
				if(!$newUser->uploadImage()) {
					throw new PDOException("Error uploading file");
				} 
				$statement->execute();
				$dbh->commit();
			} catch (PDOException $e) {
				$dbh->rollBack();
				echo $e->getMessage();
			}
			
		}
		private function uploadImage () {
			$inFile = $this->getPicture();
			$fileName = basename($inFile);
			$outFile = "uploads/{$fileName}";
			if(!file_exists($outFile)) {
				$image = file_get_contents($inFile);
				file_put_contents($outFile,$image);
			}			
			return true;
		}
	}
	
?>