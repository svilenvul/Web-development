(function () {
	require.config({
		paths : {			
			underscore : "../Scripts/libs/underscore-min",
			Human : "../Scripts/classes/Human",
			animals : "../Scripts/data/animals"
		}  
	});
	require(["Human","underscore"],function(Human,_){			
		(function () {				
			var people = [];			
			people.push(new Human("Peter","Pan"));
			people.push(new Human("Peter","Petkov"));
			people.push(new Human("Georgi","Krumov"));
			people.push(new Human("Dimityr","Gospodinov"));
			people.push(new Human("Vasil","Rosenov"));
			people.push(new Human("Petromil","Pavlov"));
			people.push(new Human("Dimitur","Kamenov"));
			people.push(new Human("Kliment","Vavlov"));
			people.push(new Human("Kiril","Petkov"));
			people.push(new Human("Kostadin","Pavlov"));
			people.push(new Human("Dimityr","Dimitrov"));
			people.push(new Human("Kaloyan","Gospodinov"));
			people.push(new Human("Dimityr","Rosenov"));
			people.push(new Human("Petromil","Pavlov"));
			people.push(new Human("Dimityr","Kamenov"));		

			var groupsByFirstName = _.groupBy(people,"firstName");
			var groupsByLastName = _.groupBy(people,"lastName");
			
			var sortedGroupByFirstName = _.sortBy(groupsByFirstName,'length');
			var sortedGroupByLastName = _.sortBy(groupsByLastName,'length');
			
			var mostCommonFirstName = _.first(_.last(sortedGroupByFirstName)).firstName;
			var mostCommonLastName = _.first(_.last(sortedGroupByLastName)).lastName;
			
			console.log("The most common first name is " +  mostCommonFirstName);
			console.log("The most common last name is " + mostCommonLastName);
		}());	
		
	});
}());	