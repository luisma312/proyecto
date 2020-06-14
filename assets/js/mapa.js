
var map, infoWindow;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 36.912365, lng: -6.086858},
    zoom: 15
  });
  infoWindow = new google.maps.InfoWindow;

        var pos = {
         lat:  36.912365,
         lng: -6.086858
            };

       infoWindow.setPosition(pos);
       infoWindow.setContent('Nos encontramos aquí');
       infoWindow.open(map);
       map.setCenter(pos);

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
  infoWindow.open(map);
  google.maps.event.trigger(map, "resize");
}
}