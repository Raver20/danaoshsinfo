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
                <h2>Input Privilege</h2>
            </div>
            <div class="body">
            	<?php
					$form_url = base_url()."school_privileges/create/".$update_id;
					
				?>
                <form id="form_validation" method="POST" action="<?= $form_url ?>">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="privilege_name" value="<?= $privilege_name ?>">
                            <label class="form-label">Privilege Name</label>
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
