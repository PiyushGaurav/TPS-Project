<?php 
session_start();
if(isset($_SESSION['Username'])!="") {
    header("Location: index.php");
}
include_once 'connect.php';

if (isset($_REQUEST['Submit'])) //here give the name of your button on which you would like    //to perform action.
{
// here check the submitted text box for null value by giving there name.
	if($_REQUEST['Username']=="" || $_REQUEST['Password']=="")
	{
	echo " Field must be filled";
	}
	else
	{     
        $Username = $_POST['Username'];
        $Password = $_POST['Password'];
	   $select= "select * from users_details where Username= '".$Username."' &&  Password ='".$Password."'";
        $result = $conn->query($select);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $_SESSION['Username'] = $row['Username'];
                $_SESSION['Password'] = $row['Password'];
                header("Location: nextstep.php");
            }
        }else {
          $errormsg = "Incorrect Email or Password!!!"; 
    }
        
	 
	}
}


mysqli_close($conn);
?>
<!DOCTYPE html>
<html class="full" lang="en" >
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
    height: 100vh;
}
        .container{
            color: aliceblue;
        }
        
        .fa fa-lock {
            color: white;
        }
        
        p{
            color: white;
        }
        h3{
            color: white;
        }
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
        </nav>
		<div class="jumbotron">
			<div class="container">
                <h1 class="text-center">Welcome to TPS</h1>
				<h3 class="text-center">Tour Program System for NCR</h3>
			</div> 
             <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login to our site</h3>
                            		<p>Enter your Username and Password to Log in:</p>
                        		</div>
                        		<div class="form-top-right">
                                    <i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-group has-feedback has-feedback-left">
			                    <form role="form" class="login-form" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="Username">Username</label>
			                        	<input type="text" name="Username" placeholder="Username..." class="form-control" id="User_id" maxlength="30">
                                        <i class="glyphicon glyphicon-user form-control-feedback"></i>
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="Password">Password</label>
			                        	<input type="password" name="Password" placeholder="Password..." class="form-control" id="Password" maxlength="30">
			                        </div>
                                    <!--<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>-->
                                    <input type="submit" name="Submit" value="Login" class="btn btn-success">
			                        <button type="reset" class="btn">Reset</button>
                                    <p>New User ? <a href="register.php">Register here</a></p>
                                    
			                    </form>
                                 <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span> 
		                    </div>
                        </div>
                    </div>
            <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
            <div class="container">
                <div class="text-center center-block">
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