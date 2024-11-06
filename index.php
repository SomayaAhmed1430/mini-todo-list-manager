<?php
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Manager</title>
</head>

<body>

    <h1>Add a Task</h1>
    <form action="database.php" method="post">
        <input type="text" name="task_name" id="task_name" placeholder="اسم المهمة:" required>

        <label for="status">الحالة:</label>
        <select name="status" id="status">
            <option value="0">لم تكتمل</option>
            <option value="1">مكتملة</option>
        </select>

        <button type="submit">إضافة المهمة</button>
    </form>

    <?php
    // if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['note'])) {
    //     $note = $_POST['note'] . PHP_EOL;
    //     file_put_contents("notes.txt", $note, FILE_APPEND);
    //     header("Location: " . $_SERVER['PHP_SELF']);
    //     exit();
    // }

    // // حذف الملاحظة بناءً على رقمها
    // if (isset($_GET['delete'])) {
    //     $index = $_GET['delete'];
    //     $notes = file("notes.txt", FILE_IGNORE_NEW_LINES);
    //     if (isset($notes[$index])) {
    //         unset($notes[$index]);
    //         file_put_contents("notes.txt", implode(PHP_EOL, $notes) . PHP_EOL);
    //     }
    //     header("Location: " . $_SERVER['PHP_SELF']);
    //     exit();
    // }
    ?>

    <h2>Your Tasks:</h2>
    <table border="1">
        <tr>
            <th>رقم المهمة</th>
            <th>اسم المهمة</th>
            <th>الحالة</th>
        </tr>

        <?php
        $num = mysqli_num_rows($query2);
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($query2)) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["task_name"] . "</td>
                        <td>" . ($row["status"] == 1 ? "مكتملة" : "لم تكتمل") . "</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>لا توجد مهام حالياً</td></tr>";
        }



        // if (file_exists("notes.txt")) {
        //     $notes = file("notes.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); // هنا بنسقط الأسطر الفاضية

        //     if (count($notes) > 0) {
        //         foreach ($notes as $index => $note) {
        //             echo "<li>$note 
        //               <a href='?delete=$index' style='color: red;'>Delete</a>
        //               </li>";
        //         }
        //     } else {
        //         echo "<p>No notes yet!</p>";
        //     }
        // } else {
        //     echo "<p>No notes yet!</p>";
        // }
        ?>



</body>

</html>