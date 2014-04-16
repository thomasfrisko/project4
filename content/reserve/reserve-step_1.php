<?php	
	if(isset($_POST['adress-txtfield']))
	{	
		$distance = $_POST['distance'];
		$distance_array = json_decode($distance);
		
		$_SESSION['user_adress'] = $_POST['adress-txtfield'];

		
		global $pdo;
		$query =  $pdo->prepare("SELECT DISTINCT(station_slot.station_id), station.name, station.address, SUM(station_slot.`status`) FROM station INNER JOIN station_slot ON(station_slot.station_id 	        = station.station_id) GROUP BY station.station_id;");
		$query->execute();
		
		$station_array = array();
		
		$j = 0;
		
		while($result = $query->fetch(PDO::FETCH_NUM))
		{
			$station_array[$j][0] = $result[0];
			$station_array[$j][1] = $result[1];
			$station_array[$j][2] = $result[2];
			$station_array[$j][3] = $result[3];
			
			for($i = 0 ; $i < count($distance_array) ; $i++)
			{
				if($result[0] == $distance_array[$i][0])
				{
					$station_array[$j][4] = $distance_array[$i][1];
				}	
			}
			
			$j++;
		}
		
		$_SESSION['station_array'] = $station_array;
		
		header('location: index.php?page=reserve-step_2');
	
	}
	
	
	
	
	$query = $pdo->prepare("SELECT address FROM station"); 
	$query->execute();
	
	$stations = array();
	$i = 0;
	
	while($result = $query->fetch(PDO::FETCH_NUM))
	{
		$stations[$i][0] = $result[0];
		
		$i++;
	}
	
	$stations_json = json_encode($stations);
?>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkubb7ykZSrwN3uEGy1dWAgPJvFXMeZO0&sensor=false"> </script>
<script type="text/javascript" src="js/google_maps.js"> </script>
<script type="text/javascript" src="js/google_distance.js"> </script>
<script type="text/javascript" src="js/alert.js"> </script>

<header>
	<div id="header-wrapper">
		<form id="adress-form" name="adress-form" action="index.php?page=reserve" method="post" >
			<p id="adress-message">In order to find the station nearst you, please enter either your current adress in the field underneath or pick a station from the map.</p>
			<input name="adress-txtfield" id="adress-txtfield" type="search" value="John F. Kennedys Plads 1, 9000 Aalborg, Danmark" required autofocus />
			<input name="next" type="button" value="Next" id="adress-next" onclick="getDistances(document.getElementById('adress-txtfield').value)" class="button-input" />
            <input name="distance" id="distance" type="hidden" value="" /> 
            <input name="db_info" id="db_info" type="hidden" value='<?php echo $stations_json; ?>' />
		</form>
        
     
		<div class="logo"></div>
		<div id="reserve_step-wrapper">
			<div class="reserve_step-active"></div>
			<div class="reserve_step-passive"></div>
			<div class="reserve_step-passive"></div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</header>

<div id="content-wrapper">
	<div class="content-left_row">	
    	<div id="map-canvas" style="height: 600px; width: 100%;">
        </div>
    </div>
    
	<div class="content-right_row">
		<div id="login-wrapper">
			<form name="login-form" class="login-form" action="" method="post">
				<div class="login-header">
					<h1>Login</h1>
				</div>
				<div class="login-content">
					<input name="username" type="text" id="login-username"  placeholder="Username" />
					<input name="password" type="password" id="login-password" placeholder="Password" />
				</div>
				<div class="login-footer">
					<input type="submit" name="submit" value="Register" id="login-register" class="button-input"/>
					<input type="submit" name="submit" value="Login" id="login-submit" class="button-input"/><br/>
					<input type="submit" name="submit" value="Forgot your account?" id="login-forgot_your_account" class="button-input"/>
				</div>
			</form>
		</div>
	</div>
	<div class="clear"></div>
</div>
