<?php
include 'connection.php';
include 'TodoItem.php';

class TodoItemRepository {

    public function getAll(): array {
        $connection = new Connection();
        $conn = $connection->create();

        $sql = "SELECT * FROM todoItems";
        $result = $conn->query($sql);

        $list = [];

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $list[] = new TodoItem($row);
            }
        }

        $conn->close();

        return $list;
    }

    public function createTodo(): void {
        $connection = new Connection();
        $conn = $connection->create();

        $sql = "INSERT INTO `php-todo-app`.`todoItems` (`title`, `assignedTo`) VALUES ('{$_POST["title"]}', '{$_POST["assign"]}')";

        if ($conn->query($sql) === TRUE) {
            echo "<h3>New todo assigned to {$_POST["assign"]} successfully!</h3>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }

    public function deleteTodo(): void {
        $connection = new Connection();
        $conn = $connection->create();

        $sql = "DELETE FROM `php-todo-app`.`todoItems` WHERE  `id`={$_GET['id']}";

        if ($conn->query($sql) === TRUE) {
            echo "<h3>{$_GET['assign']}'s todo deleted successfully!</h3>";
        } else {
            echo "Error deleting record: " . $conn->error;
        }

        $conn->close();
    }

    public function updateTodo(): void {
        $connection = new Connection();
        $conn = $connection->create();

        if ($_GET["mode"] === "form") {
            echo '
            <form method="post" action="update.php">
                <input type="hidden" value="'.$_GET["id"].'" name="id">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" class="inputText" placeholder="update todo title"><br><br>
                <label for="assign">Assigned to:</label>
                <input type="text" id="assign" name="assign" class="inputText" placeholder="update name to assign todo"><br><br>
                <label for="complete">Completed:</label>
                <select name="complete" id="complete">
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                </select><br><br>
                <input type="submit" value="Submit" class="submit">
            </form>
            ';
        } else {
            $sql = "UPDATE `php-todo-app`.`todoItems` SET `title`='{$_POST["title"]}', `assignedTo`='{$_POST["assign"]}', `completed`='{$_POST["complete"]}' WHERE  `id`={$_POST["id"]}";

            if ($conn->query($sql) === TRUE) {
                echo "<h3>Todo updated for {$_POST["assign"]} successfully!</h3>";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
        $conn->close();
    }
}