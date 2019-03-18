<h1><?= $headline ?></h1> 

<?= Validation_errors("<p style='color: red;'>", "</p>") ?>

<?php
	if (isset($flash))
	{
		echo $flash;
	}
	if (is_numeric($update_id))
	{

?>
<!-- Basic Validation -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Strand Options</h2>
            </div>
            <div class="body">
            	<?php  
	                if ($big_pic=="") { 
	            ?>
            	<a href="<?= base_url() ?>school_facilities/upload_image/<?= $update_id ?>"><button class="btn btn-primary waves-effect" type="submit" name="submit" value="Submit">Upload Facility Image</button></a>
            	<?php 
	                }
	                else 
	                {
	            ?>
            	<a href="<?= base_url() ?>school_facilities/delete_image/<?= $update_id ?>"><button class="btn btn-danger waves-effect" type="submit" name="submit" value="Submit">Delete Logo </button></a>
            	<?php        
	                } 
	            ?>
            	<a href="<?= base_url() ?>school_facilities/deleteconf/<?= $update_id ?>"><button class="btn btn-danger waves-effect" type="submit" name="submit" value="Submit">Delete Facility </button></a>
            </div>
        </div>
    </div>
</div>
<!-- #END# Basic Validation -->
<?php } ?>
<!-- Basic Validation -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Input Strand Information</h2>
            </div>
            <div class="body">
            	<?php
					$form_url = base_url()."school_facilities/create/".$update_id;
					
				?>
                <form id="form_validation" method="POST" action="<?= $form_url ?>">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="facility_name" value="<?= $facility_name ?>">
                            <label class="form-label">Facility Name</label>
                        </div>
                    </div>
                   
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea name="description"  cols="30" rows="5" class="form-control no-resize"><?php echo $description ?></textarea>
                            <label class="form-label">Description</label>
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
<?php 

    if ($big_pic!="") { 
?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
       		 	<h2>Strand Logo</h2>
       		</div>
            <div class="card-body">
                <img src="<?= base_url() ?>facility_pic/big_pic/<?= $big_pic ?>">
                
            </div>
        </div>
    </div>
</div>
<?php } ?>