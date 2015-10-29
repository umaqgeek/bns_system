

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="<?=site_url('admin'); ?>">Home Page</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
<!--                    <li>
                        <a href="#about">About</a>
                    </li>-->
                    <li>
                        <a href="<?=site_url('admin'); ?>">Users</a>
                    </li>
                    <li>
                        <a href="<?=site_url('admin/buses'); ?>">Buses</a>
                    </li>
                    <li>
                        <a href="<?=site_url('admin/assign_driver'); ?>">Assign Driver</a>
                    </li>
                    <li>
                        <a href="<?=site_url('admin/location_type'); ?>">Location Type</a>
                    </li>
                    <li>
                        <a href="<?=site_url('admin/location'); ?>">Location</a>
                    </li>
<!--                    <li>
                        <a href="<?=site_url('admin/qrgen'); ?>">QR Bus Generator</a>
                    </li>-->
                    <li>
                        <a href="<?=site_url('login/logout'); ?>">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


