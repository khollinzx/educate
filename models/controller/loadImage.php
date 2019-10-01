<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/educate/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

if ($_FILES["img_file"]["name"] != '') {
	$test = explode(".", $_FILES["img_file"]["name"]);
	$extension = end($test);
	$name = $_FILES["img_file"]["name"];
	$location = ROOT_PATH ."uploads/images/".$name;
	move_uploaded_file($_FILES["img_file"]["tmp_name"], $location);
	echo "<img src='".BASE_URL."uploads/images/".$name."' height='150' width='300' class='img-thumbnail'>";
}
