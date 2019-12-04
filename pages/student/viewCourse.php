<?php
ini_set('display_errors', 1);
$pagetitle = "view course";
require_once($_SERVER["DOCUMENT_ROOT"] . "/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/header.php');


include(ROOT_PATH . 'inc/logindetails.php');

include(ROOT_PATH . 'inc/topnav.php');

include(ROOT_PATH . 'inc/student/menus.php');

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
    $firstName = selectField2("users","firstName", "id", $value["user_id"]);
    $lastName = selectField2("users", "lastName", "id", $value["user_id"]);
}


$courseMaterial = selectList("coursecontent", "course_id", $courseId);

// var_dump($courseMaterial);

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
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black" style="background: url('<?php echo BASE_URL; ?>uploads/images/<?php echo $image; ?>') center center no-repeat;">
                            <h3 class="widget-user-username"><b><?php echo strtoupper($courseTitle); ?></b></h3>

                            <span><i><?php echo strtoupper($courseCode); ?></i></span>
                        </div>
                        <div class=" box-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="margin-bottom:3%;margin-top:3%;" class="box-tools pull-right">

                                    </div>
                                    <div class="box-footer box-comments">
                                        <div class="box-comment">

                                            <div class="comment-text row">
                                                <span class="username col-md-3">
                                                    Description:
                                                </span><!-- /.username -->
                                                <span class="col-md-7">
                                                    <?php echo $textarea; ?>
                                                </span>
                                            </div>
                                            <!-- /.comment-text -->
                                        </div>
                                        <!-- /.comment-text -->
                                    </div>

                                    <div class="box-footer box-comments">
                                        <div class="box-comment">

                                            <div class="comment-text row">
                                                <span class="username col-md-3">
                                                    Lecturer Name:
                                                </span><!-- /.username -->
                                                <span class="col-md-7">
                                                    <?php echo $firstName." ".$lastName; ?>
                                                </span>
                                            </div>
                                            <!-- /.comment-text -->
                                        </div>
                                        <!-- /.comment-text -->
                                    </div>

                                    <div class="box-footer box-comments">
                                        <div class="box-comment">

                                            <div class="comment-text row">
                                                <span class="username col-md-3">
                                                    Duration:
                                                </span><!-- /.username -->
                                                <span class="col-md-7">
                                                    <?php if($duration >= 2){
                                                        echo $duration." Months";
                                                     }else {
                                                        echo $duration." Month";
                                                     } ?>
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

                                    </div>
                                    <div class="box-footer box-comments">
                                        <div class="box-comment">

                                            <div class="comment-text row">
                                                <span class="username col-md-3">
                                                    Course Materials:
                                                </span><!-- /.username -->
                                                <span class="col-md-7 col-lg-8">
                                                    <?php
                                                        foreach ($courseMaterial as $key => $list) {
                                                            $output = '<div class="box collapse-box collapsed-box">';
                                                            $output = $output . '<div class="box-header">';
                                                            $output = $output . '<div class="box-tools pull-left">';
                                                            $output = $output . '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>';
                                                            $output = $output . '</button>';
                                                            $output = $output . '</div>';
                                                            $output = $output . '<h3 class="box-title"> Chapter '. $list["chapterNo"] .' : ' . $list["materialTitle"] . '</h3>';
                                                            $output = $output . '</div>';
                                                            $output = $output . '<div class="box-body">';
                                                            $output = $output . '<div class="row">';
                                                            $output = $output . '<span class="col-md-8">';
                                                            if ($list["material_type"] == 1) {
                                                                $output = $output . '<p><a href="' . $list["material_link"] . '" target="blank">' . $list["material_link"] . '</a></p>';
                                                            } else if ($list["material_type"] == 2) {
                                                                $output = $output . '<p><a href="' . BASE_URL . "uploads/pdfs/" . $list["material_link"] . '" target="blank">' . $list["materialTitle"] . '</a></p>';
                                                            }
                                                            $output = $output . '</span>';
                                                            $output = $output . '</div>';
                                                            $output = $output . '</div>';
                                                            $output = $output . '</div>';

                                                            echo $output;
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

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<?php
include(ROOT_PATH . 'inc/footer.php');
?>