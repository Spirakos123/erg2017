<?php
if (isset($_POST['email'])&&!empty($_POST['email'])) {
  require "../conf.php";
    $con = mysqli_connect($local,$root,$pass,$idm);
    if (!$con) {
    die('Could not connect: ' . mysql_error());
    }
   mysqli_set_charset($con, "utf8");
   $email = $_POST['email'];
   $sql = "SELECT email  FROM users  WHERE email='$email' ";
   $result = mysqli_query($con, $sql);
      if (mysqli_num_rows($result) > 0) {
        echo "not okay";
       }else {
         echo "ok";
       }



}




 ?>
