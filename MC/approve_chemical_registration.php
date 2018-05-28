<p>

	<div class="table-responsive">
		<center>
			<table id="registrationStatTable" class="table table-striped table-bordered table-hover text-center">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Registered By</th>
						<th class="text-center">Identity No</th>
						<th class="text-center">Email</th>
						<th class="text-center">Phone No</th>
						<th class="text-center">Chemical Name</th>
						<th class="text-center">Registration Status</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<?php 
				include $_SERVER['DOCUMENT_ROOT'] . '/connection/connection.php';
				$user_id2 = $_SESSION['userid'];
				$selectSql2 = "SELECT  CONCAT(d.fname,' ',d.lname) as fullname, d.identifyid,d.email,d.telno,a.name as chemical_name,b.registration_status as regisStat,ciid as cid
							  FROM chemical a 
							  INNER JOIN chemicalin b 
							  ON b.chemicalid = a.chemicalid and b.registration_status!='Approve'
							  INNER JOIN lab c
							  ON b.labid = c.labid
							  INNER JOIN user d on b.register_by = d.identifyid
							  WHERE b.userid =".$user_id;
				$selectResult2 = mysqli_query($conn,$selectSql2);
				if(mysqli_num_rows($selectResult2) > 0)
				{
				$no2 = 1;
					while($row2 = mysqli_fetch_array($selectResult2))
					{
					?>
					
				<tbody>
					<tr>
						<td><?php echo $no2; ?></td>
						<td><?php echo $row2["fullname"];?></td>
						<td id="keyStud2"><?php echo $row2["identifyid"];?></td>
						<td id="keyEmali2"><?php echo $row2["email"];?></td>
						<td><?php echo $row2["telno"];?></td>
						<td><?php echo $row2["chemical_name"];?><input type="hidden" name="ciidapprove2" id="ciidapprove2" value="<?php echo $row2['cid'];?>"></td>
						<td><?php echo $row2["regisStat"];?></td>
						<td>
							<?php
								if($row2["regisStat"]=="Reject"){
									echo "<button type='submit' disabled class='btn btn-danger'>Rejected</button>";
								}else if($row2["regisStat"]=="Approve"){
									echo "<button type='submit' disabled class='btn btn-success'>Approved</button>";
								}else{
									echo "<button type='submit' name='btnAccept2' id='btnAccept2' class='btn btn-success'>Accept</button>
										<button type='submit' name='btnReject2' id='btnReject2' class='btn btn-danger'>Reject</button>";
								} 
							?>
							
						</td>
					</tr>
				<?php
				$no2++;
					}
				}
				else
				{
				?>
					<tr>
						<td colspan="8">No Data</td>
					</tr>
				<?php
				}
				mysqli_close($conn);
				?>
				</tbody>
			</table>
		</center>	
	</div>
   
</p>