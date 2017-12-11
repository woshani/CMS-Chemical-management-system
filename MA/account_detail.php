<form class="form-horizontal">
<fieldset>
<!-- Text input-->
        <div class="row">
            <div class="col-md-12">
                <center>
                    <div class="form-group">
                        <div style="width: 50%; margin: 0 auto">
                            <div id="dym2">
                                <img id="myImage2" class="img-responsive" width="300" height="300" src="<?php echo $_SESSION['picture'];?>"/>
                            </div>
                        </div>
                    </div>
                </center>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Picture:</label>
                    <div class="col-md-6">
                        <input class="form-control" id="inputPicture" type="file" accept=".jpg, .png, .jpeg">
                    </div>
                </div>
            </div>
        </div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">First Name:</label>
                    <div class="col-md-6">
                        <input id="fname" name="fname" type="text" placeholder="" class="form-control input-md" value="<?php echo $_SESSION['fname'];?>">
                        <input type="hidden" class="hidden" name="userkey" id="userkey" value="<?php echo $_SESSION['userid'];?>">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Email : </label>
                    <div class="col-md-6">
                        <input id="email" name="email" type="email" placeholder="" class="form-control input-md" value="<?php echo $_SESSION['email'];?>">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Matric/Staff ID</label>
                    <div class="col-md-6">
                        <input id="userid" name="userid" type="text" readonly placeholder="" class="form-control input-md" value="<?php echo $_SESSION['identifyid'];?>">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Last Name : </label>
                    <div class="col-md-6">
                        <input id="lname" name="lname" type="text" placeholder="" class="form-control input-md" value="<?php echo $_SESSION['lname'];?>">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Phone Number : </label>
                    <div class="col-md-6">
                        <input id="notel" name="notel" type="text" placeholder="" class="form-control input-md" value="<?php echo $_SESSION['telno'];?>">
                    </div>
                </div>
			</div>
		</div>
        <div class="row" align="center">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                       <button type="button" class="btn btn-success btn-block btn-flat input-md form-control" align="center" id="btnUpdateUser">Update</button>
                    </div>
                </div>
            </div>
        </div> 
</fieldset>
</form>