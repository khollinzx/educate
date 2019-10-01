<?php

$r = 7;
$pagetitle = "courses";
require_once($_SERVER["DOCUMENT_ROOT"] . "/educate/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/header.php');

include(ROOT_PATH . 'inc/topnav.php');

include(ROOT_PATH . 'inc/admin/menus.php');

// createTable('com442', 'courseId', 'courseCode', 'matname', 'matfile', 'tokenId');
// if (isset($_GET["tokenId"]) && isset($_GET["id"])) {

//     $Number = $_GET["tokenId"];
//     $key = $_GET["id"];
// }
// echo $Number;
// echo $key;
?>

<div class="col-md-9">
    <!-- jQuery Knob -->
    <div class="box box-solid">
        <div class="box-header">
            <i class="fa fa-newspaper-o"></i>

            <h3 class="box-title"><b><?php echo strtoupper($pagetitle) ?></b></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black" style="background: url('../assets/dist/img/photo1.png') center center;">
                            <h3 class="widget-user-username"><b>Psychology</b></h3>
                            <span><i>Course Code</i></span>
                        </div>
                        <div class="box-footer">
                            <div class="col-md-12">
                                <div class="box-footer box-comments">
                                    <div class="box-comment">

                                        <div class="comment-text row">
                                            <span class="username col-md-3">
                                                Description:
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
                                                Duration:
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
                                                Assigned Lecturer:
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
                                                No. of Enrolled Student:
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

                    </div>
                    <!-- /.widget-user -->
                </div>

            </div>

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<?php
include(ROOT_PATH . 'inc/footer.php');
?>