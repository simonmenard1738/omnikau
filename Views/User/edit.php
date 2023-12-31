
<?php
    include_once "Controllers/UserController.php";
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
    <h1>ACCOUNT</h1>
    <form class='edituserform' action="?c=user&a=update" method="POST">
        <div class="container">
            <h2>Personal Details</h2>
            <p>Email: </p> <p><?php echo $user->email; ?></p>

            <label for='username'>Username:</label>
            <input type='text' id='username' name='username' value='<?php echo $user->username; ?>' required>
            <br>
            <label for='program_name'>Program name:</label>
            <input type='text' id='program_name' name='program_name' value='<?php echo $user->program_name; ?>' required>
            <br>
            <label for='school_name'>School name:</label>
            <input type='text' id='school_name' name='school_name' value='<?php echo $user->school_name; ?>' required>
            <br>
            <button type="submit">Save Changes</button>
        </div>
    </form>

    <form class='edituserform' action="?c=user&a=updatePassword" method="POST">
        <div class='user'>
            <h2>Change Password</h2>
            <label for='current_password'>Current password:</label>
            <input type='password' id='current_password' name='current_password' required>
            <br>
            <label for='new_password'>New password:</label>
            <input type='password' id='new_password' name='new_password' required>
            <br>
            <button type="submit">Save password</button>
        </div>
    </form>

    <form class='edituserform' action="?c=user&a=delete" method="POST">
            <div class='user'>
                <h2>Delete Account</h2>
                <input type='password' id='password' placeholder='Current password' name='password' required>
                <button type="submit">Delete Account</button>
            </div>
    </form>
    <h1>POSTINGS</h1>
    <div id='postingGrid'>
        <?php
            $postings = $user->getPostings();
            foreach($postings as $posting){
                
                echo "<div id='posting'>";
                echo "<a href='?c=posting&a=view&i=$posting->posting_id'>";
                echo "<h2>$posting->title</h2>";
                echo "<p>$$posting->price</p>";
                echo '</a>';
                echo "<a id='delete' href='?c=posting&a=delete&i=$posting->posting_id' >delete</a>";
                echo "</div>";
            }
        ?>
        <h1>ADD EDIT POSTING</h1>
    </div>
    <a href='?c=user&a=signout'><p>Sign out</p></a>

</body>
</html>