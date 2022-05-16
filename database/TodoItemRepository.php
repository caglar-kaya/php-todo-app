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
}