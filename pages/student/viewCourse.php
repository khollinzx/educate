<?php

$r = 7;
$pagetitle = "view course";
require_once($_SERVER["DOCUMENT_ROOT"] . "/educate/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/header.php');

include(ROOT_PATH . 'inc/topnav.php');

include(ROOT_PATH . 'inc/student/menus.php');

// createTable('com442', 'courseId', 'courseCode', 'matname', 'matfile', 'tokenId');

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
                        <input type="text" name="editId" id="editId" hidden value="<?php echo '1'; ?>">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black" style="background: url('<?php echo BASE_URL; ?>assets/dist/img/photo1.png') center center;">
                            <h3 class="widget-user-username"><b>Psychology</b></h3>

                            <span><i>Duration</i></span>
                        </div>
                        <div class=" box-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="margin-bottom:3%;margin-top:3%;" class="box-tools pull-right">
                                        
                                    </div>
                                    <div class="box-footer box-comments">
                                        <div class="box-comment">

                                            <div class="comment-text row">
                                                <span class="username col-md-3">
                                                    Description:
                                                </span><!-- /.username -->
                                                <span class="col-md-7">
                                                    It is a long established fact that a reader will be distracted
                                                    by the readable content of a page when looking at its layout.
                                                </span>
                                            </div>
                                            <!-- /.comment-text -->
                                        </div>
                                        <!-- /.comment-text -->
                                    </div>
                                </div>

                            </div>
                            <div class="row" style="margin-top:3%;">
                                <div class="col-md-12">
                                    <div style="margin-bottom:3%;margin-top:3%;" class="box-tools pull-right">
                                        
                                    </div>
                                    <div class="box-footer box-comments">
                                        <div class="box-comment">

                                            <div class="comment-text row">
                                                <span class="username col-md-3">
                                                    Course Materials:
                                                </span><!-- /.username -->
                                                <span class="col-md-7 col-lg-6">
                                                    <?php
                                                    for ($k = 1; $k <= $r; $k++) {
                                                        echo '<div class="box collapsed-box">
                                                        <div class="box-header">
                                                            <div class="box-tools pull-left">
                                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                            <h3 class="box-title">Topic ' . $k . ': Introduction to Psychology</h3>
                                                            <!-- /.box-tools -->
                                                        </div>
                                                        <!-- /.box-header -->
                                                        <div class="box-body">
                                                            <div class="row">
                                                                <span class="col-md-8">
                                                                    <p><a href="#">materials name</a></p>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- /.box-body -->
                                                    </div>';
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                            <!-- /.comment-text -->
                                        </div>
                                        <!-- /.comment-text -->
                                    </div>



                                </div>
                            </div>
                            <!-- /.row -->

                        </div>
                        <!-- /.widget-user -->
                    </div>

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