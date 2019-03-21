
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

        <div class="container">
	<div class="row">
		<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
            <div class="MultiCarousel-inner">
            <?php
                foreach ($strand_query->result() as $row) {
            ?>
                <div class="item">
                    <div class="pad15">
                        <p><?= $row->strand_name ?></p>
                        
                        <a href="<?= base_url()."pages/strand/".$row->strand_url ?>"><button class="btn btn-primary">Read More</button></a>
                    </div>
                </div>
             <?php } ?>    
            </div>
            <button class="btn btn-primary leftLst"><</button>
            <button class="btn btn-primary rightLst">></button>
        </div>
	</div>
        </div>
    </div>
</section>