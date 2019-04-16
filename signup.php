<?php
$output = NULL;

if(isset($_POST['submit'])) {
    
    //connect to database
    $conn = mysqli_connect("localhost","root","","powerhouse_warehouse");
    
    //check connection
    
    if ($conn->connect_error){
        
        die("Connection failed: ". $conn->connect_error);
    }
    
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $businessname = $_POST['businessname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    
    //inserting the record
    
    $insert = $conn->query("INSERT INTO customer(cFName,cLName,cBusinessName,cAddress,cEmail,cCity,cZip) VALUES('$firstname','$lastname','$businessname','$email','$address','$city','$zip')");
    
        if($insert != TRUE){
        
            $output ="There was a problem <br />";
            $output .= $conn-> error;
        }else{
        
            $output = $firstname . " ,you have been registered";
    }
}

?>

<!DOCTYPE html>
<html lang = "en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<link href="https://fonts.googleapis.com/css?family=Black+Ops+One|Stardos+Stencil" rel="stylesheet"> 
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
</head>



<body>
<div class="topnav">
            
                  <a href="home.html">Home</a>
                  <a href = "equipment.php">Equipment</a>                      
                  <a class="active" href ="signup.php">Create an account</a>
                  <a href ="login.php">Log In</a>
            
</div>
<form method="POST" action="signup.php">
<table>
<tr>
    <td>First Name:</td>
    <td><input type = "text" name ="firstname" /></td>    
</tr>
<tr>
    <td>Last Name:</td>
    <td><input type = "text" name ="lastname" /></td>    
</tr>
<tr>
    <td>Business Name:</td>
    <td><input type = "text" name ="businessname" /></td>    
</tr>   
<tr>
    <td>Email:</td>
    <td><input type = "text" name ="email" /></td>    
</tr>
<tr>
    <td>Address:</td>
    <td><input type = "text" name ="address" /></td>    
</tr>
<tr>
    <td>City:</td>
    <td><input type = "text" name ="city" /></td>    
</tr>
<tr>
    <td>Zip:</td>
    <td><input type = "text" name ="zip" /></td>    
</tr>
</table>
<input type ="SUBMIT" name ="submit" value="Register" />

</form>

<?php
echo $output;
?>



      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
