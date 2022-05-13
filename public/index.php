<!DOCTYPE html>
<html>
<head>
    <title>PHP Todo App</title>
</head>
<body>
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
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - Title: " . $row["title"];
        echo "<a href='delete.php?id={$row["id"]}'>X</a>";
        echo "<a href='update.php?id={$row["id"]}&mode=form'><button type=\"button\">Edit</button></a>";
        echo "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
<h1>PHP Todo App</h1>
<form method="post" action="create.php">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title"><br><br>
    <label for="assign">Assigned to:</label>
    <input type="text" id="assign" name="assign"><br><br>
    <input type="submit" value="Submit">
</form>
<br>
<a href="index.php">Reset</a>
</body>
</html>
