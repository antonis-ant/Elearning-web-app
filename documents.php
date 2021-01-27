<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ανακοινώσεις</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include('header.html') ?>

    <!-- Header Bar -->
    <div class="header_block">
        <h1>Έγγραφα Μαθήματος</h1>
    </div>
    <div class="main_content_block center">
        <div class="content_container" id="documents_container">
            <ul class="object_list" id="announcements_list">
                <li class="object_list_item">
                    <div class="object_container">
                        <h2 class="document_header">Ανακοίνωση 1</h2>
                        <div>
                            <p class="document_field">Ημερομηνία: 12/12/2008 </p>
                            <p><a href="">Download</a></p>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
    <button onclick="scroll_top()" id="top_btn" title="Back To Top">Back to top</button>
</body>
<script src="js/script.js"></script>

</html>