<html>
    <head>
        <meta name="viewport" charset="UTF-8" width="device_width,initial_scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../airport_platform.css">
        <link rel="stylesheet" href="../style.css">
        <script src="../devoops.js"></script>
    </head>
    <body>
        <?php
        //require '../test/admin_nav_bar.php';
        ?>

        <div class="container-fluid">
            <div id="content" class="col-xs-9 col-sm-9">
                <?php
                  if (!isset($_POST['user'])) {
                    echo "<div class='alert alert-warning'>
                      <strong>Προσοχή!</strong> Δεν έχετε επιλέξει κανένα στοιχείο.
                    </div>";
                  } else {
                    $user_id = $_POST["user"];
                    $flag = FALSE;
                    $cnt = 0;
                    foreach ($user_code as $value) {
                        // echo $value;
                        $trim_value = trim($value);
                        //  echo $trim_value;
                        // Create connection
                        $conn = mysqli_connect($servername, $username, $password, $dbname);
                        // Check connection
                        if (!$conn) {
                            die("Αποτυχία σύνδεσης: " . mysqli_connect_error());
                        }

                        // sql to delete a record
                        $sql = "DELETE FROM users WHERE user_id='$trim_value' ";

                        if (mysqli_query($conn, $sql)) {
                            $flag = TRUE;
                            // echo "<h3>Η διαγραφή έγινε με επιτυχία!</h3>";
                        } else {
                            $err = mysqli_error($conn);
                         /*   echo "<div class='alert alert-danger'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Danger!</strong> This alert box could indicate a dangerous or potentially negative action.
  </div>";*/
                        }
                        mysqli_close($conn);
                    } if ($flag) {
                        echo "<div class='alert alert-success'>
    <strong>Τέλεια!</strong> Η διαγραφή έγινε με επιτυχία
  </div>";
                    }
                }
                ?>


                <a class='btn btn-default' href='delete_user_choose_user.php' role='button'>Πίσω</a>
            </div>
        </div>
    </body>
</html>
