<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Manager</title>
</head>

<body>

    <h1>Add a Note</h1>
    <form action="" method="post">
        <input type="text" name="note" placeholder="Enter your note" required>
        <button type="submit">Add Note</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['note'])) {
        $note = $_POST['note'] . PHP_EOL;
        file_put_contents("notes.txt", $note, FILE_APPEND);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    // حذف الملاحظة بناءً على رقمها
    if (isset($_GET['delete'])) {
        $index = $_GET['delete'];
        $notes = file("notes.txt", FILE_IGNORE_NEW_LINES);
        if (isset($notes[$index])) {
            unset($notes[$index]);
            file_put_contents("notes.txt", implode(PHP_EOL, $notes) . PHP_EOL);
        }
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
    ?>

    <h2>Your Notes:</h2>
    <ul>
        <?php
        if (file_exists("notes.txt")) {
            $notes = file("notes.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); // هنا بنسقط الأسطر الفاضية

            if (count($notes) > 0) {
                foreach ($notes as $index => $note) {
                    echo "<li>$note 
                      <a href='?delete=$index' style='color: red;'>Delete</a>
                      </li>";
                }
            } else {
                echo "<p>No notes yet!</p>";
            }
        } else {
            echo "<p>No notes yet!</p>";
        }
        ?>
    </ul>


</body>

</html>