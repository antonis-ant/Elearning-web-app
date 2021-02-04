<?php
$form_title = "Δημιουργία Χρήστη";
$fname_value = "";
$lname_value = "";
$email_value = "";
$role_value = "";
$password_value = "";

// if id is provided update corresponding entry
$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id) {
    $form_title = "Επεξεργασία Δημοσίευσης";
    // 1. Fetch corresponding object from db
    include_once $_SERVER['DOCUMENT_ROOT'] . '/partB/src/config.php';

    if ($stmt = $con->prepare('SELECT * FROM users WHERE idusers=?')) {
        // bind parameters
        $stmt->bind_param('i', $id);
        // Execute statement
        $stmt->execute();
        // Store the result
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $fname, $lname, $email, $role, $password);
            // get results
            $stmt->fetch();
            $fname_value = $fname;
            $lname_value = $fname;
            $email_value = $email;
            $role_value = $role;
            // $password_value = $password;
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
    <title><?= $form_title ?></title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="form_page">
        <form class="flex_form new_entry_form" action="../src/users/submit_user.php" method="POST">
            <h1><?= $form_title ?></h1>
            <input type="text" name="fname" placeholder="Όνομα" value="<?= $fname_value ?>" id="fname">
            <br>
            <input type="text" name="lname" placeholder="Επίθετο" value="<?= $lname_value ?>" id="lname">
            <br>
            <input type="email" name="email" placeholder="Email" value="<?= $email_value ?>" id="email">
            <br>
            <input type="password" name="password" placeholder="Password" value="<?= $password_value ?>" id="password">
            <br>
            <select name="role" id="role">
                <option value="student" <?= $role_value == 'student' ? 'selected' : '' ?>>Student</option>
                <option value="tutor" <?= $role_value == 'tutor' ? 'selected' : '' ?>>Tutor</option>
            </select>
            <br>
            <!-- If form is for edit, create hidden field with id to pass on with POST request on submit. -->
            <?php if ($id)
                echo '<input type="hidden" name="id" value="' . $id . '">'
            ?>
            <button type="submit" name="submit-announcement">Καταχώρηση</button>
        </form>
    </div>
</body>

</html>