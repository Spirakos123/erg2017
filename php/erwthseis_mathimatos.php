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
                  $_SESSION['lesson_id']=$lesson_id;
                  $con = mysqli_connect($local,$root,$pass,$idm);
                  if (!$con) {
                    //  die("error: " . mysqli_connect_error());
                  }
                  mysqli_set_charset($con, "utf8");
                  $sql_question = "SELECT questions.id,questions.title,questions.kind_question FROM questions
                                  LEFT JOIN have_questions ON questions.id = have_questions.question_id
                                  WHERE have_questions.lesson_id=".$lesson_id;
                  $result = mysqli_query($con, $sql_question);

                  if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                      echo "<form action='erwthseis_mathimatos_check.php' method='post'>";
                      while ($row = mysqli_fetch_assoc($result)) {
                          $question_id = $row["id"];
                          $kind_question = $row['kind_question'];
                          $_SESSION['question_id']=$question_id;
                          $_SESSION['kind_question']=$kind_question;
                          //  echo $lesson_id;
                          $name = "question_".$question_id;
                        if($kind_question=='Sosto/lathos'){
                          echo "<span name='lesson_id' value=$question_id >";
                          echo " Title:" . $row["title"].' Σ/Λ ' ;
                          echo "<input type='radio' value='Σ' name='$name' >";
                          echo "<input type='radio' value='Λ' name='$name' >"."</br>";
                          echo "</span>";
                        }elseif ($kind_question=='pollaplis') {
                          $sql_question = "SELECT answer FROM questions WHERE id = '$question_id' ";
                          $result = mysqli_query($con, $sql_question);
                          if (mysqli_num_rows($result) > 0) {
                            while ($row_answer = mysqli_fetch_assoc($result)) {
                                $answer = $row_answer['answer'];
                                echo "answer = ".$answer."</br>";
                              }
                          }else{
                            echo "No correct anwser found!";
                          }
                          $first = rand(7,15);
                          $second = rand(8,16);
                          //echo '<label class="radio" style="cursor:pointer;">';
                          if($first == $second){
                            $first = rand(7,15);
                            $second = rand(8,16);
                          }
                          echo $row['title']."</br>";
                          echo "<input type='radio' value='$first' name='$name' >".$first."</br>";
                          echo "<input type='radio' value='$second' name='$name' >".$second."</br>";
                          echo "<input type='radio' value='$answer' name='$name' >".$answer."</br>";
                        }

                      }
                    //  echo "<input type='button' onclick='myFunction()' value='Send order'>"."<br>";

                     echo "<br>" . " <button class='btn btn-default' type='reset'>Επαναφορά</button>";
                    //echo "<button class='btn btn-default' type='submit' >Υποβολή</button>";
                    echo "<input type='submit' name='postF' value='Υποβολή'><br>";


                      echo "</form>";
                  } else {
                      echo "Δεν βρέθηκε κανένα αποτέλεσμα";
                  }

                  mysqli_close($con);
                  ?>
            </div>
        </div>
    </body>
</html>
