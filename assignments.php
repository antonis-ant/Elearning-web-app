<?php
// Start session
session_start();
// If the user is not logged in redirect to the login page
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

// get assignments from db using this script
include_once('src/assignments/get_assignments.php');
// die(var_dump($assignments));
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
                <!-- Only show "create assignment" link if logged-in user is tutor -->
                <?php if ($_SESSION['user_role'] == 'tutor')
                    echo "<p><a href='forms/assignment_form.php'>Νέα Εργασία</a></p>";
                ?>
                <ul class="object_list" id="assignments_list">
                    <?php foreach($assignments as $ass) { ?>
                    <li class="object_list_item">
                        <div class="object_container">
                            <div class="list_object_header">
                                <h2>Εργασία <?=$ass['id']?></h2>
                                <!-- If user has role of 'tutor', create edit & delete options -->
                                <?php if ($_SESSION['user_role'] == 'tutor')
                                    echo '<div class="actions">
                                            <a href="forms/assignment_form.php?id='. $ass['id'] . '">Edit</a>
                                            <a href="src/assignments/delete_assignment.php?id='. $ass['id'] . '">Delete</a>
                                          </div>';
                                ?>
                            </div>
                            <div>
                                <p class="announcement_field">Οι στόχοι τις εργασίας είναι οι ακόλουθοι: </p>
                                <p class="announcement_field"><?=$ass['goals']?></p>

                                <p class="announcement_field">Εκφώνηση:
                                    Κατεβάστε την εκφώνηση της εργασίας από <a
                                        href="src/download_file.php?filename=<?=$ass['path']?>&filedir=assignments">εδώ</a>
                                </p>

                                <p class="announcement_field">Παραδοτέα: </p>
                                <p class="announcement_field"><?=$ass['deliverables']?> </p>

                                <p style="color:red">Ημερομηνία παράδοσης: <?=$ass['due_date']?></p>
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