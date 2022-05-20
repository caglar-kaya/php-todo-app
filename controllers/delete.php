<?php

include '../database/TodoItemRepository.php';

echo "<h1>PHP Todo App</h1>";

$repo = new TodoItemRepository();

$repo->deleteTodo($_GET['id'], $_GET['assign']);

require '../views/delete.view.php';
