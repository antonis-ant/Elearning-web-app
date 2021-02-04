<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/partB/src/config.php';

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Get data from form post request
$id = isset($_POST['id']) ? $_POST['id'] : null;
$fname = isset($_POST['fname']) ? $_POST['fname'] : '';
$lname = isset($_POST['lname']) ? $_POST['lname'] : '';
$loginame = isset($_POST['email']) ? $_POST['email'] : '';
// encrypt passsword before storing it.
$password = isset($_POST['password']) ? $_POST['password'] : '';
$role = isset($_POST['role']) ? $_POST['role'] : '';

// If no id was provided, create new entry.
if (!$id) {
    // Build & perform sql query
    if (mysqli_query($con, "INSERT INTO users (fname, lname, loginame, role, password) 
    VALUES ('" . $fname . "', '" . $lname . "','" . $loginame . "','" . $role . "','" . $password . "')")) {
        // on success redirect to users page.
        header('Location: ../../users.php');
    } else {
        die(mysqli_error($con));
    }
// If an id was provided, update corresponding entry.
} else {
    $update_query = ($password != '')  ? 
    "UPDATE users SET fname='" . $fname . "', lname='" . $lname . "', loginame='" . $loginame . "', password='" . $hsd_password = password_hash($password, PASSWORD_BCRYPT) . "', role='" . $role . "' WHERE idusers= '" . $id . "'" : 
    "UPDATE users SET fname='" . $fname . "', lname='" . $lname . "', loginame='" . $loginame . "', role='" . $role . "' WHERE idusers= '" . $id . "'";
    // Build & perform sql query
    if (mysqli_query($con, $update_query)) {
        // on success redirect to users page.
        header('Location: ../../users.php');
    } else {
        die(mysqli_error($con));
    }
}