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