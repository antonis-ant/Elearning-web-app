<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/partB/src/config.php';


if ($id = isset($_GET['id']) ? $_GET['id'] : null) {
    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // First get the documents path from database.
    if ($result = mysqli_query($con, 'SELECT path FROM documents WHERE id='. $id .'')) {
        // just in case query returns more then one results, delete all files.
        while ($row = mysqli_fetch_row($result)) {
            // delete file from server.
            unlink($row[0]);
        }
    }

    // Then, delete document entry from database
    if (mysqli_query($con, "DELETE FROM documents WHERE id=" . $id . "")) {
        // on success, redirect back to documents page after deleting file from server.
        header('Location: ../../documents.php');
    } else {
        die(mysqli_error($con));
    }

}

?>