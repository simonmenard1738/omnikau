<?php
    include_once 'Models/Rating.php';
    include_once 'Models/Transaction.php';

    class RatingController{

        $controller = $_GET['c'];
        $action = isset($_GET['a']) ? $_GET['a'] : "index";
        $id = isset($_GET['i']) ? $_GET['i'] : "-1"; 
        $stars = isset($_GET['s']) ? $_GET['s'] : "-1"; 

        function route(){
            if($id!=-1&&$stars!=-1){
                $rating = new Rating($id, $stars);
                $rating->upload();
                Transaction::setRated($id);
            }else{
                $_SESSION['alert'] = "Rating failed. No id or number of stars";
            }
            $this->render();
        }

        function render(){
            header("Location: ?c=user&a=notifications");
        }
    }
?>