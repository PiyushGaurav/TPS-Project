<?php 
include 'connect.php';
session_start();  
  //set validation error flag as false 
$error = false;
if (isset($_REQUEST['Forword'])) //here give the name of your button on which you would like    //to perform action.
{
// here check the submitted text box for null value by giving there name.
	if($_REQUEST['Tour_id']=="" || $_REQUEST['Username']=="")
	{
	echo " Field must be filled";
	}
	else
	{     
        $Tour_id = $_POST['Tour_id'];
        $Username= $_POST['Username'];
        $Password = $_POST['Password'];
        $Message=$_POST['Message'];
        
               
      
            $insert = "INSERT INTO inbox_details(Tour_id,Username,Message)VALUES('$Tour_id','$Username','$Message')";
            if ($conn->query($insert) === TRUE) {
                header('Location:total.php');
                echo "Your details have been forworded";
                } else {
                echo "Error: " . $insert . "<br>" . $conn->error;
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
        <div class="collpase navbar-collapse" id="example">
					<ul class="nav navbar-nav">
						<li><a href="tour.php">Take me to Tour</a></li>
						<li><a href="total.php">My Tour</a></li>
                        <li><a href="inbox.php">Inbox</a></li>
                        
					</ul>
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
        
      </header>
      <div class="jumbotron">
<div class="container">
    <h3>Forword this to your senior</h3>
    <form class ="form-horizontal" role="form" id="ForwordForm" method="post" action="forword.php">  
        <div class = "form-group">
            <label for = "Tour_id" class="control-label col-sm-2" value="">Tour_id</label>
            
          <div class="col-sm-10">
            <input type="text" name="Tour_id" id="Tour_id"   class = "form-control" value="<?php echo $_GET['Tour_id'];
            ?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for = "Tour_id" class="control-label col-sm-2">Forword to</label>
            <div class="col-sm-10">
             <select name="Username" id="Username" class="form-control">
            <option value="" selected >--choose--</option>
            <?php 
            include 'connect.php';
                 session_start();
                $logged_user=$_SESSION["Username"];
                $select = "SELECT * from tours_details WHERE Username='$logged_user'";
                $result = $conn->query($select);
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { 
                    
                    
                    
                    switch($row["P"]){
                        case 2:
                            $select2 = "SELECT First_Name,Last_Name,Username FROM tours_details WHERE tours_details.Designation= 'GM'"; 
                            $result2 = $conn->query($select2);
                            if ($result2->num_rows > 0) {
                            while($row = $result2->fetch_assoc()) {
                            $Username=$row["Username"]   ;   
                            $name=$row["First_Name"].' '.$row["Last_Name"];
                            echo "<option value='$Username'>$name</option>";  
                            
                            }
                            }
                            break;
                        case 3:
                            $select3 = "SELECT First_Name,Last_Name,Username FROM tours_details WHERE tours_details.Designation= 'PHOD' OR tours_details.Designation= 'GM'"; 
                            $result3 = $conn->query($select3);
                            if ($result3->num_rows > 0) {
                            while($row = $result3->fetch_assoc()) {
                            $Username=$row["Username"]   ;   
                            $name=$row["First_Name"].' '.$row["Last_Name"];
                            echo "<option value='$Username'>$name</option>";  
                            
                            }
                            }
                            break;
                        case 4:
                            $select4 = "SELECT First_Name,Last_Name,Username FROM tours_details WHERE tours_details.Designation= 'HOD' OR tours_details.Designation= 'PHOD' OR tours_details.Designation= 'GM'"; 
                            $result4 = $conn->query($select4);
                            if ($result4->num_rows > 0) {
                            while($row = $result4->fetch_assoc()) {
                            $Username=$row["Username"]   ;   
                            $name=$row["First_Name"].' '.$row["Last_Name"];
                            echo "<option value='$Username'>$name</option>";  
                           
                            }
                            }
                             break;
                        default:
                    }
                    
                    
                     } } ?>
                   </select> 
                </div>        
        </div>
                        
        <div class="form-group">
            <label for="Message" class="control-label col-sm-2 ">Message</label>
            <div class="col-sm-10">
            <textarea name = "Message"id="Message" class="form-control" rows="3" placeholder="Enter your message"></textarea>
        </div>
        <div class="form-group">
         <div class="col-sm-offset-2 col-sm-10" >  
                <input type="submit" name="Forword" value="Forword" class="btn btn-success">
			 <button type="reset" class="btn">Reset</button>

            </div>

          </div>
        </div>
    </form>
          </div>
      </div>

      <footer>
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
            <!-- // -->
            <div class="container">
                <hr />
                <div class="text-center center-block">
                    <p class="txt-railway">Contact us</p>
                    <br />
                <a href="https://www.facebook.com/piyush.gaurav3"><i class="fa fa-facebook-square fa-3x social"></i></a>
	            <a href="https://twitter.com/piyushgaurav007"><i class="fa fa-twitter-square fa-3x social"></i></a>
	            <a href="https://plus.google.com/100848083330770620615"><i class="fa fa-google-plus-square fa-3x social"></i></a>
	            <a href="mailto:piyushgaurav07@gmail.com"><i class="fa fa-envelope-square fa-3x social"></i></a>
                </div>
            </div> 
      </footer>

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>      
    </body>
</html>