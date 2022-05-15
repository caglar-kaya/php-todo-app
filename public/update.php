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
if ($_GET["mode"] === "form") {
    echo '
        <form method="post" action="update.php">
            <input type="hidden" value="'.$_GET["id"].'" name="id">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" class="inputText" placeholder="update todo title"><br><br>
            <label for="assign">Assigned to:</label>
            <input type="text" id="assign" name="assign" class="inputText" placeholder="update name to assign todo"><br><br>
            <label for="complete">Completed:</label>
            <select name="complete" id="complete">
              <option value="1">Yes</option>
              <option value="0">No</option>
            </select><br><br>
            <input type="submit" value="Submit" class="submit">
        </form>
        ';
} else {
    $sql = "UPDATE `php-todo-app`.`todoItems` SET `title`='{$_POST["title"]}', `assignedTo`='{$_POST["assign"]}', `completed`='{$_POST["complete"]}' WHERE  `id`={$_POST["id"]}";
    if ($conn->query($sql) === TRUE) {
        echo "<h3>Todo updated for {$_POST["assign"]} successfully!</h3>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
$conn->close();

require  'update.view.php';
