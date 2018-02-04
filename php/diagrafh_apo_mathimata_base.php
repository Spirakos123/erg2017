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
                // echo $_SESSION['user_id'];
                   //echo $_SESSION['lesson_id'];
              //  $lesson_id=$_POST['lesson_id'];
                    if(isset($_POST['lessons']) && !empty($_POST['lessons'])) {
                      $lesson_id = $_POST['lessons'];
                      $flag = FALSE;
                      $cnt = 0;

                      foreach ($lesson_id as $value) {
                          $trim_value = trim($value);

                          $con = mysqli_connect($local,$root,$pass,$idm);
                          if (!$con) {
                              die("error: " . mysqli_connect_error());
                          }
                          mysqli_set_charset($con, "utf8");

                          // sql to delete a record
                          $sql = "DELETE FROM grades WHERE lesson_id= '$trim_value'" ;

                          if (mysqli_query($con, $sql)) {
                              $flag = TRUE;
                          } else {
                              $err = mysqli_error($con);

                          }
                          mysqli_close($con);
                      } if ($flag) {
                          echo "<div class='alert alert-success'><strong>Τέλεια!</strong>Η διαγραφή έγινε με επιτυχία</div>";
                      }
                    }else{
                      echo "Πρέπει να επιλέξεις ενα μάθημα πρώτα.";
                    }
                ?>

            </div>
        </div>
    </body>
</html>
