require.config({
	paths : {
		async :"libs/async",
		YouTubePlayer : "app/YouTubePlayer",
		iframe : "https://www.youtube.com/iframe_api?noext"
	},
	shim: {
        iframe: {           
            exports: 'YT'
        }
    }
});
require(["YouTubePlayer"],function (player) {
	player.play();
});