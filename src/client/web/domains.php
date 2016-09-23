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
                    <div class="header-block header-block-search hidden-sm-down">
                        <div class="row sameheight-container">		
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default fa fa-search" type="button"></button>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Search by domain...">
                                    </div>
                                </div>
                            <div class="col-md-1">
                        		<button type="button" class="btn btn-primary btn-sm">Add</button>
                    		</div>
                		</div>
        			</div>
    			</div>	

        	<div class="card">
        		<div class="card-block">
            		<div class="card-title-block">
            			<h3 class="title"> Verify domains </h3>
	            </div>
	            <section class="example">
		            <div class="table-responsive">
	                <table class="table table-striped table-bordered table-hover">
	                <thead>
	                    <tr>
	                    <th>#</th>
	                    <th>Domains</th>
	                    <th>Ownership verified</th>
	                    <th>Action</th>
	                    </tr>
	                </thead>
		                <tbody>
	                    <tr>
	                    <td>1</td>
	                    <td>google.com</td>
	                    <td>True</td>
	                    <td>Delete</td>
	                    </tr>
	                    <tr>
	                    <td>2</td>
	                    <td>bing.com</td>
	                    <td>False</td>
	                    <td>Delete | Verify</td>
	                    </tr>
	                    <tr>
	                    <td></td>
	                    <td></td>
	                    <td></td>
	                    <td></td>
	                    <td></td>
	                    </tr>
	                    <tr>
	                    <td></td>
	                    <td></td>
	                    <td></td>
		                <td></td>
	                    <td></td>
	                    </tr>
	                </tbody>
	                </table>
	            </div>
	            </section>
	        </div>
	
	    </div>
	
		    <nav class="text-xs-center">
	        <ul class="pagination">
	        <li class="page-item">
	            <a class="page-link" href="">Prev</a>
	        </li>
	        <li class="page-item"></li>
	            <a class="page-link" href="">1</a>
	        <li class="page-item"></li>
		            <a class="page-link" href="">2</a>
	-				<li class="page-item"></li>
	            <a class="page-link" href="">3</a>
	        <li class="page-item"></li>
	            <a class="page-link" href="">4</a>
	        </ul>
	    </nav>
	
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
