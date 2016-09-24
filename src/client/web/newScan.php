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
                    $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZGVudGl0eSI6ImMwOWFjNzExLTgyYTYtNDE1Zi1iMGI5LTg2NTA3YTM2NDAxMyIsImlhdCI6MTQ3NDcxODk1OSwibmJmIjoxNDc0NzE4OTU5LCJleHAiOjE0NzQ4MDUzNTl9.VB7wbwn2q6Kntsz18xA_a7juCrEA6u-JS6uBUORmSac';
                    $domainIDList = GET('/domains', $token)['body'];
                    $domainNameList = array();
                    foreach ($domainIDList as $value) {
                        $domainName = GET('/domains/'.$value['id'], $token)['body']['url'];
                        $domainNameList[$value['id']] = $domainName;
                    }
                    // var_dump($domainNameList);
                ?>
                <article class="content dashboard-page">
                    <section class="section">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="table-responsive">
                                <table class="table borderless ">
                                    <tbody>
                                        <tr>
                                            <td data-toggle="tooltip" data-placement="top" title="This is the domain where your Web application lives, and the target for WebFuzzer application scanner">Target Domain</td>
                                            <td>
                                                <select class="c-select form-control boxed" id="domain">
                                                <?php
                                                    foreach ($domainNameList as $key => $value) {
                                                        echo '<option value="'.$key.'">'.$value.'</option>';
                                                    }
                                                ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-toggle="tooltip" data-placement="top" title="The scan profile to use during this application scan">Profile</td>
                                            <td>
                                            <select class="c-select form-control boxed">
                                                <option selected="">Full Audit</option>
                                                <option value="1">SQL Injetion</option>
                                                <option value="2">XSS</option>
                                            </select>
                                            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <br><br>
                                                <div class="col-md-offset-6" role="">
                                                    <p><a class="btn btn-primary" onclick="javascript: pushToScan();" role="button">Launch Scan</a></p>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br><br>
                            
                        </div>
                        <div class="col-md-5 col-md-offset-1">
                            <div class="panel panel-success">
                              <div class="panel-heading">
                                <h3 class="panel-title">Full Audit</h3>
                              </div>
                              <div class="panel-body">
                                <b>Description:</b></br>
                                Performs a full audit of the target Web application using a comprehensive set of crawling techniques and all the available vulnerability detection plugins.
                                </br></br>
                                <b>Recommendation:</b></br>
                                Use this configuration for detailed analysis and integration with continuous delivery.
                              </div>
                            </div>
                        </div>>
                    </div>
                    </section>                    
                </article>
            </div>
        </div>

        <script type="text/javascript">
            function pushToScan() {
                var token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZGVudGl0eSI6ImMwOWFjNzExLTgyYTYtNDE1Zi1iMGI5LTg2NTA3YTM2NDAxMyIsImlhdCI6MTQ3NDcxODk1OSwibmJmIjoxNDc0NzE4OTU5LCJleHAiOjE0NzQ4MDUzNTl9.VB7wbwn2q6Kntsz18xA_a7juCrEA6u-JS6uBUORmSac";
                var domain = document.getElementById('domain');
                var domainID = domain.options[domain.selectedIndex].value;
                var http = new XMLHttpRequest();
                var url = "http://188.166.224.165:5555/scans";
                var params = '{ "domain_id" : "' + domainID + '", "profile_id" : "0", "bootstrap_path" : "/", "description" : "string" }';
                http.open("POST", url, false);
                http.setRequestHeader("Content-Type", "application/json");
                http.setRequestHeader("Authorization", "JWT " + token);
                http.send(params);
                // alert(params);
                window.location.replace("scan.php");
            }
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