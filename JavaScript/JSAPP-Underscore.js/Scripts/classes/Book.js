define("Book",function() {

	var Book = (function () {	
				
		function Book(title,author,publisher) {
			this.author = author;
			this.title = title;
			this.publisher = publisher;
		}
		
		return Book;		
		
	}());
	
	return Book;
});