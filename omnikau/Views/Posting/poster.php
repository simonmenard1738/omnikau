<?php
    include_once("Models/User.php");

    session_start();
    $user = $_SESSION['user'];
    //var_dump($user);
    $description = $_POST['description'];
    $price = $_POST['price'];
    $seller_email = $user->email;
    $is_sold = 0;
    $post_type = $_POST['postType'];


    $posting = new Posting();
    $posting->seller_email = $seller_email;
    $posting->description = $description;
    $posting->post_type = $post_type;
    $posting->price = (int)$price;
    $posting->description = $description;

    //var_dump($posting);

    $posting->upload();


    header("Location: ?c=posting&a=index");
?>