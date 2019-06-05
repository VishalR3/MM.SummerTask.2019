<div class="container">
    <div class="row">
        <div class="col-sm-6" style="background-color:#eee;">
                    <h1>Register</h1>
                                            <form class="form" method="POST" action="data.php">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                            <i class="fa fa-user"></i>
                                                        </span></div>
                                                <input type="text" class="form-control" name="Username" placeholder="Username"></div><br>
                                                <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                        <i class="fa fa-lock"></i>
                                                    </span></div>
                                                <input type="password" name="Password" class="form-control" placeholder="Password"></div><br>
                                                <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                                <i class="fa fa-lock"></i>
                                                            </span></div>
                                                <input type="password" name="cPassword" class="form-control" placeholder="Confirm Password"></div><br><br>
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
                                                <input type="text" class="form-control" name="Name" placeholder="Display Name"></div><br>
                                                <input type="submit" class="btn btn-primary" value="Register" class="form-control" style="width:100%;">
                                            </form>
        </div>
        <div class="col-sm-6" style="background-color:#ccf;">
            <h4>Already Registered?</h4>
            <h1>Login</h1>
                                        <form class="form" method="POST" action="datae.php">
                                                <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-user"></i>
                                                        </span></div>
                                            <input type="text" class="form-control" name="Username" placeholder="Username"></div><br>
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