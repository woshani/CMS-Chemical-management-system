<p>

	<div class="table-responsive">
		<center>
			<table id="viewTableDua" class="table table-striped table-bordered table-hover text-center">
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
				<?php 
				include "../connection/connection.php";
				$user_id = $_SESSION['userid'];
				$selectSql = "SELECT *,DATE_FORMAT(b.expireddate,'%d-%m-%Y') AS expdate, a.name AS chemicalname, concat(u.fname,' ',u.lname) as owner,cu.status as usagestatus
							  FROM chemical a 
							  INNER JOIN chemicalin b 
							  ON b.chemicalid = a.chemicalid 
							  INNER JOIN lab c
							  ON b.labid = c.labid
							  INNER JOIN chemicalusage cu 
							  ON cu.ciid = b.ciid AND (cu.status = 'Approve' OR cu.status ='Pending') AND cu.userid =".$user_id."
							  INNER JOIN user u ON u.userid = b.userid;";
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
						<td id="chemicaldua"><?php echo $row["chemicalname"];?></td>
						<td id="chemicaldua"><?php echo $row["owner"];?></td>
						<td id="expdatedua"><?php echo $row["expdate"];?></td>
						<td><?php echo $row["usagestatus"];?></td>
						<td><?php echo $row["physicaltype"];?></td>
						<td>
							<input id="iddua" name="id" type="hidden" value="<?php echo $row["chemicalid"];?>">
							<input id="chemicalnamedua" name="chemicalnamedua" type="hidden" value="<?php echo $row["chemicalname"];?>">
							<input id="typedua" name="type" type="hidden" value="<?php echo $row["physicaltype"];?>">
							<input id="statusdua" name="status" type="hidden" value="<?php echo $row["status"];?>">
							<input id="dateindua" name="datein" type="hidden" value="<?php echo $row["datein"];?>">
							<input id="supliernamedua" name="supliername" type="hidden" value="<?php echo $row["supliername"];?>">
							<input id="qrcodedua" name="qrcode" type="hidden" value="<?php echo $row["qrcode"];?>">
							<input id="namedua" name="name" type="hidden" value="<?php echo $row["name"];?>">
							<input id="sdsdua" name="sds" type="hidden" value="<?php echo $row["sds"];?>">
							<button type="button" class="btn btn-success" id="btnViewdua" name="btnViewdua" data-toggle="modal" data-target="#modalDetailChemicaldua">View Details</button>
						</td>
					</tr>
				<?php
				$no++;
					}
				}
				else
				{
				?>
					<tr>
						<td colspan="6">No Data</td>
					</tr>
				<?php
				}
				mysqli_close($conn);
				?>
				</tbody>
			</table>
		</center>	
	</div>

	<!-- Modal -->
	<div id="modalDetailChemicaldua" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Chemical Information</h4>
	      </div>
	      <div class="modal-body">
			<table id="tbleDetails" class="table table-striped table-responsive">
				<tr><td>Chemical Name :</td><td id="LIchemicalNamedua"></td></tr>
				<tr><td>Type Chemical :</td><td id="LItypeChemicaldua"></td></tr>
				<tr><td>Status Chemical :</td><td id="LIstatusChemicaldua"></td></tr>
				<tr><td>Date In :</td><td id="LIdatedua"></td></tr>
				<tr><td>Expired date :</td><td id="LIexpdatedua"></td></tr>
				<tr><td>Supplier Name :</td><td id="LIsupplierNamedua"></td></tr>
				<tr><td>QR Code ID :</td><td id="LIqrcodedua"></td></tr>
				<tr><td>lab :</td><td id="LIlabdua"></td></tr>
			</table>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
	   
</p>