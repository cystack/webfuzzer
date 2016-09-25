<!doctype html>
<html class="no-js" lang="en">
    <?php include("head.php") ?>
    <?php
    if (!isset($_SESSION['token'])){
        header('Location: login.php');
        die();
    }?>
    <?php
        $token = $_SESSION['token'];
        $allVul = GET('/vulns/'.$_GET['scanID'], $token)['body'];
        $scanInfo = GET('/scans/'.$_GET['scanID'], $token)['body'];
        $numberOnLevel = array('Information' => 0, 'Low' => 0, 'Medium' => 0, 'High' => 0);
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
                        <h4>Vulnerability report of <a href="<?php echo $scanInfo['target_url'];?>"><?php echo $scanInfo['target_url'];?></a> domain</h4><br>
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
                                                <?php 
                                                    foreach ($allVul as $vul) {
                                                        echo '<tr onclick="window.document.location=\'detailVulnerabilityScan.php?scanID='.$_GET['scanID'].'&vulID='.$vul['id'].'\';"style="cursor: pointer;">';
                                                        $severityColor = '';
                                                        if ($vul['severity'] == 'Information'){
                                                            $severityColor = 'label-info';
                                                        }elseif ($vul['severity'] == 'Low') {
                                                            $severityColor = 'label-success';
                                                        }elseif ($vul['severity'] == 'Medium') {
                                                            $severityColor = 'label-warning';
                                                        }elseif ($vul['severity'] == 'High') {
                                                            $severityColor = 'label-danger';
                                                        }
                                                        // var_dump($severityColor);
                                                        echo '<td><span class="label '.$severityColor.' col-md-12">'.$vul['severity'].'</span></td>';
                                                        echo '<td>'.$vul['name'].'</td>';
                                                        echo '<td>1</td>';
                                                        echo '</tr>';
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <div class="header-block">
                                        <p class="title"> Scan Information </p>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <ul>
                                        <?php
                                        $parse = parse_url($scanInfo['target_url']);?>
                                        <li>Domain: <?php echo $parse['host'];?></li>
                                    	<li>Start: <?php echo $scanInfo['start_time'];?></li>
                                    	<li>End: <?php echo $scanInfo['start_time'];?></li>
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