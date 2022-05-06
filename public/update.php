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

$sql = "UPDATE `php-todo-app`.`todoItems` SET `title`='learn HTML' WHERE  `id`=22";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>

<html>
<body>
<br>
<br>
<a href="index.php">
    <button type="button">Go back!</button>
</a>
</body>
</html>
