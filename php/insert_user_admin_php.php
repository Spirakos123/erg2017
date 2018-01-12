<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
  <?php require "../html/navbar.php"; ?>
<div class="container">
  <h2>Register form</h2>
  <form class="form-horizontal" action="insert_user_admin.php" method='post'>
    <div class="form-group">
      <label class="control-label col-sm-2" for="fname">First_Name:</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="fname" placeholder="Enter first name" name="fname">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="lname">Last_Name:</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="lname" placeholder="Enter last name" name="lname">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-6">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="username">Username:</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-6">
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Confirm_Password:</label>
      <div class="col-sm-6">
        <input type="password" class="form-control" id="cpwd" placeholder="Enter password again" name="cpwd">
      </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-6">
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
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
