<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `equipment` WHERE CONCAT(`eName`, `eType`, `eCost`, 'eQuantity') LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `equipment`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "powerhouse_warehouse");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
    
        <style>
            
            body{
                background-image: url("https://images.pexels.com/photos/1552103/pexels-photo-1552103.jpeg?cs=srgb&dl=adult-athlete-barbell-1552103.jpg&fm=jpg");
                background-repeat: repeat;
                background-size: 100%;
                margin: 0;
                width: 100%;

            }
            table,tr,th,td
            {
                border: 2px solid white;
                font-family: Arial, Helvetica, sans-serif;
                font-size: 15px;
                color: white;
                font-weight: bold;
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
            }
        </style>
    </head>
    <body>
        
        <div class="topnav">
            
                  <a href="home.html">Home</a>
                  <a class = "active" href = "equipment.php">Equipment</a>               
                  <a href ="signup.php">Create an account</a>
                  <a href ="login.php">Log In</a>
            
</div>
      <br>  
        
        <form action="equipment.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
            <table>
                <tr>
                    
                    <th>Name</th>
                    <th>Equipment Type</th>
                    <th>Cost</th>
                    <th>Quantity</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    
                    <td><?php echo $row['eName'];?></td>
                    <td><?php echo $row['eType'];?></td>
                    <td><?php echo $row['eCost'];?></td>
                    <td><?php echo $row['eQuantity'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>