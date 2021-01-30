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
                    <li class="object_list_item">
                        <div class="object_container">
                            <h2 class="document_header">Ανακοίνωση 1</h2>
                            <div>
                                <p class="document_field">Ημερομηνία: 12/12/2008 </p>
                                <p><a href="">Download</a></p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <button onclick="scroll_top()" id="top_btn" title="Back To Top">Back to top</button>
    </div>
</body>
<script src="js/script.js"></script>

</html>