<?php
$pagetitle = "home";
require_once($_SERVER["DOCUMENT_ROOT"] . "/educate/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/header.php');

include(ROOT_PATH . 'inc/topnav.php');

include(ROOT_PATH . 'inc/lecturer/menus.php');
$testId = 4;
?>
<div class="col-md-9">
  <!-- jQuery Knob -->
  <div class="box box-solid">
    <div class="box-header">
      <i class="fa fa-newspaper-o"></i>

      <h3 class="box-title"><b><?php echo strtoupper('assigned courses') ?></b></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <input type="text" hidden id="lecturerId" value="<?php echo $testId; ?>">
      <div class="row" id="coursePlate">




      </div>

    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
<script type="text/javascript" src="<?php echo BASE_URL; ?>models/js/lecturerIndex.js"></script>
<?php
include(ROOT_PATH . 'inc/footer.php');
?>