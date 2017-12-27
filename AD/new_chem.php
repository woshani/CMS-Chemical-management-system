<form class="form-horizontal">
<fieldset>
<!-- Text input--> 
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Name :</label>
                    <div class="col-md-6">
                        <input id="chem_name" name="chem_name" type="text" placeholder="Chemical Name" class="form-control input-md"></div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Physical Type :</label>
                    <div class="col-md-6">
                        <select class="form-control input-md" id="phystype">
                        	<option selected="" disabled="">Select physical type</option>
                        	<option value="Liquid">Liquid</option>
                        	<option value="Powder">Powder</option>
                        	<option value="Solid">Solid</option>
                        </select>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Eng Control :</label>
                    <div class="col-md-6">
                        <select class="form-control input-md" id="engControl">
                        	<option selected="" disabled="">Select eng control</option>
                        	<option value="Yes">Yes</option>
                        	<option value="No">No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            	<div class="col-md-6">
					<div class="form-group">
	                    <label class="col-md-4 control-label" for="textinput">PPE :</label>
	                    <div class="col-md-6">
	                        <select class="form-control input-md" id="ppe">
                        	<option selected="" disabled="">Select PPE</option>
                        	<option value="Yes">Yes</option>
                        	<option value="No">No</option>
                        </select></div>
	                </div>

	                <!-- Text input-->
	                <div class="form-group">
	                    <label class="col-md-4 control-label" for="textinput">Class :</label>
	                    <div class="col-md-6">
	                        <select class="form-control input-md" id="classses">
                        	<option selected="" disabled="">Select Class</option>
                        	<option value="N/A">N/A</option>
                        	<option value="1">1</option>
                        	<option value="2">2</option>
                        	<option value="3">3</option>
                        </select>
	                    </div>
	                </div>

	                <!-- Text input-->
	                <div class="form-group">
	                    <label class="col-md-4 control-label" for="textinput">GHS :</label>
	                    <div class="col-md-6">
	                        <select id="ghs" name="ghs" class="form-control input-md">
	                        	<option selected="" disabled="">select GHS..</option>
	                        	<option value="Yes">Yes</option>
                        		<option value="No">No</option>
	                        </select>
	                    </div>
	                </div>
            	</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-3 control-label" for="textinput"> </label>
					<div class="col-md-4">
						<button class="btn btn-primary form-control" id="addnewchem">ADD NEW</button>
					</div>
				</div>
			</div>
		</div>
</fieldset>
</form>