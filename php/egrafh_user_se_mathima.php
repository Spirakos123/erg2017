<html>
    <head>
      <title></title>
      <?php

      	require "conf.php";
	    require "../html/navbar.php";
      ?>
    </head>
    <body>
       <div class="container-fluid">
        <div class="col-xs-9 col-sm-9">
             <h3>Επιλέξτε μάθημα για να εγγραφείτε</h3>
                <?php
                  $user_id = $_SESSION['user_id'];


                  $con = mysqli_connect($local,$root,$pass,$idm);
                  if (!$con) {
                      die("error: " . mysqli_connect_error());
                  }
                  mysqli_set_charset($con, "utf8");
                  $sql = "SELECT
                      		  *
                          FROM
                      		lessons
                          WHERE id NOT IN
                      		(SELECT lessons.id
                      			FROM lessons
                      			LEFT JOIN grades ON grades.lesson_id = lessons.id
                      			WHERE grades.user_id = '$user_id' )";
                  $result = mysqli_query($con, $sql);

                  if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                      echo "<form action='insert_the_lesson.php' method='post'>";
                      while ($row = mysqli_fetch_assoc($result)) {
                          $lesson_id = $row["id"];
                          //$_SESSION['id']=$lesson_id;
                          echo '<label class="checkbox" style="margin-left: 40px;cursor:pointer;">';
                          echo "<input type='checkbox' name='lesson_id[]' value=$lesson_id>";
                          echo  " ".$row["title"]."</label>";

                      }
                     echo "<br>" . " <button class='btn btn-default' type='reset'>Επαναφορά</button>";
                              echo "<button class='btn btn-default' type='submit'>Υποβολή</button>";


                      echo "</form>";
                  } else {

                      echo "Δεν βρέθηκε κάποιο αποτέλεσμα </br>";

                  }

                  mysqli_close($con);
                  ?>
            </div>
        </div>
    </body>
</html>
