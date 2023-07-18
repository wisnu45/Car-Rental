/*========================= 	
	**********
	*********
	******
	*** TECHWARE(PENMANSHIP - RE_EN^TW130) - Locality Finder	
============================*/
	
	var autocomplete = {};
	var autocompletesWraps = ['locality_finder'];
	//var test2_form = { street_number: 'short_name', route: 'long_name', locality: 'long_name', administrative_area_level_1: 'long_name',country: 'long_name', postal_code: 'short_name',latitude: 'long_name' };
	function initialize() {		
		$.each(autocompletesWraps, function(index, name) {
			if($('#'+name).length == 0) {
				return;
			}
			autocomplete[name] = new google.maps.places.Autocomplete($('#'+name+' .autocomplete')[0], { types: ['geocode'] });	
			google.maps.event.addListener(autocomplete[name], 'place_changed', function() {							
				var place = autocomplete[name].getPlace();							
				document.getElementById('lat').value = place.geometry.location.lat();
				document.getElementById('lon').value = place.geometry.location.lng();
				$('#'+name).each(function(){	
					gutmap(document.getElementById('lat').value,document.getElementById('lon').value);
				});					
			});
		});
	}		
// Geo sensor Map
	$(".col-lg-3.col-md-3.pad-zero.perfect-map-geodiv").hide();	
	var x = document.getElementById("demoMessaGe");
	function getLocation() {
		$(".col-lg-3.col-md-3.pad-zero.perfect-map-geodiv").show();		
		$(".perfect-map-geodiv").empty();
		$('.perfect-map-geodiv').append('<a href="javascript:void(0);" class="sh-map perfect-map-geo" data-toggle="modal" data-target="#myModalmap" ><span>show map <img src="'+base_url+'assets/img/popup/16.png" /> </span></a>');
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition, showError);
		} else { 
			x.innerHTML = "Geolocation is not supported by this browser.";
		}
	}	
	function showPosition(position) {		
		lat = position.coords.latitude;
		lon = position.coords.longitude; 
		latlon = new google.maps.LatLng(lat, lon)
		mapholder = document.getElementById('mapholder')
		mapholder.style.height = '250px';
		mapholder.style.width = '550px';
		var myOptions = {
			center:latlon,zoom:14,
			mapTypeId:google.maps.MapTypeId.ROADMAP,
			mapTypeControl:false,
			navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
		}		
		var map = new google.maps.Map(document.getElementById("mapholder"), myOptions);
		var marker = new google.maps.Marker({position:latlon,map:map,title:"You are here!"});
		setTimeout(function() {	
			new google.maps.event.trigger( map, 'resize' ); 
		}, 2000);			
	}
	function showError(error) {
		switch(error.code) {
			case error.PERMISSION_DENIED:
				x.innerHTML = "User denied the request for Geolocation. Secure Origin issue."
				break;
			case error.POSITION_UNAVAILABLE:
				x.innerHTML = "Location information is unavailable."
				break;
			case error.TIMEOUT:
				x.innerHTML = "The request to get user location timed out."
				break;
			case error.UNKNOWN_ERROR:
				x.innerHTML = "An unknown error occurred."
				break;
		}
	}
// LatLon Textbar Map			
	function gutmap(lat,lon){
		$(".col-lg-3.col-md-3.pad-zero.perfect-map-geodiv").show();	
		$(".perfect-map-geodiv").empty();
		$('.perfect-map-geodiv').append('<a href="javascript:void(0);" class="sh-map perfect-map-geo" data-toggle="modal" data-target="#myModalmapnotgeo" ><span>show map <img src="'+base_url+'assets/img/popup/16.png" /> </span></a>');
		latlon = new google.maps.LatLng(lat, lon)
		mapholder = document.getElementById('mapholdernotgeo')
		mapholder.style.height = '250px';
		mapholder.style.width = '550px';
		var myOptions = {
			center:latlon,zoom:14,
			mapTypeId:google.maps.MapTypeId.ROADMAP,
			mapTypeControl:false,
			navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
		}		
		var map = new google.maps.Map(document.getElementById("mapholdernotgeo"), myOptions);
		var marker = new google.maps.Marker({position:latlon,map:map,title:"You are here!"});
		setTimeout(function() {	 
			new google.maps.event.trigger( map, 'resize' ); 
		}, 2000);
	}