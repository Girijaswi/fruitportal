<?php
  session_start();
   $username=$_POST["email"];
   $password=$_POST["pwd"];

   $con = mysqli_connect("localhost", "root", "", "freshfruit");

 if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
  } 
 

$sql = "SELECT email from seller_reg where  email = '$username' and password = '$password'" ;
$result = mysqli_query($con, $sql);


if ($result)
{ 
    
    //setcookie("test",$_POST['email'], time() + (86400 * 30));
    //setcookie("test2",$_POST['pwd'], time() + (86400 * 30));
    $_SESSION['email']=$username;
    echo "login success";
    //echo "Cookie Name : ".$_COOKIE['test'];
    //echo "coookie password:".$_COOKIE['test2'];
    header("Location:sellerdashboard.php");
}
else
{
  echo "failed";

}

?>