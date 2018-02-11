<!DOCTYPE html>
<!--
Φορμα που ενημερωνει και αλλαζει τα στοιχεια
Ημερομηνια τροποποιησης:25-3-2016 ονοματα: ΔΒ
-->
<html>
    <head>
    </head>
    <body>
      <?php
      require "conf.php";
      require "../html/navbar.php";
      ?>
      <div class="container-fluid">
             <div class="col-xs-9 col-sm-9">
                <h3> Ενημερώστε τις τιμές </h3>
                <?php
                $lesson_id = $_POST['id'];
                $con = mysqli_connect($local,$root,$pass,$idm);
                if (!$con) {
                    die("Αποτυχια σύνδεσης: " . mysqli_connect_error());
                }
                mysqli_set_charset($con, "utf8");
                $sql = "SELECT * FROM lessons WHERE id='$lesson_id'";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    echo "<form action='./update_lessons_base.php' method='post'>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        $lesson_id = $row['id'];
                        $previous_title = $row["title"];
                        echo "<input type='hidden' name='id' value='$lesson_id'>";
                        echo "<div class='form-group' >";
                        echo "<label>Νέος τίτλος μαθήματος:</label>";
                        echo "<input class='form-control' id='new_title' type='text' name='new_title' value='$previous_title'>". "<br>";
                        echo "</div>";
                        echo " <a class='btn btn-default' href='update_lessons_choose_lesson.php' role='button'>Πίσω</a>";
                        echo "<button class='btn btn-default'type='reset'>επαναφορά</button> <button class='btn btn-default'type='submit'>υποβολή</button>";
                    }
                    echo "</form>";
                } else {
                    echo "Δεν βρέθηκαν αποτελέσματα";
                }
                mysqli_close($con);
                ?>
            </div>
        </div>
    </body>
</html>
