<h1><?= $headline ?></h1>

<!-- File Upload | Drag & Drop OR With Click & Choose -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    FILE UPLOAD WAS SUCCESSFULLY UPLOADED
                   
                </h2>
                
            </div>
            <div class="body">
			<div class="alert alert-success">You file was successfully uploaded!</div>
            <ul>
                <?php foreach($upload_data as $item => $value):?>
                    <li><?php echo $item; ?> <?php echo $value;?></li>
                <?php endforeach; ?>
            </ul>
            <p>
                <?php 
                    $edit_facility_url = base_url()."school_facilities/create/".$update_id;
                ?>
                <a href="<?= $edit_facility_url ?>"><button type="button" class="btn btn-primary">Return To Main Update Facility Page</button></a>
            </p>
            </div>
        </div>
    </div>
</div>
<!-- #END# File Upload | Drag & Drop OR With Click & Choose -->
