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
            "firstName"                     => array('required' => true),
            "lastName"                 => array('required' => true),
            "email"                 => array('required' => true),
            "phoneNumber"                 => array('required' => true),
            "userRole"                         => array('required' => true)
        )
    );
    if ($validation->passed()) {

        $members = new Members();

        $password = "password";
        $salt = Hash::salt(32);


        try {
            $members->create('users', array(
                "firstName"                     =>    Input::get('firstName'),
                "lastName"                 =>    Input::get('lastName'),
                "email"                 =>    Input::get('email'),
                "phoneNumber"                 =>    Input::get('phoneNumber'),
                "role_id"                 =>    Input::get('userRole'),
                "password"                     =>    Hash::make($password, $salt),
                "salt"                         =>    $salt,
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
