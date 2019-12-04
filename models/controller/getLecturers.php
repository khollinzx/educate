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


$variable = selectList('users', 'role_id', 5);


if ($variable != null) {


    foreach ($variable as $row) {
        // for ($i=1; $i <= $count; $i++) {
        $json[] = [
            // "serial_no"                        =>$i,
            "id"                     => $row["id"],
            "firstName"              => $row["firstName"],
            "lastName"               => $row["lastName"],
            "email"                  => $row["email"],
            "phoneNumber"            => $row["phoneNumber"],
            "tokenId"                => $row["token_id"],
        ];
        // }

    }

    $data['data'] = $json;


    echo json_encode($data);
} else {
    $json = 'zero';
    $data['data'] = $json;
    echo json_encode($data);
}
