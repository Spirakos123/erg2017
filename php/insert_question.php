<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php require "conf.php";
          require "../html/navbar.php"; ?>
  </head>
  <body>
      <div class="container-fluid">
        <div class="col-xs-9 col-sm-9">

            <?php
              $lesson_id=$_SESSION['id'];
              $erwthsh=$_POST['erwthsh'];
              $eidos_erwthshs=$_POST['eidos_erwthshs'];
              $con = mysqli_connect($local,$root,$pass,$idm);
               if (!$con) {
               die('Could not connect: ' . mysql_error());
               }
              mysqli_set_charset($con, "utf8");
              $sql="INSERT INTO questions (title,kind_question) VALUES('$erwthsh','$eidos_erwthshs')";
               if(mysqli_query($con, $sql)) {
                   $sql_question="SELECT * FROM questions";
                   $result_question = mysqli_query($con, $sql_question);

                     if (mysqli_num_rows($result_question) > 0) {
                        while ($row = mysqli_fetch_assoc($result_question)) {
                             $question_id = $row["id"];
                        }
                     }else{
                         echo "<h3>Δεν υπάρχουν εγγραφες</h3>";
                      }
                   echo "<h3>Η εισαγωγή έγινε με επιτυχία!</h3>";
                       $sql_have_question="INSERT INTO have_questions (lesson_id,question_id) VALUES('$lesson_id','$question_id')";
                       if (mysqli_query($con, $sql_have_question)) {
                         echo "<h3>Η εισαγωγή έγινε με επιτυχία!</h3>";
                       }else{
                         echo "<h3>Κάτι πηγε στραβα στην εισαγωγή αυτή !</h3>";
                       }

               }else{
                 echo "Error: " . $sql . "<br>" . mysqli_error($con);
               }

               mysqli_close($con);


            ?>

            </div>
        </div>
    </body>
</html>
