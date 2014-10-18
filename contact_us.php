<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Contact Us | Adister</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link rel="shortcut icon" href="http://adister.in/assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://adister.in/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://adister.in/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://adister.in/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="http://adister.in/assets/ico/apple-touch-icon-57-precomposed.png">
    
</head>
<body>
     <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '246522242213413',
          xfbml      : true,
          version    : 'v2.1'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
    
    <?php include './header.php'; ?>
   
    <div class="gap"></div>
    <hr>
     <section id="about-us" class="container">
        <div class="row">
            <div class="col-sm-6">
                <h3><i class="icon-envelope"> </i>&nbsp;&nbsp;Mail Us :</h3>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hello@adister.in</p>
                <div class="gap"></div>
                <h3><i class="icon-phone"> </i>&nbsp;&nbsp;Call Us :</h3>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; +91-998 7172 666</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 022-400 50 165</p>
                <div class="gap"></div>
                
            </div><!--/.col-sm-6-->
            <div class="col-sm-6">
                <h3>Mumbai</h3>
                <p>311A, E Wing, Kailas Industrial Complex Hiranandani</p>
                <p> Link Road, Vikhroli West, Mumbai-400079</p>
                <div class="gap"></div>
                <h3>Delhi</h3>
                <p>39-A/3rd Floor, Oppo. Asiad Tower, Shahpur Jat,</p>
                <p>New-Delhi-110048</p>
                <div class="gap"></div>
                <h3>Allahabad</h3>
                <p>12, Chak, Zero Road, Allahabad (U.P)-211003</p>
                <div class="gap"></div>
            </div><!--/.col-sm-6-->
        </div><!--/.row-->
     </section>
    <hr>
    
    <div class="gap"></div>
  

    <?php include "./footer.php" ?>
    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>