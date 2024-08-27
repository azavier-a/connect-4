<?php

session_start();

echo '<link rel="stylesheet" href="style.css">';

try {
    require_once 'models/database.php';
    require_once 'models/register.php';
    require_once 'models/user.php';

    $register_feedbackmsg = "";
    
    $username= filter_input(INPUT_POST, "username");
    $email_address= htmlspecialchars(filter_input(INPUT_POST, "email_address"));
    $password= filter_input(INPUT_POST, "password");
    
    if($username!= "" && $email_address!= "" && $password!= "") {
        if(register($username, $email_address, $password)) {
            $_SESSION['client_info'] = user_from_email($email_address);
            header("Location: .");
        } else {
            $register_feedbackmsg= "register failed (username/email already exists)";
        }
    }

    include('views/register.php');
    
} catch (Exception $e) {
    $error_message= $e-> getMessage();
    include('views/error.php');
}

