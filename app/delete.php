<?php
    require 'config.php';
    $task_id = $_GET['task_id'];
    $user_id = $_SESSION['user_id'];
    if(!empty($task_id)) {
        $connection->query("DELETE FROM tasks WHERE id = $task_id  AND user_id = $user_id AND done = 1");
    }
    header('location: ../index.php');