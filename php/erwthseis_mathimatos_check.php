<?php
require "conf.php";
require "../html/navbar.php";

  //tha mpei se allo arxeio
  //pernoume to id tou question kai to kanoume save se enan array
  if(isset($_POST['postF'])){
    print_r($_POST);
    $arr = array();
    foreach ($_POST as $key => $value) {
      echo $key."</br>";
      $q = explode("_",$key);
      if($key == "postF"){
        continue;
      }
      $arr[] = $q[1];
      print_r($q);
//////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
    }
  print_r($arr);
  $con = mysqli_connect($local,$root,$pass,$idm);
     if (!$con) {
       //  die("error: " . mysqli_connect_error());
     }
     mysqli_set_charset($con, "utf8");

     $sql_question = "SELECT * FROM questions WHERE id='$key' ";
     // $sql_question = "SELECT * FROM questions
     //                 LEFT JOIN have_questions ON questions.id = have_questions.question_id
     //                 WHERE have_questions.question_id=".$lesson_id;
     $result = mysqli_query($con, $sql_question);

     if (mysqli_num_rows($result) > 0) {
       while ($row = mysqli_fetch_assoc($result)) {
           $question_id = $row["id"];
           $question_name = $row['title'];
           $answer = $row['answer'];

             echo $answer;
         }
         if($arr = $answer){

             echo "swstaaaaaa!!!";
           }
           else{
             echo "Oups lathos ";
           }
     }else{
       echo'den uparxei tipota sth bash ';
     }

}
 ?>
