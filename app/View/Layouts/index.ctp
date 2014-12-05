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
        
        <?php require('footer.php'); ?>

<script type="text/javascript">
    var delete_message = "削除します。一回消すと戻せないかもよ？"
</script>

<script>
    $(function() {
        setTimeout(function() {
            $('#flashMessage').fadeOut("slow");
        }, 1300);
    });
</script>

