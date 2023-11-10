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
    <form method='get' action='?c=posting&a=index'>
        <select name='sort'>
            <option value='Price ASC'>Price low to high</option>
            <option value='Price DESC'>Price high to low</option>
            
        </select>
        <button>filter</button>
    </form>
    <div id='postingGrid'>
        <?php
            foreach($data as $posting){
                echo "<div id='posting'>";
                echo "<h2>$posting->description</h2>";
                echo "<p>$posting->price</p>";
                echo "</div>";
            }
        ?>
    </div>
</body>
</html>