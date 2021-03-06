<?php 
include 'connect.php';
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
          h1{
              text-align: center;
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
        <div class="collpase navbar-collapse " id="example">
					<ul class="nav navbar-nav">
						<li><a href="tour.php">Take me to Tour</a></li>
						<li><a href="total.php">My Tour</a></li>
                        <li class="active"><a href="inbox.php">Inbox</a></li>
                        
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
      </header>
      
<?php 
$Username = $Password = $First_Name = $Last_Name = $Email_id = $Gender = $Department = $Designation = "";
$Date=$Source=$Destination=$Mode_of_travel=$Train_OR_Flight_No=$Arrival_time=$Departure_time="";
$logged_user="";
include 'connect.php';
session_start();
$logged_user=$_SESSION['Username'];
if(isset($_POST['Username']) && isset($_POST['First_Name']) && isset($_POST['Last_Name']) && isset($_POST['Gender'])  && isset($_POST['Department']) && isset($_POST['Designation']) && isset($_POST['Date']) && isset($_POST['Source']) && isset($_POST['Destination']) && isset($_POST['Mode_of_travel']) && isset($_POST['Train_OR_Flight_No'])  && isset($_POST['Arrival_time']) && isset($_POST['Departure_time'])) {   
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
$Train_OR_Flight_No = $_POST['Train_OR_Flight_No'];
$Arrival_time       = $_POST['Arrival_time'];
$Departure_time     = $_POST['Departure_time'];
    
}   
//display server data to the web page 
$select = "SELECT * FROM tours_details,inbox_details WHERE inbox_details.Username='$logged_user' AND tours_details.Tour_id=inbox_details.Tour_id"; 
$result = $conn->query($select);
if ($result->num_rows > 0) {
    // output data of each row
	echo '<div class"table-responsive">
        <table class = "table table-bordered table-hover"><br><br>
        <caption><h1>REQUEST FOR APPROVAL</h1></caption>
        <thead>
        <tr><th>Forword</th>
            <th>Tour id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Department</th>
            <th>Designation</th>
            <th>Date</th>
            <th>Source</th>
            <th>Destination</th>
            <th>Mode of travel</th>
            <th>Train/Flight No.</th>
            <th>Arrival time</th>
            <th>Departure time</th>
            <th>Message</th>
        </tr>
        <thead>';
    while($row = $result->fetch_assoc()) {
 		echo "<tbody><tr><td><a type='submit' class ='btn btn-sm ' role='button' href='forword_from_inbox.php?Tour_id=".$row['Tour_id']."'><span class='glyphicon glyphicon-send fa-2x' aria-hidden='true'></span></a></td><td>" . $row["Tour_id"]. "</td><td> " . $row["First_Name"] . "</td><td> " . $row["Last_Name"]. "</td><td>" . $row["Gender"] . "</td><td>" . $row["Department"] . "</td><td>" . $row["Designation"] ."</td><td>" . $row["Date"] ."</td><td>" . $row["Source"] ."</td><td>" . $row["Destination"] ."</td><td>" . $row["Mode_of_travel"] ."</td><td>". $row["Train_OR_Flight_No"]."</td><td>". $row["Arrival_time"]."</td><td>". $row["Departure_time"]."</td><td>".$row["Message"]."</td></tr><tbody>";
	} 
	echo "</table><div>";
}else {
    echo "<h1>Inbox is Empty</h1>";
}
mysqli_close($conn);
?>
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