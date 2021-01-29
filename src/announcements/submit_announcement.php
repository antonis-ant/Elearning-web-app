<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/partB/src/config.php';

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Get data from form post request
$id = isset($_POST['id']) ? $_POST['id'] : null;
$subject = isset($_POST['subject']) ? $_POST['subject'] : '';
$main_text = isset($_POST['main_text']) ? $_POST['main_text'] : '';

// If no id was provided, create new entry.
if (!$id) {
    // Build & perform sql query
    if (mysqli_query($con, "INSERT INTO announcements (subject, main_text) 
    VALUES ('" . $subject . "', '" . $main_text . "')")) {
        // on success redirect to announcements page.
        header('Location: ../../announcements.php');
    } else {
        die(mysqli_error($con));
    }
// If an id was provided, update corresponding entry.
} else {
    // Build & perform sql query
    if (mysqli_query($con, "UPDATE announcements SET subject='" . $subject . "', main_text='" . $main_text . "' 
    WHERE id= '" . $id . "'")) {
        // on success redirect to announcements page.
        header('Location: ../../announcements.php');
    } else {
        die(mysqli_error($con));
    }
}