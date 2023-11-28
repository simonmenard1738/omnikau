<?php
include_once 'Models/Posting.php';
    class PostingController{
        function route(){
            $action = isset($_GET['a']) ? $_GET['a'] : 'index';
            $id = isset($_GET['i']) ? $_GET['i'] : -1;
            $where = isset($_GET['where']) ? $_GET['where'] : -1;
            $sort = isset($_GET['sort']) ? $_GET['sort'] : -1;

            if($action=='poster'){
                $user = $_SESSION['user'];
                //var_dump($user);
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $seller_email = $user->email;
                $is_sold = 0;
                $post_type = $_POST['postType'];
            
            
                $posting = new Posting();
                $posting->title = $title;
                $posting->seller_email = $seller_email;
                $posting->description = $description;
                $posting->post_type = $post_type;
                $posting->price = (int)$price;
                $posting->description = $description;
            
                //var_dump($posting);
            
                $posting->upload();
                header("Location: ?c=posting&a=index");
            }else if($action=='index'){
                echo($where);
                $postings = $sort!=-1 ? Posting::listPostings($where, $sort) : Posting::listPostings($where, 'visits DESC');
                $this->render('index', $postings);
            }else if($action=='post'){
                if(isset($_SESSION['user']) && $_SESSION['user']!='-1'){
                    $this->render($action);
                }else{
                    $_SESSION['alert'] = "You can't post without being logged in.";
                    $this->render('index');
                }  
            }else if($action=='view'){
                $posting = new Posting($id);
                $posting->addVisit();
                $data = array($posting);
                $this->render($action, $data);
            }
        }

        function render($action, $data = []){
            extract($data);
            include "Views/Posting/$action.php";
        }
    }
?>