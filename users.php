<?php
// Start session
session_start();
// If the user is not logged in redirect to the login page
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

// get users from db using this script
include_once('src/users/get_users.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Εργασίες</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="page_container">
        <?php include('header_menu.php') ?>

        <div class="main_content_block center">
            <div class="content_container" id="assignments_container">
                <p><a href='forms/user_form.php'>Δημιουργία Χρήστη</a></p>
                <ul class="object_list" id="users_list">
                    <?php foreach ($users as $usr) { ?>
                        <li class="object_list_item">
                            <div class="object_container">
                                <div class="list_object_header">
                                    <h2><?= $usr['fname'] . ' ' . $usr['lname'] ?></h2>
                                    <div class="actions">
                                        <a href="forms/user_form.php?id=<?=$usr['id'] ?>">Edit</a>
                                        <?php if ($usr['loginame'] != $_SESSION['loginame']) { ?>
                                        <a href="src/users/delete_user.php?id=<?=$usr['id'] ?>">Delete</a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div>
                                    <p class="announcement_field">Email: <?=$usr['loginame']?></p>
                                    <p class="announcement_field">Ρόλος: <?=$usr['role']?></p>
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