<?php
include ('classes/sort.class.php');

if(isset($_SESSION['user_adress']) && $_SESSION['station_array'])
{	
	$user_adress = $_SESSION['user_adress'];
	$station_array = $_SESSION['station_array'];

	if(isset($_POST['sort_by']) && $_POST['sort_by'] == "alpha")
	{
		
		$alpha_sort = new Table_arrangement();
		$station_array = $alpha_sort->alpha_sort($station_array);
	}

	else
	{
		$sort_array = new Table_arrangement();
		$station_array = $sort_array->distance_sort($station_array);
	}
}

if(isset($_POST['station_choice']))
{
	$selected_station_array = array();
	
	for($i = 0 ; $i < count($station_array) ; $i++)
	{
		if($_POST['station_choice'] == $station_array[$i][0])
		{
			$selected_station_array[0] = $station_array[$i][0];
			$selected_station_array[1] = $station_array[$i][1];
			$selected_station_array[2] = $station_array[$i][2];
			$selected_station_array[3] = $station_array[$i][3];
			$selected_station_array[4] = $station_array[$i][4];
			$selected_station_array[5] = $_SESSION['reserve-amount_of_bikes'];
		}
	}
}



?>
<header>    
	<div id="header-wrapper">
		<div id="reserve-sort">
			<form action="index.php?page=reserve-step_2" method="post">
				<table>
					<tr>
						<td><label for="reserve-sort_by_distance">Sort by distance:</label></td>
						<td><input type="radio" name="sort_by" id="reserve-sort_by_distance" value="distance" checked></td>
					</tr>
					<tr>
						<td><label for="reserve-sort_by_name">Sort by name:</label></td>
						<td><input type="radio" name="sort_by" id="reserve-sort_by_name" value="alpha"></td>
					</tr>
					<tr>
						<td><label for="reserve-remove_stations">Remove unqualified stations:</label></td>
						<td><input type="checkbox" name="remove_stations" id="reserve-remove_stations" value="1"></td>
					</tr>
					<tr>
						<td><label for="reserve-amount_of_bikes">How many bikes would you like to reserve?</label></td>
						<td>
							<select name="reserve-amount_of_bikes">
								<option value="1">1 Bike</option>
								<option value="2">2 Bikes</option>
								<option value="3">3 Bikes</option>
								<option value="4">4 Bikes</option>
								<option value="5">5 Bikes</option>
							</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td><input name="submit" type="submit" value="Sort" class="button-input" /></td>
					</tr>
				</table>
			</form>
		</div>
		<div class="logo"></div>
		<div id="reserve_step-wrapper">
			<div class="reserve_step-passive"></div>
			<div class="reserve_step-active"></div>
			<div class="reserve_step-passive"></div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</header>
<div id="content-wrapper">
	<div class="content-left_row">
		<div id="reserve-table">
			<form action="index.php?page=reserve-step_2" method="post">
				<table>
					<tr>
						<th>Select</th>
						<th>Station Address:</th>     
						<th>Distance:</th>                
						<th>Station No:</th>
						<th>Bikes:</th>
						<th>Status:</th>
						
					</tr>
					
					<?php
					
					if(!isset($_POST['reserve-amount_of_bikes']))
					{
						$_POST['reserve-amount_of_bikes'] = 1;	
					}
					
					$show_stations = new Table_arrangement();
					$station_array = $show_stations->show_stations($station_array, $_POST['reserve-amount_of_bikes']);
					?>
					
				</table>
			</div>
			<input type="submit" name="select_station" id="select_station">
		</form>

		<form action="index.php?page=reserve" method="post">
			<input type="submit" name="back" id="back" value="Back">
		</form>
		
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