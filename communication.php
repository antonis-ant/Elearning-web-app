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
    <title>Επικοινωνία</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="page_container">

        <?php include('header_menu.php') ?>

        <div class="main_content_block center">
            <div class="content_container" id="communication_container">
                <ul class="object_list" id="communication_list">
                    <li class="object_list_item">
                        <div class="object_container">
                            <p>Μπορείτε να επικοινωνίσετε με τον καθηγητή με ένα απο τους ακόλουθους δύο τρόπους:</p>
                        </div>
                    </li>
                    <li class="object_list_item">
                        <div class="object_container">
                            <h2 class="announcement_header">Αποστολή e-mail μέσω web φόρμας</h2>
                            <div id="communication_form">
                                <form class="flex_form new_entry_form" action="">
                                    <input type="text" name="email_sender" placeholder="Αποστολέας" id="email_sender">
                                    <br>
                                    <input type="text" name="email_subject" placeholder="Θέμα" id="email_subject">
                                    <br>
                                    <textarea id="main_body" name="main_body" rows="10" cols="70" placeholder="Kείμενο"></textarea>
                                    <br>
                                    <button type="submit" name="send-email">Αποστολή</button>
                                </form>
                            </div>
                        </div>
                    </li>
                    <li class="object_list_item">
                        <div class="object_container">
                            <h2 class="announcement_header">Αποστολή e-mail με χρήση e-mail διεύθυνσης</h2>
                            <div>
                                <p class="announcement_field">
                                    Εναλλακτικά μπορείτε να αποστείλετε e-mail στην παρακάτω διεύθυνση ηλεκτρονικού
                                    ταχυδρομείου
                                    <a href="">tutor@csd.auth.test.gr</a>
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</body>

</html>