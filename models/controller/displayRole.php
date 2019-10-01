<?php
ini_set("display_errors", 1);
require_once($_SERVER["DOCUMENT_ROOT"] . "/educate/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

$rows = select_all_asc('roles');

$output = '<option value="">~~Select User Role~~</option>';

foreach ($rows as $row) {

    $output .= '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
}
echo $output;

?>