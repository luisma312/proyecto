
var map, infoWindow,autocompletar;
var pos = {
  lat:  36.912365,
  lng: -6.086858
     };
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 36.912365, lng: -6.086858},
    zoom: 15
  });
      
  infoWindow = new google.maps.InfoWindow;

        

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

 


function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
  infoWindow.open(map);
  

}


    var restriccion ={componentRestrictions:{country: 'es'}};
    var input = document.getElementById('drc');
    autocompletar=new google.maps.places.Autocomplete(input,restriccion);


  


}
  function calculaRuta(){

    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 36.912365, lng: -6.086858},
      zoom: 15
    });
    
    document.getElementById('msg').innerHTML="";
      var place = autocompletar.getPlace();
      
      var latitud = place.geometry.location.lat();

      var longitud = place.geometry.location.lng();
      
      var pos2 = {
        lat:  latitud, lng: longitud
           };


      

      var directionsService = new google.maps.DirectionsService();
      var directionsRenderer = new google.maps.DirectionsRenderer();
      directionsRenderer.setMap(map);
       // Existing map object displays directions
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
  



