
<?php	
	function get_edittab ($userinfo) {
		echo <<<EOT
			<form method="post" onSubmit = "return checkUserInput()" action="registermessage.php">
				<img src = "uploads/{$userinfo["picture"]}" width="150px" height="150px"></img>
				<label for = "input_image">Image</label>
				<input type ="file" name ="image" value="{$userinfo["picture"]}">
				<label  >User Name*</label> 
				<span>{$userinfo["Name"]}</span>
			<label for="input_pass">Old Password*</label>
			<input type="password" name="pass" id="input_pass"/>
			<label for="input_passrepeat">New Password*</label>
			<input type="password"  id="input_passrepeat"/>
			<label for="input_secretquestion">Secret question*</label>
			<input type="text" name="secretquestion" id="input_secretquestion" value="{$userinfo["Question"]}"/>
			<label for="input_secretanswer">Secret answer*</label>
			<input type="text" name="secretanswer" id="input_secretanswer" value="{$userinfo["Answer"]}"/>
			<label for="input_email">Email</label>
			<input type="text" name="email" id="input_email" value="{$userinfo["Email"]}"/>
			<label for="input_fname">First Name*</label>
			<input type="text" name="fname" id="input_fname" value="{$userinfo["Fname"]}"/>
			<label for="input_lname">Last Name*</label>
			<input type="text" name="lname" id="input_lname" value="{$userinfo["Lname"]}"/>
			<label for="inpit_sex">Sex*</label>
			<input type="radio" name="sex" id="input_sex_male" value="male"/><label for ="input_sex_male">Male</label>
			<input type="radio" name="sex" id="input_sex_female" value="female"/><label for ="input_sex_female">Female</label>		
			<label for="input_birthday">Birthday*</label>
			<input type="date" name="birthday" id="input_birthday" value="{$userinfo["Birthday"]}"/>
			<span id="message"></span>
			<button type="submit">Edit profile</button>
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
			oldpass = document.getElementById("input_pass"),
			newpass = document.getElementById("input_passrepeat"),
			secretquestion = document.getElementById("input_secretquestion"),
			secretanswer = document.getElementById("input_secretanswer"),
			fname = document.getElementById("input_fname"),
			lname = document.getElementById("input_lname"),
			sex_male = document.getElementById("input_sex_male"),
			sex_female = document.getElementById("input_sex_female"),
			birthday = document.getElementById("input_birthday");
			
		if (oldpass.value.length < 5 ) {
			showMessage(oldpass,"Min 5 characters !");
			oldpass.value = "";			
		} else if (newpass.value !== pass.value) {
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

</script>
