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
        <div class="col-xs-9 col-sm-9">
             <h3>erwthseis</h3>

              <?php
                  $lesson_id=$_POST['lesson_id'];
                  $con = mysqli_connect($local,$root,$pass,$idm);
                  if (!$con) {
                      die("error: " . mysqli_connect_error());
                  }
                  mysqli_set_charset($con, "utf8");
                  $sql_question = "SELECT questions.id,questions.title,questions.kind_question FROM questions
                                  LEFT JOIN have_questions ON questions.id = have_questions.question_id
                                  WHERE have_questions.lesson_id=".$lesson_id;
                  $result = mysqli_query($con, $sql_question);

                  if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                      echo "<form action='#' method='post'>";
                      while ($row = mysqli_fetch_assoc($result)) {
                          $question_id = $row["id"];
                          $kind_question = $row['kind_question'];
                          $_SESSION['id']=$question_id;
                          $_SESSION['kind_question']=$kind_question;
                          //  echo $lesson_id;
                        if($kind_question=='σωστό λάθος'){
                          echo "<span name='lesson_id' value=$question_id >";
                          echo " Title:" . $row["title"].' Σ/Λ ' ;
                          echo '<input type="radio" value="true" name=$question_id >';
                          echo '<input type="radio" value="false"name=$question_id >'.'</br>';
                          echo "</span>";
                        }

                      }
                      echo "<input type='button' onclick='myFunction()' value='Send order'>"."<br>";
                      echo "<input type='text' id='order' size='50'>";
                     echo "<br>" . " <button class='btn btn-default' type='reset'>Επαναφορά</button>";
                              echo "<button class='btn btn-default' type='submit' >Υποβολή</button>";


                      echo "</form>";
                  } else {
                      echo "Δεν βρέθηκε κανένα αποτέλεσμα";
                  }

                  mysqli_close($con);
                  ?>
            </div>
        </div>
        <script>
        function myFunction() {
          var coffee = document.forms[0];
          var txt = "";
          var i;
          for (i = 0; i < coffee.length; i++) {
              if (coffee[i].checked) {
                  txt = txt + coffee[i].value + " ";
              }
          }
          document.getElementById("order").value = "You ordered a coffee with: " + txt;
      }
       </script>
    </body>
</html>