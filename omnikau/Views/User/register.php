<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
<header>
        <h1>omnikau</h1>
        <a href='?c=posting&a=index'>home</a>
        <a href='?c=user&a=login'>log in</a>
    </header>
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
        <button>Sign Up</button>
    </form>
</body>
</html>