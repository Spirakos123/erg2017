<?php
  require "../html/navbar.php";
require "conf.php";
$grade=$_POST["title"];
$_SESSION['lesson']= $lesson_id;
 $_SESSION['user']=$user_id;
 $con = mysqli_connect($local,$root,$pass,$idm);
  if (!$con) {
  die('Could not connect: ' . mysql_error());
  }
 mysqli_set_charset($con, "utf8");
  // $sql= "INSERT INTO users (firstname, lastname, email,username,password)
  // VALUES ('NULL', $firstname, $lastname,$email,$user_name,$password)";
// $sql_users = "SELECT * FROM users";
// $result_users = mysqli_query($con, $sql_users);
//
// if (mysqli_num_rows($result_users) > 0) {
//   while ($row = mysqli_fetch_assoc($result_users)) {
//       $user_id = $row["id"];
//   }
// }
//
// $sql_lessons = "SELECT * FROM users";
// $result_lessons = mysqli_query($con, $sql_lessons);
//
// if (mysqli_num_rows($result_lessons) > 0) {
//   while ($row = mysqli_fetch_assoc($result_lessons)) {
//       $lesson_id = $row["id"];
//   }
// }
$sql= "INSERT INTO grades( 'lesson_id', 'user_id', 'title') VALUES ($lesson_id, $user_id,$grade)";
  $Result=mysqli_query($con,$sql);

  echo "<br>".$sql;
  mysqli_close($con);

  ?>
