<div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>Panel</b></a>
            <small>Admin Panel Login Form</small>
        </div>
        <div class="card">
            <div class="body">
                <?php
                    $form_validate = base_url()."admin/login_validation";
                ?>
                <form id="sign_in" action="<?= $form_validate ?>" method="post">
                    <div class="msg">Login to Manage the Website</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" value="<?= $user ?>" placeholder="Username"  autofocus>
                            <?php echo form_error('user'); ?>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" value="<?= $password ?>" placeholder="Password" >
                            <?php echo form_error('password'); ?>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" name="submit" value="Submit" type="submit">LOGIN</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>