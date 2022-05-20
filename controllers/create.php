<?php

include '../database/TodoItemRepository.php';

$repo = new TodoItemRepository();

echo "<h1>PHP Todo App</h1>";

$repo->createTodo($_POST["title"], $_POST["assign"]);

require '../views/create.view.php';
