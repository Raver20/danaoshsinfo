
<div class="col-md-12 mb40">
	<div class="row">
        <div class="col-xs-8">
        	<?php
        		foreach ($faq_query->result() as $row) {
        			$faq_id = $row->faq_id;
        		
			    
			?>
            <h3 style="color: #707070" class="mt0 mb40"><?= $row->faq_title ?></h3>
            <h4>Answer:</h4>
            <p class="mb20" style="text-align: justify; text-indent: 2em;"><small><?= nl2br($row->faq_ans) ?></small></p>
            <?php } ?>
        </div>
       
    </div>
</div>