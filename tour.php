<?php 
$Username = $Password = $First_Name = $Last_Name = $Email_id = $Gender = $Department = $Designation = "";
$Date=$Source=$Destination=$Mode_of_travel=$Train_OR_Flight_No=$Arrival_time=$Departure_time="";
$UsernameErr=$First_NameErr=$Last_NameErr=$GenderErr=$DepartmentErr=$DesignationErr=$DateErr=$SourceErr=$DestinationErr=$Mode_of_travelErr=$Train_OR_Flight_NoErr=$Arrival_timeErr=$Departure_timeErr="";
include 'connect.php';
session_start();
$p=0;
$error = false;
    if (isset($_REQUEST['Register'])) 
    {   

	if($_REQUEST['Username']=="" || $_REQUEST['First_Name']=="" || $_REQUEST['Last_Name']=""||$_REQUEST['Gender']=="" || $_REQUEST['Department']=="" || $_REQUEST['Designation']=""||$_REQUEST['Date']=="" || $_REQUEST['Source']=="" || $_REQUEST['Destination']=""||$_REQUEST['Mode_of_travel']=="" || $_REQUEST['Email_id']=""||$_REQUEST['Username']=="" || $_REQUEST['Train_OR_Flight_No']=="" || $_REQUEST['Arrival_time']=""||$_REQUEST['Departure_time']="")
	{
	echo " Field must be filled";
	}
	else
	{ 
        $Username           = $_POST['Username'];
        $First_Name         = $_POST['First_Name'];
        $Last_Name 	        = $_POST['Last_Name'];
        $Gender 	        = $_POST['Gender'];
        $Department         = $_POST['Department'];
        $Designation        = $_POST['Designation'];
        $Date               = $_POST['Date'];
        $Source             = $_POST['Source'];
        $Destination        = $_POST['Destination'];
        $Mode_of_travel     = $_POST['Mode_of_travel'];
        $Train_OR_Flight_No =$_POST['Train_OR_Flight_No'];
        $Arrival_time       = $_POST['Arrival_time'];
        $Departure_time     = $_POST['Departure_time']; 
        
        if (!preg_match("/^[a-zA-Z ]+$/",$Username)) {         
            $error = true;         
            $UsernameErr = "Name must contain only alphabets and space";     
        } 
        if (!preg_match("/^[a-zA-Z ]+$/",$First_Name)) {         
            $error = true;         
            $First_NameErr = "First Name must contain only alphabets and space";     
        } 
        if (!preg_match("/^[a-zA-Z ]+$/",$Last_Name)) {         
            $error = true;         
            $Last_NameErr = "Last Name must contain only alphabets and space";     
        } 
        if (empty($_POST['Gender'])) {
            $error=true;    
            $GenderErr = "Gender is required";
            }
        if (empty($_POST['Department'])) {
            $error=true;    
            $DepartmentErr = "choose Department";
            }
        if (empty($_POST['Designation'])) {
            $error=true;    
            $DesignationErr = "choose Designation";
            }
            $test_arr  = explode('/', $Date);
            if (count($test_arr) == 3) {
            if (!checkdate($test_arr[0], $test_arr[1], $test_arr[2])) {
            $DateErr="Invalid Date";
            } 
            }
           if (!preg_match("/^[a-zA-Z ]+$/",$Source)) {         
            $error = true;         
            $SourceErr = "Source must contain only alphabets and space";     
            } 
            if (!preg_match("/^[a-zA-Z ]+$/",$Destination)) {         
            $error = true;         
            $DestinationErr = "Destination must contain only alphabets and space";     
            } 
        if (empty($_POST['Mode_of_travel'])) {
            $error=true;    
            $Mode_of_travelErr = "choose Mode of travel";
            }
        if (!preg_match('/^[0-9]*$/', $Train_OR_Flight_No)) {
        $Train_OR_Flight_NoErr="Train OR Flight No must contain only digits";
        }
            //TO SET PRIORITY OF DESIGNATIONS
            if (!$error) {
             if($Designation=="GM"){
                 $p=1;
             } else if($Designation=="PHOD"){
                 $p=2;
             } else if($Designation=="HOD"){
                 $p=3;
             } else {
            $p=4;
            }
   
            $insert = "INSERT INTO tours_details
            (
            Username,
            First_Name,
            Last_Name,
            Gender,
            Department,
            Designation,
            P,
            Date,
            Source,
            Destination,
            Mode_of_travel,
            Train_OR_Flight_No,
            Arrival_time,
            Departure_time
            )VALUES('$Username','$First_Name','$Last_Name','$Gender','$Department','$Designation','$p','$Date','$Source','$Destination','$Mode_of_travel',$Train_OR_Flight_No,'$Arrival_time','$Departure_time'
            )";
            if ($conn->query($insert) === TRUE) { 
                header('Location:total.php');
                } else {
                echo "Error: " . $insert . "<br>" . $conn->error;
                }        	
            }else{
            $errormsg = "Error in registering...Please try again later!";
        }
    }
}

    
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
            
          .text-danger{
              color: red;
          }
      </style>
      <style>
          .jumbotron {
    background: url('image.jpg') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
 height: auto;
   
}
  
         .error {color: #FF0000;}
          .container{color: white;}
    </style>
	<title>INDIAN RAILWAYS</title>      
  </head>
  <body>
      <header>     
        <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container-fluid">
        
        <div class="collpase navbar-collapse" id="example">
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
						<li class="active"><a href="tour.php">Take me to Tour</a></li>
						<li><a href="total.php">My Tour</a></li>
                        <li><a href="inbox.php">Inbox</a></li>  
					</ul>
        
            <ul class="nav navbar-nav navbar-right">
                <ul class="nav navbar-nav navbar-right">
                    <li><i class="glyphicon glyphicon-user form-control-feedback"></i></li>
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
				<h1>TOUR</h1>
				<h3>REGISTRATION FORM</h3>
                
<form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">   
<div class = "form-group">
<label for = "Username" class="control-label col-sm-2">Username</label>
<div class="col-sm-10">
    <input type="text" name="Username" id="Username"   class = "form-control"  value="<?php if (isset($_SESSION['Username'])) { echo $_SESSION['Username'];}?>" required value="<?php if (isset($Username)) echo $Username; ?>" />
    <span class="text-danger"><?php if (isset($UsernameErr)) echo $UsernameErr; ?></span> 
    </div>
</div>
<div class = "form-group">
<label for ="First_Name" class="control-label col-sm-2">First Name</label>
<div class="col-sm-10">
    <input type="text" name="First_Name" id="First_Name"  class = "form-control"  required value="<?php if (isset($First_Name)) echo $First_Name; ?>" />
<span class="text-danger"><?php if (isset($First_NameErr)) echo $First_NameErr; ?></span> 
    </div>
    </div>

<div class = "form-group">
<label for = "Last_Name" class="control-label col-sm-2">Last Name</label>
<div class="col-sm-10">
    <input type="text" name="Last_Name"  class = "form-control" required value="<?php if (isset($Last_Name)) echo $Last_Name; ?>" />
<span class="text-danger"><?php if (isset($Last_NameErr)) echo $Last_NameErr; ?></span> 
    </div>
    </div>

<div class = "form-group">
<label for = "Gender" class="control-label col-sm-2">Gender</label>
    <div class="col-sm-10">
<input type="radio" name="Gender" id="Gender"  value="F" required value="<?php if (isset($Gender)) echo $Gender; ?>" >Female
<input type="radio" name="Gender" id="Gender" value="M" required value="<?php if (isset($Gender)) echo $Gender; ?>" >Male
<span class="text-danger"><?php if (isset($GenderErr)) echo $GenderErr; ?></span>
    </div>
    </div>
<div class = "form-group">    
<label for = "Department" class="control-label col-sm-2">Department</label>
    <div class="col-sm-10">
<select name = "Department" id = "Department"   class = "form-control" required value="<?php if (isset($Department)) echo $Department; ?>">
<option value="" selected>--choose--</option>
<option value = "ACCOUNT">ACCOUNT</option>
<option value = "MECHANICAL">MECHANICAL</option>
<option value = "STORE">STORE</option>
<option value = "ELECTRICAL">ELECTRICAL</option>
<option value = "MEDICAL">MEDICAL</option>
<option value = "IT">IT</option>
<span class="text-danger"><?php if (isset($DepartmentErr)) echo $DepartmentErr; ?></span>
</select>
    </div>
</div>

<div class = "form-group">
<label for = "Designation" class="control-label col-sm-2">Designation</label>
    <div class="col-sm-10">
<select name = "Designation" id = "Designation"  class = "form-control" required value="<?php if (isset($Designation)) echo $Designation; ?>">
<option value="" selected>--choose--</option>
<option value = "GM">GM</option>
<option value = "PHOD">PHOD</option>
<option value = "HOD">HOD</option>
<option value = "DEPUTY">DEPUTY</option>
<span class="text-danger"><?php if (isset($DesignationErr)) echo $DesignationErr; ?></span>
</select>
        </div>        
    </div>
<div class = "form-group">
<label for = "Date" class="control-label col-sm-2">Date</label>
<div class="col-sm-10">
    <input type="date" name="Date" id="Date"  class = "form-control" required value="<?php if (isset($Date)) echo $Date; ?>"/>
<span class="text-danger"><?php if (isset($DateErr)) echo $DateErr; ?></span>
    </div>
    </div>
    
<div class = "form-group">
<label for = "Source" class="control-label col-sm-2">Source</label>
<div class="col-sm-10">
    <input type="text" name="Source"  id="Source" class = "form-control" required value="<?php if (isset($Source)) echo $Source; ?>"/>
<span class="text-danger"><?php if (isset($SourceErr)) echo $SourceErr; ?></span>
    </div>
    </div>

    <div class = "form-group">
<label for = "Destination" class="control-label col-sm-2">Destination</label>
<div class="col-sm-10">
    <input type="text" name="Destination" id="Destination" class = "form-control" required value="<?php if (isset($Destination)) echo $Destination; ?>"/>
<span class="text-danger"><?php if (isset($DestinationErr)) echo $DestinationErr; ?></span>
    </div>
    </div>

    
    <div class = "form-group">
<label for = "Mode_of_travel" class="control-label col-sm-2">Mode_of_travel</label>
    <div class="col-sm-10">
<select name = "Mode_of_travel" id = "Mode_of_travel"  class = "form-control" required value="<?php if (isset($Mode_of_travel)) echo $Mode_of_travel; ?>" >
<option value="" selected>--choose--</option>
<option value = "Train">Train</option>
<option value = "Flight">Flight</option>
<option value = "Bus">Bus</option>
<option value = "Own Vehical">Own vehical</option>
<span class="text-danger"><?php if (isset($Mode_of_travelErr)) echo $Mode_of_travelErr; ?></span>
</select>
    </div>
</div>

<div class = "form-group">
<label for = "Train_OR_Flight_No" class="control-label col-sm-2">Train/Flight/bus Number</label>
<div class="col-sm-10">
    <input type="text" name="Train_OR_Flight_No" id="Train_OR_Flight_No" class = "form-control" required value="<?php if (isset($Train_OR_Flight_No)) echo $Train_OR_Flight_No; ?>"/>
<span class="text-danger"><?php if (isset($Train_OR_Flight_NoErr)) echo $Train_OR_Flight_NoErr; ?></span>
    </div>
    </div>
    
<div class = "form-group">
<label for = "Arrival_time" class="control-label col-sm-2">Arrival Time</label>
<div class="col-sm-10">
    <input type="time" name="Arrival_time" id="Arrival_time" class = "form-control" />
    </div>
    </div>
    
<div class = "form-group">
<label for = "Departure_time" class="control-label col-sm-2">Departure Time</label>
<div class="col-sm-10">
    <input type="time" name="Departure_time" id="Departure_time" class = "form-control" />
    </div>
    </div>   
    
<div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      
        <input type="submit" name="Register" value="Register" class="btn btn-success">
        <button type="reset" class="btn">Reset</button>
        <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
    </div>
</div>
 </form>
                 
			</div> 
		</div> 
	
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
