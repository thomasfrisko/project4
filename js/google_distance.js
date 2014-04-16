/*
function bubble_sort(sort_array)
{
	for(var i = 0 ; i < sort_array.length ; i++)
		 {
			for(var j = 0 ; j < sort_array.length-1 ; j++)
						{
							if(sort_array[j][0] > sort_array[j+1][0])
							{
								var temp;
								temp = sort_array[j];
								sort_array[j] = sort_array[j+1];
								sort_array[j+1] = temp;
							}	
						}		
		 }
		 
		 
		 return sort_array;	 
}
*/

function getDistances(adress)
{
	
	var db_info = document.getElementById("db_info").value;
	
	var stations = JSON.parse(db_info);

	user_adress = adress;

	var formatted_stations = [];
	
	for(var i = 0 ; i < stations.length ; i++)
	{
		formatted_stations[i] = stations[i][0];
	}
	
	
	var service = new google.maps.DistanceMatrixService();
	service.getDistanceMatrix( /* Calls the function to request data from Google */
	  {
		origins: [user_adress], /* These are the adresses/latlng we are starting from */
		destinations: formatted_stations, /* These are the destinations, which we try to measure the distance to */
		travelMode: google.maps.TravelMode.WALKING, /* The property which specifies how the people transport */
		unitSystem: google.maps.UnitSystem.METRIC, /* Unit to measure distance  */
	  }, callback);

	function callback(response, status) 
	{
	
		
		if (status == google.maps.DistanceMatrixStatus.OK)  /* if the request was accepted by Google requirements */
		{
			var formatted_user_adress = response.originAddresses; 
			var formatted_station = response.destinationAddresses;
			/* Gets the user_adress and stations in formated arrays */
			
			var valid = formatted_user_adress[0].match(/[^a-zA-Z0-9]/);
				
			
			if(valid)
			{		
			
				
				var info = ""; /* initiates variable to hold output information  */
				
				
				var distance_array = [];
				var k = 1;
				
				for (var i = 0 ; i < formatted_user_adress.length ; i++) /* Takes the length of the "origins" array */
				{
					  var results = response.rows[i].elements;
					  /* Here we get the response, where it compares a(or each) user adress with all the stations */
					  
					  for (var j = 0 ; j < results.length ; j++) 
					  {
						var compare = results[j];
						var distance = compare.distance.text;
						var user_adress = formatted_user_adress[i];
						var station = formatted_station[j];
						
						var number_distance = distance.split(" ");
						
						var change_string = number_distance[0].replace(',','.'); 
						
						var id = k;
						
						distance_array[j] = [id, change_string];	
					 		
						k++;
					  }
				 }
				 
				/*
				 var distance = bubble_sort(distance_array); 
				 */
	
				 
				 var JSON_array = JSON.stringify(distance_array);
				 
				 document.getElementById("distance").value = JSON_array;
				 	
	  	 	}
			
			
		}
		
		else
		{
			console.log("Something went wrong!");	
		}
		
		document.getElementById("adress-form").submit();

	}
	
	
}