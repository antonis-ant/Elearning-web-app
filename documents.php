<?php
// Start session
session_start();
// If the user is not logged in redirect to the login page
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

// Get announcements script, gives access to 'announcements variable'.
include_once('src/documents/get_documents.php');
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
            <div class="content_container" id="documents_container">
                <!-- Only show "create document" link if logged-in user is tutor -->
                <?php if ($_SESSION['user_role'] == 'tutor')
                    echo "<p><a href='forms/document_form.php'>Νέo Έγγραφο</a></p>";
                ?>
                <!-- Make this dynamic -->
                <ul class="object_list" id="announcements_list">
                    <!-- Dynamically create announcements list -->
                    <?php foreach($documents as $doc) { ?>
                    <li class="object_list_item" id="doc_<?=$doc['id']?>">
                        <div class="object_container">
                            <div class='list_object_header'>
                                <h2 class="announcement_header">Έγγραφο <?=$doc['id']?></h2>
                                <!-- If user has role of 'tutor', create edit & delete options -->
                                <?php if ($_SESSION['user_role'] == 'tutor')
                                    echo '<div class="actions">
                                            <a href="forms/document_form.php?id='. $doc['id'] . '">Edit</a>
                                            <a href="src/documents/delete_document.php?id='. $doc['id'] . '">Delete</a>
                                          </div>';
                                ?>
                            </div>
                            <div class="list_object_body">
                                <p class="announcement_field">Τίτλος: <?=$doc['title']?></p>
                                <p class="announcement_field">Θέμα: <?=$doc['description']?></p>
                                <p class="announcement_field"><a href="<?=$doc['path']?>">Download</a></p>
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
<script src="js/script.js"></script>

</html>