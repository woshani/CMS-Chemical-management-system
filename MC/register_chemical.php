<?php 
include "../connection/connection.php";
$sqlLab = "SELECT labid,name FROM lab;";
$resultLab = mysqli_query($conn, $sqlLab);
mysqli_close($conn);
?>
<form class="form-horizontal">
<fieldset>
<!-- Text input--> 
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Name of Chemical :</label>
                    <div class="col-md-6">
                        <input id="Chemicalname" name="Chemicalname" type="text" placeholder="" class="form-control input-md">
                        <input type="hidden" class="form-control"  id="chemicalIDRegis">
                        <div id="matchChemical"></div>
                    </div>   
                </div>
				<div class="form-group" id="ownerNamePJ">
                    <label class="col-md-4 control-label" for="textinput">Owner Name :</label>
                    <div class="col-md-6">
                        <input id="owner" name="owner" type="text" placeholder="Owner Name" class="form-control input-md">
                        <input type="hidden" class="form-control"  id="ownerID">
                        <div id="matchOwner"></div>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Lab :</label>
                    <div class="col-md-6">
					<select class="form-control" id="lab" name="lab">
						<option selected="" disabled="">Please choose..</option>
					  <?php
					  	if($resultLab->num_rows > 0){
							while ($row = mysqli_fetch_array($resultLab)){
								echo "<option value='".$row['labid']."'>".$row['name']."</option>";
							}
						} 
					  ?>
					</select>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Expired Date :</label>
                    <div class='col-md-6'>
						<div class='input-group date' id='datetimepickerEXP'>
							<input type='text' class="form-control" id="expired" name="expired"/>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar ui-datepicker-trigger" id="spanImgDate"></span>
							</span>
						</div>
					</div>
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Type Chemical :</label>
                    <div class="col-md-6">
					<select class="form-control" id="statusChemicalPrivatePublic">
					  <option selected="" disabled="">Please Select</option>
					  <option value="Public">Public</option>
					  <option value="Private">Private</option>
					</select>
                    <i class="fa fa-question-circle infohover" aria-hidden="true" data-toggle="tooltip" title="*Public - anyone can use chemical without approval owner.  *Private - anyone can use,but need approval from owner."></i>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">SDS :</label>
                    <div class="col-md-6">
                        <input type="file" class="form-control-file" id="sdsfile" name="sdsfile" aria-describedby="fileHelp"></div>
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Supplier Name :</label>
                    <div class="col-md-6">
                        <input id="supplier" name="supplier" type="text" class="form-control input-md"></div>
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">QR Code :</label>
                    <div class="col-md-6">
                        <div class='input-group date' id='qrcodeRegister'>
                            <input type='text' class="form-control" id="qrcodeRegisterID" name="qrcodeRegisterID" readonly="" />
                            <span class="input-group-addon">
                                <span class="fa fa-qrcode"></span>
                            </span>
                        </div>
                        <i class="fa fa-question-circle infohover" aria-hidden="true" data-toggle="tooltip" title="you can get the QRcode Sticker from PJ."></i>
                        <video id="camRegister"></video>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput"></label>
                    <div class="col-md-6">
                        <input type="checkbox" id="REGtypechemical" class="form-check-input" data-toggle="tooltip" title="Tick this to use the chemical immediately."> <span data-toggle="tooltip" title="Tick this to use the chemical immediately.">Used Chemical?</span></div>
                </div>
            </div>
		</div>
		
				<div class="form-group control-label">
					<div class="col-md-12" align="center">
						<button type="button" id="btn_register_chemical" class="btn btn-success">Submit</button>
						<button type="reset" id="reset_btn" class="btn btn-success">Reset</button>
                    </div>
	        	</div>
</fieldset>
</form>