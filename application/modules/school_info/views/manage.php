<h1>Manage School Accounts </h1>


<?php
	$create_info_url = base_url()."school_info/create";
?>
<p style="margin-bottom: 10px;">
<a href="<?= $create_info_url ?>"><button type="button" class="btn btn-primary waves-effect"><i class="material-icons">add</i><span>Add New School</span></button></a>
</p>


<!-- Bordered Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    List of School Accounts
                    
                </h2>
            </div>
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>School Name</th>
                            <th>Address</th>
                            
                            <th style="text-align: center;" class="col-lg-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php
                    		foreach ($info_query->result() as $row) {
                                $edit_info_url = base_url()."school_info/create/".$row->school_id;
                                $delete_info_url = base_url()."school_info/delete/".$row->school_id;
                               
                    	?>
                    
                        <tr>
                           	<td style=" white-space: nowrap;
                                        max-width: 200px;
                                        background: white;
                                        padding: 0.5em 1em;
                                        overflow: hidden;">
                                        <?= $row->schoolname ?></td>
                            <td style=" white-space: nowrap;
                                        max-width: 300px;
                                        background: white;
                                        padding: 0.5em 1em;
                                        overflow: hidden;">
                                        <?= $row->address ?></td>
                            
                            <td style="text-align: center;">
                                <a href="<?= $delete_info_url ?>"><button type="button" class="btn btn-danger waves-effect"><i class="material-icons">close</i></button></a>    
                            	<a href="<?= $edit_info_url ?>"><button type="button" class="btn btn-success waves-effect"><i class="material-icons">call_made</i></button></a>
                            
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