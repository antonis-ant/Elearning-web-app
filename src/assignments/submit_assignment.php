<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/partB/src/config.php';

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Get data from form post request
$id = isset($_POST['id']) ? $_POST['id'] : null;
$goals = isset($_POST['ass_goals']) ? $_POST['ass_goals'] : '';
$deliverables = isset($_POST['ass_deliverables']) ? $_POST['ass_deliverables'] : '';
$due_date = isset($_POST['ass_due_date']) ? $_POST['ass_due_date'] : '';
$file_path = save_file();

// die(var_dump($_POST));

// If no id was provided, create new entry.
if (!$id) {
    // Build & perform sql query
    if (mysqli_query($con, "INSERT INTO assignments (goals, assignment_path, deliverables, due_date) 
    VALUES ('" . $goals . "', '" . $file_path . "', '" . $deliverables . "', '" . $due_date . "')")) {
        // on success redirect to assignments page.
        header('Location: ../../assignments.php');
    } else {
        die(mysqli_error($con));
    }
// If an id was provided, update corresponding entry.
} else {
    // Build & perform sql query
    if (mysqli_query($con, "UPDATE assignments SET goals='" . $goals . "', assignment_path='" . $file_path . "' , deliverables='" . $deliverables . "', due_date='" . $due_date . "'
    WHERE id= '" . $id . "'")) {
        // on success redirect to assignments page.
        header('Location: ../../assignments.php');
    } else {
        die(mysqli_error($con));
    }
}

function save_file() {
    // build path for file to be stored
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/partB/uploads/assignments/';
    $target_file = $target_dir . basename($_FILES["ass_upload"]["name"]);
    // actually save the file
    move_uploaded_file($_FILES['ass_upload']['tmp_name'], $target_file);

    // return path to file
    return $target_file;
}