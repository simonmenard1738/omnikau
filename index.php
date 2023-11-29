<link rel="stylesheet" href="styles.css">

<?php
    

    $controller = isset($_GET['c']) ? $_GET['c'] : 'posting';
    $action = isset($_GET['a']) ? $_GET['a'] : 'index';
    
    $controllerName = ucfirst($controller) . "Controller";
    include("Controllers/$controllerName.php");
    
    session_start();
    
    $ct = new $controllerName();
    $ct->route();
?>