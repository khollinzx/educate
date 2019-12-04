<?php

$pagetitle = "settings";
require_once($_SERVER["DOCUMENT_ROOT"] . "/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/header.php');

include(ROOT_PATH . 'inc/logindetails.php');

include(ROOT_PATH . 'inc/topnav.php');

include(ROOT_PATH . 'inc/lecturer/menus.php');

if (isset($_GET["id"]) && isset($_GET["token"])) {

    $id = $_GET["id"];
    $token = $_GET["token"];
}

// echo $id;
// echo $token;

$values = selectCourseElements('courses', $id, $token);

foreach ($values as $value) {
    $courseTitle = $value["courseTitle"];
    $image = $value["image"];
    $duration = $value["duration"];
    $courseId = $value["id"];
    $courseToken = $value["token_id"];
    $textarea = $value["description"];
}

?>
<input type="text" id="userId" value="<?php echo $userid; ?>" hidden>
<div class="col-md-9">
    <!-- jQuery Knob -->
    <div class="box box-solid">
        <div class="box-header">
            <i class="fa fa-user"></i>

            <h3 class="box-title"><b><?php echo strtoupper("manage course") ?></b></h3>
        </div>
        <!-- /.box-header -->
        <form id="questions" role="form">
            <div class="box-body">
                <table class="table table-hover">
                    <p>Please enter the Question and Answers Options </p>
                    <thead>
                        <tr role="row">
                            <th class="text-left"> Question: </th> <th class="text-left"><textarea type="text" class="form-control pt-5" id="question" name="question" placeholder="enter the question here"></textarea></th>
                        </tr>
                    </thead>
                    <thead>
                        <tr role="row">
                            <th class="text-left">Option 1: </th>
                            <th class="text-left"><input type="text" class="form-control" id="opt1" name="opt1" placeholder="enter option here"></th>
                        </tr>
                    </thead>
                    <thead>
                        <tr role="row">
                            <th class="text-left">Option 2: </th>
                            <th class="text-left"><input type="text" class="form-control" id="opt2" name="opt2" placeholder="enter options here"></th>
                        </tr>
                    </thead>
                    <thead>
                        <tr role="row">
                            <th class="text-left">Option 3: </th>
                            <th class="text-left"><input type="text" class="form-control" id="opt3" name="opt3" placeholder="enter options here"></th>
                        </tr>
                    </thead>
                    <thead>
                        <tr role="row">
                            <th class="text-left col-md-2">Option 4: </th>
                            <th class="text-left"><input type="text" class="form-control" id="opt4" name="opt4" placeholder="enter options here"></th>
                        </tr>
                    </thead>
                    <thead>
                        <tr role="row">
                            <th class="text-left">Right Answer: </th>
                            <th class="text-left"><input type="text" class="form-control" id="qans" name="qans" placeholder="enter the right answer here"></th>
                        </tr>
                    </thead>
                    <thead class="hidden">
                        <tr role="row">
                            <th class="text-left">Course Id: </th>
                            <th class="text-left"><input type="text" class="form-control" id="cousreId" name="cousreId" placeholder="enter options here" value="<?php echo $courseId; ?>"></th>
                        </tr>
                    </thead>

                </table>

                <div class="form-group col-ms-4 pull-right pt-5">
                    <button id="addQuestion" type="submit" class="btn btn-default"> Save Update</button>
                </div>
            </div>
            <!-- /.box-body -->
        </form>
    </div>
    <!-- /.box -->
</div>
<script type="text/javascript" src="<?php echo BASE_URL; ?>models/js/addQuestion.js"></script>
<?php
include(ROOT_PATH . 'inc/footer.php');
?>