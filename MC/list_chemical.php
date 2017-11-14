<p>

	<div class="table-responsive">
		<center>
			<table id="userTable" class="table table-striped table-bordered table-hover text-center">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Chemical Name</th>
						<th class="text-center">Expired Date</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<?php 
				include "../connection/connection.php";
				$user_id = $_SESSION['userid'];
				$selectSql = "SELECT name,DATE_FORMAT(expireddate,'%d-%m-%Y') AS date FROM chemical a INNER JOIN chemicalin b ON b.chemicalid = a.chemicalid  WHERE b.userid =".$user_id;
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
						<td><?php echo $row["name"];?></td>
						<td><?php echo $row["date"];?></td>
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
   
</p>