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

                  $lesson_id = $_POST['lesson_id'];
                  $user_id = $_SESSION['user_id'];
                  //print_r($lesson_id);
                  $con = mysqli_connect($local,$root,$pass,$idm);
                  if (!$con) {
                      die("error: " . mysqli_connect_error());
                  }
                  mysqli_set_charset($con, "utf8");
                  $sql = "INSERT INTO grades(lesson_id,user_id) VALUES ";
                  $i=1;
                  foreach ($lesson_id as $key => $value) {
                    $sql .= "('$value','$user_id') ";
                    if($i < count($lesson_id)){
                      $sql .= ",";
                    }else{

                    }
                    $i++;
                  }
                  //echo $sql;
                  $result = mysqli_query($con, $sql);
                    //
                    //   echo "<form action='show_the_lesson.php' method='post'>";
                    //
                    // echo '<p>Πατήστε υποβολή για να προβείτε στις ερωτήσεις</p>';
                    //   echo "<button class='btn btn-default' type='submit'>υποβολή</button>";
                    //
                    //
                    //   echo "</form>";
                    if($result>0){
                      echo '<h2>h egrafh egine </h2>';
                    }else{
                      echo '<h2>h egrafh den egine </h2>';
                    }

                  mysqli_close($con);
                  ?>

            </div>
        </div>
    </body>
</html>
