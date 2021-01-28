<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Δημιουργία Ανακοίνωσης</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="form_page">
        <form class="flex_form new_entry_form" action="create_announcement.php" method="POST">
            <h1>Δημιουργία Ανακοίνωσης</h1>
            <input type="text" name="subject" placeholder="Θέμα" id="subject">
            <br>
            ​<textarea id="main_text" name="main_text" rows="10" cols="70" placeholder="Κυρίως κείμενο..."></textarea>
            <br>
            <button type="submit" name="submit_announcement">Καταχώρηση</button>
        </form>
    </div>
</body>

</html>