<section>
    <div class="section-inner">
        <div class="container">
<section class="search-sec" style="margin-top: 80px;">
    <div class="container">
    <?php
        $school_url = base_url()."schools/search";
    ?>
        <form action="<?= $school_url ?>" method="post" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        
                        <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                            <input type="text" name="search" value="<?= $search_schoolname ?>" class="form-control search-slt" placeholder="Enter School Name">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                            <select name="typeofschool" class="form-control search-slt" id="exampleFormControlSelect1">
                                <option value="">Filter by Type</option>
                                <option value="public" <?= $search_typeofschool == 'public' ? 'selected' : '' ?> >Public</option>
                                <option value="private" <?= $search_typeofschool == 'private' ? 'selected' : '' ?> >Private</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                            <select name="strand" class="form-control search-slt" id="exampleFormControlSelect1">
                                <option value="">Filter by Strand</option>
                            <?php
                                foreach ($school_strands_query->result() as $row) {
                            ?>
                                <option value="<?= $row->strand_id ?>" <?= $search_strand == $row->strand_id ? 'selected' : '' ?>><?= $row->strand_name ?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 p-0">
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
            foreach ($page_query as $row) {
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