
function initialize()
{

			
	var mapOptions =
	{
		zoom: 12,
		center: new google.maps.LatLng(57.048591, 9.917717),
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};	
	/* Map properties */
	
	map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
	/* Creation of map, using the map properties and placing it in the div id "map-canvas"*/

	var markerOptions =
	{
		position: new google.maps.LatLng(57.042014, 9.918715),
		map: map, /* Specifices if the marker should be seen in map mode or streetview mode (map or streetviewpanorama) */
		draggable: true,
		title: "Drag me"
	};
	/* Marker properties */
	
	marker = new google.maps.Marker(markerOptions);
	/* Creation of marker, using the marker properties */
	
	
	var currentLatitude = marker.getPosition().lat().toFixed(6);
	var currentLongtitude = marker.getPosition().lng().toFixed(6);
	/* Gets the position of the marker (getPosition()), which latitude and which langtitude the marker should be placed. we limit the amount of coordinates with toFixed(6), saying only 6 decimals 	    will be displayed */
	
	
	var infowindow = new google.maps.InfoWindow
	(
		{
			content: "Latitude: " + currentLatitude + "<br>" + " Longtitude: " + currentLongtitude
		}
	);
	/* Displays information within the infowindow */
	
	google.maps.event.addListener(marker, "click", function()
		{
			infowindow.open(map, marker);	
		}
	)
	/* a function which opens the infowindow, when the user "clicks" the infowindow  */
	
	google.maps.event.addListener(marker, "dragstart", function() {   
    infowindow.close();
    });
	/* a function which is called, whenever the user starts dragging the marker. 
	This closes the infowindow */

	google.maps.event.addListener(marker, "dragend", function() { 
	
	currentLatitude = marker.getPosition().lat().toFixed(6);
	currentLongtitude = marker.getPosition().lng().toFixed(6);
	/* Sets new latitude and longtitude, when the user has stopped dragging the marker */
	
    infowindow = new google.maps.InfoWindow({
	content: "Latitude: " + currentLatitude + "<br>" + " Longtitude: " + currentLongtitude});
	/* Sets the content in the info window */
	
    map.setCenter(marker.getPosition());  
	/* Sets the new center of map, at the new marker position */
	
    infowindow.open(map, marker);
	/* Opens infowindow */
	
	var geocoder = new google.maps.Geocoder(); /* Initiates geocoder variable */
	var latlng = new google.maps.LatLng(currentLatitude, currentLongtitude); /* sets latlng to the new latitude and longtitude */
	
			geocoder.geocode({'latLng': latlng}, function(results, status) 
			{

				if (results[0])   
				{
				  var adress = results[0].formatted_address;

				  document.getElementById("adress-txtfield").value = adress;
				}
			  		  
			}
			);
    });

}


google.maps.event.addDomListener(window, 'load', initialize); /* Execute the initialize() function that constructs the Map object on window load, to ensure that the map is placed on the page after the page is fully loaded: */