<!DOCTYPE html>
<!--
Φορμα που ενημερωνει και αλλαζει τα στοιχεια
Ημερομηνια τροποποιησης:25-3-2016 ονοματα: ΔΒ
-->
<html>
    <head>

        <script>
            $(function () {
                $('#time1,#time2').timepicker();
            });
        </script>
    </head>

    <body>
      <?php
      require "conf.php";
      require "../html/navbar.php";
      ?>
      <div class="container-fluid">
             <div class="col-xs-9 col-sm-9">
                <h3> Ενημερώστε τις τιμές </h3>

                <?php
                $con = mysqli_connect($local, $root, $pass, $idm);
                echo "<pre>";
                print_r($_POST);
                echo "</pre>";
                $ids = $_POST['ids'];
                $sql = "SELECT * FROM `users`WHERE id IN($ids)"; //τραβαμε ολα τα στοιχεια του αεροδρομιου
    //		για να δωσουμε προηγουμενες τιμες σε ολα οσα δεν θελουμε να αλλαξουμε
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $user_id = $row['id'];
                        foreach ($_POST['values'] as $key => $value) {
                            if ($key==$row['id']) {
                                //print_r($value);
                                $firstname = $value['firstname'];
                                $lastname = $value['lastname'];
                                $email = $value['email'];
                                $username = $value['username'];
                                $hash = password_hash($value['password'], PASSWORD_DEFAULT);
                                $sql = "UPDATE users SET firstname = '$firstname',
                             lastname='$lastname', email='$email',
                             username='$username', password='$hash'
                             WHERE id = '$user_id'";
                                echo $sql;

                                mysqli_set_charset($con, "utf8");
                                if (mysqli_query($con, $sql)) {
                                    echo "<h3>Η ενημέρωση έγινε με επιτυχία</h3>" . "<br>";
                                    echo "<p> <a class='btn btn-default' href='#' role='button'>Πίσω στην αρχική</a>";
                                } else {
                                    echo "<h3>Σφάλμα ενημέρωσης:</h3> <h5>" . mysqli_error($con) . "</h5>";
                                }
                            } else {
                                continue;
                            }
                        }
                    }
                }
                die;
                $user_id = $_POST['user'];

                 $con = mysqli_connect($local, $root, $pass, $idm);

                if (!$con) {
                    die("Αποτυχια σύνδεσης: " . mysqli_connect_error());
                }
                mysqli_set_charset($con, "utf8");
                $sql = "SELECT * FROM `users`WHERE id='$user_id'"; //τραβαμε ολα τα στοιχεια του αεροδρομιου
    //		για να δωσουμε προηγουμενες τιμες σε ολα οσα δεν θελουμε να αλλαξουμε
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    echo "<form action='./update_user_base_admin.php' method='post'>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        $user_id = $row['id'];
                        $previous_user_first_name = $row["firstname"];
                        $previous_user_last_name = $row["lastname"];
                        $previous_user_email = $row['email'];
                        $previous_user_name = $row['username'];
                        $previous_user_password = $row['password']; ?>



                        <?php
                        echo "<input type='hidden' name='user_id' value='$user_id'>";
                        echo "<div class='form-group' >";
                        echo "<label for='new_shop_name'>Νέο όνομα χρηστη:</label>";
                        echo "<input class='form-control' id='new_firstname' type='text' name='new_firstname' value='$previous_user_first_name' required>"/* . "<br>"*/;
                        echo "</div>";

                        echo "<div class='form-group'>";
                        echo "<label for='new_user_last_name'>Νέο επώνυμο χρήστη:</label>";
                        echo "<input class='form-control' id='new_lastname' type='text' name ='new_lastname' value='$previous_user_last_name' required>" /*. "<br>"*/;
                        echo "</div>";

                        echo "<div class='form-group'>";
                        echo "<label for='new_user_email'>Νέο email χρήστη:</label>";
                        echo "<input class='form-control' id='new_email' type='email' name='new_email' value='$previous_user_email'required>" /*. "<br>"*/;
                        echo "</div>";

                        echo "<div class='form-group'>";
                        echo "<label for='new_user_name'>Νέο ονομα χρήστη:</label>";
                        echo "<input class='form-control' id='new_username' type='text' name='new_username' value='$previous_user_name'required>"/* . "<br>"*/;
                        echo "</div>";

                        echo "<div class='form-group'>";
                        echo "<label for='new_password'>Νέο συνθηματικό χρηστη:</label>";
                        echo "<input class='form-control' id='new_password' type='text' name='new_password' pattern='.{4,8}' title='Ο κωδικός πρέπει να είναι από 4-8 χαρακτήρες'  value='$previous_user_password'required>"/* . "<br>"*/;
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
