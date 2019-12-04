<?php
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"] . "/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

if (isset($_GET["studentId"])) {
    $studentId = $_GET["studentId"];
}

if (isset($_GET["courseId"])) {
    $courseId = $_GET["courseId"];
}



$variable = selectEnrollCount2('courseenrollment', "student_id", "course_id", $studentId, $courseId);

$token_id = selectField2("courses","token_id","id",$courseId);

if($variable == 1) {
    echo "yes";
} else if($variable == 0) {
    $members = new Members();
    $status = 1;

    try {
        $members->create('courseenrollment', array(
            "student_id"            =>    $studentId,
            "course_id"             =>    $courseId,
            "grade"                 =>    "--",
            "status"                =>    $status,
            "token_id"              =>    $token_id,

        ));

        $_POST[] = array();
        echo 'no';
    } catch (Exception $e) {
        die($e->getMessage());
    }
}


