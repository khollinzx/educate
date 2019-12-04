<?php
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"] . "/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');



$variable = select_parts('courses');

$rows=array();
foreach ($variable as $row) {
    $rows[] = $row["id"];
    $rows[] .= $row["courseTitle"];
    $rows[] .= $row["duration"];
}

echo json_encode($rows);

?>
