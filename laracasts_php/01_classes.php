<?php

require 'functions.php';

class Task {
    public  $description;
    public $completed = false;

    public  function __construct($description) {
        $this->description = $description;
    }

    public function isComplete() {
        return $this->completed;
    }

    public function complete() {
        $this->completed = true;
    }
}

$task = new Task('Go to the store');
$task->complete();
var_dump($task->isComplete());

$tasks = [
    new Task('Go to the store'),
    new Task('Finish php tutorial'),
    new Task('Clean my room')
];

$tasks[0]->complete();

require '01_classes.view.php';









