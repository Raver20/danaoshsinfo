
<div class="container">    
    <div class="row">
        <div class="panel panel-default">
        
            <div class="panel-body">
                <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                    <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive"> 
                </div>
                <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >
                    <div class="container" >

                        <h3><?= $schoolname ?></h3>
                        <p><?= $address ?></p>

                    </div>
                        <hr>
                    <ul class="container details" >
                        <li><p><span class="glyphicon glyphicon-earphone one" style="width:50px;"></span><?= $telno ?></p></li>
                        <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span><?= $emailaddress ?></p></li>
                    </ul>
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
                                                                <div class="col-sm-6">
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-xs-12">
                                                                            <h5><span>Photography for Beginners</span></h5>
                                                                            <p class="lead">16 week course.</p>
                                                                            <p class="mb20">Proactively parallel task vertical products for collaborative ideas. Monotonectally visualize functional functionalities vis-a-vis efficient products. Globally matrix bleeding-edge e-business with professional.</p>
                                                                            <a href="single-course.html" class="btn btn-primary btn-green">View Details</a>
                                                                        </div>
                                                                        
                                                                    </div>

                                                                    
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <div class="panel-group styled-accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                                                        <div class="panel panel-default">
                                                                            <div class="panel-heading smoothie" role="tab" id="headingOne">
                                                                                <h4 class="panel-title">
                                                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Strands</a>
                                                                                </h4>
                                                                            </div>
                                                                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                                                <div class="panel-body">
                                                                                    <div class="row">               
                                                                                        <p>Strands</p>
                                                                                    </div> 
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
                                                                                <h5 style="color: #707070" class="mt0 mb40"><?= $row->requirement_name ?></h5>
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
                                                                                <h5 style="color: #707070" class="mt0 mb40"><?= $row->privilege_name ?></h5>
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
                                                        <div id="message" class="col-sm-12"></div>
                                                        <div class="col-sm-12">
                                                            <form method="post" action="sendemail.php" id="contactform" class="main-contact-form">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control col-md-4 mb20" name="name" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name." />
                                                                    <input type="text" class="form-control col-md-4 mb20" name="email" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address." />
                                                                </div>
                                                                <textarea name="comments" class="form-control mb20" id="comments" placeholder="Your Message *" required data-validation-required-message="Please enter a message."></textarea>
                                                                <input class="btn btn-primary mt30 pull-right" type="submit" name="submit" value="Submit" />
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>                   
                                            </div>
                                        </div>
                                    
                                        <!-- facilities SECTION -->
                                        <div role="tabpanel" class="tab-pane fade" id="facilities">
                                            <div class="tab-inner">
                                                <div class="row">
                                                    <div class="col-sm-12 mb40">
                                                        <div class="row">
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