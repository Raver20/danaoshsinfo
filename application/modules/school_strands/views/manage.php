<h1>Manage Schools Strands</h1>


<?php
	$create_requirement_url = base_url()."school_strands/create";
     $view_requiremtns_url = base_url()."pages/requirement/";
?>
<!-- Advanced Select -->
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add Strands
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                
                                <div class="col-md-3">
                                    
                                    <select class="form-control show-tick" data-live-search="true">
                                        <option>Hot Dog, Fries and a Soda</option>
                                        <option>Burger, Shake and a Smile</option>
                                        <option>Sugar, Spice and all things nice</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <a href="<?= $create_requirement_url ?>"><button type="button" class="btn btn-primary waves-effect"><i class="material-icons">add</i><span>Add New Strand</span></button></a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Select -->


</div>
<!-- Bordered Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    List of School Strands
                    
                </h2>
                  
            </div>
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Strand Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php
                    		foreach ($school_strands_query->result() as $row) {
                               
                                $delete_requiremtns_url = base_url()."requirements/delete/".$row->requirement_id;
                               
                    	?>
                    
                        <tr>
                           	<td><?= $row->strand_name ?></td>
                            
                            <td>
                              
                                <a href="<?= $delete_requiremtns_url ?>"><button type="button" class="btn btn-danger waves-effect"><i class="material-icons">close</i></button></a>
                            	
                            
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