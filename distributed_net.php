<!DOCTYPE html>
<?php $nav=3; ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>
    Distribution Network | Adister
  </title>
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
        }
               );
      }
        ;
       
       (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
          return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }
       (document, 'script', 'facebook-jssdk'));
  </script>
  <?php include './header.php'; ?>
  <hr>
  <section id="title" >
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="center gap">
            <h2>
              We Distribute in Major Cities
            </h2>
          </div>
          
        </div>
        <div class="col-sm-6">
          <div class="gap">
          </div>
          <blockquote>
            <h4>
              Started from dorms of IIT Roorkee, we are now operational across Delhi and Mumbai and are selling 1 lac+ notebooks a month
            </h4>
          </blockquote>
          <blockquote>
            <h4>
              These notebooks are sold via over 200+ retail outlets at low  cost ensuring it  swiftly  reaches  to the  right target group.
            </h4>
          </blockquote>
          <div class="gap">
          </div>
        </div>
        <div class="col-md-6" id="mapp">
          <center>
            <img id="map" src="adi_img/map_india.png" class="img-responsive ">
          </center>
        </div>
      </div>
      <hr>
    </div>
  </section>
  <div class="container">
    <center>
      <h4>
        If you cannot find adister at a specific area/store and you want them to please let us know @ 022-400 50 165 or write to us at hello@adister.in​
      </h4>
    </center>
  </div>
  
  <div class="gap">
  </div>
  
  
  <?php include "./footer.php" ?>
  
  <script src="js/jquery.js">
  </script>
  <script src="js/bootstrap.min.js">
  </script>
  <script src="js/jquery.prettyPhoto.js">
  </script>
  <script src="js/main.js">
  </script>
  </body>
</html>