<?php

// Define function to validate username
function validate_username($username) {
    // Check if username is alphanumeric and has at least 2 letters
    if (preg_match('/^[a-zA-Z0-9]{2,}$/', $username)) {
        return true;
    } else {
        return false;
    }
}

// Define function to validate password
function validate_password($password) {
    // Check if password is at least 6 characters and has allowed characters
    if (strlen($password) >= 6 && preg_match('/^[a-zA-Z0-9!@#$%^&*()_+-=,.<>?;:{}[\]\'"\/\\~`|]{6,}$/', $password)) {
        return true;
    } else {
        return false;
    }
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get the username and password from the request body
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the username and password
    if (validate_username($username) && validate_password($password)) {
        // Register the user (you would replace this with your own code to add the user to a database or other storage)
        echo 'User registered successfully!';
    } else {
        // Return an error message
        echo 'Invalid username or password';
    }
}
?>
