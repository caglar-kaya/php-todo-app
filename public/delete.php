<?php
$servername = "mysql";
$username = "php-todo-app";
$password = "password";
$dbname = "php-todo-app";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM `php-todo-app`.`todoItems` WHERE  `id`={$_GET['id']}";

if ($conn->query($sql) === TRUE) {
    echo "<h3>{$_GET['assign']}'s todo deleted successfully!</h3>";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

require  'delete.view.php';
