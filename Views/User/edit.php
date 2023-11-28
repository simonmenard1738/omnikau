
<?php
    include_once "Controllers/UserController.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>omnikau</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
</head>
<body>
<?php
 $user = $_SESSION['user'];
?>
<?php include_once "header.php"; ?>
    <form action="./index.php?c=user&a=updater<?php echo $id?>" method="POST">
        <div id='posting'>
            <div class='user'>
                <h2>Personal Details</h2>
                <label for='email'>Email: <?php echo $user->email; ?></label>

                <label for='username'>Username:</label>
                <input type='text' id='username' name='username' value='<?php echo $user->username; ?>' required>

                <label for='program_name'>Program name:</label>
                <input type='text' id='program_name' name='program_name' value='<?php echo $user->program_name; ?>' required>

                <label for='school_name'>School name:</label>
                <input type='text' id='school_name' name='school_name' value='<?php echo $user->school_name; ?>' required>

                <button type="submit">Save Changes</button>
            </div>
        </div>
    </form>

    <form action="/?c=user&a=updatePassword&id=<?php echo $user->id?>" method="POST">
        <div id='posting'>
            <div class='user'>
                <h2>Change Password</h2>
                <label for='current_password'>Current password:</label>
                <input type='password' id='current_password' name='current_password' required>

                <label for='new_password'>New password:</label>
                <input type='password' id='new_password' name='new_password' required>

                <button type="submit">Save password</button>
            </div>
        </div>
    </form>

    <form action="/?c=user&a=delete&id=<?php echo $user->id?>" method="POST">
        <div id='posting'>
            <div class='user'>
                <h2>Delete Account</h2>
                <label for='password'>Current password:</label>
                <input type='password' id='password' name='password' required>
                <button type="submit">Delete Account</button>
            </div>
        </div>
    </form>

</body>
</html>