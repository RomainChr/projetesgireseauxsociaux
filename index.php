<?php
    
    require "facebook-php-sdk-v4-4.0-dev/autoload.php"

    const APPID = "451317511698280";
    const APPSECRET = "defa21c582018c4dc20e7a955b8a2e5c";
    
    FacebookSession::setDefaultApplication(APPID, APPSECRET);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '451317511698280',
      xfbml      : true,
      version    : 'v2.3'
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
    <h1>Mon App</h1>
    <div
        class="fb-like"
        data-share="true"
        data-width="450"
        data-show-faces="true">
    </div>
</body>
</html>