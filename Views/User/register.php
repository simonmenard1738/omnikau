<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
<?php include_once "header.php"; ?>
    <form action='?c=user&a=adduser' method='post'>
        <input type="text" name='email' placeholder="email"><br>
        <input type="text" name='username' placeholder="username"><br>
        <input type="password" name='password' placeholder="password"><br>
        <select name='school_name'>
            <?php
                global $conn;
                $sql = "SELECT school_name FROM school";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()){
                    $school = $row['school_name'];
                    echo '<option value='.$school.'>'.$school.'</option>';
                }
            ?>
        </select><br>
        <input type="text" name='program_name' placeholder="program_name"><br>
        <h1>ADD PART TO PUT CONTACT INFO</h1>
        <button>Sign Up</button>
    </form>
</body>
</html>