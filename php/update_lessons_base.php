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
              $lesson_id = $_POST["id"];
              $new_lesson_title=$_POST["new_title"];
              $con = mysqli_connect($local,$root,$pass,$idm);
              // Check connection
              if (!$con) {
                  die("Αποτυχία σύνδεσης: " . mysqli_connect_error());
              }
              $sql = "UPDATE lessons SET title = '$new_lesson_title' WHERE id = '$lesson_id';";
              mysqli_set_charset($con, "utf8");
              if (mysqli_query($con, $sql)) {
                  echo "<h3>Η ενημέρωση έγινε με επιτυχία</h3>" . "<br>";
              } else {
                  echo "<h3>Σφάλμα ενημέρωσης:</h3> <h5>" . mysqli_error($con) . "</h5>";
              }
              mysqli_close($con);
            ?>
        </div>
    </body>
</html>
