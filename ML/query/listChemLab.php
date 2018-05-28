<?php
	include '../../connection/connection.php';
	$labid = $_POST['labid'];
				$selectSql = "SELECT *,DATE_FORMAT(b.expireddate,'%d-%m-%Y') AS expdate, a.name AS chemicalname ,concat(u.fname,' ',u.lname) as owner
							  FROM chemical a 
							  INNER JOIN chemicalin b 
							  ON b.chemicalid = a.chemicalid 
							  INNER JOIN lab c
							  ON b.labid = c.labid
							  INNER JOIN user u ON u.userid = b.userid 
							  WHERE b.labid ='".$labid."'";
				$selectResult = mysqli_query($conn,$selectSql); 
				if(mysqli_num_rows($selectResult) > 0)
				{
				$no = 1;
					while($row = mysqli_fetch_array($selectResult))
					{
					?>
					
					<tr>
						<td><?php echo $no; ?></td>
						<td id="chemical"><?php echo $row["chemicalname"];?></td>
						<td id="chemicaldua"><?php echo $row["owner"];?></td>
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