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
			function groupBySpecies(animals) {
				var groups = _.groupBy(animals,"specie");
				return groups;
			}	
			
			function sortGroups(animalGroups) {
				var sortedGroup={};
				_.each(animalGroups,function (value,key) {
					var newVal;
					newVal = _.sortBy(value,function(animal){
						return animal.numberOfLegs;
					});
					sortedGroup[key] = newVal;
				});
				return sortedGroup;
			}
			
			function printGroups (groups) {
				console.log("Animals grouped by species and sorted by number of legs:");
				_.each(groups,function(value,key) {
					console.log(key);
					_.each(value,function(animal){
						console.log(animal.toString());
					});
				});
			}
			
			var animalGroups = groupBySpecies(animals);		
			var sortedGroups = sortGroups(animalGroups);
			printGroups(sortedGroups);					
		}());	
		
	});
}());	
	