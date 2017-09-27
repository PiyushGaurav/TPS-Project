<?php 
include 'connect.php';
session_start();  
if(isset($_SESSION['Username'])) {     
    header("Location: index.php"); 
} 
 //set validation error flag as false 
$error = false;
if (isset($_REQUEST['Register'])) 
{

	if($_REQUEST['Username']=="" || $_REQUEST['Password']=="" || $_REQUEST['Email_id']="")
	{
	echo " Field must be filled";
	}
	else
	{     
        $Username = $_POST['Username'];
        $Password = $_POST['Password'];
        $CPassword= $_POST['CPassword'];
        $Email_id = $_POST['Email_id'];
        
        //name can contain only alpha characters and space     
        if (!preg_match("/^[a-zA-Z ]+$/",$Username)) {         
            $error = true;         
            $UsernameErr = "Name must contain only alphabets and space";     
        }     
        if(!filter_var($Email_id,FILTER_VALIDATE_EMAIL)) {         
            $error = true;         
            $Email_idErr = "Please Enter Valid Email ID";     
        }     
        if(strlen($Password) < 6) {         
            $error = true;         
            $PasswordErr = "Password must be minimum of 6 characters";     
        }     
        if($Password != $CPassword) {         
            $error = true;         
            $CPasswordErr = "Password and Confirm Password doesn't match";     
        }   
        
        if (!$error) {
            $insert = "INSERT INTO users_details(Username,Password,Email_id)VALUES('$Username','$Password','$Email_id')";
            if ($conn->query($insert) === TRUE) {
            header('Location:registration_success.php');
                } else {
                echo "Error: " . $insert . "<br>" . $conn->error;
                }        	
            }else{
            $errormsg = "Error in registering...Please try again later!";
        }
    }
}
mysqli_close($conn);
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
    height: auto;
}
         h3{
             color: white;
         }
        .container{
            color: aliceblue;
        }
      </style>   
      <style>
         .error {color: #FF0000;}
          p{color: white;}
    </style>

  </head>
  <body>

    <header>
        <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">TPS</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="index.php">Login</a></li>
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
                        			<h3>Register to our site</h3>
                            		<p>Enter your Details:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" class="login-form" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="Username">Username</label>
			                        	<input type="text" name="Username" placeholder="Username..." required value="<?php if (isset($Username)) echo $Username; ?>" class="form-control" id="Username">
                                         <span class="text-danger"><?php if (isset($UsernameErr)) echo $UsernameErr; ?></span> 
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="Password">Password</label>
			                        	<input type="password" name="Password" placeholder="Password..." maxlength="30" required class="form-control" id="Password">
                                         <span class="text-danger"><?php if (isset($PasswordErr)) echo $PasswordErr; ?></span>
                                        
			                        </div>
                                    <div class="form-group">
			                        	<label class="sr-only" for="CPassword">Confirm Password</label>
			                        	<input type="password" name="CPassword" placeholder="Confirm Password..." maxlength="30" required class="form-control" id="CPassword">
                                        <span class="text-danger"><?php if (isset($CPasswordErr)) echo $CPasswordErr; ?></span> 
                                        
			                        </div>
                                    <div class="form-group">
			                        	<label class="sr-only" for="Email_id">Email ID</label>
			                        	<input type="text" name="Email_id" placeholder="Email..." maxlength="30" required value="<?php if (isset($Email_id)) echo $Email_id; ?>" class="form-control" id="Email_id">
                                         <span class="text-danger"><?php if (isset($Email_idErr)) echo $Email_idErr; ?></span> 
            
			                        </div>
                                    
                                    <input type="submit" name="Register" value="Register" class="btn btn-success">
			                        <button type="reset" class="btn">Reset</button>
                                    <p>Already Registered <a href="LOGIN.php">Login here</a></p>
                                    
			                    </form>
                                <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span> 
		                    </div>
                        </div>
                    </div>
            <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
            <!-- // -->
            <div class="container">
                <hr />
                <div class="text-center center-block">
                    <p class="txt-railway">Contact us</p>
                <a href="https://www.facebook.com/piyush.gaurav3"><i class="fa fa-facebook-square fa-3x social"></i></a>
	            <a href="https://twitter.com/piyushgaurav007"><i class="fa fa-twitter-square fa-3x social"></i></a>
	            <a href="https://plus.google.com/100848083330770620615"><i class="fa fa-google-plus-square fa-3x social"></i></a>
	            <a href="mailto:piyushgaurav07@gmail.com"><i class="fa fa-envelope-square fa-3x social"></i></a>
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