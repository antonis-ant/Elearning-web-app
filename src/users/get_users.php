<?php
/*
    Get all announcements from database 
*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/partB/src/config.php';

$users = array();

if ($stmt = $con->prepare('SELECT * FROM users ORDER BY idusers DESC')) {
    // Execute statement
    $stmt->execute();
    // Store the result
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $fname, $lname, $loginame, $role, $password);
        // get every row returned from db query & save to an array
        while ($stmt->fetch()) {
            array_push($users, array(
                "id" => $id,
                "fname" => $fname,
                "lname" => $lname,
                "loginame" => $loginame,
                "role" => $role,
                "password" => $password
            ));
        }
        // echo json encoded data
        // echo json_encode($announcements);
    } else {
        // echo error message
        echo 'Users not found!';
    }
}