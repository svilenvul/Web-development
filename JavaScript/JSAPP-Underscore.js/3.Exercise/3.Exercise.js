(function () {
	require.config({
		paths : {			
			underscore : "../Scripts/libs/underscore-min",
			students : "../Scripts/data/students",
			Student : "../Scripts/classes/Student",
			Human : "../Scripts/classes/Human"
			
		}  
	});
	require(["students","underscore"],function(students,_){	
		
		(function () {
			_.each(students,function (student) {
				calculateAverageMark (student);
			});
			
			function calculateAverageMark (student) { 
				function average (arr)
				{
					return _.reduce(arr, function(memo, num)
					{
						return memo + num;
					}, 0) / arr.length;
				}
				var allMarks = _.pluck(student.marks,"mark");			
				var avaregeMark = average(allMarks);
				student.avaregeMark = avaregeMark;
			}	
			
			function sortByAvaregeMark (firstStudent, secondStundent) {
				var firstStudentMark = firstStudent.avaregeMark;
				var secondStundentMark  = secondStundent.avaregeMark;
				return firstStudentMark - secondStundentMark;
			}
			
			function findStudentWithHghestMarks (students) {
				var studentWithHighestMarks;
				var sortedStudents = _.sortBy(students,"avaregeMark");		
				studentWithHighestMarks = _.last(sortedStudents);
				
				return studentWithHighestMarks;
			}
			console.log("The student with highestMarks is");
			console.log(findStudentWithHghestMarks(students).toString() + " with avarege mark -" + this.avaregeMark);
		}());	
		
	});
}());	
	
	
	
		