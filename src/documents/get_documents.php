<?php
/*
    Get all announcements from database 
*/
// include_once 'src/config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/partB/src/config.php';

$documents = array();

if ($stmt = $con->prepare('SELECT * FROM documents ORDER BY id DESC')) {
    // Execute statement
    $stmt->execute();
    // Store the result
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $title, $description, $path);
        // get every row returned from db query & save to an array
        while ($stmt->fetch()) {
            array_push($documents, array(
                "id" => $id,
                "title" => $title,
                "description" => $description,
                "path" => $path
            ));
        }
        // echo json encoded data
        // echo json_encode($documents);
    } else {
        // echo error message
        echo 'Documents not found!';
    }
}