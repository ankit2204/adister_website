<?php
    session_start();

    if (!isset($_SESSION['company'])) {

        if(isset($_POST['user']) && isset($_POST['pass'])) {
            $user = htmlspecialchars(trim($_POST['user']));
            $pass = htmlspecialchars(trim($_POST['pass']));

            // Make DB connection
            


            $_SESSION['company'] = 
        }
        else {
            echo "<center>something went wrong<br></center>";
        }
    }
    else {
        header('Location: stats.php');
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
    
        <title>Coupon | Adister</title>
    
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
    
    </head>
    
    <body>
        <?php include './header.php'; ?>
        
         
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

        
        <?php include './footer.php'; ?>
    </body>
</html>

