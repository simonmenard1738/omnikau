<?php
include_once 'Models/User.php';
    class UserController{

        function route(){
            $controller = $_GET['c'];
            $action = isset($_GET['a']) ? $_GET['a'] : "none";
            $id = isset($_GET['id']) ? $_GET['id'] : "";

            if($action=='edit' && $id !== ""){
                $user = new User($id);
                $this->render($action, $user);
            }else if($action=='update'){
                $user = new User($id);

                $data = [
                    'email' => $_POST['email'],
                    'username' => $_POST['username'],
                    'program_name' => $_POST['program_name'],
                    'school_name' => $_POST['school_name'],
                ];

                $user->update($data);

            }else if($action=='updatePassword'){
                $user = new User($id);

                $data = [ 'password' => $_POST['new_password'],];

                $user->updatePassword($data);

            }else if($action=='delete'){
                $user = new User($id);

                if ($user->delete()) {
                    echo "User deleted successfully!";
                } else {
                    echo "Failed to delete user.";
                }
            }else{
                echo "User not found!";
            }
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