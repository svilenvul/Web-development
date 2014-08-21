var tags = ["cms", "javascript", "js",   "ASP.NET MVC", ".net", ".net", "css",   "wordpress", "xaml", "js", "http", "web",   "asp.net", "asp.net MVC", "ASP.NET MVC",   "wp", "javascript", "js", "cms", "html", "http",   "javascript", "http", "http", "CMS"];

createTagCloud(tags, 15, 25);

function createTagCloud(tags, minFontSize, maxFontSize) {
	var countedWords = countWords(tags);
	writeTags(countedWords, minFontSize, maxFontSize);

	function countWords(tags) {
		var countedWords = {};
		var maxOccurances = 1;

		for (var i = 0; i < tags.length; i++) {
			var word = tags[i];

			var currentCount = countedWords[word];

			if (currentCount) {
				currentCount++;
			} else {
				currentCount = 1;
			}
			countedWords[word] = currentCount;
		}
		return countedWords;
	}

	function calculateHeight(maximalOccurances, 
			occurances, minFontSize, maxFontSize) {
		var heigth;

		var minOccurances = 1;
		var fontSizeDifference = maxFontSize - minFontSize;
		var occurancesDifference = maximalOccurances - minOccurances;

		var heigth = Math.floor(minFontSize + (occurances - minOccurances) * 
				(fontSizeDifference / occurancesDifference));

		return heigth;
	}

	function writeTags(countedWords, minFontSize, maxFontSize) {
		var container = document.createElement("div");
		var maximalOccurances = findMaximalOccurances(countedWords);

		for (word in countedWords) {
			var occurances = countedWords[word];
			var heigth = calculateHeight(maximalOccurances, 
					occurances, minFontSize, maxFontSize);
			var newSpan = document.createElement("span");
			newSpan.innerHTML = word;
			newSpan.style.fontSize = heigth + "px";
			container.appendChild(newSpan);
		}
		document.body.appendChild(container);
	}

	function findMaximalOccurances(countedWords) {
		var maxOccurances = 1;

		for (i in countedWords) {
			if (countedWords[i] > maxOccurances) {
				maxOccurances = countedWords[i];
			}
		}

		return maxOccurances;
	}
}