<?php
include_once 'Models/User.php';
    class UserController{
    
        function route(){
            $controller = $_GET['c'];
            $action = isset($_GET['a']) ? $_GET['a'] : "none";
            $id = isset($_GET['id']) ? $_GET['id'] : ""; 
        }

        function render($action, $data = []){
            extract($data);
            if($action=='edit'){
                include "Views/Users/$action.php";
            }else{
                include "Views/Posting/$action.php";
            }
        }
    }

?>