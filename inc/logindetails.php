<?php

if (Session::exists('home')) {
    echo '<p>' . Session::flash('home') . '</p>';
}

$user = new Admin();

if ($user->isLoggedIn()) {
    $token          = $user->data()->token_id;
    $userId      = $user->data()->id;
    $username       = $user->data()->email;
    $roleId         = $user->data()->role_id;
    $firstName      = $user->data()->firstName;
    $lastName       = $user->data()->lastName;
} else {
    Redirect::to(404);
}

// $surname = selectNetorDebt("registration_table", "surname", "token_id", $token);
// $othername = selectNetorDebt("registration_table", "othername", "token_id", $token);

$fullname = $firstName. " " . $lastName;


?>
<input type="hidden" id="studentId" value="<?php echo $userId ?>">