
<div class="col-md-12 mb40">
	<div class="row">
        <div class="col-xs-8">
        	<?php
        		foreach ($query->result() as $row) {
        			$requirement_id = $row->requirement_id;
        		
			    
			?>
            <h5 style="color: #707070" class="mt0 mb40"><?= $row->requirement_name ?></h5>
            <h6>Description</h6>
            <p class="mb20" style="text-align: justify; text-indent: 2em;"><small><?= nl2br($row->requirement_desc) ?></small></p>
            <?php } ?>
        </div>
       
    </div>
</div>
