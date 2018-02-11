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
                     $con = mysqli_connect($local, $root, $pass, $idm);
                    if (!$con) {
                        die("Αποτυχία ύνδεσης: " . mysqli_connect_error());
                    }
                    mysqli_set_charset($con, "utf8");
                    $sql = "SELECT * FROM `users`";
                    $result = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        $cnt=0;
                        echo "<form action='update_user_change_values_html.php' method='post'>"; ?>
                        <button class="btn btn-default" style="margin-bottom:10px;" name="save">Save changes</button>
                        <table class="table table-hover table-condensed table-responsive">
                          <thead>
                            <th class="text-center"></th>
                            <th class="text-center">id</th>
                            <th class="text-center">firstname</th>
                            <th class="text-center">lastname</th>
                            <th class="text-center">email</th>
                            <th class="text-center">username</th>
                            <th class="text-center">password</th>
                          </thead>
                          <tbody>
                      <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>

                            <tr class="changes">
                              <td><i class="glyphicon glyphicon-edit edit" style="cursor:pointer;"></i></td>
                              <td><input class="form-control" type="hidden" name="values[<?php echo $row['id']; ?>][id]" value="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
                              <td><input class="form-control" type="text" name="values[<?php echo $row['id']; ?>][firstname]" value="<?php echo $row['firstname']; ?>"></td>
                              <td><input class="form-control" type="text" name="values[<?php echo $row['id']; ?>][lastname]" value="<?php echo $row['lastname']; ?>"></td>
                              <td><input class="form-control" type="text" name="values[<?php echo $row['id']; ?>][email]" value="<?php echo $row['email']; ?>"></td>
                              <td><input class="form-control" type="text" name="values[<?php echo $row['id']; ?>][username]" value="<?php echo $row['username']; ?>"></td>
                              <td><input class="form-control" type="text" name="values[<?php echo $row['id']; ?>][password]" value="<?php echo $row['password']; ?>"></td>
                            </tr>
                            <?php
                        }
                        // echo "<br>" . " <button class='btn btn-default' type='reset'>Καθαρισμός</button>";
                        // echo "<button class='btn btn-default' type='submit'>Υποβολή</button>";?>
                      </tbody>
                    </table>
                    <input type="hidden" name="ids" id="ids">
                        <?php
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
<script type="text/javascript">
$(document).ready(function(){
    var ids = [];
    var id = 0;
    $(".edit").click(function(){
      $(this)["0"].parentElement.parentElement.style.backgroundColor = "#f0ad4e";

      id = $(this)[0]['parentElement']['parentElement']['children'][1]['innerText'];
      var x = ids.indexOf(id);
      if(x == -1){
        ids.push(id);
        $('#ids').val(ids);
      }else{
        //console.log("uparxei idi");
      }
      //console.log($(this)["0"].parentElement.parentElement.style.backgroundColor);
    });
    $(".changes").focusin(function(){
      $(this).css("background-color","#f0ad4e");
      id = $(this)[0]['children'][1]['innerText'];
      var x = ids.indexOf(id);
      if(x == -1){
        ids.push(id);
        $('#ids').val(ids);
      }else{
        //console.log("uparxei idi");
      }
    });

});


</script>
