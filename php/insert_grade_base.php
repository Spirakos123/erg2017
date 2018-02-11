<?php
  require "../html/navbar.php";
require "conf.php";

 $grade=$_POST["grade"];
 $lesson_id=$_SESSION['id'];
 $user_id= $_SESSION['id'];
 $con = mysqli_connect($local,$root,$pass,$idm);
  if (!$con) {
  die('Could not connect: ' . mysql_error());
  }
 mysqli_set_charset($con, "utf8");

$sql= "INSERT INTO grades(lesson_id, user_id, grade) VALUES ('$lesson_id','$user_id' ,'$grade')";
if (mysqli_query($con, $sql)) {
  echo "<h3>Η εισαγωγή έγινε με επιτυχία!</h3>";
}else{
  echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
  mysqli_close($con);

  ?>
