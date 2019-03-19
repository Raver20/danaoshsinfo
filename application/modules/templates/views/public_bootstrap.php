<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">

    

    <title>Danao SHS Info - <?= $view_module ?></title>
    <link href="<?php echo base_url() ?>public_bootstrap/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Cardo:400,700,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:300,700,900,500' rel='stylesheet' type='text/css'>
    
    <link href="<?php echo base_url() ?>public_bootstrap/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>public_bootstrap/assets/pe-icons/css/pe-icon-7-stroke.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>public_bootstrap/assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>public_bootstrap/assets/css/plugins.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>public_bootstrap/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>public_bootstrap/assets/css/alt-colors.css" rel="stylesheet">

</head>

<body class="regular-navigation">
    <div id="master-wrapper">
    
        <div class="nav-wrapper smoothie">  
            <div class="container">      
                <div class="row">
                    <div class="col-xs-3">
                        <a class="logo" href="index.html"><img alt="" class="logo img-responsive" src="<?php echo base_url() ?>public_bootstrap/assets/images/logos.png"></a> 
                    </div>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false" aria-controls="navbar">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                    </button>
                    <div class="col-xs-9">
                        <div class="collapse navbar-collapse" id="navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Strands <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                            <?php
                                                
                                                foreach ($strands_query->result() as $row) {
                                                    
                                            ?>
                                            <li><a href="<?= base_url()."pages/strand/".$row->strand_url ?>"><?= $row->strand_name ?></a></li>
                                            <?php
                                                }
                                            ?>
                                    </ul>
                                </li>
                                <li><a href="<?php echo base_url(); ?>schools">Schools</a></li>
                                <li><a href="<?php echo base_url(); ?>about_us">About Us</a></li>
                                <li><a href="<?php echo base_url(); ?>faqs">Faq's</a></li>
                                
                            </ul>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>

        
        <section>
            <div class="section-inner">
                <div class="container">
                      <?php 
                        if (isset($view_file)) 
                        {
                            $this->load->view($view_module.'/'.$view_file);
                        }
                      ?>
                </div>
            </div>
        </section>
        <footer>
            <div class="container">
                <div class="row">         
                    <div class="col-md-12 text-right">
                        <p class="copyright"><small>© 2019. Designed and Developed by <a href="http://www.distinctivethemes.com" target="_blank">Distinctive Themes</a></small></p>
                    </div>
                </div>
            </div>
        </footer>

        <a href="#" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

    </div>

    <script src="<?php echo base_url() ?>public_bootstrap/assets/js/jquery.min.js"></script> 
    <script src="<?php echo base_url() ?>public_bootstrap/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>public_bootstrap/assets/js/plugins.js"></script> 
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="<?php echo base_url() ?>public_bootstrap/assets/js/init.js"></script>

</body>
</html>