<?php

class Table_arrangement
{
	function distance_sort($distance_array)
	{
		
			for($i = 0 ; $i < count($distance_array) ; $i++)
			 {
				for($j = 0 ; $j < count($distance_array)-1 ; $j++)
							{
								if($distance_array[$j][4] > $distance_array[$j+1][4])
								{
									$temp;
									$temp = $distance_array[$j];
									$distance_array[$j] = $distance_array[$j+1];
									$distance_array[$j+1] = $temp;
								}	
							}		
			 }
			 
			 return $distance_array;	
	}	
	
	
	
	function alpha_sort($alpha_array)
	{
		for($i = 0 ; $i < count($alpha_array) ; $i++)
			 {
				for($j = 0 ; $j < count($alpha_array)-1 ; $j++)
							{
								if($alpha_array[$j][2] > $alpha_array[$j+1][2])
								{
									$temp;
									$temp = $alpha_array[$j];
									$alpha_array[$j] = $alpha_array[$j+1];
									$alpha_array[$j+1] = $temp;
								}	
							}		
			 }
			 
		
			 return $alpha_array;
	}
	
	
	function show_stations($station_array, $amount_of_bikes)
	{
		$amount_of_bikes = $_POST['reserve-amount_of_bikes'];
		$_SESSION['reserve-amount_of_bikes'] = $amount_of_bikes;
	
			for($i = 0 ; $i < count($station_array) ; $i++)
					{
						if(isset($_POST['remove_stations']))
						{	
							if($amount_of_bikes <= $station_array[$i][3])
								{
									$bikes_available = true;	
								}
								
							 else
							 	{
									$bikes_available = false;	
								}
									if($bikes_available == true)
									{
										echo "<tr>";
										if($bikes_available == true)
										{
										?>
										<td><input type="radio" name="station_choice" value="<?php echo $station_array[$i][0]; ?>"></td>
										<?php
										}
										else{?> <td> </td> <?php }
										
										echo "<td>"; echo $station_array[$i][2]; echo "</td>";
										echo "<td>"; echo $station_array[$i][4]. " km"; echo "</td>";
										echo "<td>"; echo $station_array[$i][0]; echo "</td>";
										echo "<td>"; echo $station_array[$i][3]; echo "</td>";
										echo "<td>"; 
										echo "<div class='status-green'> </div>";
										echo "</td>";
										echo "</tr>"; 
									}
								
						}
							
						else
						{
								if($amount_of_bikes <= $station_array[$i][3])
								{
									$bikes_available = true;	
								}
								
							 	else
							 	{
									$bikes_available = false;	
								}
								
								echo "<tr>";
								if($bikes_available == true)
								{
								?>
								<td><input type="radio" name="station_choice" value="<?php echo $station_array[$i][0]; ?>"></td>
								<?php
								}
								else{?> <td> </td> <?php }
								
								echo "<td>"; echo $station_array[$i][2]; echo "</td>";
								echo "<td>"; echo $station_array[$i][4]. " km"; echo "</td>";
								echo "<td>"; echo $station_array[$i][0]; echo "</td>";
								echo "<td>"; echo $station_array[$i][3]; echo "</td>";
								echo "<td>";
								if($amount_of_bikes <= $station_array[$i][3])
								{
									echo "<div class='status-green'> </div>";	
								}
								
								else
								{
									echo "<div class='status-red'> </div>";	
								}
								echo "</td>";
						}
	
					}	
					
	}
	
}

?>