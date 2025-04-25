<?php
if(isset($_GET['id'])){
    $conn = new mysqli("localhost", "root", "", "todolist");
    $id = (int)$_GET['id'];
    $done = (int)$_GET['done'];
    $conn->query("UPDATE tasks SET is_done = $done WHERE id= $id");
}
header("Location: index.php");
?>