<div class="container">
<?php if (!$this->session->userdata('logged_in')) { ?>
    <div class="row">
        <div class="col-sm-6" style="padding:2% 10% 10%">
        <div style="background-color:#eee;padding:10px 20px;">
                    <h1>Register</h1>
<?php if($this->session->flashdata('signup_stat')){?><p style="text-align: center;padding:10px;background-color:red;color:white;"><?php echo $this->session->flashdata('signup_stat'); ?></p><?php } ?>
                                            <form class="form" method="POST" action="<?php echo site_url(); ?>/users/signup">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                            <i class="fa fa-user"></i>
                                                        </span></div>
                                                <input type="text" class="form-control" name="username" placeholder="Username"></div><br>
                                                <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                        <i class="fa fa-lock"></i>
                                                    </span></div>
                                                <input type="password" name="password" class="form-control" placeholder="Password"></div><br>
                                                <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                                <i class="fa fa-lock"></i>
                                                            </span></div>
                                                <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password"></div><br><br>
                                                <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text">@</span>
                                                            </span></div>
                                                <input type="text" class="form-control" name="email" placeholder="Email Address"></div><br>
                                                <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                                <i class="fa fa-user"></i>
                                                            </span></div>
                                                <input type="text" class="form-control" name="name" placeholder="Display Name"></div><br>
                                                <input type="submit" class="btn btn-primary" value="Register" class="form-control" style="width:100%;">
                                            </form>
        </div>
        </div>
        <div class="col-sm-6" style="padding:2% 10% 10%;">
        <div style="background-color:#ccf;padding:10px 20px;">
            <h4>Already Registered?</h4>
            <h1>Login</h1>
<?php if($this->session->flashdata('login_stat')){ ?> <p style="text-align: center;padding:10px;background-color:red;color:white;"><?php echo $this->session->flashdata('login_stat'); ?></p><?php } ?>
                                        <form class="form" method="POST" action="<?php echo site_url(); ?>/users/login">
                                                <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-user"></i>
                                                        </span></div>
                                            <input type="text" class="form-control" name="username" placeholder="Username"></div><br>
                                            <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-lock"></i>
                                                    </span></div>
                                            <input type="password" name="password" class="form-control" placeholder="password"></div>
                                            <br><br>
                                            <label for="Remember Me"><input type="checkbox" value="1">Remember Me</label><br>
                                            <input type="submit" class="btn btn-primary" value="Log In" class="form-control" style="width:100%;">
                                        </form>
                </div>
        </div>
        
        


    </div>
<?php }
 else { ?>
    <div class="errbox text-center" style="background-color:#bbb;padding:30px;">
     <h1>You are Logged in as <?php echo $this->session->userdata("username"); ?>.</h1>
     <p>Do u want to <a href="<?php echo base_url();?>/index.php/Users/logout">logout</a> ??</p>
     </div>

<?php } ?>
</div>