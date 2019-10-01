<?php
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"] . "/educate/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');


if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
    $name1 = selectField('courses', 'description', 'id', $id);

    echo $name1;
