<?php 
include "../../connection/connection.php";
session_start();
$qrcode = $_POST['QrCode'];

$query = "SELECT ci.ciid, c.name, u.fname, u.lname, ci.status, ci.expireddate, ci.sds, u.email ,ci.type as ctype,u.userid as ownerid
            FROM chemical c, chemicalIn ci, user u 
            WHERE c.chemicalid = ci.chemicalid AND ci.userid = u.userid AND qrcode = '".$qrcode."' AND ci.status='Available'";
$resultSelect = mysqli_query($conn, $query);
if($resultSelect->num_rows > 0){
while ($row = mysqli_fetch_array($resultSelect)){
?>                
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Name of Chemical :</label>
                    <div class="col-md-6">
                        <?php echo $row['name'];?></div>
                        <input type="hidden" id="chemicalInId" value="<?php echo $row['ciid'];?>">
                        <input type="hidden" id="chemicalTypePrivate" value="<?php echo $row['ctype'];?>">
                        <input type="hidden" id="chemicalUserId" value="<?php echo $_SESSION["userid"];?>">
						<input type="hidden" id="email" value="<?php echo $row['email'];?>">
                        <input type="hidden" id="ownerid" value="<?php echo $row['ownerid'];?>">
						<input type="hidden" id="sub" value="ZeroWaste - User Reuse Chemical Request">
						<input type="hidden" id="message" value="Please Check ZeroWaste account to accept / reject  of <?php echo $_SESSION["fname"]." ".$_SESSION["lname"];?> request to use Chemical <?php echo $row['name'];?>">
                        <input type="hidden" id="messagepublic" value="User <?php echo $_SESSION["fname"]." ".$_SESSION["lname"];?> is now using your Chemical <?php echo $row['name'];?>">
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Owner Name :</label>
                    <div class="col-md-6">
                        <?php echo $row['fname']; echo " "; echo $row['lname'];?></div>
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Status :</label>
                    <div class="col-md-6">
                        <?php echo $row['status'];?></div>
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Expired Date :</label>
                    <div class="col-md-6">
                        <?php echo $row['expireddate'];?></div>
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">SDS File :</label>
                    <div class="col-md-6">
                        <a href="../SDS/<?php echo $row['sds'];?>" target="_blank" download><?php echo $row['sds'];?></a></div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Initial Quantity :</label>
                    <div class="col-md-6">
                        <input type="text" name="initial_quantity" id="initial_quantity" placeholder="ml/l/g/kg"></div>
                </div>
               

                <?php
}}else{
    ?>
    <div class="form-group has-error">
                    <div class="col-md-6">
                    <label class="col-md-4 control-label" for="inputError"><i class="fa fa-times-circle-o"></i> No Chemical for that QrCode</label>
                </div>
  <?php
}
                ?>