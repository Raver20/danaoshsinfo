
<div class="container">    
    <div class="row">
        <div class="panel panel-default">
        
            <div class="panel-body">
                <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                    <img alt="User Pic" src="<?= base_url() ?>school_logo/big_pic/<?= $big_pic ?>"onerror="this.onerror=null;this.src='<?php echo base_url(); ?>public_bootstrap/assets/images/school_logo.png';" id="profile-image1" class="img-square img-responsive"> 
                </div>
                <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >
                    <div class="container" >

                        <h3><?= $schoolname ?></h3>
                        <p style="margin-left: 50px;"><?= $address ?></p>

                    </div>
                    <hr>
                    <p><span class="glyphicon glyphicon-earphone one" style="width:50px;"></span><?= $telno ?></p>
                    <p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span><?= $emailaddress ?></p>
                    <hr>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- TABS SECTION -->
<section id="our-courses">
    <div class="section-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-xs-12" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-justified image-tabs" id="course-tabs" role="tablist">
                                        <li role="presentation" class="summer-term active">
                                            <a href="#overview" aria-controls="summer-term" role="tab" data-toggle="tab" class="dark-overlay .half-opacity ">
                                                <span>Overview</span>
                                            </a>
                                        </li>
                                        
                                        <li role="presentation" class="online-learning">
                                            <a href="#facilities" aria-controls="online-learning" role="tab" data-toggle="tab" class="dark-overlay .half-opacity ">
                                                <span>Facilities</span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <!-- overview SECTION -->
                                    <div class="tab-content pt60" id="tabs-collapse">  
                                        <div role="tabpanel" class="tab-pane fade in active" id="overview">
                                            <div class="tab-inner">
                                                <section id="our-courses">
                                                    <div class="section-inner">
                                                        <div class="container">
                                                        
                                                            <div class="row">
                                                                <div class="col-sm-8">
                                                                    <div class="row">
                                                                        <div class="wrapper row3">
                                                                            <div class="content sl">
                                                                                <div class="group btmspace-50 demo">
                                                                       
                                                                                <div class="one_third first ">
                                                                                    <div class="col-sm-4 col-md-4 details">
                                                                                        <div class="avatar" >
                                                                                        <img alt="School Type" src="<?php echo base_url() ?>public_bootstrap/assets/public.png">
                                                                                        </div>
                                                                                        <div class="text">
                                                                                        <h5 style="margin-left: 7px;">School Type</h5>
                                                                                        <p  style="margin-left: 35px;"><?= $typeofschool ?></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="one_third">
                                                                                    <div class="col-sm-4 col-md-4 details">
                                                                                        <div class="avatar"  style="margin-left: 20px;">
                                                                                        <img alt="Academic Calendar" src="<?php echo base_url() ?>public_bootstrap/assets/calendar.png">
                                                                                        </div>
                                                                                        <div class="text">
                                                                                        <h5>Academic Calendar</h5>
                                                                                        <p  style="margin-left: 40px;"><?= $calendar ?></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="one_third">
                                                                                    <div class="col-sm-4 col-md-4 details">
                                                                                        <div class="avatar"  style="margin-left: 20px;">
                                                                                        <img alt="Average Tuition" src="<?php echo base_url() ?>public_bootstrap/assets/php.png">
                                                                                        </div>
                                                                                        <div class="text">
                                                                                        <h5>Average Tuition Fee</h5>
                                                                                        <p style="margin-left: 50px;">
                                                                                        <span>&#8369; <?= $avetuition ?></span>
                                                                                        </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <div style="width: 100%">
                                                                        <iframe width="100%" height="400" src="https://maps.google.com/maps?width=100%&height=600&hl=en&q=P.G%20Almendras%20St.%2C%20Danao%20City+(Your%20Business%20Name)&ie=UTF8&t=&z=16&iwloc=B&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                                                                        <a href="https://www.mapsdirections.info/en/custom-google-maps/">Create Google Map</a> by 
                                                                        <a href="https://www.mapsdirections.info/en/">Measure area on map</a>
                                                                        </iframe>
                                                                    </div>
                                                                </div>
                                                                        
                                                                    </div>

                                                                    
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    
                                                                    <div class="panel-group styled-accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                                                    <div class="panel panel-default">
                                                                            <div class="panel-heading panel-open smoothie" role="tab" id="headingOne">
                                                                                <h4 class="panel-title">
                                                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Strands Offered</a>
                                                                                </h4>
                                                                            </div>
                                                                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                                                <div class="panel-body">
                                                                                    <?php
                                                                                        foreach ($strands_by_query as $row) {
                                                                                            
                                                                                    ?>
                                                                                    <ul>
                                                                                    <li style="color: #707070" ><?= $row->strand_name ?></li>
                                                                                    </ul>
                                                                                    <?php } ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="panel panel-default">
                                                                            <div class="panel-heading smoothie" role="tab" id="headingTwo">
                                                                                <h4 class="panel-title">
                                                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Requirements</a>
                                                                                </h4>
                                                                            </div>
                                                                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                                                <div class="panel-body">
                                                                                <?php
                                                                                    foreach ($requirement_query->result() as $row) {
                                                                                        $requirement_id = $row->requirement_id;
                                                                                ?>
                                                                                <h5 style="color: #707070"><?= $row->requirement_name ?></h5>
                                                                                <p class="mb20" style="text-align: justify; text-indent: 1em; "><small><?= nl2br($row->requirement_desc) ?></small></p>
                                                                                <?php } ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="panel panel-default">
                                                                            <div class="panel-heading smoothie" role="tab" id="headingThree">
                                                                                <h4 class="panel-title">
                                                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Privileges</a>
                                                                                </h4>
                                                                            </div>
                                                                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                                                <div class="panel-body">
                                                                                <?php
                                                                                    foreach ($privilege_query->result() as $row) {
                                                                                        $privilege_id = $row->privilege_id;
                                                                                ?>
                                                                                 <ul>                                   
                                                                                <li style="color: #707070"><?= $row->privilege_name ?></li>
                                                                                 </ul>                                       
                                                                                <?php } ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>     
                                                <hr/>
                                                <div class="col-sm-6 ">
                                                    <div class="row">
                                                        <h1 style="text-align: center;">Inquiry</h1>
                                                        <div id="message" class="col-sm-12"></div>
                                                        <div class="col-sm-12">
                                                        <?php
                                                             $email_form = base_url().'school_info/sendemail';
                                                        ?>
                                                            <form method="post" action="<?= $email_form ?>" id="contactform" class="main-contact-form">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control col-md-4 mb20" name="school_email" value="<?= $emailaddress ?>" placeholder="Your Name *" id="school_email"  />
                                                                    <input type="text" class="form-control col-md-4 mb20" name="name" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name." />
                                                                    <input type="text" class="form-control col-md-4 mb20" name="email" value="<?= $emailaddress ?>" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address." />
                                                                </div>
                                                                <textarea name="comments" class="form-control mb20" id="comments" placeholder="Your Message *" required data-validation-required-message="Please enter a message."></textarea>
                                                                <input class="btn btn-primary mt30 pull-right" type="submit" name="submit" value="Submit" />
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>                   
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="facilities">
                                            <div class="tab-inner">
                                                <div class="row">
                                                    <div class="col-sm-12 mb40">
                                                        <div class="row">
                                                        <?php
                                                            foreach ($facility_query->result() as $row) {
                                                                $facility_id = $row->facility_id; 
                                                        ?>
                                                            <div class="col-md-4 mb40 match-height">
                                                                <div class="hover-effect smoothie">
                                                                    
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
                                            </div> 
                                        </div>                                                 
                                        <!-- End of tabpanel -->                                 
                                    </div>
                                </div>  
                            </div>       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>