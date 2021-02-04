<?php
    $form_title = "Δημιουργία Εργασίας";
    // All these "values" refer to the default filed values
    // set field values to empty (new entry form) 
    $goals_value = "";
    $file_path_value = "";
    $deliverables_value = "";
    $due_date_value = "";

    // if id is provided update corresponding entry
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if ($id) {
        $form_title = "Επεξεργασία Εργασίας";
        // Fetch corresponding object from db
        include_once $_SERVER['DOCUMENT_ROOT'] . '/partB/src/config.php';

        if ($stmt = $con->prepare('SELECT * FROM assignments WHERE id=?')) {
            // bind parameters
            $stmt->bind_param('i', $id);
            // Execute statement
            $stmt->execute();
            // Store the result
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $goals, $file_path, $deliverables, $due_date);
                // get results
                $stmt->fetch();
                // set field values for current entry (edit extisting entry form)
                $goals_value = $goals;
                $file_path_value = $file_path;
                $deliverables_value = $deliverables;
                $due_date_value = $due_date;
                // die(date('Y-m-d\TH:i:sP', strtotime($due_date_value)));
            } else {
                // echo error message.
                echo 'Document not found!';
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
        <form enctype="multipart/form-data" class="flex_form new_entry_form"
            action="../src/assignments/submit_assignment.php" method="POST">
            <h1><?=$form_title?></h1>
            ​<textarea id="ass_goals" name="ass_goals" rows="10" cols="70"
                placeholder="Στόχοι"><?=$goals_value?></textarea>
            <br>
            ​<textarea id="ass_deliverables" name="ass_deliverables" rows="10" cols="70"
                placeholder="Παραδοτέα"><?=$deliverables_value?></textarea>
            <br>
            <!-- <label for="due_date">Ημερομηνία Παράδοσης</label>
            <br> -->
            <input type="datetime-local" id="ass_due_date" name="ass_due_date" 
            value="<?=date('Y-m-d\TH:i', strtotime($due_date_value))?>" placeholder="Ημερομηνία Παράδοσης">
            <br>
            <!-- <label for="ass_upload">Εκφώνηση</label> -->
            <input type="hidden" name="MAX_FILE_SIZE" value="40000000" /> <!-- MAX file size 40MB -->
            <input type="file" name="ass_upload" id="ass_upload">
            <br>
            <!-- If form is for edit, create hidden field with id to pass on with POST request on submit. -->
            <?php if ($id)
                    echo '<input type="hidden" name="id" value="' . $id . '">'
            ?>
            <button type="submit" name="submit-assignment">Καταχώρηση</button>
        </form>
    </div>
</body>

</html>