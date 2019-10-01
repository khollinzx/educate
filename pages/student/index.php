<?php
$pagetitle = "home";
require_once($_SERVER["DOCUMENT_ROOT"] . "/educate/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/header.php');

include(ROOT_PATH . 'inc/topnav.php');

include(ROOT_PATH . 'inc/student/menus.php');
?>
<div class="col-md-9">
  <!-- jQuery Knob -->
  <div class="box box-solid">
    <div class="box-header">
      <i class="fa fa-newspaper-o"></i>

      <h3 class="box-title"><b><?php echo strtoupper('My courses') ?></b></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <a href=""> <img src="<?php echo BASE_URL; ?>assets/dist/img/download.svg" alt="..."></a>
            <div class="caption">
              <h3><b>Psychology</b></h3><span>00:00:00
              </span>
              <p>Duration: <i>3 Months</i> </p>
              <p><a href="<?php echo BASE_URL; ?>pages/student/viewCourse.php" class="btn btn-primary" role="button">View Course</a> </p>
              <p><a href="#" class="btn btn-success" role="button">Take Assessment</a></p>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <img src="<?php echo BASE_URL; ?>assets/dist/img/download.svg" alt="...">
            <div class="caption">
              <h3>Thumbnail label</h3>
              <p>Cras justo odio, dapibus ac facilisis in.</p>
              <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <img src="<?php echo BASE_URL; ?>assets/dist/img/download.svg" alt="...">
            <div class="caption">
              <h3>Thumbnail label</h3>
              <p>Cras justo odio, dapibus ac facilisis in.</p>
              <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
            </div>
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