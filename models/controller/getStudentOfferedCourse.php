<?php
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"] . "/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

$record_per_page = 10;

if (isset($_GET["id"])) {
    $studentId = $_GET["id"];
} 

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}

$start_from = ($page - 1) * $record_per_page;

$count = rowCount('courseenrollment');

$variable = selectCourseParticular2('courseenrollment', "student_id", $studentId, $start_from, $record_per_page);

// var_dump($variable);

if ($variable != null) {


    foreach ($variable as $row) {
        $json[] = [
            "id"                       => $row["course_id"],
            "courseCode"               => strtoupper(selectField2('courses', 'courseCode', 'id', $row["course_id"])),
            "courseTitle"              => strtoupper(selectField2('courses', 'courseTitle', 'id', $row["course_id"])),
            "grade"                    => $row["grade"],
        ];
    }

    $data['data'] = $json;


    echo json_encode($data);
} else {
    $json = 'zero';
    $data['data'] = $json;
    echo json_encode($data);
}
