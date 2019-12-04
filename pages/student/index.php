<?php
ini_set('display_errors', 1);
$pagetitle = "home";
require_once($_SERVER["DOCUMENT_ROOT"] . "/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/header.php');


include(ROOT_PATH . 'inc/logindetails.php');

include(ROOT_PATH . 'inc/topnav.php');

include(ROOT_PATH . 'inc/student/menus.php');

// $variable = selectItem('courseenrollment', "course_id", $studentId);

// var_dump($variable);
?>

<div class="col-md-9">
  <!-- jQuery Knob -->
  <div class="box box-solid">
    <div class="box-header">
      <i class="fa fa-newspaper-o"></i>
      <h3 class="box-title"><b><?php echo strtoupper('My courses') ?></b> </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row" id="myCourses">

      </div>

    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
<script type="text/javascript" src="<?php echo BASE_URL; ?>models/js/studentIndex.js"></script>
<?php
include(ROOT_PATH . 'inc/footer.php');
?>