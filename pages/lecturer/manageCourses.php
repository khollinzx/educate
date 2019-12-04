<?php

$userid = 4;
$pagetitle = "settings";
require_once($_SERVER["DOCUMENT_ROOT"] . "/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/header.php');

include(ROOT_PATH . 'inc/logindetails.php');

include(ROOT_PATH . 'inc/topnav.php');

include(ROOT_PATH . 'inc/lecturer/menus.php');

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
        <div class="box-body">
            <table class="table table-hover">
                <thead>
                    <tr role="row">
                        <th class="text-left">S/N</th>
                        <th class="text-left">Course Title</th>
                        <th class="text-left">Duration</th>
                        <th class="text-left">Lecture Name</th>
                        <th class="text-left">Status</th>
                        <th class="text-left">Actions</th>
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
<script type="text/javascript" src="<?php echo BASE_URL; ?>models/js/manageCourses.js"></script>
<?php
include(ROOT_PATH . 'inc/footer.php');
?>