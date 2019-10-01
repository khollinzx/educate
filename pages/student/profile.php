<?php

$r = 7;
$pagetitle = "profile";
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
            <i class="fa fa-user"></i>

            <h3 class="box-title"><b><?php echo strtoupper($pagetitle) ?></b></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-yel">
                            <div class="widget-user-image">
                                <img class="img-circl" src="<?php echo BASE_URL?>assets/dist/img/user7-128x128.jpg" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">Benson Collins</h3>
                            <h5 class="widget-user-desc">Matric No:</h5>
                        </div>
                        <div class="box-footer no-padding">

                        </div>
                        <div class="box collapsed-box pt-5">
                            <div class="box-header">
                                <div class="box-tools pull-left">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <h3 class="box-title"><?php echo strtoupper('Biodata'); ?></h3>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <dl class="dl-horizontal">
                                    <dt>NAME:</dt>
                                    <dd>A description list is perfect for defining terms.</dd>
                                    <dt>MATRIC. NO:</dt>
                                    <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                                    <dt>PROGRAMME TYPE </dt>
                                    <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                                    <dt>SESSION:</dt>
                                    <dd>Fusce dapibus, tellus a</dd>
                                    <dt>YEAR:</dt>
                                    <dd>Fusce dapibus, tellus a</dd>
                                    <dt>DEPARTMENT:</dt>
                                    <dd>Fusce dapibus, tellus a</dd>
                                    <dt>LEVEL:</dt>
                                    <dd>Fusce dapibus, tellus a</dd>
                                </dl>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <div class="box collapsed-box">
                            <div class="box-header">
                                <div class="box-tools pull-left">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <h3 class="box-title"><?php echo strtoupper('My Courses'); ?></h3>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                    <thead>
                                        <tr role="row">
                                            <th>Course Code</th>
                                            <th>Course Name</th>
                                            <th>Unit</th>
                                            <th>Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr role="row" class="odd">
                                            <td>Firefox 1.0</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
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