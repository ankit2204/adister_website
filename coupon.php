<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        
         <div id="gConnect">
             <center><h3>Login to get the coupon code</h3><center>
    <button class="g-signin"
        data-scope="https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read"
        data-requestvisibleactions="http://schemas.google.com/AddActivity"
        data-clientId="225063267207-b5agjavosn8bd1prpht26pv6l1fjqp9u.apps.googleusercontent.com"
        data-callback="onSignInCallback"
        data-theme="dark"
        data-cookiepolicy="single_host_origin"
        data-width="wide"
        data-height="tall"
        approvalprompt="force">
    </button>
  </div>
  <center>
  <div id="authOps" style="display:none">
    
    <button id="disconnect" class="btn btn-danger btn-lg">Logout</button>

    <h2>User's profile information</h2>
    <div id="profile"></div>

    <div id="form-coupon">
      <form method="POST" action="validate_form.php" id="form-id">
        <input type="text" id="code" name="code" placeholder="Enter coupon code" required />
        <input type="hidden" id="input_email" value="" name="input_email">
        <input type="hidden" id="input_name" value="" name="input_name">
        <input type="hidden" id="input_age" value="" name="input_age">
        <input type="hidden" id="input_sex" value="" name="input_sex">
        <input type="hidden" id="input_location" value="" name="input_location">

        <input type="submit" class="btn btn-primary" value="Submit" />
      </form>
	  <div id="display-coupon"></div>
    </div>
  </div>
  </center>

  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="js/app.js"></script>

<script type="text/javascript">
  (function() {
    var po = document.createElement('script');
    po.type = 'text/javascript'; po.async = true;
    po.src = 'https://plus.google.com/js/client:plusone.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(po, s);
  })();

  </script>

<!-- GOOGLE+ login script -->
<script type="text/javascript">
var helper = (function() {
  var BASE_API_PATH = 'plus/v1/';

  return {
    /**
     * Hides the sign in button and starts the post-authorization operations.
     *
     * @param {Object} authResult An Object which contains the access token and
     *   other authentication information.
     */
    onSignInCallback: function(authResult) {
      gapi.client.load('plus','v1', function(){
        
        if (authResult['access_token']) {
          $('#authOps').show();
          $('#gConnect').hide();
          helper.profile();
          
          //helper.people();
        } else if (authResult['error']) {
          // There was an error, which means the user is not signed in.
          // As an example, you can handle by writing to the console:
          console.log('There was an error: ' + authResult['error']);

          $('#authOps').hide();
          $('#gConnect').show();
        }
        console.log('authResult', authResult);
      });
    },

    /**
     * Calls the OAuth2 endpoint to disconnect the app for the user.
     */
    disconnect: function() {
      // Revoke the access token.
      $.ajax({
        type: 'GET',
        url: 'https://accounts.google.com/o/oauth2/revoke?token=' +
            gapi.auth.getToken().access_token,
        async: false,
        contentType: 'application/json',
        dataType: 'jsonp',
        success: function(result) {
          console.log('revoke response: ' + result);
          $('#authOps').hide();
          $('#profile').empty();          
          $('#gConnect').show();
          $('#display-coupong').hide();
        },
        error: function(e) {
          console.log(e);
        }
      });
    },

    /**
     * Gets and renders the currently signed in user's profile data.
     */
    profile: function(){
      var request = gapi.client.plus.people.get( {'userId' : 'me'} );
      request.execute( function(profile) {
        $('#profile').empty();
        if (profile.error) {
          $('#profile').append(profile.error);
          return;
        }

        var email = '';
        var location = '';

        if(profile['emails'])
        {
          for(i = 0; i < profile['emails'].length; i++)
          {
            if(profile['emails'][i]['type'] == 'account')
            {
              email = profile['emails'][i]['value'];
            }
          }
        }
 
        if(profile['placesLived']) {
            for(i = 0; i < profile['placesLived'].length; i++) {
                if(profile['placesLived'][i]['primary'] == true) {
                    location = profile['placesLived'][i]['value'];
                }
            } 
        }

        $('#profile').append(
            $('<p><img src=\"' + profile.image.url + '\"></p>'));
        $('#profile').append(
            $('<p>Hello ' + profile.displayName + '</p>'));
        $('#profile').append(
            $('<p id=' + 'email' + '>Your email : ' + email + '</p>'));

        document.getElementById("input_email").value = email;
        document.getElementById("input_name").value = profile.displayName;
        document.getElementById("input_sex").value = profile.gender;
        document.getElementById("input_age").value = profile.ageRange.min;
        document.getElementById("input_location").value = location;
      });
    }
  };
})();

/**
 * jQuery initialization
 */
$(document).ready(function() {
  $('#disconnect').click(helper.disconnect);
});

/**
 * Calls the helper method that handles the authentication flow.
 *
 * @param {Object} authResult An Object which contains the access token and
 *   other authentication information.
 */
function onSignInCallback(authResult) {
  helper.onSignInCallback(authResult);
}

</script>
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
