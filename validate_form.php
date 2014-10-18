<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if(empty($_POST["input_email"]) or empty($_POST["code"])) {
			http_response_code(403);
    		echo "error";
			exit();
    	}


    	$DEBUG = false;

    	$username = "";
    	$password = "";
    	$dbname = "";

    	if($DEBUG) {
    	   	$username = "root";
    		$password = "";
    		$dbname = "adister_coupons";
    	}
    	else {
    		$username = "adistim7_user";
    		$password = "adister_coupons";
    		$dbname = "adistim7_coupons";
    	}

        $code = trim($_POST['code']);
    	$email = trim($_POST['input_email']);
    	$name = trim($_POST['input_name']);
    	$sex = trim($_POST['input_sex']);
    	$location = trim($_POST['input_location']);
    	$age = trim($_POST['input_age']);

    	if($code == "1adister1" || $code == "1ADISTER1") {
    		mysql_connect("localhost", $username, $password) or die('could not connect to db');
    		mysql_select_db($dbname) or die('could not select db');

    		$table_name = "1adister1";

        	$query = "SELECT 1adister1_id from `".$table_name."` WHERE `email` = '".$email."'";
        	
        	$result = mysql_query($query) or die(mysql_error());

        	if(mysql_num_rows($result) > 0) {
        		// This user has already used this code        		
				
        		$disp = "adister150";
        		
				http_response_code(200);
				
        		echo "<p>Your coupon code for <a href='http://www.bewakoof.com'>Bewakoof.com</a> is: <span class='disp-code'>".$disp."</span></p>";
        		echo "<p><strong>T&C</strong> : Flat Rs. 150 off on all products at Bewakoof.com. No minimum purchase required.</p>";
        	}
        	else {
        		// New user 
        		// Log him into the db and display the coupon

        		$query = "INSERT into `1adister1` (name, email, location, sex, age) VALUES( '".$name."', '".$email."', '".$location."', '".$sex."', '".$age."')";
        		
        		$result = mysql_query($query) or die(mysql_error());
				
				$disp = "adister150";
				
				http_response_code(200);
        		
        		echo "<p>Your coupon code for <a href='www.bewakoof.com'>Bewakoof.com</a> is: <span class='disp-code'>".$disp."</span></p>";
        		echo "<p><strong>T&C</strong> : Flat Rs. 150 off on all products at Bewakoof.com. No minimum purchase required.</p>";
        	}
    	}
    	else {
    		http_response_code(200);
        	echo "Wrong coupon code";
    	}

		//http_response_code(200);
		//echo "Success";
	}
	else {
		 // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
	}
?>


<?php
/*
    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {


    	if(empty($_POST["input_email"]) or empty($_POST["code"])) {
    		http_response_code(403);
    		echo "error";
    		exit();
    	}

    	$username = "root";
        $password = "";
        $dbname = "adister_coupons";

    	$DEBUG = 0;
    	if($DEBUG = 0) {
    		$username = "adistim7_user";
        	$password = "adister_coupons";
        	$dbname = "adistim7_coupons";
    	}

    	$code = $_POST['code'];
    	$email = $_POST['input_email'];

    	if(!$DEBUG) {
    		echo $code.'<br />';
    		echo $email.'<br />';        
    	}

        mysql_connect("localhost", $username, $password) or die('could not connect to db');

        mysql_select_db($dbname) or die('could not select db');

        $query = "SELECT * from `coupons_released` WHERE coupon_code = '".$code."'";

        $result = mysql_query($query) or die(mysql_error());

        if(mysql_num_rows($result) > 0) {
        	// Entered coupon code is valid
        	// Additional check may be added for expiry date

        	$table_name = $code;

        	$query = "SELECT * from `".$table_name."` WHERE `used` = 1 and `used_by` = '".$email."'";
        	
        	$result = mysql_query($query) or die(mysql_error());

        	if(mysql_num_rows($result) > 0) {
        		// This user has already used this code
        		// Display him the previous result itself

        		$disp = "";
        		
        		while($row = mysql_fetch_assoc($result)) {
        			$disp = $row["coupon_code"];
        		}

        		http_response_code(200);
        		echo "Thank You! Your coupon code: ".$disp;
        	}
        	else {
        		

        		$query = "SELECT * from `".$table_name."` WHERE `used`= 0 LIMIT 1";
        		
        		$result = mysql_query($query) or die(mysql_error());

        		$table_id = $table_name."_id";	
        		$id = 0;
        		$disp = "";

        		if(mysql_num_rows($result) > 0) {

        			while($row = mysql_fetch_assoc($result)) {
        				$id = $row[$table_id];
        				$disp = $row["coupon_code"];
        			}

        			$query = "UPDATE `".$table_name."` SET `used_by` = '".$email."', `used` = 1 WHERE `".$table_id."` = '".$id."'";
        			$result = mysql_query($query) or die(mysql_error());

        			http_response_code(200);
        			echo "Thank You! Your coupon code: <span id='code_disp'".$disp."></span>";
        		}
        		else {
        			http_response_code(200);
        			echo "Invalid code";	
        		}

        	}

        }
        else {
        	// Invalid code
        	http_response_code(200);

        	echo "Invalid Code";
        }

        mysql_close();
        
    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }
*/
?>
