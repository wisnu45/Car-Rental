//map
	function initMap() { 
        if($('#map_inlocat').length != 0){ 
		var lat = $('#sh-lat-tik').val();
		var lon = $('#sh-lng-tik').val();
		latlon = new google.maps.LatLng(lat, lon)		
        var map = new google.maps.Map(document.getElementById('map_inlocat'), {
          zoom: 4,
          center: latlon
        });
        var marker = new google.maps.Marker({
          position: latlon,
          map: map,
		  title:"Showroom is here!"
        });		
		}
      }