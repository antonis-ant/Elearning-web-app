<?php
// Start session
session_start();
// If the user is not logged in redirect to the login page
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

// Get announcements script, gives access to 'announcements variable'.
include_once('src/announcements/get_announcements.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ανακοινώσεις</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="page_container">
        <?php include('header_menu.php') ?>

        <div class="main_content_block center">
            <div class="content_container" id="announcements_container">

                <!-- Only show "create announcement" link if logged in user is tutor -->
                <?php if ($_SESSION['user_role'] == 'tutor')
                    echo "<p><a href='forms/announcement_form.php'>Νέα Ανακοίνωση</a></p>";
                ?>
                <ul class="object_list" id="announcements_list">
                    <!-- Dynamically create announcements list -->
                    <?php foreach($announcements as $ann) { ?>
                    <li class="object_list_item" id="ann_<?=$ann['id']?>">
                        <div class="object_container">
                            <div class='list_object_header'>
                                <h2>Ανακοίνωση <?=$ann['id']?></h2>
                                <!-- If user has role of 'tutor', create edit & delete options -->
                                <?php if ($_SESSION['user_role'] == 'tutor')
                                    echo '<div class="actions">
                                            <a href="forms/announcement_form.php?id='. $ann['id'] . '">Edit</a>
                                            <a href="src/announcements/delete_announcement.php?id='. $ann['id'] . '">Delete</a>
                                          </div>';
                                ?>
                            </div>
                            <div class="list_object_body">
                                <p class="announcement_field">Ημερομηνία: <?=$ann['date_created']?></p>
                                <p class="announcement_field">Θέμα: <?=$ann['subject']?></p>
                                <p class="announcement_field"><?=$ann['main_text']?></p>
                            </div>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <button onclick="scroll_top()" id="top_btn" title="Back To Top">Back to top</button>
    </div>
</body>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/script.js"></script>
<script src="js/announcements.js"></script>

</html>