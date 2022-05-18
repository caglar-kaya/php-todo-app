<?php include 'partials/head.php' ?>
        <form method="post" action="create">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" class="inputText" placeholder="enter todo title"><br><br>
            <label for="assign">Assigned to:</label>
            <input type="text" id="assign" name="assign" class="inputText" placeholder="enter a name to assign todo"><br><br>
            <input type="submit" value="Submit" class="submit">
        </form>
<?php include 'partials/footer.php'; ?>
