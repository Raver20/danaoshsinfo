<h1><?= $headline ?></h1> 

<?= Validation_errors("<p style='color: red;'>", "</p>") ?>

<?php
	if (isset($flash))
	{
		echo $flash;
	}

?>


<!-- Basic Validation -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Input FAQ</h2>
            </div>
            <div class="body">
            	<?php
					$form_url = base_url()."faqs/create/".$update_id;
					
				?>
                <form id="form_validation" method="POST" action="<?= $form_url ?>">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="schoolname" value="<?= $schoolname ?>">
                            <label class="form-label">School Name</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="user" value="<?= $user ?>">
                            <label class="form-label">User</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="password" value="<?= $password ?>">
                            <label class="form-label">Password</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="status" value="<?= $status ?>">
                            <label class="form-label">Status</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="address" value="<?= $address ?>">
                            <label class="form-label">Address</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="telno" value="<?= $telno ?>">
                            <label class="form-label">Telephone Number</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="emailaddress" value="<?= $emailaddress ?>">
                            <label class="form-label">Email Address</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="typeofschool" value="<?= $typeofschool ?>">
                            <label class="form-label">Type of School</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="contactperson" value="<?= $contactperson ?>">
                            <label class="form-label">Contact Person</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="principal" value="<?= $principal?>">
                            <label class="form-label">Principal</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control">
                            <label class="form-label">Latitude</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control">
                            <label class="form-label">Longitude</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="calendar" value="<?= $calendar ?>">
                            <label class="form-label">Calendar</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="avetuition" value="<?= $avetuition ?>">
                            <label class="form-label">Average Tuition</label>
                        </div>
                    </div>
                    
                    <button class="btn btn-primary waves-effect" type="submit" name="submit" value="Submit">SUBMIT</button>
                    <button class="btn btn-default waves-effect" type="submit" name="submit" value="Cancel">CANCEL</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- #END# Basic Validation -->
