//Function to start the google map
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 12,
    center: {lat: -34.397, lng: 150.644}
  });
  //create the geocoder
  geocoder = new google.maps.Geocoder();
  geocoderAddress(geocoder, map);
}
//geocoder function used to take the location with the address
function geocoderAddress(geocoder, map) {
  var address = document.getElementById("mapaddress").innerHTML;
  geocoder.geocode({'address': address}, function(results, status) {
    if (status === 'OK') {
      map.setCenter(results[0].geometry.location);
      //Marker needed to show it in the map
      var marker = new google.maps.Marker({
        map: map,
        position: results[0].geometry.location
      });
    } else {
      console.log('Geocode falla por: ' + status);
    }
  });
}
