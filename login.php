<?php
    session_start();
    
    if (!isset($_SESSION['company'])) {

        if(isset($_POST['email']) && isset($_POST['pass'])) {
            $email = htmlspecialchars(trim($_POST['email']));
            $pass = md5(htmlspecialchars(trim($_POST['pass'])));

            // Db
            include 'scripts/dbconnection.php';

            $query = "SELECT id from companies WHERE `company_email` = '".$email."' and `password` = '".$pass."'";
            $result = mysql_query($query) or die(mysql_error());
    
            if(mysql_num_rows($result) > 0) {
                while($row = mysql_fetch_array($result)) {
                    $_SESSION['company'] = $row['id'];
                }

                // if sucessful login, redirect to stats page
                if (isset($_SESSION['company'])) {
                    header('Location: stats.php');
                }
                else {
                    echo "<center>something went wrong<br></center>";
                }
            }
            else {
                // Invalid credentials
                // Show error along with login form
                echo "<center>invalid username or password<br><center>";
            }

            
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
    
        <title>Login | Adister</title>
    
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
        <center>
            <!-- Login Form Start -->
  <div class="modal-dialog">
    <div class="modal-content">
      <form class='form-horizontal' action="login.php" method="POST">
        <div class="modal-header">
          <h3>
            LOGIN
          </h3>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for ="contact-name" class="col-lg-3 control-label">
              Email: 
            </label>
            <div class="col-lg-9">
              <input type="email" class="form-control"  id="contact-name" name="email" placeholder="Enter Email" required>
            </div>
          </div>
          <div class="form-group">
            <label for ="contact-password" class="col-lg-3 control-label">
              Password: 
            </label>
            <div class="col-lg-9">
              <input type="password" class="form-control" id="contact-password" name="pass" placeholder="Password" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a class="btn btn-default" data-dismiss = "modal"> Close </a>
          <input class="btn btn-primary" name="submit" value="Login" type="submit">
        </div>
      </form>
      
    </div>
  </div>
        </center>
        <br>
        <br>

        <?php include './footer.php'; ?>
    </body>
</html>