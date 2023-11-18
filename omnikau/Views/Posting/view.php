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
        <a href="?c=user&a=login">log in</a>
        <a href="?c=user&a=login">register</a>
    </header>
    <div id='postingGrid'>
        <?php
                echo "<div id='posting'>";
                echo "<h2>$posting->description</h2>";
                echo "<p>$posting->price</p>";
                echo "</div>";

                echo "<div id='posting'>";
                echo ($posting->is_sold == 0) ? "<p>available</p>" : "<p>Sold</p>";
                echo "</div>";


        ?>
    </div>
</body>
</html>