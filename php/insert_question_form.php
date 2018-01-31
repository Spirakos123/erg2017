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
              $lesson_id=$_POST['lesson_id'];
              $_SESSION['lesson_id'] = $lesson_id;
              echo $lesson_id;

            ?>
            <form  action="insert_question.php" method="post">
              <h3>Εισάγετε την ερώτηση:</h3>
              <input class='form-control' type='text' name='erwthsh'></input>
              <h3>Εισάγετε το είδος ερώτησης:</h3>
              <input class='form-control' type='text' name='eidos_erwthshs'></input><br>
              <button class='btn btn-default' type='submit'>Υποβολή</button>
            </form>
          </div>
        </div>
    </body>
</html>
