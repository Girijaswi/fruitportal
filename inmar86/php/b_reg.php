<?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "freshfruit";
  $firstname=$_POST["firstname"];
  $lastname=$_POST["lastname"];
  $email=$_POST["email"];
  $pwd=$_POST["pwd"];
  $address=$_POST["address"];
  $phone=$_POST["phone"];
  $panno=$_POST["panno"];
  
  
  // Create connection
  $conn = mysqli_connect("localhost", "root", "", "freshfruit");
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 

  $sql = "insert into buyer_reg(firstname, lastname, email, password, address, phone, panno) values ('$firstname','$lastname','$email','$pwd','$address',$phone,'$panno')";
  if (mysqli_query($conn, $sql))
  {
      echo "<script>alert(' Registration Successful');</script>";
      header("refresh:1; url=buyer_login.php");
      
  }
  else
  {
    echo "<script>alert(' Registration Failed');</script>";
  } 

  $conn->close();
?>