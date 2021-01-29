<?php
    $form_title = "Δημιουργία Ανακοίνωνσης";
    $subject_value = "";
    $main_text_value = "";

    // if id is provided update corresponding entry
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if ($id) {
        $form_title = "Επεξεργασία Δημοσίευσης";
        // 1. Fetch corresponding object from db
        include_once $_SERVER['DOCUMENT_ROOT'] . '/partB/src/config.php';

        if ($stmt = $con->prepare('SELECT * FROM announcements WHERE id=?')) {
            // bind parameters
            $stmt->bind_param('i', $id);
            // Execute statement
            $stmt->execute();
            // Store the result
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $subject, $main_text, $date);
                // get results
                $stmt->fetch();
                $subject_value = $subject;
                $main_text_value = $main_text;
            } else {
                // echo error message.
                echo 'Announcement not found!';
            }
        }
    }
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$form_title?></title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="form_page">
        <form class="flex_form new_entry_form" action="../src/announcements/submit_announcement.php" method="POST">
            <h1><?=$form_title?></h1>
            <input type="text" name="subject" placeholder="Θέμα" value="<?=$subject_value?>" id="subject">
            <br>
            ​<textarea id="main_text" name="main_text" rows="10" cols="70"
                placeholder="Κυρίως κείμενο..."><?=$main_text_value?></textarea>
            <br>
            <!-- If form is for edit, create hidden field with id to pass on with POST request on submit. -->
            <?php if ($id)
                    echo '<input type="hidden" name="id" value="' . $id . '">'
            ?>
            <!-- ='. $ann['id'] . ' -->
            <!-- <input type="hidden" name="id" value="<?=$id?>"> -->
            <button type="submit" name="submit-announcement">Καταχώρηση</button>
        </form>
    </div>
</body>

</html>