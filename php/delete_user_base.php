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
                    echo "<pre>";
                    print_r($_POST['user']);
                    echo "</pre>";

                    if (!isset($_POST['user'])) {
                      echo "<div class='alert alert-warning'>
                        <strong>Προσοχή!</strong> Δεν έχετε επιλέξει κανένα στοιχείο.
                      </div>";
                    }else {
                      $user_id = $_POST["user"];
                      $flag = FALSE;
                      $cnt = 0;

                      foreach ($user_id as $value) {
                          $trim_value = trim($value);

                          $con = mysqli_connect($local,$root,$pass,$idm);
                          if (!$con) {
                              die("error: " . mysqli_connect_error());
                          }
                          mysqli_set_charset($con, "utf8");

                          // sql to delete a record
                          $sql = "DELETE FROM users WHERE id='$trim_value' ";
                          //die($sql);
                          if (mysqli_query($con, $sql)) {
                            echo "true";
                              $flag = TRUE;
                          } else {
                              $err = mysqli_error($con);
                              echo $err;

                          }
                          mysqli_close($con);
                      } if ($flag) {
                          echo "<div class='alert alert-success'><strong>Τέλεια!</strong>Η διαγραφή έγινε με επιτυχία</div>";
                      }
                    }
                ?>
                <a class='btn btn-default' href='delete_user_choose_user.php' role='button'>Πίσω</a>
            </div>
        </div>
    </body>
</html>
