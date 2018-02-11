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

              $question_id = $_POST["id"];
              $new_question_title=$_POST["new_title"];
              $new_kind_question=$_POST["new_kind_question"];
              $con = mysqli_connect($local,$root,$pass,$idm);
              // Check connection
              if (!$con) {
                  die("Αποτυχία σύνδεσης: " . mysqli_connect_error());
              }
              $sql_have_question_lesson_id="SELECT lesson_id FROM have_questions WHERE question_id='$question_id';";
              $result_have_question_lesson_id = mysqli_query($con, $sql_have_question_lesson_id);
              if (mysqli_num_rows($result_have_question_lesson_id) > 0) {
                while ($row = mysqli_fetch_assoc($result_have_question_lesson_id)) {
                  $lesson_id = $row['lesson_id'];
                }
              }
              $sql = "UPDATE questions SET title = '$new_question_title' , kind_question='$new_kind_question' WHERE id = '$question_id';";
              mysqli_set_charset($con, "utf8");
              if (mysqli_query($con, $sql)) {
                  echo "<h3>Η ενημέρωση έγινε με επιτυχία</h3>" . "<br>";
                  $sql_have_question = "UPDATE have_questions SET question_id='$question_id', lesson_id='$lesson_id' WHERE id = '$question_id';";
                  if (mysqli_query($con, $sql_have_question)) {
                      echo "<h3>Η ενημέρωση τουhave_questions έγινε με επιτυχία</h3>" . "<br>";
                  }else{
                      echo "<h3>Σφάλμα ενημέρωσης πινακα have_questions:</h3> <h5>" . mysqli_error($con) . "</h5>";
                  }

              } else {
                  echo "<h3>Σφάλμα ενημέρωσης:</h3> <h5>" . mysqli_error($con) . "</h5>";
              }
              mysqli_close($con);
            ?>
        </div>
    </body>
</html>
