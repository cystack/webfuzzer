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
                        <p class="text-xs-center">SIGNUP TO GET INSTANT ACCESS</p>
                        <form id="signup-form" action="#" method="POST" novalidate="">
                            <div class="form-group"> <label for="firstname">Name</label>
                                <div class="row">
                                    <div class="col-sm-12"> <input type="text" class="form-control underlined" name="name" id="name" placeholder="Enter full name" required=""> </div>
                                </div>
                            </div>
                            <div class="form-group"> <label for="email">Email</label> <input type="email" class="form-control underlined" name="email" id="email" placeholder="Enter email address" required=""> </div>
                            <div class="form-group"> <label for="password">Password</label>
                                <div class="row">
                                    <div class="col-sm-6"> <input type="password" class="form-control underlined" name="password" id="password" placeholder="Enter password" required=""> </div>
                                    <div class="col-sm-6"> <input type="password" class="form-control underlined" name="retype_password" id="retype_password" placeholder="Re-type password" required=""> </div>
                                </div>
                            </div>
                            <div class="form-group"> <label for="agree">
            <input class="checkbox" name="agree" id="agree" type="checkbox" required=""> 
            <span>Agree the terms and <a href="#">policy</a></span>
          </label> </div>   
                            <!-- action=POST&url=api_url&accessToken=sjaghdas&body=jhasghjdas&redirecURL=dashboard -->
                            <div class="form-group"> <button type="submit" onclick="javascript: login();" class="btn btn-block btn-primary">Sign Up</button> </div>
                            <div class="form-group">
                                <p class="text-muted text-xs-center">Already have an account? <a href="login.php">Login!</a></p>
                            </div>
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
    <script type="text/javascript">
            function login() {
                var name = document.getElementById('name').value;
                var email = document.getElementById('email').value;
                var password = document.getElementById('password').value;

                var http = new XMLHttpRequest();
                var url = "http://188.166.224.165:5555/users";
                var params = '{"name":"'+name+'","email" : "' + email + '", "password" : "' + password + '"}';
                alert(params);
                http.open("POST", url, true);
                // console.log(params);
                http.setRequestHeader("Content-type", "text/plain");

                http.send(params);
                // alert(params);
            }
        </script>

</html>