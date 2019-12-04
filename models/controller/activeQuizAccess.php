<?php
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"] . "/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

if (isset($_GET["courseId"])) {

    $id = $_GET["courseId"];

    $members = new Members();

    $value = 1;

    try {
        $members->update('courseenrollment', 'id', $id, array(

            "access"                =>    $value
        ));

        $_POST[] = array();

        echo 'okay';
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
