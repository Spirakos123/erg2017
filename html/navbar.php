<html>
  <head>
  	<title>Bootstrap Example</title>
  	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
  	<?php
      session_start();
      if(isset($_SESSION['role'])){
  		    if($_SESSION['role'] == "admin"){
  	?>
  	<nav class="navbar navbar-inverse">
     <div class="container-fluid">
       <div class="navbar-header">
         <a class="navbar-brand" href="#">Lessons</a>
       </div>
       <ul class="nav navbar-nav">
         <li class="active"><a href="#">Home</a></li>
         <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Μαθήματα <span class="caret"></span></a>
           <ul class="dropdown-menu">
             <li><a href="../php/insert_lessons_html.php">Εισαγωγή μαθημάτων</a></li>
             <li><a href="#">Ενημέρωση μαθημάτων</a></li>
             <li><a href="#">Διαγραφή μαθημάτων</a></li>
           </ul>
         </li>
         <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Ερωτήσεις Μαθημάτων<span class="caret"></span></a>
           <ul class="dropdown-menu">
             <li><a href="#">Δημιουργία ερωτήσεων</a></li>
             <li><a href="#">Ενημέρωση ερωτήσεων</a></li>
             <li><a href="#">Διαγραφή ερωτήσεων</a></li>
           </ul>
         </li>
         <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Χρήστες<span class="caret"></span></a>
           <ul class="dropdown-menu">
             <li><a href="../php/insert_user_admin_php.php">Δημιουργία χρηστών</a></li>
             <li><a href="../php/update_user_choose_user_html.php">Ενημέρωση χρηστών</a></li>
             <li><a href="#">Διαγραφή χρηστών</a></li>
           </ul>
         </li>
       </ul>
       <ul class="nav navbar-nav navbar-right">
         <li><a href="../php/logout.php"><span class="glyphicon glyphicon-log-out"></span>Log_out</a></li>
        </ul>
     </div>
   </nav>
  	<?php
      //end of admin
      }else{
    ?>
  	<nav class="navbar navbar-inverse">
	    <div class="container-fluid">
	      <div class="navbar-header">
	        <a class="navbar-brand" href="#">Lessons</a>
	      </div>
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="./home.php">Home</a></li>
	        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Μαθήματα <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Εγγραφή σε μαθήματα</a></li>
	            <li><a href="#">Διαγραφή από μαθήματα </a></li>
	            <li><a href="#"></a></li>
	          </ul>
	        </li>
	        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Χρήστες<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Ενημέρωση χρηστών</a></li>
	          </ul>
	        </li>
	        </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="../php/logout.php"><span class="glyphicon glyphicon-log-out"></span>Log_out</a></li>
	      </ul>
	    </div>
	</nav>
  <?php } //end of user

    //end of isset session
    }else{
   ?>
   <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Lessons</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="./home.php">Home</a></li>
          <li><a href="#">top χρήστες</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="./register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li><a href="./login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
      </div>
    </nav>
  <?php } //end of guest ?>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>


</html>
