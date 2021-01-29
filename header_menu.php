<?php

// Map each page file to a page title.
$pages = array(
    "index.php" => "Αρχική Σελίδα",
    "announcements.php" => "Ανακοινώσεις",
    "communication.php" => "Επικοινωνία",
    "documents.php" => "Έγγραφα Μαθήματος",
    "assignments.php" => "Εργασίες"
);

// Get url of current page.
$current_page =  $_SERVER['PHP_SELF'];
// Split url on '/' character
$url_parts = explode('/', $_SERVER['PHP_SELF']);
// Get page file name (last url part).
$page_filename = end($url_parts);
// Get current page title from maped pages array
$current_page_title = $pages[$page_filename];
?>

<!-- Navigation Menu Sidebar -->
<nav class="nav">
    <a href="index.php" class="nav_link"><?= $pages['index.php']?></a>
    <a href="announcements.php" class="nav_link"><?= $pages['announcements.php']?></a>
    <a href="communication.php" class="nav_link"><?= $pages['communication.php']?></a>
    <a href="documents.php" class="nav_link"><?= $pages['documents.php']?></a>
    <a href="assignments.php" class="nav_link"><?= $pages['assignments.php']?></a>
</nav>

<!-- Header Bar -->
<div class="header_block">
        <div id="header_container">            
            <h1 class="center-horizontal"><?= $current_page_title ?></h1>
            <div class="dropdown">
                <button class="dropbtn">
                    <?= $_SESSION['fname'] . ' ' . $_SESSION['lname']. ' (' .  $_SESSION['user_role'] . ')'?>
                </button>
                <div class="dropdown-content">
                    <a href="src/authentication/logout.php">Αποσύνδεση</a>
                </div>
            </div>
        </div>
    </div>