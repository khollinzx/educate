<?php
// ini_set("display_errors", 1);
require_once($_SERVER["DOCUMENT_ROOT"] . "/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');
$id = 5;
$rows = select_lecturer('users', 'role_id', $id);

// var_dump($rows);

$output = '<option value="">~~Select Lecturer~~</option>';

foreach ($rows as $row) {

    $output .= '<option value="' . $row['id'] . '">' . $row['firstName'] . ' ' . $row['lastName'] . '</option>';
}
echo $output;
