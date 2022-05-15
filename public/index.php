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

$sql = "SELECT * FROM todoItems";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>PHP Todo App</h1>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<strong>ID: </strong>" . $row["id"] .
             "<strong>Title: </strong>" . $row["title"] .
             "<strong>Assigned to: </strong>" . $row["assignedTo"] .
             '<strong>Completed: </strong>' . ( $row["completed"] ?
                 '<img src="./complete.png" alt="Complete Todo" width="50" height="50">' :
                 '<img src="./incomplete.png" alt="Incomplete Todo" width="40" height="40">');
        echo "<a href='delete.php?id={$row["id"]}&assign={$row["assignedTo"]}'><button type=\"button\">Delete</button></a>";
        echo "<a href='update.php?id={$row["id"]}&mode=form'><button type=\"button\">Edit</button></a>";
        echo "<br>";
    }
} else {
    echo "<h1>PHP Todo App</h1>";
    echo "<h3>There isn't any todo item yet!</h3>";
}

$conn->close();

require 'index.view.php';
