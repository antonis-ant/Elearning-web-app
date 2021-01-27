<?php
// Start session
session_start();
// If the user is not logged in redirect to the login page
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Αρχική Σελίδα</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include('header.html') ?>
    <!-- Header Bar -->
    <div class="header_block">
        <div id="header_container">

            <!-- <div class="page_title"> -->
            <h1 class="center-horizontal">Αρχική Σελίδα</h1>
            <!-- </div> -->

            <div class="dropdown">
                <button class="dropbtn">Dropdown</button>
                <div class="dropdown-content">
                    <a href="#">Logout</a>
                </div>
            </div>

        </div>
    </div>
    <div class="main_content_block center">
        <div id="homepage_container">
            <p>Καλωσορίσατε στον ιστοχώρο UniHub. Το UniHub είναι ένας δυναμικός ιστοχώρος που κατασκευάστηκε για την
                online εκμάθηση ενός προπτυχιακου μαθήματος εκμάθησης ανάπτυξης ιστοσελίδων. Ο ιστόοτοπος αποτελέιται
                απο τις ακόλουθες ιστοσελίδες:
            </p>
            <ul>
                <li>Αρχική Σελίδα</li>
                <li>Ανακοινώσεις</li>
                <li>Επικοινωνία</li>
                <li>Έγγραφα Μαθήματος</li>
                <li>Εργασίες</li>
            </ul>

        </div>
    </div>
</body>

</html>