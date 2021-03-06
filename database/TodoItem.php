<?php

namespace Database;

class TodoItem {
    public int $id;
    public string $title;
    public string $assignedTo;
    public mixed $completed;

    function __construct($row) {
        $this->id = $row['id'];
        $this->title = $row['title'];
        $this->assignedTo = $row['assignedTo'];
        $this->completed = $row['completed'];
    }
}