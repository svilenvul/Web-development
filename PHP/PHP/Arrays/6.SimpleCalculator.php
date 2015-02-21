<html>
<head>
</head>
<body>
<?php 
$result = "";
if(isset($_REQUEST["calculate"])) {
	$operator = $_REQUEST["operator"];
	$first_number;
	$second_number;	
	
	if(isset($_REQUEST["first_number"]) && isset($_REQUEST["second_number"])) {
		$first_number = $_REQUEST["first_number"];
		$second_number = $_REQUEST["second_number"];
	} else {
		echo "<script language=javascript> alert(\"Please Enter values.\");</script>";
	}
	if(!is_numeric($first_number) || !is_numeric($second_number)) {
		echo "<script language=javascript> alert(\"Please insert numbers.\");</script>";
	}
	if($operator === "+") {
		$result = $first_number + $second_number;
	} else if ($operator === "-") {
		$result = $first_number - $second_number;
	} else if($operator === "*") {
		$result = $first_number * $second_number;
	} else if($operator === "/") {
		$result = $first_number / $second_number;
	}	
}
?>
<form >
	<label>Enter first number</label>
	<input type="number" name="first_number"></input>
	<br/>
	<label>Choose operator</label>
	<select name="operator">
		<option>+</option>
		<option>-</option>
		<option>/</option>
		<option>*</option>
	</select>
	<br/>
	<label>Enter second number</label>
	<input type="number" name="second_number"></input>
	<br/>
	<label>Output</label>
	<input type="submit" name ="calculate"/>
	<span><?php echo $result;?></span>
</form>
</body>
</html>