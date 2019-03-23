<h1><?= $headline ?></h1> 



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
                <h2>Update Password</h2>
            </div>
            <div class="body">
            	<?php
                    $form_url = base_url()."school_info/update_pword/".$update_id;
                    
				?>
               
                
                <form id="form_validation" method="post" action="<?= $form_url ?>" style="text-align: center;">
                    <div class="row clearfix">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                        <?= Validation_errors("<p style='color: red;'>", "</p>") ?>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" class="form-control" name="password" placeholder="Password" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                        </div>
                    </div>
                    <div class="row clearfix">
                    <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
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
