<p>

	<div class="table-responsive">
		<center>
			<table id="userTable" class="table table-striped table-bordered table-hover text-center">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Full Name</th>
						<th class="text-center">Identity No</th>
						<th class="text-center">Email</th>
						<th class="text-center">Phone No</th>
						<th class="text-center">Chemical Name</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<?php 
				include "../connection/connection.php";
				$user_id = $_SESSION['userid'];
				$selectSql = "SELECT CONCAT(a.fname,' ',a.lname) as fullname, a.identifyid,a.email,a.telno,d.name as chemical_name,c.ciid as cid,b.cuid as cuid
							  FROM user a, chemicalusage b, chemicalin c,chemical d
							  WHERE a.userid = b.userid AND c.ciid = b.ciid AND b.status = 'Pending' AND c.userid=".$user_id." AND c.chemicalid = d.chemicalid AND c.status!='Dispose'";
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
						<td><?php echo $row["fullname"];?></td>
						<td id="keyStud"><?php echo $row["identifyid"];?></td>
						<td id="keyEmali"><?php echo $row["email"];?></td>
						<td><?php echo $row["telno"];?><input type="hidden" name="ciudapprove" id="ciudapprove" value="<?php echo $row['cuid'];?>"></td>
						<td><?php echo $row["chemical_name"];?><input type="hidden" name="ciidapprove" id="ciidapprove" value="<?php echo $row['cid'];?>"></td>
						<td>
							<button type="submit" name="btnAccept" id="btnAccept" class="btn btn-success">Accept</button>
							<button type="submit" name="btnReject" id="btnReject" class="btn btn-success">Reject</button>
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
						<td colspan="7">No Data</td>
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