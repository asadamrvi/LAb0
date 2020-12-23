function initMap() {
    var mapLayer = document.getElementById("map-");

    var centerCoordinates = new google.maps.LatLng(32.66693151180426, 73.67081383320276);
    var defaultOptions = { center: centerCoordinates, zoom: 4 }

    map = new google.maps.Map(mapLayer, defaultOptions);
  }

  function locate(){

    if ("geolocation" in navigator){
      navigator.geolocation.getCurrentPosition(function(position){
        var currentLatitude = position.coords.latitude;
        var currentLongitude = position.coords.longitude;

        var infoWindowHTML = "Latitude: " + currentLatitude + "<br>Longitude: " + currentLongitude;
        var infoWindow = new google.maps.InfoWindow({map: map, content: infoWindowHTML});
        var currentLocation = { lat: currentLatitude, lng: currentLongitude };
        infoWindow.setPosition(currentLocation);

        map.setCenter(currentLocation);
        map.setZoom(10);

      });
    }
  }
