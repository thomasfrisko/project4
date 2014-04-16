<?php 
session_start();
include('config/setup.php');
include('classes/page.class.php');

$current_page = new Page;
$page = $current_page->get_page();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>AAU Bait4/Inf4 Semester Project</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" href="/images/fav.ico" type="image/x-icon" />
</head>
<body>
	<?php
	include('template/menu.php');

	if($page == 'reserve')
	{
		include('content/reserve/reserve-step_1.php');
	}
	
	else if($page == 'reserve-step_2')
	{
		include('content/reserve/reserve-step_2.php');	
	}
	
	else
	{
		include('content/'.$page.'.php');
	}
	include('template/footer.php');
	?>	
</body>
</html>