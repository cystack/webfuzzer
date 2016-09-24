<!doctype html>
<html class="no-js" lang="en">
    <?php include("head.php") ?>

    <body>
        <div class="main-wrapper">
            <div class="app" id="app">
            	<?php 
            		include("header.php"); 
            		include("sidebar.php");
            	?>

                <?php  
                    
                ?>

                <article class="content dashboard-page">
                    <section class="section">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-1">
                                <img class="img-responsive" style="width: 100%;" src="assets/faces/default-avatar-tech-guy.png">
                            </div>
                            <div class="col-md-7 col-md-ofset-1">
                                <div class="row">
                                    <div class="col-md-2">
                                    <b>Name</b>
                                    </div>
                                    <div class="col-md-8">
                                    <p>Trung Nguyen</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                    <b>Email</b>
                                    </div>
                                    <div class="col-md-8">
                                    <p>trungstp@gmail.com</p>
                                    </div>
                                </div>
                                <div>
                                    <a href="changePassword.php">Change password</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive col-md-10 col-md-offset-1">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Quota name</th>
                                        <th>Remaining</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Web hook notifications</td>
                                        <td>∞</td>
                                        <td>Receive system notifications via HTTP POST to your domain</td>
                                    </tr>
                                    <tr>
                                        <td>Notification email addresses</td>
                                        <td>∞</td>
                                        <td>Receive system notifications via email</td>
                                    </tr>
                                    <tr>
                                        <td>Scans per month</td>
                                        <td>7 / 10</td>
                                        <td>Number of scans per month/td>
                                    </tr>
                                    <tr>
                                        <td>Domains</td>
                                        <td>2 / 3</td>
                                        <td>Domain names which can be secured</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>                    
                </article>
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