<h1>Manage Schools Strands</h1>


<?php
	$add_school_strand_url = base_url()."school_strands/manage";
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
                                <form method="post" action="<?= $add_school_strand_url ?>" >
                                <div class="col-md-6">
                               
                                    <select class="form-control show-tick" name="strand_id" data-live-search="true">
                                    <?php
                                        foreach ($school_strands_query->result() as $row) {
                                            
                                    ?>
                                        <option value="<?= $row->strand_id ?>"><?= $row->strand_name ?></option>
                                    <?php } ?>
                                    </select>
                                
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" name="submit" value="Submit" class="btn btn-primary waves-effect"><i class="material-icons">add</i><span>Add New Strand</span></button>
                                </div>
                            </form>
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
                    		foreach ($strands_by_query as $row) {
                            $delete_school_strands = base_url()."school_strands/delete/".$row->school_strand_id;
                             
                    	?>
                    
                        <tr>
                           	<td><?= $row->strand_name; ?></td>
                            <td>
                                <a href="<?= $delete_school_strands ?>"><button type="button" class="btn btn-danger waves-effect"><i class="material-icons">close</i></button></a>
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