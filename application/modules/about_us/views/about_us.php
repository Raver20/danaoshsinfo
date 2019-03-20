<section id="about-us">
    <div class="section-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <h3>About Us</h3>
                    <p>Competently develop client-focused customer service whereas team driven leadership skills. Monotonectally synergize out-of-the-box platforms after next-generation web services. Phosfluorescently reintermediate state of the art methods of empowerment whereas excellent architectures. Professionally expedite distributed best practices after orthogonal human capital. Competently predominate resource-leveling materials via end-to-end ideas.</p>
                </div>
                <div class="col-sm-5">
                    <div class="row">
                    <h3>Contact Us</h3>
                        <div id="message" class="col-sm-12"></div>
                        <div class="col-sm-12">
                        <?php 
                            $email_form = base_url().'about_us/sendemail'
                        ?>
                            <form method="post" action="<?= $email_form ?>" id="contactform" class="main-contact-form">
                                <div class="form-group">
                                    <input type="text" class="form-control col-md-4 mb20" name="name" placeholder="Your Name *" id="name"  data-validation-required-message="Please enter your name." />
                                    <input type="text" class="form-control col-md-4 mb20" name="email" placeholder="Your Email *" id="email"  data-validation-required-message="Please enter your email address." />
                                </div>
                                <textarea name="comments" class="form-control mb20" id="comments" placeholder="Your Message *"  data-validation-required-message="Please enter a message."></textarea>
                                <input class="btn btn-primary mt30 pull-right" type="submit" name="submit" value="Submit" />
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>