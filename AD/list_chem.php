<p>

	<div class="table-responsive">
		<center>
			<table id="tableChemical" class="table table-striped table-bordered table-hover text-center">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Chemical name</th>
						<th class="text-center">Physical Type</th>
						<th class="text-center">Eng Control</th>
						<th class="text-center">PPE</th>
						<th class="text-center">Class</th>
						<th class="text-center">GHS</th>
					</tr>
				</thead>
				<?php 
				include "../connection/connection.php";
				$user_id = $_SESSION['userid'];
				$selectSql = "SELECT * FROM chemical";
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
						<td id="keyStud"><?php echo $row["physicaltype"];?></td>
						<td id="keyEmali"><?php echo $row["engcontrol"];?></td>
						<td><?php echo $row["ppe"];?></td>
						<td><?php echo $row["class"];?></td>
						<td><?php echo $row["ghs"];?></td>
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