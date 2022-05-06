<html>
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
        echo "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
<form method="post" action="create.php">
    Title: <input type="text" name="title">
    <br>
    <br>
    <input type="submit" value="Submit">
</form>

<a href="index.php">Reset</a>
</body>
</html>
