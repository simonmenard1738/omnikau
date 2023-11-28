<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>
<body>
<?php include_once "header.php"; ?>
    <div id="account">
    <form action="?c=user&a=getuser" method='post'>
        <input placeholder="username" type="text" name="username"><br>
        <input placeholder="password" type="password" name="password"><br>
        <button>Log In</button>
    </form>
    <a href="?c=user&a=register">Don't have an account? Create one here.</a>
    </div>
</body>
</html>