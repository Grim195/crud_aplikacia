<?php
    if(isset($_GET['id'])) {
        $conn = new mysqli("localhost", "root", "", "todolist");
        $id = (int)$_GET['id'];
        $conn->query("DELETE FROM tasks WHERE id = $id");
    }
    header("Location: index.php")
?>