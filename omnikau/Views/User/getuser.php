<?php
    session_start();
    global $conn;
    $sql = "SELECT * FROM user WHERE `username` = '". $_POST['username'] . "';";
    //var_dump($sql);
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
    $location = "Location: ?c=posting&a=index";
    if(!isset($POST['username']))
    if($row['password']==md5($_POST['password'])){
        $user = new User();
        $user->email = $row['email'];
        $user->username = $row['username'];
        $user->password = md5($row['password']);
        $user->school_name = $row['school_name'];
        $user->program_name = $row['program_name'];
        $user->active = $row['active'];
        $user->setPermissions();
        $_SESSION['user'] = $user;
        $location = "Location: ?c=posting&a=index&where=`seller_email` NOT LIKE '".$user->email."';";
    }else{
        $_SESSION['alert'] = "Login unsuccessful. Please try again.";
    }

    header($location);
    //header("Location: ?c=posting&a=index");
?>