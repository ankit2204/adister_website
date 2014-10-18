<?php
    
    // function to get the current page name
    function curPageName() {
        return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
    }

    $page = curPageName();
    $home = "";
    $coup = "";
    $whyus = "";
    $dist = "";
    $cont = "";
    
    if(strcmp($page, "index.php") == 0) $home='active';
    else if(strcmp($page, "coupon.php") == 0) $coup='active';
    else if(strcmp($page, "why_us.php") == 0) $whyus='active';
    else if(strcmp($page, "distributed_net.php") == 0) $dist='active';
    else if(strcmp($page, "contact_us.php") == 0) $cont='active';


?>
<header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">
          Toggle navigation
        </span>
        <span class="icon-bar">
        </span>
        <span class="icon-bar">
        </span>
        <span class="icon-bar">
        </span>
      </button>
      <a class="navbar-brand" href="index.php">
        <strong>
          adister
        </strong>
      </a>
    </div>
    <div class="collapse navbar-collapse">
      <ul id="nav" class="nav navbar-nav navbar-right">
        <li class="<?php echo $home ?>">
            <a href="index.php">Home</a>
        </li>
        <li class="<?php echo $whyus ?>">
            <a href="why_us.php">Why Us</a>
        </li>
        <li class="<?php echo $dist ?>">
            <a href="distributed_net.php">Distribution Network</a>
        </li>
        <li class="<?php echo $cont ?>">
            <a href="contact_us.php">Contact Us</a>
        </li>
        <li class="<?php echo $coup ?>">
            <a href="coupon.php">Coupons</a>
        </li>
        <?php
            if(isset($_SESSION['company'])) {
                echo '<li><a class="btn btn-danger" href="stats.php"> My Ads </a></li>';
                echo '<li><a class="btn btn-danger" href="logout.php"> Logout </a></li>';
            }
            else {
                echo '<li><a class="btn btn-danger" href="#login" data-toggle="modal">Login</a></li>';
            }
        ?>
      </ul>
    </div>
  </div>
</header>

<div class="modal fade" id="login" role="dialog">
  
  <!-- Login Form Start -->
  <div class="modal-dialog">
    <div class="modal-content">
      <form class='form-horizontal' action="login.php" method="POST">
        <div class="modal-header">
          <h3>
            LOGIN
          </h3>
        </div>
        <hr>
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
</div>
