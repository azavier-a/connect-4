<?php

class user {
    private $username, $email_address, $bio, $id;
    
    public function __construct($username, $email_address, $bio='', $id = 0) {
        $this->set_username($username);
        $this->set_email_address($email_address);
        $this->set_bio($bio);
        $this->set_id($id);
    }

    public function get_username() {
        return $this->username;
    }
    public function set_username($username): void {
        $this->username = $username;
    }

    public function get_email_address() {
        return $this->email_address;
    }
    public function set_email_address($email_address): void {
        $this->email_address = $email_address;
    }
    
    public function get_bio() {
        return $this->bio;
    }
    public function set_bio($bio): void {
        $this->bio = $bio;
    }

    public function get_id() {
        return $this->id;
    }
    public function set_id($id): void {
        $this->id = $id;
    }
}

function user_from_email($email_address) {
    global $db;
    // Define the query to get data from users table
    $query= 'SELECT username, email_address, bio, id FROM users WHERE email_address = :email_address';
    // Prepare and execute the query
    $statement= $db-> prepare($query);
    $statement-> bindValue(":email_address", $email_address);
    $statement-> execute();
    
    // Fetch the query results
    $user_row= $statement-> fetch();
    
    // Close the cursor to free resources
    $statement-> closeCursor();
    
    $user = new user($user_row['username'], $user_row['email_address'], $user_row['bio'], $user_row['id']);
    return $user;
}

function user_from_id($id) {
    global $db;
    // Define the query to get data from users table
    $query= 'SELECT username, email_address, bio, id FROM users WHERE id = :id';
    // Prepare and execute the query
    $statement= $db-> prepare($query);
    $statement-> bindValue(":id", $id);
    $statement-> execute();
    
    // Fetch the query results
    $user_row= $statement-> fetch();
    
    // Close the cursor to free resources
    $statement-> closeCursor();
    
    $user = new user($user_row['username'], $user_row['email_address'], $user_row['bio'], $user_row['id']);
    return $user;
}

function user_from_username($username) {
    global $db;
    // Define the query to get data from users table
    $query= 'SELECT username, email_address, bio, id FROM users WHERE username = :username';
    // Prepare and execute the query
    $statement= $db-> prepare($query);
    $statement-> bindValue(":username", $username);
    $statement-> execute();
    
    // Fetch the query results
    $user_row= $statement-> fetch();
    
    // Close the cursor to free resources
    $statement-> closeCursor();
    
    $user = new user($user_row['username'], $user_row['email_address'], $user_row['bio'], $user_row['id']);
    return $user;
}