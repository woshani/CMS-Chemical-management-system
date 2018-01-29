<form class="form-horizontal">
<fieldset>
<!-- Text input--> 
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">QR Code :</label>
                    <div class="col-md-6">
                        <div class='input-group date' id='qrcodeDispose'>
                            <input type='text' class="form-control" id="qrcodeDisposeInput" name="qrcodeDisposeInput" readonly="" />
                            <span class="input-group-addon">
                                <span class="fa fa-qrcode"></span>
                            </span>
                        </div>
                        <video id="camDispose"></video>
                        
                </div>
                <!-- Text input-->
                <div id="disposeData">
                </div>
                <div class="form-group control-label">
                    <div class="col-md-12" align="center">
                        <button type="button" disabled name="insert_btnDispose" id="insert_btnDispose" class="btn btn-danger">Dispose</button>
                        <button type="reset" name="reset_btn" class="btn btn-success">Reset</button>
                    </div>
                </div>
                
            </div>
            
        </div>
                
</fieldset>
</form>