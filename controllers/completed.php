<?php

include '../database/TodoItemRepository.php';

$repo = new TodoItemRepository();
$todos = $repo->getAll();

$completedTodos = array_filter($todos, function ($todo) {
    return $todo->completed;
});

echo "<h1>PHP Todo App</h1>";

if (count($completedTodos) > 0) {
    foreach($completedTodos as $completedTodo){
        echo "<strong>ID: </strong>" . $completedTodo->id .
            "<strong>Title: </strong>" . $completedTodo->title .
            "<strong>Assigned to: </strong>" . $completedTodo->assignedTo .
            '<strong>Completed: </strong>' . ( $completedTodo->completed ?
                '<img src="/images/complete.png" alt="Complete Todo" width="50" height="50">' :
                '<img src="/images/incomplete.png" alt="Incomplete Todo" width="40" height="40">');
        echo "<a href='delete?id={$completedTodo->id}&assign={$completedTodo->assignedTo}'><button type=\"button\">Delete</button></a>";
        echo "<a href='update?id={$completedTodo->id}&mode=form'><button type=\"button\">Edit</button></a>";
        echo "<br>";
    }
} else {
    echo "<h3>There isn't any completed todo item yet!</h3>";
}

require '../views/index.view.php';
