<style><?php include '../css/index.css'; ?></style>

<?php

include '../database/TodoItemRepository.php';

$repo = new TodoItemRepository();

echo "<h1>PHP Todo App</h1>";

$repo->createTodo();

require '../views/create.view.php';
