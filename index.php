<?php
$connect = mysqli_connect("localhost", "root", "", "cems");
include "header.php";
?>
    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to CEMS
                </h1>
            </div>
        </div>
        <!-- /.row -->

       

        <hr>

        <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                    <p>
					<center>
					<div class="col-sm-1"></div>
					<div class="col-sm-10 well">
					College Event Managment System (CEMS) is a system that is going to be developed for Majlis Felo Merbauan, Residential College Tun Hussein Onn, University Technology Malaysia (UTM). This system will be used for felo and students. The system is going to develop to help CEMS users to manage their event easily. CEMS is developed to help them generate paperwork automatically with correct format. Then, this system also can help to insert the participant attendance of event export into excel file to easily insert the data into academic system UTM (myutm.my). It also will help them send email to others to promote and spread event information for user notification.
					</div>
					<div class="col-sm-1"></div>
					</center>
					</p>
            </div>
        </div>

        <hr>
<?php
include "footer.php";
?>