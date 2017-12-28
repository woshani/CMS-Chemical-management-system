<?php
include "../connection/connection.php";
$query = "SELECT labid, name FROM lab";
$resultSelect = mysqli_query($conn, $query);

?>
<p>
<div class="box-body no-padding">
  <table class="table table-striped" id="tbleAssignCh">
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
        <td><input type="hidden" name="" id="hiddenvaluess" value="<?php echo $row['labid'];?>"><button id="btnAssign" class="btn btn-primary"  data-toggle="modal" data-target="#modalassignlab">assign</button></td>
      </tr>
      <?php
    }
  }
  mysqli_close($conn);
  ?>
</table>
</div>

  <div id="modalassignlab" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Assign Labs</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <label class="col-md-2 control-label" for="textinput">PJ Name :</label>
              <div class="col-md-6">
                <input type="text" class="form-control input-md" name="pjName" id="pjName">
                <input type="hidden" name="labidHidden" id="labidHidden">
                <input type="hidden" class="form-control"  id="pjID" name="pjID">
                <div id="matchPJ"></div>
              </div>
              <div class="col-md-2">
                <button class="btn btn-primary" id="assignthepj">Assign!</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
</p>
