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
if ($_GET["mode"] === "form") {
    echo '<form method="post" action="update.php">
    <input type="hidden" value="'.$_GET["id"].'" name="id"> 
        Title: <input type="text" name="title">
        <br>
        <br>
        <input type="submit" value="Submit">
    </form>';
} else {
    $sql = "UPDATE `php-todo-app`.`todoItems` SET `title`='{$_POST["title"]}' WHERE  `id`={$_POST["id"]}";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
<br>
<br>
<a href="index.php">
    <button type="button">Go back!</button>
</a>
</body>
</html>
