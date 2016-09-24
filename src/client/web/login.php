<!doctype html>
<html class="no-js" lang="en">
    <?php include("head.php") ?>

    <body>
        <div class="auth">
            <div class="auth-container">
                <div class="card">
                    <header class="auth-header">
                        <h1 class="auth-title">
                            <div class="logo"> <span class="l l1"></span> <span class="l l2"></span> <span class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span> </div> WebFuzzer </h1>
                    </header>
                    <div class="auth-content">
                        <p class="text-xs-center">LOGIN TO CONTINUE</p>
                        <form id="login-form" action="./dashboard.php" method="GET" novalidate="">
                            <div class="form-group"> <label for="username">Username</label> <input type="email" class="form-control underlined" name="username" id="username" placeholder="Your email address" required> </div>
                            <div class="form-group"> <label for="password">Password</label> <input type="password" class="form-control underlined" name="password" id="password" placeholder="Your password" required> </div>
                            <div class="form-group"> <label for="remember">
            <input class="checkbox" id="remember" type="checkbox"> 
            <span>Remember me</span>
          </label> <a href="reset.php" class="forgot-btn pull-right">Forgot password?</a> </div>
                            <div class="form-group"> <button type="submit" class="btn btn-block btn-primary" onclick="javascript: login();">Login</button> </div>
                            <div class="form-group">
                                <p class="text-muted text-xs-center">Do not have an account? <a href="signup.php">Sign Up!</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            var username = document.getElementByID('username').value;
            var password = document.getElementByID('password').value;

            var http = new XMLHttpRequest();
            var url = "connection.php";
            var params = "url=/auth&accessToken=None&body=email:" + username + " ++ password=" + password + "&redirectURL=dashboard";
            http.open("POST", url, true);

            http.setRequestHeader("Content-type", "application/json");

            http.onreadystatechange = function() {
                if(http.readyState == 4 && http.status == 200) {
                    alert("Error");
                }
            }
            http.send(params);
        </script>
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