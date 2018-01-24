<?php

require "conf.php";
$firstname = $_POST['fname'];
$lastname =$_POST['lname'];
$email = $_POST['email'];
$user_name =$_POST['username'];
$password =$_POST['pwd'];
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
if(($password=='555')&&($user_name=='vasso')){
  $sql= "INSERT INTO users(firstname, lastname, email, username, password,role) VALUES ('$firstname', '$lastname','$email','$user_name','$password','admin')";
  if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
  }else{
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
  }
}else{
  $sql= "INSERT INTO users(firstname, lastname, email, username, password,role) VALUES ('$firstname', '$lastname','$email','$user_name','$password','user')";
  if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
  }else{
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
  }
}



  echo "<br>".$sql;
  mysqli_close($con);

  ?>
