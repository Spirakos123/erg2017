<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php  require "./navbar.php";?>
    <div class="container">
      <h1>HELLO <?php echo $_SESSION['username']; ?> </h1>
    </div>
  </body>
</html>
