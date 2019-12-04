<?php
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"] . "/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

$token_id = Token::generate();

if (Input::exists()) {
    // if(Token::check(Input::get('token'))){
    $validate = new Validation();
    $validation = $validate->check(
        $_POST,
        array(
            "chapterNo"                     => array('required' => true),
            "materialTitle"                     => array('required' => true),
            "courseId"                 => array('required' => true),
            "opt"                 => array('required' => true),
            "materialContent"                 => array('required' => true)
        )
    );
    if ($validation->passed()) {

        $members = new Members();

        try {
            $members->create('coursecontent', array(
                "chapterNo"                     =>    Input::get('chapterNo'),
                "materialTitle"                     =>    Input::get('materialTitle'),
                "course_id"                 =>    Input::get('courseId'),
                "material_link"                 =>    Input::get('materialContent'),
                "material_type"                 =>    Input::get('opt'),
                "token_id"                      => $token_id

            ));

            $_POST[] = array();
            echo 'created';
        } catch (Exception $e) {
            die($e->getMessage());
        }
    } else {
        foreach ($validation->errors() as $error) {
            echo $error, "<br>";
            $_POST[] = array();
        }
    }
    // }
} else {
    echo "no input found";
}
