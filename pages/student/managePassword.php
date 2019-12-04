<?php
ini_set('display_errors', 1);
$pagetitle = "managePassword";
require_once($_SERVER["DOCUMENT_ROOT"] . "/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/header.php');


include(ROOT_PATH . 'inc/logindetails.php');

include(ROOT_PATH . 'inc/topnav.php');

include(ROOT_PATH . 'inc/student/menus.php');

// createTable('com442', 'courseId', 'courseCode', 'matname', 'matfile', 'tokenId');

?>

<div class="col-md-9">
    <!-- jQuery Knob -->
    <div class="box box-solid">
        <div class="box-header">
            <i class="fa fa-user"></i>

            <h3 class="box-title"><b><?php echo strtoupper("password settings") ?></b></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form action="">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-group-sm">
                            <input type="password" class="form-control" id="newPass" name="newPassword" placeholder="New Password"><span class="input-group-btn">
                                <button id="eyeslash" type="button" class="btn btn-default btn-flat"><i class="fa fa-eye-slash"></i> </button>
                                <button id="eye" type="button" class="btn btn-default btn-flat"><i class="fa fa-eye"></i> </button>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-sm">
                            <input type="password" class="form-control" id="conPass" name="confirmPassword" placeholder="Confrim Password"><span class="input-group-btn">
                                <button id="eyeslash2" type="button" class="btn btn-default btn-flat"><i class="fa fa-eye-slash"></i> </button>
                                <button id="eye2" type="button" class="btn btn-default btn-flat"><i class="fa fa-eye"></i> </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="modal-footer">
                        <button type="submit" id="send" class="btn btn-default">Update Password</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<script type="text/javascript" src="<?php echo BASE_URL; ?>models/js/updatePassword.js"></script>
<?php
include(ROOT_PATH . 'inc/footer.php');
?>