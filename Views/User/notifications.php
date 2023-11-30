<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
</head>
<body>
    <?php 
        include_once 'header.php'; 
        echo "<h1 style='text-align: center'> how were your purchases? </h1>";
        echo "<div id='transactiongrid'>";
        foreach($data as $transaction){
            echo "<div id='transaction'>";
                echo "<h2>$transaction->title</h2>";
                echo "<div id='stars'>";
                    $stars = 0;
                    while($stars<5){
                        $stars = $stars + 1;
                        echo "<a id='$stars' href='?c=rating&i=$transaction->transaction_id&s=$stars''>☆</a>";
                    }
                    echo "</div>";
            echo "</div>";
        }
        echo "</div>";
    ?>
    
</body>
</html>