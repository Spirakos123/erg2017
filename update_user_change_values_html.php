<!DOCTYPE html>
<!--
Φορμα που ενημερωνει και αλλαζει τα στοιχεια
Ημερομηνια τροποποιησης:25-3-2016 ονοματα: ΔΒ
-->
<html>
    <head>
      <?php include "conf.php";
            require "./nav_admin.html";?>
        <script>
            $(function () {

                $('#time1,#time2').timepicker();

            });
        </script>
    </head>

    <body>
      <div class="container-fluid">
             <div class="col-xs-9 col-sm-9">
                <h3> Ενημερώστε τις τιμές </h3>

                <?php

                $user_id = $_POST['user'];

                 $con = mysqli_connect($local,$root,$pass,$idm);

                if (!$con) {
                    die("Αποτυχια σύνδεσης: " . mysqli_connect_error());
                }
                mysqli_set_charset($con, "utf8");
                $sql = "SELECT * FROM `users`WHERE id='$user_id'"; //τραβαμε ολα τα στοιχεια του αεροδρομιου
    //		για να δωσουμε προηγουμενες τιμες σε ολα οσα δεν θελουμε να αλλαξουμε
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    echo "<form action='update_user_base_admin.php' method='post'>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        $user_id = $row['id'];
                        $previous_user_first_name = $row["firstname"];
                        $previous_user_last_name = $row["lastname"];
                        $previous_user_email = $row['email'];
                        $previous_user_name = $row['username'];
                        $previous_user_password = $row['password'];
                        echo "<input type='hidden' name='user_id' value='$user_id'>";
                        echo "<div class='form-group' >";
                        echo "<label for='new_shop_name'>Νέο όνομα χρηστη:</label>";
                        echo "<input class='form-control' id='new_firstname' type='text' name='new_firstname' value='$previous_user_first_name'>"/* . "<br>"*/;
                        echo "</div>";

                        echo "<div class='form-group'>";
                        echo "<label for='new_user_last_name'>Νέο επώνυμο χρήστη:</label>";
                        echo "<input class='form-control' id='new_lastname' type='text' name ='new_lastname' value='$previous_user_last_name'>" /*. "<br>"*/;
                        echo "</div>";

                        echo "<div class='form-group'>";
                        echo "<label for='new_user_email'>Νέο email χρήστη:</label>";
                        echo "<input class='form-control' id='new_email' type='email' name='new_email' value='$previous_user_email'>" /*. "<br>"*/;
                        echo "</div>";

                        echo "<div class='form-group'>";
                        echo "<label for='new_user_name'>Νέο ονομα χρήστη:</label>";
                        echo "<input class='form-control' id='new_username' type='text' name='new_username' value='$previous_user_name'>"/* . "<br>"*/;
                        echo "</div>";

                        echo "<div class='form-group'>";
                        echo "<label for='new_password'>Νέο συνθηματικό χρηστη:</label>";
                        echo "<input class='form-control' id='new_password' type='text' name='new_password' value='$previous_user_password'>"/* . "<br>"*/;
                        echo "</div>";

                        echo " <a class='btn btn-default' href='update_user_choose_user_html.php' role='button'>Πίσω</a>";
                        echo "<button class='btn btn-default'  type='reset'>επαναφορά</button> <button class='btn btn-default'  type='submit'>υποβολή</button>";

                    }
                    echo "</form>";
                } else {
                    echo "Δεν βρέθηκαν αποτελέσματα";
                }
                mysqli_close($con);
                ?>
            </div>
        </div>
    </body>
</html>
