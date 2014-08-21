(function() {
	
	var map;
	var panorama;
	var markers = {};
	var userMarker;
	var selectedMarkerID = -1;
	var DEFAULT_ZOOM = 15;
	
	google.maps.event.addDomListener(window, 'load', function(){
		initialize(cities);
	});	

	function initialize (cities) {
		var startLocation = new google.maps.LatLng(43.204745,27.90938);
		initializeMap(startLocation);	
		initilizePanorama(startLocation);	
		initializeUserMarker(startLocation);	
		
		
		//Add markers and info
		addMarkers(map,cities);
		createList(cities);		
	}
	function initializeMap (location) {
		var mapOptions = {
			zoom: 1,
			center:location					
		};		
		var mapContainer = document.getElementById("map-container");		
		map = new google.maps.Map(mapContainer,mapOptions);
	}
	
	function initilizePanorama (location) {
		var panoramaOptions = {
			position: location,
			pov: {
			  heading: 34,
			  pitch: 10
			}
		}
		var panoramaContainer = document.getElementById("street-view-container");		
		panorama = new google.maps.StreetViewPanorama(panoramaContainer, panoramaOptions);
	}
	function initializeUserMarker (location) {
		userMarker = new google.maps.Marker({
				position: location,
				map: map,
				title: "You",
				draggable:true,
				icon : 'http://maps.google.com/mapfiles/kml/shapes/man.png'
		});
		google.maps.event.addListener(userMarker, 'dragend', function (loc) {
			onUserMarkerDrag(loc.latLng);
		});
	}
	
	function addMarkers(map,cities) {
		var marker,city;
		for (var i = 0; i < cities.length; i++) {
			city = cities[i];
			marker = new google.maps.Marker({
				position: new google.maps.LatLng(city.lattitide, city.longitude),
				map: map,
				title: city.name
			});
			google.maps.event.addListener(marker, 'click', function () {
				selectedMarkerID = this.id;
				moveToMarker(this);					
			});
			marker.id = i;
			markers[marker.id] =  marker;
			addInfoBox (marker,city.info);
		}
	}
	
	function addInfoBox (marker,content) {
		marker.info =  new google.maps.InfoWindow({
			content: content,
			maxWidth: 220,
			maxHeight: 160
		});	
	}	
	
	function createList (cities) {
		var ul = document.getElementById("cities");
		var li ;
		for (var i = 0; i < cities.length; i++) {
			li = document.createElement("li");
			li.innerHTML = cities[i].name;
			li.id =i;
			li.addEventListener("click",function () {
				moveToMarker(markers[this.id]);
			},false);
			li.addEventListener("mouseover",function() {
				this.style.backgroundColor = "darkgrey";
			});
			li.addEventListener("mouseout",function() {
				this.style.backgroundColor = "grey";
			});
			ul.appendChild(li);
		}
	}

	function onUserMarkerDrag(position) {
		panorama.setPosition(position);
		map.panTo(position);
	}
	
	function moveToMarker (marker) {	
		for (index in markers) {
			if (markers[index].info) {
				markers[index].info.close();
			}
		}
		
		if (document.getElementsByClassName("selected").length > 0) {
			var selectedItem = document.getElementsByClassName("selected") [0];
			selectedItem.className = undefined;
		}
		
		marker.info.open(map,marker);
		document.getElementById(marker.id).className = "selected";
				
		var newPos = marker.getPosition();
		map.setZoom(DEFAULT_ZOOM);
		userMarker.setPosition(newPos);
		onUserMarkerDrag(newPos);
	}
	
	var btnNext = document.getElementById("btn-next").addEventListener("click",function() {
		selectedMarkerID ++;
		if (selectedMarkerID >= Object.keys(markers).length) {
			selectedMarkerID = 0;
		}
		var marker = markers[selectedMarkerID];		
		moveToMarker(marker);		
	});
	
	var btnPrev = document.getElementById("btn-prev").addEventListener("click",function () {
		selectedMarkerID --;
		if (selectedMarkerID <= 0) {
			selectedMarkerID = Object.keys(markers).length - 1;
		}
		var marker = markers[selectedMarkerID];		
		moveToMarker(marker);	
	});
	
	var zoomOut = document.getElementById("zoom-out").addEventListener("click",function () {
		selectedMarkerID =-1;		
		for (index in markers) {
			if (markers[index].info) {
				markers[index].info.close();
			}
		}
		if (document.getElementsByClassName("selected").length > 0) {
			var selectedItem = document.getElementsByClassName("selected") [0];
			selectedItem.className = undefined;
		}		
		map.setCenter( new google.maps.LatLng(0, 0));
		map.setZoom(1);
		
	});
		var cities = [{
		name: "Moscow",
		lattitide: 55.754429,
		longitude: 37.618932,
		info:'<div class="cards-show-expanded"><h1 class="cards-card-title cards-facts-title">Quick facts</h1><div class="cards-facts-description"><span jsinstance="0" jsl="$x 1;" jstid="190"><span jsl="$x 2;" style="display:none" jstid="191"> </span><span jsl="$x 3;" jstid="192">Moscow is the capital city and the most populous federal subject of Russia. The city is a major political, economic, cultural and scientific center in Russia and in Eastern Europe.</span><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" class="cards-facts-attribution-link" jsl="$x 4;" style="display:none" jsan="7.cards-facts-attribution-link,0.target,0.jsaction,5.display" jstid="193" tabindex="2002" href="javascript:void(0)"></a></span><span jsinstance="*1" jsl="$x 1;" jstid="194"><span jsl="$x 2;" jstid="195"> </span><span jsl="$x 3;" style="display:none" jsan="5.display" jstid="196"></span><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" href="http://en.wikipedia.org/wiki/Moscow" class="cards-facts-attribution-link" jsl="$x 4;" jsan="7.cards-facts-attribution-link,8.href,0.ved,0.target,0.jsaction" jstid="197" tabindex="2003">Wikipedia</a></span></div><ul><li jsinstance="0" class="cards-facts-fact" jsl="$x 5;" jstid="198"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="199">Population</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="200">11.5 million (2010)</li></ul></li><li jsinstance="*1" class="cards-facts-fact" jsl="$x 5;" jstid="201"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="202">Area</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="203">2,510&nbsp;km²</li></ul></li></ul><div class="cards-light cards-facts-sources" jsl="$x 8;" jstid="204"><span class="cards-facts-sources-include"><span>Sources include</span><span>:</span></span><ul class="cards-wrapped-list cards-facts-list"><li jsinstance="*0" jsl="$x 9;" jstid="205"><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" href="http://data.un.org/Data.aspx?d=POP&amp;f=tableCode%3A240" class="cards-facts-attribution-link" jsl="$x 10;" jsan="7.cards-facts-attribution-link,8.href,0.ved,0.target,0.jsaction" jstid="206" tabindex="2004">UNdata</a></li></ul></div><div jsl="$x 11;" jstid="207"><hr class="horizontal-line"><a ved="0CBEQtxwoAzAA" target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" href="/search?q=moscow+russia&amp;hl=en&amp;authuser=0" jsl="$x 12;" jsan="8.href,0.ved,0.target,0.jsaction" jstid="208" tabindex="2005"><div class="cards-facts-img"></div><div class="cards-facts-spacer"></div><span jsl="$x 13;" jstid="209">Search the web for Moscow</span></a></div></div>'
	}, {
		name: "Ottawa",
		lattitide: 45.423998,
		longitude: -75.69886,
		info:'<div class="cards-show-expanded"><h1 class="cards-card-title cards-facts-title">Quick facts</h1><div class="cards-facts-description"><span jsinstance="0" jsl="$x 1;" jstid="303"><span jsl="$x 2;" style="display:none" jstid="304"> </span><span jsl="$x 3;" jstid="305">Ottawa is the capital of Canada and the fourth largest city in the country. The city stands on the south bank of the Ottawa River in the eastern portion of Southern Ontario.</span><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" class="cards-facts-attribution-link" jsl="$x 4;" style="display:none" jsan="7.cards-facts-attribution-link,0.target,0.jsaction,5.display" jstid="306" tabindex="2002" href="javascript:void(0)"></a></span><span jsinstance="*1" jsl="$x 1;" jstid="307"><span jsl="$x 2;" jstid="308"> </span><span jsl="$x 3;" style="display:none" jsan="5.display" jstid="309"></span><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" href="http://en.wikipedia.org/wiki/Ottawa" class="cards-facts-attribution-link" jsl="$x 4;" jsan="7.cards-facts-attribution-link,8.href,0.ved,0.target,0.jsaction" jstid="310" tabindex="2003">Wikipedia</a></span></div><ul><li jsinstance="0" class="cards-facts-fact" jsl="$x 5;" jstid="311"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="312">Population</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="313">883,391 (2011)</li></ul></li><li jsinstance="1" class="cards-facts-fact" jsl="$x 5;" jstid="314"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="315">Province</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="316">Ontario</li></ul></li><li jsinstance="*2" class="cards-facts-fact" jsl="$x 5;" jstid="317"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="318">Area</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="319">2,778&nbsp;km²</li></ul></li></ul><div class="cards-light cards-facts-sources" jsl="$x 8;" style="display:none" jstid="320"><span class="cards-facts-sources-include"><span>Sources include</span><span>:</span></span><ul class="cards-wrapped-list cards-facts-list"><li jsl="$x 9;" style="display:none" jstid="321"><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" class="cards-facts-attribution-link" jsl="$x 10;" jsan="7.cards-facts-attribution-link,0.target,0.jsaction" jstid="322" tabindex="2004" href="javascript:void(0)"></a></li></ul></div><div jsl="$x 11;" jstid="323"><hr class="horizontal-line"><a ved="0CBEQtxwoBDAA" target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" href="/search?q=ottawa&amp;hl=en&amp;authuser=0" jsl="$x 12;" jsan="8.href,0.ved,0.target,0.jsaction" jstid="324" tabindex="2005"><div class="cards-facts-img"></div><div class="cards-facts-spacer"></div><span jsl="$x 13;" jstid="325">Search the web for Ottawa</span></a></div></div>'
	}, {
		name: "Budapest",
		lattitide: 47.507124,
		longitude: 19.066189,
		info:'<div class="cards-show-expanded"><h1 class="cards-card-title cards-facts-title">Quick facts</h1><div class="cards-facts-description"><span jsinstance="0" jsl="$x 1;" jstid="449"><span jsl="$x 2;" style="display:none" jstid="450"> </span><span jsl="$x 3;" jstid="451">Budapest is the capital and the largest city of Hungary, and one of the largest cities in the European Union.</span><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" class="cards-facts-attribution-link" jsl="$x 4;" style="display:none" jsan="7.cards-facts-attribution-link,0.target,0.jsaction,5.display" jstid="452" tabindex="2002" href="javascript:void(0)"></a></span><span jsinstance="*1" jsl="$x 1;" jstid="453"><span jsl="$x 2;" jstid="454"> </span><span jsl="$x 3;" style="display:none" jsan="5.display" jstid="455"></span><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" href="http://en.wikipedia.org/wiki/Budapest" class="cards-facts-attribution-link" jsl="$x 4;" jsan="7.cards-facts-attribution-link,8.href,0.ved,0.target,0.jsaction" jstid="456" tabindex="2003">Wikipedia</a></span></div><ul><li jsinstance="0" class="cards-facts-fact" jsl="$x 5;" jstid="457"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="458">Population</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="459">1.728 million (2010)</li></ul></li><li jsinstance="1" class="cards-facts-fact" jsl="$x 5;" jstid="460"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="461">Area</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="462">525.2&nbsp;km²</li></ul></li><li jsinstance="*2" class="cards-facts-fact" jsl="$x 5;" jstid="463"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="464">Founded</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="465">November 17, 1873</li></ul></li></ul><div class="cards-light cards-facts-sources" jsl="$x 8;" jstid="466"><span class="cards-facts-sources-include"><span>Sources include</span><span>:</span></span><ul class="cards-wrapped-list cards-facts-list"><li jsinstance="*0" jsl="$x 9;" jstid="467"><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" href="http://data.un.org/Data.aspx?d=POP&amp;f=tableCode%3A240" class="cards-facts-attribution-link" jsl="$x 10;" jsan="7.cards-facts-attribution-link,8.href,0.ved,0.target,0.jsaction" jstid="468" tabindex="2004">UNdata</a></li></ul></div><div jsl="$x 11;" jstid="469"><hr class="horizontal-line"><a ved="0CBIQtxwoBDAA" target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" href="/search?q=budapest&amp;hl=en&amp;authuser=0" jsl="$x 12;" jsan="8.href,0.ved,0.target,0.jsaction" jstid="470" tabindex="2005"><div class="cards-facts-img"></div><div class="cards-facts-spacer"></div><span jsl="$x 13;" jstid="471">Search the web for Budapest</span></a></div></div>'
	}, {
		name: "Tokyo",
		lattitide: 35.71405,
		longitude: 139.796836,
		info:'<div class="cards-show-expanded"><h1 class="cards-card-title cards-facts-title">Quick facts</h1><div class="cards-facts-description"><span jsinstance="0" jsl="$x 1;" jstid="558"><span jsl="$x 2;" style="display:none" jstid="559"> </span><span jsl="$x 3;" jstid="560">Tokyo, officially Tokyo Metropolis, is one of the 47 prefectures of Japan. Tokyo is the capital of Japan, the center of the Greater Tokyo Area, and the most populous metropolitan area in the world.</span><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" class="cards-facts-attribution-link" jsl="$x 4;" style="display:none" jsan="7.cards-facts-attribution-link,0.target,0.jsaction,5.display" jstid="561" tabindex="2002" href="javascript:void(0)"></a></span><span jsinstance="*1" jsl="$x 1;" jstid="562"><span jsl="$x 2;" jstid="563"> </span><span jsl="$x 3;" style="display:none" jsan="5.display" jstid="564"></span><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" href="http://en.wikipedia.org/wiki/Tokyo" class="cards-facts-attribution-link" jsl="$x 4;" jsan="7.cards-facts-attribution-link,8.href,0.ved,0.target,0.jsaction" jstid="565" tabindex="2003">Wikipedia</a></span></div><ul><li jsinstance="0" class="cards-facts-fact" jsl="$x 5;" jstid="566"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="567">Population</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="568">13.35 million (May 1, 2014)</li></ul></li><li jsinstance="*1" class="cards-facts-fact" jsl="$x 5;" jstid="569"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="570">Area</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="571">2,188&nbsp;km²</li></ul></li></ul><div class="cards-light cards-facts-sources" jsl="$x 8;" style="display:none" jstid="572"><span class="cards-facts-sources-include"><span>Sources include</span><span>:</span></span><ul class="cards-wrapped-list cards-facts-list"><li jsl="$x 9;" style="display:none" jstid="573"><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" class="cards-facts-attribution-link" jsl="$x 10;" jsan="7.cards-facts-attribution-link,0.target,0.jsaction" jstid="574" tabindex="2004" href="javascript:void(0)"></a></li></ul></div><div jsl="$x 11;" jstid="575"><hr class="horizontal-line"><a ved="0CBAQtxwoAzAA" target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" href="/search?q=tokyo&amp;hl=en&amp;authuser=0" jsl="$x 12;" jsan="8.href,0.ved,0.target,0.jsaction" jstid="576" tabindex="2005"><div class="cards-facts-img"></div><div class="cards-facts-spacer"></div><span jsl="$x 13;" jstid="577">Search the web for Tokyo</span></a></div></div>'
	}, {
		name: "Rome",
		lattitide: 41.889245,
		longitude: 12.493315,
		info:'<div class="cards-show-expanded"><h1 class="cards-card-title cards-facts-title">Quick facts</h1><div class="cards-facts-description"><span jsinstance="0" jsl="$x 1;" jstid="664"><span jsl="$x 2;" style="display:none" jstid="665"> </span><span jsl="$x 3;" jstid="666">Rome is a city and special comune in Italy. Rome is the capital of Italy and also of the Province of Rome and of the region of Lazio.</span><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" class="cards-facts-attribution-link" jsl="$x 4;" style="display:none" jsan="7.cards-facts-attribution-link,0.target,0.jsaction,5.display" jstid="667" tabindex="2002" href="javascript:void(0)"></a></span><span jsinstance="*1" jsl="$x 1;" jstid="668"><span jsl="$x 2;" jstid="669"> </span><span jsl="$x 3;" style="display:none" jsan="5.display" jstid="670"></span><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" href="http://en.wikipedia.org/wiki/Rome" class="cards-facts-attribution-link" jsl="$x 4;" jsan="7.cards-facts-attribution-link,8.href,0.ved,0.target,0.jsaction" jstid="671" tabindex="2003">Wikipedia</a></span></div><ul><li jsinstance="0" class="cards-facts-fact" jsl="$x 5;" jstid="672"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="673">Province</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="674">Province of Rome</li></ul></li><li jsinstance="1" class="cards-facts-fact" jsl="$x 5;" jstid="675"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="676">Founded</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="677">April 21, 753 BC</li></ul></li><li jsinstance="*2" class="cards-facts-fact" jsl="$x 5;" jstid="678"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="679">Population</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="680">2.753 million (2010)</li></ul></li></ul><div class="cards-light cards-facts-sources" jsl="$x 8;" jstid="681"><span class="cards-facts-sources-include"><span>Sources include</span><span>:</span></span><ul class="cards-wrapped-list cards-facts-list"><li jsinstance="*0" jsl="$x 9;" jstid="682"><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" href="http://data.un.org/Data.aspx?d=POP&amp;f=tableCode%3A240" class="cards-facts-attribution-link" jsl="$x 10;" jsan="7.cards-facts-attribution-link,8.href,0.ved,0.target,0.jsaction" jstid="683" tabindex="2004">UNdata</a></li></ul></div><div jsl="$x 11;" jstid="684"><hr class="horizontal-line"><a ved="0CBIQtxwoBDAA" target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" href="/search?q=rome+italy&amp;hl=en&amp;authuser=0" jsl="$x 12;" jsan="8.href,0.ved,0.target,0.jsaction" jstid="685" tabindex="2005"><div class="cards-facts-img"></div><div class="cards-facts-spacer"></div><span jsl="$x 13;" jstid="686">Search the web for Rome</span></a></div></div>'
	}, {
		name: "Paris",
		lattitide: 48.860268,
		longitude: 2.325011,
		info:'<div class="cards-show-expanded"><h1 class="cards-card-title cards-facts-title">Quick facts</h1><div class="cards-facts-description"><span jsinstance="0" jsl="$x 1;" jstid="775"><span jsl="$x 2;" style="display:none" jstid="776"> </span><span jsl="$x 3;" jstid="777">Paris is the capital and most populous city of France. Situated on the Seine River, in the north of the country, it is at the heart of the Île-de-France region.</span><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" class="cards-facts-attribution-link" jsl="$x 4;" style="display:none" jsan="7.cards-facts-attribution-link,0.target,0.jsaction,5.display" jstid="778" tabindex="2002" href="javascript:void(0)"></a></span><span jsinstance="*1" jsl="$x 1;" jstid="779"><span jsl="$x 2;" jstid="780"> </span><span jsl="$x 3;" style="display:none" jsan="5.display" jstid="781"></span><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" href="http://en.wikipedia.org/wiki/Paris" class="cards-facts-attribution-link" jsl="$x 4;" jsan="7.cards-facts-attribution-link,8.href,0.ved,0.target,0.jsaction" jstid="782" tabindex="2003">Wikipedia</a></span></div><ul><li jsinstance="0" class="cards-facts-fact" jsl="$x 5;" jstid="783"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="784">Population</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="785">2.211 million (2008)</li></ul></li><li jsinstance="1" class="cards-facts-fact" jsl="$x 5;" jstid="786"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="787">Area</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="788">105.4&nbsp;km²</li></ul></li><li jsinstance="*2" class="cards-facts-fact" jsl="$x 5;" jstid="789"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="790">Elevation</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="791">35&nbsp;m</li></ul></li></ul><div class="cards-light cards-facts-sources" jsl="$x 8;" jstid="792"><span class="cards-facts-sources-include"><span>Sources include</span><span>:</span></span><ul class="cards-wrapped-list cards-facts-list"><li jsinstance="*0" jsl="$x 9;" jstid="793"><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" href="http://data.un.org/Data.aspx?d=POP&amp;f=tableCode%3A240" class="cards-facts-attribution-link" jsl="$x 10;" jsan="7.cards-facts-attribution-link,8.href,0.ved,0.target,0.jsaction" jstid="794" tabindex="2004">UNdata</a></li></ul></div><div jsl="$x 11;" jstid="795"><hr class="horizontal-line"><a ved="0CBIQtxwoBDAA" target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" href="/search?q=paris+city&amp;hl=en&amp;authuser=0" jsl="$x 12;" jsan="8.href,0.ved,0.target,0.jsaction" jstid="796" tabindex="2005"><div class="cards-facts-img"></div><div class="cards-facts-spacer"></div><span jsl="$x 13;" jstid="797">Search the web for Paris</span></a></div></div>'
	}, {
		name: "Washington",
		lattitide: 38.889154,
		longitude: -77.048787,
		info:'<div class="cards-show-expanded"><h1 class="cards-card-title cards-facts-title">Quick facts</h1><div class="cards-facts-description"><span jsinstance="0" jsl="$x 1;" jstid="904"><span jsl="$x 2;" style="display:none" jstid="905"> </span><span jsl="$x 3;" jstid="906">Washington, D.C., formally the District of Columbia and commonly referred to as Washington, "the District", or simply D.C., is the capital of the United States.</span><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" class="cards-facts-attribution-link" jsl="$x 4;" style="display:none" jsan="7.cards-facts-attribution-link,0.target,0.jsaction,5.display" jstid="907" tabindex="2002" href="javascript:void(0)"></a></span><span jsinstance="*1" jsl="$x 1;" jstid="908"><span jsl="$x 2;" jstid="909"> </span><span jsl="$x 3;" style="display:none" jsan="5.display" jstid="910"></span><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" href="http://en.wikipedia.org/wiki/Washington,_D.C." class="cards-facts-attribution-link" jsl="$x 4;" jsan="7.cards-facts-attribution-link,8.href,0.ved,0.target,0.jsaction" jstid="911" tabindex="2003">Wikipedia</a></span></div><ul><li jsinstance="0" class="cards-facts-fact" jsl="$x 5;" jstid="912"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="913">Population</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="914">632,323 (2012)</li></ul></li><li jsinstance="1" class="cards-facts-fact" jsl="$x 5;" jstid="915"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="916">Area</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="917">176.9&nbsp;km²</li></ul></li><li jsinstance="*2" class="cards-facts-fact" jsl="$x 5;" jstid="918"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="919">Founded</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="920">July 16, 1790</li></ul></li></ul><div class="cards-light cards-facts-sources" jsl="$x 8;" style="display:none" jstid="921"><span class="cards-facts-sources-include"><span>Sources include</span><span>:</span></span><ul class="cards-wrapped-list cards-facts-list"><li jsl="$x 9;" style="display:none" jstid="922"><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" class="cards-facts-attribution-link" jsl="$x 10;" jsan="7.cards-facts-attribution-link,0.target,0.jsaction" jstid="923" tabindex="2004" href="javascript:void(0)"></a></li></ul></div><div jsl="$x 11;" jstid="924"><hr class="horizontal-line"><a ved="0CBEQtxwoBDAA" target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" href="/search?q=washington+dc&amp;hl=en&amp;authuser=0" jsl="$x 12;" jsan="8.href,0.ved,0.target,0.jsaction" jstid="925" tabindex="2005"><div class="cards-facts-img"></div><div class="cards-facts-spacer"></div><span jsl="$x 13;" jstid="926">Search the web for Washington, D.C.</span></a></div></div>'
	}, {
		name: "Berlin",
		lattitide: 52.505191,
		longitude: 13.335928,
		info:'<div class="cards-show-expanded"><h1 class="cards-card-title cards-facts-title">Quick facts</h1><div class="cards-facts-description"><span jsinstance="0" jsl="$x 1;" jstid="1015"><span jsl="$x 2;" style="display:none" jstid="1016"> </span><span jsl="$x 3;" jstid="1017">Berlin is the capital city of Germany and one of the 16 states of Germany. With a population of 3.4 million people, Berlin is the second most populous city proper and the seventh most populous urban ...</span><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" class="cards-facts-attribution-link" jsl="$x 4;" style="display:none" jsan="7.cards-facts-attribution-link,0.target,0.jsaction,5.display" jstid="1018" tabindex="2002" href="javascript:void(0)"></a></span><span jsinstance="*1" jsl="$x 1;" jstid="1019"><span jsl="$x 2;" jstid="1020"> </span><span jsl="$x 3;" style="display:none" jsan="5.display" jstid="1021"></span><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" href="http://en.wikipedia.org/wiki/Berlin" class="cards-facts-attribution-link" jsl="$x 4;" jsan="7.cards-facts-attribution-link,8.href,0.ved,0.target,0.jsaction" jstid="1022" tabindex="2003">Wikipedia</a></span></div><ul><li jsinstance="0" class="cards-facts-fact" jsl="$x 5;" jstid="1023"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="1024">Population</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="1025">3.502 million (2012)</li></ul></li><li jsinstance="1" class="cards-facts-fact" jsl="$x 5;" jstid="1026"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="1027">Gross domestic product</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="1028">109.2 billion EUR (2013)</li></ul></li><li jsinstance="*2" class="cards-facts-fact" jsl="$x 5;" jstid="1029"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="1030">Area</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="1031">891.8&nbsp;km²</li></ul></li></ul><div class="cards-light cards-facts-sources" jsl="$x 8;" jstid="1032"><span class="cards-facts-sources-include"><span>Sources include</span><span>:</span></span><ul class="cards-wrapped-list cards-facts-list"><li jsinstance="*0" jsl="$x 9;" jstid="1033"><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" href="http://data.un.org/Data.aspx?d=POP&amp;f=tableCode%3A240" class="cards-facts-attribution-link" jsl="$x 10;" jsan="7.cards-facts-attribution-link,8.href,0.ved,0.target,0.jsaction" jstid="1034" tabindex="2004">UNdata</a></li></ul></div><div jsl="$x 11;" jstid="1035"><hr class="horizontal-line"><a ved="0CBEQtxwoBDAA" target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" href="/search?q=berlin&amp;hl=en&amp;authuser=0" jsl="$x 12;" jsan="8.href,0.ved,0.target,0.jsaction" jstid="1036" tabindex="2005"><div class="cards-facts-img"></div><div class="cards-facts-spacer"></div><span jsl="$x 13;" jstid="1037">Search the web for Berlin</span></a></div></div>'
	}, {
		name: "Islamabad",
		lattitide: 33.678465,
		longitude: 73.0201863,
		info:'<div class="cards-show-expanded"><h1 class="cards-card-title cards-facts-title">Quick facts</h1><div class="cards-facts-description"><span jsinstance="0" jsl="$x 1;" jstid="1114"><span jsl="$x 2;" style="display:none" jstid="1115"> </span><span jsl="$x 3;" jstid="1116">Islamabad is the national capital city of Pakistan located within the Islamabad Capital Territory. According to a 2012 estimate by the Census Department, the population of Islamabad including its ...</span><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" class="cards-facts-attribution-link" jsl="$x 4;" style="display:none" jsan="7.cards-facts-attribution-link,0.target,0.jsaction,5.display" jstid="1117" tabindex="2002" href="javascript:void(0)"></a></span><span jsinstance="*1" jsl="$x 1;" jstid="1118"><span jsl="$x 2;" jstid="1119"> </span><span jsl="$x 3;" style="display:none" jsan="5.display" jstid="1120"></span><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" href="http://en.wikipedia.org/wiki/Islamabad" class="cards-facts-attribution-link" jsl="$x 4;" jsan="7.cards-facts-attribution-link,8.href,0.ved,0.target,0.jsaction" jstid="1121" tabindex="2003">Wikipedia</a></span></div><ul><li jsinstance="0" class="cards-facts-fact" jsl="$x 5;" jstid="1122"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="1123">Population</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="1124">529,180 (1998)</li></ul></li><li jsinstance="*1" class="cards-facts-fact" jsl="$x 5;" jstid="1125"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="1126">Area</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="1127">906&nbsp;km²</li></ul></li></ul><div class="cards-light cards-facts-sources" jsl="$x 8;" jstid="1128"><span class="cards-facts-sources-include"><span>Sources include</span><span>:</span></span><ul class="cards-wrapped-list cards-facts-list"><li jsinstance="*0" jsl="$x 9;" jstid="1129"><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" href="http://data.un.org/Data.aspx?d=POP&amp;f=tableCode%3A240" class="cards-facts-attribution-link" jsl="$x 10;" jsan="7.cards-facts-attribution-link,8.href,0.ved,0.target,0.jsaction" jstid="1130" tabindex="2004">UNdata</a></li></ul></div><div jsl="$x 11;" jstid="1131"><hr class="horizontal-line"><a ved="0CA8QtxwoAzAA" target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" href="/search?q=islamabad&amp;hl=en&amp;authuser=0" jsl="$x 12;" jsan="8.href,0.ved,0.target,0.jsaction" jstid="1132" tabindex="2005"><div class="cards-facts-img"></div><div class="cards-facts-spacer"></div><span jsl="$x 13;" jstid="1133">Search the web for Islamabad</span></a></div></div>'
	}, {
		name: "London",
		lattitide: 51.484059,
		longitude: 0.005898,
		info:'<div class="cards-show-expanded"><h1 class="cards-card-title cards-facts-title">Quick facts</h1><div class="cards-facts-description"><span jsinstance="0" jsl="$x 1;" jstid="1222"><span jsl="$x 2;" style="display:none" jstid="1223"> </span><span jsl="$x 3;" jstid="1224">London is the capital city of England and the United Kingdom. It is the most populous city in the United Kingdom, with a metropolitan area of over 13 million inhabitants.</span><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" class="cards-facts-attribution-link" jsl="$x 4;" style="display:none" jsan="7.cards-facts-attribution-link,0.target,0.jsaction,5.display" jstid="1225" tabindex="2002" href="javascript:void(0)"></a></span><span jsinstance="*1" jsl="$x 1;" jstid="1226"><span jsl="$x 2;" jstid="1227"> </span><span jsl="$x 3;" style="display:none" jsan="5.display" jstid="1228"></span><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" href="http://en.wikipedia.org/wiki/London" class="cards-facts-attribution-link" jsl="$x 4;" jsan="7.cards-facts-attribution-link,8.href,0.ved,0.target,0.jsaction" jstid="1229" tabindex="2003">Wikipedia</a></span></div><ul><li jsinstance="0" class="cards-facts-fact" jsl="$x 5;" jstid="1230"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="1231">Population</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="1232">8.308 million (2013)</li></ul></li><li jsinstance="1" class="cards-facts-fact" jsl="$x 5;" jstid="1233"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="1234">Area</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="1235">1,572&nbsp;km²</li></ul></li><li jsinstance="*2" class="cards-facts-fact" jsl="$x 5;" jstid="1236"><span class="cards-facts-attribute"><span jsl="$x 6;" jstid="1237">Founded</span><span>:</span></span><ul class="cards-oneline-list cards-facts-list"><li jsinstance="*0" jsl="$x 7;" jstid="1238">43 AD</li></ul></li></ul><div class="cards-light cards-facts-sources" jsl="$x 8;" style="display:none" jstid="1239"><span class="cards-facts-sources-include"><span>Sources include</span><span>:</span></span><ul class="cards-wrapped-list cards-facts-list"><li jsl="$x 9;" style="display:none" jstid="1240"><a target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" class="cards-facts-attribution-link" jsl="$x 10;" jsan="7.cards-facts-attribution-link,0.target,0.jsaction" jstid="1241" tabindex="2004" href="javascript:void(0)"></a></li></ul></div><div jsl="$x 11;" jstid="1242"><hr class="horizontal-line"><a ved="0CBEQtxwoBDAA" target="_blank" jsaction="log.outbound;clickmod:log.outbound;contextmenu:log.outbound_contextmenu" href="/search?q=london&amp;hl=en&amp;authuser=0" jsl="$x 12;" jsan="8.href,0.ved,0.target,0.jsaction" jstid="1243" tabindex="2005"><div class="cards-facts-img"></div><div class="cards-facts-spacer"></div><span jsl="$x 13;" jstid="1244">Search the web for London</span></a></div></div>'
	}];
	
}());