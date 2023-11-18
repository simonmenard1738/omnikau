<?php
include_once 'Models/User.php';
    class UserController{
        function route(){
            $controller = $_GET['c'];
            $action = isset($_GET['a']) ? $_GET['a'] : "none";
            $id = isset($_GET['id']) ? $_GET['id'] : ""; 
            $this->render($action);
        }

        function render($action, $data = []){
            extract($data);
            include "Views/User/$action.php";
        }
    }

?>