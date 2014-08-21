define("Human",function() {
	var Human = (function () {			
		function Human(firstName, lastName, age) {
			this.firstName = firstName;
			this.lastName = lastName;
			this.age = age;			
		}	
		
		return Human;
	}());
	
	return Human;
});