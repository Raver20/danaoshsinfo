<h1><?= $headline ?></h1>

<!-- File Upload | Drag & Drop OR With Click & Choose -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Deleting Facility
                </h2>
                
            </div>
            <div class="body">
             <p>Are you sure you want to delete the facility? </p>
           <?php 
                $attributes = array(
                                    'class' => 'form-horizontal text-center', );
                echo form_open('school_facilities/delete/'.$update_id, $attributes); 
            ?>
            
           
                
            <button type="submit" name="submit" value="Yes - Delete Facility" class="btn btn-danger m-t-15 waves-effect">Yes - Delete Facility</button>
            <button type="submit" name="submit" value="Cancel" class="btn btn-default m-t-15 waves-effect">Cancel</button>
           
            </div>
        </div>
    </div>
</div>
<!-- #END# File Upload | Drag & Drop OR With Click & Choose -->
