<section>
    <div class="section-inner">
        <div class="container">
<section class="search-sec" style="margin-left: 100px; margin-top: 80px;">
    <div class="container">
    <?php
        $school_url = base_url()."schools/search";
    ?>
        <form action="<?= $school_url ?>" method="post" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12 p-0">
                            <input type="text" name="search" class="form-control search-slt" placeholder="Enter School Name">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <select name="typeofschool" class="form-control search-slt" id="exampleFormControlSelect1">
                                <option value="">Filter by</option>
                                <option value="public">Public</option>
                                <option value="private">Private</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <button type="submit" name="submit" value="Submit" class="btn btn-danger wrn-btn">Search</button>
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
                $school_url = base_url()."school_info/profile/".$row->school_name_url;
        ?>
            <div class="col-sm-6 match-height mb40">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="hover-effect smoothie">
                            <a href="<?= $school_url ?>" class="smoothie">
                                <img src="<?= base_url() ?>school_logo/big_pic/<?= $row->big_pic ?>"onerror="this.onerror=null;this.src='<?php echo base_url(); ?>public_bootstrap/assets/images/school_logo.png';"
                                 alt="School Logo" class="img-responsive smoothie">
                            </a>
                            <div class="hover-caption dark-overlay smoothie text-center">
                                <div class="vertical-center-js">
                                    <a href="<?= $school_url ?>" class="btn btn-primary btn-green">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <h4 class="mt0"><a href="<?= $school_url ?>"><?= $row->schoolname ?></a></h4>
                        <p><?= $row->address ?></p>
                        <p style="color: gray;">Telephone No.: <?= $row->telno ?></p>
                        <p style="color: gray;">Email: <?= $row->emailaddress ?></p>
                        <p style="color: gray;">Ave. Tuition: <?= $row->avetuition ?></p>
                    </div>
                </div>
            </div>    
        <?php } ?>                
        </div>
        <!-- END OF LIST SECTION -->
    </div>
</div>
        </div>
    </div>
</section>