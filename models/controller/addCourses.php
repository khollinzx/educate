<?php
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"] . "/educate/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

$token_id = Token::generate();

if (Input::exists()) {
    // if(Token::check(Input::get('token'))){
    $validate = new Validation();
    $validation = $validate->check(
        $_POST,
        array(
            "courseTitle"                     => array('required' => true),
            "duration"                 => array('required' => true),
            "assignedLecturer"                 => array('required' => true),
            "img_show"                 => array('required' => true)
        )
    );
    if ($validation->passed()) {

        $members = new Members();
        $status = 0;

        try {
            $members->create('courses', array(
                "courseTitle"                     =>    Input::get('courseTitle'),
                "duration"                 =>    Input::get('duration'),
                "user_id"                 =>    Input::get('assignedLecturer'),
                "image"                 =>    Input::get('img_show'),
                "status"                 =>    $status,
                "token_id"                     =>    $token_id

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
