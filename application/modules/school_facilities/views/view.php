
<div class="col-md-12 mb40">
    <div class="row">
        <?php
            foreach ($facility_query->result() as $row) {
                $facility_id = $row->facility_id; 
        ?>
        <div class="col-xs-8">
            
        <div class="hover-effect smoothie mb40">
            <img alt="Image" class="img-responsive smoothie" src="<?= base_url() ?>facility_pic/small_pic/<?= $row->small_pic ?>" alt="Profile image example"/>
        </div>  
        </div>
        <div class="col-xs-8">
            <h3 style="color: #707070" class="mt0 mb40"><?= $row->facility_name ?></h3>
            <h4>Description</h4>
            <p class="mb20" style="text-align: justify; text-indent: 2em;"><small><?= nl2br($row->description) ?></small></p>
            
        </div>
        <?php } ?>
    </div>
</div>