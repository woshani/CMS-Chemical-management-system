<?php
	include "../connection/connection.php";
	$user_id = $_SESSION['userid'];

	$selectLab = "SELECT l.labid,l.staffid,n.name FROM labowner l JOIN lab n on n.labid = l.labid WHERE staffid = '".$user_id."'"; 
?>
<p>
	<div class="row">
		<center>
					<div class="form-group">
	                    <label class="col-md-4 control-label" for="textinput">Lab :</label>
	                    <div class="col-md-6">
	                        <select id="selectLab" class="form-control input-md">
								<option selected="" disabled="" > Please select Lab</option>
								<?php
									$resultdua = mysqli_query($conn,$selectLab);
							        if($resultdua->num_rows > 0){
							             while($rowdua = mysqli_fetch_assoc($resultdua)){
							                echo "<option value='".$rowdua['labid']."'>".$rowdua['name']."</option>";
							             }            
							        }else{
							             echo "<option value='NA'>No Data Available</option>";
							        } 
								?>
							</select>
	                    </div>
	                </div>
				
		</center>
		<br/>	
	</div>
	
	<div class="table-responsive">
		<center>
			<div id="divLabList">
				<table id="viewTable" class="table table-striped table-bordered table-hover text-center">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Chemical Name</th>
						<th class="text-center">Owner</th>
						<th class="text-center">Expired Date</th>
						<th class="text-center">Status Chemical</th>
						<th class="text-center">Type Chemical</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan="7">No Data</td>
					</tr>
				</tbody>
			</table>
			</div>
		</center>	
	</div>

	<!-- Modal -->
	<div id="modalDetailChemical" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Chemical Information</h4>
	      </div>
	      <div class="modal-body">
			<table id="tbleDetails" class="table table-striped table-responsive">
				<tr><td>Chemical Name :</td><td id="LIchemicalName"></td></tr>
				<tr><td>Type Chemical :</td><td id="LItypeChemical"></td></tr>
				<tr><td>Status Chemical :</td><td id="LIstatusChemical"></td></tr>
				<tr><td>Date In :</td><td id="LIdate"></td></tr>
				<tr><td>Expired date :</td><td id="LIexpdate"></td></tr>
				<tr><td>Supplier Name :</td><td id="LIsupplierName"></td></tr>
				<tr><td>QR Code ID :</td><td id="LIqrcode"></td></tr>
				<tr><td>lab :</td><td id="LIlab"></td></tr>
				<tr><td>SDS :</td><td><a href="" target="_blank" id="LISDS" download></a></td></tr>
			</table>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
	   
</p>