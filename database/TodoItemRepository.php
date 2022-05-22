<?php

use App\Connection;
use Database\TodoItem;

class TodoItemRepository {

    /**
     * @return array | TodoItem[]
     */
    public function getAll(): array {

        $connection = new Connection();
        $conn = $connection->create();

        $stmt = $conn->prepare("SELECT * FROM todoItems");
        $stmt->execute();
        $result = $stmt->get_result();

        $list = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $list[] = new TodoItem($row);
            }
        }

        $conn->close();

        return $list;
    }


    public function getByID($id): ?TodoItem {

        $todos = $this->getAll();

        foreach($todos as $todo) {
            if($todo->id == $id){
                return $todo;
            }
        }

        return null;
    }

    public function createTodo($title, $assign): void {
        $connection = new Connection();
        $conn = $connection->create();

        $stmt = $conn->prepare("INSERT INTO `php-todo-app`.`todoItems` (`title`, `assignedTo`) VALUES (?, ?)");
        $stmt->bind_param('ss', $title, $assign);
        $stmt->execute();

        if ($stmt->affected_rows === 1) {
            echo "<h3>New todo assigned to $assign successfully!</h3>";
        } else {
            echo "Error for create: " . $stmt->error;
        }

        $conn->close();
    }

    public function deleteTodo($id, $assign): void {
        $connection = new Connection();
        $conn = $connection->create();

        $stmt = $conn->prepare("DELETE FROM `php-todo-app`.`todoItems` WHERE  `id`= ? ");
        $stmt->bind_param('s', $id);
        $stmt->execute();

        if ($stmt->affected_rows === 1) {
            echo "<h3>$assign's todo deleted successfully!</h3>";
        } else {
            echo "Error for delete: " . $stmt->error;
        }

        $conn->close();
    }

    public function updateTodo($title, $assign, $completed, $id): void {
        $connection = new Connection();
        $conn = $connection->create();

        $stmt = $conn->prepare("UPDATE `php-todo-app`.`todoItems` SET `title`= ?, `assignedTo`= ?, `completed`= ? WHERE  `id`= ? ");
        $stmt->bind_param('ssds', $title, $assign, $completed, $id);
        $stmt->execute();

        if ($stmt->affected_rows === 1) {
            echo "<h3>Todo updated for $assign successfully!</h3>";
        } else {
            echo "Error for update: " . $stmt->error;
        }

        $conn->close();
    }
}