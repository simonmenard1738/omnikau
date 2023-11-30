<?php
    $email = "-1";

    if(isset($_SESSION['user']) && $_SESSION['user']!='-1'){
        include_once('Models/User.php');
        $user = $_SESSION['user'];
        $email = $user->email;
    }

    if(isset($_GET['where'])){
        $_SESSION['where'] = $_GET['where'];
    }

    //var_dump($_SESSION);
    
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
    <?php include_once "header.php"; ?>
    <div id="indexforms">
        <form method='get' action='?c=posting&a=index>'>

            <select name='sort'>
                <option value='Price ASC'>Price low to high</option>
                <option value='Price DESC'>Price high to low</option>
                
            </select>
            <button>filter</button>
        </form>
        <form method='post' action='?c=posting&a=index'>
            <input type='text' name='search'>
            <button>search</button>
        </form>
    </div>
    <div id='postingGrid'>
        <?php
        
        printPostings($email, $data);
        
            
        //var_dump($_SESSION['user']);
        function printPostings($email, $data){

            $perms = isset($_SESSION['user']) && $_SESSION['user']!='-1' ? $_SESSION['user']->perms : "";
            foreach($data as $posting){
                if($posting->seller_email!=$email){
                    echo "<div id='posting'>";
                    echo "<a href='?c=posting&a=view&i=$posting->posting_id'>";
                    echo "<h2>$posting->title</h2>";
                    echo "<p>$$posting->price</p>";
                    echo "</a>";
                    if(str_contains($perms, '3')){
                        echo "<a id='delete' href='?c=posting&a=delete&i=";
                        echo $posting->posting_id . "'>delete</a>";
                    }
                    echo "</div>";
                    
                }
                
            }
        }
            
        ?>
    </div>
</body>
</html>