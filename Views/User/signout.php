<?php
    session_start();
    $_SESSION['user'] = -1;
    $_SESSION['where'] = -1;
    header("Location: ?c=posting&a=index")
?>