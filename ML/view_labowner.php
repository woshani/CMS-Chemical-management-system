<?php
include '../connection/connection.php';
$labid = $_POST['labid'];
$query = "SELECT labid, name FROM lab WHERE labid = '".$labid."'";
$resultSelect = mysqli_query($conn, $query);

$query2 = "SELECT * FROM labowner o, user s WHERE o.staffid = s.userid AND o.labid = '".$labid."'";
$resultSelect2 = mysqli_query($conn, $query2);

?>
<h3 style="margin: 0px; padding: 0px;"><?php while ($row = mysqli_fetch_array($resultSelect)){ echo $row['name']; }?> </h3>
</br>
<div class="box-body no-padding">
    <?php
if($resultSelect2->num_rows == 0){
    ?>
<div class="form-group has-error">
                  <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> No Assistant Engineer for this Lab</label>
                </div>
    <?php

}else{
    ?>
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Staff Id</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                </tr>
                <?php
                if($resultSelect2->num_rows > 0){
                    $numRow = 0; 
                    while ($row2 = mysqli_fetch_array($resultSelect2)){
                       $numRow = $numRow + 1;
                ?>
                <tr>
                  <td><?php echo $numRow?></td>
                  <td><?php echo $row2['identifyid']; ?></td>
                  <td><?php echo $row2['fname']; ?></td>
                  <td><?php echo $row2['lname']; ?></td>
    </script>
                <?php
                        }
                    }
                ?>
              </table>
              <?php

}
              ?>
            </div>


<?php
                        
                    mysqli_close($conn);
                ?>
