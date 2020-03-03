<?php
require "config.php";

function Validate_date($date_string) {
    if($time = strtotime($date_string)) {
        return $time;
    } else {
        return false;
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST['taskname']) and (!empty($_POST['due_date'])) ) {
        if($due_date = Validate_date($_POST['due_date'])) {
            $description = $_POST['taskname'];
            $user_id = $_SESSION['user_id'];
            $due_date = date('Y-m-d H:i:s', $due_date);
            $connection->query("INSERT INTO tasks (description,due_date,user_id) VALUES ('$description', '$due_date', $user_id)");
        } else {
            $errors['not_vaild_date'] = 'يجب ان تدخل التاريخ بصورة صحيحة مثل  1-1-2014';
            $_SESSION['errors'] = $errors;
        }

    } else {
        if(empty($_POST['taskname'])) {
            $errors['required_name'] = 'يجب ان تقوم بكتابة وصف للمهمة';
        }
        if(empty($_POST['due_date'])) {
            $errors['required_date']= 'يجب ان تقوم بتعيين اخر مهلة لإنجاز المهمة';
        }
        $_SESSION['errors'] = $errors;
    }

    header('location: ../index.php');

}

