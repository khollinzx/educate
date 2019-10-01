<?php

$r = 7;
$pagetitle = "settings";
require_once($_SERVER["DOCUMENT_ROOT"] . "/educate/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/header.php');

include(ROOT_PATH . 'inc/topnav.php');

include(ROOT_PATH . 'inc/lecturer/menus.php');

// createTable('com442', 'courseId', 'courseCode', 'matname', 'matfile', 'tokenId');

?>

<div class="col-md-9">
    <!-- jQuery Knob -->
    <div class="box box-solid">
        <div class="box-header">
            <i class="fa fa-user"></i>

            <h3 class="box-title"><b><?php echo strtoupper("manage course") ?></b></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-hover">
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
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<script type="text/javascript" src="<?php echo BASE_URL; ?>models/js/updatePassword.js"></script>
<?php
include(ROOT_PATH . 'inc/footer.php');
?>