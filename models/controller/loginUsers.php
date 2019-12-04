<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"] . "/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');
if(Input::exists()) {
    
    if(Token::check(Input::get('token'))){

      $validate = new Validation();
      $validation = $validate->check($_POST, array(
        'username' => array('required' => true),
        'password' => array('required' => true)

      ));

      if($validation->passed()) {
        $user = new Admin();

        $remember = (Input::get('remember') === 'on') ? true : false;
        $login = $user->login(Input::get('username'), Input::get('password'), $remember);
        
         if ($login === true){
           $logCount = rowCountLogs('logs', 'user_id',$user->data()->id, 'time_out', " ");
            if($logCount == null){
              if ($user->data()->role_id == 6) {
                  $members = new Members();
                  $time = date("h:i:s");

                  try {
                    $members->create('logs', array(
                      "user_id"                     =>   $user->data()->id,
                      "time_in"                     =>  $time,
                      "token_id"                 =>  Input::get('token')

                    ));
                      $_POST[] = array();
                    } catch (Exception $e) {
                      die($e->getMessage());
                    }
                echo 6; //student login
          
              } else if ($user->data()->role_id == 5) {
                echo 5;//llecturer login
              } else if ($user->data()->role_id == 4) {
                echo 4;//admin login
              }
            }else{
              echo "your Logged in already";
            }
          }else{
            echo "Invalid Username and Password";
            $_POST[] = array();
          }

      }else{
        foreach($validation->errors() as $error){
          echo $error, "<br>";
        }
      }
    } else {
      echo "Invalid CRSF Token";
    }
  }
