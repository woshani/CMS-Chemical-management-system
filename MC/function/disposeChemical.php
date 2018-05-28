<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/connection/connection.php';
session_start();
$qrcode = $_POST['QrCode'];
$userid = $_POST['userid'];

$query = "SELECT ci.ciid, c.name, u.fname, u.lname, ci.status, ci.expireddate, ci.sds, u.email,cu.startdate,cu.status  
            FROM chemical c, chemicalIn ci, user u ,chemicalusage cu
            WHERE c.chemicalid = ci.chemicalid AND ci.userid = u.userid AND ci.qrcode = '".$qrcode."' AND cu.userid = '".$userid."' AND ci.status='In Use'";
$quaryDua = "SELECT c.chemicalid,c.name as chemicalname,CONCAT(u.fname,' ',u.lname) as owner,ci.ciid as chemicalid,ci.expireddate as chemicalexpiredate,CONCAT(cx.fname,' ',cx.lname) as peminjam,u.email as owneremail,u.userid as ownerid,cx.userid as peminjamid,ci.status as status,cu.cuid as cuidd
                FROM chemicalin ci 
                join chemical c on c.chemicalid = ci.chemicalid
                join user u on u.userid = ci.userid 
                join chemicalusage cu ON cu.ciid = ci.ciid and cu.status = 'Return' and cu.remaining_quantity = 'Empty'
                join user cx on cx.userid = cu.userid
                WHERE ci.qrcode='".$qrcode."' and ci.status='Empty';";
$resultSelect = mysqli_query($conn, $quaryDua);
if($resultSelect->num_rows > 0){
while ($row = mysqli_fetch_array($resultSelect)){
?>                
                
                <div class="form-group">
                    <br/>
                    <label class="col-md-4 control-label" for="textinput">Name of Chemical :</label>
                    <div class="col-md-6">
                        <?php echo $row['chemicalname'];?></div>
                        <input type="hidden" id="chemicalInIdD" value="<?php echo $row['chemicalid'];?>">
                        <input type="hidden" id="chemicalUserIdD" value="<?php echo $row["ownerid"];?>">
                        <input type="hidden" id="chemicalUserIdPeminjamD" value="<?php echo $row["peminjamid"];?>">
						<input type="hidden" id="emailD" value="<?php echo $row['owneremail'];?>">
						<input type="hidden" id="subD" value="ZeroWaste - Chemical Disposal Notification">
						<input type="hidden" id="messageD" value="your chemical <?php echo $row['chemicalname'];?> has been disposed.">
                        <input type="hidden" id="chemicalusagepunyeidD" value="<?php echo $row['cuidd'];?>">
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Owner Name :</label>
                    <div class="col-md-6">
                        <?php echo $row['owner'];?></div>
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Status :</label>
                    <div class="col-md-6">
                        <?php echo $row['status'];?></div>
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Expired Date :</label>
                    <div class="col-md-6">
                        <?php echo $row['chemicalexpiredate'];?></div>
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