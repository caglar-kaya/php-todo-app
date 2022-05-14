<!DOCTYPE html>
<html>
    <head>
        <title>PHP Todo App</title>
    </head>
    <body>
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
