<form class="form-horizontal">
<fieldset>
<!-- Text input--> 
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Staff ID :</label>
                    <div class="col-md-6">
                        <input id="staffid" name="staffid" type="text" placeholder="Staff ID.." class="form-control input-md"></div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">First Name :</label>
                    <div class="col-md-6">
                        <input id="fname" name="fname" type="text" placeholder="First Name.." class="form-control input-md">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Last Name :</label>
                    <div class="col-md-6">
                        <input id="lname" name="lname" type="text" placeholder="Last Name.." class="form-control input-md">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            	<div class="col-md-6">
					<div class="form-group">
	                    <label class="col-md-4 control-label" for="textinput">Tel No :</label>
	                    <div class="col-md-6">
	                        <input id="telno" name="telno" type="text" placeholder="Tel No.." class="form-control input-md"></div>
	                </div>

	                <!-- Text input-->
	                <div class="form-group">
	                    <label class="col-md-4 control-label" for="textinput">Email :</label>
	                    <div class="col-md-6">
	                        <input id="email" name="email" type="email" placeholder="Email.." class="form-control input-md">
	                    </div>
	                </div>

	                <!-- Text input-->
	                <div class="form-group">
	                    <label class="col-md-4 control-label" for="textinput">Role :</label>
	                    <div class="col-md-6">
	                        <select id="role" name="role" class="form-control input-md">
	                        	<option selected="" disabled="">select role..</option>
	                        	<option value="Lecturer">Lecturer</option>
								<option value="PJ">PJ</option>
	                        	<option value="OSHA">OSHA</option>
	                        	<option value="HOD">HOD</option>
	                        </select>
	                    </div>
	                </div>
            	</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-md-4 control-label" for="textinput"> </label>
					<div class="col-md-6">
						<input type="checkbox" name="admin" id="admin" value="Yes" data-toggle="tooltip" title="register staff as another admin"> Admin?
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<div class="col-md-6">*username will be staff ID & default password is 'abc123'
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-3 control-label" for="textinput"> </label>
					<div class="col-md-4">
						<button class="btn btn-primary form-control" id="btnregisstaff">REGISTER</button>
					</div>
				</div>
			</div>
		</div>
</fieldset>
</form>