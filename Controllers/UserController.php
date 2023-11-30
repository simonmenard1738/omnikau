<?php
include_once 'Models/User.php';
    class UserController{
        function route(){
            $controller = $_GET['c'];
            $action = isset($_GET['a']) ? $_GET['a'] : "none";
            $id = isset($_GET['i']) ? $_GET['i'] : ""; 

            if($action=="getuser"){
                global $conn;
                $sql = "SELECT * FROM user WHERE username = '". $_POST['username'] . "' ";
                //var_dump($sql);
                $res = $conn->query($sql);
                $row = $res->fetch_assoc();
                if($row['password']==md5($_POST['password']) && $row['active']=='1'){
                    $user = new User();
                    $user->email = $row['email'];
                    $user->username = $row['username'];
                    $user->password = $row['password'];
                    $user->school_name = $row['school_name'];
                    $user->program_name = $row['program_name'];
                    $user->active = $row['active'];
                    $user->setPermissions();
                    $_SESSION['user'] = $user;
                }else{
                    $_SESSION['alert'] = $row['active']=='1' ? "Wrong username or password. Please try again." : "Account deleted. Please message an administrator if you want it back.";
                }
                $this->sendToIndex();
            }else if($action=="signout"){
                session_start();
                $_SESSION['user'] = -1;
                $_SESSION['where'] = -1;
                $this->sendToIndex();
            }else if($action=='notifications'){
                if(isset($_SESSION['user'])&&$_SESSION['user']!='-1'){
                    $data = $_SESSION['user']->getTransactions();
                    $this->render($action, $data);
                }else{
                    $_SESSION['alert'] = "Can't view notifications while not logged in.";
                    $this->sendToIndex();
                }
            }else if($action=='adduser'){
                $password = $_POST['password'];
            
                $user = new User();
                
                $user->email = $_POST['email'];
                $user->username = $_POST['username'];
                $user->password = md5($password);
                $user->school_name = $_POST['school_name'];
                $user->program_name = $_POST['program_name'];
            
                $user->upload();
                $this->sendToIndex();
            }else if(str_contains($action,'update')){
                $user = $_SESSION['user'];
                if($action=='update'){
                    $user->username = isset($_POST['username']) ? $_POST['username'] : $user->username;
                    $user->school_name = isset($_POST['school_name']) ? $_POST['school_name'] : $user->school_name;
                    $user->program_name = isset($_POST['program_name']) ? $_POST['program_name'] : $user->program_name;
                    $user->update();
                }else{
                    $currentpass = md5($_POST['current_password']);
                    $newpass = md5($_POST['new_password']);
                    //echo $user->password==$currentpass ? "WEEE" : "WAA";
                    if($user->password==$currentpass){
                        $user->password = isset($_POST['new_password']) ? $newpass : $user->password;
                        $user->updatePassword();
                        $_SESSION['alert'] = "Changed password!";
                    }else{
                        $_SESSION['alert'] = "Wrong current password.";
                    }
                }
                
                $this->render('edit');
            }else if($action=="delete"){
                if($_SESSION['user']->password == md5($_POST['password'])){
                    $_SESSION['user']->delete();
                    header("Location: ?c=user&a=signout");
                }else{
                    $_SESSION['alert'] = "Wrong password.";
                    $this->render('edit');
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

            include "Controllers/PostingController.php";
            $ct = new PostingController();
            $ct->route();

        }
    }

?>