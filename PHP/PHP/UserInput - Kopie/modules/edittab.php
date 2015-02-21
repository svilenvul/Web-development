<?php
	
	function get_edittab ($user,$param) {
		if ($param="register") {
			<form method="post" onSubmit = "return addUser()" action="login.php">
				<label for="input_name" >User Name*</label> 
				<input type="text" name="username" id="input_name"/>
		} else {
			<form method="post" onSubmit = "return updateUser()" action="profile.php">
				<label for="input_name" >User Name*</label> 
				<input type="text" name="username" id="input_name"/>
		}
		echo <<<EOT
		<form method="post" onSubmit = "return checkUserInput()" action="registermessage.php">
			<label for="input_name" >User Name*</label> 
			<input type="text" name="username" id="input_name"/>
			<label for="input_pass">Pssword*</label>
			<input type="password" name="pass" id="input_pass"/>
			<label for="input_passrepeat">Repeat Password*</label>
			<input type="password"  id="input_passrepeat"/>
			<label for="input_secretquestion">Secret question*</label>
			<input type="text" name="secretquestion" id="input_secretquestion"/>
			<label for="input_secretanswer">Secret answer*</label>
			<input type="text" name="secretanswer" id="input_secretanswer"/>
			<label for="input_email">Email</label>
			<input type="text" name="email" id="input_email"/>
			<label for="input_fname">First Name*</label>
			<input type="text" name="fname" id="input_fname"/>
			<label for="input_lname">Last Name*</label>
			<input type="text" name="lname" id="input_lname"/>
			<label for="inpit_sex">Sex*</label>
			<input type="radio" name="sex" id="input_sex_male" value="male"/><label for ="input_sex_male">Male</label>
			<input type="radio" name="sex" id="input_sex_female" value="female"/><label for ="input_sex_female">Female</label>		
			<label for="input_birthday">Birthday*</label>
			<input type="date" name="birthday" id="input_birthday" />
			<span id="message"></span>
			<button type="submit">Create profile</button>
		</form>
		<span id ="message"></span>
EOT;
	}
?>
<script language="JavaScript">

	function showMessage(element, message){
		element.focus();
		var id = "error" + element.id.substr(element.id.indexOf("_"));	
		if(!document.getElementById(id)) {
			var span = document.getElementById("message");		
			span.innerHTML = message;		} 		
	}

	function checkUserInput () {
		var oldMessage = document.getElementById("message");	
		if(oldMessage.innnerHTML) {
			oldMessage.innnerHTML = "";
		}
	
		var isInputCorrect = false,
			name = document.getElementById("input_name"),
			pass = document.getElementById("input_pass"),
			passre = document.getElementById("input_passrepeat"),
			secretquestion = document.getElementById("input_secretquestion"),
			secretanswer = document.getElementById("input_secretanswer"),
			fname = document.getElementById("input_fname"),
			lname = document.getElementById("input_lname"),
			sex_male = document.getElementById("input_sex_male"),
			sex_female = document.getElementById("input_sex_female"),
			birthday = document.getElementById("input_birthday");
			
		if(name.value.length <5 ) {
			showMessage(name,"Min 5 characters !");
		} else if (pass.value.length < 5 ) {
			showMessage(pass,"Min 5 characters !");
			pass.value = "";			
		} else if (passre.value !== pass.value) {
			showMessage(passre,"Pass don´tmatch!");
			passre.value = "";
		} else if (secretquestion.value === "") {
			showMessage(secretquestion,"Empty field !");
		} else if (secretanswer.value === "") {
			showMessage(secretanswer,"Empty field !");
		} else if (fname.value === "") {
			showMessage(fname,"Type your name!");
		} else if (lname.value === "") {
			showMessage(lname,"Type your last name!");
		} else if (!sex_male.checked && !sex_female.checked) {
			showMessage(sex_male,"Choose sex!");
		} else if (birthday.value === "") {
			showMessage(birthday,"Select date!");
		} else {
			isInputCorrect = true;
		}
		return isInputCorrect;
	}
	
	function addUser() {
		if(checkUserInput()) {
			//check if user is existing
			//ajax addUser
			//if ajax ok  alert created and return true
			//else  return false error username is not free
		}
	}
	
	function updateUser() {
		if(checkUserInput()) {
			//ajax updateUser
			//if ajax ok alert updated return true
		}
	}
</script>
