<p>
	<div class="table-responsive">
		<center>
			<table id="tableStaff" class="table table-striped table-bordered table-hover text-center">
				<thead>
						<th class="text-center">#</th>
						<th class="text-center">Full Name</th>
						<th class="text-center">Identity No</th>
						<th class="text-center">Email</th>
						<th class="text-center">Phone No</th>
						<th class="text-center">Role</th>
				</thead>
				<?php 
				include '../connection/connection.php';
				$user_id = $_SESSION['userid'];
				$selectSql = "SELECT * FROM user WHERE status = 'Approve' AND role!='Student'";
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
						<td><?php echo $row["fname"];?> <?php echo $row["lname"];?></td>
						<td id="keyStud"><?php echo $row["identifyid"];?></td>
						<td id="keyEmali"><?php echo $row["email"];?></td>
						<td><?php echo $row["telno"];?></td>
						<td><?php echo $row["role"];?></td>
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
   
</p>