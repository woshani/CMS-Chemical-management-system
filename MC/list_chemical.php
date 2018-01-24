<p>

	<div class="table-responsive">
		<center>
			<table id="viewTable" class="table table-striped table-bordered table-hover text-center">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Chemical Name</th>
						<th class="text-center">Expired Date</th>
						<th class="text-center">Status Chemical</th>
						<th class="text-center">Type Chemical</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<?php 
				include "../connection/connection.php";
				$user_id = $_SESSION['userid'];
				$selectSql = "SELECT *,DATE_FORMAT(b.expireddate,'%d-%m-%Y') AS expdate, a.name AS chemicalname 
							  FROM chemical a 
							  INNER JOIN chemicalin b 
							  ON b.chemicalid = a.chemicalid and b.registration_status='Approve'
							  INNER JOIN lab c
							  ON b.labid = c.labid
							  WHERE b.userid =".$user_id;
				$selectResult = mysqli_query($conn,$selectSql);
				if(mysqli_num_rows($selectResult) > 0)
				{
				$no = 1;
					while($row = mysqli_fetch_array($selectResult))
					{
					?>
					
				<tbody>
					<tr>
						<td><?php echo $no; ?></td>
						<td id="chemical"><?php echo $row["chemicalname"];?></td>
						<td id="expdate"><?php echo $row["expdate"];?></td>
						<td><?php echo $row["status"];?></td>
						<td><?php echo $row["physicaltype"];?></td>
						<td>
							<input id="id" name="id" type="hidden" value="<?php echo $row["chemicalid"];?>">
							<input id="chemicalname" name="chemicalname" type="hidden" value="<?php echo $row["chemicalname"];?>">
							<input id="type" name="type" type="hidden" value="<?php echo $row["physicaltype"];?>">
							<input id="status" name="status" type="hidden" value="<?php echo $row["status"];?>">
							<input id="datein" name="datein" type="hidden" value="<?php echo $row["datein"];?>">
							<input id="supliername" name="supliername" type="hidden" value="<?php echo $row["supliername"];?>">
							<input id="qrcode" name="qrcode" type="hidden" value="<?php echo $row["qrcode"];?>">
							<input id="name" name="name" type="hidden" value="<?php echo $row["name"];?>">
							<input id="sds" name="sds" type="hidden" value="<?php echo $row["sds"];?>">
							<button type="button" class="btn btn-success" id="btnView" name="btnView" data-toggle="modal" data-target="#modalDetailChemical">View Details</button>
						</td>
					</tr>
				<?php
				$no++;
					}
				}
				mysqli_close($conn);
				?>
				</tbody>
			</table>
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
				<tr><td colspan="2" style="text-align: center;font-weight: bold;">Chemical Information</td></tr>
				<tr><td>Chemical Name :</td><td id="LIchemicalName"></td></tr>
				<tr><td>Type Chemical :</td><td id="LItypeChemical"></td></tr>
				<tr><td>Status Chemical :</td><td id="LIstatusChemical"></td></tr>
				<tr><td>Date In :</td><td id="LIdate"></td></tr>
				<tr><td>Expired date :</td><td id="LIexpdate"></td></tr>
				<tr><td>Supplier Name :</td><td id="LIsupplierName"></td></tr>
				<tr><td>QR Code ID :</td><td id="LIqrcode"></td></tr>
				<tr><td>lab :</td><td id="LIlab"></td></tr>
				<tr><td>SDS :</td><td><a href="" target="_blank" id="LISDS" download></a></td></tr>
				<tr><td colspan="2" style="text-align: center;font-weight: bold;">Borrower Information</td></tr>
				<tr><td>Used By :</td><td id="LIusedby"></td></tr>
				<tr><td>Matric/Staff ID :</td><td id="LImatric"></td></tr>
				<tr><td>TelNo :</td><td id="LItelno"></td></tr>
				<tr><td>Email :</td><td id="LIemail"></td></tr>
				<tr><td>Borrow Date :</td><td id="LIbdate"></td></tr>
			</table>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
	   
</p>