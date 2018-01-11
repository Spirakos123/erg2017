<?php session_start(); ?>

<?php  require "nav_admin.html";?>
<div class="container">
  <h1>HELLO <?php echo $_SESSION['username']; ?> </h1>
  <p>The .navbar-right class is used to right-align navigation bar buttons.</p>
</div>
