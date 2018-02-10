<?php

require "conf.php";
session_start();
//$username=$_SESSION['username'];
$username = $_POST['username'];

$password =$_POST['pwd'];



$con = mysqli_connect($local,$root,$pass,$idm);
 if (!$con) {
 die('Could not connect: ' . mysql_error());
 }
mysqli_set_charset($con, "utf8");
$sql = "SELECT * FROM users WHERE username='$username' ";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {// Επιτυχία πιστοποίησης
  while ($row = mysqli_fetch_array($result)) {
    $_SESSION['role'] = $row['role'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['user_id'] = $row['id'];
    $pass = $row['password'];
  }
  if (!(empty($username) || empty($password))) {
    if(($username=='vasso')&&($password=='555')){
    header('Location: ../html/admin.php');
    }else{
      header('Location: ../html/user.php');
    }
  }else{
   header('Location: ../html/login.php');
  }

}else{
  echo 'Den uparxei kati';
 }



  mysqli_close($con);

  ?>
