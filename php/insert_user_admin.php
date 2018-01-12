<?php
require "conf.php";

$firstname = $_POST['fname'];
$lastname =$_POST['lname'];
$email = $_POST['email'];
$username =$_POST['username'];
$password =$_POST['pwd'];




 $con = mysqli_connect($local,$root,$pass,$idm);
 mysqli_set_charset($con, "utf8");


$sql= "INSERT INTO users (firstname, lastname, email, username, password) VALUES ('$firstname', '$lastname','$email','$username','$password')";
if (mysqli_query($con, $sql)) {
  echo "New record created successfully";
}else{
  echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
  mysqli_close($con);

  ?>
