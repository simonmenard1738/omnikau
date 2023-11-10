<?php
    session_start();
    global $conn;
    $sql = "SELECT * FROM user WHERE `username` = '". $_POST['username'] . "';";
    var_dump($sql);
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
    if($row['password']==$_POST['password']){
        $user = new User();
        $user->email = $row['email'];
        $user->username = $row['username'];
        $user->password = $row['password'];
        $user->school_name = $row['school_name'];
        $user->program_name = $row['program_name'];
        $user->active = $row['active'];
        $_SESSION['user'] = $user;
    }else{
        $_SESSION['alert'] = "Login unsuccessful. Please try again.";
    }
    header("Location: ?c=posting&a=index&where=`seller_email` NOT LIKE '".$user->email."';");
    //header("Location: ?c=posting&a=index");
?>