<html>
    <head>

    </head>
    <body>
      <?php
      require "conf.php";
      require "../html/navbar.php";
      ?>
       <div class="container-fluid">
                 <div  class="col-xs-9 col-sm-9">
                    <h3>Επιλογή χρήστη για ενημέρωση</h3>
                    <?php
                     $con = mysqli_connect($local,$root,$pass,$idm);
                    if (!$con) {
                        die("Αποτυχία ύνδεσης: " . mysqli_connect_error());
                    }
                    mysqli_set_charset($con, "utf8");
                    $sql = "SELECT * FROM `users`";
                    $result = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        $cnt=0;
                        echo "<form action='update_user_change_values_html.php' method='post'>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            $user_id = $row["id"];
                            if($cnt==0){
                                $input_string="<input type='radio' name='user' value=$user_id>";
                            }else{
                                $input_string="<input type='radio' name='user' value=$user_id>";
                            }
                            echo $input_string;
                            echo " Username: " . $row["username"];
                            echo " Firstname: " . $row["firstname"];
                            echo " Lastname: " . $row["lastname"] . "<br>";
                            $cnt++;
                        }
                        echo "<br>" . " <button class='btn btn-default' type='reset'>Καθαρισμός</button>";
                        echo "<button class='btn btn-default' type='submit'>Υποβολή</button>";


                        echo "</form>";
                    } else {
                        echo "Δεν βρέθηκαν αποτελέσματα";
                    }

                    mysqli_close($con);
                    ?>
                </body>
            </div>
    </div>
</html>
