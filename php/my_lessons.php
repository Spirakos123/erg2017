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
             <h3>Τα μαθήματά μου</h3>
                <?php
                  //$user_id=$_POST['user'];


                  $con = mysqli_connect($local,$root,$pass,$idm);
                  if (!$con) {
                      die("error: " . mysqli_connect_error());
                  }
                  mysqli_set_charset($con, "utf8");
                  $sql = "SELECT * FROM lessons
                          INNER JOIN grades ON lessons.id = grades.lesson_id
                          WHERE grades.user_id = ".$_SESSION['user_id']."";
                  $result = mysqli_query($con, $sql);

                  if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                      //echo "<form action='insert_the_lesson.php' method='post'>";
                    ?>
                    <ul>
                      <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                          $lesson_id = $row["id"];
                          //$_SESSION['id']=$lesson_id;
                        //  echo "<input type='radio' name='lesson_id' value=$lesson_id>";
                      ?>
                        <li>
                          <?php
                              echo $row['title'];
                            }
                          ?>
                        </li>
                    </ul>

                  <?php
                  } else {
                      echo "Δεν βρέθηκε κανένα αποτέλεσμα";
                  }

                  mysqli_close($con);
                  ?>
            </div>
        </div>
    </body>
</html>
