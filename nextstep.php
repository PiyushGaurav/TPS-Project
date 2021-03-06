<?php
include_once 'connect.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>TPS for NCR</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
      
      
    <style>
        .jumbotron {
    background: url('image.jpg') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
    height: 100vh;;
        }   
      </style>    
        <style>
            .container {
            color: white;
        }
      </style>  
      <style>
         .error {color: #FF0000;}
    </style>

  </head>
  <body>

    <header>
        <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container-fluid">
        <!-- add header -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">TPS</a>
        </div>
        <div class="collpase navbar-collapse" id="example">
					<ul class="nav navbar-nav">
						<li><a href="tour.php">Take me to Tour</a></li>
						<li><a href="total.php">My Tour</a></li>
                        <li><a href="inbox.php">Inbox</a></li>
                        
					</ul>
        <!-- menu items -->
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav navbar-right">
                <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['Username'])) { ?>
                <li><p class="navbar-text navbar-text-active"><?php echo $_SESSION['Username']; ?></p></li>
                <li><a href="logout.php">Log Out</a></li>
                <?php } else { ?>
                <li><a href="LOGIN.php">Login</a></li>
                <li><a href="register.php">Sign Up</a></li>
                <?php } ?>
            </ul>
            </ul>
        </div>
    </div>
            </div>
        </nav>
        

		<div class="jumbotron">
			<div class="container">
                <h1 class="text-center">successfully Logged in !!! </h1>
                <div class="text-center">
                <a class="btn btn-primary btn-lg" role="button" href="tour.php">Take me to Tour</a>
                <a class="btn btn-primary btn-lg" role="button" href="total.php">My Tours</a>
                </div>
			</div> 
    
            <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
            <!-- // -->
            <div class="container">
                <div class="text-center center-block">
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <p class="txt-railway">Contact us</p>
                <a href="https://www.facebook.com/piyush.gaurav3"><i class="fa fa-facebook-square fa-3x social"></i></a>
	            <a href="https://twitter.com/piyushgaurav007"><i class="fa fa-twitter-square fa-3x social"></i></a>
	            <a href="https://plus.google.com/100848083330770620615"><i class="fa fa-google-plus-square fa-3x social"></i></a>
	            <a href="mailto:piyushgaurav07@gmail.com"><i class="fa fa-envelope-square fa-3x social"></i></a>
                <p>Created by Piyush Gaurav</p>
                </div>
            </div>
    		</div> 
      </header>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>   