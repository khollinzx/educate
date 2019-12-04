<?php

$r = 7;
$pagetitle = "home";
require_once($_SERVER["DOCUMENT_ROOT"] . "/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/header.php');

include(ROOT_PATH . 'inc/logindetails.php');

include(ROOT_PATH . 'inc/topnav.php');

include(ROOT_PATH . 'inc/lecturer/menus.php');

// createTable('com442', 'courseId', 'courseCode', 'matname', 'matfile', 'tokenId');
if (isset($_GET["id"]) && isset($_GET["token"])) {

    $Number = $_GET["token"];
    $key = $_GET["id"];
}

$values = selectCourseElements('courses', $key, $Number);

// var_dump($values);

foreach ($values as $value) {
    $courseTitle = $value["courseTitle"];
    $image = $value["image"];
    $duration = $value["duration"];
    $courseId = $value["id"];
    $courseToken = $value["token_id"];
    $textarea = $value["description"];
}

?>

<div class="col-md-9">
    <!-- jQuery Knob -->
    <div class="box box-solid">
        <div class="box-header">
            <i class="fa fa-newspaper-o"></i>

            <h3 class="box-title"><b><?php echo strtoupper("List of Student Enrolled") ?></b></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <input type="tebox-widgetxt" hidden id="editId" value="<?php echo $courseId; ?>">
                    <input type="text" hidden id="editToken" value="<?php echo $courseToken; ?>">
                    <!-- Widget: user widget style 1 -->
                    <div class="box  widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black" style="background: url('<?php echo BASE_URL; ?>uploads/images/<?php echo $image; ?>') center center no-repeat;">
                            <h3 class="widget-user-username"><b><?php echo strtoupper($courseTitle); ?></b></h3>

                            <span><i><?php echo $duration; ?></i></span>
                        </div>
                        <div class=" box-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="margin-bottom:3%;margin-top:3%;" class="box-tools pull-right">
                                    </div>
                                    <div class="box-footer box-comments">
                                        <div class="box-comment">

                                            <div class="comment-text row">
                                                <span class="username col-md-12">
                                                    List of Enrolled Student:
                                                </span><!-- /.username -->
                                                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th> S/N </th>
                                                            <th> First Name</th>
                                                            <th> Last Name</th>
                                                            <th> Grade (100)</th>
                                                            <th> Access</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="loadEnrolledStudent">

                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.comment-text -->
                                        </div>
                                        <!-- /.comment-text -->

                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- /.widget-user -->
                    </div>

                </div>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <script type="text/javascript" src="<?php echo BASE_URL; ?>models/js/enrolledStudent.js"></script>
        <?php
        include(ROOT_PATH . 'inc/footer.php');
        ?>