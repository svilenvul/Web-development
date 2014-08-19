define("numberUtils",["underscore"],function (_) {
	var numberUtils ;
	numberUtils = (function (){
		function correctUserInput(numberArray) {
			var allChars,lastChar,restChars;		
			
			allChars = numberArray;
			lastChar = allChars.slice(-1)[0];
			restChars = allChars.slice(0,allChars.length-1);			
					
			if (isNaN(lastChar) || $.inArray(lastChar,restChars) > -1) {						
				allChars.pop();
			}						
			
			return allChars;
		}
		function generateRandomNumber(numberOfDigits) {
			var digits,shuffeledArray,result,index;
				
			function shuffle(o){ 
				for(var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
				return o;
			}
				
			digits = ['0','1','2','3','4','5','6','7','8','9'];
			shuffeledArray = shuffle(digits);
				
			index = 0;			
			if (shuffeledArray[index] === "0") {
				index = 1;
			} 
			result = shuffeledArray.slice(index,index + numberOfDigits);
				
			return result;
		}
		
		function comapreNumberArrays (firstNumberArray,secondNumberArray) {
			var positionMatches,numberMatches,allMatches;
			
			
			positionMatches = 0;			
			
			_.each(firstNumberArray,function(element, index) {
				if(element === secondNumberArray[index]) {
					positionMatches++;									
				}				
			});
			allMatches = _.intersection(firstNumberArray,secondNumberArray).length;
			numberMatches = allMatches - positionMatches;
			
			
			return {
				numberMatches:numberMatches,
				positionMatches:positionMatches
			};
		}
		
		return {
			correctUserInput : correctUserInput,
			generateRandomNumber :generateRandomNumber,
			comapreNumberArrays : comapreNumberArrays
		};
	}());
	return numberUtils;
});