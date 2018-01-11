<?php

include "conf.php";
$firstname = $_POST['fname'];
$lastname =$_POST['lname'];
$email = $_POST['email'];
$user_name =$_POST['username'];
$password =$_POST['pwd'];
echo 48988888888;
echo "kalhmera"
echo $firstname;
echo $lastname;
echo $email;
echo $user_name;
echo $password;



 $con = mysqli_connect($local,$root,$pass,$idm);
  if (!$con) {
  die('Could not connect: ' . mysql_error());
  }
 mysqli_set_charset($con, "utf8");
  // $sql= "INSERT INTO users (firstname, lastname, email,username,password)
  // VALUES ('NULL', $firstname, $lastname,$email,$user_name,$password)";

$sql= "INSERT INTO `users`(`firstname`, `lastname`, `email`, `username`, `password`) VALUES ($firstname, $lastname,$email,$user_name,$password)";

  $Result=mysqli_query($con,$sql);

  echo "<br>".$sql;
  mysqli_close($con);

  ?>
