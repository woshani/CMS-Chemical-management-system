<form class="form-horizontal">
<fieldset>
<!-- Text input--> 
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">QR Code :</label>
                    <div class="col-md-6">
                        <div class='input-group date' id='qrcodeReturn'>
                            <input type='text' class="form-control" id="qrcodeReturnInput" name="qrcodeReturnInput" readonly="" />
                            <span class="input-group-addon">
                                <span class="fa fa-qrcode"></span>
                            </span>
                        </div>
                        <video id="camReturn"></video>
                        
                </div>
                <!-- Text input-->
                <div id="returnData">
                </div>
                <div class="form-group control-label">
                    <div class="col-md-12" align="center">
                        <button type="button" disabled name="insert_btnReturn" id="insert_btnReturn" class="btn btn-success">Return</button>
                        <button type="reset" name="reset_btn" class="btn btn-success">Reset</button>
                    </div>
                </div>
                
            </div>
            
        </div>
                
</fieldset>
</form>