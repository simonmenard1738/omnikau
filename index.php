<?php
    $controller = isset($_GET['c']) ? $_GET['c'] : 'posting';
    $action = isset($_GET['a']) ? $_GET['a'] : 'home';

    $controllerName = ucfirst($controller) . "Controller";
    include("Controllers/$controllerName.php");

    $ct = new $controllerName();
    $ct->route();
?>