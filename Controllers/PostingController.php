<?php
include_once 'Models/Posting.php';
    class PostingController{
        function route(){
            $action = isset($_GET['a']) ? $_GET['a'] : 'index';
            $id = isset($_GET['i']) ? $_GET['i'] : -1;
            $where = isset($_GET['where']) ? $_GET['where'] : -1;
            $sort = isset($_GET['sort']) ? $_GET['sort'] : -1;

            if($action=='index'){
                $postings = Posting::listPostings($where, $sort);
                $this->render('index', $postings);
            }else if($action=='post'){
                render($action);
            }else{
                $data = array(new Posting($id));
                $this->render($action, $data);
            }
        }

        function render($action, $data = []){
            extract($data);
            include "Views/Posting/$action.php";
        }
    }
?>