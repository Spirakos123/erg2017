<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
  <?php require "../php/conf.php";
   require './navbar.php'; ?>
  <div class="container">
    <h3 class="page-header text-center">Top χρήστες</h3>
    <?php
    echo '<table class="table table-hover table-condensed">
            <thead>
              <th>Username</th>
              <th>Title</th>
              <th>Grade</th>
            </thead>';

    $con = mysqli_connect($local,$root,$pass,$idm);
    if (!$con) {
        die("error: " . mysqli_connect_error());
    }
    mysqli_set_charset($con, "utf8");
    $g_title = '';
    $sql = "SELECT
	         users.username,lessons.title,grades.grade
           FROM
	          lessons
            INNER JOIN grades
            ON lessons.id=grades.lesson_id INNER JOIN users ON grades.user_id = users.id
	          WHERE  grade >= 6 ORDER BY title ASC , grade DESC";
            $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {

          //echo "eksw g_title= ".$g_title."<br>";
          $username = $row["username"];
          $title = $row["title"];
          $grade = $row['grade'];
          echo '<tbody>';
          if($g_title == $row['title']){
            //echo "if g_title = ". $g_title."<br>";
            //$g_title = '';
          }else{
            $g_title = $row['title'];
            echo'<tr class="info ">';
          }
          
          echo '<td>'.$username.'</td>
                    <td>'.$title.'</td>
                    <td>'.$grade.'</td>
                  </tr>
                </tbody>';

        }
    }
  echo '</table>';
      mysqli_close($con);
     ?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
