<h1>Manage Privileges</h1>


<?php
	$create_privileges_url = base_url()."school_privileges/create";
    
?>
<p style="margin-bottom: 10px;">
<a href="<?= $create_privileges_url ?>"><button type="button" class="btn btn-primary waves-effect"><i class="material-icons">add</i><span>Add New Privilege</span></button></a>


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
                            <th>Privilege Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php
                    		foreach ($privileges_query->result() as $row) {
                                $edit_privilege_url = base_url()."school_privileges/create/".$row->privilege_id;
                                $delete_privilege_url = base_url()."school_privileges/delete/".$row->privilege_id;
                               
                    	?>
                    
                        <tr>
                           	<td><?= $row->privilege_name ?></td>
                            
                            
                            <td>
                              
                                <a href="<?= $delete_privilege_url ?>"><button type="button" class="btn btn-danger waves-effect"><i class="material-icons">close</i></button></a>
                            	<a href="<?= $edit_privilege_url ?>"><button type="button" class="btn btn-success waves-effect"><i class="material-icons">call_made</i></button></a>
                            
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