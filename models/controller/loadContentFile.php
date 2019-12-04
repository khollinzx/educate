<?php
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"] . "/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');


if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$variables = selectField('coursecontent', 'course_id', $id);



foreach ($variables as $key => $value) {
    $output = '<div class="box collapse-box">';
    $output = $output . '<div class="box-header">';
    $output = $output . '<div class="box-tools pull-left">';
    $output = $output . '</div>';
    $output = $output . '<h3 class="box-title"> Chapter '. $value["chapterNo"] .' : ' . $value["materialTitle"] . '</h3>';
    $output = $output . '</div>';
    $output = $output . '<div class="box-body">';
    $output = $output . '<div class="row">';
    $output = $output . '<span class="col-md-8">';
    if ($value["material_type"] == 1) {
        $output = $output . '<p><a href="' . $value["material_link"] . '" target="blank">' . $value["material_link"] . '</a></p>';
    } else if ($value["material_type"] == 2) {
        $output = $output . '<p><a href="' . BASE_URL . "uploads/pdfs/" . $value["material_link"] . '">' . $value["materialTitle"] . '</a></p>';
    }
    $output = $output . '</span>';
    $output = $output . '<span class="col-md-2 pull-right">';
    $output = $output . '<button class="btn btn-xs btn-default"><i class="fa fa-edit"></i></button>';
    $output = $output . '</span>';
    $output = $output . '</div>';
    $output = $output . '</div>';
    $output = $output . '</div>';


    echo $output;
}
