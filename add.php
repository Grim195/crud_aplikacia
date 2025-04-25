<?php
if (!empty($_POST['title'])) {
    $conn = new mysqli("localhost", "root", "", "todolist");
    $title = $conn->real_escape_string($_POST['title']);
    $conn->query("INSERT INTO tasks (title) VALUES ('$title')");
}
header("Location: index.php");
?>