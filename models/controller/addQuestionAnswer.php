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
            "question"                     => array('required' => true),
            "opt1"                     => array('required' => true),
            "opt2"                 => array('required' => true),
            "opt3"                 => array('required' => true),
            "opt4"                 => array('required' => true),
            "qans"                 => array('required' => true),
            "cousreId"                 => array('required' => true)
        )
    );
    if ($validation->passed()) {

        $members = new Members();
        $qans = strtolower(Input::get('qans'));
        $opt1 = strtolower(Input::get('opt1'));
        $opt2 = strtolower(Input::get('opt2'));
        $opt3 = strtolower(Input::get('opt3'));
        $opt4 = strtolower(Input::get('opt4'));
        $cousreId = Input::get('cousreId');
        $question = Input::get('question');

        if($qans == $opt1){
            $answer = 0;
        } else if($qans == $opt2){
            $answer = 1;
        } else if($qans == $opt3){
            $answer = 2;
        }else if($qans == $opt4){
            $answer = 3;
        }

        try {
            $members->create('questions', array(
                "question"             =>    $question,
                "ans1"                 =>    $opt1,
                "ans2"                 =>    $opt2,
                "ans3"                 =>    $opt3,
                "ans4"                 =>    $opt4,
                "q_ans"                =>    $answer,
                "course_id"            =>    $cousreId

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
