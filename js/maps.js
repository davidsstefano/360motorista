


function initMap(){



    var map = new google.maps.Map(
            document.getElementById("googleMap"),
            {
                zoom:15,
                center: new google.maps.LatLng(-22.52306, -44.10417)
            }
     );



 google.maps.event.addDomListener(window, "load", initMap);

       
 const geocoder = new google.maps.Geocoder();
 document.getElementById("submit").addEventListener("click", () => {
   geocodeAddress(geocoder, map);
 });
}

function geocodeAddress(geocoder, resultsMap) {
 const address = document.getElementById("address").value;
 geocoder
   .geocode({ address: address })
   .then(({ results }) => {
     resultsMap.setCenter(results[0].geometry.location);
     new google.maps.Marker({
       map: resultsMap,
       position: results[0].geometry.location,
     });
   })
   .catch((e) =>
     alert("Geocode was not successful for the following reason: " + e)
   );

};

       
        