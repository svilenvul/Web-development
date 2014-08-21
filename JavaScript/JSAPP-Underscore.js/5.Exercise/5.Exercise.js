(function () {
	require.config({
		paths : {			
			underscore : "../Scripts/libs/underscore-min",
			Animal : "../Scripts/classes/Animal",
			animals : "../Scripts/data/animals"
		}  
	});
	require(["animals","underscore"],function(animals,_){			
		(function () {	
			
			var legsData = _.pluck(animals,"numberOfLegs");			
			var numberOfLegs = _.reduce(legsData,function(memo, num){ return memo + num; });
			
			console.log("The total number of legs is: " + numberOfLegs);
		}());	
		
	});
}());	