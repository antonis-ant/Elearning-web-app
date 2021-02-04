<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/partB/src/config.php';


if ($id = isset($_GET['id']) ? $_GET['id'] : null) {
    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    if (mysqli_query($con, "DELETE FROM users WHERE idusers=" . $id . "")) {
        // on success redirect to announcements page.
        header('Location: ../../users.php');
    } else {
        die(mysqli_error($con));
    }

}

?>