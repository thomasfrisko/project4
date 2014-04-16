<?php
	$db_host = 'localhost';
	$db_database = 'debatto_p4_project';
	$db_username = 'debatto_citybike';
	$db_password = 'bi403f14';
	
	$pdo = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_username, $db_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
?>

<!-- '77.66.44.88:3306' -->