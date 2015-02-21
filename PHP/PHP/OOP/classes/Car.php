<?php
class Car {
	private $model;
	private $productionYear;
	private $trademark;
	private $engineSize;
	
	function __construct ($model,$productionYear,$trademark,$engineSize) {
		$this->model = $model;
		$this->productionYear = $productionYear;
		$this->trademark = $trademark;
		$this->engineSize = $engineSize;
	}
	
	public function getModel() {
		return $this->model;
	}
	
	public function setModel($value) {
		$this->model = $value;
	}
	
	public function getProductionYear () {
		return $this->productionYear;
	}
	
	public function setProductionYear ($value) {
		$this->productionYear = $value;
	}
	
	public function getTrademark (){
		return $this->trademark;
	}
	
	public function  setTrademark ($value) {
		$this->trademark = $value;
	}
	
	public function getEngineSize() {
		return $this->engineSize;
	}
	
	public function setEngineSize($value) {
		$this->engineSize = $value;
	}
	public function add($user){
		try {
			$dbh = new PDO("mysql:host=localhost:3306;dbname=OOP;", "root","");
			
			$sql = "INSERT into Cars (Owner,Model,Trademark,Year,EngineSize) values (:owner,:model,:trademark,:productionYear,:engineSize)";
			$statement = $dbh->prepare($sql);

			$owner = $user->getUserName();
			$model = $this->getModel();
			$productionYear = $this->getProductionYear();
			$trademark = $this->getTrademark();
			$engineSize = $this->getEngineSize();
			
			$statement->bindParam(":model", $model, PDO::PARAM_STR);
			$statement->bindParam(":productionYear", $productionYear, PDO::PARAM_STR);
			$statement->bindColumn(":trademark", $trademark, PDO::PARAM_STR);
			$statement->bindParam(":engineSize", $engineSize, PDO::PARAM_INT);
			$statement->bindParam(":owner", $owner, PDO::PARAM_STR);
			
			$statement->execute();
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	
	public static function remove($carID){
		try {
			$dbh = new PDO("mysql:host=localhost:3306;dbname=OOP;", "root","");
			
			$sql = "DELETE * FROM Cars WHERE CarID = :id";
			$stament = $dbh->prepare($sql);
			
			$stament->bindParam(":id",$carID,PDO::PARAM_STR);
			
			$stament->execute();
		}catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	
	public static function selectAll($owner){
		try {
			$dbh = new PDO("mysql:host=localhost:3306;dbname=OOP;", "root","");
				
			$sql = "SELECT * FROM Cars WHERE Owner = :owner";
			$stament = $dbh->prepare($sql);
				
			$stament->bindParam(":owner",$owner,PDO::PARAM_STR);
				
			$stament->execute();
			$result = $stament->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}catch (PDOException $e) {
			echo $e->getMessage();
		}	
	}
}
?>