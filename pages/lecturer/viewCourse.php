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
    $courseCode = $value["courseCode"];
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
                    <input type="tebox-widgetxt" hidden id="editId" value="<?php echo $courseId; ?>">
                    <input type="text" hidden id="editToken" value="<?php echo $courseToken; ?>">
                    <!-- Widget: user widget style 1 -->
                    <div class="box  widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black" style="background: url('<?php echo BASE_URL; ?>uploads/images/<?php echo $image; ?>') center center no-repeat;">
                            <h3 class="widget-user-username"><b><?php echo strtoupper($courseTitle); ?></b></h3>

                            <span><i><b><?php echo strtoupper($courseCode); ?></b></i></span>
                        </div>
                        <div class=" box-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="margin-bottom:3%;margin-top:3%;" class="box-tools pull-right">
                                        <div class="col-md-2">
                                            <!-- <button type="submit" class="btn btn-tool" data-target="#editCourse" data-toggle="modal"><i class="fa fa-edit"></i>
                                            </button> -->
                                            <button type="submit" class="btn btn-tool" id="editPage"><i class="fa fa-edit"></i>
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
                                                <span class="username col-md-3">
                                                    Duration:
                                                </span><!-- /.username -->
                                                <span class="col-md-7">
                                                    <div>
                                                        <span>
                                                            <?php if ($duration >= 2) {
                                                                echo $duration . " Months";
                                                            } else {
                                                                echo $duration . " Month";
                                                            } ?>
                                                        </span>
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
                                                <span class="col-md-7 col-lg-7" id="viewMaterial">

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
                    <form id="materialValues" role="form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="chapterNo">Chapter</label>
                                    <select type="text" class="form-control" name="chapterNo" id="chapterNo">
                                        <option value="">~~ Select Chapter ~~</option>
                                        <option value="1"> Chapter One </option>
                                        <option value="2"> Chapter Two </option>
                                        <option value="3"> Chapter Three </option>
                                        <option value="4"> Chapter Four </option>
                                        <option value="5"> Chapter Five </option>
                                        <option value="6"> Chapter Six </option>
                                        <option value="7"> Chapter Seven </option>
                                        <option value="8"> Chapter Eight </option>
                                        <option value="9"> Chapter Nine </option>
                                        <option value="10"> Chapter Ten </option>
                                        <option value="11"> Chapter Eleven </option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="filelName">Material Title</label>
                                    <input type="text" class="form-control" name="materialTitle" id="materialTitle" placeholder="ex. Information Technology">
                                    <input type="text" hidden id="courseId" name="courseId" value="<?php echo $courseId; ?>">
                                    <input type="text" hidden id="courseToken" name="courseToken" value="<?php echo $courseToken; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12" id="appendment">


                            </div>
                        </div>
                        <div class="form-group">
                            <div class="radio">
                                <label class="radio-inline">
                                    <input type="radio" name="opt" id="opt1" value="1">
                                    Upload Link
                                </label>
                            </div>
                            <div class="radio">
                                <label class="radio-inline">
                                    <input type="radio" name="opt" id="opt2" value="2">
                                    Upload Material
                                </label>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" id="sendContent" class="btn btn-default">Add Content</button>
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