<?php session_start(); ?>
<html>
    <head>
      <title></title>
      <?php 
      	require "conf.php";
	    require "./nav_admin.html";
      ?>
    </head>
    <body>
       <div class="container-fluid">
        <div class="col-xs-9 col-sm-9">
             <h3>Ξ•Ο€ΞΉΞ»ΞΏΞ³Ξ® Ο‡Ο�Ξ®ΟƒΟ„Ξ· Ξ³ΞΉΞ± Ξ΄ΞΉΞ±Ξ³Ο�Ξ±Ο†Ξ®</h3>
                <?php
                  $con = mysqli_connect($local,$root,$pass,$idm);
                  if (!$con) {
                      die("Ξ‘Ο€ΞΏΟ„Ο…Ο‡Ξ―Ξ± Ο�Ξ½Ξ΄ΞµΟƒΞ·Ο‚: " . mysqli_connect_error());
                  }
                  mysqli_set_charset($con, "utf8");
                  $sql = "SELECT * FROM `users`";
                  $result = mysqli_query($con, $sql);

                  if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                      echo "<form action='delete_user_base.php' method='post'>";
                      while ($row = mysqli_fetch_assoc($result)) {
                          $user_id = $row["id"];
                          echo "<input type='checkbox' name='user[]' value=$user_id>";
                          echo " User name:" . $row["username"];
                          echo " First name:" . $row["firstname"];
                          echo " Last name:" . $row["lastname"] . "<br>";
                      }
                     echo "<br>" . " <button class='btn btn-default' type='reset'>Ξ�Ξ±ΞΈΞ±Ο�ΞΉΟƒΞΌΟ�Ο‚</button>";
                              echo "<button class='btn btn-default' type='submit'>Ξ¥Ο€ΞΏΞ²ΞΏΞ»Ξ®</button>";


                      echo "</form>";
                  } else {
                      echo "Ξ”ΞµΞ½ Ξ²Ο�Ξ­ΞΈΞ·ΞΊΞ±Ξ½ Ξ±Ο€ΞΏΟ„ΞµΞ»Ξ­ΟƒΞΌΞ±Ο„Ξ±";
                  }

                  mysqli_close($con);
                  ?>
            </div>
        </div>
    </body>
</html>
