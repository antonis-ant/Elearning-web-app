<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/partB/src/config.php';


if ($id = isset($_GET['id']) ? $_GET['id'] : null) {
    echo $id;
    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    if (mysqli_query($con, "DELETE FROM announcements WHERE id=" . $id . "")) {
        // on success redirect to announcements page.
        echo "DELETE FROM announcements WHERE 'id=" . $id . "'";
        header('Location: ../../announcements.php');
    } else {
        die(mysqli_error($con));
    }

}

?>