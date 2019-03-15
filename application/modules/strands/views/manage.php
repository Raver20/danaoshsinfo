<h1>Manage Strands</h1>


<?php
	$create_strand_url = base_url()."strands/create";
?>
<p style="margin-bottom: 10px;">
<a href="<?= $create_strand_url ?>"><button type="button" class="btn btn-primary waves-effect"><i class="material-icons">add</i><span>Add New Strands</span></button></a>
</p>


<!-- Bordered Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List of Strands
                                
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Strand Title</th>
                                        <th>Description</th>
                                        <th>RCIC</th>
                                        <th style="text-align: center;" class="col-sm-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php
                                		foreach ($query->result() as $row) {
                                			$edit_strand_url = base_url()."strands/create/".$row->strand_id;
                                            $view_strand_url = base_url()."pages/strand/".$row->strand_url;
                                	?>
                                
                                    <tr >
                                       	<td><?= $row->strand_name ?></td>
                                        <td style=" white-space: nowrap;
                                                    max-width: 300px;
                                                    background: white;
                                                    padding: 0.5em 1em;
                                                    overflow: hidden;">
                                        <?= $row->description ?></td>
                                        <td style=" white-space: nowrap;
                                                    max-width: 300px;
                                                    background: white;
                                                    padding: 0.5em 1em;
                                                    overflow: hidden;">
                                                    <?= $row->rcic ?></td>
                                        <td style="text-align: center;">
                                            <a href="<?= $view_strand_url ?>"><button type="button" class="btn btn-primary waves-effect"><i class="material-icons">visibility</i></button></a>
                                         
                                        	<a href="<?= $edit_strand_url ?>"><button type="button" class="btn btn-success waves-effect"><i class="material-icons">launch</i></button></a>
                                        
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