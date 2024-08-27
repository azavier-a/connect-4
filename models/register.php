<?php

function register($username, $email_address, $password) {
    global $db;
    
    // Define the query to add a user into users table
    $query= "INSERT INTO users(username, email_address, id, password_hash) "
          . "VALUES(:username, :email_address, NULL, :password_hash)";
    // Prepare and execute the query
    $statement= $db-> prepare($query);
    
    $statement-> bindValue(":username", $username);
    $statement-> bindValue(":email_address", $email_address);
    $statement-> bindValue(":password_hash", password_hash($password, PASSWORD_DEFAULT));
    
    $insert_result= true;
    try {
        $statement-> execute();
    } catch (PDOException $e) {
        $insert_result= false;
    }
    $statement-> closeCursor();
    
    return $insert_result;
}
