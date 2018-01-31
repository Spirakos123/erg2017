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
             <h3>Επιλέξτε μάθημα για να κάνετε τεστ</h3>
                <?php
                  //$user_id=$_POST['user'];


                  $con = mysqli_connect($local,$root,$pass,$idm);
                  if (!$con) {
                      die("error: " . mysqli_connect_error());
                  }
                  mysqli_set_charset($con, "utf8");
                  $sql_question = "SELECT lessons.id,lessons.title FROM lessons
                                   LEFT JOIN grades ON lessons.id=grades.lesson_id
                                   WHERE grades.user_id= ".$_SESSION['user_id'];
                  $result = mysqli_query($con, $sql_question);

                  if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                      echo "<form action='erwthseis_mathimatos.php' method='post'>";
                      while ($row = mysqli_fetch_assoc($result)) {
                          $lesson_id = $row["id"];
                          $_SESSION['id']=$lesson_id;
                        //  echo $lesson_id;
                          echo "<input type='radio' name='lesson_id' value=$lesson_id>";
                          echo " Title:" . $row["title"];

                      }
                     echo "<br>" . " <button class='btn btn-default' type='reset'>Επαναφορά</button>";
                              echo "<button class='btn btn-default' type='submit'>Υποβολή</button>";


                      echo "</form>";
                  } else {
                      echo "Δεν βρέθηκε κανένα αποτέλεσμα";
                  }

                  mysqli_close($con);
                  ?>
            </div>
        </div>
    </body>
</html>
