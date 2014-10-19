<?php
	// DB credentials
	$username = "adistim7_user";
	$password = "adister_coupons";
	$dbname = "adistim7_coupons";

	// Make DB connection
	mysql_connect("localhost", $username, $password) or die('could not connect to db');

	// Select DB
	mysql_select_db($dbname) or die('could not select db');
	
	//dont upload to github
?>