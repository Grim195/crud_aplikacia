<?php
$conn = new mysqli("localhost", "root", "", "todolist");
$tasks = $conn->query("SELECT * FROM tasks ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Môj To-Do list</h1>
        <form action="add.php" method="POST">
        <input type="text" name="title" placeholder="Zadaj úlohu..." required>
        <button type="submit">Pridať</button>
    </form>

    <ul class="task-list">
        <?php while($task = $tasks->fetch_assoc()): ?>
            <li class="<?= $task['is_done'] ? 'done' : '' ?>">
                <?= htmlspecialchars($task['title']) ?>
                <div class="actions">
                    <a href="update.php?id=<?= $task['id'] ?>&done=<?= !$task['is_done'] ?>">✔</a>
                    <a href="delete.php?id=<?= $task['id'] ?>">🗑️</a>
                </div>
            </li>
        <?php endwhile; ?>
    </ul>
</div>
</body>
</html>