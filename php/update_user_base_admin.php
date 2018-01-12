<html>
    <head>

    </head>
    <body>
      <?php
      require "conf.php";
      require "../html/navbar.php";
      ?>
        <div class="container-fluid">
            <?php
              $user_id = $_POST["user_id"];
              $new_user_first_name = $_POST["new_firstname"];
              $new_user_last_name = $_POST["new_lastname"];
              $new_user_email = $_POST["new_email"];
              $new_user_name = $_POST["new_username"];
              $new_user_password = $_POST["new_password"];



            $con = mysqli_connect($local,$root,$pass,$idm);
              // Check connection
              if (!$con) {
                  die("Αποτυχία σύνδεσης: " . mysqli_connect_error());
              }
              password_hash($new_user_password,PASSWORD_DEFAULT);

              $sql = "UPDATE users SET firstname = '$new_user_first_name',
              lastname='$new_user_last_name', email='$new_user_email',
               username='$new_user_name', password='$new_user_password'
               WHERE id = '$user_id';";

              mysqli_set_charset($con, "utf8");
              if (mysqli_query($con, $sql)) {
                  echo "<h3>Η ενημέρωση έγινε με επιτυχία</h3>" . "<br>";
                  echo "<p> <a class='btn btn-default' href='#' role='button'>Πίσω στην αρχική</a>";

              } else {
                  echo "<h3>Σφάλμα ενημέρωσης:</h3> <h5>" . mysqli_error($con) . "</h5>";
              }

              mysqli_close($con);
            ?>
        </div>
    </body>
</html>
