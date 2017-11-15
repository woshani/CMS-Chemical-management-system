<form class="form-horizontal">
<fieldset>
<!-- Text input--> 
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">QR Code :</label>
                    <div class="col-md-6">
                        <div class='input-group date' id='qrcodeReuse'>
                            <input type='text' class="form-control" id="qrcodeReuseInput" name="qrcodeReuseInput" readonly="" />
                            <span class="input-group-addon">
                                <span class="fa fa-qrcode"></span>
                            </span>
                        </div>
                        <video id="camReuse"></video>
                        
                </div>
                <!-- Text input-->
                <div id="reuseData">
                </div>
                <div class="form-group control-label">
					<div class="col-md-12" align="center">
						<button type="button" disabled name="insert_btnReuse" id="insert_btnReuse" class="btn btn-success">Request</button>
						<button type="reset" name="reset_btn" class="btn btn-success">Reset</button>
                    </div>
	        	</div>
				
            </div>
            
		</div>
				
</fieldset>
</form>