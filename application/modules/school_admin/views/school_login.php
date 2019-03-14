
<?php
    if (isset($flash))
    {
        echo $flash;
    }
?>
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);">School Admin<b>Panel</b></a>
        <small></small>
    </div>
    <div class="card">
        <div class="body">
            <?php 
                $form_url = base_url()."school_admin/auth";
            ?>


            <form id="sign_in" action="<?= $form_url ?>" method="post">
                <div class="msg">Sign in to start your session</div>
                <?= Validation_errors("<p style='color: red;'>", "</p>") ?>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">person</i>
                    </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="user" placeholder="Username"  autofocus>
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder="Password" >
                    </div>
                </div>
                <div class="row">
                
                    <div class="col-xs-4">
                        <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>