(function () {
	require.config({
		paths : {			
			underscore : "../Scripts/libs/underscore-min",
			Book : "../Scripts/classes/Book",
			animals : "../Scripts/data/animals"
		}  
	});
	require(["Book","underscore"],function(Book,_){			
		(function () {				
			var books = [];
			
			books.push(new Book("About the math","Arhimed","None"));
			books.push(new Book("Daeath Zone","Stevan King","Pinguin"));
			books.push(new Book("Journey to the centre of the earth","Julles verne","Pingun"));
			books.push(new Book("Doctor Sleep","Stevan King","Kindle edition"));
			books.push(new Book("Duden","Mathias Hahn","Lettera"));
			books.push(new Book("King Elizabet","John Davis","Royal"));
			books.push(new Book("Authobiography","Arhimed","none"));
			
			var groupedByAuthor = _.groupBy(books,"author");
			var sortGroupsBylength = _.sortBy(groupedByAuthor,"length");
			var mostPopularAuthor  = _.first(_.last(sortGroupsBylength)).author;
			
			console.log("The most popular author is:");
			console.log(mostPopularAuthor);
			
		}());	
		
	});
}());	