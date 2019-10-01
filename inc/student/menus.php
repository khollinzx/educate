<!-- Full Width Column -->
<div class="content-wrapper">
    <div class="container">

        <!-- Main content -->
        <section class="content ">
            <div class="row">
                <div class="col-md-3">
                    <!-- DIRECT CHAT PRIMARY -->
                    <nav class="navbar navbar-static-top">
                        <div class="box-header with-border ">
                            <div class="list-group">

                                <a href="<?php echo BASE_URL; ?>pages/student/index.php" class="list-group-item 
                            <?php if ($pagetitle == "home") {
                                echo "active";
                            } ?>">
                                    <i class="fa fa-dashboard"></i>
                                    My Course
                                </a>

                                <a href="<?php echo BASE_URL; ?>pages/student/profile.php" class="list-group-item 
                            <?php if ($pagetitle == "profile") {
                                echo "active";
                            } ?>">
                                    <i class="fa fa-edit"></i>
                                    Profile
                                </a>

                                <a href="<?php echo BASE_URL;?>pages/student/managePassword.php" class="list-group-item 
                            <?php if ($pagetitle == "managePassword") {
                                echo "active";
                            } ?>">
                                    <i class="fa fa-gears"></i>
                                    Manage Password
                                </a>

                                <a href="#" class="list-group-item ">
                                    <i class="fa fa-power-off"></i>
                                    Logout
                                </a>
                            </div>
                            <!-- /.direct-chat-pane -->
                        </div>
                        <!--/.direct-chat -->
                    </nav>
                </div>