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
                $question_id = $_POST['id'];
                $con = mysqli_connect($local,$root,$pass,$idm);
                if (!$con) {
                    die("Αποτυχια σύνδεσης: " . mysqli_connect_error());
                }
                mysqli_set_charset($con, "utf8");

                $sql = "SELECT * FROM questions WHERE id='$question_id'";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    echo "<form action='./update_questions_base.php' method='post'>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        $question_id = $row['id'];
                        $previous_title = $row["title"];
                        $previous_kind_question = $row["kind_question"];

                        echo "<input type='hidden' name='id' value='$question_id'>";
                        echo "<div class='form-group' >";
                        echo "<label>Νέος τίτλος ερώτηαης:</label>";
                        echo "<input class='form-control' id='new_title' type='text' name='new_title' value='$previous_title'required>". "<br>";
                        echo "</div>";
                        echo "<div class='form-group' >";
                        echo "<label>Νέο είδος ερώτησης:</label>";
                        echo "<input class='form-control' id='new_kind_question' type='text' name='new_kind_question' value='$previous_kind_question' required>". "<br>";
                        echo "</div>";

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
