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
        <input type="text" class="form-control" id="fname" placeholder="Enter first name" name="fname"required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="lname">Last_Name:</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="lname" placeholder="Enter last name" name="lname"required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-6 emailDiv" >
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
        <span id="email_text"></span>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="username">Username:</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username"required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-6">
        <input type="password" class="form-control" id="pwd" pattern=".{4,8}" title='Ο κωδικός πρέπει να είναι από 4-8 χαρακτήρες' placeholder="Enter password" name="pwd"required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Confirm_Password:</label>
      <div class="col-sm-6">
        <input type="password" class="form-control" id="cpwd" pattern=".{4,8}" title='Ο κωδικός πρέπει να είναι από 4-8 χαρακτήρες' placeholder="Enter password again" name="cpwd"required>
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
 <script src="../js/insert_user_admin.js"></script>
</body>
</html>
