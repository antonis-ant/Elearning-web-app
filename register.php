<?php

/**
 * This script is only used to automatically create 2 users:
 *  * one with role of "student" and
 *  * one wiht role of "teacher"
 * This script should only be ran once to be able to test the application.
 * NOTE that there is no register functionallity on application.
 */

include_once 'config.php';

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// For simplicity, a commom encrypted password will be used 
$hsd_password = password_hash('12345', PASSWORD_BCRYPT);

// Add a 'tutor' user, print sql error in case query fails
mysqli_query($con, "INSERT INTO users (fname, lname, loginame, role, password) 
    VALUES ('Αντώνης', 'Αντωνιάδης', 'antonis@mail.com', 'tutor','" . $hsd_password . "')") 
    or die(mysqli_error($con));

// Add a 'student' user, print sql error in case query fails
mysqli_query($con, "INSERT INTO users (fname, lname, loginame, role, password) 
    VALUES ('Μακης', 'Μάκης', 'makis@mail.com', 'student','" . $hsd_password . "')") 
    or die(mysqli_error($con));


echo 'Users registered successfully!';