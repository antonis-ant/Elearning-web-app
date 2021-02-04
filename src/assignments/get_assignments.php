<?php
/*
    Get all announcements from database 
*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/partB/src/config.php';

$assignments = array();

if ($stmt = $con->prepare('SELECT * FROM assignments ORDER BY id DESC')) {
    // Execute statement
    $stmt->execute();
    // Store the result
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $goals, $path, $deliverables, $due_date);
        // get every row returned from db query & save to an array
        while ($stmt->fetch()) {
            array_push($assignments, array(
                "id" => $id,
                "goals" => $goals,
                "path" => $path,
                "deliverables" => $deliverables,
                "due_date" => $due_date
            ));
        }
        // echo json encoded data
        // echo json_encode($documents);
    } else {
        // echo error message
        echo 'Assignmnets not found!';
    }
}