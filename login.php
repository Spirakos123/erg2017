<?php

require "conf.php";
session_start();
$user_name = $_POST['username'];
$password =$_POST['pwd'];


 // $con = mysqli_connect($local,$root,$pass,$idm);
 //  if (!$con) {
 //  die('Could not connect: ' . mysql_error());
 //  }
 // mysqli_set_charset($con, "utf8");

if(($user_name=='vasso')&&($password=='555')){
  $_SESSION['username'] = $user_name;
  session_write_close();
  header('Location: ./admin.php');

}else{
  //elegxos gia ta stoixeia prwta
  echo $user_name." ".$password;
}


  //mysqli_close($con);

  ?>
