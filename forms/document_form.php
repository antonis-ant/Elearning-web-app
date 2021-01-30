<?php
    $form_title = "Δημιουργία Εγγράφου";
    $title_value = "";
    $description_value = "";
    $path_value = "";

    // if id is provided update corresponding entry
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if ($id) {
        $form_title = "Επεξεργασία Δημοσίευσης";
        // Fetch corresponding object from db
        include_once $_SERVER['DOCUMENT_ROOT'] . '/partB/src/config.php';

        if ($stmt = $con->prepare('SELECT * FROM documents WHERE id=?')) {
            // bind parameters
            $stmt->bind_param('i', $id);
            // Execute statement
            $stmt->execute();
            // Store the result
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $title, $description, $path);
                // get results
                $stmt->fetch();
                $title_value = $title;
                $description_value = $description;
                $path_value = $path;
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
        <form enctype="multipart/form-data" class="flex_form new_entry_form" action="../src/documents/submit_document.php" method="POST">
            <h1><?=$form_title?></h1>
            <input type="text" name="doc_title" placeholder="Τίτλος" value="<?=$title_value?>" id="doc_title">
            <br>
            ​<textarea id="doc_description" name="doc_description" rows="10" cols="70"
                placeholder="Περιγραφή..."><?=$description_value?></textarea>
            <br>
            <input type="hidden" name="MAX_FILE_SIZE" value="40000" />
            <input type="file" name="doc_upload" id="doc_upload">
            <br>
            <!-- If form is for edit, create hidden field with id to pass on with POST request on submit. -->
            <?php if ($id)
                    echo '<input type="hidden" name="id" value="' . $id . '">'
            ?>
            <button type="submit" name="submit-document">Καταχώρηση</button>
        </form>
    </div>
</body>

</html>