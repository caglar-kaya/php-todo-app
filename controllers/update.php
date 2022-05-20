<?php

include '../database/TodoItemRepository.php';

$repo = new TodoItemRepository();

echo "<h1>PHP Todo App</h1>";

if (array_key_exists("mode", $_GET) && $_GET["mode"] === "form") {

    $currentTodo = $repo->getByID($_GET["id"]);

    echo '
            <form method="post" action="update">
                <input type="hidden" value="'.$_GET["id"].'" name="id">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" class="inputText" value="'.$currentTodo->title.'"><br><br>
                <label for="assign">Assigned to:</label>
                <input type="text" id="assign" name="assign" class="inputText" value="'.$currentTodo->assignedTo.'"><br><br>
                <label for="complete">Completed:</label>
                <select name="complete" id="complete">
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                </select><br><br>
                <input type="submit" value="Submit" class="submit">
            </form>
            ';
} else {
    $repo->updateTodo($_POST["title"], $_POST["assign"], $_POST["complete"], $_POST["id"]);
}

require '../views/update.view.php';
