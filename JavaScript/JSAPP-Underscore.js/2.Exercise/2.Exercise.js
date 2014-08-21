(function () {
	require.config({
		paths : {			
			underscore : "../Scripts/libs/underscore-min",
			students : "../Scripts/data/students",
			Student : "../Scripts/classes/Student",
			Human : "../Scripts/classes/Human",
			
		}  
	});
	require(["students","underscore"],function(students,_){		
		
		(function () {
			function findStudentsWithAgeBetween (students,minAge,maxAge) {
				var filteredStudents = _.filter(students,function (student) {
					return isAgeInRange(student.age,minAge,maxAge);
				});
				
				function isAgeInRange(age,minAge,maxAge) {
					if (age <= maxAge && age >= minAge) {
						return true;
					} else {
						return false;
					}
				}
				
				
				return filteredStudents;
			};
			var minAge = 18;
			var maxAge = 24;
			
			var filteredStudents = findStudentsWithAgeBetween(students,minAge,maxAge);
			
			console.log("Students with age between " + minAge + " and " + maxAge);
			_.each(filteredStudents, function(student){
				var studentNames = student.getNames();
				console.log(student.toString());
			});
		}());	
		
	});
}());	
	
	
	
		