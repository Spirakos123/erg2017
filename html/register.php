<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <?php require './navbar.php'; ?>

<div class="container">
  <h2>Register form</h2>
  <form class="form-horizontal" action="../php/insert_user.php" method='post'>
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
      <div class="col-sm-6">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"required>
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
        <input type="password" class="form-control" id="pwd" pattern=".{4,8}" title='Ο κωδικός πρέπει να είναι από 4-8 χαρακτήρες' placeholder="Enter password" name="pwd" required>
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

</body>
</html>
