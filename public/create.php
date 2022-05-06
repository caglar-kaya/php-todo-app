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
$sql = "INSERT INTO `php-todo-app`.`todoItems` (`title`) VALUES ('{$_POST["title"]}')";

// run the query
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
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

