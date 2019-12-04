<?php

$r = 7;
$pagetitle = "courses";
require_once($_SERVER["DOCUMENT_ROOT"] . "/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/header.php');

include(ROOT_PATH . 'inc/topnav.php');

include(ROOT_PATH . 'inc/admin/menus.php');

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
                    <div class="box-header">
                        <h3 class="box-title"><b><?php echo strtoupper('List of courses') ?></b></h3>

                        <button type="button" class="btn btn-default btn-sm pull-right" data-target="#addCourse" data-toggle="modal">
                            <i class="fa fa-users"></i> Add Course
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table id="listTable" class="table table-bordered table-hover" role="grid" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th class="text-center">Course Title</th>
                                    <th class="text-center">Duration</th>
                                    <th class="text-center">Lecture</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="courseTableContent">

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>


<div id="addCourse" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Create Course</h4>
            </div>
            <div class="modal-body">
                <form id="addCourses" role="form">

                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <span id="msg">
                        </span>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="courseTitle">Course Title</label>
                                <input type="text" class="form-control" name="courseTitle" id="courseTitle" placeholder="Enter First Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="duration">Duration</label>
                                <select type="text" class="form-control" name="duration" id="duration">
                                    <option value="">~~Select Duration~~</option>
                                    <option value="1">One Month</option>
                                    <option value="2">Two Month</option>
                                    <option value="3">Three Month</option>
                                    <option value="4">Four Month</option>
                                    <option value="5">Five Month</option>
                                    <option value="6">Six Month</option>
                                    <option value="7">Seven Month</option>
                                    <option value="8">Eight Month</option>
                                    <option value="9">Nine Month</option>
                                    <option value="10">Ten Month</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="assignedLecturer">Assign a Lecturer</label>
                                <select class="form-control" name="assignedLecturer" id="assignedLecturer">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="courseCode">Course Code</label>
                                <input type="text" class="form-control" name="courseCode" id="courseCode" placeholder="ex: KSM212">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="img_file" class="btn btn-primary "><i class="fa fa-upload"> </i> Upload Photo</label>
                                <input style="display:none" type="file" id="img_file" name="img_file"><br />
                                <i style="color:red">Image is Require *</i>
                                <input type="text" id="img_show" name="img_show" hidden>
                            </div>
                        </div>
                    </div>

                    <div id="profileContent">

                    </div>


                    <div class="modal-footer">
                        <button type="submit" id="send" class="btn btn-primary">Create User</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript" src="<?php echo BASE_URL; ?>models/js/course.js"></script>
<?php
include(ROOT_PATH . 'inc/footer.php');
?>