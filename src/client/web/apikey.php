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
                            <div class="col-md-10">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default fa fa-search" type="button"></button>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Search by domain..." >
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">New Api Key</button>

                                <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Create new API key</h3>
      </div>
      <div class="modal-body">
        <input class="form-control boxed" placeholder="API Key Name" type="text" readonly="readonly">
      </div>
      <div class="modal-footer row">
        <div class="col-md-1 col-md-offset-7">
        <button type="button" class="btn btn-primary" >Create</button>
        </div>

        <div class="col-md-1 col-md-offset-1">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>

      </div>
    </div>

  </div>
</div>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-block">
                        <section class="example">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>API Keys</th>
                                            <th>Active</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>API For WepApp</td>
                                            <td>123e4567-e89b-12d3-a456-426655440000</td>
                                            <td>

                                                <label>
                                                    <input class="checkbox" type="checkbox">
                                                    <span></span>
                                                </label> 

                                            </td>
                                            <td>Delete</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>API For Mobile</td>
                                            <td>123e4567-e89b-12d3-a456-426655440000</td>
                                            <td>

                                                <label>
                                                    <input class="checkbox" type="checkbox">
                                                    <span></span>
                                                </label> 

                                            </td>
                                            <td>Delete</td>
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
                        <li class="page-item"></li>
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