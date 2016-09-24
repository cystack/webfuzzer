<!doctype html>
<html class="no-js" lang="en">
<?php include("head.php") ?>
<?php
    $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZGVudGl0eSI6ImE1MzdlYjcyLTUwYTgtNDg5OC04NTU5LTA0OTFkMTU4MDRiMCIsImlhdCI6MTQ3NDc0MDQxOCwibmJmIjoxNDc0NzQwNDE4LCJleHAiOjE0NzQ4MjY4MTh9.OOaeHh3X78hW_jB5JpZty09c81qGpr6mepEdwbjb_5A';
    $id = $_GET['id'];
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
                
            <div class="card">
                <div class="card-block">
                    <div class="card-title-block">
                        <h3 class="title"> Vulnerabilities </h3>
                </div>
                <section class="example">
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                        <th>Serverity</th>
                        <th>Count</th>
                        </tr>
                    </thead>
                        <tbody>
                        <tr>
                        <td>High</td>
                        <td>1</td>
                        </tr>
                        <tr>
                        <td>Medium</td>
                        <td>2</td>
                        </tr>
                        <tr>
                        <td>Low</td>
                        <td>3</td>
                        </tr>
                        <tr>
                        <td>Info</td>
                        <td>4</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                </section>
            </div>

            </section>
            <br></br>

                <div class="card">
                <div class="card-block">
                    <div class="card-title-block">
                        <h3 class="title"> Lastest Scan </h3>
                </div>
                <section class="example">
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Serverity</th>
                        <th>Vulnerabilities</th>
                        </tr>
                    </thead>
                        <tbody>
                        <tr>
                        <td>Table cell</td>
                        <td>Table cell</td>
                        <td>Table cell</td>
                        </tr>
                        <tr>
                        <td>Table cell</td>
                        <td>Table cell</td>
                        <td>Table cell</td>
                        </tr>
                        <tr>
                        <td>Table cell</td>
                        <td>Table cell</td>
                        <td>Table cell</td>
                        </tr>
                        <tr>
                        <td>Table cell</td>
                        <td>Table cell</td>
                        <td>Table cell</td>
                        </tr>
                    </tbody>
                    </table>
                </div>                    
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
