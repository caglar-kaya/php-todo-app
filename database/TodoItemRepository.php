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

        // create a query
        $sql = "INSERT INTO `php-todo-app`.`todoItems` (`title`, `assignedTo`) VALUES ('{$_POST["title"]}', '{$_POST["assign"]}')";

        // run the query
        if ($conn->query($sql) === TRUE) {
            echo "<h3>New todo assigned to {$_POST["assign"]} successfully!</h3>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}