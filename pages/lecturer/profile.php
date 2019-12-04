<?php

$r = 7;
$pagetitle = "profile";
require_once($_SERVER["DOCUMENT_ROOT"] . "/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/header.php');

include(ROOT_PATH . 'inc/logindetails.php');

include(ROOT_PATH . 'inc/topnav.php');

include(ROOT_PATH . 'inc/lecturer/menus.php');

// createTable('com442', 'courseId', 'courseCode', 'matname', 'matfile', 'tokenId');

?>

<div class="col-md-9">
    <!-- jQuery Knob -->
    <div class="box box-solid">
        <div class="box-header">
            <i class="fa fa-user"></i>

            <h3 class="box-title"><b><?php echo strtoupper($pagetitle) ?></b></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="box-footer box-comments">
                        <div class="box-">

                            <div class="comment-text row">
                                <span class="username col-md-3">
                                    FIRSTNAME:
                                </span><!-- /.username -->
                                <span class="col-md-9">
                                    It is a long established fact that a reader will be distracted
                                    by the readable content of a page when looking at its layout.
                                </span>
                            </div>
                            <!-- /.comment-text -->
                        </div>
                        <div class="box-comment">

                            <div class="comment-text row">
                                <span class="username col-md-3">
                                    LASTNAME:
                                </span><!-- /.username -->
                                <span class="col-md-9">
                                    It is a long established fact that a reader will be distracted
                                    by the readable content of a page when looking at its layout.
                                </span>
                            </div>
                            <!-- /.comment-text -->
                        </div>
                        <div class="box-comment">

                            <div class="comment-text row">
                                <span class="username col-md-3">
                                    EMAIL:
                                </span><!-- /.username -->
                                <span class="col-md-9">
                                    It is a long established fact that a reader will be distracted
                                    by the readable content of a page when looking at its layout.
                                </span>
                            </div>
                            <!-- /.comment-text -->
                        </div>
                        <div class="box-comment">

                            <div class="comment-text row">
                                <span class="username col-md-3">
                                    PHONE NUMBER:
                                </span><!-- /.username -->
                                <span class="col-md-9">
                                    It is a long established fact that a reader will be distracted
                                    by the readable content of a page when looking at its layout.
                                </span>
                            </div>
                            <!-- /.comment-text -->
                        </div>

                    </div>
                    <!-- /.row -->
                </div>
                <div class="col-md-2">
                    <!-- Profile Image -->
                    <div class="">
                        <div class="">
                            <img style="height:120px; width:1500px" class="profile-user-img img-responsive" src="<?php echo BASE_URL; ?>assets/dist/img/user4-128x128.jpg" alt="User profile picture">

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<?php
include(ROOT_PATH . 'inc/footer.php');
?>