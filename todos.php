<?php
include("connection.php");

if (isset($_POST['add_todo'])) {
    $task = $_POST['task'];
    $sql = "INSERT INTO todos (task) VALUES ('$task')";
    $conn->query($sql);
    header("Location: index.php");
}

if (isset($_POST['edit_todo'])) {
    $id = $_POST['edit_id'];
    $task = $_POST['edit_task'];
    $sql = "UPDATE todos SET task='$task' WHERE id=$id";
    $conn->query($sql);
    header("Location: index.php");
}

if (isset($_GET['delete_todo'])) {
    $id = $_GET['delete_todo'];
    $sql = "DELETE FROM todos WHERE id=$id";
    $conn->query($sql);
    header("Location: index.php");
}

$conn->close();
?>
