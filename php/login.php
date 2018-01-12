<?php

require "conf.php";
session_start();
$user_name = $_POST['username'];
$password =$_POST['pwd'];

if(($user_name=='vasso')&&($password=='555')){
  $_SESSION['username'] = $user_name;
  session_write_close();


  header('Location: ./admin.php');

}else if((isset($_SESSION['username']))) {
  require "nav_user.html";
  //elegxos gia ta stoixeia prwta
  echo "<h2>Hello</h2>". $user_name;
}
else  {
  require "register.html";
}


  //mysqli_close($con);

  ?>
