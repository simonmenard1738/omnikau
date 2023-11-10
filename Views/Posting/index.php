<?php
    include_once "Models/User.php";
    session_start();

    if(isset($_GET['where'])){
        $_SESSION['where'] = $_GET['where'];
    }

    //var_dump($_SESSION);
    if(isset($_SESSION['alert']) && $_SESSION['alert']!=-1){
        echo "<script language=\"javascript\">";
        echo "alert('";
        echo $_SESSION['alert'];
        echo "');";
        echo "</script>";
        $_SESSION['alert']=-1;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>omnikau</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>omnikau</h1>
        <?php
            if(isset($_SESSION['user']) && $_SESSION['user']!="-1"){
                echo "<a href='?c=user&a=edit'>".$_SESSION['user']->username."</a>";
                echo "<a href='?c=user&a=signout'>Sign out</a>";
            }else{
                echo "<a href='?c=user&a=login'>log in</a>";
                echo "<a href='?c=user&a=login'>register</a>";
            }
        ?>
        
        
    </header>
    <form method='get' action='?c=posting&a=index>'>

        <select name='sort'>
            <option value='Price ASC'>Price low to high</option>
            <option value='Price DESC'>Price high to low</option>
            
        </select>
        <button>filter</button>
    </form>
    <div id='postingGrid'>
        <?php
        $email = "-1";

        if(isset($_SESSION['user']) && $_SESSION['user']!='-1'){
            $user = $_SESSION['user'];
            $email = $user->email;
        }
        printPostings($email, $data);
        
            
        //var_dump($_SESSION['user']);
        function printPostings($email, $data){
            foreach($data as $posting){
                if($posting->seller_email!=$email){
                    echo "<div id='posting'>";
                    echo "<h2>$posting->description</h2>";
                    echo "<p>$posting->price</p>";
                    echo "</div>";
                }
                
            }
        }
            
        ?>
    </div>
</body>
</html>