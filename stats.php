<?php
    session_start();
    
    if(!isset($_SESSION['company'])) {
        header('Location: index.php');
    }

    $company = $_SESSION['company'];

    $code = "all";

    if(isset($_GET['code']) && !empty($_GET['code'])) {
        $code = trim(htmlspecialchars($_GET['code']));
    }

    // Variables used on the page
    $advertizer_name = "default";
    $total_sold = 0;
    $total_hits = 0;

    $today = date("Y-m-d H:i:s");

    $age_0_13 = 0;
    $age_14_18 = 0;
    $age_19_44 = 0;
    $age_45 = 0;

    $male = 0;
    $female = 0;

    $last_week = 0;
    $last_month = 0;
    $last_day = 0;

    $mumbai = 0;
    $delhi = 0;

    // Db
    include 'scripts/dbconnection.php';

    $query = "SELECT `company_name` FROM `companies` WHERE id = '".$company."'";

    $result = mysql_query($query) or die(mysql_error());
    
    if(mysql_num_rows($result) > 0) {
        while($row = mysql_fetch_array($result)) {
            $advertizer_name = $row['company_name'];
        }

        // if here
        if (strcmp($advertizer_name, "default") == 0) {
            // couldnot find the correct company name
            // show error
            die("<center>something went wrong<br></center>");
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
    
        <title>Stats | Adister</title>
    
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
    
        <link rel="shortcut icon" href="http://adister.in/assets/ico/favicon.png">
    
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://adister.in/assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://adister.in/assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://adister.in/assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="http://adister.in/assets/ico/apple-touch-icon-57-precomposed.png">
    
        <link rel="stylesheet" href="style.css">
        
        <script type="text/javascript">
            function coupon_code_change() {
                var x = document.getElementById("coupon_code").value;
                document.getElementById("demo").value = x;
            }
        </script>

    </head>
    
    <body>
        <?php include './header.php'; ?>
        
        <center>
            Select your coupon:
            <select id = "coupon_code" onchange="coupon_code_change()">
                <option value = "all">All</option>

                <?php
                    $query = "SELECT coupon_code FROM `coupon_codes` WHERE `company_id` = '".$company."'";    
                    $result = mysql_query($query) or die(mysql_error());

                    while($row = mysql_fetch_array($result)) {
                        $str = "<option value = '";
                        $str .= $row['coupon_code'];
                        $str .= "' ";
                        if(strcmp($row['coupon_code'], $code) == 0) 
                            $str .= "selected>";
                        else $str .= ">";
                        $str .= $row['coupon_code'];
                        $str .= "</option>";

                        echo $str;
                        echo "<br>";
                    }
                ?>
            </select>

            <form id="stats_form" method="GET" action="stats.php">
                <input id = "demo" type="hidden" name="code" value="" />
                <input type="submit" value="Submit" />
            </form>

            <?php
                if(strcmp($code, "all") != 0) {
                    $query = "SELECT * FROM `used_coupons` WHERE `code_released` = '".$code."' and `company_id` = '".$company."'";    
                } 
                else {
                    $query = "SELECT * FROM `used_coupons` WHERE `company_id` = '".$company."'";      
                }

                $result = mysql_query($query) or die(mysql_error());
        
                $total_hits = mysql_num_rows($result);
                

                while($row = mysql_fetch_array($result)) {
                    $two_days_back = date_sub(date_create(date('Y-m-d H:i:s')), date_interval_create_from_date_string('2 days'));
                    $week_back = date_sub(date_create(date('Y-m-d H:i:s')), date_interval_create_from_date_string('8 days'));
                    $month_back = date_sub(date_create(date('Y-m-d H:i:s')), date_interval_create_from_date_string('31 days'));
                    

                    if(date_create($row['used_time']) >= $week_back) {
                        $last_week += 1;
                    }
                    if(date_create($row['used_time']) >= $month_back) {
                        $last_month += 1;
                    }
                    if(date_create($row['used_time']) >= $two_days_back) {
                        $last_day += 1;
                    }

                    $q = "SELECT * FROM `users` WHERE `id` = '".$row['user_id']."'";
                    $r = mysql_query($q) or die(mysql_error());


                    while ($newrow = mysql_fetch_array($r)) {
                        if(strcmp($newrow['location'],"mumbai") == 0) $mumbai += 1;
                        else $delhi += 1;

                        if(intval($newrow['age']) > 44) $age_45 += 1;
                        else if(intval($newrow['age']) > 12 and intval($newrow['age']) < 18) $age_14_18 += 1;
                        else if(intval($newrow['age']) > 17 and intval($newrow['age']) < 45) $age_19_44 += 1;
                        else {
                            $age_0_13 += 1;
                        }

                        if(intval($newrow['sex']) == 0) {
                            $male += 1;
                        }
                        else $female += 1;

                    }
                    
                }

                echo "<br>";
                echo $advertizer_name;
                
                echo "<br>";
                echo "<br>";
                echo "Total Notebooks sold: ".$total_sold;
                echo "<br>";

                echo "<br>";
                echo "Total hits: ".$total_hits;
                echo "<br>";

                echo "<br>";
                echo "Today: ".$last_day;
                echo "<br>";

                echo "<br>";
                echo "This week: ".$last_week;
                echo "<br>";

                echo "<br>";
                echo "This month: ".$last_month;
                echo "<br>";
            ?>

            <?php include 'scripts/chartvalues.php'; ?>
    <!--Div that will hold the pie chart-->
    <div id="age_div"></div>
    <div id="gender_div"></div>
        </center>
            
            <br>
            <br>
            <br>
            <br>
        
    <?php include './footer.php'; ?>


    <!-- JS for the page -->
    
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
        google.load('visualization', '1.0', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawAll);

        function drawAll() {
            drawAge();
            drawGender();
        }

        function drawAge() {
            // Create the data table.
            var a = document.getElementById('age_0_13').value;
            var b = document.getElementById('age_14_18').value;
            var c = document.getElementById('age_19_44').value;
            var d = document.getElementById('age_45').value;

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Age Group');
            data.addColumn('number', 'count');
            data.addRows([
                ['0-13', parseInt(a)],
                ['14-18', parseInt(b)],
                ['19-44', parseInt(c)],
                ['45+', parseInt(d)],                
            ]);

            // Set chart options
            var options = {'title':'Age Group',
                            'is3D': true,
                            'backgroundColor': '#f5f5f5'
                        };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('age_div'));
            chart.draw(data, options);
        }
        function drawGender() {
            // Create the data table.
            var a = document.getElementById('male').value;
            var b = document.getElementById('female').value;

            var data2 = new google.visualization.DataTable();
            data2.addColumn('string', 'Gender');
            data2.addColumn('number', 'count');
            data2.addRows([
                ['male', parseInt(a)],
                ['female', parseInt(b)],
            ]);

            // Set chart options
            var options = {'title':'Gender',
                           'pieHole': 0.4,
                            'backgroundColor': '#f5f5f5'
                        };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('gender_div'));
            chart.draw(data2, options);
        }
    </script>
    </body>
</html>