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

                            <a href="<?php echo BASE_URL; ?>pages/admin/index.php" class="list-group-item 
                            <?php if ($pagetitle == "dashboard") {
                                echo "active";
                            } ?>">
                                <i class="fa fa-dashboard"></i>
                                Dashboard
                            </a>

                            <a href="<?php echo BASE_URL; ?>pages/admin/courses.php" class="list-group-item 
                            <?php if ($pagetitle == "courses") {
                                echo "active";
                            } ?>">
                                <i class="fa fa-edit"></i>
                                Courses
                            </a>

                            <a href="#" class="list-group-item ">
                                <i class="fa fa-power-off"></i>
                                Logout
                            </a>
                        </div>
                        <!-- /.direct-chat-pane -->
                    </div>
                    <!--/.direct-chat -->
                </div>