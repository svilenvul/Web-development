(function () {
	require.config({
		paths: {
			jquery : "libs/jquery-2.1.1.min",
			handlebars : "libs/handlebars-v1.3.0",
			crowdChat :"app/crowdChat",
			underscore:"libs/underscore"
		},
		shim : {
			'handlebars': {
				exports: 'Handlebars'
			}
		}
	});
	
	require(["crowdChat"],function (crowdChat) {
		var game = new crowdChat();		
		game.init();
	});
}());