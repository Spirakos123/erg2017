<?php
session_start();
require "conf.php";
$firstname = $_POST['fname'];
$lastname =$_POST['lname'];
$email = $_POST['email'];
$user_name =$_POST['username'];
$password =$_POST['pwd'];
$c_pass =$_POST['cpwd'];
// echo $firstname;
// echo $lastname;
// echo $email;
// echo $user_name;
// echo $password;
// echo $c_pass;


 $con = mysqli_connect($local,$root,$pass,$idm);
  if (!$con) {
  die('Could not connect: ' . mysql_error());
  }
 mysqli_set_charset($con, "utf8");
  // $sql= "INSERT INTO users (firstname, lastname, email,username,password)
  // VALUES ('NULL', $firstname, $lastname,$email,$user_name,$password)";
  if($password == $c_pass){
     //echo password_hash($password, PASSWORD_DEFAULT);
     $password = password_hash($password, PASSWORD_DEFAULT);
     $con = mysqli_connect($local,$root,$pass,$idm);
     mysqli_set_charset($con, "utf8");


     $sql= "INSERT INTO users(firstname, lastname, email, username, password,role) VALUES ('$firstname', '$lastname','$email','$user_name','$password','user')";
     if (mysqli_query($con, $sql)) {
       $last_id = mysqli_insert_id($con);
       $_SESSION['username']=$user_name;
       $_SESSION['role']='user';
       $_SESSION['user_id']=$last_id;

       echo "New record created successfully";
      header( "Refresh:1.5; url=../html/user.php", true, 303);
     }else{
       echo "Error: " . $sql . "<br>" . mysqli_error($con);
     }
   }else{
     echo "Οι κωδικοί δεν είναι ίδιοι";
   }

  echo "<br>".$sql;
  mysqli_close($con);

  ?>
