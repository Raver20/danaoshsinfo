<h1><?= $headline ?></h1>

<!-- File Upload | Drag & Drop OR With Click & Choose -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    FILE UPLOAD - CLICK & CHOOSE
                   
                </h2>
                
            </div>
            <div class="body">
				

            	<?php 
			    	
			    	echo form_open_multipart('school_facilities/do_upload/'.$update_id); 
			    ?>
                <?php
            		if (isset($error))
            		{
            			foreach ($error as $value) {
            				echo $value;
            			}
            		}
            	?>
                <p style="margin-top: 24px; text-align: center;">Please choose a file from your computer that is 600x600 filesize and then press 'Upload'.</p>
                <div class="row clearfix">
                    <div class="col-lg-offset-5 col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
                    <input name="userfile" type="file" multiple  style="padding-left: 15px;" />
                	</div> 
                </div>
                <div class="row clearfix" style="margin-top: 10px;">
                    <div class="col-lg-offset-5 col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
                        <button type="s" name="submit" value="Submit" class="btn btn-primary m-t-15 waves-effect"><i class="material-icons">cloud_upload</i>
                                    <span>Upload Image</span></button>
                        <button type="submit" name="submit" value="Cancel" class="btn btn-infor m-t-15 waves-effect"><i class="material-icons">cancel</i>
                                    <span>Cancel</span></button>
                    </div>
                </div>
                </form>
            	
            </div>
        </div>
    </div>
</div>
<!-- #END# File Upload | Drag & Drop OR With Click & Choose -->