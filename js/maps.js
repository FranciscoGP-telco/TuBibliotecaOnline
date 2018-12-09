
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 12,
    center: {lat: -34.397, lng: 150.644}
  });
  geocoder = new google.maps.Geocoder();
  geocoderAddress(geocoder, map);
}

function geocoderAddress(geocoder, map) {
  var address = document.getElementById("mapaddress").innerHTML;
  geocoder.geocode({'address': address}, function(results, status) {
    if (status === 'OK') {
      map.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
        map: map,
        position: results[0].geometry.location
      });
    } else {
      console.log('Geocode falla por: ' + status);
    }
  });
}
