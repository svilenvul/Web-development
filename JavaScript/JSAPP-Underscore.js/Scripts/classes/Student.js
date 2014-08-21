define("Student",["Human"],function(Human) {

	var Student = (function () {	
		var markToString = function () {
			return this.subject + ': ' + this.mark;
		};		
		function Student(firstName, lastName, age) {
			Human.call(this,firstName,lastName,age);
			this.marks=[];
		}		
		Student.prototype = new Human();
		
		Student.prototype.addMark = function (subject, mark) {
			this.marks.push({
				subject: subject,
				mark: mark,
				toString: markToString
			});
			return this;
		};
		
		Student.prototype.getNames = function() {
			var names = {
				firstName : this.firstName,
				lastName : this.lastName
			};
			
			return names;
		}		
		
		Student.prototype.toString = function (){
			return this.firstName + " " + this.lastName + " : " + this.age;
		}
		
		return Student;
	}());
	
	return Student;
});