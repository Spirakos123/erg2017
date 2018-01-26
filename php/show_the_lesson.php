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
             <h3>ΜΑΘΗΜΑ</h3>
                <?php

                  $lesson_id=$_POST['lesson_id'];
                   // $_SESSION['id']=$lesson_id;

                  $con = mysqli_connect($local,$root,$pass,$idm);
                  if (!$con) {
                      die("error: " . mysqli_connect_error());
                  }
                  mysqli_set_charset($con, "utf8");
                  $sql = "SELECT lesson FROM lessons WHERE id='$lesson_id' ";
                  $result = mysqli_query($con, $sql);
                  if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                      echo "<form action='show_the_lesson.php' method='post'>";
                      while ($row = mysqli_fetch_assoc($result)) {



                          // echo "<input type='text' name='lesson' value=$lesson_id>";
                          echo " Μάθημα:" . $row["lesson"];

                      }
                    echo '<p>Πατήστε υποβολή για να προβείτε στις ερωτήσεις</p>';
                      echo "<button class='btn btn-default' type='submit'>υποβολή</button>";


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
