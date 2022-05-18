<?php

include '../database/TodoItemRepository.php';

$repo = new TodoItemRepository();
$todos = $repo->getAll();

$uncompletedTodo = array_filter($todos, function ($todo) {
    return ! $todo->completed;
});

echo "<h1>PHP Todo App</h1>";

if (count($uncompletedTodo) > 0) {
    foreach($uncompletedTodo as $uncompletedTodo){
        echo "<strong>ID: </strong>" . $uncompletedTodo->id .
            "<strong>Title: </strong>" . $uncompletedTodo->title .
            "<strong>Assigned to: </strong>" . $uncompletedTodo->assignedTo .
            '<strong>Completed: </strong>' . ( $uncompletedTodo->completed ?
                '<img src="/images/complete.png" alt="Complete Todo" width="50" height="50">' :
                '<img src="/images/incomplete.png" alt="Incomplete Todo" width="40" height="40">');
        echo "<a href='delete?id={$uncompletedTodo->id}&assign={$uncompletedTodo->assignedTo}'><button type=\"button\">Delete</button></a>";
        echo "<a href='update?id={$uncompletedTodo->id}&mode=form'><button type=\"button\">Edit</button></a>";
        echo "<br>";
    }
} else {
    echo "<h3>There isn't any uncompleted todo item yet!</h3>";
}

require '../views/index.view.php';
