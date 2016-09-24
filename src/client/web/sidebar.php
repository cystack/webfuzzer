<aside class="sidebar">
    <div class="sidebar-container">
        <div class="sidebar-header">
            <div class="brand">
                <div class="logo"> <span class="l l1"></span> <span class="l l2"></span> <span class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span> </div> WebFuzzer</div>
            </div>

            <nav class="menu">
                <ul class="nav metismenu" id="sidebar-menu">
                    <li <?php if ( basename($_SERVER['PHP_SELF']) == "dashboard.php" ) { echo "class=\"active\"";} ?> >
                        <a href="dashboard.php"> <i class="fa fa-home"></i> Dashboard </a>
                    </li>
                    <li <?php if ( basename($_SERVER['PHP_SELF']) == "domains.php" ) { echo "class=\"active\"";} ?> >
                        <a href="domains.php"> <i class="fa fa-th-large"></i> Domains </a>
                    </li>
                    <li <?php if ( basename($_SERVER['PHP_SELF']) == "scan.php" ) { echo "class=\"active\"";} ?> >
                        <a href="scan.php"> <i class="fa fa-search"></i> Scans </a>
                    </li>
                    <!-- <li>
                        <a href=""> <i class=" fa fa-exclamation-triangle"></i> Vulnerabilities</a>
                        <ul>
                            <li> <a href="Summary.html">
                                Summary
                            </a> </li>
                            <li> <a href="FalsePositive.html">
                                False Positive
                            </a> </li>
                        </ul>
                    </li> -->
                    <li <?php if ( basename($_SERVER['PHP_SELF']) == "vulnerability.php" ) { echo "class=\"active\"";} ?> >
                        <a href="./vulnerability.php"> <i class="fa fa-exclamation-triangle"></i> Vulnerabilities </a>
                    </li>
                    <li <?php if ( basename($_SERVER['PHP_SELF']) == "apikey.php" ) { echo "class=\"active\"";} ?> >
                    <a href="./apikey.php"> <i class="fa fa-key"></i> API Keys </a>
                    </li>
                    <li <?php if ( basename($_SERVER['PHP_SELF']) == "userProfile.php" ) { echo "class=\"active\"";} ?> >
                        <a href="userProfile.php"> <i class="fa fa-user"></i> User profile </a>
                    </li>
                    <li <?php if ( basename($_SERVER['PHP_SELF']) == "support.php" ) { echo "class=\"active\"";} ?> >
                        <a href="./support.php"> <i class="fa fa-life-ring"></i> Support </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
<div class="sidebar-overlay" id="sidebar-overlay"></div>