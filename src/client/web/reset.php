<!doctype html>
<html class="no-js" lang="en">
    <?php include("head.php") ?>
        <?php 
        if (!isset($_SESSION['token'])){
            header('Location: login.php');
            die();
        }
    ?>
    <body>
        <div class="auth">
            <div class="auth-container">
                <div class="card">
                    <header class="auth-header">
                        <h1 class="auth-title">
                            <div class="logo"> <span class="l l1"></span> <span class="l l2"></span> <span class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span> </div> ModularAdmin </h1>
                    </header>
                    <div class="auth-content">
                        <p class="text-xs-center">PASSWORD RECOVER</p>
                        <p class="text-muted text-xs-center"><small>Enter your email address to recover your password.</small></p>
                        <form id="reset-form" action="#" method="GET" novalidate="">
                            <div class="form-group"> <label for="email1">Email</label> <input type="email" class="form-control underlined" name="email1" id="email1" placeholder="Your email address" required> </div>
                            <div class="form-group"> <button type="submit" class="btn btn-block btn-primary">Reset</button> </div>
                            <div class="form-group clearfix"> <a class="pull-left" href="login.php">return to Login</a> <a class="pull-right" href="signup.php">Sign Up!</a> </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>
        <script src="js/vendor.js"></script>
        <script src="js/app.js"></script>
    </body>

</html>