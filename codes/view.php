<?php 
include 'required.inc.php';
$id = $passward = $firstname = $lastname = $email = $gender = $branch = "";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_databse";

// Create connection to database that already exists

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if(isset($_POST['id']) && isset($_POST['passward']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email'])  && isset($_POST['gender']) && isset($_POST['branch'])){
$id 		= $_POST['id'];
$passward 	= $_POST['passward'];
$firstname 	= $_POST['firstname'];
$lastname 	= $_POST['lastname'];
$email 		= $_POST['email'];
$gender 	= $_POST['gender'];
$branch     = $_POST['branch'];
}

$insert = "INSERT INTO users_details(id, passward, firstname, lastname, email , Gender , branch)VALUES($id,'$passward','$firstname','$lastname','$email','$gender','$branch')";


if ($conn->query($insert) === TRUE) {
    echo "New record created successfully ".'<br><br>';
} else {
    echo "Error: " . $insert . "<br>" . $conn->error;
} 
 
echo '<br><br>'."<a href = '#register'><strong>REGISTER NEW USER</strong></a> ".'<br><br>'; 
echo '<br><br>'."<strong>CURRENT DATA</strong> ".'<br><br>'; 

//display server data to the web page 
$select = "SELECT * FROM users_details";
$result = $conn->query($select);
if ($result->num_rows > 0) {
    // output data of each row
	echo "<table border ='1' cellpadding = '10'><tr>
            <th>ID</th>
            <th>Passward</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email ID</th>
            <th>Gender</th>
            <th>Branch</th>
        </tr>";

    while($row = $result->fetch_assoc()) {
 		echo "<tr><td>" . $row["id"]. "</td><td>" . $row["passward"] . "</td><td> " . $row["firstname"] . "</td><td> " . $row["lastname"]. "</td><td>" . $row["email"] . "</td><td>" . $row["Gender"] . "</td><td>" . $row["branch"] ."</td></tr>";
	} 
	echo "</table>";
}else {
    echo "0 results";
}
?>


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
					<a href="http://www.ncr.indianrailways.gov.in/" class="navbar-brand">NCR</a>
				</div>
				<div class="collpase navbar-collapse" id="example">
					<ul class="nav navbar-nav">
						<li><a href="">Link1</a></li>
						<li class="active"><a href="">Link2</a></li>
					</ul>

					<a href="" class="btn btn-primary navbar-btn">Total Participants</a>

					<form action="" class="navbar-form navbar-right" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="search this out">
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>

			</div>
		</div>

		<div class="jumbotron">
			<div class="container">
				<h1>NORTH CENTRAL RAILWAY</h1>
				<h3>REGISTRATION FORM</h3>
			</div> 
		</div> 
	</header>
      
      
    
 
      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>