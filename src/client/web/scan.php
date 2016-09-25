<!doctype html>
<html class="no-js" lang="en">
    <?php include("head.php") ?>
    <?php
    $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZGVudGl0eSI6ImE1MzdlYjcyLTUwYTgtNDg5OC04NTU5LTA0OTFkMTU4MDRiMCIsImlhdCI6MTQ3NDc0MDQxOCwibmJmIjoxNDc0NzQwNDE4LCJleHAiOjE0NzQ4MjY4MTh9.OOaeHh3X78hW_jB5JpZty09c81qGpr6mepEdwbjb_5A';
    $all = GET('/scans', $token)['body'];
    $finished = array();
    $scanning = array();
    // $all = array();
    for ( $x = 0; $x < count($all); $x++ ) {
        if ($all[$x]['status'] == 'Stopped'){
            array_push($finished, $all[$x]);
        }else{
            array_push($scanning, $all[$x]);
        }
        // array_push($allID, $all[$x]);
    }
    // var_dump($finished);
    // var_dump($scanning);
    // var_dump($all);
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
                        <div class="tab-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default fa fa-search" type="button"></button>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Search by domain...">
                                    </div>
                                </div>
                               <div class="col-md-offset-1 btn-group col-md-4">
                                  <button type="button" class="btn btn-secondary"<a data-toggle="tab" href="#all">All</a></button>
                                 <button type="button" class="btn btn-secondary"<a data-toggle="tab" href="#finished">Finished</a></button>
                                  <button type="button" class="btn btn-secondary"<a data-toggle="tab" href="#running">Scanning</a></button>
                                </div>
                                <div class="col-md-offset-1 col-md-2" role="">
                                    <p><a href="./newScan.php" class="btn btn-primary" role="button">New scan</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div id="all" class="tab-pane fade in active">
                              <div class="card">
                                <div class="card-block">
                                    <section class="example">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Domains</th>
                                                        <th>State</th>
                                                        <th>Start Time</th>
                                                        <th>Scan Time</th>
                                                        <th>Vulnerabilities</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        for ( $x = 0; $x < count($all); $x++ ){
                                                            $scan = $all[$x];
                                                            echo '<tr>';
                                                            echo '<td>'.$scan['id'].'</td>';
                                                            echo '<td>'.$scan['target_url'].'</td>';
                                                            echo '<td>'.$scan['status'].'</td>';
                                                            echo '<td>'.$scan['start_time'].'</td>';
                                                            echo '<td>None</td>';
                                                            echo '<td>'.count(GET('/vulns/'.$scan['id'], $token)['body']).'</td>';
                                                            echo '<td><a href="detailScan.php?scanID='.$scan['id'].'">Detail</a> | <a href="#">Rescan</a> ';
                                                            if ($scan['status'] === 'Running'){
                                                                echo '| <a href="./connection?action=stop&id='.$scan['id'].'">Stop</a>';
                                                            }
                                                            echo '</td>';
                                                            echo '</tr>';
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <div id="finished" class="tab-pane fade">
                          <div class="card">
                                <div class="card-block">
                                    <section class="example">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Domains</th>
                                                        <th>State</th>
                                                        <th>Start Time</th>
                                                        <th>Scan Time</th>
                                                        <th>Vulnerabilities</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php  
                                                        foreach ($finished as &$scan) {
                                                            echo '<tr>';
                                                            echo '<td>'.$scan['id'].'</td>';
                                                            echo '<td>'.$scan['target_url'].'</td>';
                                                            echo '<td>'.$scan['status'].'</td>';
                                                            echo '<td>'.$scan['start_time'].'</td>';
                                                            echo '<td>None</td>';
                                                            echo '<td>'.count(GET('/vulns/'.$scan['id'], $token)['body']).'</td>';
                                                            echo '<td><a href="detailScan.php?scanID='.$scan['id'].'">Detail</a> | <a href="#">Rescan</a></td>';
                                                            echo '</tr>';
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <div id="running" class="tab-pane fade">
                          <div class="card">
                                <div class="card-block">
                                    <section class="example">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Domains</th>
                                                        <th>State</th>
                                                        <th>Start Time</th>
                                                        <th>Scan Time</th>
                                                        <th>Vulnerabilities</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php  
                                                        foreach ($scanning as &$scan) {
                                                            echo '<tr>';
                                                            echo '<td>'.$scan['id'].'</td>';
                                                            echo '<td>'.$scan['target_url'].'</td>';
                                                            echo '<td>'.$scan['status'].'</td>';
                                                            echo '<td>'.$scan['start_time'].'</td>';
                                                            echo '<td>None</td>';
                                                            echo '<td>'.count(GET('/vulns/'.$scan['id'], $token)['body']).'</td>';
                                                            echo '<td><a href="detailScan.php?scanID='.$scan['id'].'">Detail</a> | <a href="#">Rescan</a> ';
                                                            echo '| <a href="./connection?action=stop&id='.$scan['id'].'">Stop</a>';
                                                            echo '</td>';
                                                            echo '</tr>';
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
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