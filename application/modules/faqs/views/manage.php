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
                            
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php
                    		foreach ($faq_query->result() as $row) {
                    			$edit_faq_url = base_url()."faqs/create/".$row->faq_id;
                                $view_faq_url = base_url()."faq/info/".$row->faq_title;
                    	?>
                    
                        <tr>
                           	<td><?= $row->faq_title ?></td>
                            <td><?= $row->faq_ans ?></td>
                            
                            <td>
                                <a href="<?= $view_faq_url ?>"><button type="button" class="btn btn-primary waves-effect"><i class="material-icons">visibility</i></button></a>
                                    
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