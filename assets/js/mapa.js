
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

            var pos2 = {
              lat:  36.698075, lng:-6.112187
                 };
        map.setCenter(pos);

       
        marker = new google.maps.Marker({position: pos, map: map,label:'A',title:'Bar Sin Especificar'});
       
     /*   if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos2 = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            
          

          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
*/

  marker2 = new google.maps.Marker({position: pos2, map: map,label:'B',title:'Usted está aquí'});


function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
  infoWindow.open(map);
  

}

let directionsService = new google.maps.DirectionsService();
  let directionsRenderer = new google.maps.DirectionsRenderer();
  directionsRenderer.setMap(map); // Existing map object displays directions
  // Create route from existing points used for markers
  const route = {
      origin: pos,
      destination: pos2,
      travelMode: 'DRIVING'
  }

  directionsService.route(route,
    function(response, status) { // anonymous function to capture directions
      if (status !== 'OK') {
        window.alert('Directions request failed due to ' + status);
        return;
      } else {
        directionsRenderer.setDirections(response); // Add route to the map
        var directionsData = response.routes[0].legs[0]; // Get data about the mapped route
        if (!directionsData) {
          window.alert('Directions request failed');
          return;
        }
        else {
          document.getElementById('msg').innerHTML += "La distncia en coche es de " + directionsData.distance.text + " (" + directionsData.duration.text + ").";
        }
      }
    });

}

  



