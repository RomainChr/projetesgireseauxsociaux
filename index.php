<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    session_start();

    require "facebook-php-sdk-v4-4.0-dev/autoload.php";

    const APPID = "451317511698280";
    const APPSECRET = "defa21c582018c4dc20e7a955b8a2e5c";
    
    FacebookSession::setDefaultApplication(APPID, APPSECRET);
    $helper = new FacebookRedirectLoginHelper("https://projetesgireseauxsociaux.herokuapp.com/");
    $helper = new FacebookRedirectLoginHelper($url_redirect);

    //$loginUrl = $helper->getLoginUrl();

    if(isset($_SESSION) && isset($_SESSION['fb_taken']))
    {
        $session = new Facebook($_SESSION['fb_token']);
    }
    else
    {
        $session = $helper->getSessionFromRedirect();
    }


//    try {
//        $session = $helper->getSessionFromRedirect();
//    } catch(FacebookRequestException $ex) {
//        // When Facebook returns an error
//    } catch(\Exception $ex) {
//        // When validation fails or other local issues
//    }
//    if ($session) {
//        // Logged in
//    }
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
         js.src = "//connect.facebook.net/fr_FR/sdk.js";
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
    <?php
        //Si variable de sessions existent et que $_SESSION ['fb_taken'] existe
        if($session)
        {
            $_SESSION['fb_token'] = (string) $session->getAccessToken();
            $user = new FacebookRequest($session,"GET","/me")->getGraphObject(Graph);
            $request_user_execute = $request_user->execute();
            $user = $request_user_executed->getGraph;
            
            //var_dump($session['fb_taken']);
            echo "Bonjour ".$user->getName();
        }
        //Sinon j'affiche le lien de connection
        else
        {
            $loginUrl = $helper->getLoginUrl();
            echo "<a href='".$loginUrl."'>Se connecter</a>";
        }
    ?>
</body>
</html>