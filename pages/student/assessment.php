<?php
ini_set('display_errors', 1);
$pagetitle = "Assessment Portal";
require_once($_SERVER["DOCUMENT_ROOT"] . "/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/header.php');


include(ROOT_PATH . 'inc/logindetails.php');

include(ROOT_PATH . 'inc/topnav.php');

// createTable('com442', 'courseId', 'courseCode', 'matname', 'matfile', 'tokenId');
if (isset($_GET["id"]) && isset($_GET["token"])) {

    $token = $_GET["token"];
    $id = $_GET["id"];
}

$values = selectCourseElements('courses', $id, $token);

// var_dump($values);

foreach ($values as $value) {
    $courseTitle = $value["courseTitle"];
    $courseCode = $value["courseCode"];
    $image = $value["image"];
    $duration = $value["duration"];
    $courseId = $value["id"];
    $courseToken = $value["token_id"];
    $textarea = $value["description"];
    $firstName = selectField2("users", "firstName", "id", $value["user_id"]);
    $lastName = selectField2("users", "lastName", "id", $value["user_id"]);
}

$access = selectFieldAccess("courseenrollment", "access", "student_id", $userId, "Course_id", $id);

?>
<!-- Full Width Column -->
<div class="content-wrapper">
    <div class="container">
        <!-- Main content -->
        <section class="content ">
            <div class="row">
                <div class="col-md-12">
                    <!-- jQuery Knob -->
                    <div class="box box-solid">
                        <div class="box-header">
                            <i class="fa fa-letter"></i>

                            <h3 class="box-title"><b><?php echo strtoupper($pagetitle); ?></b></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        <i class="fa fa-book"></i>

                                        <h3 class="box-title"><?php echo strtoupper($courseTitle); ?></h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <dl class="dl-horizontal">
                                            <div class="text-center">
                                                <dt>Instructions</dt>
                                                <dd>Your about to take the assessment for <?php echo strtoupper($courseTitle); ?>.</dd>
                                                <dt>Time</dt>
                                                <dd> 30 Minutes.</dd>
                                                <dt></dt>
                                                <dd> Take Assessment.</dd>
                                                <dt></dt>
                                                <?php if($access == 1) { 
                                                    $output = '';
                                                    $output .='<dd> <input type="hidden" value="<?php echo $courseId; ?>">.</dd>';
                                                    $output .='<dd> <a href="assessmenttest.php?id='.$id.'&token='.$token.'" class="btn btn-primary "> Click Here </a></dd>';
                                                    echo $output;
                                                } else{
                                                    $output = "<dd><b>You've not be granted access to take this assessment</b></dd>";
                                                    echo $output;
                                                }?>
                                            </div>
                                        </dl>

                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <?php
                include(ROOT_PATH . 'inc/footer.php');
                ?>