<?php
include_once 'config.php';

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Get data from post request
// Get current date
$date_created = date('Y-m-d');
$subject = isset($_POST['subject']) ? $_POST['subject'] : '';
$main_text = isset($_POST['main_text']) ? $_POST['main_text'] : '';

// Build & perform sql query
if (mysqli_query($con, "INSERT INTO announcements (date, subject, main_text) 
    VALUES ('" . $date_created . "', '" . $subject . "', '" . $main_text . "')")) {
    // on success redirect to announcements page.
    header('Location: announcements.php');
} else {
    die(mysqli_error($con));
}
