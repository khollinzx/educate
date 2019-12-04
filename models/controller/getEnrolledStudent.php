<?php
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"] . "/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

$record_per_page = 10;

if (isset($_GET["id"])) {
    $courseId = $_GET["id"];
}

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}

$start_from = ($page - 1) * $record_per_page;

$count = rowCount('courseenrollment');

$variable = selectCourseParticular2('courseenrollment', "course_id", $courseId, $start_from, $record_per_page);

// var_dump($variable);

if ($variable != null) {
    $i = 1;

    foreach ($variable as $row) {
        $json[] = [
            "i"                        => $i,
            "id"                       => $row["course_id"],
            "firstName"               => strtoupper(selectField2('users', 'firstName', 'id', $row["student_id"])),
            "lastName"              => strtoupper(selectField2('users', 'lastName', 'id', $row["student_id"])),
            "access"                    => $row["access"],
            "grade"                    => $row["grade"],
        ];
        $i++;
    }


    $data['data'] = $json;


    echo json_encode($data);
} else {
    $json = 'zero';
    $data['data'] = $json;
    echo json_encode($data);
}
