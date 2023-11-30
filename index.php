<link rel="stylesheet" href="styles.css">

<?php
    

    $controller = isset($_GET['c']) ? $_GET['c'] : 'posting';
    $action = isset($_GET['a']) ? $_GET['a'] : 'index';
    
    $controllerName = ucfirst($controller) . "Controller";
    include("Controllers/$controllerName.php");
    
    session_start();
    //var_dump($_SESSION);
    $ct = new $controllerName();
    $ct->route();

    if(isset($_SESSION['alert']) && $_SESSION['alert']!='-1'){
        echo "<script language=\"javascript\">";
        echo "alert('";
        echo str_replace("'", "", $_SESSION['alert']);
        echo "');";
        echo "</script>";
        $_SESSION['alert']='-1';
    }
?>