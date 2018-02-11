<?php
require "conf.php";
require "../html/navbar.php";

  //tha mpei se allo arxeio
  //pernoume to id tou question kai to kanoume save se enan array
  if(isset($_POST['postF'])){
    $i=0;
    print_r($_POST);
    $arr = array();
    foreach ($_POST as $key => $value) {
      //echo $key."</br>";
      $q = explode("_",$key);
      if($key == "postF"){
        continue;
      }
      $arr['All_questions'][$i]['question_id'] = $q[1];
      $arr['All_questions'][$i]['answer'] = $value;
      $i++;
      //print_r($q);
//////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
    }
  echo "<pre>";
  print_r($arr);
  echo "</pre>";

  $con = mysqli_connect($local,$root,$pass,$idm);
     if (!$con) {
       //  die("error: " . mysqli_connect_error());
     }
     $answer = '';
     $question_id = '';
     $i=0;
     $maxGrade = 10;
     mysqli_set_charset($con, "utf8");
     //gia na vreis ton vathmo pou peire stin kathe erwtisi
     foreach ($arr['All_questions'] as $key => $value) {
       echo "key = ".$key."</br>";
       foreach ($value as $key2 => $value2) {
         echo "key2 = ".$key2."</br>";
         echo "value2 = ".$value2."</br>";


         if($key2 == "question_id"){
           $question_id = $value2;
           $sql_question = "SELECT answer FROM questions WHERE id = '$value2' ";
           $result = mysqli_query($con, $sql_question);
           if (mysqli_num_rows($result) > 0) {
             while ($row = mysqli_fetch_assoc($result)) {
                 $answer = $row['answer'];
                 echo "answer = ".$answer."</br>";
               }
           }else{
             echo "No correct anwser found!";
           }

         }else{

           if($value2 == $answer){
              $grades['bathmoi'][$i]['question_id'] = $question_id;
              $grades['bathmoi'][$i]['answer'] = $value2;

              $final_grade = $maxGrade/count($arr['All_questions']);
              $grades['bathmoi'][$i]['grade'] = $final_grade;
              $i++;

              echo "swstaaaaaa!!!";

             }
             else{
               echo "Oups lathos ";
               $grades['bathmoi'][$i]['question_id'] = $question_id;
               $grades['bathmoi'][$i]['answer'] = $value2;
               $grades['bathmoi'][$i]['grade'] = 0;
               $i++;
             }
         }

       }//end foreach

     }//end foreach

     echo "<pre>";
     print_r($grades);
     echo "</pre>";
     print_r($_SESSION);
     $grade = 0;
     foreach ($grades['bathmoi'] as $key => $value) {
       foreach ($value as $key2 => $value2) {
         if($key2 == 'grade'){
           //sunolikos vathmos
           $grade += $value2;
         }
       }
     }
     echo "grade = ".$grade."</br>";
     echo "bathmos ana erwtisi".$maxGrade/count($arr['All_questions']);
     $lesson_id = $_SESSION['lesson_id'];
     $user_id = $_SESSION['user_id'];
     $sql = "UPDATE grades SET grade = '$grade', examined = 1 WHERE user_id = '$user_id' AND lesson_id = '$lesson_id' ";
     $result = mysqli_query($con, $sql);
     if($result){
       echo "o vathmos apothikeutike";
     }else{
       echo "something went wrong";
     }

}
 ?>
