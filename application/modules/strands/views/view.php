
<div class="col-md-12 mb40">
	<div class="row">
		<div class="col-xs-4">
            <div class="hover-effect smoothie mb40">
                <a href="#" class="smoothie">
                <img alt="Image" class="img-responsive smoothie" src="<?= base_url() ?>strand_pic/big_pic/<?= $big_pic ?>" alt="Profile image example"/></a>
                <div class="hover-caption dark-overlay smoothie text-center">
                </div>
            </div>
        </div>
        <div class="col-xs-8">
            <h3 style="color: #707070" class="mt0 mb40"><?= $strand_name ?></h3>
            <h4>Description</h4>
            <p class="mb20" style="text-align: justify; text-indent: 2em; font-size: 17px;"><small><?= nl2br($description) ?></small></p>
            
        </div>
        
        <div class="col-xs-8">
            <h4>Related Course In College</h4>
            
            <p class="mb20" style="font-size: 16px; margin-left: 20px;"><small><?= nl2br($rcic) ?></small></p>
            
        </div>
    </div>
</div>