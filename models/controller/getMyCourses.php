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

$variable = selectCourseParticular3('courseenrollment', "student_id", "status", $studentId, 1, $start_from, $record_per_page);

// var_dump($variable);

if ($variable != null) {


    foreach ($variable as $row) {
        $json[] = [
            "id"                         => $row["course_id"],
            "courseTitle"                => substr(strtoupper(selectField2('courses', 'courseTitle', 'id', $row["course_id"])),0,10)."...",
            "image"                      => selectField2('courses', 'image', 'id', $row["course_id"]),
            "status"                      => selectField2('courses', 'status', 'id', $row["course_id"]),
            "tokenId"                    => $row["token_id"],
        ];
    }

    $data['data'] = $json;


    echo json_encode($data);
} else {
    $json = 'zero';
    $data['data'] = $json;
    echo json_encode($data);
}
