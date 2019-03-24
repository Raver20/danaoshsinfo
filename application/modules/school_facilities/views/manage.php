<h1>Manage Facilty</h1>


<?php
	$create_facility_url = base_url()."school_facilities/create";
?>
<p style="margin-bottom: 10px;">
<a href="<?= $create_facility_url ?>"><button type="button" class="btn btn-primary waves-effect"><i class="material-icons">add</i><span>Add New Facility</span></button></a>
</p>


<!-- Bordered Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List of Facility
                                
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Facilitiy Name</th>
                                        <th>Description</th>
                                        <th class="col-sm-2" style="text-align: center;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php
                                    
                                		foreach ($facility_query->result() as $row) {
                                			$edit_facility_url = base_url()."school_facilities/create/".$row->facility_id;
                                            $view_facility_url = base_url()."pages/facility/".$row->facility_url;
                                	?>
                                
                                    <tr >
                                       	<td><?= $row->facility_name?></td>
                                        <td><?= $row->description ?></td>
                                        <td style="text-align: center;">
                                            
                                         
                                        	<a href="<?= $edit_facility_url ?>"><button type="button" class="btn btn-success waves-effect"><i class="material-icons">launch</i></button></a>
                                        
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