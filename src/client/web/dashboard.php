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
        <div class="main-wrapper">
            <div class="app" id="app">
            	<?php 
            		include("header.php"); 
            		include("sidebar.php");
            	?>		
                <article class="content dashboard-page">
                    <section class="section">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="card-title-block">
                                            <h3 class="title"> Vulnerabilities by severity </h3>
                                        </div>
                                        <section class="example">
                                            <div class="flot-chart">
                                                <div class="flot-chart-pie-content" id="flot-pie-chart"></div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="card-title-block">
                                            <h3 class="title"> Vulnerabilities by time</h3>
                                        </div>
                                        <section class="example">
                                            <div class="flot-chart">
                                                <div class="flot-chart-content" id="flot-line-chart"></div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
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