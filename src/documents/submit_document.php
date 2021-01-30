<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/partB/src/config.php';

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Get data from form post request
$id = isset($_POST['id']) ? $_POST['id'] : null;
$title = isset($_POST['doc_title']) ? $_POST['doc_title'] : '';
$decription = isset($_POST['doc_description']) ? $_POST['doc_description'] : '';
$file_path = save_file();

// If no id was provided, create new entry.
if (!$id) {
    // Build & perform sql query
    if (mysqli_query($con, "INSERT INTO documents (title, description, path) 
    VALUES ('" . $title . "', '" . $decription . "', '" . $file_path . "')")) {
        // on success redirect to announcements page.
        // header('Location: ../../documents.php');
        die(var_dump($_FILES['doc_upload']));
    } else {
        die(mysqli_error($con));
    }
// If an id was provided, update corresponding entry.
} else {
    // Build & perform sql query
    if (mysqli_query($con, "UPDATE documents SET title='" . $title . "', description='" . $decription . "', path='" . $file_path . "'
    WHERE id= '" . $id . "'")) {
        // on success redirect to announcements page.
        header('Location: ../../documents.php');
    } else {
        die(mysqli_error($con));
    }
}

function save_file() {
    // build path for file to be stored
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/partB/uploads/';
    $target_file = $target_dir . basename($_FILES["doc_upload"]["name"]);
    // actually save the file
    move_uploaded_file($_FILES['doc_upload']['tmp_name'], $target_file);

    // return path to file
    return $target_file;
}