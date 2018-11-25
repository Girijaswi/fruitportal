<?php
  $firstname=$_POST["firstname"];
  $lastname=$_POST["lastname"];
  $email=$_POST["email"];
  $pwd=$_POST["pwd"];
  $address=$_POST["address"];
  $panno=$_POST["panno"];
  $shop=$_POST["shop"];
  
  // Create connection
  $conn = mysqli_connect("localhost", "root", "", "freshfruit");
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 

  $sql = "insert into seller_reg(firstname, lastname, email, password, address, panno,shop_name) values ('$firstname','$lastname','$email','$pwd','$address','$panno','$shop')";
  if (mysqli_query($conn, $sql))
  {
      echo "<script>alert('Registration Successful');</script>";
      header("refresh:1; url=seller_login.php");
  }
  else
  {
    echo "<script>alert('Registration Failed');</script>";
  } 

  $conn->close();
?>