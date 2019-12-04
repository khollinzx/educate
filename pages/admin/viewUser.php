<?php

$r = 7;
$pagetitle = "dashboard";
require_once($_SERVER["DOCUMENT_ROOT"] . "/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/header.php');

include(ROOT_PATH . 'inc/topnav.php');

include(ROOT_PATH . 'inc/admin/menus.php');

// createTable('com442', 'courseId', 'courseCode', 'matname', 'matfile', 'tokenId');
if (isset($_GET["tokenId"]) && isset($_GET["id"])) {

    $tokenId = $_GET["tokenId"];
    $key = $_GET["id"];
}
// echo $Number;
// echo $key;
$variable = SelectList("users", "token_Id", $tokenId);

foreach ($variable as $value) {
    $firstName = $value["firstName"];
    $lastName = $value["lastName"];
    $email = $value["email"];
    $phoneNo = $value["phoneNumber"];
    $Role = selectField2("roles", "name", "id", $value["role_id"]);
}
?>

<div class="col-md-9">
    <!-- jQuery Knob -->
    <div class="box box-solid">
        <div class="box-header">
            <i class="fa fa-newspaper-o"></i>

            <h3 class="box-title"><b><?php echo strtoupper("PROFILE DETAILS") ?></b></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="box-footer box-comments">
                        <div class="box-">

                            <div class="comment-text row">
                                <span class="username col-md-3">
                                    FIRSTNAME:
                                </span><!-- /.username -->
                                <span class="col-md-9">
                                    <?php echo $firstName; ?>
                                </span>
                            </div>
                            <!-- /.comment-text -->
                        </div>
                        <div class="box-comment">

                            <div class="comment-text row">
                                <span class="username col-md-3">
                                    LASTNAME:
                                </span><!-- /.username -->
                                <span class="col-md-9">
                                    <?php echo $lastName; ?>
                                </span>
                            </div>
                            <!-- /.comment-text -->
                        </div>
                        <div class="box-comment">

                            <div class="comment-text row">
                                <span class="username col-md-3">
                                    EMAIL:
                                </span><!-- /.username -->
                                <span class="col-md-9">
                                    <?php echo $email; ?>
                                </span>
                            </div>
                            <!-- /.comment-text -->
                        </div>
                        <div class="box-comment">

                            <div class="comment-text row">
                                <span class="username col-md-3">
                                    PHONE NUMBER:
                                </span><!-- /.username -->
                                <span class="col-md-9">
                                    <?php echo $Role; ?>
                                </span>
                            </div>
                            <!-- /.comment-text -->
                        </div>
                        <div class="box-comment">

                            <div class="comment-text row">
                                <span class="username col-md-3">
                                    PHONE NUMBER:
                                </span><!-- /.username -->
                                <span class="col-md-9">
                                    <?php echo $phoneNo; ?>
                                </span>
                            </div>
                            <!-- /.comment-text -->
                        </div>

                    </div>
                    <!-- /.row -->
                </div>
                <div class="col-md-2">
                    <!-- Profile Image -->
                    <div class="">
                        <div class="">
                            <img style="height:120px; width:1500px" class="profile-user-img img-responsive" src="<?php echo BASE_URL; ?>assets/dist/img/user4-128x128.jpg" alt="User profile picture">

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