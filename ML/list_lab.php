<?php
include '../connection/connection.php';
$query = "SELECT labid, name FROM lab";
$resultSelect = mysqli_query($conn, $query);

?>

<div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Lab Name</th>
                  <th></th>
                </tr>
                <?php
                if($resultSelect->num_rows > 0){
                    $numRow = 0; 
                    while ($row = mysqli_fetch_array($resultSelect)){
                       $numRow = $numRow + 1;
                ?>
                <tr>
                  <td><?php echo $numRow?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><button id="btnViewLab<?php echo $row['labid']; ?>" class="btn btn-primary" value="<?php echo $row['labid']; ?>">View</button></td>
                </tr>
                
            <script>
            $('#btnViewLab<?php echo $row['labid']; ?>').on('click',function(e){
                e.preventDefault();
                var labid = $('#btnViewLab<?php echo $row['labid']; ?>').val();
                    $.ajax({
                     type:"post",
                     url:"view_labowner.php",
                     data:{"labid":labid},
                     success:function(databack){
                         console.log(databack);
                         $('#viewLabOwner').html(databack);
                     }
                    });
                }
            );
            </script>
                <?php
                        }
                    }
                    mysqli_close($conn);
                ?>
              </table>
            </div>
</br>
            <div id="viewLabOwner" class="box-body no-padding">
            </div>

</br>
            <div id="addLabOwner" class="box-body no-padding">
            </div>

