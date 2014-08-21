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
			function findStudentsWithFirstNameBeforeLast(students) {			 
				var filteredStudents = _.filter(students,isFirstNameBeforelast);
				
				function isFirstNameBeforelast(student) {
					if (student.firstName < student.lastName) {
						return true;
					} else {
						return false;
					}
				}
				
				return filteredStudents;
			}
			
			function sortByFullName (students) {
				return _.sortBy(students,function (student) {
					return	student.firstName + " " + student.secondName});
			}
			
			function printInConsole (students) {				
				console.log("Students with first name before last alphabetically, printed in descending order:");
				_.each(students,function(student){console.log(student.toString())});
			}
			
			var filteredStudents = findStudentsWithFirstNameBeforeLast(students);
			var sortedFilteredStudents = sortByFullName(filteredStudents);			
			printInConsole(sortedFilteredStudents);
		}());
	
	
		
	});
}());