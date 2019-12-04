<?php
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"] . "/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

$record_per_page = 10;

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}

$start_from = ($page - 1) * $record_per_page;

$count = rowCount('courses');

$variable = select_all_active_courses('courses', $start_from, $record_per_page);

// var_dump($variable);


if ($variable != null) {


    foreach ($variable as $row) {
        $json[] = [
            "id"                         => $row["id"],
            "courseTitle"                => substr(strtoupper($row["courseTitle"]),0,9,)."...",
            "image"                      => $row["image"],
            "status"                      => $row["status"],
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
