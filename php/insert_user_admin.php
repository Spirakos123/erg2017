<?php
if(  isset($_POST['fname']) && !empty($_POST['fname'])
  && isset($_POST['lname']) && !empty($_POST['lname'])
  && isset($_POST['email']) && !empty($_POST['email'])
  && isset($_POST['username']) && !empty($_POST['username'])
  && isset($_POST['pwd']) && !empty($_POST['pwd'])
  && isset($_POST['cpwd']) && !empty($_POST['cpwd'])){



    require "conf.php";


    $firstname = $_POST['fname'];
    $lastname =$_POST['lname'];
    $email = $_POST['email'];
    $username =$_POST['username'];
    $password =$_POST['pwd'];
    $c_pass =$_POST['cpwd'];


    if($password == $c_pass){
       //echo password_hash($password, PASSWORD_DEFAULT);
       $password = password_hash($password, PASSWORD_DEFAULT);
       $con = mysqli_connect($local,$root,$pass,$idm);
       mysqli_set_charset($con, "utf8");


       $sql= "INSERT INTO users(firstname, lastname, email, username, password,role) VALUES ('$firstname', '$lastname','$email','$username','$password','user')";
       if (mysqli_query($con, $sql)) {
         echo "New record created successfully";
       }else{
         echo "Error: " . $sql . "<br>" . mysqli_error($con);
       }
     }else{
       echo "Οι κωδικοί δεν είναι ίδιοι";
     }

}
  ?>
