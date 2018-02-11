<html>
    <head>

    </head>
    <body>
        <?php
          require "conf.php";
  	      require "../html/navbar.php";
        ?>

        <div class="container-fluid">
            <div id="content" class="col-xs-9 col-sm-9">
                <?php
                    if (!isset($_POST['lessons'])) {
                      echo "<div class='alert alert-warning'>
                        <strong>Προσοχή!</strong> Δεν έχετε επιλέξει κανένα στοιχείο.
                      </div>";
                    }else {
                      $lesson_id = $_POST["lessons"];
                      $flag = FALSE;
                      $cnt = 0;
                      foreach ($lesson_id as $value) {
                          $trim_value = trim($value);
                          $con = mysqli_connect($local,$root,$pass,$idm);
                          if (!$con) {
                              die("error: " . mysqli_connect_error());
                          }
                          mysqli_set_charset($con, "utf8");
                          $sql = "DELETE FROM lessons WHERE id='$trim_value' ";
                          if (mysqli_query($con, $sql)) {
                              $flag = TRUE;
                          } else {
                              $err = mysqli_error($con);
                          }
                          mysqli_close($con);
                      } if ($flag) {
                          echo "<div class='alert alert-success'><strong>Τέλεια!</strong>Η διαγραφή έγινε με επιτυχία</div>";
                      }
                    }
                ?>
                <a class='btn btn-default' href='./delete_lessons_choose_lesson.php' role='button'>Πίσω</a>
            </div>
        </div>
    </body>
</html>
