
<div class="col-md-12 mb40">
	<div class="row">
        <div class="col-xs-12">
            <h1 style="color: #707070" class="mt0 mb40">Welcome to Dashboard <?= $schoolname ?></h1>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">assignments</i>
                        </div>
                        <div class="content">
                            <div class="text">No. of Facilities</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $totalfacilities ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">No. of Requirements</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?= $totalschoolrequirements ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">school</i>
                        </div>
                        <div class="content">
                            <div class="text">No. of Strands</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"><?= $totalschoolstrands ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_offer</i>
                        </div>
                        <div class="content">
                            <div class="text">No. of Privileges</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"><?= $totalschoolpreviligies ?></div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- #END# Widgets -->
               
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        <span class="label label-success"><?= $totalratings ?></span> Review(s)
                    </h2>
                    
                </div>
                <div class="body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Review</th>
                                <th>Rating</th>
                      
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($ratings->result() as $row) {
                             
                            ?>
                            <tr>
                                <td><?= $row->review ?></td>

                                <td>
                                    <?php  
                                        for ($x = 1; $x <= 5; $x++) {
                                            if($x<=$row->rate)
                                            {
                                                echo '<span class="glyphicon glyphicon-star" style="color:yellow;"></span>';
                                            }
                                            else
                                            {
                                                echo '<span class="glyphicon glyphicon-star"></span>';
                                            }
                                        }
                                    ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
       
    </div>
</div>
