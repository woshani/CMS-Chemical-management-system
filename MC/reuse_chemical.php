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
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">SDS File :</label>
                    <div class="col-md-6">
                        <?php echo $_SESSION['fname'];?></div>
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Used Date :</label>
                    <div class='col-md-6'>
						<div class='input-group date' id='datetimepicker1'>
							<input type='text' class="form-control" id="datein" name="datein"/>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<script type="text/javascript">
						$(function () {
							$('#datetimepicker1').datetimepicker();
						});
					</script>
                </div>
                <!-- Text input-->
				
            </div>
            
		</div>
		
				<div class="form-group control-label">
					<div class="col-md-12" align="center">
						<button type="submit" name="insert_btn" class="btn btn-success">Request</button>
						<button type="reset" name="reset_btn" class="btn btn-success">Reset</button>
                    </div>
	        	</div>
</fieldset>
</form>
</form>