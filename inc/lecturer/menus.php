<!-- Full Width Column -->
<div class="content-wrapper">
    <div class="container">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <!-- DIRECT CHAT PRIMARY -->
                    <div class="box-header with-border">
                        <div class="list-group">

                            <a href="<?php echo BASE_URL; ?>pages/lecturer/index.php" class="list-group-item 
                            <?php if ($pagetitle == "home") {
                                echo "active";
                            } ?>">
                                <i class="fa fa-dashboard"></i>
                                Dashboard
                            </a>

                            <a href="<?php echo BASE_URL; ?>pages/lecturer/profile.php" class="list-group-item 
                            <?php if ($pagetitle == "profile") {
                                echo "active";
                            } ?>">
                                <i class="fa fa-edit"></i>
                                Profile
                            </a>

                            <a data-toggle="collapse" href="#collapseOne" class="list-group-item 
                            <?php if ($pagetitle == "settings") {
                                echo "active";
                            } ?>">
                                <i class="glyphicon glyphicon-cog"></i>
                                Settings
                            </a>

                            <div id="collapseOne" class="panel-collapse collapse out">
                                <a href="<?php echo BASE_URL; ?>pages/lecturer/updatePassword.php" class="list-group-item">
                                    <i class="glyphicon glyphicon-lock"></i>
                                    Update Password
                                </a>
                                <a href="<?php echo BASE_URL; ?>pages/lecturer/manageCourses.php" class="list-group-item ">
                                    <i class="glyphicon glyphicon-book"></i>
                                    Manage Course
                                </a>
                            </div>


                            <a href="#" class="list-group-item ">
                                <i class="fa fa-power-off"></i>
                                Logout
                            </a>
                        </div>
                        <!-- /.direct-chat-pane -->
                    </div>
                    <!--/.direct-chat -->
                </div>