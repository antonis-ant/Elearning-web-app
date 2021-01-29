<?php
/*
    Get all announcements from database 
*/
// include_once 'src/config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/partB/src/config.php';

$announcements = array();

if ($stmt = $con->prepare('SELECT * FROM announcements ORDER BY DATE_CREATED DESC')) {
    // Execute statement
    $stmt->execute();
    // Store the result
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $subject, $main_text, $date);
        // get every row returned from db query & save to an array
        while ($stmt->fetch()) {
            array_push($announcements, array(
                "id" => $id,
                "subject" => $subject,
                "main_text" => $main_text,
                "date_created" => $date
            ));
        }
        // echo json encoded data
        // echo json_encode($announcements);
    } else {
        // echo error message
        echo 'Announcements not found!';
    }
}