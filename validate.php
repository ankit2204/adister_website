<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(empty($_POST["input_email"]) or empty($_POST["code"])) {
            http_response_code(403);
            echo "error";
            exit();
        }

        include 'scripts/dbconnection.php';
        
        $code = strtolower(trim($_POST['code']));
        $email = trim($_POST['input_email']);
        $name = trim($_POST['input_name']);
        $sex = trim($_POST['input_sex']);
        $location = strtolower(trim($_POST['input_location']));
        $age = trim($_POST['input_age']);
        
        date_default_timezone_set('Asia/Calcutta');
        $date = date('m-d-Y h:i:s a', time());

        if(strcmp($sex,"male") == 0) $sex = 0;
        else $sex = 1;
        
        date_default_timezone_set('Asia/Calcutta');
        $date = date('m-d-Y h:i:s a', time());
        
        
        // Check if user exists
        $query = "SELECT id from users WHERE `email` = '".$email."'";
        $result = mysql_query($query) or die(mysql_error());

        if(mysql_num_rows($result) == 0) {
            // First time user
            // Login him/her into users table
            $query = "INSERT INTO users (name, email, sex, location,age) VALUES ('".$name."', '".$email."', '".$sex."', '".$location."', '".$age."')";
            $result = mysql_query($query) or die(mysql_error());
        }

        $query = "SELECT id from users WHERE `email` = '".$email."'";
        $result = mysql_query($query) or die(mysql_error());

        $row = mysql_fetch_assoc($result);
        
        $user_id = $row['id'];
        

        $query = "SELECT * from `coupons` WHERE coupon_key = '".$code."'";

        $result = mysql_query($query) or die(mysql_error());

        if(mysql_num_rows($result) > 0) {
            // Entered coupon code is valid
            // Additional check for expiry date
            $row = mysql_fetch_assoc($result);

            if(date_create($row['expiry_date']) < date_create(date('Y-m-d H:i:s'))) {
                
                http_response_code(200);
                echo "coupon expired";
            }
            else {

                $uniqueness=$row['uniqueness'];

                $coupon_id=$row['id'];

                $company_id=$row['company_id'];

                if($uniqueness==2) {

                    $query = "SELECT * from coupon_codes WHERE coupon_id =  '".$coupon_id."'";

                    $result = mysql_query($query) or die(mysql_error());
                    if(mysql_num_rows($result) > 0) {
                        $disp = "";
                
                        while($row = mysql_fetch_assoc($result)) {
                            $disp = $row["coupon_code"];
                        }

                        http_response_code(200);
                        echo "Thank You! Your coupon code: ".$disp;

                        $query = "INSERT INTO used_coupons(user_id, coupon_id, company_id, code_released) VALUES ('".$user_id."', '".$coupon_id."', '".$company_id."', '".$disp."')";
                        $result = mysql_query($query) or die(mysql_error());

                    }
                    else{
                        echo"valadity of coupon has expired";
                    }
                }
                else {

                    $query = "SELECT * from `coupon_codes` WHERE coupon_id =  '".$coupon_id."' and `released_to` = '".$user_id."'";

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

                        $query = "INSERT INTO used_coupons(user_id, coupon_id, company_id, code_released) VALUES ('".$user_id."', '".$coupon_id."', '".$company_id."', '".$disp."')";
                        $result = mysql_query($query) or die(mysql_error());
                    }
                    else {
        
                        $query = "SELECT * from `coupon_codes` WHERE `coupon_id`= '".$coupon_id."' and `released_to` = 0 ";
                
                        $result = mysql_query($query) or die(mysql_error());

                        $disp = "";

                        if(mysql_num_rows($result) > 0) {

                            while($row = mysql_fetch_assoc($result)) {
                                $id = $row['id'];
                                $disp = $row["coupon_code"];
                                $query = "INSERT INTO used_coupons(user_id, coupon_id, company_id, code_released) VALUES ('".$user_id."', '".$coupon_id."', '".$company_id."', '".$disp."')";
                                $result = mysql_query($query) or die(mysql_error());
                            }

                            $query = "UPDATE `coupon_codes` SET `released_to` = '".$user_id."' WHERE `id` = '".$id."'";
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
            }
        }
        else {
        // Invalid code
        http_response_code(200);
        echo "Invalid Code";
    }
}

    else {
        // Invalid code
        http_response_code(200);
        echo "Invalid Code";
    }

?>