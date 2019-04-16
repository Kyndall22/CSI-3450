<?php 
 
$db_username = "root";
    $db_password = "";
    $db_name = "powerhouse_warehouse";
    // use $conn in mysqli_query
    $conn = mysqli_connect("localhost", $db_username, $db_password, $db_name);
    
    if ($conn->connect_error) {
        echo "<h1>Failled to connect to database: terminating</h1>";
        die("Program terminated");
    }
if ($conn->connect_error){
        
        die("Connection failed: ". $conn->connect_error);
    }
 
if ((isset($_POST['text'])) && (isset($_POST['password']))) {
        $username = $_POST['text'];
        $password = $_POST['password'];
        
        if ($userID = getUserID($conn, $username)) {
            if (userPasswordIsCorrect($conn, $userID, $password)) {
                $_SESSION['tey'] = $username;
                $_SESSION['nuID'] = $userID;
                header( "Location: home.html" );
            } else {
                header( "refresh:2; url=home.html" );
                exit;
            }
        } else {
            echo "Login Succesful";
            header("refresh:3; url=home.html");
        }
    } else {

    }
        


    function getUserID($conn, $username) {

    }

    // return the name of the user given the user's ID
    function getUserName($conn, $userID) {

    }
    
    function userPasswordIsCorrect($conn, $userID, $password) {
        $query = "SELECT COUNT(*) AS count FROM admins WHERE nuID = ${userID} AND nUpass = '${password}'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            return mysqli_fetch_assoc($result)['count'];
        } else {
            return -1;
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" a href="css\style.css">
	<link rel="stylesheet" a href="css\font-awesome.min.css">
</head>
<style>
body{
         background-image: url("https://images.pexels.com/photos/669578/pexels-photo-669578.jpeg?cs=srgb&dl=crossfit-dumbbell-equipment-669578.jpg&fm=jpg");
         background-repeat: repeat;
         background-size: 100%;
         margin: 2px;
         width: 100%;
         color: red;
         font-size: 22px;
         font-family: Arial, Helvetica, sans-serif;

}
.topnav {
  overflow: hidden;                                                                                                                             /* style of my page */          
  background-color:rgba(0,0,0,0.8);
}

.topnav a {
  float: left;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  font-family: 'Cinzel', serif;
}
a.active {
    background-color: red;
    color: white;
}

a:hover:not(.active) {
    background-color: rgba(0,0,0,0.5);
    color: white;
}
h1{

display: block;
position: absolute;
top: 352px;
font-size: 120px;
color: red;
font-family: 'Black Ops One', cursive;

    
    
</style>




<body>
<body>
    
    <div class="topnav">
            
                  <a href="home.html">Home</a>
                  <a href = "equipment.php">Equipment</a>
                  <a href ="signup.php">Create an account</a>
                  <a class="active" href ="login.php">Sign In</a>
            
</div>
    
    
    
    
	<div class="container">
	
		<form method = "post" action="login.php">
			<div class="form-input">
				<input type="text" name="text" placeholder="Enter User Name"/>	
			</div>
			<div class="form-input">
				<input type="password" name="password" placeholder="Password"/>
			</div>
			<input type="submit" type="submit" value="LOGIN" class="btn-login"/>
		</form>
	</div>
</body>
</html>
