<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>NCR</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
      
      
    <style>
        h1 {
            color: blueviolet;
        }
      </style>  

  </head>
  <body>

    
		<div class="jumbotron">
			<div class="container">
                <h1>Welcome to TPS</h1>
				<h2>Tour Program System for NCR</h2>
			</div> 
		</div> 
	
   
      
                    
                <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login to our site</h3>
                            		<p>Enter your userID and password to log on:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" class="login-form" role="form" method="post" action="login.php">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">UserID</label>
			                        	<input type="text" name="User_id" placeholder="UserID..." class="form-control" id="User_id">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="Password" placeholder="Password..." class="form-control" id="Password">
			                        </div>
			                        <button type="submit" class="btn btn-success" value="Submit">Login</button>
                                     <button type="reset" class="btn">Reset</button>
                                    
			                    </form>
		                    </div>
                        </div>
                    </div>
            
	
	<footer>
		<div class="container">
			<hr>

			<p>
				<small><a href="http://facebook.com/askorama">Like me</a> On facebook</small></p>
			<p>	<small><a href="http://twitter.com/wiredwiki">Ask whatever </a> On Twitter</small></p>
			<p>	<small><a href="http://youtube.com/wiredwiki">Subscribe me</a> On Youtube</small>
				
			</p>
		</div> <!-- end container -->
	</footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>   

<?php 
include 'required.inc.php';
include 'connect.php';



if (isset($_REQUEST['Submit'])) //here give the name of your button on which you would like    //to perform action.
{
// here check the submitted text box for null value by giving there name.
	if($_REQUEST['User_id']=="" || $_REQUEST['Password']=="")
	{
	echo " Field must be filled";
	}
	else
	{
	   $sql1= "select * from users_details where User_id= '".$_REQUEST['User_id']."' &&  Password ='".$_REQUEST['Password']."'";
	  $result=mysql_query($sql1)
	    or exit("Sql Error".mysql_error());
	    $num_rows=mysql_num_rows($result);
	   if($num_rows>0)
	   {
//here you can redirect on your file which you want to show after login just change filename ,give it to your filename.
		   //header("location:filename.php"); 
 //OR just simply print a message.
         Echo "You have logged in successfully";	
        }
	    else
		{
			echo "username or password incorrect";
		}
	}
}	

mysqli_close($conn);
?>