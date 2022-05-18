<?php include 'partials/head.php' ?>
        <div class="create-form">
            <form method="post" action="create">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" class="inputText" placeholder="enter todo title"><br><br>
                <label for="assign">Assigned to:</label>
                <input type="text" id="assign" name="assign" class="inputText" placeholder="enter a name to assign todo"><br><br>
                <input type="submit" value="Submit" class="submit">
            </form>
        </div>
        <div>
            <a href="completed">
                <button type="button" class="showBtn">Show Completed Todos</button>
            </a>
            <a href="uncompleted">
                <button type="button" class="showBtn">Show Uncompleted Todos</button>
            </a>
            <a href="index">
                <button type="button" class="showBtn">Show All Todos</button>
            </a>
        </div>
<?php include 'partials/footer.php'; ?>
