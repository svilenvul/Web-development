define("animals",["Animal"], function (Animal){
	var animals = [];
	
	animals.push(new Animal("Fly","Sepia",8));
	animals.push(new Animal("Dog","Koker",4));
	animals.push(new Animal("Bug","Rogach",6));
	animals.push(new Animal("Bird","Slavei",2));
	animals.push(new Animal("Fly","Komar",4));
	animals.push(new Animal("Fly","bee",6));
	animals.push(new Animal("Bug","Stonojka",100));
	animals.push(new Animal("Bug","Spider",8));
	
	return animals;
});