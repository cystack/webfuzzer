<!doctype html>
<html class="no-js" lang="en">
    <?php include("head.php") ?>
    <?php
    $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZGVudGl0eSI6IjhiYWU4YzM4LTQ3NzgtNDM4Zi1hODA2LWVlYTYxMWI0MjIzMCIsImlhdCI6MTQ3NDcxMTQwMiwibmJmIjoxNDc0NzExNDAyLCJleHAiOjE0NzQ3OTc4MDJ9.b6Ctxvx4xTL-QynOB19B5gPYKIXkrQnsK8x-ydq1ncI';
    $num = GET('/gets', $token);
    for ( $x = 0; $x < count($num['body']); $x++ ) {
        $data = GET('/domains/'.($x + 1), $token);

        echo "<tr><td>".$data['body']['id']."</td><td>".$data['body']['url']."</td><td>".(int)$data['body']['ssl']."</td><td>Delete</td></tr>";
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
                                                    <tr>
                                                        <td>1</td>
                                                        <td>google.com</td>
                                                        <td>Running</td>
                                                        <td>2016-05-22 15:23:00</td>
                                                        <td>2 hours</td>
                                                        <td>6</td>
                                                        <td><a href="detailScan.php">Detail</a> | <a href="#">Rescan</a> | <a href="#">Stop</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>microsoft.com</td>
                                                        <td>Finished</td>
                                                        <td>2016-05-22 15:23:00</td>
                                                        <td>2 hours</td>
                                                        <td>6</td>
                                                        <td><a href="detailScan.php">Detail</a> | <a href="#">Rescan</a> | <a href="#">Stop</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>google.com</td>
                                                        <td>Running</td>
                                                        <td>2016-05-22 15:23:00</td>
                                                        <td>2 hours</td>
                                                        <td>6</td>
                                                        <td><a href="detailScan.php">Detail</a> | <a href="#">Rescan</a> | <a href="#">Stop</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>google.com</td>
                                                        <td>Running</td>
                                                        <td>2016-05-22 15:23:00</td>
                                                        <td>2 hours</td>
                                                        <td>6</td>
                                                        <td><a href="detailScan.php">Detail</a> | <a href="#">Rescan</a> | <a href="#">Stop</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>microsoft.com</td>
                                                        <td>Finished</td>
                                                        <td>2016-05-22 15:23:00</td>
                                                        <td>2 hours</td>
                                                        <td>6</td>
                                                        <td><a href="detailScan.php">Detail</a> | <a href="#">Rescan</a> | <a href="#">Stop</a></td>
                                                    </tr>
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
                                                    <tr>
                                                        <td>2</td>
                                                        <td>microsoft.com</td>
                                                        <td>Finished</td>
                                                        <td>2016-05-22 15:23:00</td>
                                                        <td>2 hours</td>
                                                        <td>6</td>
                                                        <td><a href="detailScan.php">Detail</a> | <a href="#">Rescan</a> | <a href="#">Stop</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>microsoft.com</td>
                                                        <td>Finished</td>
                                                        <td>2016-05-22 15:23:00</td>
                                                        <td>2 hours</td>
                                                        <td>6</td>
                                                        <td><a href="detailScan.php">Detail</a> | <a href="#">Rescan</a> | <a href="#">Stop</a></td>
                                                    </tr>
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
                                                    <tr>
                                                        <td>1</td>
                                                        <td>google.com</td>
                                                        <td>Running</td>
                                                        <td>2016-05-22 15:23:00</td>
                                                        <td>2 hours</td>
                                                        <td>6</td>
                                                        <td><a href="detailScan.php">Detail</a> | <a href="#">Rescan</a> | <a href="#">Stop</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>google.com</td>
                                                        <td>Running</td>
                                                        <td>2016-05-22 15:23:00</td>
                                                        <td>2 hours</td>
                                                        <td>6</td>
                                                        <td><a href="detailScan.php">Detail</a> | <a href="#">Rescan</a> | <a href="#">Stop</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>google.com</td>
                                                        <td>Running</td>
                                                        <td>2016-05-22 15:23:00</td>
                                                        <td>2 hours</td>
                                                        <td>6</td>
                                                        <td><a href="detailScan.php">Detail</a> | <a href="#">Rescan</a> | <a href="#">Stop</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <div id="menu3" class="tab-pane fade">
                          <h3>Menu 3</h3>
                          <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
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