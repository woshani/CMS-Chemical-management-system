<form class="form-horizontal">
<fieldset>
<!-- Text input--> 
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Name of Chemical :</label>
                    <div class="col-md-6">
                        <input id="name" name="name" type="text" placeholder="" class="form-control input-md"></div>
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Owner Name :</label>
                    <div class="col-md-6">
                        <input id="owner" name="owner" type="text" placeholder="Supervisor Name" class="form-control input-md"></div>
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Lab :</label>
                    <div class="col-md-6">
					<select class="form-control" id="lab" name="lab">
					  <option>Please Select</option>
					  <option>Makmal Bahan 1</option>
					  <option>Makmal Bahan 2</option>
					</select>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Date In :</label>
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
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Expired Date :</label>
                    <div class='col-md-6'>
						<div class='input-group date' id='datetimepicker1'>
							<input type='text' class="form-control" id="expired" name="expired"/>
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
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Status Chemical :</label>
                    <div class="col-md-6">
					<select class="form-control" id="status">
					  <option>Please Select</option>
					  <option>Public</option>
					  <option>Private</option>
					</select>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Physical Form of Chemical :</label>
                    <div class="col-md-6">
					<select class="form-control" id="type" name="type">
					  <option>Please Select</option>
					  <option>Liquid</option>
					  <option>Powder</option>
					</select>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Eng. Control :</label>
                    <div class="col-md-6">
                        <input type="checkbox" class="form-check-input" id="eng" name="eng"> Yes
						<br>
						<input type="checkbox" class="form-check-input" id="eng" name="eng"> No
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">PPE :</label>
                    <div class="col-md-6">
                        <input type="checkbox" class="form-check-input" id="ppe" name="ppe"> Yes
						<br>
						<input type="checkbox" class="form-check-input" id="ppe" name="ppe"> No
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Usage of Chemical :</label>
                    <div class="col-md-6">
                        <input id="quatity" name="quatity" type="text" placeholder="Quantity" class="form-control input-md"></div>
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">SDS :</label>
                    <div class="col-md-6">
                        <input type="file" class="form-control-file" id="sds" name="sds" aria-describedby="fileHelp"></div>
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Class :</label>
                    <div class="col-md-6">
                        <input id="class" name="class" type="text" class="form-control input-md"></div>
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">GHS Label :</label>
                    <div class="col-md-6">
                        <input type="checkbox" class="form-check-input" id="ghs" name="ghs"> Yes
						<br>
						<input type="checkbox" class="form-check-input" id="ghs" name="ghs"> No
					</div>
                </div>
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Supplier Name :</label>
                    <div class="col-md-6">
                        <input id="supplier" name="supplier" type="text" class="form-control input-md"></div>
                </div>
				
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