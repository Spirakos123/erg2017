<?php
include "conf.php";
$title = $_POST['title'];
// $kenou =$_POST['kenou'];
// $checkbox = $_POST['checkbox'];
// $pollaplis =$_POST['pollaplis'];
echo "eeeee";
echo $title;

require "nav_admin.html";
 $con = mysqli_connect($local,$root,$pass,$idm);
  if (!$con) {
  die('Could not connect: ' . mysql_error());
  }
 mysqli_set_charset($con, "utf8");
  // $sql= "INSERT INTO users (firstname, lastname, email,username,password)
  // VALUES ('NULL', $firstname, $lastname,$email,$user_name,$password)";

$sql="INSERT INTO lessons ('title')VALUES($title)";
  if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
  }else{
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
  }

  mysqli_close($con);

  ?>
