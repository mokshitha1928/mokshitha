<?php      
    include('connection.php');  
    $username = $_POST['tb1'];  
    $password = $_POST['tb2'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from branch where USERNAME = '$username' and PASS = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";  
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql ="SELECT * FROM branch";
$result = $conn->query($sql);
?>

<html>
      <body>
        <table border="1">
          <tr>
              <th>USERNAME</th>
              <th>EMAIL</th>
              <th>MOBILE_NUMBER</th>
              <th>PASS</th>
          </tr>
<?php
  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) 
  {
?>
   
        <tr>
              <td>
                <?php echo $row["USERNAME"];
                ?>
              </td>
              <td>
                <?php echo $row["EMAIL"];
                ?>
              </td>
              <td>
                <?php echo $row["MOBILE_NUMBER"];
                ?>
              </td>
              <td>
                <?php echo $row["PASS"];
                ?>
              </td>
        </tr>
  
 <?php               
    } //while closing
 ?>

        </table>
    </body>
  </html>
  
<?php
}//if condition closing
 else 
 {
      echo "0 results";
  }
$conn->close();
?>