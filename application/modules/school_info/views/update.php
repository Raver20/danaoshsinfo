<h1><?= $headline ?></h1> 

<?= Validation_errors("<p style='color: red;'>", "</p>") ?>

<?php
	if (isset($flash))
	{
		echo $flash;
	}

?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
            	
            <?php  
                if ($big_pic=="") { 
            ?>
                <a href="<?= base_url() ?>school_info/upload_image/<?= $update_id ?>"><button class="btn btn-primary waves-effect" type="submit" name="submit" value="Submit">Upload School Logo</button></a>
            <?php 
                }
                else 
                {
            ?>
                <a href="<?= base_url() ?>school_info/delete_image/<?= $update_id ?>"><button class="btn btn-danger waves-effect" type="submit" name="submit" value="Submit">Delete School Logo</button></a>
            <?php        
                } 
            ?>
            <a href="<?= base_url() ?>school_info/update_pword/<?= $update_id ?>"><button class="btn btn-primary waves-effect" type="submit" name="submit" value="Submit">Update Password</button></a>
                
            </div>
        </div>
    </div>
</div>
<!-- #END# Basic Validation -->
<!-- Basic Validation -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Input School Info</h2>
            </div>
            <div class="body">
            	<?php
					$form_url = base_url()."school_info/update/".$update_id;
				?>
                <form id="form_validation" method="post" action="<?= $form_url ?>">
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    School Name<input type="text" class="form-control" name="schoolname" value="<?= $schoolname ?>" placeholder="School Name" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <div class="form-line">
                                    User<input type="text" class="form-control" name="user" value="<?= $user ?>" placeholder="User" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    Address<input type="text" class="form-control" name="address" value="<?= $address ?>" placeholder="Address" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <div class="form-line">
                                    Tel. No.<input type="text" class="form-control" name="telno" value="<?= $telno ?>" placeholder="Tel. Number" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <div class="form-line">
                                    Email<input type="text" class="form-control" name="emailaddress" value="<?= $emailaddress ?>" placeholder="Email Address" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="form-line">
                                    Type of School<input type="text" class="form-control" name="typeofschool" value="<?= $typeofschool ?>" placeholder="Type of School" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="form-line">
                                    Contact Person<input type="text" class="form-control" name="contactperson" value="<?= $contactperson ?>" placeholder="Contact Person" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="form-line">
                                    Principal<input type="text" class="form-control" name="principal" value="<?= $principal ?>" placeholder="Principal" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    Location URL<input type="text" class="form-control" name="locationurl" value="<?= $locationurl ?>" placeholder="Location Url" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    Calendar<input type="text" class="form-control" name="calendar" value="<?= $calendar ?>" placeholder="School Calendar" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    Ave. Tuition<input type="text" class="form-control" name="avetuition" value="<?= $avetuition ?>" placeholder="Average Tuition" />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button class="btn btn-primary waves-effect" type="submit" name="submit" value="Submit">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- #END# Basic Validation -->
