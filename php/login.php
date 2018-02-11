<?php
require "conf.php";
session_start();
//$username=$_SESSION['username'];
$username = $_POST['username'];

$password =$_POST['pwd'];

if (!(empty($username) || empty($password))) {
  $con = mysqli_connect($local,$root,$pass,$idm);
  if (!$con) {
  die('Could not connect: ' . mysql_error());
  }
 mysqli_set_charset($con, "utf8");
 $sql = "SELECT * FROM users WHERE username='$username' ";
 $result = mysqli_query($con, $sql);
 if (mysqli_num_rows($result) > 0) {
   // Επιτυχία πιστοποίησης
   while ($row = mysqli_fetch_array($result)) {
     $_SESSION['role'] = $row['role'];
     $_SESSION['username'] = $row['username'];
     $_SESSION['user_id'] = $row['id'];
     $dbpass = $row['password'];
   }
    
     $decodePass = password_verify($password, $dbpass);
     if ($decodePass) {
         echo 'Password is valid!';
         if($row['role'] == 'admin'){
           mysqli_close($con);
           echo "Συνδέεσαι...";
           header( "Refresh:1.5; url=../html/admin.php", true, 303);
         }else{
           mysqli_close($con);
           echo "Συνδέεσαι...";
           header( "Refresh:1.5; url=../html/user.php", true, 303);
         }
   }else{
     //password lathos
     mysqli_close($con);
     echo "Το username ή το password είναι λάθος.";
     header( "Refresh:1.5; url=../html/login.php", true, 303);
   }
 }else{
   //num rows
   mysqli_close($con);
   echo "Το username ή το password είναι λάθος.";
   header( "Refresh:1.5; url=../html/login.php", true, 303);
 }
}else{
  echo "Δεν έβαλες όλα τα πεδία";
  header( "Refresh:1.5; url=../html/login.php", true, 303);
}

  ?>
