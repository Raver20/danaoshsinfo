<section class="search-sec" style="margin-left: 220px; margin-top: 80px;">
    <div class="container">
        <form action="#" method="post" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <input type="text" class="form-control search-slt" placeholder="Enter School Name">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <select class="form-control search-slt" id="exampleFormControlSelect1">
                                <option>Filter by</option>
                                <option>Public</option>
                                <option>Private</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <button type="button" class="btn btn-danger wrn-btn">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<div class="section-inner">
    <div class="container">

        <div class="row mb60 text-center">
            <div class="col-sm-12">
                <h3 class="section-title">List Of Schools</h3>
                <p class="section-sub-title">Here you can search by school</p>
                </div>
            </div>
        </div>
        
        <!-- LIST SECTION -->
        
        <div class="row">
        <?php
            foreach ($page_query->result() as $row) {
                
        ?>
            <div class="col-sm-6 match-height mb40">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="hover-effect smoothie">
                            <a href="#" class="smoothie">
                                <img src="<?php echo base_url() ?>public_bootstrap/assets/images/blog-1.jpeg" alt="Image" class="img-responsive smoothie">
                            </a>
                            <div class="hover-caption dark-overlay smoothie text-center">
                                <div class="vertical-center-js">
                                    <a href="single-post.html" class="btn btn-primary btn-green">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <h6 class="mt0"><a href="#"><?= $row->schoolname ?></a></h6>
                        <p><?= $row->address ?></p>
                        <p><?= $row->emailaddress ?></p>
                    </div>
                </div>
            </div>    
        <?php } ?>                
        </div>
        <!-- END OF LIST SECTION -->
    </div>
</div>
