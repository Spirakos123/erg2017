<html>
  <head>
  </head>
  <body>
    <?php

     require "../html/navbar.php" ?>
    <div class="container">
      <h2>Εισαγωγή βαθμού</h2>
      <?php $lesson_id=$_POST["lesson"];   ?>
      <form class="form-horizontal" action="./insert_grade_base.php" method='post'>
        <div class="form-group">
          <label class="control-label col-sm-2" for="title">Βαθμός:</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="title" placeholder="Enter grade" name="title">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-6">
            <button type="submit" class="btn btn-default">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
