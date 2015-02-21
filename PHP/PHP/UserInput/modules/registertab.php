
<?php	
	function get_registertab () {
		
		echo <<<EOT
		
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

</script>
