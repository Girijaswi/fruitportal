<?php
   session_start();
   $username=$_POST["email"];
   $password=$_POST["pwd"];

   $con = mysqli_connect("localhost", "root", "", "freshfruit");

 if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
  } 
 

$sql = "SELECT email from buyer_reg where  email = '$username' and password = '$password'" ;
$result = mysqli_query($con, $sql);


if ($result)
 {
    $_SESSION['buyeremail']=$username;
    echo "login success";
    //setcookie("test","x", time() + (86400 * 30), "/");
    //setcookie("test2","x2", time() + (86400 * 30), "/");
       //echo "<h1>This is fine</h1>";
    header("Location:buyerdashboard.php");
}
else
{
  echo "failed";

}
   
?>