<?php
require "conf.php";
require "../html/navbar.php";
$title = $_POST['title'];
$lesson =$_POST['lesson'];
// $checkbox = $_POST['checkbox'];
// $pollaplis =$_POST['pollaplis'];

 $con = mysqli_connect($local,$root,$pass,$idm);
  if (!$con) {
  die('Could not connect: ' . mysql_error());
  }
 mysqli_set_charset($con, "utf8");
  // $sql= "INSERT INTO users (firstname, lastname, email,username,password)
  // VALUES ('NULL', $firstname, $lastname,$email,$user_name,$password)";

$sql="INSERT INTO lessons (title,lesson) VALUES('$title','$lesson')";
  if (mysqli_query($con, $sql)) {
    echo "<h3>Η εισαγωγή έγινε με επιτυχία!</h3>";
  }else{
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
  }

  mysqli_close($con);

  ?>
