<?php
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"] . "/educate/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

if ($_FILES["pdf_file"]["name"] != '') {
	$test = explode(".", $_FILES["pdf_file"]["name"]);
	$extension = end($test);
	$name = $_FILES["pdf_file"]["name"];
	$location = ROOT_PATH ."uploads/pdfs/".$name;
	move_uploaded_file($_FILES["pdf_file"]["tmp_name"], $location);
}

