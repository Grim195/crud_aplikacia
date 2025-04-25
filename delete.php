<?php
    if(isset($_GET['id'])) {
        $conn = new mysqli("localhost", "root", "", "todolist");
        $id = (int)$_GET['id'];
        $conn->query("DELETE FROM tasks WHERE");
    }
    header("Location: index.php")
?>