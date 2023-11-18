<?php
    session_start();

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $school_name = $_POST['school_name'];
    $program_name = $_POST['program_name'];

    $user = new User();
    
    $user->email = $email;
    $user->username = $username;
    $user->password = md5($password);
    $user->school_name = $school_name;
    $user->program_name = $program_name;

    $user->upload();
    header("Location: ?c=posting&a=index")
?>