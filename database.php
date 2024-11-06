<?php

// connection
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "todo_app";

$conn = "";

try {
    $conn = mysqli_connect(
        $db_server,
        $db_user,
        $db_pass,
        $db_name
    );
} catch (mysqli_sql_exception) {
    echo "could not connect <br>";
}
// if ($conn) {
//     echo "you are connected <br>";
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST['task_name'];
    $status = $_POST['status'];


    // insert
    $sql = "INSERT INTO tasks (task_name, status) VALUES ('$task_name', $status)";

    $query = mysqli_query($conn, $sql);
    // $num = mysqli_num_rows($query);
    // if ($num > 0) {
    //     while ($row = mysqli_fetch_assoc($query)) {
    //         echo $row['task_name'] . "_" . $row['status'] . "<br>";
    //     }
    // }

    if ($conn->query($sql) === TRUE) {
        echo "تم إضافة المهمة بنجاح!";
    } else {
        echo "خطأ: " . $conn->error;
    }
}


// show tasks
$sql2 = "SELECT id, task_name, status FROM tasks";
$query2 = mysqli_query($conn, $sql2);

// edit task
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['task_id'])) {
//     $taskId = $_POST['task_id'];
//     $newStatus = $_POST['status'] == 1 ? 0 : 1; // عكس الحالة الحالية
//     $updateSql = "UPDATE tasks SET status = $newStatus WHERE id = $taskId";

//     if ($conn->query($updateSql) === TRUE) {
//         echo "تم تحديث الحالة بنجاح.<br>";
//     } else {
//         echo "خطأ في التحديث: " . $conn->error;
//     }
// }

// delete task

$conn->close();

