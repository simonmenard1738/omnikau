<?php
include_once 'Models/User.php';
    class UserController{
        function route(){
            $controller = $_GET['c'];
            $action = isset($_GET['a']) ? $_GET['a'] : "none";
            $id = isset($_GET['id']) ? $_GET['id'] : ""; 

            if($action=="getuser"){
                global $conn;
                $sql = "SELECT * FROM user WHERE username = '". $_POST['username'] . "' ";
                //var_dump($sql);
                $res = $conn->query($sql);
                $row = $res->fetch_assoc();
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
                }else{
                    $_SESSION['alert'] = "Login unsuccessful. Please try again.";
                }
                $this->sendToIndex();
            }else if($action=="signout"){
                session_start();
                $_SESSION['user'] = -1;
                $_SESSION['where'] = -1;
                header("Location: ?c=posting&a=index");
            }else if($action=='notifications'){
                if(isset($_SESSION['user'])&&$_SESSION['user']!='-1'){

                }else{
                    $_SESSION['alert'] = "Can't view notifications while not logged in.";
                    $this->render('index');
                }
            }else{
                $this->render($action);
            }
            
        }

        function render($action, $data = []){
            extract($data);
            include "Views/User/$action.php";
        }

        function sendToIndex(){
            header("Location: ?c=posting&a=index");
        }
    }

?>