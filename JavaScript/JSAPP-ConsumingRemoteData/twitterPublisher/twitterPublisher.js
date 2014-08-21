(function () {
var url = "https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=TelerikAcademy";
var provider = 'twitter';
var key = 'pXh8LPH1vKUm_2C-90stGcuJpcc';

getDataFromAPI(provider,url,key)

function getDataFromAPI (){
	OAuth.initialize(key);
	OAuth.popup(provider,{
		cache: true
	},function (error,result) {
		if (error) {
			console.log("Error in authentication" + error);			
		}else {
			result.get(url)
			.done(function (response) {
				loadData(response);
			})
			.fail(function (error) {
			   console.log("Error in http request " + error);
			});
		}
	});
}

function loadData(data) {
	var $list,$post,$date,$content,$foto,$text;	
	$list = $("<div/>");
	
	for (var i = 0; i < data.length; i++) {
		var post = data[i];
	
		$post = $("<div/>").addClass("post");
		$text = $("<div/>").addClass("text");
		$user = $("<span/>").html(post.user.name).addClass("user-name");
		$date = $("<span/>").html(parseDate(post.created_at)).addClass("date");
		
		
		$content = $("<p/>").html(textUrlify (post.text)).addClass("content");
		$foto = $("<img/>").attr("src",post.user.profile_image_url).addClass("foto");
		
		$text.append($user,$date,$content);
		$post.append($foto,$text);
		$list.append($post);
	}
	
	$list.appendTo($("#twitter-response"));
}
 
function parseDate(date) {
	return date.replace("+0000 ","");
}

function textUrlify (text) {
	var urlRegex = /(https?:\/\/[^\s]+)/g;
	var nameRegex = /@[^\s:]+/g;
	var hashtagRegex = /#[^\s:]+/g;
	
	text = text.replace(urlRegex, function(url) {				
		return '<a href="' + url + '">' + url + '</a>';
	});
	text = text.replace(nameRegex, function(name) {				
		var replace = '<a href="https://twitter.com/' + name.substr(1) + '">' + name + '</a>';
		return replace;
	});
	text = text.replace(hashtagRegex, function(hashtag) {				
		var replace = '<a href="https://twitter.com/hashtag/' + hashtag.substr(1) + '?src=hash">' + hashtag + '</a>';
		return replace;
	});
	
	return text;
}
}());