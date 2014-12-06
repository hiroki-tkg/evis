<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Evitter</title>
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="keywords" content="">
        <meta name="description" content="">

        <link rel="shortcut icon" href="favicon_16.ico"/>
        <link rel="bookmark" href="favicon_16.ico"/>

        <!-- CSS & Js -->
        <?php 
        echo $this->Html->css('site.min');
        echo $this->Html->css('style');
        echo $this->Html->css('colorbox');
        
        echo $this->Html->script( 'site.min', array( 'inline' => false ) );
        echo $this->Html->script( 'ajaxButton', array( 'inline' => false ) );
        echo $this->Html->script( 'jquery.colorbox', array( 'inline' => false ) );
        echo $this->Html->script( 'jquery.infinitescroll', array( 'inline' => false ) );
        echo $this->Html->script( 'main', array( 'inline' => false ) );
        ?>       
        
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
        <!--[if lt IE 9]>
            <?php echo $this->Html->script( 'html5shiv', array( 'inline' => false ) ); ?>
            <?php echo $this->Html->script( 'respond.min', array( 'inline' => false ) ); ?>            
        <![endif]-->

        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

        <?php
            echo $this->fetch('meta');
            echo $this->fetch('css');
            echo $this->fetch('script');
            echo $this->Html->meta('icon');
        ?>

    </head>
    
    <body class="home">

        <div class="docs-header header--noBackground">
            <!--nav-->
            <nav class="navbar navbar-default navbar-custom" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>    
                        <?php echo $this->Html->link( $this->Html->image(
                            'logo.png', array('alt' => 'logo', 'border' => '0', 'class' => 'logo')), '/',
                            array('escape' => false));
                        ?>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a class="nav-link" href="/albums">アルバム</a></li>
                            <li><a class="nav-link user_name" href="/users/page/<?php echo $user['id']; ?>"><?php echo $user['username']; ?></a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <?php echo $this->Session->flash(); ?>

            <div class="index">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                
                                    <?php echo $this->fetch('content'); ?>

                                
                                <div class="col-sm-3 col-md-3">
                                    <h2>ここにadとかお知らせとか</h2>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>           
    
            </div>

<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '{1492040851061804}',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.1' // use version 2.1
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
</script>

<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->

<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>

<div id="status">
</div>


        
        <?php require('footer.php'); ?>

<script type="text/javascript">
    var delete_message = "削除します。一回消すと戻せないかもよ？"
</script>
