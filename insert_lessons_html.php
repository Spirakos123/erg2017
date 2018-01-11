<?php require "./nav_admin.html" ?>
<html>
<body>
  <div class="container">
    <h2>Εισαγωγή μαθήματος</h2>
    <form class="form-horizontal" action="./insert_lessons.php" method='post'>
      <div class="form-group">
        <label class="control-label col-sm-2" for="title">Title:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="title" placeholder="Enter lesson" name="title">
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
