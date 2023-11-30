<!-- <!DOCTYPE html>
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
        <a href="?c=user&a=login">log in</a>
        <a href="?c=user&a=login">register</a>
    </header>
    <div id='postingGrid'>
        <?php
                /* echo "<div id='posting'>";
                echo "<h2>$posting->description</h2>";
                echo "<p>$posting->price</p>";
                echo "</div>";

                echo "<div id='posting'>";
                echo ($posting->is_sold == 0) ? "<p>available</p>" : "<p>Sold</p>";
                echo "</div>"; */


        ?>
    </div>
</body>
</html> -->

<?php
    $data = $data[0];
    $user = $data->getUser();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title><?php echo $data->title; ?></title>
</head>
<body>
    <?php include_once "header.php"; ?>


    <div id="postingviewwrapper">

        <div id="fullposting">
            <?php
                echo "<h2>".$data->title."</h1>";
                echo "<h3>".$data->post_type." from " . $user->username ."</h3>";
            ?>

            <p><?php
                echo $data->description . " (posted on " . $data->date_posted . ")";
            ?><p>
        </div>

        <div id="userdetails">

            <p><?php
                echo "User rating: ";
                $stars = $user->getAvgRating();
                $blankstars = 5-$stars;
                if($stars){
                    while($stars!=0){
                        echo "★";
                        $stars = $stars-1;
                    }
                    while($blankstars!=0){
                        echo "☆";
                        $blankstars = $blankstars-1;
                    }
                }
                
                echo $user->getAvgRating() ? " (".$user->getAvgRating()."/5)" : "No ratings yet";
            ?><p>

            
            
                <?php
                    
                    $contact_list = $user->getContactInfo();
                    if(count($contact_list)!=0){
                        echo "<p>Contact at</p>";
                        echo "<ul id='contactinfo'>";
                        foreach ($contact_list as $contact){
                            echo "<li>";
                            echo $contact->contact_type." - ".$contact->contact_info;
                            echo "</li>";
                        }
                        echo "</ul>";
                    }
                    
                ?>
            
            <?php
                if(isset($_SESSION['user'])&&$_SESSION['user']!="-1"){
                    echo "<a href='?c=posting&a=buy&i=$data->posting_id'>purchase now</button>";
                }
            ?>
        </div>

    </div>

</body>
</html>