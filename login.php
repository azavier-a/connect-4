<?php

session_start();

echo '<link rel="stylesheet" href="style.css">';

try {
    require_once 'models/database.php';
    require_once 'models/login.php';
    require_once 'models/user.php';
    
    $action= htmlspecialchars(filter_input(INPUT_GET, "action"));

    $login_error = "";
    
    $email_address= htmlspecialchars(filter_input(INPUT_POST, "email_address"));
    $password= filter_input(INPUT_POST, "password");
    
    if($action == "logout") {
        $_SESSION = array();
        session_destroy();
    }
    
    if($email_address!= "" && $password!= "") {
        if(login($email_address, $password)) {
            $_SESSION['client_info'] = user_from_email($email_address);
            header("Location: .");
        } else {
            $login_error= "login failed, please try again. (invalid email/password?)";
        }
    }

    include('views/login.php');
    
} catch (Exception $e) {
    $error_message= $e-> getMessage();
    include('views/error.php');
}

