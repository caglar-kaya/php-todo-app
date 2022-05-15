<style><?php include '../css/index.css'; ?></style>

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

// create a query
$sql = "INSERT INTO `php-todo-app`.`todoItems` (`title`, `assignedTo`) VALUES ('{$_POST["title"]}', '{$_POST["assign"]}')";

// run the query
if ($conn->query($sql) === TRUE) {
    echo "<h1>PHP Todo App</h1>";
    echo "<h3>New todo assigned to {$_POST["assign"]} successfully!</h3>";
} else {
    echo "<h1>PHP Todo App</h1>";
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

require 'create.view.php';
