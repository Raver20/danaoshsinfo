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
                <h2>Input Requirements</h2>
            </div>
            <div class="body">
            	<?php
					$form_url = base_url()."requirements/create/".$update_id;
					
				?>
                <form id="form_validation" method="POST" action="<?= $form_url ?>">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="requirement_name" value="<?= $requirement_name ?>">
                            <label class="form-label">Requirement Name</label>
                        </div>
                    </div>
                   
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea name="requirement_desc"  cols="30" rows="5" class="form-control no-resize"><?php echo $requirement_desc ?></textarea>
                            <label class="form-label">Requirement Description</label>
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
