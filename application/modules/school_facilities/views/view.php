<section>
    <div class="section-inner">
        <div class="container">

<section id="our-courses">
    <div class="section-inner">
        <div class="container">
            <div class="row">
            <?php
                foreach ($facility_query->result() as $row) {
                    $facility_id = $row->facility_id; 
            ?>
                <div class="col-md-4 mb40 match-height">
                    <div class="hover-effect smoothie">
                        <a href="#" class="smoothie">
                        <img alt="Image" class="img-responsive smoothie" src="<?= base_url() ?>facility_pic/small_pic/<?= $row->small_pic ?>" alt="Profile image example"/>
                        <div class="hover-overlay smoothie text-center">
                            <div class="vertical-center-js">
                                <h4><?= $row->facility_name ?></h4>
                            </div>
                        </div>
                        <div class="hover-caption dark-overlay smoothie text-center">
                            <div class="vertical-center-js">
                                <p class="mb20"><small><?= nl2br($row->description) ?></small></p>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
           
        </div>
    </div>
</section>

        </div>
    </div>
</section>