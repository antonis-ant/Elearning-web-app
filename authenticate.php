<?php
include_once 'config.php';

session_start();

// Check whether the login form data was submitted
if (!isset($_POST['loginame'], $_POST['password']) ) {
    exit('Please fill both the username and password fields!');
}

// Prepare SQL statement
if ($stmt = $con->prepare('SELECT idusers, fname, lname, password, role FROM users WHERE loginame = ?')) {
    // Bind parameters
    $stmt->bind_param('s', $_POST['loginame']);
    // Execute statement
    $stmt->execute();
    // Store the result
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $fname, $lname, $password, $role);
        $stmt->fetch();
        // Account exists, now we verify the password.
        if (password_verify($_POST['password'], $password)) {
            // Verification success! User has logged-in!
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['loginame'] = $_POST['loginame'];
            $_SESSION['id'] = $id;
            $_SESSION['fname'] = $fname;
            $_SESSION['lname'] = $lname;
            $_SESSION['user_role'] = $role;
            
            // Authentication successfull, redirect to home page
            // echo 'Welcome ' . $_SESSION['loginame'] .'('. $_SESSION['user_role'] . ')!' . $_SESSION['fname'];
            header('Location: index.php');
        } else {
            // Incorrect password
            echo 'Incorrect username and/or password!';
        }
    } else {
        // Incorrect username
        echo 'Incorrect username and/or password!';
    }

    // Close statemet
    $stmt->close();
} else {
    echo 'could not establish db connection ?';
}