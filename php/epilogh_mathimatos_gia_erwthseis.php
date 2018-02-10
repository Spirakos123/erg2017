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
        <div class="col-xs-12 col-sm-12">

                <?php
                  $user_id = $_SESSION['user_id'];


                  $con = mysqli_connect($local,$root,$pass,$idm);
                  if (!$con) {
                      die("error: " . mysqli_connect_error());
                  }
                  mysqli_set_charset($con, "utf8");
                  $sql_question = "SELECT lessons.id,lessons.title FROM lessons
                                   LEFT JOIN grades ON lessons.id=grades.lesson_id
                                   WHERE grades.user_id= '$user_id' AND grades.examined = 0";
                  $result = mysqli_query($con, $sql_question);

                  if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                      echo "<h3>Επιλέξτε μάθημα για να κάνετε τεστ</h3>";
                      echo "<form action='erwthseis_mathimatos.php' method='post'>";
                      while ($row = mysqli_fetch_assoc($result)) {
                          $lesson_id = $row["id"];
                        //  echo $lesson_id;
                          echo "<input type='radio' name='lesson_id' value=$lesson_id>";
                          echo $row["title"];
                          $sql = "SELECT lesson_id,COUNT(question_id) countQuestions
                                  FROM have_questions
                                  WHERE lesson_id IN(SELECT
                                      lessons.id
                                  FROM
                                      lessons
                                          INNER JOIN
                                      grades ON lessons.id = grades.lesson_id
                                  WHERE
                                      grades.user_id = '$user_id'
                                          AND grades.examined = 0)
                                  GROUP BY lesson_id";
                          $result2 = mysqli_query($con, $sql);
                          if (mysqli_num_rows($result2) > 0) {
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                              if($lesson_id == $row2['lesson_id']){
                                echo ' <span class="badge" style="background-color: #3a87ad;">'.$row2['countQuestions'].'</span>';
                              }else{
                                continue;
                              }
                            }
                            echo "</br>";
                          }else{
                            echo ' <span class="text-danger">( Δέν μπορείς να εξεταστείς στο μάθημα αυτό ακόμα )</span></br>';
                          }

                      }
                     echo "<br>" . " <button class='btn btn-default' type='reset'>Επαναφορά</button>";
                              echo "<button class='btn btn-default' type='submit'>Υποβολή</button>";


                      echo "</form>";

                      ?>
                      <h3>Μαθήματα που έχεις εξεταστεί:</h3>
                      <table class="table table-hover table-condensed">
                        <thead>
                          <th class="text-center">Μάθημα</th>
                          <th class="text-center">Βαθμός</th>
                          <th class="text-center">Αποτέλεσμα</th>
                        </thead>
                        <tbody>
                      <?php
                        $sql = "SELECT
                                  lessons.title,grades.grade,IF(grade >= 5,'Πέρασες','Κόπηκες') passed
                                FROM
                                    lessons
                                LEFT JOIN
                                    grades ON lessons.id = grades.lesson_id
                                WHERE
                                    grades.user_id = '$user_id' AND grades.examined = 1";

                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                              if($row['grade'] >= 5){
                                echo '<tr class="success">';
                              }else{
                                echo '<tr class="danger">';
                              }
                              echo '  <td class="text-center">'.$row['title'].'</td>
                                      <td class="text-center">'.$row['grade'].'</td>
                                      <td class="text-center">'.$row['passed'].'</td>
                                    </tr>
                              ';
                            }

                        }else{


                        }
                        mysqli_close($con);

                  } else {
                      echo "<h2>Δεν έχετε να εξεταστείτε σε κανένα μάθημα. Κάντε εγγραφη πρώτα σε κάποιο.</h2>";
                      //header( "Refresh:2; url=egrafh_user_se_mathima.php", true, 303);
                      echo '<h3><a class="btn-link" href="egrafh_user_se_mathima.php">Εγγραφή σε μάθημα</a></h3>';
                      ?>
                      <h3>Μαθήματα που έχεις εξεταστεί:</h3>
                      <table class="table table-hover table-condensed">
                        <thead>
                          <th class="text-center">Μάθημα</th>
                          <th class="text-center">Βαθμός</th>
                          <th class="text-center">Αποτέλεσμα</th>
                        </thead>
                        <tbody>
                      <?php
                        $con = mysqli_connect($local,$root,$pass,$idm);
                        if (!$con) {
                            die("error: " . mysqli_connect_error());
                        }
                        mysqli_set_charset($con, "utf8");
                        $sql = "SELECT
                                  lessons.title,grades.grade,IF(grade >= 5,'Πέρασες','Κόπηκες') passed
                                FROM
                                    lessons
                                LEFT JOIN
                                    grades ON lessons.id = grades.lesson_id
                                WHERE
                                    grades.user_id = '$user_id' AND grades.examined = 1";

                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                              if($row['grade'] >= 5){
                                echo '<tr class="success">';
                              }else{
                                echo '<tr class="danger">';
                              }
                              echo '  <td class="text-center">'.$row['title'].'</td>
                                      <td class="text-center">'.$row['grade'].'</td>
                                      <td class="text-center">'.$row['passed'].'</td>
                                    </tr>
                              ';
                            }

                        }else{


                        }
                        mysqli_close($con);
                  }
                  ?>
                </tbody>
              </table>
            </div>
        </div>
    </body>
</html>
