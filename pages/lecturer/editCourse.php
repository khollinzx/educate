<?php

$r = 7;
$pagetitle = "home";
require_once($_SERVER["DOCUMENT_ROOT"] . "/educate/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/header.php');

include(ROOT_PATH . 'inc/topnav.php');

include(ROOT_PATH . 'inc/lecturer/menus.php');

// createTable('com442', 'courseId', 'courseCode', 'matname', 'matfile', 'tokenId');
if (isset($_GET["id"]) && isset($_GET["token"])) {

    $id = $_GET["id"];
    $token = $_GET["token"];
}

echo $id;
echo $token;

$rows = select_lecturer('users', 'role_id', $id);

foreach ($rows as $row) {
    $textarea = $row["firstName"];
}
?>
<div class="col-md-9">
    <!-- jQuery Knob -->
    <div class="box box-solid">
        <div class="box-header">
            <i class="fa fa-newspaper-o"></i>

            <h3 class="box-title"><b><?php echo strtoupper("Course Content") ?></b></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-header">
                        <h3 class="box-title "><b>Edit Course Content</b>
                        </h3>
                    </div>
                    <form id="editCourseDetails">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="courseTitle">Course Title</label>
                                <input type="text" class="form-control" id="courseTitle" name="courseTitle">
                            </div>
                            <div class="form-group">
                                <label for="courseTitle">Course Description</label>
                                <textarea id="editDescription" name="editDescription" class="form-control textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                    <?php echo $textarea; ?>
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group col-ms-4 pull-right">
                            <button id="saveUpdate" type="button" class="btn btn-default"> Save Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <script type="text/javascript" src="<?php echo BASE_URL; ?>models/js/editCourse.js"></script>
    <?php

    include(ROOT_PATH . 'inc/footer.php');
    ?>