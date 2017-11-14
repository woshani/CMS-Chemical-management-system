<?php 
include "../../connection/connection.php";
$qrcode = $_POST['QrCode'];

$query = "SELECT ci.ciid, c.name, u.fname, u.lname, ci.status, ci.expireddate, ci.sds  
            FROM chemical c, chemicalIn ci, user u 
            WHERE c.chemicalid = ci.chemicalid AND ci.userid = u.userid AND qrcode = '".$qrcode."'";
$resultSelect = mysqli_query($conn, $query);
if($resultSelect->num_rows > 0){
while ($row = mysqli_fetch_array($resultSelect)){
?>                
                
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Name of Chemical :</label>
                    <div class="col-md-6">
                        <?php echo $row['name'];?></div>
                        <input type="hidden" id="chemicalInId" value="<?php echo $row['ciid'];?>">
                        <input type="hidden" id="chemicalUserId" value="<?php echo $_SESSION["userid"];?>">
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
                        <?php echo $row['sds'];?></div>
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