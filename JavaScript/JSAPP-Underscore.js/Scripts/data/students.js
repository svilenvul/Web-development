define("students",["Student"],function(Student){
	var students = [];
	
	students.push(new Student("Petar","Petkov",35).addMark("history",4).addMark("maths",5).addMark("english",6).addMark("physic",4));
	students.push(new Student("Jivko","Kolev",20).addMark("history",5).addMark("maths",2).addMark("english",5).addMark("physic",3));
	students.push(new Student("Encho","Enchev",25).addMark("history",2).addMark("maths",6).addMark("english",6).addMark("physic",4));
	students.push(new Student("Lepa","Brena",21).addMark("history",4).addMark("maths",5).addMark("english",6).addMark("physic",4));
	students.push(new Student("Vikror","Medveev",23).addMark("history",5).addMark("maths",4).addMark("english",6).addMark("physic",3));
	students.push(new Student("Joro","Kirchev",23).addMark("history",6).addMark("maths",6).addMark("english",6).addMark("physic",6));
	
	return students;
})