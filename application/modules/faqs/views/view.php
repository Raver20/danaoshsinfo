
<div class="col-sm-8" style="margin-left: 15%">
<?php
    foreach ($faq_query->result() as $row) {
        $faq_id = $row->faq_id;
?>
    <div class="panel-group styled-accordion" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading smoothie" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?= $row->faq_id ?>" aria-expanded="false" aria-controls="collapseOne"><?= $row->faq_title ?></a>
                </h4>
            </div>
            <div id="collapseOne<?= $row->faq_id ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <p><?= nl2br($row->faq_ans) ?></p>
                </div>
            </div>
        </div>
        <?php } ?>      
    </div>
</div>