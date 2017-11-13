<form class="form-horizontal">
<fieldset>
<!-- Text input--> 
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Register No Chemical :</label>
                    <div class="col-md-6">
                        <input id="register" name="register" type="text" class="form-control input-md"></div>
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Name of Chemical :</label>
                    <div class="col-md-6">
                        <?php echo $_SESSION['fname'];?></div>
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Owner Name :</label>
                    <div class="col-md-6">
                        <?php echo $_SESSION['fname'];?></div>
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Status :</label>
                    <div class="col-md-6">
                        <?php echo $_SESSION['fname'];?></div>
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Expired Date :</label>
                    <div class="col-md-6">
                        <?php echo $_SESSION['fname'];?></div>
                </div>
                <!-- Text input-->
				
            </div>
            
		</div>
		
				<div class="form-group control-label">
					<div class="col-md-12" align="center">
						<button type="submit" name="insert_btn" class="btn btn-success">Submit</button>
						<button type="reset" name="reset_btn" class="btn btn-success">Reset</button>
                    </div>
	        	</div>
</fieldset>
</form>
</form>