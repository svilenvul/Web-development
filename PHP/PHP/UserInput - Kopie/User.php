<?php
	class User {
		protected $name;
		protected $pass;
		protected $question;
		protected $answer;
		protected $email;
		protected $fname;
		protected $lname;
		protected $sex;
		protected $birthday;
		
		public function __construct($name,$pass,$question,$answer,$email,$fname,$lname,$sex,$birthday) {
			$this->name = $name;
			$this->pass = $pass;
			$this->question = $question;
			$this->answer = $answer;
			$this->email = $email;
			$this->fname = $fname;
			$this->lname = $lname;
			$this->sex = $sex;
			$this->birthday = $birthday;
		}
		
		public function getName() {
			return
		}
		public function __sleep () {
			return array (
				'name','pass','question','answer','email',
				'fname','lname','sex','birthday'
			);
		}	
		public static function compare($a, $b)
		{
			if ($a->name < $b->name) return -1;
			else if($a->name == $b->name) return 0;
			else return 1;
		}
		public function __wakeup () {
		
		}
		public static function searchUser($username,$PATH) {
			$lines = file($PATH);
			foreach($lines as $line_num=>$line) {
				$currentUser = unserialize($line);
				if($currentUser -> name === $username) {
					return $currentUser;
				}
			}
			return false;
		}
		
		public static function addUser ($newUser,$PATH) {				
			$content = file_get_contents($PATH);
			$userInfo = serialize($newUser);
			$content .= $userInfo."\n";
			file_put_contents(PATH,$content);
			return true;
		}
		
		public static function appendUser () {
			
		}
	}
?>