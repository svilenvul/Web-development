define("Animal",function() {

	var Animal = (function () {	
				
		function Animal(specie, sort, numberOfLegs) {
			this.specie = specie;
			this.sort = sort;
			this.numberOfLegs = numberOfLegs;		
		}
		
		return Animal;		
		
	}());
	
	Animal.prototype.toString = function() {
		return this.specie + ", " + this.sort + " with " + this.numberOfLegs + " legs";
	};
	
	return Animal;
});