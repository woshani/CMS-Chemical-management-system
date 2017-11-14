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
				$selectSql = "SELECT *,DATE_FORMAT(b.expireddate,'%d-%m-%Y') AS date, a.name AS chemicalname 
							  FROM chemical a 
							  INNER JOIN chemicalin b 
							  ON b.chemicalid = a.chemicalid 
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
						<td><?php echo $row["date"];?></td>
						<td><?php echo $row["status"];?></td>
						<td><?php echo $row["type"];?></td>
						<td>
							<input id="id" name="id" type="hidden" value="<?php echo $row["chemicalid"];?>">
							<input id="chemicalname" name="chemicalname" type="hidden" value="<?php echo $row["chemicalname"];?>">
							<input id="type" name="type" type="hidden" value="<?php echo $row["type"];?>">
							<input id="status" name="status" type="hidden" value="<?php echo $row["status"];?>">
							<input id="datein" name="datein" type="hidden" value="<?php echo $row["datein"];?>">
							<input id="supliername" name="supliername" type="hidden" value="<?php echo $row["supliername"];?>">
							<input id="qrcode" name="qrcode" type="hidden" value="<?php echo $row["qrcode"];?>">
							<input id="name" name="name" type="hidden" value="<?php echo $row["name"];?>">
							<button type="button" class="btn btn-success" name="btnView" data-toggle="modal" data-target="#modalDetailChemical">View Details</button>
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
	<div id="modalDetailChemical" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Modal Header</h4>
	      </div>
	      <div class="modal-body">
		<form id="contactForm" method="post" action="">
	        <label class="control-label">Chemical Name :</label> <input id="1" name="1" type="text">
			<br>
		    <label class="control-label">Type Chemical :</label> <input id="2" name="2" type="text">
			<br>
			<label class="control-label">Status Chemical :</label> <input id="3" name="3" type="text">
			<br>
			<label class="control-label">Date In :</label> <input id="4" name="4" type="text">
			<br>
			<label class="control-label">Supplier Name :</label> <input id="5" name="5">
			<br>
			<label class="control-label">QR Code :</label> <input id="6" name="6" type="text">
			<br>
			<label class="control-label">lab :</label> <input id="7" name="7" type="text">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
		</form>
	    </div>

	  </div>
	</div>
	   
</p>