<?php

require "conf.php";
session_start();
$user_name = $_POST['username'];
$password =$_POST['pwd'];

if(($user_name=='vasso')&&($password=='555')){
  $_SESSION['username'] = $user_name;
  $_SESSION['role'] = "admin";
  session_write_close();


  header('Location: ../html/admin.php');

}else if((isset($_SESSION['username']))) {
  //require "../html/nav_user.html";
  header('Location: ../html/navbar.html');
  //elegxos gia ta stoixeia prwta
  echo "<h2>Hello</h2>". $user_name;
}
else  {
  header('Location: ../html/register.html');
}


  //mysqli_close($con);

  ?>
