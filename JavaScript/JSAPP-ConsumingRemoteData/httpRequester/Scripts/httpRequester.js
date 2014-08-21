(function () {
var httpRequester ;

httpRequester = (function(){
	function getJSON (URL) {		
		var request = $.ajax({
			type : "GET",
			url : URL		
		});
		return request;
	}
	
	function postJSON (URL,data,headers) {
		headers = headers || {};
		var request = $.ajax({
			type : "POST",
			url : URL,
			beforeSend : function (requestObj)
            {
				for(name in headers) {
					requestObj.setRequestHeader(name,headers[name]);
				}
                
            },
			data : data
		});
		
		return request;
	}
	
	return {
		getJSON : getJSON,
		postJSON : postJSON
	};
}());

var URL = "http://localhost:3000/students";
var data = {
	name : "John",
	grade : 4
};

var headers = {
	//"Accept-Language": "en",
	//"Accept-Encoding": "gzip, deflateUser",	
	//"Date": "25.07.2014",
	//"Server": "Apache"
};

httpRequester.postJSON (URL,data,headers).then(
	function(result){
		console.log(result);
	},function(error) {
		console.log(error);	
	});
httpRequester.getJSON (URL).then(
	function(result){
		console.log(result);
	},function(error) {
		console.log(error);

	});

}());