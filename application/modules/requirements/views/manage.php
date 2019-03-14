<h1>Manage Requirements</h1>


<?php
	$create_requirement_url = base_url()."requirements/create";
     $view_requiremtns_url = base_url()."pages/requirement/";
?>
<p style="margin-bottom: 10px;">
<a href="<?= $create_requirement_url ?>"><button type="button" class="btn btn-primary waves-effect"><i class="material-icons">add</i><span>Add New Requirements</span></button></a>

<a href="<?= $view_requiremtns_url ?>"><button type="button" class="btn btn-primary waves-effect"><i class="material-icons">visibility</i></button></a>
</p>
<!-- Bordered Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    List of Requirements
                    
                </h2>
                  
            </div>
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Requirement Name</th>
                            <th>Description</th>
                            
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php
                    		foreach ($requirements_query->result() as $row) {
                    			$edit_requiremtns_url = base_url()."requirements/create/".$row->requirement_id;
                               
                    	?>
                    
                        <tr>
                           	<td><?= $row->requirement_name ?></td>
                            <td><?= $row->requirement_desc ?></td>
                            
                            <td>
                              
                                    
                            	<a href="<?= $edit_requiremtns_url ?>"><button type="button" class="btn btn-success waves-effect"><i class="material-icons">call_made</i></button></a>
                            
                            </td>
                        </tr>
                    	<?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- #END# Bordered Table -->