<?php 
    require 'config.php';
    if(!empty($_GET['task_id'])) {
        $task_id = $_GET['task_id'];
        $connection->query("UPDATE tasks SET done = 1 WHERE id = $task_id");
    }
    header('location: ../index.php');