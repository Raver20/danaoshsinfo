
<header id="home" class="fullheight max-600">
    <div class="dark-overlay fullheight max-600">
        <div class="container fullheight max-600">                   
            <div class="jumbotron">
                <h1><small>We serve the</small><br>
                Best Education</h1>
                <p>
                    <a class="btn btn-white btn-lg page-scroll" href="<?= base_url()?>about_us/" role="button">Why?</a> 
                    <a class="btn btn-lg btn-primary btn-green page-scroll" href="<?= base_url()?>schools/" role="button">Look for Schools</a>
                </p>
            </div>
        </div>
    </div>
</header>

<section>
    <div class="section-inner">
        <div class="container">
        <h1 style="text-align: center;">Strands</h1>
        <div class="container">
            <div class="row">
                <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                    <div class="MultiCarousel-inner">
                    <?php
                        foreach ($strand_query->result() as $row) {
                    ?>
                        <div class="hover-effect smoothie item">
                            <a href="#" class="thumbnail smoothie">
                            <img src="<?= base_url() ?>strand_pic/big_pic/<?= $row->big_pic ?>" alt="Image" class="smoothie"></a>
                            <div class="hover-caption dark-overlay smoothie text-center">
                                <div class="vertical-center-js">
                                    <h6 style="color: black;"><?= $row->strand_name ?></h6>
                                    
                                    <a href="<?= base_url().'pages/strand/'.$row->strand_url ?>" class="btn btn-primary btn-green">Read More</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>    
                    </div>
                   
                    <button class="btn btn-primary leftLst"><</button>
                    <button class="btn btn-primary rightLst">></button>
                </div>
            </div>
        </div>
        
        <section id="our-courses" style="padding-top: 50px; text-align:center;">
            <div class="section-inner">
                <div class="container">
                    <div class="row">
                        <h1> Top 3 Most Rated School</h1>
                        <?php 
                           foreach( $most_rated as $data){
                        ?>
                        <div class="col-md-4 mb40 match-height">
                            <div class="hover-effect smoothie">
                                <a href="#" class="smoothie">
                                <img src="<?= base_url() ?>school_logo/big_pic/<?= $data->big_pic ?>" onerror="this.onerror=null;this.src='<?php echo base_url(); ?>public_bootstrap/assets/images/school_logo.png';" alt="Image" class="img-responsive smoothie" style="height: 393px!important;"></a>
                                <div class="hover-overlay smoothie text-center">
                                    <div class="vertical-center-js">
                                        <h4><?= $data->schoolname ?></h4>
                                    </div>
                                </div>
                                <div class="hover-caption dark-overlay smoothie text-center">
                                    <div class="vertical-center-js">
                                        <h4><?= $data->schoolname ?></h4>
                                        <a href="<?= base_url().'school_info/profile/'.$data->school_name_url ?>" class="btn btn-primary btn-green">View School</a>
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