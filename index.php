<?php
$conn = new mysqli("localhost", "root", "", "todolist");
$tasks = $conn->query("SELECT * FROM tasks ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h1>📝 Môj To-Do List</h1>

    <form action="add.php" method="POST" class="task-form">
        <input type="text" name="title" placeholder="Zadaj novú úlohu..." required>
        <button type="submit">Pridať</button>
    </form>

    <ul class="task-list">
        <?php while($task = $tasks->fetch_assoc()): ?>
            <li class="task-item <?= $task['is_done'] ? 'done' : '' ?>">
                <span><?= htmlspecialchars($task['title']) ?></span>
                <div class="actions">
                    <a href="update.php?id=<?= $task['id'] ?>&done=<?= !$task['is_done'] ?>" title="Označiť ako hotové">✔</a>
                    <a href="delete.php?id=<?= $task['id'] ?>" title="Vymazať">🗑️</a>
                </div>
            </li>
        <?php endwhile; ?>
    </ul>
</div>
</body>
</html>
