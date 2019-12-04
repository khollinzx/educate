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

$variable = SelectList2("questions", "course_id", $id);

// var_dump($variable);
// echo $id;
// echo $token;

// $values = selectCourseElements('courses', $id, $token);

// foreach ($values as $value) {
//     $courseTitle = $value["courseTitle"];
//     $image = $value["image"];
//     $duration = $value["duration"];
//     $courseId = $value["id"];
//     $courseToken = $value["token_id"];
//     $textarea = $value["description"];
// }

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

                            <h3 class="box-title"><b><?php echo strtoupper("manage course") ?></b></h3>
                        </div>
                        <!-- /.box-header -->
                        <form id="questions" method="POST" action="submit_quiz.php?id=<?php echo $id; ?>&token=<?php echo $token; ?>" role="form">
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="box box-solid">
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <p><b>Attempt All Questions</b></p>
                                            <!-- <input type="text" style="display:none" name="courseId" value="<?php echo $id; ?>"> -->
                                            <?php $i = 1;
                                            foreach ($variable as $row) { ?>
                                                <table class="table table-bordered" style="margin-top: 5%;">
                                                    <thead>
                                                        <tr class="alert-success ">
                                                            <th><?php echo $i; ?> <?php echo $row["question"]; ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (isset($row["ans1"])) { ?>
                                                            <tr class="alert-warning">
                                                                <td>A. <input type="radio" value="0" name="<?php echo $row["id"]; ?>"> <?php echo $row["ans1"]; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                        <?php if (isset($row["ans2"])) { ?>
                                                            <tr class="alert-warning">
                                                                <td>B. <input type="radio" value="1" name="<?php echo $row["id"]; ?>"> <?php echo $row["ans2"]; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                        <?php if (isset($row["ans3"])) { ?>
                                                            <tr class="alert-warning">
                                                                <td>C. <input type="radio" value="2" name="<?php echo $row["id"]; ?>"> <?php echo $row["ans3"]; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                        <?php if (isset($row["ans4"])) { ?>
                                                            <tr class="alert-warning">
                                                                <td>D. <input type="radio" value="3" name="<?php echo $row["id"]; ?>"> <?php echo $row["ans4"]; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                        <tr class="">
                                                            <td><input type="radio" checked="checked" style="display:none" value="no_attempt" name="<?php echo $row["id"]; ?>"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            <?php $i++;
                                            } ?>
                                            <div class="form-group col-ms-4 text-center pt-5">
                                                <!-- <button id="addQuestion" type="submit" class="btn btn-success"> Submit </button> -->
                                                <input type="submit" value="Submit Answer" class="btn btn-success">
                                            </div>
                                        </div>
                                        <!-- /.box-body -->

                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <script type="text/javascript" src="<?php echo BASE_URL; ?>models/js/addQuestion.js"></script>
                <?php
                include(ROOT_PATH . 'inc/footer.php');
                ?>