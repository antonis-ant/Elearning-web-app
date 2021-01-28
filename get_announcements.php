<?php
include_once 'config.php';

$announcements = array();

if ($stmt = $con->prepare('SELECT * FROM announcements ORDER BY DATE_CREATED DESC')) {
    // Execute statement
    $stmt->execute();
    // Store the result
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $subject, $main_text, $date);
        
        while ($stmt->fetch()) {
            array_push($announcements, array(
                "id" => $id,
                "subject" => $subject,
                "main_text" => $main_text,
                "date_created" => $date
            ));
        }

        // var_dump($announcements);

    } else {
        echo 'Announcements not found!';
    }
}