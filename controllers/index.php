<?php

include '../database/TodoItemRepository.php';

$repo = new TodoItemRepository();
$todos = $repo->getAll();

echo "<h1>PHP Todo App</h1>";

if (count($todos) > 0) {
    /** @var TodoItem $todo */
    foreach($todos as $todo){
        echo "<strong>ID: </strong>" . $todo->id .
            "<strong>Title: </strong>" . $todo->title .
            "<strong>Assigned to: </strong>" . $todo->assignedTo .
            '<strong>Completed: </strong>' . ( $todo->completed ?
                '<img src="./complete.png" alt="Complete Todo" width="50" height="50">' :
                '<img src="./incomplete.png" alt="Incomplete Todo" width="40" height="40">');
        echo "<a href='delete?id={$todo->id}&assign={$todo->assignedTo}'><button type=\"button\">Delete</button></a>";
        echo "<a href='update?id={$todo->id}&mode=form'><button type=\"button\">Edit</button></a>";
        echo "<br>";
    }
} else {
    echo "<h3>There isn't any todo item yet!</h3>";
}

require '../views/index.view.php';
