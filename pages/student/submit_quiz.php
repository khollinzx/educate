<?php
ini_set('display_errors', 1);
$pagetitle = "settings";
require_once($_SERVER["DOCUMENT_ROOT"] . "/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/header.php');


include(ROOT_PATH . 'inc/logindetails.php');

include(ROOT_PATH . 'inc/topnav.php');


if (isset($_GET["id"]) && isset($_GET["token"])) {

    $id = $_GET["id"];
    $token = $_GET["token"];
}


$ans = new Members();
$answer = $ans->checkAnswer($_POST, $id);
$value = 0;
$score = $answer['right'] * 2;
$courseId = $id;

update_table('courseenrollment', 'grade', $score, 'student_id', $userId, 'course_id', $courseId);
update_table('courseenrollment', 'access', $value, 'student_id', $userId, 'course_id', $courseId);


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
                    <i class="fa fa-user"></i>

                    <h3 class="box-title"><b><?php echo strtoupper("Submit score") ?></b></h3>
                </div>
                <div class="box-body">
                    <dl class="dl-horizontal" style="margin-left: -150px">
                        <div class="text-center">
                            <dd>
                                <h2> Congratulations </h2>.
                            </dd>
                            <dt></dt>
                            <dd> Click on Submit to end the Test .</dd>
                            <dt></dt>
                            <dd> <a href="<?php echo BASE_URL; ?>logout.php" class="btn btn-primary "> Submit Score </a> </dd>
                        </div>
                    </dl>
                </div>
                <!-- /.box-header -->

    </div>
    <!-- /.box -->
</div>
<!-- <script type="text/javascript" src="<?php echo BASE_URL; ?>models/js/addQuestion.js"></script> -->
<?php
include(ROOT_PATH . 'inc/footer.php');
?>