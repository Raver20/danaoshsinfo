<h1>Manage FAQ'S</h1>


<?php
	$create_faq_url = base_url()."faqs/create";
?>
<p style="margin-bottom: 10px;">
<a href="<?= $create_faq_url ?>"><button type="button" class="btn btn-primary waves-effect"><i class="material-icons">add</i><span>Add New FAQ</span></button></a>
</p>


<!-- Bordered Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    List of FAQ'S
                    
                </h2>
            </div>
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>FAQ Title</th>
                            <th>Answer</th>
                            
                            <th style="text-align: center;" class="col-lg-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php
                    		foreach ($faq_query->result() as $row) {
                                $edit_faq_url = base_url()."faqs/create/".$row->faq_id;
                                $delete_faq_url = base_url()."faqs/delete/".$row->faq_id;
                               
                    	?>
                    
                        <tr>
                           	<td style=" white-space: nowrap;
                                        max-width: 200px;
                                        background: white;
                                        padding: 0.5em 1em;
                                        overflow: hidden;">
                                        <?= $row->faq_title ?></td>
                            <td style=" white-space: nowrap;
                                        max-width: 300px;
                                        background: white;
                                        padding: 0.5em 1em;
                                        overflow: hidden;">
                                        <?= $row->faq_ans ?></td>
                            
                            <td style="text-align: center;">
                                <a href="<?= $delete_faq_url ?>"><button type="button" class="btn btn-danger waves-effect"><i class="material-icons">close</i></button></a>    
                            	<a href="<?= $edit_faq_url ?>"><button type="button" class="btn btn-success waves-effect"><i class="material-icons">call_made</i></button></a>
                            
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