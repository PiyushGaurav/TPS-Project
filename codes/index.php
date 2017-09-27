<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

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
        <div class="navbar navbar-default navbar-fixed-top navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="" class="navbar-brand">NRC</a>
				</div>
				<div class="collpase navbar-collapse" id="example">
					<ul class="nav navbar-nav">
						<li><a href="tour.html">Tour Registration</a></li>
						
					</ul>

					<a href="index.php" class="btn btn-primary navbar-btn">Total Registration</a>

					<form action="" class="navbar-form navbar-right" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="search this out">
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
            </div>
        </div>
      </header>
<?php 
include 'required.inc.php';
$User_id = $Password = $First_Name = $Last_Name = $Email_id = $Gender = $Department = $Designation = "";

$servername = "localhost";
$username = "root";
$Password = "";
$dbname = "railway_data";

// Create connection to database that already exists
$conn = new mysqli($servername, $username, $Password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if(isset($_POST['User_id']) && isset($_POST['Password']) && isset($_POST['First_Name']) && isset($_POST['Last_Name']) && isset($_POST['Gender'])  && isset($_POST['Department']) && isset($_POST['Designation']) && isset($_POST['Email_id'])){
$User_id    = $_POST['User_id'];
$Password 	= $_POST['Password'];
$First_Name = $_POST['First_Name'];
$Last_Name 	= $_POST['Last_Name'];
$Gender 	= $_POST['Gender'];
$Department = $_POST['Department'];
$Designation= $_POST['Designation'];
$Email_id   = $_POST['Email_id'];
}
$insert = "INSERT INTO users_details(User_id,Password,First_Name,Last_Name,Gender,Department,Designation,Email_id)VALUES($User_id,'$Password','$First_Name','$Last_Name','$Gender','$Department','$Designation','$Email_id')";


if ($conn->query($insert) === TRUE) {
    echo 'REGISTRATION SUCCESSFULL !!';
} else {
    echo "Error: " . $insert . "<br>" . $conn->error;
} 
//display server data to the web page 
$select = "SELECT * FROM users_details";
$result = $conn->query($select);
if ($result->num_rows > 0) {
    // output data of each row
	echo '<table class = "table table-hover">
        <caption><h3>TOTAL REGISTERED EMPLOYEE</h3></caption>
        <thead>
        <tr>
            <th><strong>ID</strong></th>
            <th>Passward</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Department</th>
            <th>Designation</th>
            <th>Email ID</th>
        </tr>
        <thead>';
    while($row = $result->fetch_assoc()) {
 		echo "<tbody><tr><td>" . $row["User_id"]. "</td><td>" . $row["Password"] . "</td><td> " . $row["First_Name"] . "</td><td> " . $row["Last_Name"]. "</td><td>" . $row["Gender"] . "</td><td>" . $row["Department"] . "</td><td>" . $row["Designation"] ."</td><td>". $row["Email_id"]."</td></tr><tbody>";
	} 
	echo "</table>";
}else {
    echo "0 results";
}
mysqli_close($conn);
?>
       <footer>
		<div class="container"> 
			<hr>

			<p>
				<small><a href="http://facebook.com">Like me</a> On facebook</small></p>
			<p>	<small><a href="http://twitter.com">Ask whatever </a> On Twitter</small></p>
			<p>	<small><a href="http://youtube.com">Subscribe me</a> On Youtube</small>
				
			</p>
		</div> <!-- end container -->
	</footer>

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>