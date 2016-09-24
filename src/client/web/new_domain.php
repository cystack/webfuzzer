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

           <link rel="stylesheet" type="text/css" href="css/style.css">
           <script type="text/javascript" src="js/script.js"></script>

           <article class="content dashboard-page">
            <section class="section">
                <div class="container" style="margin-top: 100px; margin-bottom: 100px;">
                    <div class="row">
                        <div class="row step">
                            <div class="col-md-3" id="1">
                                <span class="fa fa-refresh"></span>
                                <p>Application Domain</p>
                            </div>
                            <div class="col-md-3" id="2">
                                <span class="fa fa-dollar"></span>
                                <p>Port and Protocol</p>
                            </div>
                            <div class="col-md-3" id="3">
                                <span class="fa fa-cloud-upload"></span>
                                <p>Verify Ownership</p>
                            </div>
                            <div id="4" class="col-md-3">
                                <span class="fa fa-star"></span>
                                <p>Scan</p>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content step activeStepInfo" id="step-1">
                        <div class="col-xs-12">
                            <div class="col-md-12 text-center">
                                <div class="alert alert-success" id="success-domain" style="display: none;">
                                    <strong>Success!</strong> No duplicated domain.
                                </div>
                                <div class="alert alert-warning" id="warning-domain" style="display: none;">
                                    <strong>Warning!</strong> Duplicated domain.
                                </div>
                                Enter the domain name where the Web application is deployed
                                <div class="row sameheight-container">
                                    <div class="col-md-5 col-md-offset-3">
                                        <form role="form">
                                            <div class="form-group">  
                                                <input class="form-control boxed" placeholder="" type="text" id="domain_field">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-primary btn-sm" onclick="javascript: enableNext();">Check</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-xs-right">
                            <button type="button" class="btn btn-primary btn-lg" onclick="javascript: resetActive(event, '2', 'finised');" id="firstNext" disabled>Next</button>
                        </div>
                    </div>
                    <div class="row setup-content step hiddenStepInfo" id="step-2">
                        <div class="col-xs-12">
                            <div class="col-md-12 text-center">
                                Enter the protocol and TCP port where the Web application listens for connections:<br>
                                <form id='protocolID'>
                                    <label>Protocol:</label>
                                    <input type="radio" name="protocol" value="http" > HTTP
                                    <input type="radio" name="protocol" value="https"> HTTPS
                                </form>
                                <form id='portID'>
                                    <label>Port:</label>
                                    <input type="radio" name="port" value="80"> 80
                                    <input type="radio" name="port" value="443">443
                                    <input type="radio" name="port" value="Other">Other
                                    <input type="text" id="portText" maxlength="5" style="width: 30px;">
                                </form> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-1">
                                <button type="button" class="btn btn-primary btn-lg" onclick="javascript: resetActive(event, '1', 'unfinished');">Previous</button>
                            </div>
                            <div class="col-md-4 col-md-offset-2">
                                <button type="button" class="btn btn-primary btn-lg" onclick="javascript: resetActive(event, '3', 'finised');">Next</button>
                            </div>
                        </div>
                    </div>

                    <div class="row setup-content step hiddenStepInfo" id="step-3">
                        <div class="col-xs-12">
                            <div class="col-md-12 text-center">                          
                                <div class="alert alert-success">
                                    <strong>Success!</strong> Verification code copied to clipboard.
                                </div>
                                <div class="alert alert-warning" style="display: none;">
                                    <strong>Warning!</strong> The HTTP response body does NOT contain the verification code.
                                </div>
                                Your plan requires you to verify bing.com's ownership before scanning it. To verify the domain add this HTML verification code to the site's root "index.html" page and click "Verify"
                                <br><br>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <p style="word-break: break-all;"><font color="red"> 
                                            <?php 
                                            echo htmlentities('<meta name="verify-ownership-cloud-scan" value="f6bc53d4-9f91-42cd-b0a9-e085b594ee23">'); 
                                            ?>

                                        </font></p>
                                    </div>
                                    <div class="">
                                        <button type="button" class="btn btn-primary">Copy</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-1">
                                <button type="button" class="btn btn-primary btn-lg" onclick="javascript: resetActive(event, '2', 'unfinished');">Previous</button>
                            </div>
                            <div class="col-md-4 col-md-offset-2">
                                <button type="button" class="btn btn-primary btn-lg" onclick="javascript: resetActive(event, '4', 'finised');">Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content step hiddenStepInfo" id="step-4">
                        <div class="">
                            <div class="">
                                <table class="table borderless ">
                                    <tbody>
                                        <tr>
                                            <td>Target domain: </td>
                                            <td id='target_domain'></td>
                                        </tr>
                                        <tr>
                                            <td>Profile</td>
                                            <td>
                                                <select class="c-select form-control boxed" style="width: 500px;" id="sb">
                                                    <option value="1">Full Scan</option>
                                                    <option value="2">Option 2</option>
                                                    <option value="3">Option 3</option>
                                                </select>        
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email notification</td>
                                            <td>
                                                <input type="text" name="num" style="width: 500px;">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-1">
                                <button type="button" class="btn btn-primary btn-lg" onclick="javascript: resetActive(event, '3', 'unfinished');">Previous</button>
                            </div>
                            <div class="col-md-4 col-md-offset-2">
                                <button type="button" class="btn btn-primary btn-lg" onclick="javascript: submitData()">Save</button>
                            </div>
                        </div>
                    </div>

                </div>
                
    </section>                    
</article>
</div>
</div>
<div id="hidden_form_container" style="display:none;"></div>
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