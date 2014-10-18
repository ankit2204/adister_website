<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

    <header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><strong>adister</strong></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul id="nav" class="nav navbar-nav navbar-right">
                    <li><a href="index.php"> Home</a></li>
                    <li><a href="why_us.php">Why Us</a></li>
                    <li><a href="distributed_net.php">Distribution Network</a></li>
                    <li><a href="contact_us.php">Contact Us</a></li>
                    <li><a href="coupon.php">Coupons</a></li>
                    <li><a class="btn btn-danger" href="#login" data-toggle="modal">LogIn</a></li>
                </ul>
            </div>
        </div>
    </header>
        
         <div class="modal fade" id="login" role="dialog"> <!-- Login Form Start -->
            <div class="modal-dialog">
                <div class="modal-content">
                   <form class='form-horizontal'>
                        <div class="modal-header">
                            <h3>LOGIN</h3>
                        </div>
                       <hr>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for ="contact-name" class="col-lg-3 control-label">Userame/Email: </label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control"  id="contact-name" placeholder="Enter Username/Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for ="contact-password" class="col-lg-3 control-label">Password </label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control" id="contact-password" placeholder="Password">
                                </div>
                            </div>
                        </div>
                       <div class="modal-footer">
                            <a class="btn btn-default" data-dismiss = "modal">Close</a>
                            <button class="btn btn-primary" type="submit">LogIn</button>
                       </div>
                   </form>   
                </div>
            </div>
        </div>
        
    </body>
</html>
