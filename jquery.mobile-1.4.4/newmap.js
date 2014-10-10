//function initialize() {
//   
//    
//    alert("map");
//    var myOptions = {
//        zoom: 8,
//        center: latlng
////        mapTypeId: google.maps.MapTypeId.ROADMAP
//    }; 
//    alert("map");
//    alert("map");
//    var latlng = new google.maps.LatLng(5.0, 8.0);
//    alert("map");
//     var map = new google.maps.Map(document.getElementById("viewbus"), myOptions);
//   
//    var marker = new google.maps.Marker
//            (
//                    {
//                        position: new google.maps.LatLng(5,8),
//                        map: map,
//                        title: 'Click me'
//                    }
//                    
//            );
//    
//    var infowindow = new google.maps.InfoWindow({
//        content: 'Location info:<br/>Country Name:<br/>LatLng:'
//    });
//    google.maps.event.addListener(marker, 'click', function () {
//        // Calling the open method of the infoWindow 
//        infowindow.open(map, marker);
//    });
//
//}/*  
// * To change this license header, choose License Headers in Project Properties.
// * To change this template file, choose Tools | Templates
// * and open the template in the editor.
// */
//
//  
$( document ).on( "pagecreate", "#map-page", function() {
    var defaultLatLng = new google.maps.LatLng(34.0983425, -118.3267434);  // Default to Hollywood, CA when no geolocation support
    if ( navigator.geolocation ) {
        function success(pos) {
            // Location found, show map with these coordinates
            drawMap(new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude));
        }
        function fail(error) {
            drawMap(defaultLatLng);  // Failed to find location, show default map
        } 
        // Find the users current position.  Cache the location for 5 minutes, timeout after 6 seconds
        navigator.geolocation.getCurrentPosition(success, fail, {maximumAge: 500000, enableHighAccuracy:true, timeout: 6000});
    } else {
        drawMap(defaultLatLng);  // No geolocation support, show default map
    }
    function drawMap(latlng) {
        var myOptions = {
            zoom: 10,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
        // Add an overlay to the map of current lat/lng
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            title: "Greetings!"
        });
    }
});