<header>
        <a href="?c=posting&a=index"><h1>omnikau</h1></a>
        <?php
            if(isset($_SESSION['user']) && $_SESSION['user']!="-1"){
                echo "<a href='?c=posting&a=post'><p>Create posting</p></a>";
                echo "<a href='?c=user&a=edit'><p>".$_SESSION['user']->username."</p></a>";
                echo $_SESSION['user']->hasUnrated() ? "<a href='?c=user&a=notifications'><p>🔔</p></a>" : "<a href='?c=user&a=signout'><p>Sign out</p></a>";
            }else{
                echo "<p></p>";
                echo "<a href='?c=user&a=login'><p>log in</p></a>";
                echo "<a href='?c=user&a=register'><p>register</p></a>";
            }
        ?>
        
        
</header>