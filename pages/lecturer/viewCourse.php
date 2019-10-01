<?php

$r = 7;
$pagetitle = "view course";
require_once($_SERVER["DOCUMENT_ROOT"] . "/educate/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/header.php');

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

            <h3 class="box-title"><b><?php echo strtoupper($pagetitle) ?></b></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <input type="text" id="editId" value="<?php echo $courseId; ?>">
                    <input type="text" hidden id="editToken" value="<?php echo $courseToken; ?>">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black" style="background: url('<?php echo BASE_URL; ?>uploads/images/<?php echo $image; ?>') center center no-repeat;">
                            <h3 class="widget-user-username"><b><?php echo strtoupper($courseTitle); ?></b></h3>

                            <span><i><?php echo $duration; ?></i></span>
                        </div>
                        <div class=" box-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="margin-bottom:3%;margin-top:3%;" class="box-tools pull-right">
                                        <div class="col-md-2">
                                            <button class="btn btn-tool" data-target="#editCourse" data-toggle="modal"><i class="fa fa-edit"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="box-footer box-comments">
                                        <div class="box-comment">

                                            <div class="comment-text row">
                                                <span class="username col-md-3">
                                                    Description:
                                                </span><!-- /.username -->
                                                <span class="col-md-7">
                                                    <div id="loadDescription">

                                                    </div>
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
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-tool" data-target="#addMaterial" data-toggle="modal"><i class="fa fa-plus"></i>
                                            </button>
                                        </div>
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
                                                                <span class="col-md-2 pull-right">
                                                                    <button class="btn btn-xs btn-default"><i class="fa fa-edit"></i></button>
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
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div id="addMaterial" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Add Material/ Content</h4>
                </div>
                <div class="modal-body">
                    <form id="createUser" role="form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstName">Material Title</label>
                                    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Enter First Name">
                                    <input type="text" value="<?php echo $courseId; ?>">
                                    <input type="text" value="<?php echo $courseToken; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12" id="appendment">


                            </div>
                        </div>
                        <div class="form-group">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="opt" id="opt1" value="0">
                                    Upload Link
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="opt" id="opt2" value="1">
                                    Upload Material
                                </label>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" id="send" class="btn btn-default">Add Content</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="editCourse" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Add Course Description</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-header">
                                <h3 class="box-title "><b>Edit Course Description</b>
                                </h3>
                            </div>
                            <form id="editCourseDetails">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="courseTitle">Course Title</label>
                                        <input type="text" class="form-control" id="courseTitle" name="courseTitle" value="<?php echo $courseTitle; ?>">
                                        <input type="text" hidden id="courseId" name="courseId" value="<?php echo $courseId; ?>">
                                        <input type="text" hidden id="courseToken" name="courseToken" value="<?php echo $courseToken; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="courseTitle">Course Description</label>
                                        <textarea id="editDescription" name="editDescription" class="form-control textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                        </textarea>
                                        <input type="text" id="txtinput">
                                    </div>
                                </div>

                                <div class="form-group col-ms-4 pull-right">
                                    <button id="saveUpdate" type="submit" class="btn btn-default"> Save Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script type="text/javascript" src="<?php echo BASE_URL; ?>models/js/viewCourse.js"></script>
    <?php
    include(ROOT_PATH . 'inc/footer.php');
    ?>