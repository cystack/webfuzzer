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
                <article class="content dashboard-page">
                    <section class="section">
                        <h4>Vulnerability report of <a href="http://google.com">google.com</a> domain</h4>
                        <div class="card col-md-7">
                            <div class="card-block">
                                <section class="example">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Severity</th>
                                                    <th>Name</th>
                                                    <th>Number</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr onclick="window.document.location='./detailVulnerabilityScan.php';"style="cursor: pointer;">
                                                    <td><span class="label label-danger col-md-8">High</span></td>
                                                    <td>SQL Injection</td>
                                                    <td>3</td>
                                                </tr>
                                                <tr onclick="window.document.location='./detailVulnerabilityScan.php';" style="cursor: pointer;">
                                                    <td><span class="label label-warning col-md-8">Warning</span></td>
                                                    <td>XSS</td>
                                                    <td>2</td>
                                                </tr>
                                                <tr onclick="window.document.location='./detailVulnerabilityScan.php';"style="cursor: pointer;">
                                                    <td><span class="label label-info col-md-8">Info</span></td>
                                                    <td>Information Disclosure</td>
                                                    <td>3</td>
                                                </tr>
                                                <tr onclick="window.document.location='./detailVulnerabilityScan.php';"style="cursor: pointer;">
                                                    <td><span class="label label-warning col-md-8">Warning</span></td>
                                                    <td>XSS</td>
                                                    <td>2</td>
                                                </tr>
                                                <tr onclick="window.document.location='./detailVulnerabilityScan.php';"style="cursor: pointer;">
                                                    <td><span class="label label-info col-md-8">Info</span></td>
                                                    <td>Information Disclosure</td>
                                                    <td>3</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <div class="col-md-5">
                        	<div class="card card-info">
                                <div class="card-header">
                                    <div class="header-block">
                                        <p class="title"> Host Details </p>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <ul>
                                    	<li>IP: 42.112.10.214</li>
                                    	<li>Domain: google.com</li>
                                    	<li>OS: Microsoft Windows Server 2012 R2</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <div class="header-block">
                                        <p class="title"> Scan Information </p>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <ul>
                                    	<li>Start: May 21 at 9:58 AM</li>
                                    	<li>End: May 21 at 10:06 AM</li>
                                    	<li>Elapsed: 8 minutes</li>
                                    	<li>Scan profile: full_audit</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card card-success">
                                <div class="card-header">
                                    <div class="header-block">
                                        <p class="title"> Vulnerabilities </p>
                                    </div>
                                </div>
                                <div class="card-block">
                                    Pie chart here.
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.document.location = $(this).data("href");
    });
});
        </script>
    </body>

</html>