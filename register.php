<?php

/**
 * This script is only used to automatically create 2 users:
 *  * one with role of "student" and
 *  * one wiht role of "teacher"
 * This script should only be ran once to be able to test the application.
 * NOTE that there is no register functionallity on application.
 */

include_once 'config.php';

// Add a 'teacher' user, print sql error in case query fails
mysqli_query($con, "INSERT INTO users (fname, lname, loginame, role, password) 
 VALUES ('Βασίλης', 'Χατζηδημητρακόκουλος', 'basX@mail.com', 'teacher', '12345')") or die(mysqli_error($con));

// Add a 'student' user, print sql error in case query fails
mysqli_query($con, "INSERT INTO users (fname, lname, loginame, role, password) 
VALUES ('Μακης', 'Χατζηπαρασκευόπουλος', 'makisX@mail.com', 'student', '12345')") or die(mysqli_error($con));
